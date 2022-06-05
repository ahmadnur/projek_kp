<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    protected $primaryKey = 'id_upload';
    protected $table      = 'upload_absensi';
    protected $allowedFields = ['tanggal', 'nama_file', 'status'];
    protected $useTimestamps = true;
    function awal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('upload_absensi');
        $builder->selectMax('id_upload');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
