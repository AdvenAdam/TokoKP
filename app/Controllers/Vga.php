<?php

namespace App\Controllers;

use \App\Models\VgaModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Vga extends BaseController
{
    protected $vgaModel;
    public function __construct()
    {
        $this->vgaModel = new VgaModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar VGA',
                'vga' => $this->vgaModel->getVga()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('vga/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('vga/create', $data);
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
                'rules' => 'required|is_unique[tbl_vga.nama]',
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
            'base_clock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'boost_clock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'ukuran_memori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tipe_memori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'lebar_memori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'konektor_daya' => [
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
            return redirect()->to('/vga/create')->withInput();
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
            $fileGambar->move('img/vga', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->vgaModel->save([
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'base_clock' => $this->request->getVar('base_clock'),
            'boost_clock' => $this->request->getVar('boost_clock'),
            'ukuran_memori' => $this->request->getVar('ukuran_memori'),
            'tipe_memori' => $this->request->getVar('tipe_memori'),
            'lebar_memori' => $this->request->getVar('lebar_memori'),
            'konektor_daya' => $this->request->getVar('konektor_daya'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/vga');
    }
    public function detail($slug)
    {
        $vga = $this->vgaModel->getvga($slug);
        $data = [
            'title' => 'Detail VGA',
            'vga' => $this->vgaModel->getvga($slug)
        ];

        //JIka  data tidak ada di table
        if (empty($data['vga'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('vga ' . $slug . ' tidak ditemukan');
        }

        return view('vga/detail', $data);
    }
    public function delete($id)
    {

        //cari gambar berdasar id
        $vga = $this->vgaModel->find($id);

        // cek gambar bila gambar default aga rfile default.jpg tdk terhapus
        if ($vga['gambar'] != 'default.jpg') {

            // hapus gambar
            unlink('img/vga/' . $vga['gambar']);
        }


        $this->vgaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/vga');
    }
}
