<?php
require_once('../conexion.php');
session_start();
function contar_detalles($id){
//Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
//--Cuenta el total de deportistas que exixten, dependiendo si es basquetbolista o futbolista
    
      $sql="SELECT COUNT(*) as count FROM detalles_ventas WHERE id_venta='$id'";     
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en el array losresultados
return $count=$results[0]['count'];
}

function mostrar_detalles($id,$tipo){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
//--Cuenta el total de deportistas que exixten, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
      $sql="SELECT * FROM detalles_ventas WHERE id_venta='$id'";
    }else{
      $sql="SELECT * FROM detalles_ventas WHERE id_producto='$id'";
    }
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
return $user=$results;

}
function mostrar_detalle($id,$producto){
    GLOBAL $pdo;
      $sql="SELECT * FROM detalles_ventas WHERE id_venta='$id' AND id_producto='$producto'";
    
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
return $user=$results;

}
function monto($id)
{
  GLOBAL $pdo;
   $sql="SELECT * FROM productos WHERE id='$id'";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  $results=$statement->fetchAll();
  return $user=$results;
}


function add_detalles($id_v,$producto,$cantidad,$total,$promedio)
{
    GLOBAL $pdo;
    $resultado="";
        $sql="INSERT INTO detalles_ventas(id,id_producto,cantidad,total,promedio,id_venta)
                    VALUES (NULL,'$producto','$cantidad',$total,'$promedio','$id_v')";  
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id_producto',$producto);
      $statement->bindParam('cantidad',$cantidad);
      $statement->bindParam('total',$total);
      $statement->bindParam('promedio',$promedio);
      $statement->bindParam('id_venta',$id_v);
    $statement->execute();
        if($sql==True){
                     $resultado=TRUE;
                     //update_monto($total);
                }elseif($sql==False){
                         $resultado=FALSE;
                }
            return $resultado;
}
function update_detalles($id,$producto,$cantidad,$total,$promedio,$id_v)
{
    GLOBAL $pdo;
    $resultado="";
     $sql="UPDATE detalles_ventas SET id_producto='$producto', cantidad='$cantidad', total='$total', promedio='$promedio', id_venta='$id_v' WHERE id='$id'";
    $statement=$pdo->prepare($sql);
      $statement->bindParam('cantidad',$cantidad);
      $statement->bindParam('total',$total);
      $statement->bindParam('promedio',$promedio);
    $statement->execute();
        if($sql==True){
                     $resultado=TRUE;
                     //update_monto($total);
                }elseif($sql==False){
                         $resultado=FALSE;
                }
            return $resultado;
}

//Se crea la funcion para contar el total de una tabla
function contar($tipo){
//Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
//--Cuenta el total de deportistas que exixten, dependiendo si es basquetbolista o futbolista
    if ($tipo==1) {
      $sql='SELECT COUNT(*) as count FROM productos';
    }elseif ($tipo==2) {
      $sql='SELECT COUNT(*) as count FROM ventas';
    }else{
      $sql='SELECT COUNT(*) as count FROM detalles_ventas';
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
//Devuelve un array que contiene todas las filas restantes del conjunto de resultados
$results=$statement->fetchAll();
//Guardo en el array losresultados
return $count=$results[0]['count'];
}

function mostrar($tipo){
    GLOBAL $pdo;
    if ($tipo==1) {
      $sql='SELECT * FROM productos';
    }elseif ($tipo==2){
      $sql='SELECT * FROM ventas';
    }else{
      $sql='SELECT * FROM detalles_ventas';
    }
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
return $user=$results;

}
//--Se crea la funcion para agregar un nuevo deportista ya sea 
function add_producto($matricula,$nombre,$cantidad,$precio){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
    $resultado="";
//--Inserta la informacion en la base de ddatos dependiendo el tipo de deporte que practique el alumno
        $sql="INSERT INTO productos(id,nombre,cantidad,precio)
                    VALUES ('$matricula','$nombre','$cantidad',$precio)";  
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id',$matricula);
      $statement->bindParam('nombre',$nombre);
      $statement->bindParam('cantidad',$cantidad);
      $statement->bindParam('precio',$precio);
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

function update_monto($monto,$id){
    GLOBAL $pdo;
    $resultado=FALSE;
        $sql="UPDATE productos SET monto='$monto' WHERE id='$id'";
    $statement=$pdo->prepare($sql);
      $statement->bindParam('monto',$monto);
    $statement->execute();
        if($statement==True){
                     $resultado=TRUE;
                }elseif($statement==False){
                         $resultado=FALSE;}
            return $resultado;

}

function add_venta($monto,$fecha){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
    $resultado="";
//--Inserta la informacion en la base de ddatos dependiendo el tipo de deporte que practique el alumno
        $sql="INSERT INTO ventas (id,monto,fecha)
                    VALUES (NULL,'$monto','$fecha')";  
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id',$matricula);
      $statement->bindParam('monto',$monto);
      $statement->bindParam('fecha',$fecha);
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
        $sql="SELECT * FROM productos WHERE id='$id'";
    }elseif ($tipo==3){
        $sql="SELECT * FROM detalles_ventas WHERE id='$id'";
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

function update_producto($matricula,$nombre,$cantidad,$precio){
    //Llama a la bariable global, con la cual esta realizada la coneccion a la base de datos
    GLOBAL $pdo;
    $resultado=FALSE;
//--Inserta la informacion en la base de ddatos dependiendo el tipo de deporte que practique el alumno
        $sql="UPDATE productos SET id='$matricula',nombre='$nombre', cantidad='$cantidad', precio='$precio' WHERE id='$matricula'";  

//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
    $statement=$pdo->prepare($sql);
      $statement->bindParam('id',$matricula);
      $statement->bindParam('nombre',$nombre);
      $statement->bindParam('cantidad',$cantidad);
      $statement->bindParam('precio',$precio);
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
        $sql="DELETE FROM productos WHERE id='$id'";
    }else{
        $sql="DELETE FROM detalles_ventas WHERE id='$id'";
    }
//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
$count = $pdo->exec($sql);
}
function update_cantidad($id,$cantidad)
{
    GLOBAL $pdo;
    $resultado="";
     $sql="UPDATE productos SET cantidad='$cantidad' WHERE id='$id'";
    $statement=$pdo->prepare($sql);
      $statement->bindParam('cantidad',$cantidad);
    $statement->execute();
        if($sql==True){
                     $resultado=TRUE;
                     //update_monto($total);
                }elseif($sql==False){
                         $resultado=FALSE;
                }
            return $resultado;
}

/////////////////////////////////////Datos de los Uusarioa////////////////////////////////////
function llenar_user($id){
 GLOBAL $pdo;
        $sql="SELECT * FROM login WHERE id='$id'";
$statement=$pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll();
return $user=$results;  
}
function update_user($id,$user,$pass)
{
    GLOBAL $pdo;
    $resultado="";
     $sql="UPDATE login SET usuario='$user' WHERE id='$id'";
    $statement=$pdo->prepare($sql);
      $statement->bindParam('usuario',$user);
    $statement->execute();
        if($sql==True){
                     $resultado=TRUE;
                     //update_monto($total);
                }elseif($sql==False){
                         $resultado=FALSE;
                }
            return $resultado;
}
function borrar_user($id){
  GLOBAL $pdo;
        $sql="DELETE FROM login WHERE id='$id'";

//Prepara una sentencia SQL para ser ejecutados por el metodo PDO
$statement=$pdo->prepare($sql);
//Se ejecuta la sentancia
$statement->execute();
$count = $pdo->exec($sql);
}
////////////////////////////////7Inicio de sesion////////////////////////////////////////////////

function add_reporte($id_u,$fecha){
    GLOBAL $pdo;
    $resultado="";
        $sql="INSERT INTO ventas (id,date_logged_in,user_id)
                    VALUES (NULL,'$fecha','$id_u')";  
    $statement=$pdo->prepare($sql);
      $statement->bindParam('user_id',$id_u);
      $statement->bindParam('date_logged_in',$fecha);
    $statement->execute();

}