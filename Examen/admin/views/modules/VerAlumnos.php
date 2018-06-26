<table border="1">
		
		<thead>
			
			<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Grupo</th>
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

		}elseif ($_SESSION["validar"]) {
			echo "<h4>ALUMNOS</h4>";
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaAlumnosController();
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




