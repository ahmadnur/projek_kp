<?php

namespace App\Models;

use CodeIgniter\Model;

class IjinModel extends Model
{
    protected $table      = 'ijin';
    protected $primaryKey = 'id_ijin';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_karyawan', 'id_jenis', 'surat', 'status_i'];

    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ijin');
        $builder->join('jenis_ijin', 'jenis_ijin.id_jenis = ijin.id_jenis');
        $builder->join('karyawan', 'karyawan.id_karyawan = ijin.id_karyawan');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function laporan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ijin');
        $builder->where('id_karyawan', $id);
        $builder->where('status_i', 'diterima');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
