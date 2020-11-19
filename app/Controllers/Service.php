<?php

namespace App\Controllers;

use \App\Models\ServModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Config\I18n;

class Service extends BaseController
{
    protected $servModel;
    public function __construct()
    {
        $this->servModel = new ServModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Service',
                'service' => $this->servModel->getService()
            ];

        // $komikModel = new \App\Models\KomikModel();
        return view('service/index', $data);
    }
    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('service/create', $data);
    }
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kerusakan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'pc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rincian_service' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]

        ])) {
            return redirect()->to('/service/create')->withInput();
        }
        $slug = url_title(($this->request->getVar('nama') . $this->request->getVar('pc')), '-', true);
        $this->servModel->save([
            'nama' => $this->request->getVar('nama'),
            'kerusakan' => $this->request->getVar('kerusakan'),
            'pc' => $this->request->getVar('pc'),
            'slug' => $slug,
            'status' => $this->request->getVar('status'),
            'biaya' => $this->request->getVar('biaya'),
            'no_hp' => $this->request->getVar('no_hp'),
            'rincian_service' => $this->request->getVar('rincian_service'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/service');
    }
    public function detail($slug)
    {
        $service = $this->serviceModel->getService($slug);
        $data = [
            'title' => 'Detail service',
            'service' => $this->serviceModel->getService($slug)
        ];

        //JIka  data tidak ada di table
        if (empty($data['service'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('service ' . $slug . ' tidak ditemukan');
        }
        return view('service/detail', $data);
    }
    public function delete($id)
    {
        //cari gambar berdasar id
        $service = $this->serviceModel->find($id);
        $this->serviceModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/service');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data',
            'validation' => \Config\Services::validation(),
            'service' => $this->serviceModel->getService($slug)
        ];
        return view('service/edit', $data);
    }

    public function update($id)
    {
        //gak perlu edit nama
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kerusakan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'pc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rincian_service' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/service/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $this->memoriModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kerusakan' => $this->request->getVar('kerusakan'),
            'pc' => $this->request->getVar('pc'),
            'status' => $this->request->getVar('status'),
            'biaya' => $this->request->getVar('biaya'),
            'no_hp' => $this->request->getVar('no_hp'),
            'rincian_service' => $this->request->getVar('rincian_service'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/service');
    }
}
