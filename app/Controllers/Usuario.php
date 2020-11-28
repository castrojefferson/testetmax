<?php namespace App\Controllers;

class Usuario extends BaseController {
	public function login() {
	    if($this->estaLogado()) {
	        header('Location: /');
	        exit;
	    }
	    
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['email']) {
					die('Falta email');
				}
				if (!$_POST['senha']) {
					die('Falta Senha');
				}

			try {
                $email = $_POST['email'];
                $usuario = $this->db->table('Usuario')->getWhere(['email' => $email])->getRowArray();

    	        $pw = md5(md5($_POST['senha']));

    	        if ( $pw != $usuario['senha'] ) {
    	            die('Email ou senha incorretos');
    	        }
    	        
        	    $builder = $this->db->table('Usuario');
        	    $builder->set('esta_logado', true, FALSE);
                $builder->where('email', $email);
                $builder->update();
        	    
                $_SESSION['usuario'] = $usuario;

                if($usuario){
                    header('Location: /index/');
                    exit;
                } else {
                    die("Não foi possivel fazer login");
                }

			} catch (\Exception $e) {
				echo "Não foi possivel fazer login, verifique o email e a senha";
			}
        }
	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
	echo "<h3>Login</h3>";
	echo view('formulario/usuario');
	echo view('base/footer');
	}

	public function logout() {
	    if(!$this->estaLogado()) {
	        header('Location: /usuario/login');
	        exit;
	    }
	    
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			try {
        	    $builder = $this->db->table('Usuario');
        	    $builder->set('esta_logado', false, FALSE);
                $builder->where('email', $this->getUserEmail());
                $builder->update();
                $_SESSION['usuario'] = null;

			} catch (\Exception $e) {
			}
        }
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
    	echo "<h3>Login</h3>";
    	echo "<form action='' method='POST'><button class='btn red'>Logout</button></form>";
    	echo view('base/footer');
	}


	public function cadastrar() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['email']) {
					die('Falta email');
				}
				if (!$_POST['senha']) {
					die('Falta Senha');
				}

			try {
                $usuario   = $this->db->table('Usuario')->getWhere(['email' => $email])->getRowArray();
                if ($usuario['email'] == $_POST['email'])
                    die('Email já cadastrado');
                    
    	        $_POST['senha'] = md5(md5($_POST['senha']));
				$insert = $this->db->table('Usuario')->insert($_POST);
				if (!$insert) throw new \Exception($this->db->error());
				header('Location: /usuario/login');
				exit;
			} catch (\Exception $e) {
				echo "Endereço de Email já cadastrado";
			}
    	}
    	echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado']]);
		echo "<h3>Cadastrar</h3>";
		echo view('formulario/usuario');
		echo view('base/footer');
	}
}
