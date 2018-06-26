<h4>PROFESORES</h4>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Nombre</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
					<?php
					<?php
		session_start();

		if(!$_SESSION["validar"] ){

			header("location:index.php?action=ingresar");

			exit();

		}elseif ($_SESSION["validar"]) {

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistagrupoController();
			$vistaUsuario -> borrargrupoController();
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




