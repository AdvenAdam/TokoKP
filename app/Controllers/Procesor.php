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
}
