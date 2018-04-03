<?php
class Menu_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function get_seccion(){
		$consulta = $this->db->get('seccion');
		return $consulta->result();
	}
	public function get_menu(){
		$consulta = $this->db->get('plato');
		return $consulta->result();
	}
	/*public function get_menu_seccion($id){
		$consulta = $this->db->query('Select * from plato where id_seccion = $id');
		return $consulta->result();
	}*/
}
?>