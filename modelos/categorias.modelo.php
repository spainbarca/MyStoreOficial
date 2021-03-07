<?php

require_once "conexion.php";

Class ModeloCategorias{

	/*=============================================
	mostrar Categorias
	=============================================*/
	
	static public function mdlMostrarCategorias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 3");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarCategoriasSub($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT categorias.*, COUNT(habitaciones.id_h) AS conta FROM categorias INNER JOIN habitaciones WHERE categorias.id = habitaciones.tipo_h GROUP BY tipo ORDER BY id DESC LIMIT 3");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Mostrar Categoria Singular
	=============================================*/

	static public function mdlMostrarCategoria($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id= :id");

		$stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	
	}

}