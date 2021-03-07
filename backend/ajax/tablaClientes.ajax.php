<?php 


require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaCliente{

	/*=============================================
	Tabla clientes
	=============================================*/ 

	public function mostrarTablaClientes(){

		$respuesta = ControladorClientes::ctrMostrarClientes(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {
			

            $acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarCliente' data-toggle='modal' data-target='#modalEditarCliente' idCliente='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm btnEliminarCliente' idCliente='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";
            
		
		$datosJson .='[
				      "'.($key+1).'",
                      "'.$value["nombre"].'",
                      "'.$value["documento"].'",
                      "'.$value["email"].'",
                      "'.$value["telefono"].'",
                      "'.$value["direccion"].'",
                      "'.$value["fecha_nacimiento"].'",
                      "'.$value["compras"].'",
                      "'.$value["ultima_compra"].'",
					  "'.$value["fecha"].'",
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

$tabla = new TablaCliente();
$tabla -> mostrarTablaClientes();



