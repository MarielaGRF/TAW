<?php
 if($_GET['id']) {
    $id =(int) $_GET['id'];
    $id_v =(int) $_GET['id_v'];
    $tipo=(int) $_GET['tipo'];
    include './consultas.php';
//include_once'./database_details.php';
   $user=llenar($id,$tipo);
  }
?>
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
 
      <div class="large-12 columns">
        <h3>Detalles</h3>
          <p></p>
          <ul class=" button-group">
          <li><a href="productos.php" class="button radius tiny secondary" >Regresar</a></li>
          <li><a href="new_producto.php" class="button radius tiny secondary" >Nuevo</a></li>
        </ul>
      </div>
       </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs" data-section>
          <form method="POST">
          <label>ID:</label>
          <input type="text" name="matricula" required value="<?php echo $user[0]['id'] ?>" readonly="true">
          <label>Producto:</label>
          <input type="text" name="producto" required value="<?php echo $user[0]['id_producto'] ?>">
          <label>Cantidad:</label>
          <input type="number" name="cantidad" required value="<?php echo $user[0]['cantidad'] ?>" min="0" max="99">
          <input type="submit" name="submit" value="Actualizar" class="button btn-exit-system">
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>
    <?php
    //Valida que se haya enviado informacion a traves del metodo POST
if (isset($_POST['submit'])) { 
 //Se asigna el valor de los input a variables de PHP
    $producto=$_POST["producto"];
    $cantidad=$_POST["cantidad"];
    $precio=$user[0]['promedio'];
    //Muestra una alerta de confirmacion para actualizar al deportiste en caso de ser confirmado envia al archivo update_.php la informacion del alumno y en caso contrario te mantiene en esta pagina
  echo "<script>
  swal({
  title: '¿Esta seguro?',
  text: 'Desea actualizar este deportista',
  icon: 'warning',
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href='update_.php?id=".$id."&tipo=".$tipo."&producto=".$producto."&cantidad=".$cantidad."&precio=".$precio."&id_v=".$id_v."';
  } else {
    window.location.href='detalles_venta.php?id_v=".$id_v."';
  }
});
  </script>";
 }
?>