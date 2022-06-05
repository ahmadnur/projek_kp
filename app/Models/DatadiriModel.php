<?php

namespace App\Models;

use CodeIgniter\Model;

class DatadiriModel extends Model
{
    protected $primaryKey = 'id_daftar';
    protected $table      = 'datadiri';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_lowongan', 'id_jabatan', 'no_ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat',
        'no_hp', 'telp', 'jekel', 'agama', 'kewarganegaraan', 'suku_bangsa', 'anak_nomor',
        'status_menikah', 'tahun_menikah', 'berat_badan', 'tinggi_badan', 'gaji_diharapkan',
        'transportasi', 'minat', 'nama_kerabat', 'telp_kerabat', 'hubungan_kerabat', 'minat', 'minat_l', 'foto_d'
    ];
    function getAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('karyawan', 'karyawan.id_daftar = datadiri.id_daftar');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function awal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->selectMax('id_daftar');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function full()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('keluarga', 'keluarga.id_daftar = datadiri.id_daftar');
        $builder->join('pendidikan', 'pendidikan.id_daftar = datadiri.id_daftar');
        $builder->join('kursus', 'kursus.id_daftar = datadiri.id_daftar');
        $builder->join('bahasa', 'bahasa.id_daftar = datadiri.id_daftar');
        $builder->join('pengalaman', 'pengalaman.id_daftar = datadiri.id_daftar');
        $builder->join('kenalan', 'kenalan.id_daftar = datadiri.id_daftar');
        $builder->join('kegiatan', 'kegiatan.id_daftar = datadiri.id_daftar');
        $builder->join('keterangan', 'keterangan.id_daftar = datadiri.id_daftar');
        $builder->join('interview', 'interview.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function keluarga($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('keluarga', 'keluarga.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function kursus($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('kursus', 'kursus.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function pendidikan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('pendidikan', 'pendidikan.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function bahasa($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('bahasa', 'bahasa.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function pengalaman($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('pengalaman', 'pengalaman.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function kenalan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('kenalan', 'kenalan.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function kegiatan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('kegiatan', 'kegiatan.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function interview($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('interview', 'interview.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function keterangan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $builder->join('keterangan', 'keterangan.id_daftar = datadiri.id_daftar');
        // $builder->where('id_daftar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
