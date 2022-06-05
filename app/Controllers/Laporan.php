<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\IjinModel;

class Laporan extends BaseController
{
    protected $status_daftarModel;
    protected $seleksiModel;
    protected $lowonganModel;
    protected $absensiModel;
    protected $datadiriModel;
    protected $karyawanModel;
    protected $ijinModel;
    public function __construct()
    {
        $this->ijinModel = new  IjinModel();
        $this->absensiModel = new AbsensiModel();
    }
    public function karyawan()
    {
        $data = [
            'halaman' => 'Laporan Karyawan',
        ];
        return view('laporan/karyawan.php', $data);
    }

    public function masuk()
    {
        $masuk = $this->karyawanModel->masuk();
        $data = [
            'halaman' => 'Laporan Karyawan Masuk',
            'masuk' => $masuk,
        ];
        // dd($masuk);
        return view('laporan/masuk.php', $data);
    }
    public function keluar()
    {
        $data = [
            'halaman' => 'Laporan Karyawan Keluar',
        ];
        return view('laporan/keluar.php', $data);
    }
    public function absensi()
    {
        $daftar = $this->datadiriModel->getAll();
        $absensi = $this->absensiModel->getAll();
        $data = [
            'halaman' => 'Laporan Absensi',
            'absensi' => $this->absensiModel->paginate(10, 'absensi'),
            'pager' => $this->absensiModel->pager,
            'daftar' => $daftar,
        ];
        return view('laporan/absensi.php', $data);
    }
    public function absensi_tampil()
    {
        $data =   $this->request->getVar('date');
        $hasil = $this->absensiModel->absensi($data);
        if (empty($hasil)) {
            session()->setFlashdata('error', 'Data Kosong');
            return redirect()->back();
        }
        $daftar = $this->datadiriModel->getAll();
        $absensi = $this->absensiModel->getAll();
        $data = [
            'halaman' => 'Laporan Absensi',
            'absensi' => $absensi,
            'daftar' => $daftar,
            'hasil' => $hasil,
            'pager' => $this->absensiModel->pager,
        ];
        return view('laporan/absensi.php', $data);
    }
    public function cuti()
    {
        $karyawan = $this->karyawanModel->bekerja();
        $ijin = $this->ijinModel->findAll();
        // $coba = $this->ijinModel->laporan(3);
        // dd($karyawan);
        foreach ($karyawan as $k) {
            foreach ($ijin as $i) {
                if ($k['id_karyawan'] == $i['id_karyawan']) {
                    $lapor = $this->ijinModel->laporan($k['id_karyawan']);
                }
            }
            $total[] = count($lapor);
            $lapor = [];
        }
        // dd($lapor);
        // dd($total);
        $data = [
            'halaman' => 'Laporan Cuti',
            'karyawan' => $karyawan,
            'total' => $total,
        ];
        return view('laporan/cuti.php', $data);
    }
    public function recruitment()
    {
        $currentpage =   $this->request->getVar('page_seleksi') ?   $this->request->getVar('page_seleksi') : 1;
        $jabatan = $this->lowonganModel->getAll();
        $seleksi = $this->seleksiModel->getAll();
        $status = $this->status_daftarModel->hasil();
        $data = [
            'halaman' => 'Laporan Recruitment',
            'recruit' => $this->seleksiModel->orderBy('id_proses', 'DESC')->paginate(10, 'seleksi'),
            'pager' => $this->seleksiModel->pager,
            'seleksi' => $seleksi,
            'jabatan' => $jabatan,
            'status' => $status,
            'page' => $currentpage,
        ];
        return view('laporan/recruitment.php', $data);
    }
    public function performa()
    {
        $data = [
            'halaman' => 'Laporan Performa',
        ];
        return view('laporan/performa.php', $data);
    }
}
