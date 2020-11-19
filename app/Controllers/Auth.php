<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Form Login',
                'validation' => \Config\Services::validation()
            ];
        return view('pages/login', $data);
    }


    public function cek_login()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ]
        ])) {
            return redirect()->to('/Auth/login')->withInput();
        }
        // jika valid
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek      = $this->authModel->login($username, $password);
        if ($cek) {
            // jika data cocok
            session()->set('log', true);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            //login sukses
            return redirect()->to('/casing');
        } else {
            // jika tidak cocok
            session()->setFlashData('pesan', 'login gagal pastikan username atau password benar');
            return redirect()->to('/Auth');
        }
    }
}
