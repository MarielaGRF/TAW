<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    <div class="row">
 
      <div class="large-6 columns" >
        <h3>Nuevos Profesores</h3>
          <p>Formulario </p>
        <div class="section-container tabs" align="center">

          
          	<form  method="POST">
		          	<label>N° Empleado:</label>
		          	<input type="text" name="matricula" required>
					<label>Nombre:</label>
					<input type="text" name="nombre" required>
					<label>Carrera: </label>	
					<input type="text" name="carrera" required>
					<label>Telefono:</label>
					<input type="text" name="telefono" required>
					<input type="submit" name="submit" value="Registrar" class="button" >

          </form>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>
    <?php
    if (isset($_POST['submit'])) {	
    $matricula=$_POST["matricula"];
    $nombre=$_POST["nombre"];
    $carrera=$_POST["carrera"];
    $email="";
    $telefono=$_POST["telefono"];
    $tipo="2";
    $archivo=fopen("registros.txt","a");
        fwrite($archivo,"$matricula");
        fwrite($archivo,"\n");
        fwrite($archivo,"$nombre");
        fwrite($archivo,"\n");
        fwrite($archivo,"$carrera");
        fwrite($archivo,"\n");
        fwrite($archivo,"$email");
        fwrite($archivo,"\n");
        fwrite($archivo,"$telefono");
        fwrite($archivo,"\n");
        fwrite($archivo,"$tipo");
        fwrite($archivo,"\n \n");
      fclose($archivo);
 			}

    ?>