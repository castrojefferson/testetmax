<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
    	$this->echoHeader();
		echo view('index');
		echo view('base/footer');
	}

	//--------------------------------------------------------------------

}
