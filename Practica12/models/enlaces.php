<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "categorias"  || $enlaces == "VistaCategorias"|| $enlaces == "editar_Categoria"|| $enlaces == "productos" || $enlaces == "VistaProductos" || $enlaces == "editar_Producto"|| $enlaces == "login" || $enlaces == "registrar" || $enlaces == "VistaUsuarios" || $enlaces == "editar_Usuario"|| $enlaces == "tiendas"|| $enlaces == "VistaTiendas" || $enlaces == "editar_Tienda"){

			$module =  "Views/pages/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "Views/pages/VistaProductos.php";
		
		}
		else if($enlaces == "ok"){

			$module =  "Views/pages/categorias.php";
		
		}else if($enlaces == "template"){

			$module =  "Views/template.php";
		
		}else if($enlaces == "log_out"){

			$module =  "Views/template.php";
		
		}

		else{

			$module =  "Views/pages/VistaProductos.php";

		}
		
		return $module;

	}

}

?>