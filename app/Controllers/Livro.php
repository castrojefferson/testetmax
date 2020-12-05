<?php namespace App\Controllers;

class Livro extends BaseController {
	public function menu() {
        $this->requerLogin();
        $this->requerAdmin();
    	$this->echoHeader();
    	echo "<h3>Menu Livros</h3>";
    	echo view('menu/menu');
    	echo view('base/footer');
	}
    
    
	public function listar() {
        $this->requerLogin();
        $this->requerAdmin();
		$select = $this->db->table('Livro')->get();
    	$this->echoHeader();
    	echo "<h3>Livros</h3>";
    	echo view('listar/livro', ['livros'=>$select->getResult()]);
    	echo view('base/footer');
	}


	public function cadastrar() {
        $this->requerLogin();
        $this->requerAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['titulo']) {
					die('Falta titulo');
				}
			try {
				$insert = $this->db->table('Livro')->insert($_POST);
				if (!$insert) throw new \Exception($this->db->error());
				header('Location: /livros/listar');
				exit;
			} catch (\Exception $e) {
				echo "Erro ao cadastrar";
			}
    	}
    	$this->echoHeader();
		echo "<h3>Cadastrar Livro</h3>";
		echo view('formulario/livro');
		echo view('base/footer');
	}


	public function alterar($id) {
        $this->requerLogin();
        $this->requerAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['titulo']) {
					die('Falta titulo');
				}
			try {
			    if (strlen($_POST['reservado_por']) < 2)
    			    $_POST['reservado_por'] = null;
        	    $update = $this->db->table('Livro')->update($_POST, [ 'id' => $id ]);

				if (!$update) {
				    die($this->db->error());
				}
				header('Location: /livros/listar');
				exit;
			} catch (\Exception $e) {
				echo "Erro ao alterar";
			}
    	} else {
				$select = $this->db->table('Livro')->getWhere(['id'=>$id])->getRowArray();
    	}
    	$this->echoHeader();
		echo "<h3>Editar Livro</h3>";
		echo view('formulario/livro_alterar', ['livro'=>$select]);
		echo view('base/footer');
	}
}
