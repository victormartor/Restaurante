<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	//Comprueba si el usuario existe o no
	public function verify_user($user){
		$query = $this->db->get_where('usuarios', array('usuario' => $user));
		$row = $query->row();
		if(isset($row)){
			return true;
		}else
			return false;
	}
	//añade un usuario
	public function add_usuario(){
		$this->db->insert('usuarios' , array(
			'nombre' => $this->input->post('nombre' , TRUE ), 
			'apellidos' => $this->input->post('apellidos' , TRUE ), 
			'direccion' => $this->input->post('direccion' , TRUE ), 
			'correo' => $this->input->post('correo' , TRUE), 
			'usuario' => $this->input->post('usuario' , TRUE ), 
			'contraseña' => $this->input->post('contraseña' , TRUE), 
			'estado' => '0',
			'admin' => '0'));
	}
	
	//verifica usuario y contraseña
	public function verify_sesion(){
		$consulta = $this->db->get_where('usuarios' , array('usuario' => $this->input->post('usuario' , TRUE ), 'contraseña' => $this->input->post('contraseña' , TRUE)));
		if($consulta->num_rows() == 1){
			return true;
		} else{
			return false;
		}
	}

	//devuelve true si es admin
	public function is_admin(){
		$consulta = $this->db->get_where('usuarios' , array('usuario' => $this->input->post('usuario', TRUE)));
		$fila = $consulta->row();
		if($fila->admin == 1)
			return true;
		else
			return false;
	}
}
?>