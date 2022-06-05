<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $primaryKey = 'id_kegiatan';
    protected $table      = 'kegiatan';
    protected $allowedFields = ['id_daftar', 'nama_organisasi', 'jenis_o', 'tahun_o', 'jabatan_o', 'aktif', 'pengalaman_o'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kegiatan');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
