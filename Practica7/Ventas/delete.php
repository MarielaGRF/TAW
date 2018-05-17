<?php
require_once('consultas.php');
 if($_GET['id']) {
    $id =(int) $_GET['id'];
    $tipo =(int) $_GET['tipo'];

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
   
    require_once('footer.php'); ?>

    <script type="text/javascript">
      //Manda las variables de php a javascript
      var id = '<?php echo $id ?>';
      var tipo = '<?php echo $tipo ?>';
 //Mustra una alerta de que si se desea eliminar el almno seleccionado
        swal({
  title: "¿Esta seguro?",
  text: "Desea eliminar esteregistro",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    //Llama al archivo delete_.php (en este archivo se llama a la funcion borrar)y envia el id del deportista a eliminar y el ipo de deporte 
    window.location.href="delete_.php?id="+id+"&tipo="+tipo+"";
  } else {
    //En caso de que no se cancele el eliminar se vuelve a la lista de los deportistas
    if ($tipo==1) {
      window.location.href="productos.php?tipo="+tipo+""; 
    }else{
      window.location.href="ventas.php?tipo="+tipo+"";
    }
  }
});
  
      
    </script>
  </body>
  </html>


