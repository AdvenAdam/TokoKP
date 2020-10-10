<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Halaman depan',
			'isi' => 'v_home'
		];
		return view('pages/home', $data);
	}

	//--------------------------------------------------------------------

}
