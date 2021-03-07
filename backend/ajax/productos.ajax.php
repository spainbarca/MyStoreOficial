<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

	/*=============================================
	Editar Administrador
	=============================================*/	

	/* public $idProducto;

	public function ajaxMostrarProductos(){

		$item = "id";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::mdlMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	}
 */

	public $ruta;

	public function ajaxTraerHabitacion(){

		$valor = $this->ruta;

		$respuesta = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

		echo json_encode($respuesta);

	}

	
	/* Generar codigo a partir de idCategoria */
    public $idCategoria;

    public function ajaxCrearCodigoProducto(){

        $item = "id_categoria";
        $valor = $this->idCategoria;
        $orden = "id";
        
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);
	}

	/* Editar producto */
    public $idProducto;
    public $traerProductos;
    public $nombreProducto;

    public function ajaxEditarProducto(){

        if($this->traerProductos == "ok"){
            
            $item = null;
            $valor = null;
            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
            echo json_encode($respuesta);

        }else if($this->nombreProducto != ""){

            $item = "descripcion";
            $valor = $this->nombreProducto;
            $orden = "id";
    
            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
            echo json_encode($respuesta);
        
        }else{
            
            $item = "id";
            $valor = $this->idProducto;
            $orden = "id";
    
            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
            echo json_encode($respuesta);
        }
    }


    /*=============================================
	Eliminar Producto
	=============================================*/	

	public $idEliminar;

	public function ajaxEliminarProducto(){

		$respuesta = ControladorProductos::ctrEliminarProducto($this->idEliminar);

		echo $respuesta;

	}
	

}

/* Generar código a partir de idCategoria */
if (isset($_POST["idCategoria"])) {
    
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();
}

/* Editar producto */
if (isset($_POST["idProducto"])) {
    
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}

/* Traer producto */
if (isset($_POST["traerProductos"])) {
    
    $traerProductos = new AjaxProductos();
    $traerProductos -> traerProductos = $_POST["traerProductos"];
    $traerProductos -> ajaxEditarProducto();
}

/* n producto */
if (isset($_POST["nombreProducto"])) {
    
    $nombreProducto = new AjaxProductos();
    $nombreProducto -> nombreProducto = $_POST["nombreProducto"];
    $nombreProducto -> ajaxEditarProducto();
}

/*Combobox dinamico */
if(isset($_POST["ruta"])){

	$ruta = new AjaxHabitaciones();
	$ruta -> ruta = $_POST["ruta"];
	$ruta -> ajaxTraerHabitacion();

}

/*=============================================
Eliminar Clientes
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxProductos();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarProducto();
}