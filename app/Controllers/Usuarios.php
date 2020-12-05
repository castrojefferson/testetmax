<?php namespace App\Controllers;

class Usuarios extends BaseController {
	public function listar() {
        $this->requerLogin();
		$select = $this->db->table('Usuario')->get();
    	$this->echoHeader();
    	echo "<h3>Usuarios</h3>";
    	echo view('listar/usuarios', ['usuarios'=>$select->getResult()]);
    	echo view('base/footer');
	}
}
