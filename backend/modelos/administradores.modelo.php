<?php

require_once "conexion.php";	//llamado a la clase de base de datos

class ModeloAdministradores{

	/*=============================================
	Mostrar Administradores
	=============================================*/
	static public function mdlMostrarAdministradores($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR); // = @cliente = txtCliente.Text   varchar(50)

			$stmt -> execute();										//ExecuteNonQuery

			return $stmt -> fetch();								//Capturar toda una fila

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();								//Capturar varias filas

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Registro administradores
	=============================================*/

	static public function mdlRegistroAdministrador($tabla, $misdatos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, estado, fotito) VALUES (:nombre, :usuario, :password, :perfil, :estado, :fotito)");

		$stmt->bindParam(":nombre", $misdatos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $misdatos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $misdatos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $misdatos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $misdatos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":fotito", $misdatos["fotito"], PDO::PARAM_STR);

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
	Editar Administrador
	=============================================*/

	static public function mdlEditarAdministrador($tabla, $misdatos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password,  perfil = :perfil, fotito = :fotito WHERE id = :id");

		$stmt->bindParam(":nombre", $misdatos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $misdatos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $misdatos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $misdatos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":fotito", $misdatos["fotito"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $misdatos["id"], PDO::PARAM_INT);

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
	Actualizar administrador
	=============================================*/

	static public function mdlActualizarAdministrador($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}

	/* ACTUALIZAR ULTIMO LOGIN */
	static public function mdlUltimoLoginAdministradores($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	Eliminar Administrador
	=============================================*/

	static public function mdlEliminarAdministrador($tabla, $id){

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

}