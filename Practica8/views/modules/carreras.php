<h4>REGISTRO DE CARRERAS</h4>

<form method="post">
	
	<?php
		session_start();

		if(!$_SESSION["validar"] ){

			header("location:index.php?action=ingresar");

			exit();

		}elseif ($_SESSION["validar"] and $_SESSION["tipo_usuario"]==1) {
			echo '<input type="text" placeholder="nombre" name="nombre" required>

	<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';
		}else{

			echo "<script> alert('Necesita ser un administrador para ingresar a esta seccion')</script>";
			#header("location:index.php?action=tutorias");
		}
		?>


	

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroCarrerasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "oki"){

			echo "<script>alert(Registro Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Registrar)</script>";
	}

}

?>
