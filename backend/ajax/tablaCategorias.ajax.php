<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaCategorias{

	/*=============================================
	Tabla Categorías
	=============================================*/ 

	public function mostrarTabla(){

		$categorias = ControladorCategorias::ctrMostrarCategorias(null, null);	//llamado al crud de mostrar datos

		if(count($categorias)== 0){ 	// Conteo de filas de la tabla

 			$datosJson = '{"data": []}';	//coloco esta estructura en caso no haya filas

			echo $datosJson;

			return;

 		}

		 //Si es que hay filas, se hace lo siguiente
 		$datosJson = '{		

	 	"data": [ ';

	 	foreach ($categorias as $key => $value) {

	 		/*=============================================
			COLOR
			=============================================*/	

	 		$color = "<i style='color:".$value["color"]."' class='fas fa-square'></i>";

	 		/*=============================================
			IMAGEN
			=============================================*/	

			$imagen = "<img src='".$value["img"]."' class='img-fluid' width='250px'>";

			/*=============================================
			CARACTERÍSTICAS
			=============================================*/	

			$caracteristicas = ""; //creo mi variable q mostrarà las etiquetas ya diseñadas (almaceno codigo)

			$jsonIncluye = json_decode($value["incluye"], true); //identifico que mi data esta en formato NoSQL (tuplas representados por llaves y los atributos representados por dos puntos)

			foreach ($jsonIncluye as $indice => $valor) { //hago un recorrido por los datos en formato JSON (NoSQL)

				$caracteristicas .= "<h5><div class='badge badge-dark mx-1'><i class='".$valor["icono"]."'></i> ".$valor["item"]."</div></h5>";
			}
	
			/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarCategoria' data-toggle='modal' data-target='#editarCategoria' idCategoria='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarCategoria' idCategoria='".$value["id"]."' imgCategoria='".$value["img"]."' tipoCategoria='".$value["tipo"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["ruta"].'",
						"'.$color.'",
						"'.$value["tipo"].'",
						"'.$imagen.'",
						"'.$value["descripcion"].'",
						"'.$caracteristicas.'",
						"'.$acciones.'"
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Categorias
=============================================*/ 

$tabla = new TablaCategorias();
$tabla -> mostrarTabla();


