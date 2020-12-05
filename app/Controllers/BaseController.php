<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	
	/**
	 * DB 
	 */
	protected $db;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
	    
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		session_start();
		$this->db = \Config\Database::connect();
	}
	
	public function requerLogin($redirectNaoLogado=null) {
	    if($_SESSION['usuario']['esta_logado']) {
	        return true;
	    } else {
	        header('Location: /usuario/login');
	        exit;
	    }
	}
	public function requerAdmin($redirectNaoLogado=null) {
	    if($_SESSION['usuario']['grupo'] == 1) {
	        return true;
	    } else {
	        echo "Usuario não autorizado, entre como administrador";
	        exit;
	    }
	}
	public function estaLogado() {
	    if($_SESSION['usuario']['esta_logado']) {
	        return true;
	    } else {
	        return false;
	    }
	}
	public function getUserEmail() {
	    return $_SESSION['usuario']['email'];
	}
	public function eAdministrador() {
	    if ($_SESSION['usuario']['grupo'] == 1) {
	        return '1';
	    } else {
    	    return '0';
	        
	    }
	}
	public function echoHeader() {
	    echo view('base/header', ['esta_logado'=>$_SESSION['usuario']['esta_logado'], 'e_administrador'=>$this->eAdministrador()]);
	}
}
