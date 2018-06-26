<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<h4>REGISTRO DE ALUMNOS</h4>


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

		echo "<script>alert(Registro Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Registrar)</script>";
	}

}
?>