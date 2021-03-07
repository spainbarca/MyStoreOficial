<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/* EDITAR CLIENTE */	
	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);
    }
    
    /*=============================================
	Eliminar Cliente
	=============================================*/	

	public $idEliminar;

	public function ajaxEliminarCliente(){

		$respuesta = ControladorClientes::ctrEliminarCliente($this->idEliminar);

		echo $respuesta;

	}
}

/* Editar Cliente */
if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();
}

/*=============================================
Eliminar Clientes
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxClientes();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarCliente();

}