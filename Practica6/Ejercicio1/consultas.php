<?php
//LLama al archivo de conexion
require_once('conexion.php');
//-----------------------DATOS PARA LLENAR LA TABLA DE TOTALES-------------------------------------//
//--Cuenta a todos los usuarios
//Sentencia SQL que cuenta el numero de usuarios que existen
$sql='SELECT COUNT(*) as total_users FROM user';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en el array losresultados
$total_users=$results[0]['total_users'];

//--Cuenta los tipos de usuarios
//Sentencia SQL que cuenta el los diferentes tipos de usuarios que existen,los demas pasos ya fueron explicados anteriormente donde se cuentan los usuarios
$sql='SELECT COUNT(*) as total_user_type FROM user_type';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_user_type=$results[0]['total_user_type'];

//--Cuenta el total de status 
//Sentencia SQL que cuenta el los diferentes status que existen,los demas pasos ya fueron explicados anteriormente donde se cuentan los usuarios
$sql='SELECT COUNT(*) as total_status FROM status';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_status=$results[0]['total_status'];

//--Cuenta el  total de accesos
//Sentencia SQL que cuenta el total de accesos que se an realizado,los demas pasos ya fueron explicados anteriormente donde se cuentan los usuarios
$sql='SELECT COUNT(*) as total_user_log FROM user_log';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_user_log=$results[0]['total_user_log'];

//--Cuenta el total de usuarios activos
//Sentencia SQL que cuenta el total de usuarios activos,los demas pasos ya fueron explicados anteriormente donde se cuentan los usuarios
$sql='SELECT COUNT(*) as total_activo FROM user WHERE status_id= 1';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_activo=$results[0]['total_activo'];

//--Cuenta el total de usuarios inactivos
//Sentencia SQL que cuenta el total de usuarios inactivos,los demas pasos ya fueron explicados anteriormente donde se cuentan los usuarios
$sql='SELECT COUNT(*) as total_inactivo FROM user WHERE status_id=2';
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
$total_inactivo=$results[0]['total_inactivo'];

//-----------------------DATOS PARA LLENAR LA TABLA DE USUARIOS-------------------------------------//
//Sentencia SQL trae toda la informacion de la base de datos de la tabla user
$sql='SELECT *  FROM user';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
$user=$results;


//-----------------------DATOS PARA LLENAR LA TABLA DE TIPO DE USUARIOS-------------------------------------//
//Sentencia SQL trae toda la informacion de la base de datos de la tabla user
$sql='SELECT *  FROM user_type';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
$user_type=$results;

//-----------------------DATOS PARA LLENAR LA TABLA DE TIPO DE USUARIOS-------------------------------------//
//Sentencia SQL trae toda la informacion de la base de datos de la tabla user_type
$sql='SELECT *  FROM user_type';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
$user_type=$results;

//-----------------------DATOS PARA LLENAR LA TABLA DE STATUS-------------------------------------//
//Sentencia SQL trae toda la informacion de la base de datos de la tabla status
$sql='SELECT *  FROM status';
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
$status=$results;

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