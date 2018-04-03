<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
	}
	public function index(){
		$result1 = $this->menu_model->get_seccion();
		$datos['secciones'] = $result1;
		
		$result2 = $this->menu_model->get_menu();
		$datos['platos'] = $result2;
		
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/vista_menu',$datos);
		$this->load->view('Frontend/footer');
	}
}
?>