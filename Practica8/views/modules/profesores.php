<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE PROFESORES</h1>


<form method="post">
	
		<?php
			$registro = new MvcController();
			$registro -> FormProfesorController();
			$registro -> registroUsuarioController();
		?>

</form>

<?php


if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}
?>