<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserva_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	//añade una reserva
	public function add_reserva(){
		$query = $this->db->get_where('usuarios', array('usuario' => $_SESSION['usuario']));
		$row = $query->row_array();
		if(isset($row)){
			$this->db->insert('reserva' , array('fecha' => $this->input->post('fecha' , TRUE ), 'numPersonas' => $this->input->post('personas' , TRUE ), 
			'hora' => $this->input->post('hora' , TRUE ), 'id_usuario' => $row['id']));
		}
	}
}
?>