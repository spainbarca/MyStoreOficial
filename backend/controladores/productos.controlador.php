<?php

class ControladorProductos{

	/*=============================================
	Mostrar Productos
	=============================================*/

	/* MOSTRAR PRODUCTOS */
	static public function ctrMostrarProductos($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;
	}

	/* CREAR PRODUCTO */
	public function ctrCrearProducto(){
		if(isset($_POST["nuevaDescripcion"])){

			if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
				preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&  
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) && 
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){

					/* Validar imagen */
					$ruta = "vistas/img/productos/default/product.jpg";

					if(isset($_FILES["nuevaImagen"]["tmp_name"])){
						list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
						
						$nuevoAncho = 500;
						$nuevoAlto = 500;
 
						/* Creamos el directorio donde vamos a guardar la foto del usuario*/
 
						$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];
						mkdir($directorio, 0755);
 
						/* De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP*/
						if ($_FILES["nuevaImagen"]["type"] == "image/jpeg"){
							$aleatorio = mt_rand(100,999);
							
							$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";
 
							$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
 
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
							imagejpeg($destino, $ruta);
						}
 
						if ($_FILES["nuevaImagen"]["type"] == "image/png"){
							$aleatorio = mt_rand(100,999);
							
							$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";
 
							$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
 
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
							imagepng($destino, $ruta);
						}
 
					}
					
					$tabla = "productos";

					$datos = array(	"id_categoria" => $_POST["nuevaCategoria"],
									"id_subcategoria" => $_POST["nuevaSubcategoria"],
									"codigo" => $_POST["nuevoCodigo"],
									"descripcion" => $_POST["nuevaDescripcion"],
									"incluye" => $_POST["caracteristicasProducto"],
									"stock" => $_POST["nuevoStock"],
									"precio_compra" => $_POST["nuevoPrecioCompra"],
									"precio_venta" => $_POST["nuevoPrecioVenta"],
									"imagen" => $ruta);

					$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>
	
						swal({
	
							type: "success",
							title: "¡El producto ha sido creado exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:	false
						}).then((result)=>{
	
							if(result.value){
							
								window.location = "productos";
	
							}
	
						});
					
	
						</script>';
					}

			}else{
				echo '<script>
						swal({
								type: "error",
								title: "El producto no puede ir con campos vacíos o llevar caracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then((result)=>{
								if(result.value){
									window.location = "productos";
								}
							});
					</script>';
			}
		}
	}

	/* EDITAR PRODUCTO */
	public function ctrEditarProducto(){
		if(isset($_POST["editarDescripcion"])){

			if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&  
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) && 
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

					/* Validar imagen */
					$ruta = $_POST["imagenActual"];

					if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){
						list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
						
						$nuevoAncho = 500;
						$nuevoAlto = 500;
 
						/* Creamos el directorio donde vamos a guardar la foto del usuario*/
 
						$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

						/* Preguntar si existe otra imagen en la BD */
						if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/product.jpg"){

							unlink($_POST["imagenActual"]);
						}else{
							mkdir($directorio, 0755);
						}

						/* De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP*/
						if ($_FILES["editarImagen"]["type"] == "image/jpeg"){
							$aleatorio = mt_rand(100,999);
							
							$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";
 
							$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
 
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
							imagejpeg($destino, $ruta);
						}
 
						if ($_FILES["editarImagen"]["type"] == "image/png"){
							$aleatorio = mt_rand(100,999);
							
							$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";
 
							$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
 
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
							imagepng($destino, $ruta);
						}
 
					}
					
					$tabla = "productos";

					$datos = array(	"id_categoria" => $_POST["editarCategoria"],
									"id_subcategoria" => $_POST["editarSubcategoria"],
									"codigo" => $_POST["editarCodigo"],
									"descripcion" => $_POST["editarDescripcion"],
									"incluye" => $_POST["editarCaracteristicas"],
									"stock" => $_POST["editarStock"],
									"precio_compra" => $_POST["editarPrecioCompra"],
									"precio_venta" => $_POST["editarPrecioVenta"],
									"imagen" => $ruta);

					$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>
	
						swal({
	
							type: "success",
							title: "¡El producto ha sido actualizado!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:	false
						}).then((result)=>{
	
							if(result.value){
							
								window.location = "productos";
	
							}
	
						});
					
	
						</script>';
					}else{
						echo '<script>
								swal({
										type: "error",
										title: "El producto no puede ir con campos vacíos o llevar caracteres especiales",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"

									}).then((result)=>{
										if(result.value){
											window.location = "productos";
										}
									});
							</script>';
					}
			}
		}
	}

	/* Borrar producto */
	/* public static function ctrEliminarProducto(){
		if(isset($_GET["idProducto"])){
			$tabla = "productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/product.jpg"){
				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);
			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script>

				swal({

					type: "success",
					title: "¡El producto ha sido eliminado correctamente!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm:	false
				}).then((result)=>{

					if(result.value){
					
						window.location = "productos";

					}

				});
			

				</script>';
			}
		}
	} */


	/*=============================================
	Eliminar Producto
	=============================================*/

	static public function ctrEliminarProducto($id){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $id);

		return $respuesta;
	}

	/* Mostrar suma ventas */
	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;
	}
}