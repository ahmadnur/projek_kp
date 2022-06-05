<?php

namespace App\Controllers;

class AutocompleteSearch extends BaseController
{
    protected $karyawanModel;
    public function ajaxSearch()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('karyawan');

        $query = $builder->like('name', $this->request->getVar('nama'))
            ->select('id, name as text')
            ->limit(10)->get();
        $data = $query->getResult();

        echo json_encode($data);
    }
}
