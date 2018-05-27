<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR TUTORIAS</h1>

<form method="post">
	
	<?php
	$id=$_SESSION["id"];
	$editarUsuario = new MvcController();
	$editarUsuario -> editarTutoriaController($id);
	$editarUsuario -> actualizarTutoriaController();

	?>

</form>

