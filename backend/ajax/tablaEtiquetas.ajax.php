<?php 


require_once "../controladores/etiquetas.controlador.php";
require_once "../modelos/etiquetas.modelo.php";

class TablaEtiquetas{

	/*=============================================
	Tabla clientes
	=============================================*/ 

	public function mostrarTablaEtiquetas(){

		$respuesta = ControladorEtiquetas::ctrMostrarEtiquetas(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {
			

            $acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarEtiqueta' data-toggle='modal' data-target='#modalEditarEtiqueta' idEtiqueta='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm btnEliminarEtiqueta' idEtiqueta='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";

            $caracteristicas = "<h5><div class='badge badge-secondary mx-1'><i class='".$value["codigo"]."'></i> ".$value["nombre"]."</div></h5>";
            
		
		$datosJson .='[
				      "'.($key+1).'",
                      "'.$value["nombre"].'",
                      "'.$value["codigo"].'",
                      "'.$value["destino"].'",
                      "'.$caracteristicas.'",
				      "'.$acciones.'"
				    ],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';


		echo $datosJson;

	}

}

/*=============================================
Tabla Administradores
=============================================*/ 

$tabla = new TablaEtiquetas();
$tabla -> mostrarTablaEtiquetas();



