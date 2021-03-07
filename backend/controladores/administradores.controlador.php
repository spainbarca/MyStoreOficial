<?php

class ControladorAdministradores{

	/*=============================================
	Ingreso Administradores
	=============================================*/

	public function ctrIngresoAdministradores(){

		if(isset($_POST["ingresoUsuario"])){ /* Primera validacion: existencia del campo */

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"]) && /* Segunda validacion: tipos de caracteres vàlidos */
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])){

			   	$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); /* encriptar mi password */

			   	$tabla = "administradores";
			    $item = "usuario";
			    $valor = $_POST["ingresoUsuario"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor); /* Tercera validacion: Existencia de la fila */
				
				if($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword){ /* Cuarta validacion: Comparar lo capturado con lo digitado */

					if($respuesta["estado"] == 1){ /* Estado de usuario(activado o desactivado) */

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["idBackend"] = $respuesta["id"];


					/* REGISTRAR FECHA PARA SABER EL ULTIMO LOGIN */
					date_default_timezone_set('America/Lima');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');

					$fechaActual = $fecha.' '.$hora;

					$item01 = "ultimo_login";
					$valor01 = $fechaActual;

					$item02 = "id";
					$valor02 = $respuesta["id"];

					$ultimologin = ModeloAdministradores::mdlUltimoLoginAdministradores($tabla, $item01, $valor01, $item02, $valor02);

					if($ultimologin=="ok"){
						echo '<script>

							window.location = "'.$_SERVER["REQUEST_URI"].'";

				 		</script>';
					}
						 

				 		echo '<script>

							window.location = "'.$_SERVER["REQUEST_URI"].'";

				 		</script>';

			 		}else{

			 			echo "<div class='alert alert-danger mt-3 small'>ERROR: El usuario está desactivado</div>";

			 		}

				}else{

					echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
				}	

			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			}

		}
	}

	/*=============================================
	Mostrar Administradores
	=============================================*/

	static public function ctrMostrarAdministradores($item, $valor){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de administrador
	=============================================*/

	public function ctrRegistroAdministradores(){

		if(isset($_POST["registroNombre"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

				/* Validar imagen*/

				if(isset($_FILES["subirFoto"]["tmp_name"]) && !empty($_FILES["subirFoto"]["tmp_name"])){
					
					list($ancho, $alto) = getimagesize($_FILES["subirFoto"]["tmp_name"]);
					
					$nuevoAncho = 400;
					$nuevoAlto = 400;

					/* Creamos el directorio donde vamos a guardar la foto del usuario*/
					$directorio = "vistas/img/admins/".strtolower($_POST["registroUsuario"]);

					if(!file_exists($directorio)){	

						mkdir($directorio, 0755);
					}

					/* De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP*/
					if ($_FILES["subirFoto"]["type"] == "image/jpeg"){
						$aleatorio = mt_rand(100,999);
						
						$miruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $miruta);
					}

					else if ($_FILES["subirFoto"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						
						$miruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $miruta);
					}else{

						echo'<script>

							swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}
				
				
					$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "administradores";

					$misdatos = array("nombre" => $_POST["registroNombre"],
								"usuario" =>  $_POST["registroUsuario"],
								"password" => $encriptarPassword,
								"perfil" => $_POST["registroPerfil"],
								"estado" => 0,
								"fotito" => $miruta);

					
					$respuesta = ModeloAdministradores::mdlRegistroAdministrador($tabla, $misdatos);
					
					if($respuesta == "ok"){

						echo'<script>

							swal({
									type:"success",
									title: "¡CORRECTO!",
									text: "El administrador ha sido creado exitosamente",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
							}).then(function(result){

									if(result.value){   
										window.location = "administradores";
									} 
							});

						</script>';
					}else{
						echo'<script>

							swal({
									type:"error",
									title: "ERROR!",
									text: "El administrador no se pudo crear",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
							}).then(function(result){

									if(result.value){   
										window.location = "administradores";
									} 
							});

						</script>';
					}

				}
			   
			}	
				
				else{

					echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
				}
			}	


	}

	/*=============================================
	Editar administrador
	=============================================*/

	public function ctrEditarAdministrador(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])){

			   	if($_POST["editarPassword"] != ""){

			   		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

			   			$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');  			

			   		}else{

			   			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			   			return;

			   		}

			   	}else{

			   		$password = $_POST["passwordActual"];
				   }
				   
				   $miruta = $_POST["imgFotoActual"];
			
				   if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){				
					   list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
   
					   $nuevoAncho = 400;
					   $nuevoAlto = 400;
   
					   $directorio = "vistas/img/admins/".strtolower($_POST["editarUsuario"]);	
				   
					   /*=============================================
					   PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					   =============================================*/
   
					   if(isset($_POST["imgFotoActual"])){
						   
						   unlink($_POST["imgFotoActual"]);
   
					   }


					/* Creamos el directorio donde vamos a guardar la foto del usuario*/

			   		$directorio = "vistas/img/admins/".$_POST["editarUsuario"];

			   		/* Primero preguntamos si existe otra imagen en la BD */

			   		if (!empty($_POST["imgFotoActual"])) {
			   			
			   			unlink($_POST["imgFotoActual"]);

			   		}else{
			   			mkdir($directorio, 0755);
			   		}

   
					   /*=============================================
					   DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					   =============================================*/
   
					   if($_FILES["editarFoto"]["type"] == "image/jpeg"){
   
						   $aleatorio = mt_rand(100,999);
   
						   $miruta = $directorio."/".$aleatorio.".jpg";
   
						   $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
   
						   $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
   
						   imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
   
						   imagejpeg($destino, $miruta);	
   
					   }
   
					   else if($_FILES["editarFoto"]["type"] == "image/png"){
   
						   $aleatorio = mt_rand(100,999);
   
						   $miruta = $directorio."/".$aleatorio.".png";
   
						   $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						
   
						   $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
   
						   imagealphablending($destino, FALSE);
			   
						   imagesavealpha($destino, TRUE);
   
						   imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
   
						   imagepng($destino, $miruta);
   
					   }else{
   
						   echo'<script>
   
							   swal({
									   type:"error",
										 title: "¡CORREGIR!",
										 text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
										 showConfirmButton: true,
									   confirmButtonText: "Cerrar"
									 
							   }).then(function(result){
   
									   if(result.value){   
										   history.back();
										 } 
							   });
   
						   </script>';
   
						   return;
   
					   }
   
				   }  

				$tabla = "administradores";

				$misdatos = array("id"=> $_POST["editarId"],
							   "nombre" => $_POST["editarNombre"],
							   "usuario" =>  $_POST["editarUsuario"],
							   "password" => $password,
							   "perfil" => $_POST["editarPerfil"],
							   "fotito" => $miruta);

				
				$respuesta = ModeloAdministradores::mdlEditarAdministrador($tabla, $misdatos);
				
				if($respuesta == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El administrador ha sido actualizado",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "administradores";
								  } 
						});

					</script>';

				}


			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
			}

		}

	}

	/*=============================================
	Eliminar Administrador
	=============================================*/

	static public function ctrEliminarAdministrador($id){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlEliminarAdministrador($tabla, $id);

		return $respuesta;

	}

}