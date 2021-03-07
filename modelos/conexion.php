<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=bd_mystore",
						"root",
						"");

		$link->exec("set names utf8");

		return $link;

	}


}