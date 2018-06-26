<table border="1">
		
		<thead>
			
			<tr>
				<th>id</th>
				<th>Nombre Alumna</th>
				<th>Fecha de pago</th>
				<th>Folio</th>
				<th>imagen</th>
				<th>Eliminar</th>

		</tr>

		</thead>

		<tbody>
			

					<?php
					#LLama a los controladores para poder visualisar a las alumnasque ya enviaron su folio
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistapagosController();
			$vistaUsuario -> borrarPagoController();
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




