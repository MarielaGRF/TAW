<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h4>EDITAR grupo</h4>

<form method="post">
	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editargrupoController();
	$editarUsuario -> actualizargrupoController();

	?>

</form>