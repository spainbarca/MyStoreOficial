<?php

require_once "conexion.php";

class ModeloVentas{

    /* Mostrar ventas */
    static public function mdlMostrarVentas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		
		$stmt -> close();
		$stmt = null;
	}

	/* Registro de venta */
	static public function mdlIngresarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_cliente, id_jalador, id_vendedor, productos, impuesto, neto, total, rate, modalidad, regalo, metodo_pago) VALUES (:codigo, :id_cliente, :id_jalador, :id_vendedor, :productos, :impuesto, :neto, :total, :rate, :modalidad, :regalo, :metodo_pago)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_jalador", $datos["id_jalador"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":rate", $datos["rate"], PDO::PARAM_INT);
		$stmt->bindParam(":modalidad", $datos["modalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":regalo", $datos["regalo"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/* Editar venta */
	static public function mdlEditarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/* Eliminar venta */
	static public function mdlEliminarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	
		}

		$stmt -> close();
		$stmt = null;
	}

	/* Rango fechas */
	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();
			return $stmt -> fetchAll();	

		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();
			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");
			}

			$stmt -> execute();
			return $stmt -> fetchAll();
		}
	}

	/* Sumar el total de ventas */
	static public function mdlSumaTotalVentas($tabla){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
		$stmt = null;
	}

	/* Mostrar ventas */
    static public function mdlMostrarVentasGrupo($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) AS cant_ventas, SUM(total) AS sum_total, DATE_FORMAT(fecha, '%m-%Y') AS periodo FROM $tabla GROUP BY periodo");

		$stmt -> execute();
		return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}

	/* Mostrar modalidad grupo */
    static public function mdlMostrarModalidadGrupo($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(modalidad) AS contamod, modalidad FROM $tabla GROUP BY modalidad");

		$stmt -> execute();
		return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}

	/* Mostrar descuento */
    static public function mdlMostrarDescuento($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM ventas WHERE impuesto=0");

		$stmt -> execute();
		return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}

	/* Mostrar calificacion */
    static public function mdlMostrarCalificacion($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT CASE(rate)WHEN 1 THEN 'Deficiente'
		WHEN 2 THEN 'Mala'
		WHEN 3 THEN 'Regular' 
		WHEN 4 THEN 'Buena' 
		WHEN 5 THEN 'Excelente' END calificacion, COUNT(id) AS contador FROM $tabla GROUP BY rate ORDER BY rate");

		$stmt -> execute();
		return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}

	/* Mostrar regalos */
    static public function mdlMostrarRegalos($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as cantidad, regalo FROM ventas GROUP BY regalo ORDER BY cantidad DESC");

		$stmt -> execute();
		return $stmt -> fetchAll();
		
		$stmt -> close();
		$stmt = null;
	}
}