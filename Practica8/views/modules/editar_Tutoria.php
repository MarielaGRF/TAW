<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h4>EDITAR TUTORIAS</h4>

<form method="post">
	
	<?php
	$id=$_SESSION["id"];
	$editarUsuario = new MvcController();
	$editarUsuario -> editarTutoriaController($id);
	$editarUsuario -> actualizarTutoriaController();

	?>

</form>

