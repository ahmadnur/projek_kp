<?php

namespace App\Models;

use CodeIgniter\Model;

class Status_DaftarModel extends Model
{
    protected $primaryKey = 'id_status';
    protected $table      = 'status_daftar';
    protected $allowedFields = ['id_daftar',  'status1', 'status2', 'status3'];
    protected $useTimestamps = true;
    // status untuk menujukkkan bahwa karyawan telah diterima(0=belum diterima,1= diterima masuk,2=keluar)
    // status2 untuk menujukkan bahwa data telah dibuatkan id_karyawan apa belum
    // status3 untuk memindahkan data ke laporan
    function hasil()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('status_daftar');
        $builder->join('datadiri', 'datadiri.id_daftar = status_daftar.id_daftar');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function hasila()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('status_daftar');
        $builder->join('datadiri', 'datadiri.id_daftar = status_daftar.id_daftar');
        $builder->where('status1', 1);
        $builder->where('status2', 0);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function hasilb()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('status_daftar');
        $builder->join('datadiri', 'datadiri.id_daftar = status_daftar.id_daftar');
        $builder->where('status3', 0);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
