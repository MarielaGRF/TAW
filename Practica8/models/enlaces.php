<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "editar_Carrera" || $enlaces == "VerCarreras" || $enlaces == "tutoria_grupal" || $enlaces == "VerTutorias" || $enlaces == "tutorias" ||$enlaces == "VerAlumnos" || $enlaces == "VerProfesores" || $enlaces == "alumnos" || $enlaces == "carreras" || $enlaces == "profesores" || $enlaces == "usuarios" || $enlaces == "editar_Tutoria"|| $enlaces == "editar_Profesor" || $enlaces == "editar_Alumno" || $enlaces == "salir"){

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
		else if($enlaces == "okie"){

			$module =  "views/modules/alumnos.php";
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/profesores.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/VerProfesores.php";
		
		}
		else if($enlaces == "cambios"){

			$module =  "views/modules/VerAlumnos.php";
		
		}
		else if($enlaces == "echos"){

			$module =  "views/modules/VerTutorias.php";
		
		}
		else if($enlaces == "echo"){

			$module =  "views/modules/tutorias.php";
		
		}
		else if($enlaces == "cambio1"){

			$module =  "views/modules/VerCarreras.php";
		
		}

		else{

			$module =  "views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>