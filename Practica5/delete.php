<?php
 if($_GET['id']) {
    $id =(int) $_GET['id'];
    $tipo =(int) $_GET['tipo'];
    include './database_details.php';
  }

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    
    <?php 
    require_once('header.php'); 
    $borrar=0;
    $bandera=0;
    echo "<script >
    swal({
  title: 'Are you sure?',
  text: 'Once deleted, you will not be able to recover this imaginary file!',
  icon: 'warning',
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {".$borrar=delete($id)."
    swal('Poof! Your imaginary file has been deleted!', {
      icon: 'success',
  } else {
    swal('Your imaginary file is safe!');
    window.location.href='./listado.php?id=".$tipo."';
  }
});

</script>";

 if($borrar==true){
  header('location: listado.php?id=$tipo');
        }elseif($borrar==False){
             echo"<script> swal('Bad job!', 'You clicked the button!', 'error'); </script> " ;
            
        }
    require_once('footer.php'); ?>