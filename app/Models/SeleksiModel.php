<?php

namespace App\Models;

use CodeIgniter\Model;

class SeleksiModel extends Model
{
    protected $primaryKey = 'id_proses';
    protected $table      = 'seleksi';
    protected $allowedFields = ['id_lowongan', 'id_daftar', 'status_approve', 'status_pendaftar'];
    protected $useTimestamps = true;

    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('seleksi');
        $builder->join('lowongan', 'lowongan.id_lowongan = seleksi.id_lowongan');
        $builder->join('datadiri', 'datadiri.id_daftar = seleksi.id_daftar');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
