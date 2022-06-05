<?php

namespace App\Controllers;

use App\Models\CobaBahasaModel;
use App\Models\CobaDongModel;
use App\Models\KaryawanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Home extends BaseController
{
    protected $datadiriModel;
    protected $cobadongModel;
    protected $karyawanModel;
    protected $cobabahasaModel;
    protected $jenis_ijinModel;
    protected $keluargaModel;
    protected $pendidikanModel;
    protected $bahasaModel;
    protected $kursusModel;
    protected $pengalamanModel;
    protected $kenalanModel;
    protected $kegiatanModel;
    protected $keteranganModel;
    protected $interviewModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }
    public function index()
    {
        $resign = $this->karyawanModel->resign2();
        $masuk = $this->karyawanModel->masuk2();
        $tahun = date("Y");
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $bulan = "0$i";
            } else
                $bulan = "$i";

            $grap1 = $this->karyawanModel->graph_masuk($bulan, $tahun);
            $cek[] = count($grap1);
        }
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $bulan = "0$i";
            } else
                $bulan = "$i";

            $grap2 = $this->karyawanModel->graph_resign($bulan, $tahun);
            $cek2[] = count($grap2);
        }
        $jabatan = $this->jabatanModel->getAll();
        foreach ($jabatan as $j) {
            $jabat[] = $j['jabatan'];
            $id_j = $j['id_jabatan'];
            $grap3 = $this->karyawanModel->jabat($id_j);
            $cek3[] = count($grap3);
        }
        $absensi = $this->absensiModel->findAll();
        $status = "masuk";
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $bulan = "0$i";
            } else
                $bulan = "$i";

            $grap4 = $this->absensiModel->grafik($bulan, $status);
            // $grap2 = $this->karyawanModel->graph_resign($bulan, $tahun);
            $cek4[] = count($grap4);
        }
        $status2 = "ijin";
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $bulan = "0$i";
            } else
                $bulan = "$i";

            $grap5 = $this->absensiModel->grafik($bulan, $status2);
            // $grap2 = $this->karyawanModel->graph_resign($bulan, $tahun);
            $cek5[] = count($grap5);
        }


        $data = [
            'halaman' => 'Dashboard',
            'resign' => $resign,
            'masuk' => $masuk,
            'data_masuk' => json_encode($cek),
            'data_resign' => json_encode($cek2),
            'jabat3' => json_encode($jabat),
            'data_jabat' => json_encode($cek3),
            'data_absen' => json_encode($cek4),
            'data_ijin' => json_encode($cek5),
        ];
        return view('dashboard.php', $data);
    }
    public function karyawan()
    {
        $data = $this->karyawanModel->bekerja();
        $samping = $this->karyawanModel->jabatandaftar();
        $data = [
            'halaman' => 'Karyawan',
            'samping' => $samping,
            'karyawan' => $this->karyawanModel->paginate(10, 'karyawan'),
            'pager' => $this->karyawanModel->pager,
            'data' => $data,
        ];

        return view('karyawan.php', $data);
    }
    public function performa()
    {
        $jabatan = $this->lowonganModel->ada();
        $data = [
            'halaman' => 'Pendaftaran Karyawan Baru',
            'jabatan' => $jabatan,
            'validation' => \Config\Services::validation(),
        ];


        return view('performa.php', $data);
    }
    public function json_karyawan()
    {

        $cobaa = $this->karyawanModel->bekerja();
        $data_json = json_encode($cobaa);
        echo $data_json;
    }
    public function save()
    {
        $coba = $this->karyawanModel->bekerja();
        $spreadsheets = new Spreadsheet();
        $sheet = $spreadsheets->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Karyawan');
        $sheet->setCellValue('C1', 'Jabatan');
        $sheet->setCellValue('D1', 'Nomor BPJS');
        $sheet->setCellValue('E1', 'Nomor Jamsostek');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Fasilitas');
        $sheet->setCellValue('H1', 'Nomor Hp');
        $sheet->setCellValue('I1', 'Nomor Telephone');
        $sheet->setCellValue('J1', 'Tanggal Diterima Bekerja');
        $count = 2;
        foreach ($coba as $row) {
            $sheet->setCellValue('A' . $count, $count - 1);
            $sheet->setCellValue('B' . $count, $row['nama']);
            $sheet->setCellValue('C' . $count, $row['jabatan']);
            $sheet->setCellValue('D' . $count, $row['nmr_bpjs']);
            $sheet->setCellValue('E' . $count, $row['nmr_jamsostek']);
            $sheet->setCellValue('F' . $count, $row['email']);
            $sheet->setCellValue('G' . $count, $row['fasilitas']);
            $sheet->setCellValue('H' . $count, $row['no_hp_']);
            $sheet->setCellValue('I' . $count, $row['no_telp_']);
            $sheet->setCellValue('J' . $count, $row['tgl_diterima']);
            $count++;
        }
        $filename = 'Data Pegawai.xlsx';
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheets);
        $writer->setOffice2003Compatibility(true);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        // header('Content-Length:' . filesize($filename));
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function save2()
    {
        $coba = $this->karyawanModel->resign();
        $spreadsheets = new Spreadsheet();
        $sheet = $spreadsheets->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Karyawan');
        $sheet->setCellValue('C1', 'Jabatan');
        $sheet->setCellValue('D1', 'Nomor BPJS');
        $sheet->setCellValue('E1', 'Nomor Jamsostek');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Fasilitas');
        $sheet->setCellValue('H1', 'Nomor Hp');
        $sheet->setCellValue('I1', 'Nomor Telephone');
        $sheet->setCellValue('J1', 'Tanggal Diterima Bekerja');
        $sheet->setCellValue('K1', 'Tanggal Resign Bekerja');
        $sheet->setCellValue('L1', 'Alasan Berhenti');
        $count = 2;
        foreach ($coba as $row) {
            $sheet->setCellValue('A' . $count, $count - 1);
            $sheet->setCellValue('B' . $count, $row['nama']);
            $sheet->setCellValue('C' . $count, $row['jabatan']);
            $sheet->setCellValue('D' . $count, $row['nmr_bpjs']);
            $sheet->setCellValue('E' . $count, $row['nmr_jamsostek']);
            $sheet->setCellValue('F' . $count, $row['email']);
            $sheet->setCellValue('G' . $count, $row['fasilitas']);
            $sheet->setCellValue('H' . $count, $row['no_hp_']);
            $sheet->setCellValue('I' . $count, $row['no_telp_']);
            $sheet->setCellValue('J' . $count, $row['tgl_diterima']);
            $sheet->setCellValue('K' . $count, $row['tgl_keluar']);
            $sheet->setCellValue('L' . $count, $row['alasan']);
            $count++;
        }
        $filename = 'Data Pegawai Resign.xlsx';
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheets);
        $writer->setOffice2003Compatibility(true);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        // header('Content-Length:' . filesize($filename));
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function cari_masuk()
    {
        $cari =   $this->request->getVar('id_karyawan');
        return redirect()->to('/home/profil/' . $cari);
    }
    public function cari_keluar()
    {
        $cari =   $this->request->getVar('id_karyawan');
        return redirect()->to('/home/profil/' . $cari);
    }
    public function profil($id)
    {
        $jabatan = $this->jabatanModel->findAll();
        $karyawan = $this->karyawanModel->getAll();
        // dd($karyawan);
        $profile = $this->karyawanModel->find($id);
        foreach ($karyawan as $k) {
            if ($k['id_k'] == $id) {
                $profiles = $k;
            }
        }
        // dd($profile);
        $data = [
            'halaman' => 'Profil Karyawan',
            'karyawan' => $profile,
            'jabatan' => $jabatan,
            'tambah' => $profiles,
        ];
        // dd($jabatan);
        return view('profil.php', $data);
    }
    public function profil_daftar($id)
    {
        $datadiri = $this->datadiriModel->findAll();
        $keluarga = $this->keluargaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $bahasa = $this->bahasaModel->findAll();
        $kursus = $this->kursusModel->findAll();
        $pengalaman = $this->pengalamanModel->findAll();
        $kenalan = $this->kenalanModel->findAll();
        $kegiatan = $this->kegiatanModel->findAll();
        $keterangan = $this->keteranganModel->findAll();
        $interview = $this->interviewModel->findAll();
        foreach ($keluarga as $k) {
            if ($k['id_daftar'] == $id) {
                $keluarga_[] = $k;
            }
        }
        if (empty($keluarga_)) {
            $keluarga_ = $id;
        }
        foreach ($datadiri as $k) {
            if ($k['id_daftar'] == $id) {
                $datadiri_[] = $k;
            }
        }
        if (empty($datadiri_)) {
            $datadiri_ = $id;
        }
        foreach ($pendidikan as $k) {
            if ($k['id_daftar'] == $id) {
                $pendidikan_[] = $k;
            }
        }
        if (empty($pendidikan_)) {
            $pendidikan_ = $id;
        }
        foreach ($bahasa as $k) {
            if ($k['id_daftar'] == $id) {
                $bahasa_[] = $k;
            }
        }
        if (empty($bahasa_)) {
            $bahasa_ = $id;
        }
        foreach ($kursus as $k) {
            if ($k['id_daftar'] == $id) {
                $kursus_[] = $k;
            }
        }
        if (empty($kursus_)) {
            $kursus_ = $id;
        }
        foreach ($pengalaman as $k) {
            if ($k['id_daftar'] == $id) {
                $pengalaman_[] = $k;
            }
        }
        if (empty($pengalaman_)) {
            $pengalaman_ = $id;
        }
        foreach ($kenalan as $k) {
            if ($k['id_daftar'] == $id) {
                $kenalan_[] = $k;
            }
        }
        if (empty($kenalan_)) {
            $kenalan_ = $id;
        }
        foreach ($kegiatan as $k) {
            if ($k['id_daftar'] == $id) {
                $kegiatan_[] = $k;
            }
        }
        if (empty($kegiatan_)) {
            $kegiatan_ = $id;
        }
        foreach ($keterangan as $k) {
            if ($k['id_daftar'] == $id) {
                $keterangan_[] = $k;
            }
        }
        if (empty($keterangan_)) {
            $keterangan_ = $id;
        }
        foreach ($interview as $k) {
            if ($k['id_daftar'] == $id) {
                $interview_[] = $k;
            }
        }
        if (empty($interview_)) {
            $interview_ = $id;
        }
        $jabatan = $this->lowonganModel->ada();
        $lowongan = $this->lowonganModel->getAll();
        foreach ($jabatan as $j) {
            if ($datadiri_[0]['id_lowongan'] == $j['id_lowongan']) {
                $ambil = $j['id_lowongan'];
            }
        }
        if (empty($ambil)) {
            foreach ($lowongan as $l) {
                if ($datadiri_[0]['id_lowongan'] == $l['id_lowongan']) {
                    $ambil = $l['id_lowongan'];
                }
            }
        }

        $data = [
            'halaman' => 'Profil Pendaftar',
            'datadiri' => $datadiri_,
            'keluarga' => $keluarga_,
            'pendidikan' => $pendidikan_,
            'bahasa' => $bahasa_,
            'kursus' => $kursus_,
            'pengalaman' => $pengalaman_,
            'kenalan' => $kenalan_,
            'kegiatan' => $kegiatan_,
            'keterangan' => $keterangan_,
            'interview' => $interview_,
            'jabatan' => $jabatan,
            'id' => $id,
            'ambil' => $ambil,
            'lowongan' => $lowongan,
        ];
        // dd($pendidikan_);
        return view('profil_daftar.php', $data);
    }
    public function karyawan_prof($id)
    {
        $karyawan = $this->karyawanModel->findAll();
        foreach ($karyawan as $k) {
            if ($k['id_karyawan'] == $id) {
                $id_k = $k['id_k'];
            }
        }
        // dd($id);
        return redirect()->to('/home/profil/' . $id_k);
    }
    public function resign()
    {

        $samping = $this->karyawanModel->jabatandaftar();
        $resign = $this->karyawanModel->resign();
        $data = [
            'halaman' => 'Karyawan Resign',
            'resign' => $resign,
            'samping' => $samping,
            'data' => $resign,

        ];
        return view('resign.php', $data);
    }
    public function admin()
    {
        $ijin = $this->jenis_ijinModel->findAll();


        $data = [
            'halaman' => 'Admin',
            'ijin' => $ijin,
        ];
        return view('admin.php', $data);
    }


    public function ijinadmin()
    {
        $ijin = [
            'nama'  => $this->request->getVar('nama'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'durasi'  => $this->request->getVar('durasi'),
            'total_ijin' => $this->request->getVar('total_ijin'),
        ];
        $this->jenis_ijinModel->save($ijin);
        return redirect()->to('/home/admin');
    }
}
