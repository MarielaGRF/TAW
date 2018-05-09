<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $mysqli) )
{
  die('No existe dicho usuario');
}else{
	update($id);
}
?>