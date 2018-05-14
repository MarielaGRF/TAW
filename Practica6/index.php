<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body  style="background: 50% 50% ; background-image: url(img/Fondo.jpg); ">
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-12 columns">
        <h2 style=" color: #FFF">Listado</h2>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              
              <!--Se crea la Tabla con el numero total de los resultados-->
              <table>
                <thead>
                  <caption><h3  style="color: #FFF">TOTAL</h3></caption>
                  <tr>
                    <th width="200">Usuarios</th>
                    <th width="250">Tipo de usuario</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usuarios Activos</th>
                    <th width="250">Usuarios Inactivos</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once('./Ejercicio1/consultas.php');
                   if($total_users){ ?>
                  <tr>
                    <td><?php  echo $total_users ?></td>
                    <td><?php  echo $total_user_type ?></td>
                    <td><?php  echo $total_status ?></td>
                    <td><?php  echo $total_user_log ?></td>
                    <td><?php  echo $total_activo ?></td>
                    <td><?php  echo $total_inactivo ?></td>
                  </tr>
                
              <?php }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table>

               <!--Se crea la Tabla con los resultados de todos usuarios existentes-->
               <table>
                <thead>
                  <caption><h3  style="color: #FFF">USUARIOS</h3></caption>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Email</th>
                    <th width="250">Password</th>
                    <th width="250">Status</th>
                    <th width="250">Tipo de usuario</th>
                  </tr>
                </thead>
                <tbody>
                   <!--Valida que existan usuarios y en un ciclo imprime a todos los resultados que trae del archivo utilidades-->
                  <?php if($total_users){ 
                     for($i=0;$i<$total_users;$i++){ ?>
                  <tr>
                    <td><?php echo $user[$i]['id'] ?></td>
                    <td><?php echo $user[$i]['email'] ?></td>
                    <td><?php echo $user[$i]['password'] ?></td>
                    <td><?php echo $user[$i]['status_id'] ?></td>
                    <td><?php echo $user[$i]['user_type_id'] ?></td>
                   
                  </tr>
                  <?php } ?>
                
              <?php }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table>

              <!--Se crea la Tabla con los resultados de todos los tipos de usuarios existentes-->
               <CENTER><table>
                <thead>
                  <caption><h3  style="color: #FFF">TIPO DE USUARIOS</h3></caption>
                  <tr>
                    <th width="250">Id</th>
                    <th width="250">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <!--Valida que existan tipos de usuarios y en un ciclo imprime a todos los resultados que trae del archivo utilidades-->
                  <?php if($total_user_type){ 
                     for($i=0;$i<$total_user_type;$i++){ ?>
                  <tr>
                    <td><?php echo $user_type[$i]['id'] ?></td>
                    <td><?php echo $user_type[$i]['name'] ?></td>
                   
                  </tr>
                  <?php } ?>
                
              <?php }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table></CENTER>

              <!--Se crea la Tabla con los resultados de todos los status existentes-->
              <CENTER> <table>
                <thead>
                  <caption><h3  style="color: #FFF">STATUS</h3></caption>
                  <tr>
                    <th width="250">Id</th>
                    <th width="250">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <!--Valida que existan status y en un ciclo imprime a todos los resultados que trae del archivo utilidades-->
                  <?php if($total_status){ 
                     for($i=0;$i<$total_status;$i++){ ?>
                  <tr>
                    <td><?php echo $status[$i]['id'] ?></td>
                    <td><?php echo $status[$i]['name'] ?></td>
                   
                  </tr>
                  <?php } ?>
                
              <?php }else{ ?>
                <tr>
                  <td>No hay registros</td>
                </tr>
              <?php }  ?>
              </tbody>
              </table></CENTER>

              <!--Se crea la Tabla con los resultados de todos los accesos existentes-->
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
                  <?php if($total_user_log){ 
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
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>