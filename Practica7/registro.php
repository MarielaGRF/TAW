
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
  <body style="background: 50% 50% no-repeat;
  background-size: cover; background-image: url(img/Fondo.jpg);">
    
    <?php require_once('header.php'); ?>

     <div class="row" style="background: #FFF">
 
      <div class="large-12 columns" >
        <h3>Nuevo Registro</h3>
          <p>Formulario </p>
        <ul class=" button-group">
          <li><a href="index.php" class="button radius tiny secondary" >Regresar</a></li>   
        </ul>
      </div>
    </div>
      <div class="row" style="background: #FFF" >
      <div class="large-6 columns" >
        <div class="section-container tabs"  align="center" ">
            <form method="POST">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
                <label>Contraseña:</label>
                <input type="text" name="pass" required>
                <input type="submit" name="submit" value="Registrarse" class="button">
            </form>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>

    <?php
      if (isset($_POST['submit'])) {  
    $usuario=$_POST["usuario"];
    $pass=$_POST["pass"];
    require_once ('config.php');
     $pass_en=md5($pass);
    $sql=mysqli_query($mysqli,"INSERT INTO login(id, usuario, password) VALUES (NULL,'$usuario','$pass_en')");
      if($sql==True){
           echo "<script type='text/javascript'>
                   swal('REGISTRO', 'EXITOSO', 'success');
                  </script>";
        }else{
          if($sql==False){
            
              echo "<script type='text/javascript'>
                   swal('REGISTRO', ' NO EXITOSO', 'error');
                  </script>";
            
          }

}

  }
    ?>
