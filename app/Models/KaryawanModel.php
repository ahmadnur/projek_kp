<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $primaryKey = 'id_k';
    protected $table      = 'karyawan';
    protected $allowedFields = ['id_daftar', 'id_karyawan', 'id_jabatan', 'nmr_bpjs', 'nmr_jamsostek', 'fasilitas', 'tgl_diterima', 'tgl_keluar', 'alasan', 'email', 'no_telp_', 'no_hp_', 'status_karyawan', 'foto'];
    protected $useTimestamps = true;
    function cari($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->where('id_karyawan', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function bekerja()
    {
        $db = \config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $builder->where('status_karyawan', 0);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function masuk2()
    {
        $db = \config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $builder->where('status_karyawan', 0);
        $builder->orderBy('tgl_diterima', 'DESC');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function resign()
    {
        $db = \config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $builder->where('status_karyawan', 1);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function resign2()
    {
        $db = \config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $builder->where('status_karyawan', 1);
        $builder->orderBy('tgl_keluar', 'DESC');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function masuk()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('status_daftar', 'status_daftar.id_daftar = karyawan.id_daftar');
        $builder->orderBy('tgl_diterima', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function jabatandaftar()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->join('datadiri', 'datadiri.id_daftar = karyawan.id_daftar');
        $builder->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function graph_masuk($bulan, $tahun)
    {
        $date1 = "$tahun-$bulan-1";
        $date2 = "$tahun-$bulan-31";
        $db = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->where('status_karyawan', 0);
        $builder->where('tgl_diterima >=', $date1);
        $builder->where('tgl_diterima <=', $date2);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function graph_resign($bulan, $tahun)
    {
        $date1 = "$tahun-$bulan-1";
        $date2 = "$tahun-$bulan-31";
        $db = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->where('status_karyawan', 1);
        $builder->where('tgl_diterima >=', $date1);
        $builder->where('tgl_diterima <=', $date2);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function jabat($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('karyawan');
        $builder->where('status_karyawan', 0);
        $builder->where('id_jabatan', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
