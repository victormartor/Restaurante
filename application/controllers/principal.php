<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class principal extends CI_Controller{
	
	public function __contruct(){
		parent::__contruct();
	}
	public function index(){
		$this->load->view('Frontend/header');
		$this->load->view('Frontend/cuerpo');
		$this->load->view('Frontend/footer');
	}
}
?>