<?php

namespace App\Controllers;

// require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet;
use App\Models\CobaajaModel;
use App\Models\CobaBahasaModel;
use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\LowonganModel;
use App\Models\UploadModel;

class Save extends BaseController
{
    protected $ijinModel;
    protected $absensiModel;
    protected $uploadModel;
    protected $datadiriModel;
    protected $keluargaModel;
    protected $pendidikanModel;
    protected $kursusModel;
    protected $bahasaModel;
    protected $pengalamanModel;
    protected $kenalanModel;
    protected $kegiatanModel;
    protected $keteranganModel;
    protected $interviewModel;
    protected $jabatanModel;
    protected $cobaajaModel;
    protected $karyawanModel;
    protected $lowonganModel;
    protected $status_daftarModel;
    protected $rulecutiModel;
    protected $jenis_ijinModel;
    protected $seleksiModel;
    public function __construct()
    {
        $this->jenis_ijinModel = new \App\Models\Jenis_ijinModel();
        $this->lowonganModel = new LowonganModel();
        $pengalamanModel = new \App\Models\PengalamanModel();
        $ijinModel = new \App\Models\IjinModel();
        $this->karyawanModel = new KaryawanModel();
        $this->rulecutiModel = new \App\Models\Rule_cutiModel();
        $this->ijinModel = new \App\Models\IjinModel();
    }
    public function save()
    {
        if (!$this->validate([
            'posisi2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan Harus diisi',
                ]
            ],
            'nama_daftar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'no_ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No KTP Tidak Boleh Kosong'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat tanggal lahir tidak boleh kosong',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'valid_date',
                'errors' => [
                    'valid_date' => 'Tanggal Lahir tidak boleh kosong',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('pendaftaran/baru')->withInput()->with('validation', $validation);
        }
        if ($this->request->getVar('minat_k') == 0) {
            $minatk = "0";
            $minatl = $this->request->getVar('minat_l');
        } else {
            $minatk = $this->request->getVar('minat_k');
            $minatl = "0";
        }
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        if ($foto->isValid() && !$foto->hasMoved()) {
            $foto->move(ROOTPATH . 'public/foto/', $namafoto);
            session()->setFlashData('foto', 'Berhasil upload');
        } else {
            $namafoto = 'default.jpg';
            session()->setFlashData('foto', 'Gagal upload');
        }
        $this->datadiriModel->save([
            'id_lowongan' => $this->request->getVar('posisi'),
            'id_jabatan' => $this->request->getVar('posisi2'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'nama' => $this->request->getVar('nama_daftar'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('domisili'),
            'no_hp'  => $this->request->getVar('no_hp'),
            'telp'  => $this->request->getVar('no_telp'),
            'jekel' => $this->request->getVar('jekel_d'),
            'agama' => $this->request->getVar('agama'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'suku_bangsa' => $this->request->getVar('suku_bangsa'),
            'anak_nomor'  => $this->request->getVar('anak_nomor'),
            'status_menikah'  => $this->request->getVar('status_m'),
            'tahun_menikah' => $this->request->getVar('tahun_menikah'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'gaji_diharapkan' => $this->request->getVar('gaji_diharapkan'),
            'transportasi'  => $this->request->getVar('transportasi'),
            'minat' => $minatk,
            'minat_l' => $minatl,
            'nama_kerabat'  => $this->request->getVar('nama_kerabat'),
            'telp_kerabat' => $this->request->getVar('telp_kerabat'),
            'hubungan_kerabat'  => $this->request->getVar('hubungan_kerabat'),
            'foto_d' => $namafoto,
        ]);
        $id_daftar = $this->datadiriModel->awal();
        $nama_k = $this->request->getVar('nama_k');
        $jekel_k = $this->request->getVar('jekel_k');
        $usia_k = $this->request->getVar('usia_k');
        $pendidikan_k  = $this->request->getVar('pendidikan_k');
        $pekerjaan_k  = $this->request->getVar('pekerjaan_k');
        $m_bm_k  = $this->request->getVar('m_bm');
        $status_k  = $this->request->getVar('status_k');
        if (isset($nama_k)) {
            foreach ($nama_k as $k => $i) {
                $this->keluargaModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_k' =>  $i,
                    'jekel_k'   => $jekel_k[$k],
                    'usia' => $usia_k[$k],
                    'pendidikan' => $pendidikan_k[$k],
                    'pekerjaan' => $pekerjaan_k[$k],
                    'm_bm' => $m_bm_k[$k],
                    'status_k' => $status_k[$k],
                ]);
            }
        }
        $this->status_daftarModel->save([
            'id_daftar' => $id_daftar[0]['id_daftar'],
            'status1' => "0",
            'status2' => "0",
            'status3' => "0",
        ]);
        $this->seleksiModel->save([
            'id_lowongan' =>   $this->request->getVar('posisi'),
            'id_daftar' => $id_daftar[0]['id_daftar'],
            'status_approve' => "0",
            'status_pendaftar' => "0",

        ]);

        $nama_p = $this->request->getVar('nama_p');
        $jurusan_p = $this->request->getVar('jurusan_p');
        $IPK = $this->request->getVar('IPK_p');
        $masuk_p = $this->request->getVar('masuk_p');
        $lulus_p = $this->request->getVar('keluar_p');
        $status_p = $this->request->getVar('status_p');
        if (isset($nama_p)) {
            foreach ($nama_p as $k => $i) {
                $this->pendidikanModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_p' =>  $i,
                    'jurusan_p'   => $jurusan_p[$k],
                    'ipk' => $IPK[$k],
                    'masuk' => $masuk_p[$k],
                    'lulus' => $lulus_p[$k],
                    'status_p' => $status_p[$k],
                ]);
            }
        }
        $nama_ku  = $this->request->getVar('jenis_ku');
        $tahun_ku  = $this->request->getVar('tahun_ku');
        $durasi_ku  = $this->request->getVar('durasi_ku');
        $berijazah_ku  = $this->request->getVar('keterangan_ku');
        $dibiayai_ku  = $this->request->getVar('dibiayai_ku');
        if (isset($nama_ku)) {
            foreach ($nama_ku as $k => $i) {
                $this->kursusModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_ku' =>  $i,
                    'tahun_ku'   => $tahun_ku[$k],
                    'durasi' => $durasi_ku[$k],
                    'berijazah' => $berijazah_ku[$k],
                    'dibiayai' => $dibiayai_ku[$k],
                ]);
            }
        }
        $nama_b = $this->request->getVar('bahasa');
        $status_b = $this->request->getVar('aktif_pasif');
        if (isset($nama_b)) {
            foreach ($nama_b as $k => $i) {
                $this->bahasaModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_b' =>  $i,
                    'status_b'   => $status_b[$k],
                ]);
            }
        }
        $tahun_masuk =   $this->request->getVar('tahun_masuk');
        $tahun_keluar =   $this->request->getVar('tahun_keluar');
        $nama_perusahaan =   $this->request->getVar('nama_perusahaan');
        $jabatan_p =   $this->request->getVar('jabatan_p');
        $gaji_tunjangan =   $this->request->getVar('gaji_tunjangan');
        $alasan_p =   $this->request->getVar('alasan_p');
        if (isset($nama_perusahaan)) {
            foreach ($nama_perusahaan as $k => $i) {
                $this->pengalamanModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'tahun_masuk' => $tahun_masuk[$k],
                    'tahun_keluar' => $tahun_keluar[$k],
                    'nama_perusahaan' => $i,
                    'jabatan_p' => $jabatan_p[$k],
                    'gaji_tunjangan' => $gaji_tunjangan[$k],
                    'alasan_p' => $alasan_p[$k],
                ]);
            }
        }
        $nama_kenalan =   $this->request->getVar('nama_ken');
        $alamat_kenalan =   $this->request->getVar('alamat_ken');
        $telp_kenalan =   $this->request->getVar('nmr_telp_ken');
        $jabatan_kenalan =   $this->request->getVar('jabatan_ken');
        $hubungan_kenalan =   $this->request->getVar('hubungan_ken');
        $status_kenalan =   $this->request->getVar('status_ken');
        if (isset($status_kenalan)) {
            foreach ($status_kenalan as $k => $i) {
                $this->kenalanModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_kenalan' => $nama_kenalan[$k],
                    'alamat_kenalan' => $alamat_kenalan[$k],
                    'telp_kenalan' => $telp_kenalan[$k],
                    'jabatan_kenalan' => $jabatan_kenalan[$k],
                    'hubungan_kenalan' => $hubungan_kenalan[$k],
                    'status_kenalan' => $i,
                ]);
            }
        }

        $nama_o =   $this->request->getVar('nama_o');
        $jenis_o =   $this->request->getVar('jenis_o');
        $tahun_o =   $this->request->getVar('tahun_o');
        $jabatan_o =   $this->request->getVar('jabatan_o');
        $aktif_o =   $this->request->getVar('aktif_o');
        $pengalaman_o =   $this->request->getVar('pengalaman_o');
        if (isset($nama_o)) {
            foreach ($nama_o as $k => $i) {
                $this->kegiatanModel->save([
                    'id_daftar' => $id_daftar[0]['id_daftar'],
                    'nama_organisasi' => $i,
                    'jenis_o' => $jenis_o[$k],
                    'tahun_o' => $tahun_o[$k],
                    'jabatan_o' => $jabatan_o[$k],
                    'aktif' => $aktif_o[$k],
                    'pengalaman_o' => $pengalaman_o[$k],
                ]);
            }
        }
        if ($this->request->getVar('jawaban1') == 0) {
            $jawab1 = $this->request->getVar('jawaban1_1');
        } else if ($this->request->getVar('jawaban1') == 1) {
            $jawab1 = "";
        }
        if ($this->request->getVar('jawaban2') == 0) {
            $jawab2 = $this->request->getVar('jawaban2_1');
        } else if ($this->request->getVar('jawaban2') == 1) {
            $jawab2 = "";
        }
        if ($this->request->getVar('jawaban4') == 1) {
            $jawab4 = $this->request->getVar('jawaban4_1');
        } else if ($this->request->getVar('jawaban4') == 0) {
            $jawab4 = "";
        }
        if ($this->request->getVar('jawaban5') == 1) {
            $jawab5 = $this->request->getVar('jawaban5_1');
        } else if ($this->request->getVar('jawaban5') == 0) {
            $jawab5 = "";
        }
        if ($this->request->getVar('jawaban6') == 1) {
            $jawab6 = $this->request->getVar('jawaban6_1');
        } else if ($this->request->getVar('jawaban6') == 0) {
            $jawab6 = "";
        }
        if ($this->request->getVar('jawaban7') == 1) {
            $jawab7 = $this->request->getVar('jawaban7_1');
        } else if ($this->request->getVar('jawaban7') == 0) {
            $jawab7 = "";
        }
        if ($this->request->getVar('jawaban12') == 1) {
            $jawab12 = $this->request->getVar('jawaban12_1');
        } else if ($this->request->getVar('jawaban12') == 0) {
            $jawab12 = "";
        }
        if ($this->request->getVar('jawaban13') == 1) {
            $jawab13 = $this->request->getVar('jawaban13_1');
        } else if ($this->request->getVar('jawaban13') == 0) {
            $jawab13 = "";
        }
        if ($this->request->getVar('jawaban14') == 1) {
            $jawab14 = $this->request->getVar('jawaban14_1');
        } else if ($this->request->getVar('jawaban14') == 0) {
            $jawab14 = "";
        }
        $this->keteranganModel->save([
            'id_daftar' => $id_daftar[0]['id_daftar'],
            'jawaban1' => $this->request->getVar('jawaban1'),
            'jawaban1_1' =>   $jawab1,
            'jawaban2' => $this->request->getVar('jawaban2'),
            'jawaban2_1' =>   $jawab2,
            'jawaban3' => $this->request->getVar('jawaban3'),
            'jawaban4' => $this->request->getVar('jawaban4'),
            'jawaban4_1' =>   $jawab4,
            'jawaban5' => $this->request->getVar('jawaban5'),
            'jawaban5_1' =>   $jawab5,
            'jawaban6' => $this->request->getVar('jawaban6'),
            'jawaban6_1' =>   $jawab6,
            'jawaban7' => $this->request->getVar('jawaban7'),
            'jawaban7_1' =>   $jawab7,
            'jawaban8' => $this->request->getVar('jawaban8'),
            'jawaban9' => $this->request->getVar('jawaban9'),
            'jawaban10' => $this->request->getVar('jawaban10'),
            'jawaban11' => $this->request->getVar('jawaban11'),
            'jawaban12' => $this->request->getVar('jawaban12'),
            'jawaban12_1' =>   $jawab12,
            'jawaban13' => $this->request->getVar('jawaban13'),
            'jawaban13_1' =>   $jawab13,
            'jawaban14' => $this->request->getVar('jawaban14'),
            'jawaban14_1' =>   $jawab14,
            'jawaban15_1' => $this->request->getVar('jawaban15_1'),
            'jawaban15_2' => $this->request->getVar('jawaban15_2'),
            'jawaban15_3' => $this->request->getVar('jawaban15_3'),
            'jawaban15_4' => $this->request->getVar('jawaban15_4'),
            'jawaban15_5' => $this->request->getVar('jawaban15_5'),
            'jawaban15_6' => $this->request->getVar('jawaban15_6'),
            'jawaban15_7' => $this->request->getVar('jawaban15_7'),
            'jawaban15_8' => $this->request->getVar('jawaban15_8'),
        ]);


        $this->interviewModel->save([
            'id_daftar' => $id_daftar[0]['id_daftar'],
            'jawaban1i' => $this->request->getVar('jawaban1i'),
            'jawaban2i' => $this->request->getVar('jawaban2i'),
            'jawaban3i' => $this->request->getVar('jawaban3i'),
            'jawaban4i' => $this->request->getVar('jawaban4i'),
            'jawaban5i' => $this->request->getVar('jawaban5i'),
            'jawaban6i' => $this->request->getVar('jawaban6i'),
            'jawaban7_1i' => $this->request->getVar('jawaban7_1i'),
            'jawaban7_2i' => $this->request->getVar('jawaban7_2i'),
            'jawaban7_3i' => $this->request->getVar('jawaban7_3i'),
            'jawaban7_4i' => $this->request->getVar('jawaban7_4i'),
            'jawaban8i' => $this->request->getVar('jawaban8i'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/pendaftaran/baru');
    }
    public function edit_daftar($id)
    {
        if ($this->request->getVar('minat_k') == 0) {
            $minatk = "0";
            $minatl = $this->request->getVar('minat_l');
        } else {
            $minatk = $this->request->getVar('minat_k');
            $minatl = "0";
        }
        $lama =   $this->request->getVar('fotolama');
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        // dd(isset($lama));
        if ($lama == $namafoto) {
            $namafoto = $lama;
        } else {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $foto->move(ROOTPATH . 'public/foto/', $namafoto);
                if ($lama != 'default.jpg') {

                    unlink('foto/' . $lama);
                }
            } else {
                $namafoto = 'default.jpg';
            }
        }
        $this->datadiriModel->save([
            'id_daftar' => $id,
            'id_lowongan' => $this->request->getVar('posisi'),
            'id_jabatan' => $this->request->getVar('posisi2'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'nama' => $this->request->getVar('nama_daftar'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('domisili'),
            'no_hp'  => $this->request->getVar('no_hp'),
            'telp'  => $this->request->getVar('no_telp'),
            'jekel' => $this->request->getVar('jekel_d'),
            'agama' => $this->request->getVar('agama'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'suku_bangsa' => $this->request->getVar('suku_bangsa'),
            'anak_nomor'  => $this->request->getVar('anak_nomor'),
            'status_menikah'  => $this->request->getVar('status_m'),
            'tahun_menikah' => $this->request->getVar('tahun_menikah'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'gaji_diharapkan' => $this->request->getVar('gaji_diharapkan'),
            'transportasi'  => $this->request->getVar('transportasi'),
            'minat' => $minatk,
            'minat_l' => $minatl,
            'nama_kerabat'  => $this->request->getVar('nama_kerabat'),
            'telp_kerabat' => $this->request->getVar('telp_kerabat'),
            'hubungan_kerabat'  => $this->request->getVar('hubungan_kerabat'),
            'foto_d' => $namafoto,
        ]);
        $nama_k = $this->request->getVar('nama_k');
        $jekel_k = $this->request->getVar('jekel_k');
        $usia_k = $this->request->getVar('usia_k');
        $pendidikan_k  = $this->request->getVar('pendidikan_k');
        $pekerjaan_k  = $this->request->getVar('pekerjaan_k');
        $m_bm_k  = $this->request->getVar('m_bm');
        $status_k  = $this->request->getVar('status_k');
        $id_keluarga =   $this->request->getVar('id_keluarga');
        $cari_kel = $this->keluargaModel->cari($id);
        foreach ($cari_kel as $c) {
            foreach ($id_keluarga as $i) {
                if ($c['id_keluarga'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_keluarga']) {
                $indek3[] = $c['id_keluarga'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->keluargaModel->delete($i);
            }
        }
        if (isset($nama_k)) {
            foreach ($nama_k as $k => $i) {
                if (isset($id_keluarga[$k])) {
                    $this->keluargaModel->save([
                        'id_keluarga' => $id_keluarga[$k],
                        'id_daftar' => $id,
                        'nama_k' =>  $i,
                        'jekel_k'   => $jekel_k[$k],
                        'usia' => $usia_k[$k],
                        'pendidikan' => $pendidikan_k[$k],
                        'pekerjaan' => $pekerjaan_k[$k],
                        'm_bm' => $m_bm_k[$k],
                        'status_k' => $status_k[$k],
                    ]);
                } else if (empty($id_keluarga[$k])) {
                    $this->keluargaModel->save([
                        'id_daftar' => $id,
                        'nama_k' =>  $i,
                        'jekel_k'   => $jekel_k[$k],
                        'usia' => $usia_k[$k],
                        'pendidikan' => $pendidikan_k[$k],
                        'pekerjaan' => $pekerjaan_k[$k],
                        'm_bm' => $m_bm_k[$k],
                        'status_k' => $status_k[$k],
                    ]);
                }
            }
        }
        $id_pendidikan =  $this->request->getVar('id_pendidikan');
        $nama_p = $this->request->getVar('nama_p');
        $jurusan_p = $this->request->getVar('jurusan_p');
        $IPK = $this->request->getVar('IPK_p');
        $masuk_p = $this->request->getVar('masuk_p');
        $lulus_p = $this->request->getVar('keluar_p');
        $status_p = $this->request->getVar('status_p');
        $cari_pen = $this->pendidikanModel->cari($id);
        foreach ($cari_pen as $c) {
            foreach ($id_pendidikan as $i) {
                if ($c['id_pendidikan'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_pendidikan']) {
                $indek3[] = $c['id_pendidikan'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->pendidikanModel->delete($i);
            }
        }
        if (isset($nama_p)) {
            foreach ($nama_p as $k => $i) {
                if (isset($id_pendidikan[$k])) {
                    $this->pendidikanModel->save([
                        'id_pendidikan' => $id_pendidikan[$k],
                        'id_daftar' => $id,
                        'nama_p' =>  $i,
                        'jurusan_p'   => $jurusan_p[$k],
                        'IPK' => $IPK[$k],
                        'masuk' => $masuk_p[$k],
                        'lulus' => $lulus_p[$k],
                        'status_p' => $status_p[$k],
                    ]);
                } else if (empty($id_pendidikan[$k])) {
                    $this->pendidikanModel->save([
                        'id_daftar' => $id,
                        'nama_p' =>  $i,
                        'jurusan_p'   => $jurusan_p[$k],
                        'IPK' => $IPK[$k],
                        'masuk' => $masuk_p[$k],
                        'lulus' => $lulus_p[$k],
                        'status_p' => $status_p[$k],
                    ]);
                }
            }
        }
        $id_kursus =   $this->request->getVar('id_kursus');
        $nama_ku  = $this->request->getVar('jenis_ku');
        $tahun_ku  = $this->request->getVar('tahun_ku');
        $durasi_ku  = $this->request->getVar('durasi_ku');
        $berijazah_ku  = $this->request->getVar('keterangan_ku');
        $dibiayai_ku  = $this->request->getVar('dibiayai_ku');
        $cari_kur = $this->kursusModel->cari($id);
        foreach ($cari_kur as $c) {
            foreach ($id_kursus as $i) {
                if ($c['id_kursus'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_kursus']) {
                $indek3[] = $c['id_kursus'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->kursusModel->delete($i);
            }
        }
        if (isset($nama_ku)) {
            foreach ($nama_ku as $k => $i) {
                if (isset($id_kursus[$k])) {
                    $this->kursusModel->save([
                        'id_kursus' => $id_kursus[$k],
                        'id_daftar' => $id,
                        'nama_ku' =>  $i,
                        'tahun_ku'   => $tahun_ku[$k],
                        'durasi' => $durasi_ku[$k],
                        'berijazah' => $berijazah_ku[$k],
                        'dibiayai' => $dibiayai_ku[$k],
                    ]);
                } else if (empty($id_kursus[$k])) {
                    $this->kursusModel->save([
                        'id_daftar' => $id,
                        'nama_ku' =>  $i,
                        'tahun_ku'   => $tahun_ku[$k],
                        'durasi' => $durasi_ku[$k],
                        'berijazah' => $berijazah_ku[$k],
                        'dibiayai' => $dibiayai_ku[$k],
                    ]);
                }
            }
        }
        $nama_b = $this->request->getVar('bahasa');
        $id_bahasa = $this->request->getVar('id_bahasa');
        $status_b = $this->request->getVar('aktif_pasif');
        $cari_bahasa = $this->bahasaModel->cari($id);
        foreach ($cari_bahasa as $c) {
            foreach ($id_bahasa as $i) {
                if ($c['id_bahasa'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_bahasa']) {
                $indek3[] = $c['id_bahasa'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->bahasaModel->delete($i);
            }
        }
        if (isset($nama_b)) {
            foreach ($nama_b as $k => $i) {
                if (isset($id_bahasa[$k])) {
                    $this->bahasaModel->save([
                        'id_bahasa' => $id_bahasa[$k],
                        'id_daftar' => $id,
                        'nama_b' =>  $i,
                        'status_b'   => $status_b[$k],
                    ]);
                } else if (empty($id_bahasa[$k])) {
                    $this->bahasaModel->save([
                        'id_daftar' => $id,
                        'nama_b' =>  $i,
                        'status_b'   => $status_b[$k],
                    ]);
                }
            }
        }
        $id_pengalaman =   $this->request->getVar('id_pengalaman');
        $tahun_masuk =   $this->request->getVar('tahun_masuk');
        $tahun_keluar =   $this->request->getVar('tahun_keluar');
        $nama_perusahaan =   $this->request->getVar('nama_perusahaan');
        $jabatan_p =   $this->request->getVar('jabatan_p');
        $gaji_tunjangan =   $this->request->getVar('gaji_tunjangan');
        $alasan_p =   $this->request->getVar('alasan_p');
        $cari_peng = $this->pengalamanModel->cari($id);
        foreach ($cari_peng as $c) {
            foreach ($id_pengalaman as $i) {
                if ($c['id_pengalaman'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_pengalaman']) {
                $indek3[] = $c['id_pengalaman'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->pengalamanModel->delete($i);
            }
        }
        if (isset($nama_perusahaan)) {
            foreach ($nama_perusahaan as $k => $i) {
                if (isset($id_pengalaman[$k])) {
                    $this->pengalamanModel->save([
                        'id_pengalaman' => $id_pengalaman[$k],
                        'id_daftar' => $id,
                        'tahun_masuk' => $tahun_masuk[$k],
                        'tahun_keluar' => $tahun_keluar[$k],
                        'nama_perusahaan' => $i,
                        'jabatan_p' => $jabatan_p[$k],
                        'gaji_tunjangan' => $gaji_tunjangan[$k],
                        'alasan_p' => $alasan_p[$k],
                    ]);
                } else if (empty($id_pengalaman[$k])) {
                    $this->pengalamanModel->save([
                        'id_daftar' => $id,
                        'tahun_masuk' => $tahun_masuk[$k],
                        'tahun_keluar' => $tahun_keluar[$k],
                        'nama_perusahaan' => $i,
                        'jabatan_p' => $jabatan_p[$k],
                        'gaji_tunjangan' => $gaji_tunjangan[$k],
                        'alasan_p' => $alasan_p[$k],
                    ]);
                }
            }
        }
        $id_kenalan =   $this->request->getVar('id_kenalan');
        $nama_kenalan =   $this->request->getVar('nama_ken');
        $alamat_kenalan =   $this->request->getVar('alamat_ken');
        $telp_kenalan =   $this->request->getVar('nmr_telp_ken');
        $jabatan_kenalan =   $this->request->getVar('jabatan_ken');
        $hubungan_kenalan =   $this->request->getVar('hubungan_ken');
        $status_kenalan =   $this->request->getVar('status_ken');
        $cari_ken = $this->kenalanModel->cari($id);
        foreach ($cari_ken as $c) {
            foreach ($id_kenalan as $i) {
                if ($c['id_kenalan'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_kenalan']) {
                $indek3[] = $c['id_kenalan'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->kenalanModel->delete($i);
            }
        }
        if (isset($status_kenalan)) {
            foreach ($status_kenalan as $k => $i) {
                if (isset($id_kenalan[$k])) {
                    $this->kenalanModel->save([
                        'id_kenalan' => $id_kenalan[$k],
                        'id_daftar' => $id,
                        'nama_kenalan' => $nama_kenalan[$k],
                        'alamat_kenalan' => $alamat_kenalan[$k],
                        'telp_kenalan' => $telp_kenalan[$k],
                        'jabatan_kenalan' => $jabatan_kenalan[$k],
                        'hubungan_kenalan' => $hubungan_kenalan[$k],
                        'status_kenalan' => $i,
                    ]);
                } else if (empty($id_kenalan[$k])) {
                    $this->kenalanModel->save([
                        'id_daftar' => $id,
                        'nama_kenalan' => $nama_kenalan[$k],
                        'alamat_kenalan' => $alamat_kenalan[$k],
                        'telp_kenalan' => $telp_kenalan[$k],
                        'jabatan_kenalan' => $jabatan_kenalan[$k],
                        'hubungan_kenalan' => $hubungan_kenalan[$k],
                        'status_kenalan' => $i,
                    ]);
                }
            }
        }
        $id_kegiatan =   $this->request->getVar('id_kegiatan');
        $nama_o =   $this->request->getVar('nama_o');
        $jenis_o =   $this->request->getVar('jenis_o');
        $tahun_o =   $this->request->getVar('tahun_o');
        $jabatan_o =   $this->request->getVar('jabatan_o');
        $aktif_o =   $this->request->getVar('aktif_o');
        $pengalaman_o =   $this->request->getVar('pengalaman_o');
        $cari_keg = $this->kegiatanModel->cari($id);
        foreach ($cari_keg as $c) {
            foreach ($id_kegiatan as $i) {
                if ($c['id_kegiatan'] == $i) {
                    $indek2 = $i;
                }
            }
            if ($indek2 != $c['id_kegiatan']) {
                $indek3[] = $c['id_kegiatan'];
            }
        }
        if (isset($indek3)) {
            foreach ($indek3 as $i) {
                $this->kegiatanModel->delete($i);
            }
        }
        if (isset($nama_o)) {
            foreach ($nama_o as $k => $i) {
                if (isset($id_kegiatan[$k])) {
                    $this->kegiatanModel->save([
                        'id_kegiatan' => $id_kegiatan[$k],
                        'id_daftar' => $id,
                        'nama_organisasi' => $i,
                        'jenis_o' => $jenis_o[$k],
                        'tahun_o' => $tahun_o[$k],
                        'jabatan_o' => $jabatan_o[$k],
                        'aktif' => $aktif_o[$k],
                        'pengalaman_o' => $pengalaman_o[$k],
                    ]);
                } else if (empty($id_kegiatan[$k])) {
                    $this->kegiatanModel->save([
                        'id_daftar' => $id,
                        'nama_organisasi' => $i,
                        'jenis_o' => $jenis_o[$k],
                        'tahun_o' => $tahun_o[$k],
                        'jabatan_o' => $jabatan_o[$k],
                        'aktif' => $aktif_o[$k],
                        'pengalaman_o' => $pengalaman_o[$k],
                    ]);
                }
            }
        }
        if ($this->request->getVar('jawaban1') == 0) {
            $jawab1 = $this->request->getVar('jawaban1_1');
        } else if ($this->request->getVar('jawaban1') == 1) {
            $jawab1 = "";
        }
        if ($this->request->getVar('jawaban2') == 0) {
            $jawab2 = $this->request->getVar('jawaban2_1');
        } else if ($this->request->getVar('jawaban2') == 1) {
            $jawab2 = "";
        }
        if ($this->request->getVar('jawaban4') == 1) {
            $jawab4 = $this->request->getVar('jawaban4_1');
        } else if ($this->request->getVar('jawaban4') == 0) {
            $jawab4 = "";
        }
        if ($this->request->getVar('jawaban5') == 1) {
            $jawab5 = $this->request->getVar('jawaban5_1');
        } else if ($this->request->getVar('jawaban5') == 0) {
            $jawab5 = "";
        }
        if ($this->request->getVar('jawaban6') == 1) {
            $jawab6 = $this->request->getVar('jawaban6_1');
        } else if ($this->request->getVar('jawaban6') == 0) {
            $jawab6 = "";
        }
        if ($this->request->getVar('jawaban7') == 1) {
            $jawab7 = $this->request->getVar('jawaban7_1');
        } else if ($this->request->getVar('jawaban7') == 0) {
            $jawab7 = "";
        }
        if ($this->request->getVar('jawaban12') == 1) {
            $jawab12 = $this->request->getVar('jawaban12_1');
        } else if ($this->request->getVar('jawaban12') == 0) {
            $jawab12 = "";
        }
        if ($this->request->getVar('jawaban13') == 1) {
            $jawab13 = $this->request->getVar('jawaban13_1');
        } else if ($this->request->getVar('jawaban13') == 0) {
            $jawab13 = "";
        }
        if ($this->request->getVar('jawaban14') == 1) {
            $jawab14 = $this->request->getVar('jawaban14_1');
        } else if ($this->request->getVar('jawaban14') == 0) {
            $jawab14 = "";
        }
        $id_keterangan = $this->request->getVar('id_keterangan');
        if (isset($id_keterangan)) {
            $this->keteranganModel->save([
                'id_daftar' => $id,
                'id_keterangan' => $id_keterangan,
                'jawaban1' => $this->request->getVar('jawaban1'),
                'jawaban1_1' =>   $jawab1,
                'jawaban2' => $this->request->getVar('jawaban2'),
                'jawaban2_1' =>   $jawab2,
                'jawaban3' => $this->request->getVar('jawaban3'),
                'jawaban4' => $this->request->getVar('jawaban4'),
                'jawaban4_1' =>   $jawab4,
                'jawaban5' => $this->request->getVar('jawaban5'),
                'jawaban5_1' =>   $jawab5,
                'jawaban6' => $this->request->getVar('jawaban6'),
                'jawaban6_1' =>   $jawab6,
                'jawaban7' => $this->request->getVar('jawaban7'),
                'jawaban7_1' =>   $jawab7,
                'jawaban8' => $this->request->getVar('jawaban8'),
                'jawaban9' => $this->request->getVar('jawaban9'),
                'jawaban10' => $this->request->getVar('jawaban10'),
                'jawaban11' => $this->request->getVar('jawaban11'),
                'jawaban12' => $this->request->getVar('jawaban12'),
                'jawaban12_1' =>   $jawab12,
                'jawaban13' => $this->request->getVar('jawaban13'),
                'jawaban13_1' =>   $jawab13,
                'jawaban14' => $this->request->getVar('jawaban14'),
                'jawaban14_1' =>   $jawab14,
                'jawaban15_1' => $this->request->getVar('jawaban15_1'),
                'jawaban15_2' => $this->request->getVar('jawaban15_2'),
                'jawaban15_3' => $this->request->getVar('jawaban15_3'),
                'jawaban15_4' => $this->request->getVar('jawaban15_4'),
                'jawaban15_5' => $this->request->getVar('jawaban15_5'),
                'jawaban15_6' => $this->request->getVar('jawaban15_6'),
                'jawaban15_7' => $this->request->getVar('jawaban15_7'),
                'jawaban15_8' => $this->request->getVar('jawaban15_8'),
            ]);
        } else if (empty($id_keterangan)) {
            $this->keteranganModel->save([
                'id_daftar' => $id,
                'jawaban1' => $this->request->getVar('jawaban1'),
                'jawaban1_1' =>   $jawab1,
                'jawaban2' => $this->request->getVar('jawaban2'),
                'jawaban2_1' =>   $jawab2,
                'jawaban3' => $this->request->getVar('jawaban3'),
                'jawaban4' => $this->request->getVar('jawaban4'),
                'jawaban4_1' =>   $jawab4,
                'jawaban5' => $this->request->getVar('jawaban5'),
                'jawaban5_1' =>   $jawab5,
                'jawaban6' => $this->request->getVar('jawaban6'),
                'jawaban6_1' =>   $jawab6,
                'jawaban7' => $this->request->getVar('jawaban7'),
                'jawaban7_1' =>   $jawab7,
                'jawaban8' => $this->request->getVar('jawaban8'),
                'jawaban9' => $this->request->getVar('jawaban9'),
                'jawaban10' => $this->request->getVar('jawaban10'),
                'jawaban11' => $this->request->getVar('jawaban11'),
                'jawaban12' => $this->request->getVar('jawaban12'),
                'jawaban12_1' =>   $jawab12,
                'jawaban13' => $this->request->getVar('jawaban13'),
                'jawaban13_1' =>   $jawab13,
                'jawaban14' => $this->request->getVar('jawaban14'),
                'jawaban14_1' =>   $jawab14,
                'jawaban15_1' => $this->request->getVar('jawaban15_1'),
                'jawaban15_2' => $this->request->getVar('jawaban15_2'),
                'jawaban15_3' => $this->request->getVar('jawaban15_3'),
                'jawaban15_4' => $this->request->getVar('jawaban15_4'),
                'jawaban15_5' => $this->request->getVar('jawaban15_5'),
                'jawaban15_6' => $this->request->getVar('jawaban15_6'),
                'jawaban15_7' => $this->request->getVar('jawaban15_7'),
                'jawaban15_8' => $this->request->getVar('jawaban15_8'),
            ]);
        }

        $id_interview =   $this->request->getVar('id_interview');
        if (isset($id_interview)) {
            $this->interviewModel->save([
                'id_daftar' => $id,
                'id_interview' => $id_interview,
                'jawaban1i' => $this->request->getVar('jawaban1i'),
                'jawaban2i' => $this->request->getVar('jawaban2i'),
                'jawaban3i' => $this->request->getVar('jawaban3i'),
                'jawaban4i' => $this->request->getVar('jawaban4i'),
                'jawaban5i' => $this->request->getVar('jawaban5i'),
                'jawaban6i' => $this->request->getVar('jawaban6i'),
                'jawaban7_1i' => $this->request->getVar('jawaban7_1i'),
                'jawaban7_2i' => $this->request->getVar('jawaban7_2i'),
                'jawaban7_3i' => $this->request->getVar('jawaban7_3i'),
                'jawaban7_4i' => $this->request->getVar('jawaban7_4i'),
                'jawaban8i' => $this->request->getVar('jawaban8i'),
            ]);
        } else if (empty($id_interview)) {
            $this->interviewModel->save([
                'id_daftar' => $id,
                'jawaban1i' => $this->request->getVar('jawaban1i'),
                'jawaban2i' => $this->request->getVar('jawaban2i'),
                'jawaban3i' => $this->request->getVar('jawaban3i'),
                'jawaban4i' => $this->request->getVar('jawaban4i'),
                'jawaban5i' => $this->request->getVar('jawaban5i'),
                'jawaban6i' => $this->request->getVar('jawaban6i'),
                'jawaban7_1i' => $this->request->getVar('jawaban7_1i'),
                'jawaban7_2i' => $this->request->getVar('jawaban7_2i'),
                'jawaban7_3i' => $this->request->getVar('jawaban7_3i'),
                'jawaban7_4i' => $this->request->getVar('jawaban7_4i'),
                'jawaban8i' => $this->request->getVar('jawaban8i'),
            ]);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
        return redirect()->to('/home/profil_daftar/' . $id);
    }
    public function jabatan()
    {
        $data = [
            'jabatan' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'indek' => $this->request->getVar('indek'),
            'parent_indek' => $this->request->getVar('parent_indek'),
            'divisi' => $this->request->getVar('divisi'),
            'enable' => 1,
        ];
        $this->jabatanModel->save($data);
        return redirect()->to('/pendaftaran/jabatan');
    }
    public function editjabatan($id)
    {
        $data = [
            'id_jabatan' => $id,
            'jabatan' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'indek' => $this->request->getVar('indek'),
            'parent_indek' => $this->request->getVar('parent_indek'),
            'divisi' => $this->request->getVar('divisi'),
            'enable' =>   $this->request->getVar('enable'),
        ];

        $this->jabatanModel->save($data);
        return redirect()->to('/pendaftaran/jabatan');
    }

    public function upload()
    {

        $file = $this->request->getFile('filex');
        $files = $file->getName();
        $this->uploadModel->save([
            'tanggal' => date('Y-m-d'),
            'nama_file' => $files,
            'status' => "Data berhasil Ditambahkan"
        ]);
        $ext = $file->getClientExtension();
        if ($ext == 'xls') {

            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render  = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $idu =   $this->uploadModel->awal();
        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();
        foreach ($sheet as $i => $data) {
            $count = $i;
            if ($i == 0) {
                continue;
            }
            if (empty($data['1'])) {
                continue;
            }
            $this->absensiModel->save([
                'id_upload' => $idu[0]['id_upload'],
                'id_karyawan' => $data['1'],
                'pin' => $data['2'],
                'tanggal_a' => $data['3'],
                'jam' => $data['4'],
                'status_a' => $data['5'],
                'sn_mesin' => $data['6'],
                'nama_mesin' => $data['7'],
            ]);
        }
        if ($count != 0) {
            session()->setFlashdata('message', $count - 1 . ' Record inserted successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            // Set Session
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
        }



        return redirect()->to('/absensi/upload');
    }
    public function harian()
    {
        $kar = $this->request->getVar('id_karyawan');
        $jen = $this->request->getVar('nama');
        $ijin = $this->jenis_ijinModel->findAll();
        $data = [
            'id_karyawan' => $kar,
            'id_jenis' => $jen,
        ];
        $cek = $this->rulecutiModel->status($kar, $jen);
        $angka = count($cek);
        foreach ($ijin as $i) {
            if ($jen == $i['id_jenis']) {
                $total = $i['total_ijin'];
            }
        }
        if ($angka < $total) {
            $this->rulecutiModel->save($data);
        } else {
            session()->setFlashData('message1', 'Jumlah ijin sudah habis');
            return redirect()->to('/absensi/harian');
        }
        $data2 = [
            'id_karyawan' => $kar,
            'id_jenis' => $jen,
            'surat' =>   $this->request->getVar('surat'),
            'status_i' =>   $this->request->getVar('status'),
        ];
        $this->ijinModel->save($data2);
        session()->setFlashData('message', 'Berhasil Ditambahkan');
        return redirect()->to('/absensi/harian');
    }
    public function editijin($id)
    {
        $file = $this->request->getFile('surat');
        $name = $file->getName();
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/', $name);
            session()->setFlashData('message', 'Berhasil uploaddata');
        } else {
            session()->setFlashData('message', 'dokumen belum ada');
        }
        $data = [
            'id_ijin' => $id,
            'surat' =>   $name,
            'status_i' =>  $this->request->getVar('status'),
        ];
        $this->ijinModel->save($data);
        return redirect()->to('/absensi/harian');
    }

    public function lowongan()
    {
        $data = [
            'id_jabatan'  => $this->request->getVar('id_jabatan'),
            'jumlah'  => $this->request->getVar('jumlah'),
            'sisa' =>   $this->request->getVar('jumlah'),
            'tgl_start'  => $this->request->getVar('tgl_start'),
            'tgl_exp'  => $this->request->getVar('tgl_exp'),
            'status'  => $this->request->getVar('status'),
            'note'  => $this->request->getVar('note'),
        ];
        $this->lowonganModel->save($data);

        return redirect()->to('/recruitment/lowongan');
    }
    public function editlowongan($id)
    {
        $tgl =   $this->request->getVar('tgl_exp');
        if ($tgl <= date('Y-m-d')) {
            $exp = "0";
        } else {
            $exp =   $this->request->getVar('status');
        }
        $data = [
            'id_lowongan' =>   $id,
            'id_jabatan'  => $this->request->getVar('id_jabatan'),
            'jumlah'  => $this->request->getVar('jumlah'),
            'tgl_start'  => $this->request->getVar('tgl_start'),
            'tgl_exp'  => $this->request->getVar('tgl_exp'),
            'status'  => $exp,
            'note'  => $this->request->getVar('note'),
        ];
        $this->lowonganModel->save($data);
        return redirect()->to('/recruitment/lowongan');
    }
    public function databaru()
    {
        if (!$this->validate([
            'id_karyawan' => [
                'rules' => 'required|is_unique[karyawan.id_karyawan]',
                'errors' => [
                    'required' => 'ID Karyawan harus diisi',
                    'is_unique' => 'ID Karyawan sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/recruitment/databaru')->withInput()->with('validation', $validation);
        }

        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();

        if ($foto->isValid() && !$foto->hasMoved()) {
            $foto->move(ROOTPATH . 'public/foto/', $namafoto);
            session()->setFlashData('foto', 'Berhasil upload');
        } else {
            $namafoto = 'default.jpg';
            session()->setFlashData('foto', 'Gagal upload');
        }
        $data = [
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'id_daftar' =>   $this->request->getVar('id_daftar'),
            'id_jabatan' =>   $this->request->getVar('id_jabatan'),
            'nmr_bpjs' => $this->request->getVar('nmr_bpjs'),
            'nmr_jamsostek' => $this->request->getVar('nmr_jamsostek'),
            'email' => $this->request->getVar('email'),
            'no_telp_' =>   $this->request->getVar('nmr_telp'),
            'no_hp_' =>   $this->request->getVar('nmr_hp'),
            'fasilitas' => $this->request->getVar('fasilitas'),
            'tgl_diterima' =>  $this->request->getVar('tgl'),
            'status_karyawan' => "0",
            'foto' => $namafoto,
        ];
        // dd($data);
        $save = [
            'id_status' =>  $this->request->getVar('id_status'),
            'status2' => "1",

        ];
        // dd($save);
        $this->status_daftarModel->save($save);
        $this->karyawanModel->save($data);
        return redirect()->to('/recruitment/databaru');
    }
    public function seleksi()
    {
        return redirect()->to('/recruitment/seleksi');
    }
    public function performa()
    {



        return redirect()->to('/home/performa');
    }
    public function edit_karyawan($id)
    {
        $lama =   $this->request->getVar('fotolama');
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        if ($lama == $namafoto) {
            $namafoto = $lama;
        } else {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $foto->move(ROOTPATH . 'public/foto/', $namafoto);
                if ($lama != 'default.jpg') {
                    unlink('foto/' . $lama);
                }
            } else {
                $namafoto = 'default.jpg';
            }
        }
        $cari = [
            'id_k' => $id,
            'id_karyawan' =>   $this->request->getVar('id_karyawan'),
            'id_jabatan' =>   $this->request->getVar('id_jabatan'),
            'email' =>   $this->request->getVar('email'),
            'no_hp_' =>   $this->request->getVar('no_hp'),
            'no_telp_' =>   $this->request->getVar('no_telp'),
            'nmr_bpjs' =>   $this->request->getVar('bpjs'),
            'nmr_jamsostek' =>   $this->request->getVar('jamsostek'),
            'fasilitas' =>   $this->request->getVar('fasilitas'),
            'foto' => $namafoto,
        ];
        // dd($cari);
        $this->karyawanModel->save($cari);
        return redirect()->to('/home/profil/' . $id);
    }
    public function resign()
    {
        $status = $this->status_daftarModel->findAll();
        // $daftar = $this->datadiriModel->getAll();
        $id = $this->request->getVar('id_k');
        $id_d =    $this->request->getVar('id_daftar');
        $this->karyawanModel->save([
            'id_k' =>  $id,
            'alasan' =>   $this->request->getVar('alasan'),
            'tgl_keluar' =>   $this->request->getVar('keluar'),
            'status_karyawan' => 1,
        ]);
        foreach ($status as $s) {
            if ($id_d == $s['id_daftar']) {
                $this->status_daftarModel->save([
                    'id_status' => $s['id_status'],
                    'status1' => "2",
                ]);
            }
        }
        // $this->karyawanModel->save($data);
        return redirect()->to('/home/profil/' . $id);
    }
}
