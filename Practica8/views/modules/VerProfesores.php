<h4>PROFESORES</h4>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>N° de empleado</th>
				<th>Nombre</th>
				<th>carrera</th>
				<th>Email</th>
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
			
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaProfesoresController();
			$vistaUsuario -> borrarProfesorController();
		}else{

			echo "<script> alert('Necesita ser un administrador para ingresar a esta seccion')</script>";
			#header("location:index.php?action=tutorias");
		}
		?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

				echo "<script>alert(Cambio Exitoso)</script>";
	
	}else{
		echo "<script>alert(No Se Realizo El Cambio)</script>";
	}
}

?>




