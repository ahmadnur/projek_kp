<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenis_ijinModel extends Model
{
    protected $primaryKey = 'id_jenis';
    protected $table      = 'jenis_ijin';
    protected $allowedFields = ['nama', 'deskripsi', 'durasi', 'total_ijin'];
    protected $useTimestamps = true;
}
