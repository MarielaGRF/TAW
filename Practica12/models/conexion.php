<?php

class Conexion{

	public function conectar(){
		//Realiza la conexion con la base de datos
		$link = new PDO("mysql:host=localhost;dbname=taw_practica12","root","");
		return $link;

	}

}

?>
