<?php
require_once('consultas.php');
if(isset($_SESSION["id_usuario"])){
      $id=$_SESSION["id_usuario"];
      $user=llenar_user($id);
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
        <h3>Perfil</h3>
      </div>
       </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs" data-section>
          <form method="POST">
          <label>ID:</label>
          <input type="text" name="id" required value="<?php echo $id ?>" readonly="true" >
          <label>Usuario:</label>
          <input type="text" name="usuario" required value="<?php echo $user[0]['usuario'] ?>">
          <label>Password:</label>
          <input type="text" name="password" required >
          <br>
          <input type="submit" name="submit" value="Update" class="button" style="background: green; color: #fff">
          <!--a href="./delete.php?id=<?php echo $user[$i]['id'] ?>&tipo=4" class="button alert" >Delete</a-->
          <a href="#" class="button alert" >Delete</a>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>
    <?php
    /*
    //Valida que se haya enviado informacion a traves del metodo POST
if (isset($_POST['submit'])) { 
 //Se asigna el valor de los input a variables de PHP
    $matricula=$_POST["matricula"];
    $nombre=$_POST["nombre"];
    $cantidad=$_POST["cantidad"];
    $precio=$_POST["precio"];
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
    window.location.href='update_.php?id=".$id."&tipo=".$tipo."&matricula=".$matricula."&nombre=".$nombre."&cantidad=".$cantidad."&precio=".$precio."';
  } else {
    window.location.href='update.php?id=".$id."&tipo=".$tipo."';
  }
});
  </script>";
 }*/
?>