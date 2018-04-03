<?php
class Platos_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function get_platos(){
		$consulta = $this -> db -> query ( 'Select * from plato where id_seccion=1 or id_seccion=2;' );
		return $consulta->result();
	}
}
?>