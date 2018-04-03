<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}
	public function index(){	
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/admin_view');
		$this->load->view('Frontend/footer');
	}

	public function reservas(){
		$reservas = $this->admin_model->get_reservas();
		$datos['reservas'] = $reservas;
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/admin_view', $datos);
		$this->load->view('Frontend/footer');
	}

	public function pedidos(){
		$datos['pedidos'] = true;
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/admin_view', $datos);
		$this->load->view('Frontend/footer');
	}
}
?>