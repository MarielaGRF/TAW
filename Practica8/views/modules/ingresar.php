<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="email" placeholder="Correo" name="email" required>

		<input type="password" placeholder="Contraseña" name="password" required>

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>