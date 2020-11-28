<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
		echo view('index');
		echo view('base/footer');
	}

	//--------------------------------------------------------------------

}
