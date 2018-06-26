<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=taw_Examen2","root","");
		return $link;

	}

}

?>
