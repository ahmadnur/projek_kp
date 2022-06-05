<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $primaryKey = 'id_absensi';
    protected $table      = 'absensi';
    protected $allowedFields = ['id_upload', 'id_karyawan', 'pin', 'tanggal_a', 'jam', 'status_a', 'sn_mesin', 'nama_mesin'];
    protected $useTimestamps = true;
    function getAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absensi');
        $builder->join('upload_absensi', 'upload_absensi.id_upload = absensi.id_upload');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function absensi($tgl)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absensi');
        $builder->where('tanggal_a', $tgl);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function grafik($bln, $status)
    {
        $tahun = date("Y");
        $date1 = "$tahun-$bln-1";
        $date2 = "$tahun-$bln-31";
        $db = \Config\Database::connect();
        $builder = $db->table('absensi');
        $builder->where('tanggal_a >=', $date1);
        $builder->where('tanggal_a <=', $date2);
        $builder->where('status_a', $status);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
