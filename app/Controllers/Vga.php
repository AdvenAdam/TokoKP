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
}
