<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $primaryKey = 'id_pengalaman';
    protected $table      = 'pengalaman';
    protected $allowedFields = ['id_daftar', 'tahun_masuk', 'tahun_keluar', 'nama_perusahaan', 'jabatan_p', 'gaji_tunjangan', 'alasan_p'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengalaman');
        $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
