<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "VerAlumnos" || $enlaces == "VerProfesores" || $enlaces == "alumnos" || $enlaces == "carreras" || $enlaces == "profesores" || $enlaces == "usuarios" || $enlaces == "editar_Profesor" || $enlaces == "editar_Alumno" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/profesores.php";
		
		}
		else if($enlaces == "oki"){

			$module =  "views/modules/carreras.php";
		}
		else if($enlaces == "oky"){

			$module =  "views/modules/alumnos.php";
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/VerProfesores.php";
		
		}else if($enlaces == "cambios"){

			$module =  "views/modules/VerAlumnos.php";
		
		}

		else{

			$module =  "views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>