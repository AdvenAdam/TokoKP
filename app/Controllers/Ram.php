<?php

namespace App\Controllers;

use \App\Models\RamModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Ram extends BaseController
{
    protected $ramModel;
    public function __construct()
    {
        $this->ramModel = new RamModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar  RAM',
                'ram' => $this->ramModel->getRam()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('ram/index', $data);
    }
}
