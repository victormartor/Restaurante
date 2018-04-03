<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pedido_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
    }
    //obtenemos la cantidad de filas de los productos
    //para realizar la paginación
    function filas(){
        $consulta = $this->db->get('plato');
        return $consulta->num_rows();
    }
    //obtenemos todos los productos para paginarlos
    function total_platos_paginados(){
        $consulta = $this->db->get('plato');
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }
    //cuando pulsemos en añadir al carrito esta función será la encargada
    //de saber que producto hemos seleccionado por su id, que la envíamos desde
    //la vista al controlador, y desde el controlador aquí, el modelo.
    function porId($id) {
        $this->db->where('id', $id);
        $platos = $this->db->get('plato');
        foreach ($platos->result() as $plato) {
            $data[] = $plato;
        }
        return $plato;
    }
	
	function insertarPedido($carrito){
		$query = $this->db->get_where('usuarios', array('usuario' => $_SESSION['usuario']));
		$row = $query->row_array();
		if(isset($row)){
			$pedido = array('fecha' => date('y-m-d'), 'id_usuario' => $row['id']);
			$this->db->insert('pedido', $pedido);
			$pedido_id = $this->db->insert_id();
			foreach($carrito as $item){
				$pedidoplato = array('id_plato' => $item['id'], 'id_pedido' => $pedido_id, 'cantidad' => $item['qty']);
				$this->db->insert('pedidoplato', $pedidoplato);
			}
		}
	}
	
	function idUsuario(){
		$query = $this->db->get_where('usuarios', array('usuario' => $_SESSION['usuario']));
		$row = $query->row_array();
		if(isset($row)){
			return $row['id'];
		}
	}
}	
?>

