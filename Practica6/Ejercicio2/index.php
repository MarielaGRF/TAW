
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body  >
    
    <?php require_once('header.php'); ?>
     <div class="row" >
      <div class="large-12 columns" >
        <h3>Nuevos Furbolista</h3>
          <p>Formulario </p>
        <ul class=" button-group">
          <li><a href="index.php" class="button radius tiny secondary" >Nuevo Futbolista</a></li>
          <li><a href="index_.php" class="button radius tiny secondary" >Nuevo Basquetbolista</a></li>
          <li><a href="listado.php?tipo=1" class="button radius tiny secondary" >Visualizar Futbolista</a></li>
          <li><a href="listado.php?tipo=2" class="button radius tiny secondary" >Visualizar Basquetbolista</a></li>
        </ul>
      </div>
         </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs" align="center" style=" background: #FFF ">
            <form method="POST">
                <label>Matricula:</label>
                <input type="text" name="matricula" required>
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
                <label>Posicion: </label>  
                <input type="text" name="posicion" required>
                <label>Carrera: </label>  
                <input type="text" name="carrera" required>
                 <label>Email:</label>
                <input type="email" name="email" required>
                <input type="submit" name="submit" value="Registrar" class="button">
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
    $posicion=$_POST["posicion"];
    $email=$_POST["email"];
    $tipo=1;
    include './consultas.php';
//include_once'./database_details.php';
   if(add($matricula, $nombre, $carrera,$posicion, $email, $tipo)){
    echo"<script> swal('Correcto!', 'Se agrego correctamente!', 'success'); </script> " ;
   }else{
    echo"<script> swal('Error', 'No se agrego correctamente!', 'error'); </script> " ;
   }

  }
    ?>
