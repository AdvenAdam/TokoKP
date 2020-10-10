<?php

namespace App\Controllers;

use \App\Models\PsuModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files\UploadedFile;

class Psu  extends BaseController
{
    protected $psuModel;
    public function __construct()
    {
        $this->psuModel = new PsuModel();
    }
    public function index()
    {
        $data =
            [
                'title' => 'Daftar Power Supply',
                'psu' => $this->psuModel->getPsu()
            ];


        // $komikModel = new \App\Models\KomikModel();

        return view('psu/index', $data);
    }
}
