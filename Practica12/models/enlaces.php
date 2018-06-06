<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "categorias"  || $enlaces == "VistaCategorias"|| $enlaces == "editar_Categoria"|| $enlaces == "productos" || $enlaces == "VistaProductos" || $enlaces == "editar_Producto"|| $enlaces == "login" || $enlaces == "log_out"  || $enlaces == "registrar" || $enlaces == "VistaUsuarios" || $enlaces == "editar_Usuario" ){

			$module =  "Views/pages/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "Views/pages/VistaProductos.php";
		
		}
		else if($enlaces == "ok"){

			$module =  "Views/pages/registrar.php";
		
		}

		else{

			$module =  "Views/pages/VistaProductos.php";

		}
		
		return $module;

	}

}

?>