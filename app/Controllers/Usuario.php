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

    	        $pw = md5(md5($_POST['senha']));

                $usuario = $this->db->table('Usuario')->getWhere(['email' => $email, 'senha' => $pw])->getRowArray();
    	        if (!$usuario['senha'] ) {
    	            die('Email ou senha incorretos');
    	        }
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usuario']['esta_logado'] = true;

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
    	$this->echoHeader();
    	echo "<h3>Login</h3>";
    	echo view('formulario/usuario_login');
    	echo view('base/footer');
	}

	public function logout() {
	    if(!$this->estaLogado()) {
	        header('Location: /usuario/login');
	        exit;
	    }
	    
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			try {
                $_SESSION['usuario'] = null;
        	    $builder = $this->db->table('Usuario');
        	    $builder->set('esta_logado', false, FALSE);
                $builder->where('email', $this->getUserEmail());
                $builder->update();
    	        header('Location: /usuario/login');
    	        exit;
			} catch (\Exception $e) {
			}
        }
    	$this->echoHeader();
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
		$this->echoHeader();
		echo "<h3>Cadastrar Conta</h3>";
		echo view('formulario/usuario');
		echo view('base/footer');
	}

	public function editar() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['nome']) {
					die('Falta Nome');
				}

			try {
			    $atualizar = ['nome' => $_POST['nome']];
			    
			    if($_POST['senha']) {
			        $atualizar['senha'] = md5(md5($_POST['senha']));
			    }
			    
				$update = $this->db->table('Usuario')->update($atualizar, ['email' => $this->getUserEmail()]);

				if (!$update) {
				    die('Não foi possivel atualizar');   
				}
				header('Location: /usuario/login');
				exit;
			} catch (\Exception $e) {
				echo "Erro ao atualizar";
			}
    	}
		$this->echoHeader();
		echo "<h3>Editar Perfil</h3>";
		echo view('formulario/usuario_editar', ['nome'=>$_SESSION['usuario']['nome'],'email'=>$_SESSION['usuario']['email']]);
		echo view('base/footer');
	}

	public function cadastrarAdmin() {
        $this->requerLogin();
	    if (!$this->eAdministrador() == 1)
	        die("Sem permissão para cadastrar usuario administrado");
        $this->requerAdmin();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (!$_POST['email']) {
					die('Falta email');
				}
				if (!$_POST['senha']) {
					die('Falta Senha');
				}

			try {
                $usuario = $this->db->table('Usuario')->getWhere(['email' => $email])->getRowArray();
                if ($usuario['email'] == $_POST['email'])
                    die('Email já cadastrado');
                    
    	        $_POST['senha'] = md5(md5($_POST['senha']));
    	        $_POST['grupo'] = 1;
				$insert = $this->db->table('Usuario')->insert($_POST);
				if (!$insert) throw new \Exception($this->db->error());
				header('Location: /usuarios');
				exit;
			} catch (\Exception $e) {
				echo "Endereço de Email já cadastrado";
			}
    	}
    	$this->echoHeader();
		echo "<h3>Cadastrar Admin</h3>";
		echo view('formulario/usuario');
		echo view('base/footer');
	}
}
