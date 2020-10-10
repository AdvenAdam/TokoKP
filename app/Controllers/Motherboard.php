<?php

namespace App\Controllers;

use \App\Models\MotherboardModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Motherboard  extends BaseController
{
    protected $motherboardModel;
    public function __construct()
    {
        $this->motherboardModel = new MotherboardModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Motherboard',
                'motherboard' => $this->motherboardModel->getMotherboard()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('motherboard/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('motherboard/create', $data);
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
                'rules' => 'required|is_unique[tbl_motherboard.nama]',
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
            'socket' => [
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
            'jenis_ram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'ukuran_ram_maks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_slot_pcie' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kekuatan_cpu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'chipset' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_slot_ram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_slot_sata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_slot_m2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'frekuensi_maks_ram' => [
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
            return redirect()->to('/motherboard/create')->withInput();
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
            $fileGambar->move('img/motherboard', $namaGambar);
            // ambil nama file
            // $namaSampul = $fileSampul->getName();

        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->motherboardModel->save([
            'merk' => $this->request->getVar('merk'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'socket' => $this->request->getVar('socket'),
            'faktor_bentuk' => $this->request->getVar('faktor_bentuk'),
            'jenis_ram' => $this->request->getVar('jenis_ram'),
            'ukuran_ram_maks' => $this->request->getVar('ukuran_ram_maks'),
            'jml_slot_pcie' => $this->request->getVar('jml_slot_pcie'),
            'kekuatan_cpu' => $this->request->getVar('kekuatan_cpu'),
            'chipset' => $this->request->getVar('chipset'),
            'jml_slot_ram' => $this->request->getVar('jml_slot_ram'),
            'jml_slot_sata' => $this->request->getVar('jml_slot_sata'),
            'jml_slot_m2' => $this->request->getVar('jml_slot_m2'),
            'frekuensi_maks_ram' => $this->request->getVar('frekuensi_maks_ram'),
            'gambar' => $namaGambar,
            'rincian' => $this->request->getVar('rincian'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/motherboard');
    }
}
