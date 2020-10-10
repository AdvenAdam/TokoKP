<?php

namespace App\Controllers;

use \App\Models\PendinginModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Pendingin  extends BaseController
{
    protected $pendinginModel;
    public function __construct()
    {
        $this->pendinginModel = new PendinginModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Cooler',
                'pendingin' => $this->pendinginModel->getPendingin()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('pendingin/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('pendingin/create', $data);
    }
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required|is_unique[tbl_pendingin.nama]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_pendingin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]

        ])) {
            return redirect()->to('/pendingin/create')->withInput();
        }
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // apakah tidak ada gambar yang dipilih
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {

            // generate nama sampul
            $namaGambar = $fileGambar->getRandomName();

            //pindah file ke img
            // $fileSampul->move('img');
            // memindahkan file dengan nama file yang dirandomkan
            $fileGambar->move('img/pendingin', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pendinginModel->save([
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'jenis_pendingin' => $this->request->getVar('jenis_pendingin'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/pendingin');
    }
}
