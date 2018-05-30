<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "categorias"  || $enlaces == "productos" || $enlaces == "VistaProductos" || $enlaces == "proveedor" ){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/productos.php";
		
		}

		else{

			$module =  "views/modules/productos.php";

		}
		
		return $module;

	}

}

?>