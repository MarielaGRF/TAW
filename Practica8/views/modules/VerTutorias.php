<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h4>TUTORIAS</h4>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>N° de tutoria</th>
				<th>Alumno</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Tipo</th>
				<th>Descripcion</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			$id=$_SESSION["id"];
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaTutoriasController($id);
			$vistaUsuario -> borrarTutoriaController();

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




