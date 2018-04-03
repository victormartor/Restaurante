<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Platos extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('platos_model');
	}
	public function index(){
		$platos = $this->platos_model->get_platos();
		$datos['platos'] = $platos;
		
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/platos_view',$datos);
		$this->load->view('Frontend/footer');
	}
}
?>