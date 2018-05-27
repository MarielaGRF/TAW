<h4>INICIAR SESION</h4>

	<form method="post">
		
		<input type="email" placeholder="Correo" name="email" required>

		<input type="password" placeholder="Contraseña" name="password" required>

		<center><input type="submit" value="Enviar" class="btn waves-effect waves-red grey lighten-5 black-text text-darken-2""></center>

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