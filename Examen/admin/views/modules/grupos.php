<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<h4>GRUPOS</h4>

<form method="post">
	<input type="text" placeholder="nombre" name="nombre" required>

	<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">
				
</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroGrupoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "oki"){

			echo "<script>alert(Registro Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Registrar)</script>";
	}

}

?>
