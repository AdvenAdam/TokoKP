<?php

namespace App\Controllers;

use \App\Models\ProcesorModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Procesor extends BaseController
{
    protected $procesorModel;
    public function __construct()
    {
        $this->procesorModel = new ProcesorModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Processor',
                'procesor' => $this->procesorModel->getProcesor()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('procesor/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('procesor/create', $data);
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
                'rules' => 'required|is_unique[tbl_procesor.nama]',
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
            'jml_core' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_threads' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'socket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'frekuensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'iGPU' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cache' => [
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
            return redirect()->to('/procesor/create')->withInput();
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
            $fileGambar->move('img/procesor', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->procesorModel->save([
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'jml_core' => $this->request->getVar('jml_core'),
            'jml_threads' => $this->request->getVar('jml_threads'),
            'socket' => $this->request->getVar('socket'),
            'frekuensi' => $this->request->getVar('frekuensi'),
            'iGPU' => $this->request->getVar('iGPU'),
            'cache' => $this->request->getVar('cache'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/procesor');
    }
    public function detail($slug)
    {
        $procesor = $this->procesorModel->getprocesor($slug);
        $data = [
            'title' => 'Detail Processor',
            'procesor' => $this->procesorModel->getprocesor($slug)
        ];

        //JIka  data tidak ada di table
        if (empty($data['procesor'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('procesor ' . $slug . ' tidak ditemukan');
        }

        return view('procesor/detail', $data);
    }
    public function delete($id)
    {

        //cari gambar berdasar id
        $procesor = $this->procesorModel->find($id);

        // cek gambar bila gambar default aga rfile default.jpg tdk terhapus
        if ($procesor['gambar'] != 'default.jpg') {

            // hapus gambar
            unlink('img/procesor/' . $procesor['gambar']);
        }


        $this->procesorModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/procesor');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Casing',
            'validation' => \Config\Services::validation(),
            'procesor' => $this->procesorModel->getprocesor($slug)
        ];
        return view('procesor/edit', $data);
    }

    // update
    public function update($id)
    {
        //cek nama
        $procesorlama = $this->procesorModel->getprocesor($this->request->getVar('slug'));
        if ($procesorlama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tbl_procesor.nama]';
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
            'jml_core' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_threads' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'socket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'frekuensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'iGPU' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cache' => [
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

            return redirect()->to('/procesor/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar, Apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file Gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindah gambar
            $fileGambar->move('img/procesor', $namaGambar);
            // hapus file gambar lama
            unlink('img/procesor/' . $this->request->getVar('gambarLama'));
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->procesorModel->save([
            'id' => $id,
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'jml_core' => $this->request->getVar('jml_core'),
            'jml_threads' => $this->request->getVar('jml_threads'),
            'socket' => $this->request->getVar('socket'),
            'frekuensi' => $this->request->getVar('frekuensi'),
            'iGPU' => $this->request->getVar('iGPU'),
            'cache' => $this->request->getVar('cache'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/procesor');
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Stock Barang',
            'procesor' => $this->procesorModel->getprocesor(),
            'total' => count($this->procesorModel->getprocesor())
        ];
        return view('procesor/tambah', $data);
    }
    public function addstok($id)
    {
        $stokLama = intval($this->request->getVar('stokLama'));
        $stokTambah = intval($this->request->getVar('stok'));
        $stokBaru =  $stokTambah + $stokLama;

        $this->procesorModel->save(
            [
                'id' => $id,
                'stok' => $stokBaru,
            ]
        );
        return redirect()->to('/procesor/tambah');
    }
}
