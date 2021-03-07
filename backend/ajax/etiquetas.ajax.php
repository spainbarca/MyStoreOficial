<?php

require_once "../controladores/etiquetas.controlador.php";
require_once "../modelos/etiquetas.modelo.php";

class AjaxEtiquetas{

	/* EDITAR CLIENTE */	
	public $idEtiqueta;

	public function ajaxEditarEtiqueta(){

		$item = "id";
		$valor = $this->idEtiqueta;

		$respuesta = ControladorEtiquetas::ctrMostrarEtiquetas($item, $valor);

		echo json_encode($respuesta);
    }
    
    /*=============================================
	Eliminar Cliente
	=============================================*/	

	public $idEliminar;

	public function ajaxEliminarEtiqueta(){

		$respuesta = ControladorEtiquetas::ctrEliminarEtiqueta($this->idEliminar);

		echo $respuesta;

	}
}

/* Editar Cliente */
if(isset($_POST["idEtiqueta"])){

	$cliente = new AjaxEtiquetas();
	$cliente -> idEtiqueta = $_POST["idEtiqueta"];
	$cliente -> ajaxEditarEtiqueta();
}

/*=============================================
Eliminar Clientes
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxEtiquetas();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarEtiqueta();

}