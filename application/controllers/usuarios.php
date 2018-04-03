<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}
	public function index(){
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/usuarios_view');
		$this->load->view('Frontend/footer');
	}
	
	public function verify_registro(){
		$this->form_validation->set_rules('usuario', 'Username', 'required|trim|callback_verify_user');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('contraseña', 'Password', 'required', array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('confirmacioncontraseña', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('correo', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/usuarios_view');
			$this->load->view('Frontend/footer');
		}
		else
		{
			$this->usuarios_model->add_usuario();
			$datos = array('mensaje' => 'El usuario se ha registrado correctamente.');
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/usuarios_view', $datos );
			$this->load->view('Frontend/footer');
		}
	}
	function verify_user($usuario){
		$variable = $this->usuarios_model->verify_user($usuario);
		if($variable == true){ //existe el usuario
			return false ; //no pasaria la validación porque el usuario ya existe
		} else{
			return true ;
		}
	}
}
?>