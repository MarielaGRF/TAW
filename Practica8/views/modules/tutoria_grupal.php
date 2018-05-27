<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h4>REGISTRO DE TUTORIAS GRUPALES</h4>

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

			echo "<script>alert(Registro Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Realizo El Registro)</script>";
	}

}

?>