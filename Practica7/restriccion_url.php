<?php

require('config.php');

session_start();
if (isset($_SESSION["id_usuario"]) && isset($_SESSION["tipo_usuario"])) {
  //echo "";
}else {
  header("location: index.php");
}
