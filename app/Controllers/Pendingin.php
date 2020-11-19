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
    public function detail($slug)
    {
        $pendingin = $this->pendinginModel->getpendingin($slug);
        $data = [
            'title' => 'Detail Cooler',
            'pendingin' => $this->pendinginModel->getpendingin($slug)
        ];

        //JIka  data tidak ada di table
        if (empty($data['pendingin'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('pendingin ' . $slug . ' tidak ditemukan');
        }

        return view('pendingin/detail', $data);
    }
    public function delete($id)
    {

        //cari gambar berdasar id
        $pendingin = $this->pendinginModel->find($id);

        // cek gambar bila gambar default aga rfile default.jpg tdk terhapus
        if ($pendingin['gambar'] != 'default.jpg') {

            // hapus gambar
            unlink('img/pendingin/' . $pendingin['gambar']);
        }


        $this->pendinginModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/pendingin');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Cooler',
            'validation' => \Config\Services::validation(),
            'pendingin' => $this->pendinginModel->getpendingin($slug)
        ];
        return view('pendingin/edit', $data);
    }

    // update
    public function update($id)
    {
        //cek nama
        $pendinginlama = $this->pendinginModel->getpendingin($this->request->getVar('slug'));
        if ($pendinginlama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tbl_pendingin.nama]';
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

            return redirect()->to('/pendingin/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar, Apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file Gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindah gambar
            $fileGambar->move('img/pendingin', $namaGambar);
            // hapus file gambar lama
            unlink('img/pendingin/' . $this->request->getVar('gambarLama'));
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pendinginModel->save([
            'id' => $id,
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'jenis_pendingin' => $this->request->getVar('jenis_pendingin'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/pendingin');
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Stock Barang',
            'pendingin' => $this->pendinginModel->getpendingin(),
            'total' => count($this->pendinginModel->getpendingin())
        ];
        return view('pendingin/tambah', $data);
    }
    public function addstok($id)
    {
        $stokLama = intval($this->request->getVar('stokLama'));
        $stokTambah = intval($this->request->getVar('stok'));
        $stokBaru =  $stokTambah + $stokLama;

        $this->pendinginModel->save(
            [
                'id' => $id,
                'stok' => $stokBaru,
            ]
        );
        return redirect()->to('/pendingin/tambah');
    }
}
