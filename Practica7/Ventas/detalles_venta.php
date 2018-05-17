<?php
if($_GET['id_v']) {
    $id_v =(int) $_GET['id_v'];
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body  style="background: 50% 50% ; background-image: url(img/Fondo.jpg); ">
    
    <?php require_once('header.php'); ?>

    <div class="row">
      <div class="large-12 columns">
        <h2 "> DETALLES VENTAS</h2>
     <P> Listado</P>
     <ul class=" button-group">
          <li><a href="confirmar.php" class="button radius tiny secondary">Nuevo</a></li>
          <li><a href="ventas.php" class="button radius tiny secondary">Regresar</a></li>
        </ul>
      </div>
      <div class="large-12 columns" >

        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              
              <!--Se crea la Tabla con el numero total de los resultados-->
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">producto</th>
                    <th width="250">cantidad</th>
                    <th width="250">Total</th>
                    <th width="250">promedio</th>
                    <th width="250">Update</th>
                    <th width="250">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once('consultas.php');
                    $monto=0;
                    $total_users=contar_detalles($id_v);
                    $user=mostrar_detalles($id_v,1);
                   if($total_users){ 
                   for($i=0;$i<$total_users;$i++){ ?>
                  <tr>
                    <td><?php echo $user[$i]['id'] ?></td>
                    <td><?php echo $user[$i]['id_producto'] ?></td>
                    <td><?php echo $user[$i]['cantidad'] ?></td>
                    <td><?php echo $user[$i]['total'] ?></td>
                    <td><?php echo $user[$i]['promedio'] ?></td>
                    <td><a href="./update_ventas.php?id=<?php echo $user[$i]['id'] ?>&tipo=3&id_v=<?php echo $id_v ?>" class="button radius tiny secondary">Detalles</a></td>
                    <td><a href="./delete.php?id=<?php echo $user[$i]['id'] ?>&tipo=3&id_v=<?php echo $id_v ?>&cantidad=<?php echo $user[$i]['cantidad'] ?>&producto=<?php echo $user[$i]['id_producto'] ?>" class="button radius tiny secondary">Delete</a></td>
                   
                  </tr>
                  <?php 
                    $monto= $user[$i]['total'] + $monto;
                    $id= $user[$i]['id'];
                }  update_monto($monto,$id); }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('./footer.php'); ?>