<?php 


require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/habitaciones.controlador.php";
require_once "../modelos/habitaciones.modelo.php";

class TablaProductos{

	/*=============================================
	Tabla Productos
	=============================================*/ 

	public function mostrarTablaProductos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		if(count($productos) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;
		}

		$datosJson = '{
	
		"data":[';

		foreach ($productos as $key => $value) {
			
			/* if($value["id"] != 1){

			}else{

				$estado = "<button class='btn btn-info btn-sm'>Activado</button>";
			}
 			*/
			if ($value["imagen"]!= "") {
				$imagen = "<img src='".$value["imagen"]."' class='img-fluid' width='60px'>";
			  }else{
				$imagen = "<img src='vistas/img/productos/default/product.jpg' class='img-fluid' width='60px'>";
            }
            
            /* TRAER LA CATEGORIA DEL PRODUCTO*/
            $item = "id";
            $valor = $value["id_categoria"];

            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor); 

            /* TRAER LA SUBCATEGORIA DEL PRODUCTO*/
            //$item = "id_h";
            $valor = $value["id_subcategoria"];
 
			$subcategorias = ControladorHabitaciones::ctrMostrarHabitaciones($valor);
			
			/* ASIGNAR STOCK*/
			if($value["stock"] <= 12){
              
				$stock = "<button class='btn btn-danger'>".$value["stock"]."</button>";
	
			}else if($value["stock"] > 12 && $value["stock"]<= 36){
	
				$stock = "<button class='btn btn-warning'>".$value["stock"]."</button>";
	
			}else{
	
				$stock = "<button class='btn btn-success'>".$value["stock"]."</button>";
			}


			/*=============================================
			CARACTERÍSTICAS
			=============================================*/	

			$caracteristicas = "";

			$jsonIncluye = json_decode($value["incluye"], true);

			foreach ($jsonIncluye as $indice => $valor) {

				$caracteristicas .= "<div class='badge badge-secondary mx-1'><i class='".$valor["icono"]."'></i> ".$valor["item"]."</div>";
			}

			/* $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$value["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$value["id"]."' codigo='".$value["codigo"]."' imagen='".$value["imagen"]."'><i class='fa fa-times'></i></button></div>";  */

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarProducto' idProducto='".$value["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm btnEliminarProducto' idProducto='".$value["id"]."' codigo='".$value["codigo"]."' imagen='".$value["imagen"]."'><i class='fas fa-trash-alt'></i></button></div>";
		
			
			
		
			$datosJson .='[
                      "'.($key+1).'",
                      "'.$imagen.'",
				      "'.$value["codigo"].'",
					  "'.$value["descripcion"].'",
					  "'.$categorias["tipo"].'",
					  "'.$subcategorias["estilo"].'",
					  "'.$caracteristicas.'",
					  "'.$stock.'",
					  "'.$value["precio_compra"].'",
					  "'.$value["precio_venta"].'",
					  "'.$value["fecha"].'",
				      "'.$acciones.'"
				    ],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';


		echo $datosJson;

	}

}

/* ACTIVAR TABLA PRODUCTOS*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();



