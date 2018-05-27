<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE TUTORIAS GRUPALES</h1>

<form method="post">
	

		<?php
			$id=$_SESSION["id"];
			$registro = new MvcController();
			$registro -> FormTutoriasGrupalesController($id);
			$registro -> registroTutoriaGrupalController($id);
		?>

</form>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "oki"){

		echo "Registro Exitoso";
	
	}

}

?>