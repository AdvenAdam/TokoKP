<?php

namespace App\Controllers;

use \App\Models\CasingModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Casing  extends BaseController
{
    protected $casingModel;
    public function __construct()
    {
        $this->casingModel = new CasingModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Cassing',
                'casing' => $this->casingModel->getCasing()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('casing/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('casing/create', $data);
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
                'rules' => 'required|is_unique[tbl_casing.nama]',
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
            'faktor_bentuk' => [
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
            return redirect()->to('/casing/create')->withInput();
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
            $fileGambar->move('img/casing', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->casingModel->save([
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'faktor_bentuk' => $this->request->getVar('faktor_bentuk'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/casing');
    }

    public function detail($slug)
    {
        $casing = $this->casingModel->getCasing($slug);
        $data = [
            'title' => 'Detail Casing',
            'casing' => $this->casingModel->getCasing($slug)
        ];

        //JIka  data tidak ada di table
        if (empty($data['casing'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Casing ' . $slug . ' tidak ditemukan');
        }

        return view('casing/detail', $data);
    }
    public function delete($id)
    {

        //cari gambar berdasar id
        $casing = $this->casingModel->find($id);

        // cek gambar bila gambar default aga rfile default.jpg tdk terhapus
        if ($casing['gambar'] != 'default.jpg') {

            // hapus gambar
            unlink('img/casing/' . $casing['gambar']);
        }


        $this->casingModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/casing');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Casing',
            'validation' => \Config\Services::validation(),
            'casing' => $this->casingModel->getcasing($slug)
        ];
        return view('casing/edit', $data);
    }

    // update
    public function update($id)
    {
        //cek nama
        $casinglama = $this->casingModel->getcasing($this->request->getVar('slug'));
        if ($casinglama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tbl_casing.nama]';
        }
        if (!$this->validate([
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'rules' => $rule_nama,
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
            'faktor_bentuk' => [
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

            return redirect()->to('/casing/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar, Apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file Gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindah gambar
            $fileGambar->move('img/casing', $namaGambar);
            // hapus file gambar lama
            unlink('img/casing/' . $this->request->getVar('gambarLama'));
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->casingModel->save([
            'id' => $id,
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'faktor_bentuk' => $this->request->getVar('faktor_bentuk'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/casing');
    }

    // Tambah Stock Tiap Barang
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Stock Barang',
            'casing' => $this->casingModel->getcasing(),
            'total' => count($this->casingModel->getcasing())
        ];
        return view('casing/tambah', $data);
    }
    public function addstok($id)
    {
        $stokLama = intval($this->request->getVar('stokLama'));
        $stokTambah = intval($this->request->getVar('stok'));
        $stokBaru =  $stokTambah + $stokLama;

        $this->casingModel->save(
            [
                'id' => $id,
                'stok' => $stokBaru,
            ]
        );
        return redirect()->to('/casing/tambah');
    }
}
