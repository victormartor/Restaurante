<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}
	
	public function index(){
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/login_view');
		$this->load->view('Frontend/footer');
	}
	
	public function verify_sesion(){
		$datos = array('usuario' => $this->input->post('usuario'));
		$variable = $this->usuarios_model->verify_sesion();
		if($variable){
			$_SESSION['usuario'] = $this->input->post('usuario');
			$_SESSION['is_logged_in'] = TRUE;
			if($this->usuarios_model->is_admin()) $_SESSION['admin'] = TRUE;
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/cuerpo');
			$this->load->view('Frontend/footer');
		} else {
			$datos = array('mensaje' => 'Usuario y/o contraseña incorrecto.');
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/login_view', $datos);
			$this->load->view('Frontend/footer');
		}
	}
	
	public function logout(){
		$_SESSION['is_logged_in'] = FALSE;
		session_destroy();
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/cuerpo');
		$this->load->view('Frontend/footer');
	}
}
?>