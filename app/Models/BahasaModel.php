<?php

namespace App\Models;

use CodeIgniter\Model;

class BahasaModel extends Model
{
    protected $table      = 'bahasa';
    protected $primaryKey = 'id_bahasa';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_daftar', 'nama_b', 'status_b'];
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bahasa');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
