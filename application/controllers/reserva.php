<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('reserva_model');
	}
	public function index(){
		if(empty($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == FALSE){
			redirect(login);
		}else if($_SESSION['is_logged_in'] == TRUE){
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/reserva_view');
			$this->load->view('Frontend/footer');
		}
	}
	
	public function verify_reserva(){
		$this->form_validation->set_rules('personas', 'Personas', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('hora', 'Hora', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/reserva_view');
			$this->load->view('Frontend/footer');
		}
		else
		{
			$this->reserva_model->add_reserva();
			$datos = array('mensaje' => 'La Reserva se ha realizado correctamente.');
			$this->load->view('Frontend/header');
			$this->load->view('Frontend/reserva_view', $datos );
			$this->load->view('Frontend/footer');
		}
	}
}
?>