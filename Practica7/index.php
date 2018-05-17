<?php
	require('config.php');

	session_start();

	if(isset($_SESSION["id_usuario"])){
		header("Location: Ventas/index.php");
	}

	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$p=(string)$_POST['password'];
		$password = md5($_POST['password']);
		$error = '';
		$sql = "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;

		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			
			header("Location: Ventas/index.php");
			
    			
		} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body style="background: 50% 50% ;
  background-size: cover; background-image: url(img/Fondo.jpg);">
<?php require_once('header.php'); ?>

     <div class="row" style="background: #FFF">
 
      <div class="large-12 columns" >
        <h3>Nuevo Producto</h3>
          <p>Formulario </p>

      </div>
  </div>
      <div class="row" style="background: #FFF" >
      <div class="large-6 columns" >
	<form  method="POST" autocomplete="off" class="full-box logInForm">
		<p>Inicia sesión con tu cuenta</p>
		<div>
		  <label>E-mail</label>
		  <input id="usuario" name="usuario" type="text" required>
		  
		</div>
		<div>
		  <label>Contraseña</label>
		  <input id="password" name="password" type="text" required maxlength="20">
		  
		</div>
		<input type="submit" name="enter" value="Registrarse" class="button">
            </form>
                    <ul class=" button-group">
          <li><a href="registro.php" class="button radius tiny secondary" >Regresar</a></li>   
        </ul>
    </div>
</div>

</body>
</html>