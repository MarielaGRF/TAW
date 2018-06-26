<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=taw_examen2","root","");
		return $link;

	}

}

?>
