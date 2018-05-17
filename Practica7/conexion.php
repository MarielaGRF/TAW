<?php
/**
Datos para realizar la conexion a la base de datos
El nombre de la base de datos se debe cambiar en caso de ser necesario
**/
$dsn = 'mysql:dbname=taw_practica7;host=localhost';
$user = 'root';
$password = '';
/**
Crea la conexion a la base de datos, 
en caso de que no se pueda realizar esta conexion lanzara
una excepcion de error.
**/
try{
	$pdo = new PDO(	$dsn, 
					$user, 
					$password);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
