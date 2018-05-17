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
        <h2 ">VENTAS</h2>
     <P> Listado</P>
     <ul class=" button-group">
          <li><a href="./confirmar.php" class="button radius tiny secondary" >Nuevo</a></li>
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
                    <th width="250">ID</th>
                    <th width="250">Fecha</th>
                    <th width="250">Detalles</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once('consultas.php');
                    $total_users=contar(2);
                    $user=mostrar(2);
                   if($total_users){ 
                   for($i=0;$i<$total_users;$i++){ ?>
                  <tr>
                    <td><?php echo $user[$i]['id'] ?></td>
                    <td><?php echo $user[$i]['fecha'] ?></td>
                    <td><a href="./detalles_venta.php?id_v=<?php echo $user[$i]['id'] ?>&tipo=3" class="button radius tiny secondary">Detalles</a></td>
                   
                  </tr>
                  <?php 
                
                    } ?>
                
              <?php }else{ ?>
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