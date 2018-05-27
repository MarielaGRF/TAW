<h1>REGISTRO DE PROFESORES</h1>


<form method="post">
	
		<?php
		session_start();

		if(!$_SESSION["validar"] ){

			header("location:index.php?action=ingresar");

			exit();

		}elseif ($_SESSION["validar"] and $_SESSION["tipo_usuario"]==1) {
			$registro = new MvcController();
			$registro -> FormProfesorController();
			$registro -> registroUsuarioController();
		}else{

			echo "<script> alert('Necesita ser un administrador para ingresar a esta seccion')</script>";
			#header("location:index.php?action=tutorias");
		}
		?>

</form>

<?php


if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}
?>