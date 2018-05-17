<?php
if($_GET['id_v']) {
 //Atrapa con el get el id de la venta
    $id_v =(int) $_GET['id_v'];
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
    <meta http-equiv="Refresh" content="TIEMPO;url=URL">
  </head>
  <body  >
    
    <?php require_once('header.php'); ?>

     <div class="row" >
 
      <div class="large-12 columns" >
        <h3>Nueva Venta</h3>
          <p>Formulario </p>
        <ul class=" button-group">
          <li><a href="ventas.php" class="button radius tiny secondary" >Regresar</a></li>   
        </ul>
      </div>
    </div>
      <div class="row" >
      <div class="large-6 columns" >
        <div class="section-container tabs"  align="center">
            <form method="POST">

                <label>Producto:</label>
                
                  <select class="form-control" name="producto" id="producto" required >
                    <?php 
                    include 'consultas.php';
                    //require_once('consultas.php');
                    $total_users=contar(1);
                    $user=mostrar(1);
                   if($total_users){ 
                   for($i=0;$i<$total_users;$i++){ ?>
                    <option value="<?php echo $user[$i]['id'] ?>"><?php echo $user[$i]['nombre'] ?></option>
                    <?php } }?>
                  </select>
                <label>Cantiad:</label>
                <input type="number" name="cantidad" required min="0" max="99">
                <input type="submit" name="submit" value="Registrar" class="button">
            </form>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>

    <?php
      if (isset($_POST['submit'])) {  
    $producto=$_POST["producto"];
    $cantidad=$_POST["cantidad"];
    //include './consultas.php';
    $pza=0;
    $precio=0;
    $id_p=0;
    $can=0;  
    $ven=0;

    $counts=contar(1);
    $count_mon=contar_detalles($id_v);
    //echo "<script>alert($count_mon)</script>";
    if ($count_mon) {
     $user=mostrar_detalle($id_v,$producto);
    $id_p=$user[0]['id_producto'];
    $can=$user[0]['cantidad'];
    $ven=$user[0]['id_venta'];
    $id=$user[0]['id'];
    //echo "<script>alert($id)</script>";
    }
    if ($counts) {
       $datos=monto($producto);
    $pza=$datos[0]['cantidad'];
    $precio=$datos[0]['precio'];
    }

    if ($producto==$id_p && $id_v==$ven) {
        $cantidad=$cantidad+$can;
        if ($pza==0) {
           echo"<script> swal('Error', 'Producto Agotado!', 'error'); </script> " ;
         }else{
      if ($cantidad<= $pza) {
        $total=$cantidad*$precio;
        $promedio=$total/$cantidad;
        if(update_detalles($id,$producto,$cantidad,$total,$promedio,$id_v)){
          echo"<script> swal('Correcto!', 'Se actualizo correctamente!', 'success'); </script> " ;
          
        }else{
          echo"<script> swal('Error', 'No se actualizo correctamente!', 'error'); </script> " ;
         }
       }else{
            echo"<script> swal('Error', 'La cantidad de productos exede el limite!', 'error'); </script> " ;
             }
    }

  }else{
        if ($cantidad<= $pza) {
          $total=$cantidad*$precio;
          $promedio=$total/$cantidad;
          if(add_detalles($id_v,$producto,$cantidad,$total,$promedio)){
            echo"<script> swal('Correcto!', 'Se agrego correctamente!', 'success'); </script> " ;
            $up_can=$pza-$cantidad;
          update_cantidad($producto,$up_can);
           }else{
            echo"<script> swal('Error', 'No se agrego correctamente!', 'error'); </script> " ;
           }
        }else{
          echo"<script> swal('Error', 'La cantidad de productos exede el limite!', 'error'); </script> " ;
           }
   }
    
}
?>
