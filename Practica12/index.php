<?php
require_once "models/enlaces.php";
require_once "controllers/controller.php";
//Para poder ver el template se hace la petición mediante un controlador.

//creamos el objeto:
$mvc = new controladores();

//muestra la función "pagina" que se encuentra en controlles/controller.php
$mvc -> plantilla();

?>
