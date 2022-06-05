<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table      = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['jabatan', 'deskripsi', 'indek', 'parent_indek', 'divisi', 'enable'];

    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jabatan');
        $builder->where('enable', 1);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
