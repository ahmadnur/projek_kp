<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $primaryKey = 'id_pendidikan';
    protected $table      = 'pendidikan';
    protected $allowedFields = ['id_daftar', 'nama_p', 'jurusan_p', 'IPK', 'masuk', 'lulus', 'status_p'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pendidikan');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
