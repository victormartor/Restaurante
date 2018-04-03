<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pedido extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('pedido_model');
    }
    
    function index()
    {      
        $data['platos'] = $this->pedido_model->total_platos_paginados();
		
		$this->load->view('Frontend/header');
        $this->load->view('Frontend/pedido_view', $data);
		$this->load->view('Frontend/footer');
    }
  
    function agregarPlato()
    {
        $id = $this->input->post('id');
        $plato = $this->pedido_model->porId($id);
        $cantidad = 1;
        //obtenemos el contenido del carrito
        $carrito = $this->cart->contents();
        //cogemos los productos en un array para insertarlos en el carrito
        $insert = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $plato->precio,
            'name' => $plato->nombre
        );
        //insertamos al carrito
        $this->cart->insert($insert);
        //cogemos la url para redirigir a la página en la que estabamos
        $uri = $this->input->post('uri');
        //redirigimos mostrando un mensaje con las sesiones flashdata
        //de codeigniter confirmando que hemos agregado el producto
        $this->session->set_flashdata('agregado', 'El producto fue agregado correctamente');
        redirect(base_url().'pedido', 'refresh');
    }
    
    function eliminarPlato($rowid) 
    {
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $plato = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($plato);
        
        $this->session->set_flashdata('platoEliminado', 'El plato fue eliminado correctamente');
        redirect(base_url() . 'pedido', 'refresh');
    }
    
    function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect(base_url() . 'pedido', 'refresh');
    }
	
	function comprar(){
		$carrito = $this->cart->contents();
		$inser = $this->pedido_model->insertarPedido($carrito);
		$this->cart->destroy();
		$this->session->set_flashdata('destruido', 'El pedido se realizó correctamente');
		redirect(base_url() . 'pedido', 'refresh');
	}
}
