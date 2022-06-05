<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    protected $rule_cutiModel;
    protected $cobaajaModel;
    protected $jenis_ijinModel;
    protected $karyawanModel;
    protected $uploadModel;
    protected $ijinModel;
    public function __construct()
    {
        // $this->load->helper('download');
        $this->ijinModel = new \App\Models\IjinModel();
        $this->rule_cutiModel = new \App\Models\Rule_cutiModel();
    }
    public function harian()
    {
        $currentpage =   $this->request->getVar('page_ijin') ?   $this->request->getVar('page_ijin') : 1;
        $rule = $this->rule_cutiModel->getAll();
        $karyawan = $this->karyawanModel->bekerja();
        $ijin = $this->jenis_ijinModel->findAll();
        $datad = $this->datadiriModel->findAll();
        $data = [
            'halaman' => 'Harian',
            'ijin' => $ijin,
            'send' => $this->ijinModel->orderBy('id_ijin', 'DESC')->paginate(10, 'ijin'),
            'pager' => $this->ijinModel->pager,
            'karyawan' => $karyawan,
            'rule' => $rule,
            'data' => $datad,
            'page' => $currentpage,
        ];

        return view('absensi/harian.php', $data);
    }
    public function upload()
    {
        // $upload = $this->uploadModel->findAll();
        $currentpage =   $this->request->getVar('page_upload_absensi') ?   $this->request->getVar('page_upload_absensi') : 1;

        $data = [
            'halaman' => 'Upload',
            'upload' => $this->uploadModel->orderBy('id_upload', 'DESC')->paginate(10, 'upload_absensi'),
            'validation' => \config\Services::validation(),
            'pager' => $this->uploadModel->pager,
            'page' => $currentpage,
        ];

        return view('absensi/upload.php', $data);
    }
    public function file($nama)
    {
        // $nama = $this->uri->segment(3);
        $data = file_get_contents("uploads/$nama");
        // force_download($nama, $data);
        return $this->response->download('uploads/' . $nama, null);
    }
}
