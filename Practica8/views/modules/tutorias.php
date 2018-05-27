
<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h4>REGISTRO DE TUTORIAS</h4>
<form method="post">
	
	
		<?php
			$id=$_SESSION["id"];
			$registro = new MvcController();
			$registro -> FormTutoriaController($id);
			$registro -> registroTutoriaController($id);
		?>

</form>

<?php


if(isset($_GET["action"])){

	if($_GET["action"] == "echo"){

			echo "<script>alert(Registro Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Realizo El Registro)</script>";
	}

	

}

?>