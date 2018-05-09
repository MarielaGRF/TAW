<?php
/*include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $user) )
{
  die('No existe dicho usuario');
}*/
?>
<?php
 if($_GET['id']) {
    $id =(int) $_GET['id'];
    include './database_details.php';
//include_once'./database_details.php';
   $user=llenar($id);
   $row=count($user);
   
  // $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( $user==0)
{
  die('No existe dicho usuario');
}
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
 
      <div class="large-6 columns">
        <h3>Detalles</h3>
          <p></p>
        <div class="section-container tabs" data-section>
          <form method="POST">
          <label>Matricula:</label>
          <input type="text" name="matricula" required value="<?php echo $user['matricula'] ?>">
          <label>Nombre:</label>
          <input type="text" name="nombre" required value="<?php echo $user['nombre'] ?>">
          <label>Carrera: </label>  
          <input type="text" name="carrera" required value="<?php echo $user['carrera'] ?>">
          <?php $tipo =(int) $_GET['tipo']; if ($tipo==1) { ?>
          <label>Email:</label>
          <input type="email" name="email" required value="<?php echo $user['email'] ?>"><?php } ?>
          <label>Telefono:</label>
          <input type="text" name="telefono" required value="<?php echo $user['telefono'] ?>">
          <input type="submit" name="submit" value="Actualizar" class="button">
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>
    <?php
if (isset($_POST['submit'])) {  
    $matricula=$_POST["matricula"];
    $nombre=$_POST["nombre"];
    $carrera=$_POST["carrera"];
    $telefono=$_POST["telefono"];

    if ($tipo==1) {
      $email=$_POST["email"];
    }else{
          $email="";

    }
    
    require_once('./database_details.php');
//include_once'./database_details.php';
   if(update($id, $matricula, $nombre, $carrera, $email, $telefono)){
    echo"<script> swal('Good job!', 'You clicked the button!', 'success'); </script> " ;
   }else{
    echo"<script> swal('Bad job!', 'You clicked the button!', 'error'); </script> " ;
   }
 }
    ?>