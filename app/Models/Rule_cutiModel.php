<?php

namespace App\Models;

use CodeIgniter\Model;

class Rule_cutiModel extends Model
{
    // protected $primaryKey = 'id_karyawan';
    protected $table      = 'rule_cuti';
    protected $allowedFields = ['id_karyawan', 'id_jenis'];


    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('rule_cuti');
        $builder->join('jenis_ijin', 'jenis_ijin.id_jenis = rule_cuti.id_jenis');
        $builder->join('karyawan', 'karyawan.id_karyawan = rule_cuti.id_karyawan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function status($kar, $jen)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('rule_cuti');
        $array = [
            'id_karyawan' => $kar,
            'id_jenis' => $jen,
        ];
        $builder->where($array);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
