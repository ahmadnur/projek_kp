<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $primaryKey = 'id_admin';
    protected $table      = 'admin';
    protected $allowedFields = ['id_admin', 'username', 'password', 'nama_admin', 'jabatan_admin'];
    // protected $useTimestamps = true;
    function get1($username)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('username', $username);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
