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
	public function FormGrupoController(){
		#Trae los datos de la base de tatos para usar en el select
		$respuesta = Datos::vistaUsuariosModel("grupo");
		$respuesta1 = Datos::vistaUsuariosModel("alumnos");

		echo'
		<label> Grupo:</label>
		<select name="grupo" required class="browser-default">';

		foreach($respuesta as $row => $item){
			echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}
		echo '
		</select> <br>
			
		<input type="submit" value="Buscar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';

	}

	#Muestra el formulario para que manden el Folio de los oletos de las alumnas
	public function FormAlumnosController(){
		#Trae los datos de la base de tatos para usar en el select
		if (isset($_POST["grupo"])){
			$alumna = Datos::vistaEspecificoModel("alumnos",$_POST["grupo"]);
		echo '
		<label> Alumnas:</label>
		<select name="alumno" required class="browser-default">';

		foreach($alumna as $row => $item){
			echo '
			<option value='.$item["id"].'> '.$item["nombre"].' </option>';
		}

		echo '
		</select>
		<input type="text" placeholder="Nombre de la mamá" name="nombre" required>
		<input type="date" placeholder="Fecha de pago" name="fecha" required>
		<input type="file" name="img" accept="image/jpeg, image/png" />
		   <br />
		   <!-- id="imgSalida" width="50%" height="50%" src="" /-->
				<input type="text" placeholder="Folio" name="folio" required>


				<input type="submit" value="Enviar" class="waves-effect waves-purple btn-small grey lighten-5 black-text text-darken-2">';
		}
	}



	#REGISTRO DE USUARIOS
	#------------------------------------

	public function registroAlumnosController(){

		if(isset($_POST["alumno"])){
			$id=NULL;
			$fecha_server=date("Y-m-d");
			$file="imagen";
			$fecha_pago=date("Y-m-d");
			$datosController = array( "folio"=>$_POST["folio"], 
										"id"=>$id,
								      	"grupo"=>$_POST["grupo"],
								      	"nombre"=>$_POST["nombre"],
								      	"file"=>$file,
								      	"fecha"=>$fecha_pago,
								      	"fecha_server"=>$fecha_server,
								  		"alumno"=>$_POST["alumno"]);
			

			$respuesta = Datos::registroAlumnosModel($datosController, "pagos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=VerAlumnos");

			}

			else{

				header("location:index.php/admin/action=alumnos");
			}

		}

	}
	

	public function vistaAlumnosController(){

		$respuesta = Datos::vistaUsuariosModel("pagos");
		foreach($respuesta as $row => $item){
			$alumna = Datos::vistaUsuariosModel("alumnos", $item["id_alumno"]);
			echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["id_alumno"].'</td>
				<td>'.$item["fecha_pago"].'</td>
				<td>'.$item["folio"].'</td>
			</tr>';

		}
		

	}

}






////
?>
