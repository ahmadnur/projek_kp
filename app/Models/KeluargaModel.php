<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $primaryKey = 'id_keluarga';
    protected $table      = 'keluarga';
    protected $allowedFields = ['id_daftar', 'nama_k', 'jekel_k', 'usia', 'pendidikan', 'pekerjaan', 'm_bm', 'status_k'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('keluarga');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
