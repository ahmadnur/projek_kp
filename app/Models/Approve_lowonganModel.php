<?php

namespace App\Models;

use CodeIgniter\Model;

class Approve_lowonganModel extends Model
{
    protected $primaryKey = 'id_karyawan';
    protected $table      = 'karyawan';
    protected $allowedFields = ['id_daftar', 'jabatan', 'nmr_bpjs', 'nmr_jamsostek', 'fasilitas', 'tgl_diterima', 'tgl_keluar', 'alasan', 'email', 'nmr_telp', 'nmr_hp'];
    protected $useTimestamps = true;
}
