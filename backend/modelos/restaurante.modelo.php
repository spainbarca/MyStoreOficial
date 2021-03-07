<?php

require_once "conexion.php";

class ModeloRestaurante{

	/*=============================================
	Mostrar Restaurante
	=============================================*/

	static public function mdlMostrarRestaurante($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro Restaurante
	=============================================*/

	static public function mdlRegistroRestaurante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(responsable, descripcion, img) VALUES (:responsable, :descripcion, :img)");

		$stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	Editar Restaurante
	=============================================*/

	static public function mdlEditarRestaurante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, img = :img  WHERE id = :id");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Eliminar Restaurante
	=============================================*/

	static public function mdlEliminarRestaurante($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarJaladores($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		
			$stmt-> close();

		
			$stmt = null;

	}

	/* Ventas jaladores */
	static public function mdlVentasJaladores($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT restaurante.id, restaurante.responsable, COUNT(ventas.id) AS cant_ventas 
		FROM ventas 
		INNER join restaurante ON ventas.id_jalador=restaurante.id 
		WHERE restaurante.descripcion='Jalador'
		GROUP BY restaurante.responsable");

		$stmt -> execute();

		return $stmt -> fetchAll();

	
		$stmt-> close();

	
		$stmt = null;

	}

	/* Ventas jaladores */
	static public function mdlTotalVentasJaladores($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT restaurante.id, restaurante.responsable, ventas.id AS venta_id 
		FROM ventas 
		INNER join restaurante ON ventas.id_jalador=restaurante.id 
		WHERE restaurante.descripcion='Jalador'");

		$stmt -> execute();

		return $stmt -> fetchAll();

	
		$stmt-> close();

	
		$stmt = null;

	}



}