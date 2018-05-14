<?php
 if($_GET['id']) {
    $id =(int) $_GET['id'];
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
          <li><a href="index.php" class="button radius tiny secondary" >Nuevo Futbolista</a></li>
          <li><a href="index_.php" class="button radius tiny secondary" >Nuevo Basquetbolista</a></li>
          <li><a href="listado.php?tipo=1" class="button radius tiny secondary" >Visualizar Futbolista</a></li>
          <li><a href="listado.php?tipo=2" class="button radius tiny secondary" >Visualizar Basquetbolista</a></li>
        </ul>
      </div>
       </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs" data-section>
          <form method="POST">
          <label>Matricula:</label>
          <input type="text" name="matricula" required value="<?php echo $user[0]['id'] ?>">
          <label>Nombre:</label>
          <input type="text" name="nombre" required value="<?php echo $user[0]['nombre'] ?>">
          <label>Posicion:</label>
          <input type="text" name="posicion" required value="<?php echo $user[0]['posicion'] ?>">
          <label>Carrera: </label>  
          <input type="text" name="carrera" required value="<?php echo $user[0]['carrera'] ?>">
          <label>Email:</label>
          <input type="email" name="email" required value="<?php echo $user[0]['email'] ?>">
          <input type="submit" name="submit" value="Actualizar" class="button btn-exit-system">
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>
    <?php
    //Valida que se haya enviado informacion a traves del metodo POST
if (isset($_POST['submit'])) { 
 //Se asigna el valor de los input a variables de PHP
    $matricula=$_POST["matricula"];
    $nombre=$_POST["nombre"];
    $carrera=$_POST["carrera"];
    $posicion=$_POST["posicion"];
    $email=$_POST["email"];
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
    window.location.href='update_.php?id=".$id."&tipo=".$tipo."&matricula=".$matricula."&nombre=".$nombre."&carrera=".$carrera."&posicion=".$posicion."&email=".$email."';
  } else {
    window.location.href='update.php?id=".$id."&tipo=".$tipo."';
  }
});
  </script>";
 }
?>