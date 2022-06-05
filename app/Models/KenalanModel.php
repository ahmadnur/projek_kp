<?php

namespace App\Models;

use CodeIgniter\Model;

class KenalanModel extends Model
{
    protected $primaryKey = 'id_kenalan';
    protected $table      = 'kenalan';
    protected $allowedFields = ['id_daftar', 'nama_kenalan', 'alamat_kenalan', 'telp_kenalan', 'jabatan_kenalan', 'hubungan_kenalan', 'status_kenalan'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kenalan');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function cari_r($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kenalan');
        $builder->where('id_daftar', $id);
        $builder->where('status_kenalan', 'referensi');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function cari_k($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kenalan');
        $builder->where('id_daftar', $id);
        $builder->where('status_kenalan', 'kenalan');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
