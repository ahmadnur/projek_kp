<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
    protected $primaryKey = 'id_lowongan';
    protected $table      = 'lowongan';
    protected $allowedFields = ['id_jabatan', 'jumlah', 'sisa', 'tgl_start', 'tgl_exp', 'status', 'note'];
    protected $useTimestamps = true;
    // protected $returnType = 'object';

    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('lowongan');
        $builder->join('jabatan', 'jabatan.id_jabatan = lowongan.id_jabatan');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function ada()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('lowongan');
        $builder->join('jabatan', 'jabatan.id_jabatan = lowongan.id_jabatan');
        $builder->where('status', 1);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function expire()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('lowongan');
        $builder->join('jabatan', 'jabatan.id_jabatan = lowongan.id_jabatan');
        if ($builder['tgl_exp'] >= date("Y-m-d")) {
            $builder['status'] = 0;
        }
        $query = $builder->get();
        return $query->getResultArray();
    }
}
