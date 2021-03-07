<?php 


require_once "../controladores/rfm.controlador.php";
require_once "../modelos/rfm.modelo.php";

class TablaRfm{

	/*=============================================
	Tabla clientes
	=============================================*/ 

	public function mostrarTablaRfm(){

		$respuesta = ControladorRfm::ctrMostrarRfm(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {
			

            $acciones = "<div class='btn-group'><button class='btn btn-success btn-sm btnGenerarRfm' idRfm='".$value["id"]."'><i class='fas fa-tools'></i> <strong>Generar</strong></button></div>";
            
		
		$datosJson .='[
				      "'.($key+1).'",
                      "'.$value["nombre"].'",
                      "'.$value["email"].'",
                      "'.$value["telefono"].'",
                      "'.$value["recencia"].'",
                      "'.$value["contaventa"].'",
                      "'.$value["totalventa"].'",
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

$tabla = new TablaRfm();
$tabla -> mostrarTablaRfm();



