<?php
class Controller{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		/*session_start();
		if(!$_SESSION["nombre"] ){

			include "Views/pages/login.php";
		}else{
			
		*/
		include "Views/template.php";
	#}
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginas(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["email"])){

			$datosController = array( "email"=>$_POST["email"], 
								      "password"=>$_POST["password"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["user_email"] == $_POST["email"] && $respuesta["user_password"] == $_POST["password"]){

				#session_start();
				$_SESSION["validar"] = true;
				$_SESSION["tipo_admin"] = $respuesta["tipo_admin"];
				$_SESSION["id_tienda"] = $respuesta["id_tienda"];
				$_SESSION["id"] = $respuesta["id"];
				$_SESSION["nombre"] = $respuesta["nombre"]." ".$respuesta["apellido"];
				 //echo '<script> alert $respuesta["nombre"] ;</script>';
				
				//echo "<script>location.href='index.php?action=template';</script>";
				header("location:index.php?action=VerUsuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}
	public function FormProductosController(){

		$respuesta = Datos::VerTablasModel("categorias");
		$respuestas = Datos::VerTablasModel("tiendas");

			#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		
			echo'<div class="form-group">
	                    <label>Codigo</label>
	                   <input type="number"  class="form-control" name="codigo" required>
	                  </div>
	                  <div class="form-group">
	              	    <label for="Nombre">Nombre</label>
	                	 <input type="text"  class="form-control" name="nombre" required>
	                  </div>
	                  <div class="form-group">
	                    <label >precio</label>
	                     <input type="number"  class="form-control" name="precio" required>
	                  </div>
	                  <div class="form-group">
	                    <label >stock</label>
	                	   <input type="number"  class="form-control" name="stock" required>
	                  </div>
	                  <div class="form-group">
	                  	<label>Categoria</label>
	                  	<select name="id_categoria" class="form-control select2">
	                  		';
			foreach($respuesta as $row => $item) { 
			echo '
			
				<option value='.$item["id"].'> '.$item["nombre"].' </option>';
			}
			echo '</select>
			<label>Tienda</label>
	                  	<select name="id_tienda" class="form-control select2">
	                  		';
	        if ($_SESSION["tipo_admin"]==1) {
	        	foreach($respuestas as $rows => $items) { 
			echo '
			
				<option value='.$items["id"].'> '.$items["nombre"].' </option>';
			}
	        }
			
			echo '</select>
			</div>

	                	<input type="submit" value="Enviar">';
		
	}
	public function FormUsuariosController(){

		$respuesta = Datos::VerTablasModel("tiendas");

			#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		
			echo'          <div class="form-group">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          	<select name="id_tienda" class="form-control select2">
	                  		';
			foreach($respuesta as $row => $item) { 
			echo '
			
				<option value='.$item["id"].'> '.$item["nombre"].' </option>';
			}
			echo '</select>
			<span class="fa fa-store form-control-feedback"></span>

            <div class="row">
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </div>';
	                  	

		
	}
	#REGISTROS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["apellido"])){
			$id=NULL;
			$fecha= date("Y-m-d");
			if ($_SESSION["tipo_admin"]==1) {
				$id_tienda=$_POST["id_tienda"];
			}else{
				$id_tienda=$_SESSION["id_tienda"];
			}
			$tipo_admin=2;
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "id"=>$id,
								      "apellido"=>$_POST["apellido"],
								      "nombre"=>$_POST["nombre"],
								  	  "email"=>$_POST["email"],
								      "password"=>$_POST["password"],
									  "fecha"=>$fecha,
									  "tipo_admin"=>$tipo_admin,
									  "id_tienda"=>$id_tienda);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				//header("location:index.php?action=ok");
				echo "<script>location.href='index.php?action=ok';</script>";
			}

			else{

				//header("location:index.php");
				echo "<script>location.href='index.php;</script>";
			}

		}

	}
	public function registroCategoriaController(){

		if(isset($_POST["nombre"])){
			$id=NULL;
			$fecha= date("Y-m-d");
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "id"=>$id,
								      "descripcion"=>$_POST["descripcion"],
								      "nombre"=>$_POST["nombre"],
									  "fecha"=>$fecha);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroCategoriasModel($datosController, "categorias");

			//se imprime la respuesta en la vista 
			

		}

	}
	public function registroTiendaController(){

		if(isset($_POST["nombre"])){
			$id=NULL;
			$fecha= date("Y-m-d");
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "id"=>$id,
								      "direccion"=>$_POST["direccion"],
								      "nombre"=>$_POST["nombre"],
									  "fecha"=>$fecha);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroTiendasModel($datosController, "tiendas");

			//se imprime la respuesta en la vista 
			

		}

	}
	public function registroProductoController(){

		if(isset($_POST["nombre"])){
			$id=NULL;
			$fecha= date("Y-m-d");
			if ($_SESSION["tipo_admin"==1]) {
				$id_tienda=$_POST["id_tienda"];
			}else{
				$id_tienda=$_SESSION["id_tienda"];
			}
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "id"=>$id,
								      "precio"=>$_POST["precio"],
								      "nombre"=>$_POST["nombre"],
								      "stock"=>$_POST["stock"],
								      "id_categoria"=>$_POST["id_categoria"],
								      "codigo"=>$_POST["codigo"],
									  "fecha"=>$fecha,
									  "id_tienda"=>$id_tienda);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroProductosModel($datosController, "productos");

			//se imprime la respuesta en la vista 
			

		}

	}
		#VISTA DE USUARIOS
	#------------------------------------

	public function vistaCategoriaController(){

		$respuesta = Datos::VerTablasModel("categorias");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["date_added"].'</td>
				<td><a href="index.php?action=editar_Categoria&id='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-success  btn-sm"><i class="fa fa-edit"></i></button></a></td>
				<td><a href="index.php?action=VistaCategorias&idBorrar='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-danger  btn-sm"><i class="fa fa-trash"></i></button></a></td>
			</tr>';

		}

	}
	#Mustra un tabla de las categorias Existentes
	public function vistaTiendaController(){

		$respuesta = Datos::VerTablasModel("tiendas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["ubicacion"].'</td>
				<td>'.$item["date_added"].'</td>
				<td><a href="index.php?action=editar_Tienda&id='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-success  btn-sm"><i class="fa fa-edit"></i></button></a></td>
				<td><a href="index.php?action=VistaTiendas&idBorrar='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-danger  btn-sm"><i class="fa fa-trash"></i></button></a></td>';
			if ($_SESSION["tipo_admin"]==1) {
				echo '<td><a href="index.php?action=VistaProductos&idtienda='.$item["id_tienda"].'"><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fa fa-edit"></i></button></a></td>';
			}
			echo '</tr>';

		}

	}
	#Muestra a todas las tiendas, pero estas solo muestran al super admin
	public function vistaUsuariosController(){

		$respuesta = Datos::VerTablasModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		if ($_SESSION["id_tienda"]==$item["id_tienda"]|| $_SESSION["tipo_admin"]==1) {
		
		echo'<tr>
				<td>'.$item["nombre"].'  '.$item["apellido"].'</td>
				<td>'.$item["user_email"].'</td>
				<td>'.$item["date_added"].'</td>';
			if ($_SESSION["id"]==$item["id"]) {
					echo '<td><a href="#"><button type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-edit"></i></button></a></td>

				<td><a href="#"><button type="button" class="btn btn-block btn-outline-danger  btn-sm"><i class="fa fa-trash"></i></button></a></td>';
				}else{	
				echo '
				<td><a href="index.php?action=editar_Usuario&id='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-edit"></i></button></a></td>

				<td><a href="index.php?action=VistaUsuarios&idBorrar='.$item["id"].'"><button type="button" class="btn btn-block btn-outline-danger  btn-sm"><i class="fa fa-trash"></i></button></a></td>
			';}
			echo '</tr>';

		}
		}

	}
	public function vistaProductosController(){

	
		$respuesta = Datos::VerTablasModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		
		foreach($respuesta as $row => $item){
		if ($_SESSION["id_tienda"]==$item["id_tienda"]|| $_SESSION["tipo_admin"]==1) {
		echo'<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>'.$item["nombre"].'</h3>

                <p>Sotck: '.$item["stock"].'</p>';
               if ($_SESSION["tipo_admin"]==1) {
				echo '<p>Tienda: '.$item["id_tienda"].'</p>';
			}
                echo '
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?action=editar_Producto&id='.$item["id"].'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>';


		}

	}
}
	public function vistaInfoController(){
		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		if ($_SESSION["id_tienda"]==$respuesta["id_tienda"]|| $_SESSION["tipo_admin"]==1) {
		echo'<h3 class="profile-username text-center">'.$respuesta["nombre"].'</h3>

                <p class="text-muted text-center">'.$respuesta["codigo"].'</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Precio</b> <a class="float-right">'.$respuesta["precio"].'</a>
                  </li>
                  <li class="list-group-item">
                    <b>Stock</b> <a class="float-right">'.$respuesta["stock"].'</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha</b> <a class="float-right">'.$respuesta["date_added"].'</a>
                  </li>';
                   if ($_SESSION["tipo_admin"]==1) {
				echo '<li class="list-group-item">
                    <b>Tienda</b> <a class="float-right">'.$respuesta["id_tienda"].'</a>
                  </li>';
				}
                  echo '
                        </ul>';
            }

	}
	#Realiza la confirmacion para eliminar un producto
	public function vistaConfirmacionController(){
		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "productos");


		echo'<a href="#"><button class="btn btn-danger">Cancelar</button></a>
			<a href="index.php?action=editar_Producto&idBorrar='.$respuesta["id"].'"><button class="btn btn-primary">Aceptar</button></a>';

	}
	#BORRAR REGISTROS
	#------------------------------------
	public function borrarCategoriaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarDatosModel($datosController, "categorias");

		}

	}

	public function borrarUsuariosController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarDatosModel($datosController, "usuarios");


		}

	}

	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarDatosModel($datosController, "productos");


		}

	}
	public function borrarTiendaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarDatosModel($datosController, "tiendas");


		}

	}
	#EDITAR USUARIO
	#------------------------------------

	public function editarCategoriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "categorias");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
		<div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" value="'.$respuesta["nombre"].'" name="nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion">Descripcion</label>
                    <input type="text" class="form-control"  name="descripcion"   value="'.$respuesta["descripcion"].'" required>
                  </div>
                  <input type="hidden" value="'.$respuesta["date_added"].'" name="fecha">
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
		
		';
	}

	public function editarTiendaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "tiendas");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
		<div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" value="'.$respuesta["nombre"].'" name="nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion">Direccion</label>
                    <input type="text" class="form-control"  name="direccion"   value="'.$respuesta["ubicacion"].'" required>
                  </div>
                  <input type="hidden" value="'.$respuesta["date_added"].'" name="fecha">
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
		
		';
	}

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">

                  <input type="hidden" value="'.$respuesta["date_added"].'" name="fecha">
		<div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombre" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Apellido" value="'.$respuesta["apellido"].'" name="apellido" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" value="'.$respuesta["user_email"].'" name="email" required>
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" value="'.$respuesta["user_password"].'" name="password" required>
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
              </div>

		
		';
	}
	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarDatosModel($datosController, "productos");

		$respuestas = Datos::VerTablasModel("categorias");

			#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		
			echo'
			<input type="hidden" value="'.$respuesta["id"].'" name="id">

                  <input type="hidden" value="'.$respuesta["date_added"].'" name="fecha">
			<div class="form-group">
	                    <label>Codigo</label>
	                   <input type="number"  class="form-control" name="codigo" required value="'.$respuesta["codigo"].'">
	                  </div>
	                  <div class="form-group">
	              	    <label for="Nombre">Nombre</label>
	                	 <input type="text"  class="form-control" name="nombre" required value="'.$respuesta["nombre"].'">
	                  </div>
	                  <div class="form-group">
	                    <label >precio</label>
	                     <input type="number"  class="form-control" name="precio" required value="'.$respuesta["precio"].'">
	                  </div>
	                  <div class="form-group">
	                    <label >stock</label>
	                	   <input type="number"  class="form-control" name="stock" required value="'.$respuesta["stock"].'">
	                  </div>
	                  <div class="form-group">
	                  	<label>Categoria</label>
	                  	<select name="id_categoria" class="form-control select2">
	                  		';
			foreach($respuestas as $row => $item) { 
			echo '
			
				<option value='.$item["id"].'> '.$item["nombre"].' </option>';
			}
			echo '</select>
			</div>
	                	<input type="submit" value="Enviar">

				';
		
	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarCategoriaController(){
		$fechas= date("Y-m-d");
		if(isset($_POST["id"])){

			$datosController =  array( "id"=>$_POST["id"],
								      "descripcion"=>$_POST["descripcion"],
								      "nombre"=>$_POST["nombre"],
									  "fecha"=>$fechas);

			
			$respuesta = Datos::actualizarCategoriaModel($datosController, "categorias");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	public function actualizarUsuarioController(){
		$fechas= date("Y-m-d");

		if(isset($_POST["id"])){

			$datosController =  array( "id"=>$_POST["id"],
								      "apellido"=>$_POST["apellido"],
								      "nombre"=>$_POST["nombre"],
								  	  "email"=>$_POST["email"],
								      "password"=>$_POST["password"],
									  "fecha"=>$fechas);

			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	public function actualizarTiendaController(){


		if(isset($_POST["id"])){

			$datosController =  array("id"=>$_POST["id"],
								      "direccion"=>$_POST["direccion"],
								      "nombre"=>$_POST["nombre"],
									  "fecha"=>$_POST["fecha"]);

			
			$respuesta = Datos::actualizarTiendaModel($datosController, "tiendas");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	public function actualizarProductoController(){
		

		if(isset($_POST["id"])){

			$datosController = array( "id"=>$_POST["id"],
								      "precio"=>$_POST["precio"],
								      "nombre"=>$_POST["nombre"],
								      "stock"=>$_POST["stock"],
								      "id_categoria"=>$_POST["id_categoria"],
								      "codigo"=>$_POST["codigo"],
									  "fecha"=>$$_POST["fecha"]);


			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}



}
	
?>


