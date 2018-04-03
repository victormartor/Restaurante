<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}
	
	public function index(){
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/contacto_view');
		$this->load->view('Frontend/footer');
	}
	
	function mensajeEnviado(){
		$datos = array('mensaje' => 'Email enviado');
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/contacto_view', $datos);
		$this->load->view('Frontend/footer');
	}
}
?>