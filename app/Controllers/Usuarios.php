<?php namespace App\Controllers;

class Usuarios extends BaseController {
	public function listar() {
        $this->requerLogin();
		$select = $this->db->table('Usuario')->get();
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
    	echo "<h3>Usuarios</h3>";
    	echo view('listar/usuarios', ['usuarios'=>$select->getResult()]);
    	echo view('base/footer');
	}
}
