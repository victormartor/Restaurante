<?php
class Admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function get_reservas(){
		$consulta = $this -> db -> query ( 'Select reserva.fecha as fecha, reserva.numPersonas as numPersonas, reserva.hora as hora, usuarios.nombre as nombre, 
			usuarios.apellidos as apellidos from reserva, usuarios where reserva.id_usuario = usuarios.id;' );
		return $consulta->result();
	}
}
?>