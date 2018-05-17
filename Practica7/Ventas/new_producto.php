
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
        <h3>Nuevo Producto</h3>
          <p>Formulario </p>
        <ul class=" button-group">
          <li><a href="productos.php" class="button radius tiny secondary" >Regresar</a></li>   
        </ul>
      </div>
    </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs"  align="center">
            <form method="POST">
                <label>ID:</label>
                <input type="text" name="matricula" required>
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
                <label>Cantidad:</label>
                <input type="number" name="cantidad" required min="0" max="99">
                <label>Precio:</label>
                <input type="number" name="precio" required min="1" >
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
    $cantidad=$_POST["cantidad"];
    $precio=$_POST["precio"];
    include './consultas.php';
//include_once'./database_details.php';
   if(add_producto($matricula, $nombre, $cantidad,$precio)){
    echo"<script> swal('Correcto!', 'Se agrego correctamente!', 'success'); </script> " ;
   }else{
    echo"<script> swal('Error', 'No se agrego correctamente!', 'error'); </script> " ;
   }

  }
    ?>
