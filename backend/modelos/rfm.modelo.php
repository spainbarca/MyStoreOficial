<?php

require_once "conexion.php";

class ModeloRfm{

    /* Mostrar cliente */
    static public function mdlMostrarRfm($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT clientes.id, nombre, email, telefono, 
            COUNT(ventas.id) AS contaventa,SUM(ventas.neto) AS totalventa, DATEDIFF(NOW(),MAX(ventas.fecha)) AS recencia
            FROM clientes 
            INNER JOIN ventas ON clientes.id = ventas.id_cliente 
            GROUP BY ventas.id_cliente
            ORDER BY nombre ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}

		$stmt -> close();
		$stmt = null;
    }
    
}