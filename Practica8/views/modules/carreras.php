<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE CARRERAS</h1>

<form method="post">
	

	<input type="text" placeholder="nombre" name="nombre" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroCarrerasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "oki"){

		echo "Registro Exitoso";
	
	}

}

?>
