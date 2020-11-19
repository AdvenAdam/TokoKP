<?php

namespace App\Controllers;

use \App\Models\RamModel;
use \App\Models\MemoriModel;
use \App\Models\CasingModel;
use \App\Models\MotherboardModel;
use \App\Models\PendinginModel;
use \App\Models\ProcesorModel;
use \App\Models\PsuModel;
use \App\Models\VgaModel;

class Home extends BaseController
{
	protected $ramModel;
	protected $memoriModel;
	protected $casingModel;
	protected $motherboardModel;
	protected $pendinginModel;
	protected $procesorModel;
	protected $psuModel;
	protected $vgaModel;
	public function __construct()
	{
		$this->ramModel = new RamModel();
		$this->memoriModel = new MemoriModel();
		$this->casingModel = new CasingModel();
		$this->motherboardModel = new MotherboardModel();
		$this->pendinginModel = new PendinginModel();
		$this->procesorModel = new ProcesorModel();
		$this->psuModel = new PsuModel();
		$this->vgaModel = new VgaModel();
	}



	public function index()
	{
		$data = [
			'title' => 'Halaman depan',
			'ram' => count($this->ramModel->getRam()),
			'memori' => count($this->memoriModel->getMemori()),
			'casing' => count($this->casingModel->getcasing()),
			'motherboard' => count($this->motherboardModel->getmotherboard()),
			'procesor' => count($this->procesorModel->getProcesor()),
			'pendingin' => count($this->pendinginModel->getPendingin()),
			'psu' => count($this->psuModel->getPsu()),
			'vga' => count($this->vgaModel->getVga()),

		];
		return view('pages/home', $data);
	}

	//--------------------------------------------------------------------

}
