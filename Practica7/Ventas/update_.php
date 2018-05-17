<?php
if($_GET['id']) {
    //Atrapa toda la infomacion que fue enviada a travez de la URL y las guarda en variables de PHP 
    $id =(int) $_GET['id'];
    $tipo =(int) $_GET['tipo'];
    
///Entra a una condicional donde manda a llamar a la variable UPDATE y valida si se pudo realizar la actualizacion, en este caso mustra la nueva información en la pagina de update y en caso contario muestra una alerta de falso
    if ($tipo==1) {
        $matricula=(int)$_GET['matricula'];
    $nombre=$_GET['nombre'];
    $cantidad=$_GET['cantidad'];
    $precio=$_GET['precio'];
    include 'consultas.php';
       if (update_producto($matricula, $nombre, $cantidad,$precio)) {
    echo "<script> alert('Veradrer') </script>";
    header("location: productos.php?tipo=".$tipo."");
}else {
    echo "<script> alert('Falso') </script>";
    header("location: update_producto.php?id=".$id."&tipo=".$tipo."");
    }
    }


    else{
        $producto =(int) $_GET['producto'];
    $id_v =(int) $_GET['id_v'];
    $cantidad=(int) $_GET['cantidad'];
    $precio=(int) $_GET['precio'];
    $total=$precio*$cantidad;
include 'consultas.php';
        if(update_detalles($id,$producto,$cantidad,$total,$precio,$id_v)){
         echo "<script> alert('Veradrer') </script>";
    header("location: detalles_venta.php?id_v=".$id_v."");
          
        }else{
          echo"<script> swal('Error', 'No se actualizo correctamente!', 'error'); </script> " ;
          header("location: update_ventas.php?id=".$id."&tipo=".$tipo."&id_v");
         }
    }

}
?>