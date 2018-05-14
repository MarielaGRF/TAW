<?php
if($_GET['tipo']) {
    $tipo =(int) $_GET['tipo'];
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
 <?php if ($tipo==1) {?>
      <div class="large-12 columns">
        <h2 ">FUTBOLISTAS</h2>
      <?php }else { ?>
        <div class="large-12 columns">
        <h2 ">BASQUETBOLISTAS</h2>
     <?php }  ?>
     <P> Listado</P>
     <ul class=" button-group">
          <li><a href="index.php" class="button radius tiny secondary" >Nuevo Futbolista</a></li>
          <li><a href="index_.php" class="button radius tiny secondary" >Nuevo Basquetbolista</a></li>
          <li><a href="listado.php?tipo=1" class="button radius tiny secondary" >Visualizar Futbolista</a></li>
          <li><a href="listado.php?tipo=2" class="button radius tiny secondary" >Visualizar Basquetbolista</a></li>
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
                    <th width="200">Numero de dorso</th>
                    <th width="250">Nombre</th>
                    <th width="250">Posicion</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th width="250">Modificar</th>
                    <th width="250">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once('consultas.php');
                    $total_users=contar($tipo);
                    $user=mostrar($tipo);
                   if($total_users){ 
                   for($i=0;$i<$total_users;$i++){ ?>
                  <tr>
                    <td><?php echo $user[$i]['id'] ?></td>
                    <td><?php echo $user[$i]['nombre'] ?></td>
                    <td><?php echo $user[$i]['posicion'] ?></td>
                    <td><?php echo $user[$i]['carrera'] ?></td>
                    <td><?php echo $user[$i]['email'] ?></td>
                    <td><a href="./update.php?id=<?php echo $user[$i]['id'] ?>&tipo=<?php echo $tipo ?>" class="button radius tiny secondary">Update</a></td>
                     <td><a href="./delete.php?id=<?php echo $user[$i]['id'] ?>&tipo=<?php echo $tipo ?>" class="button radius tiny secondary">Delete</a></td>
                   
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