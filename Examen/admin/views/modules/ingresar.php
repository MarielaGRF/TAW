<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!--DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema Escolar</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.css">
    
    <!-- Compiled and minified CSS >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</head>

<body-->
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
<!--script type="text/javascript">
	  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
  
   $(document).ready(function(){
    $(".dropdown-trigger").dropdown();
  });     
</script>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/materialize.min.js"></script>
</body>

</html-->