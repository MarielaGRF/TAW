<h4>REGISTRO DE ALUMNOS</h4>


<form method="post">
			<?php
		/*session_start();

		if(!$_SESSION["validar"] ){

			header("location:index.php?action=ingresar");

			exit();

		}elseif ($_SESSION["validar"] and $_SESSION["tipo_usuario"]==1) {*/
			
			$registro = new MvcController();
			$registro -> FormGrupoController();
			$registro -> FormAlumnosController();
			$registro -> registroAlumnosController();
	
		/*}else{

			echo "<script> alert('Necesita ser un administrador para ingresar a esta seccion')</script>";
			#header("location:index.php?action=tutorias");
		}*/
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