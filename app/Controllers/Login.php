<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Tests\Support\Entity\User;

class Login extends BaseController
{
    protected $adminModel;
    protected $datadiriModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('\loggin\login.php', $data);
    }
    public function proses()
    {
        // dd($this->request->getVar('password'));
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'username harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/login')->withInput()->with('validation', $validation);
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->adminModel->get1($username);
        if (empty($user)) {
            session()->setFlashdata('error', 'Username & password Salah');
            return redirect()->back();
        }
        $userp = $user[0]['password'];
        $pass = password_hash($userp, PASSWORD_DEFAULT);
        if ($user) {
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                session()->set([
                    'id' => $user[0]['id_admin'],
                    'username' => $user[0]['username'],
                    'nama_admin' => $user[0]['nama_admin'],
                    'jabatan_admin' => $user[0]['jabatan_admin'],
                    'password' => $user[0]['password'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('\loggin\register.php', $data);
    }
    public function daftar()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('\loggin\daftar.php', $data);
    }
    public function daftar2()
    {
        if (!$this->validate([
            'ktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ktp harus diisi',
                ]
            ],
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal lahir harus diisi',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/login/daftar')->withInput()->with('validation', $validation);
        }
        $ktp = $this->request->getVar('ktp');
        $date = $this->request->getVar('date');
        $user = $this->datadiriModel->findAll();
        // dd($user);
        foreach ($user as $s) {
            if ($s['no_ktp'] == $ktp && $s['tanggal_lahir'] == $date) {
                $user2 = $s;
            }
        }
        if (empty($user2)) {
            session()->setFlashdata('error', 'No KTP & Tanggal Lahir Salah');
            return redirect()->back();
        }

        if (isset($user2)) {
            $id = $user2['id_daftar'];
            return redirect()->to('/home/profil_daftar/' . $id);
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => 'username harus diisi',
                    'is_unique' => 'username sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'password harus diisi',
                    'min_length' => 'panjang password minimal 5 karakter',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/login/register')->withInput()->with('validation', $validation);
        }
        $this->adminModel->save([
            'username' =>   $this->request->getVar('username'),
            'password' =>   $this->request->getVar('password'),
            'nama_admin' =>   $this->request->getVar('nama_admin'),
            'jabatan_admin' =>   $this->request->getVar('jabatan_admin'),
        ]);
        return redirect()->to('/');
    }
    public function edit()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('/loggin/edit.php', $data);
    }
    public function edit2($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'password harus diisi',
                    'min_length' => 'panjang password minimal 5 karakter',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/login/edit')->withInput()->with('validation', $validation);
        }
        $conf = $this->request->getVar('conf');
        $find = $this->adminModel->find($id);
        $old = $find['password'];
        // dd($old);
        if (isset($find)) {
            if ($old == $conf) {

                $this->adminModel->save([
                    'id_admin' => $id,
                    'password' =>  $this->request->getVar('password'),
                ]);
            } else {
                session()->setFlashdata('pass', 'Password yang anda masukkan salah');
                return redirect()->to('/login/edit');
            }
        }
        return redirect()->to('/');
    }
}
