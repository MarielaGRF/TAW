<?php
require_once('../conexion.php');

//Se crea la funcion para contar el total de deportistas dependiendo el tipo de deporte
function contar($tipo){
//Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
//--Cuenta el total de deportistas que exixten, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
        $sql='SELECT COUNT(*) as total_users FROM futbolista';
    }else{
        $sql='SELECT COUNT(*) as total_users FROM basquetbolistas';
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en el array losresultados
return $total_users=$results[0]['total_users'];
}

function mostrar($tipo){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
//--Cuenta el total de deportistas que exixten, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
        $sql='SELECT * FROM futbolista';
    }else{
        $sql='SELECT * FROM basquetbolistas';
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
return $user=$results;

}
//--Se crea la funcion para agregar un nuevo deportista ya sea 
function add($matricula,$nombre,$carrera,$posicion,$email,$tipo){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
    $resultado="";
//--Inserta la informacion en la base de ddatos dependiendo el tipo de deporte que practique el alumno
    if ($tipo==1) {
        $sql="INSERT INTO futbolista(id,nombre,carrera,posicion,email)
                    VALUES ('$matricula','$nombre','$carrera','$posicion','$email')";  
    }else{
        $sql="INSERT INTO basquetbolistas(id,nombre,carrera,posicion,email)
                    VALUES ('$matricula','$nombre','$carrera','$posicion','$email')";
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id',$matricula);
      $statement->bindParam('nombre',$nombre);
      $statement->bindParam('carrera',$carrera);
      $statement->bindParam('posicion',$posicion);
      $statement->bindParam('email',$email);
//Se ejecuta la sentancia
    $statement->execute();
//Compara si la sentencia fue verdadera o falsa para poder retornar un resultado
        if($sql==True){
                     $resultado=TRUE;
                }elseif($sql==False){
                         $resultado=FALSE;
                        
                    
                }
//Retorna el resultado
            return $resultado;

}

//Función para llenar los inputs con la informacion del deportista selecciondado
function llenar($id,$tipo){
 GLOBAL $pdo;
//--Trae la informacion del deportista solicitado, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
        $sql="SELECT * FROM futbolista WHERE id='$id'";
    }else{
        $sql="SELECT * FROM basquetbolistas WHERE id='$id'";
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en un array los resultados
return $user=$results;  
}

function update($matricula,$nombre,$carrera,$posicion,$email,$tipo){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
    $resultado=FALSE;
//--Inserta la informacion en la base de ddatos dependiendo el tipo de deporte que practique el alumno
    if ($tipo==1) {
        $sql="UPDATE futbolista SET id='$matricula',nombre='$nombre', posicion='$posicion', carrera='$carrera', email='$email' WHERE id='$matricula'";  

    }else{
        $sql="UPDATE basquetbolistas SET id='$matricula', nombre='$nombre',  posicion='$posicion', carrera='$carrera', email='$email' WHERE id='$matricula'";
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id',$matricula,PDO::PARAM_INT);
      $statement->bindParam('nombre',$nombre,PDO::PARAM_STR);
      $statement->bindParam('carrera',$carrera,PDO::PARAM_STR);
      $statement->bindParam('posicion',$posicion,PDO::PARAM_STR);
      $statement->bindParam('email',$email,PDO::PARAM_STR);
//Se ejecuta la sentancia
    $statement->execute();
//Compara si la sentencia fue verdadera o falsa para poder retornar un resultado
        if($statement==True){
                     $resultado=TRUE;
                }elseif($statement==False){
                         $resultado=FALSE;}
//Retorna el resultado
            return $resultado;

}
//Funcion para eliminar depostista dependiendoel tipo de deporte quepractiqur
function borrar($id,$tipo){
  GLOBAL $pdo;
//--Trae la informacion del deportista solicitado, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
        $sql="DELETE FROM futbolista WHERE id='$id'";
    }else{
        $sql="DELETE FROM basquetbolistas WHERE id='$id'";
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
$count = $pdo->exec($sql);
}
