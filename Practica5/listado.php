<?php
 if($_GET['id']) {
    $id =(int) $_GET['id'];
    include './database_details.php';
//include_once'./database_details.php';
   $user=GetRegitros($id);
   $row=total($id);
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
        <h3>Listado</h3>
          <p>Detalles</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($row){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Carrera</th>
                    <?php $id =(int) $_GET['id']; if ($id==1) { ?>
                    <th width="250">Correo</th><?php } ?>
                    <th width="250">Telefono</th>
                    <th width="250">Actualizar</th>
                    <th width="250">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0;$i<$row;$i++){ ?>
                  <tr>
                    <td><?php echo $user['matricula'] ?></td>
                    <td><?php echo $user['nombre'] ?></td>
                    <td><?php echo $user['carrera'] ?></td>
                    <?php if ($id==1) { ?>
                    <td><?php echo $user['email']; }?></td>
                    <td><?php echo $user['telefono'] ?></td>
                    <td><a href="./key.php?id=<?php echo $user['id']; ?>&tipo=<?php echo $id; ?>" class="button radius tiny secondary">Update</a></td>
                    <td><a href="./delete.php?id=<?php echo $user['id']; ?>&tipo=<?php echo $id; ?>" class="button radius tiny secondary">Delete</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="7"><b>Total de registros: </b> <?php echo $row; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php }  ?>
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>