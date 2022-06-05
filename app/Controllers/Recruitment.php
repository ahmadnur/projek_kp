<?php

namespace App\Controllers;

use App\Models\Approve_lowonganModel;
use App\Models\CobaDongModel;
use App\Models\LowonganModel;
use App\Models\SeleksiModel;

class Recruitment extends BaseController
{
    protected $lowonganModel;
    protected $karyawanModel;
    protected $status_daftarModel;
    protected $approve_lowonganModel;
    protected $seleksiModel;
    protected $jabatanmodel;
    public function __construct()
    {
        $this->approve_lowonganModel = new Approve_lowonganModel();
        $this->seleksiModel = new SeleksiModel();
        $this->lowonganModel = new LowonganModel();
    }
    public function lowongan()
    {
        $pages =   $this->request->getVar('page_lowongan') ?   $this->request->getVar('page_lowongan') : 1;
        $jabatan = $this->jabatanModel->getAll();
        $lowongan = $this->lowonganModel->getAll();
        foreach ($lowongan as  $i) {
            if ($i['status'] == 1) {
                if ($i['tgl_exp'] <= date("Y-m-d")) {
                    $status = [
                        'id_lowongan' => $i['id_lowongan'],
                        'id_jabatan' => $i['id_jabatan'],
                        'jumlah' => $i['jumlah'],
                        'tgl_start' => $i['tgl_start'],
                        'tgl_exp' => $i['tgl_exp'],
                        'status' => "0",
                        'note' => $i['note'],
                    ];
                    $this->lowonganModel->save($status);
                }
            }
        }
        // dd($lowongan);
        $data = [
            'halaman' => 'Lowongan',
            'jabatan' => $jabatan,
            'lowongan' => $this->lowonganModel->paginate(10, 'lowongan'),
            'pager' => $this->lowonganModel->pager,
            'lowong' => $lowongan,
            'page' => $pages,
        ];
        return view('recruitment/lowongan.php', $data);
    }
    public function seleksi()
    {
        $lowongan = $this->lowonganModel->ada();
        $jabatan = $this->lowonganModel->getAll();
        $seleksi = $this->seleksiModel->getAll();
        $hasil = $this->status_daftarModel->hasil();
        $hasilb = $this->status_daftarModel->hasilb();
        $data = [
            'halaman' => 'Seleksi',
            'seleksi' => $seleksi,
            'jabatan' => $jabatan,
            'hasil' => $hasil,
            'hasilb' => $hasilb,
            'lowongan' => $lowongan,
        ];
        foreach ($lowongan as $l) {

            if ($l['sisa'] == 0) {
                $this->lowonganModel->save([
                    'id_lowongan' => $l['id_lowongan'],
                    'status' => "0",
                ]);
            }
        }

        return view('recruitment/seleksi.php', $data);
    }
    public function next($id, $status)
    {
        // $status = $this->request->getVar('status_approve');
        $status = $status + 1;
        // dd($status);
        $this->seleksiModel->save([
            'id_proses' => $id,
            'status_approve' => $status,
        ]);
        return redirect()->to('/recruitment/seleksi');
    }
    public function denied($id, $status)
    {
        $seleksi = $this->seleksiModel->findAll();
        foreach ($seleksi as $s) {
            if ($s['id_proses'] == $id) {
                $this->status_daftarModel->save([
                    'id_status' => $status,
                    'id_daftar' => $s['id_daftar'],
                    'status1' => "0"
                ]);
            }
        }
        $this->status_daftarModel->save([
            'id_status' => $status,
            'status3' => "1",
        ]);

        $this->seleksiModel->save([
            'id_proses' => $id,
            'status_pendaftar' => "9",
        ]);
        return redirect()->to('/recruitment/seleksi');
    }
    public function accept($id, $status, $lowong)
    {
        $lowongan = $this->lowonganModel->getAll();
        $seleksi = $this->seleksiModel->findAll();
        foreach ($seleksi as $s) {
            if ($s['id_proses'] == $id) {
                $this->status_daftarModel->save([
                    'id_status' => $status,
                    'id_daftar' => $s['id_daftar'],
                    'status1' => "1"
                ]);
            }
        }
        foreach ($lowongan as $l) {
            if ($l['id_lowongan'] == $lowong) {
                $sisa = $l['sisa'] - 1;
                $this->lowonganModel->save([
                    'id_lowongan' => $lowong,
                    'sisa' => $sisa,
                ]);
            }
        }
        $this->status_daftarModel->save([
            'id_status' => $status,
            'status3' => "1",
        ]);
        $this->seleksiModel->save([
            'id_proses' => $id,
            'status_pendaftar' => "1",
        ]);
        return redirect()->to('/recruitment/seleksi');
    }
    public function databaru()
    {
        $status = $this->status_daftarModel->hasila();
        $data = [
            'halaman' => 'Penambahan Data Karyawan',
            'status' => $status,
            'validation' => \Config\Services::validation(),
        ];
        return view('recruitment/databaru.php', $data);
    }
}
