<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>PROFESORES</h1>

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

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaProfesoresController();
			$vistaUsuario -> borrarProfesorController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




