<?php

namespace App\Models;

use CodeIgniter\Model;

class KursusModel extends Model
{
    protected $primaryKey = 'id_kursus';
    protected $table      = 'kursus';
    protected $allowedFields = ['id_daftar', 'nama_ku', 'tahun_ku', 'durasi', 'berijazah', 'dibiayai'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kursus');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
