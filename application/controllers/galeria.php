<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('galeria_model');
	}
	public function index(){
		$platos = $this->galeria_model->get_platos();
		$datos['platos'] = $platos;
		
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/galeria_view',$datos);
		$this->load->view('Frontend/footer');
	}
}
?>