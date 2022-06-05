<?php

namespace App\Controllers;

class Pendaftaran extends BaseController
{
    public function __construct()
    {
        $this->jabatanModel = new \App\Models\JabatanModel();
        $this->lowonganModel = new \App\Models\LowonganModel();
    }
    public function baru()
    {
        $jabatan = $this->lowonganModel->ada();
        $data = [
            'halaman' => 'Pendaftaran Karyawan Baru',
            'jabatan' => $jabatan,
            'validation' => \Config\Services::validation(),
        ];

        return view('pendaftaran/baru.php', $data);
    }
    public function jabatan()
    {
        $jabat = $this->jabatanModel->findAll();
        $data = [
            'halaman' => 'Jabatan',
            'jabat' => $jabat
        ];

        return view('pendaftaran/jabatan.php', $data);
    }
}
