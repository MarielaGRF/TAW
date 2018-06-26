<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion {

	#REGISTRO DE USUARIOS
	#-------------------------------------

	public function registroAlumnosModel($datosModel, $tabla){

		#Prepara la consccion y realiza el insert en la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, id_alumno, nombre_mama, fecha_pago, imagen, fechas_server,folio)
		 VALUES (:id,:id_alumno, :nombre_mama, :fecha_pago, :imagen, :fechas_server,:folio)");	

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_alumno", $datosModel["alumno"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_mama", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datosModel["file"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_pago", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":fechas_server", $datosModel["fecha_server"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datosModel["folio"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){
		#Trae la informacion de todas las filas
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	public function vistaEspecificoModel($tabla, $datosModel){
		#se trae toda el valor de una fila seleccionada
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE grupo= :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	public function vistaEspecifico2Model($tabla, $datosModel){
		#se trae toda el valor de una fila seleccionada
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
		#$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	

}



?>