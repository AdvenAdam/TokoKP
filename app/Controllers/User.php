<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class User extends BaseController
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
                'title' => 'Daftar User',
                'user' => $this->authModel->getUser()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('user/index', $data);
    }
    public function create()
    {

        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('user/create', $data);
    }
    public function save()
    {

        // validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'matches' => '{field} tidak sama'
                ]
            ],

            'no_pegawai' => [
                'label' => 'Nomor Pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran foto terlalu besar',
                    'is_image' => 'yang anda pilih bukan foto',
                    'mime_in' => 'yang anda pilih bukan foto'
                ]
            ]

        ])) {
            return redirect()->to('/user/create')->withInput();
        }
        // ambil gambar
        $fileGambar = $this->request->getFile('foto');
        // apakah tidak ada gambar yang dipilih
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {

            // generate nama sampul
            $namaGambar = $fileGambar->getRandomName();

            //pindah file ke img
            // $fileSampul->move('img');
            // memindahkan file dengan nama file yang dirandomkan
            $fileGambar->move('img/user', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }
        // $options = [
        //     'cost' => 10,
        // ];
        // $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT, $options);
        $slug = url_title($this->request->getVar('username'), '-', true);
        $this->authModel->save([
            'username' => $this->request->getVar('username'),
            'slug' => $slug,
            'password' => $this->request->getVar('password'),
            'no_pegawai' => $this->request->getVar('no_pegawai'),
            'level' => $this->request->getVar('level'),
            'foto' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/user');
    }
    public function delete($id)
    {

        //cari gambar berdasar id
        $user = $this->authModel->find($id);

        // cek gambar bila gambar default agar file default.jpg tdk terhapus
        if ($user['foto'] != 'default.jpg') {

            // hapus gambar
            unlink('img/user/' . $user['foto']);
        }

        $this->authModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/user');
    }
}
