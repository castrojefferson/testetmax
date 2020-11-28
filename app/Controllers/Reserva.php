<?php namespace App\Controllers;

class Reserva extends BaseController {
	public function listar() {
        $this->requerLogin();
		$select = $this->db->table('Livro')->getWhere(['reservado_por'=>null]);
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
    	echo "<h3>Livros</h3>";
    	echo view('listar/reserva', ['livros'=>$select->getResult()]);
    	echo view('base/footer');
	}


	public function reservar($id) {
        $this->requerLogin();
		$livro = $this->db->table('Livro')->getWhere(['reservado_por'=>null, 'id'=>$id]);
		$livro = $livro->getRowArray();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			try {
        	    $update = $this->db->table('Livro')->update(['reservado_por'=>$this->getUserEmail()], [ 'id' => $id ]);
				if (!$update) {
				    die($this->db->error());
				}
    				header('Location: /livros/');
				exit;
			} catch (\Exception $e) {
				echo "Erro ao cadastrar";
			}
    	}
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
		echo "<h3>Reservar Livro ".$livro['titulo']."</h3>";
		echo view('confirmar/reserva');
		echo view('base/footer');
	}


	public function alterar($id) {
        $this->requerLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['titulo']) {
					die('Falta titulo');
				}
			try {
        	    $update = $this->db->table('Livro')->update($_POST, [ 'id' => $id ]);

				if (!$update) throw new \Exception($this->db->error());
				header('Location: /livros/');
				exit;
			} catch (\Exception $e) {
				echo "Erro ao cadastrar";
			}
    	} else {
				$select = $this->db->table('Livro')->getWhere(['id'=>$id])->getRowArray();
    	}
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
		echo "<h3>Editar Livro</h3>";
		echo view('formulario/livro_alterar', ['livro'=>$select]);
		echo view('base/footer');
	}
}
