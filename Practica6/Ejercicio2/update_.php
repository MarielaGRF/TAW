<?php
if($_GET['id']) {
    //Atrapa toda la infomacion que fue enviada a travez de la URL y las guarda en variables de PHP 
    $id =(int) $_GET['id'];
    $tipo =(int) $_GET['tipo'];
    $matricula=(int)$_GET['matricula'];
    $nombre=$_GET['nombre'];
    $carrera=$_GET['carrera'];
    $posicion=$_GET['posicion'];
    $email=$_GET['email'];
    include 'consultas.php';
///Entra a una condicional donde manda a llamar a la variable UPDATE y valida si se pudo realizar la actualizacion, en este caso mustra la nueva información en la pagina de update y en caso contario muestra una alerta de falso
if (update($matricula, $nombre, $carrera,$posicion, $email, $tipo)) {
	echo "<script> alert('Veradrer') </script>";
	header("location: update.php?id=".$matricula."&tipo=".$tipo."");
}else {
	echo "<script> alert('Falso') </script>";
    header("location: update.php?id=".$id."&tipo=".$tipo."");
    }
}
?>