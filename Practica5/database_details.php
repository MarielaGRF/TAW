<?php
require_once('./conexion.php');
 $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if ($mysqli->connect_errno) {
      echo "Error al conectarse {$mysqli -> connect_errno}";
      die();
    }

function add($matricula, $nombre, $carrera, $email, $telefono,$tipo){
	GLOBAL $mysqli;
	$resultado=FALSE;
	 	$sql=mysqli_query($mysqli,"INSERT INTO practica5 (id,matricula,nombre,carrera,email,telefono,tipo)
						VALUES (NULL, '$matricula', '$nombre', '$carrera', '$email', '$telefono','$tipo')");
	 	if($sql==True){
					 $resultado=TRUE;
				}elseif($sql==False){
						 $resultado=FALSE;
						
					
				}

	return $resultado;
}
function GetRegitros($id)
{
	GLOBAL $mysqli;
	$sql="SELECT * FROM practica5 WHERE tipo='$id'";
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
	
}

function total($id)
{
	GLOBAL $mysqli;
	$sql="SELECT * FROM practica5 WHERE tipo='$id'";
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_num_rows($result);
	return $row;
	
}
function delete($id){
	GLOBAL $mysqli;
	$resultado=FALSE;
	//$sql= "DELETE * FROM practica5 WHERE id='$id'";
	$sql=mysqli_query($mysqli,"DELETE FROM practica5 WHERE id='$id'");
	if($sql==True){
					 $resultado=TRUE;
				}elseif($sql==False){
						 $resultado=FALSE;
						
					
				}

	return $resultado;
}
function llenar($id)
{
	GLOBAL $mysqli;
	$sql="SELECT * FROM practica5 WHERE id='$id'";
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
	
}

function Update($id, $matricula, $nombre, $carrera, $email, $telefono)
{
	GLOBAL $mysqli;
	$resultado=FALSE;
	 	$sql=mysqli_query($mysqli,"UPDATE practica5 SET matricula='$matricula', nombre='$nombre', carrera='$carrera', email='$email', telefono='$telefono' WHERE id=$id");
	 	if($sql==True){
					 $resultado=TRUE;
				}elseif($sql==False){
						 $resultado=FALSE;
						
					
				}

	return $resultado;
}
?>