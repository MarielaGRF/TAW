<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE ALUMNOS</h1>


<form method="post">
	
		<?php
			$registro = new MvcController();
			$registro -> FormAlumnosController();
			$registro -> registroAlumnosController();
		?>

</form>

<?php


if(isset($_GET["action"])){

	if($_GET["action"] == "oky"){

		echo "Registro Exitoso";
	
	}

}
?>