<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	public function FormProfesorController(){

		$respuesta = Datos::vistaUsuariosModel("carraras");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		
		echo'<input type="text" placeholder="N° de empleado" name="n_empleado" required>
		<select name="carrera">';
		foreach($respuesta as $row => $item) { 
		echo '
		
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '</select>
		<input type="text" placeholder="Nombre" name="nombre" required>
		<input type="email" placeholder="email" name="email" required>
		<input type="password" placeholder="password" name="password" required>

		<input type="submit" value="Enviar">';
		
	}

	public function FormAlumnosController(){

		$respuesta = Datos::vistaUsuariosModel("carraras");
		$respuesta1 = Datos::vistaUsuariosModel("profesor");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		
		echo'
		<input type="text" placeholder="Matricula" name="matricula" required>
		<input type="text" placeholder="Nombre" name="nombre" required>
		<select name="carrera" required>';

		foreach($respuesta as $row => $item){
			echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '
		</select> <br></br>
		<select name="tutor" required>';

		foreach($respuesta1 as $row => $item){
			echo '
			<option value='.$item["n_empleado"].'> '.$item["nombre"].' </option>';
		}
		echo '
		</select>

		<input type="submit" value="Enviar">

				';

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["n_empleado"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "n_empleado"=>$_POST["n_empleado"], 
								      "carrera"=>$_POST["carrera"],
								      "nombre"=>$_POST["nombre"],
								  "email"=>$_POST["email"],
								      "password"=>$_POST["password"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroUsuarioModel($datosController, "profesor");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	public function registroCarrerasController(){

		if(isset($_POST["nombre"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array("nombre"=>$_POST["nombre"],);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroCarrerasModel($datosController, "carraras");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=oki");

			}

			else{

				header("location:index.php");
			}

		}

	}
	public function registroAlumnosController(){

		if(isset($_POST["matricula"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "matricula"=>$_POST["matricula"], 
										"nombre"=>$_POST["nombre"],
								      	"carrera"=>$_POST["carrera"],
								  		"tutor"=>$_POST["tutor"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroAlumnosModel($datosController, "alumnos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=oky");

			}

			else{

				header("location:index.php?action=alumnos");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["email"])){

			$datosController = array( "email"=>$_POST["email"], 
								      "password"=>$_POST["password"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "profesor");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $_POST["password"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=profesores");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaProfesoresController(){

		$respuesta = Datos::vistaUsuariosModel("profesor");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["n_empleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar_Profesor&id='.$item["n_empleado"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=VerProfesores&idBorrar='.$item["n_empleado"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}


	public function vistaAlumnosController(){

		$respuesta = Datos::vistaUsuariosModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["tutor"].'</td>
				<td><a href="index.php?action=editar_Alumno&id='.$item["matricula"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=VerAlumnos&idBorrar='.$item["matricula"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#EDITAR USUARIO
	#------------------------------------

	public function editarProfesorController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProfesorModel($datosController, "profesor");
		$respuestas = Datos::vistaUsuariosModel("carraras");

		echo'<input type="hidden" value="'.$respuesta["n_empleado"].'" name="n_empleado">
		<select name="carrera">';
		foreach($respuestas as $row => $item) { 
		echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '</select>
		<input type="text" placeholder="Nombre" name="nombre" required value="'.$respuesta["nombre"].'">
		<input type="email" placeholder="email" name="email" required value="'.$respuesta["email"].'">
		<input type="password" placeholder="password" name="password" required value="'.$respuesta["password"].'">

		<input type="submit" value="Enviar">';
	}

	public function editarAlumnoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");
		$respuestas = Datos::vistaUsuariosModel("carraras");
		$respuestas1 = Datos::vistaUsuariosModel("profesor");

		echo'<input type="hidden" value="'.$respuesta["matricula"].'" name="matricula">
		<input type="text" placeholder="Nombre" name="nombre" required value="'.$respuesta["nombre"].'">
		<select name="carrera">';
		foreach($respuestas as $row => $item) { 
		echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '
		</select>
		<select name="tutor">';
		foreach($respuestas1 as $row => $items){
			echo '
			<option value='.$items["n_empleado"].'> '.$items["nombre"].' </option>';
		}
		echo '

		<input type="submit" value="Enviar">';
	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarProfesorController(){

		if(isset($_POST["n_empleado"])){

			$datosController = array( "n_empleado"=>$_POST["n_empleado"], 
								      "carrera"=>$_POST["carrera"],
								      "nombre"=>$_POST["nombre"],
								  "email"=>$_POST["email"],
								      "password"=>$_POST["password"]);

			
			$respuesta = Datos::actualizarProfesorModel($datosController, "profesor");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	public function actualizarAlumnoController(){

		if(isset($_POST["matricula"])){

			$datosController = array( "matricula"=>$_POST["matricula"], 
										"nombre"=>$_POST["nombre"],
								      	"carrera"=>$_POST["carrera"],
								  		"tutor"=>$_POST["tutor"]);
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=cambios");

			}

			else{

				echo "error";

			}

		}
	
	}
	#BORRAR USUARIO
	#------------------------------------
	public function borrarProfesorController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProfesorModel($datosController, "profesor");

			if($respuesta == "sxss"){

				header("location:index.php?action=VerProfesores");
			
			}

		}

	}

	public function borrarAlumnoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

			if($respuesta == "sxss"){

				header("location:index.php?action=VerAlumnos");
			
			}

		}

	}

}






////
?>