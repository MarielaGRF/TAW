<?php
 require_once('consultas.php');

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
   
    require_once('footer.php'); ?>

    <script type="text/javascript">
 //Mustra una alerta de que si se desea eliminar el almno seleccionado
        swal({
  title: "¿Esta seguro?",
  text: "Agregar ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    //Llama al archivo delete_.php (en este archivo se llama a la funcion borrar)y envia el id del deportista a eliminar y el ipo de deporte 
    window.location.href="confirmar_.php";
  } else {
    //En caso de que no se cancele el la creacion de una venta se vuelve a la lista de los deportistas
   
      window.location.href="ventas.php"; 
    
  }
});
  
      
    </script>
  </body>
  </html>


