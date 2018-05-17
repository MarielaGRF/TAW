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
        <h2 ">PRODUCTOS</h2>    
     <P> Listado</P>
     <ul class=" button-group">
          <li><a href="new_producto.php" class="button radius tiny secondary" >Nuevo</a></li>
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
                    <th width="250">Nombre</th>
                    <th width="250">Cantidad</th>
                    <th width="250">Precio</th>
                    <th width="250">Update</th>
                    <th width="250">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once('consultas.php');
                    $productos=contar(1);
                    $user=mostrar(1);
                   if($productos){ 
                   for($i=0;$i<$productos;$i++){ ?>
                  <tr>
                    <td><?php echo $user[$i]['id'] ?></td>
                    <td><?php echo $user[$i]['nombre'] ?></td>
                    <td><?php echo $user[$i]['cantidad'] ?></td>
                    <td>$<?php echo $user[$i]['precio'] ?></td>
                    <td><a href="./update_producto.php?id=<?php echo $user[$i]['id'] ?>&tipo=1" class="button radius tiny secondary">Update</a></td>
                     <td><a href="./delete.php?id=<?php echo $user[$i]['id'] ?>&tipo=1" class="button radius tiny secondary">Delete</a></td>
                   
                  </tr>
                  <?php } ?>
                
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