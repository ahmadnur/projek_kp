<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorijabatanModel extends Model
{
    protected $primaryKey = 'id_histori';
    protected $table      = 'histori_jabatan';
    protected $allowedFields = ['id_karyawan', 'id_jabatan', 'tgl_berlaku', 'tgl_berhenti', 'status', 'note'];
    protected $useTimestamps = true;
}
