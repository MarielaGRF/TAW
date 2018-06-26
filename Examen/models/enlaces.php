<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "editar_Carrera" || $enlaces == "VerCarreras" || $enlaces == "tutoria_grupal" || $enlaces == "VerTutorias" || $enlaces == "tutorias" ||$enlaces == "VerAlumnos" || $enlaces == "VerProfesores" || $enlaces == "alumnos" || $enlaces == "carreras" || $enlaces == "profesores" || $enlaces == "usuarios" || $enlaces == "editar_Tutoria"|| $enlaces == "editar_Profesor" || $enlaces == "editar_Alumno" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/alumnos.php";
		
		}		else{

			$module =  "views/modules/alumnos.php";

		}
		
		return $module;

	}

}

?>