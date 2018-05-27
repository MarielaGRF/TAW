<table border="1">
		
		<thead>
			
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>carrera</th>
				<th>Tutor</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			

					<?php
		session_start();

		if(!$_SESSION["validar"] ){

			header("location:index.php?action=ingresar");

			exit();

		}elseif ($_SESSION["validar"] and $_SESSION["tipo_usuario"]==1) {
			echo "<h4>ALUMNOS</h4>";
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaAlumnosController();
			$vistaUsuario -> borrarAlumnoController();

		}elseif ($_SESSION["validar"] and $_SESSION["tipo_usuario"]==0) {
			echo "<h4>TUTORADOS</h4>";
			$id=$_SESSION["id"];
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaTutoradosController($id);
			$vistaUsuario -> borrarAlumnoController();

		}
		?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambios"){

			echo "<script>alert(Cambio Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Realizo El Cambio)</script>";
	}

}

?>




