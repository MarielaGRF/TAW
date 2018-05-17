<?php
require_once('consultas.php');
if(isset($_SESSION["id_usuario"])){
      $id=$_SESSION["id_usuario"];
    $fecha= date("Y-m-d");
add_reporte($id,$fecha);
}
?>
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
  <body  style="background: 50% 50% no-repeat;
  background-size: cover; background-image: url(../img/Fondo.jpg); ">
    
    <?php require_once('header.php'); ?>
    <section>
      <div>
        <center><table>
                <thead>
                  <caption><h3  style="color: #FFF">ACCESOS</h3></caption>
                  <tr>
                    <th width="250">Id</th>
                    <th width="250">Fecha</th>
                    <th width="250">Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <!--Valida que existan accesos y en un ciclo imprime a todos los resultados que trae del archivo utilidades-->
                  <?php
                  require_once('consultas2.php');
                   if($total_user_log){ 
                     for($i=0;$i<$total_user_log;$i++){ ?>
                  <tr>
                    <td><?php echo $user_log[$i]['id'] ?></td>
                    <td><?php echo $user_log[$i]['date_logged_in'] ?></td>
                    <td><?php echo $user_log[$i]['user_id'] ?></td>
                  </tr>
                  <?php } ?>
                
              <?php }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table></center>
      </div>
    </section>
    
    

    <?php require_once('footer.php'); ?>