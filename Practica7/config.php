<?php
    $db_host = "localhost";	// Host de la BD
    $db_user = "root";		// Usuario de la BD
    $db_pass = "";		// Contrasenia de la BD
    $db_name = "taw_practica7";	// Nombre de la BD
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if ($mysqli->connect_errno) {
      echo "Error al conectarse {$mysqli -> connect_errno}";
      die();
    }
?>
