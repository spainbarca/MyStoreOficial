<?php

class ControladorEtiquetas{

    /* Crear cliente */
    static public function ctrCrearEtiqueta(){

		if(isset($_POST["nuevoCodigo"])){

			if(preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ -]+$/", $_POST["nuevoCodigo"]) &&
			   preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $_POST["nuevoNombre"])){

			   	$tabla = "tags";

			   	$datos = array("nombre"=>$_POST["nuevoNombre"],
					           "codigo"=>$_POST["nuevoCodigo"],
					           "destino"=>$_POST["seleccionarDestino"]);

			   	$respuesta = ModeloEtiquetas::mdlIngresarEtiqueta($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La etiqueta ha sido creada exitosamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "etiquetas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La etiqueta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "etiquetas";

							}
						})

			  	</script>';



			}

		}

    }
    
    /* Mostrar etiquetas */
    static public function ctrMostrarEtiquetas($item, $valor){

		$tabla = "tags";

		$respuesta = ModeloEtiquetas::mdlMostrarEtiquetas($tabla, $item, $valor);

		return $respuesta;
    }
    
    /* Editar cliente */
    static public function ctrEditarEtiqueta(){

		if(isset($_POST["editarEtiqueta"])){

			if(preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ -]+$/", $_POST["editarCodigo"]) &&
			preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $_POST["editarEtiqueta"])){

			   	$tabla = "tags";

			   	$datos = array("id"=>$_POST["idEtiqueta"],
								"nombre"=>$_POST["editarEtiqueta"],
								"codigo"=>$_POST["editarCodigo"],
					           	"destino"=>$_POST["editarDestino"]);

			   	$respuesta = ModeloEtiquetas::mdlEditarEtiqueta($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La etiqueta ha sido actualizada",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "etiquetas";
									}
								})
					</script>';
				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La etiqueta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "etiquetas";
							}
						})
			  	</script>';
			}
		}
    }
    

    /*=============================================
	Eliminar Cliente
	=============================================*/

	static public function ctrEliminarEtiqueta($id){

		$tabla = "tags";

		$respuesta = ModeloEtiquetas::mdlEliminarEtiqueta($tabla, $id);

		return $respuesta;

	}
} 