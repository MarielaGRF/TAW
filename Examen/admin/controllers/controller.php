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

	public function FormAlumnosController(){

		$respuesta = Datos::vistaUsuariosModel("grupo");

		echo'
		<input type="text" placeholder="Nombre" name="nombre" required>
		<label> Grupo:</label>
		<select name="grupo" required class="browser-default">';

		foreach($respuesta as $row => $item){
			echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '
		
		<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroGrupoController(){

		if(isset($_POST["nombre"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array("nombre"=>$_POST["nombre"],);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registrogrupoModel($datosController, "grupo");

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

		if(isset($_POST["nombre"])){
			$id=Null;
			#Se recibe los datos del formulario, 
			$datosController = array( "id"=>$id,
									"nombre"=>$_POST["nombre"],
								    "grupo"=>$_POST["grupo"]);

			$respuesta = Datos::registroAlumnosModel($datosController, "alumnos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=VerAlumnos");

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

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $_POST["password"]){

				session_start();
				$_SESSION["validar"] = true;
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["id"] = $respuesta["id"];
				
				header("location:index.php?action=VerAlumnos");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaAlumnosController(){

		$respuesta = Datos::vistaUsuariosModel("alumnos");
		foreach($respuesta as $row => $item){
		
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["grupo"].'</td>
				<td><a href="index.php?action=editar_Alumno&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=VerAlumnos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}
	}

	public function vistapagosController(){

		$respuesta = Datos::vistaUsuariosModel("pagos");
		foreach($respuesta as $row => $item){
			$alumna = Datos::vistaUsuariosModel("alumnos", $item["id_alumno"]);
			echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["id_alumno"].'</td>
				<td>'.$item["fecha_pago"].'</td>
				<td>'.$item["folio"].'</td>
				<td>'.$item["imagen"].'</td>
				<td><a href="index.php?action=pagos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}
		

	}
	
	public function vistagrupoController(){

		$respuesta = Datos::vistaUsuariosModel("grupo");
		foreach($respuesta as $row => $item){
		
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editar_grupo&id='.$item["id"].'" ><button waves-effect waves-light btn-small>Editar</button></a></td>
				<td><a href="index.php?action=Vergrupo&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	
	
	#EDITAR USUARIO
	#------------------------------------
	public function editargrupoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editargrupoModel($datosController, "grupo");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
		<input type="text" placeholder="Nombre" name="nombre" required value="'.$respuesta["nombre"].'">
		<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';
	}

	public function editarAlumnoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");
		$respuestas = Datos::vistaUsuariosModel("grupo");
		$grupo = Datos::editargrupoModel($respuesta["id"], "grupo");


		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
		<input type="text" placeholder="Nombre" name="nombre" required 
		value="'.$respuesta["nombre"].'">
		<label>Grupo</label>
		<select name="grupo" class="browser-default">
		<option value='.$grupo["id"].'> '.$grupo["nombre"].' </option>';
		foreach($respuestas as $row => $item) { 
		echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '
		</select>';
		
		echo '

		<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';
	}

	

	#ACTUALIZAR USUARIO
	#------------------------------------


	public function actualizargrupoController(){

		if(isset($_POST["nombre"])){

			$datosController = array("nombre"=>$_POST["nombre"],
									"id"=>$_POST["id"]);


			
			$respuesta = Datos::actualizargrupoModel($datosController, "grupo");

			if($respuesta == "success"){

				header("location:index.php?action=cambio1");

			}

			else{

				echo "error";

			}

		}
	
	}

	public function actualizarAlumnoController(){

		if(isset($_POST["id"])){

			$datosController = array( "id"=>$_POST["id"], 
										"nombre"=>$_POST["nombre"],
								      	"grupo"=>$_POST["grupo"]);
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=cambios");

			}

			else{

				echo "error";

			}

		}
	
	}

	public function actualizarTutoriaController(){

		if(isset($_POST["id"])){

			$datosController = array( "id"=>$_POST["id"],
										"tipo_tutoria"=>$_POST["tipo"], 
										"fecha"=>$_POST["fecha"],
								      	"hora"=>$_POST["hora"],
								  		"nombre"=>$_POST["nombre"],
										"info"=>$_POST["info"],
										"tutor"=>$_POST["tutor"]);

			$respuesta = Datos::actualizarTutoriaModel($datosController, "tutorias");

			if($respuesta == "success"){

				header("location:index.php?action=echos");

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

	public function borrarPagoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarTutoriaModel($datosController, "pagos");

			if($respuesta == "sxss"){

				header("location:index.php?action=pagos");
			
			}

		}

	}
	public function borrargrupoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarTutoriaModel($datosController, "grupo");

			if($respuesta == "sxss"){

				header("location:index.php?action=Vergrupo");
			
			}

		}

	}

}






////
?>
