<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "editar_grupo" || $enlaces == "Vergrupos" ||$enlaces == "VerAlumnos" || $enlaces == "VerProfesores" || $enlaces == "alumnos" || $enlaces == "grupos" || $enlaces == "profesores" || $enlaces == "usuarios" || $enlaces == "pagos" || $enlaces == "editar_Alumno" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/profesores.php";
		
		}
		else if($enlaces == "oki"){

			$module =  "views/modules/grupos.php";
		}
		else if($enlaces == "oky"){

			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "okie"){

			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "cambios"){

			$module =  "views/modules/VerAlumnos.php";
		
		}
		else if($enlaces == "ingresar"){

			$module =  "views/modules/ingresar.php";
		
		}
		else if($enlaces == "cambio1"){

			$module =  "views/modules/Vergrupos.php";
		
		}

		else{

			$module =  "views/modules/alumnos.php";

		}
		
		return $module;

	}

}

?>