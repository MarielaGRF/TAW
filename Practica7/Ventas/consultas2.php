<?php
require_once('../conexion.php');
$sql='SELECT COUNT(*) as total_user_log FROM user_log';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_user_log=$results[0]['total_user_log'];
//-----------------------DATOS PARA LLENAR LA TABLA DE ACCESOS-------------------------------------//
//Sentencia SQL trae toda la informacion de la base de datos de la tabla user_log
$sql='SELECT *  FROM user_log';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
$user_log=$results;
?>
?>
