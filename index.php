<?php
 	require_once('conexion.php');
	if(isset($_GET['controller']) && isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];	
		require_once('Vistas/layout.php');
		
	}
	else {
		$controller='landing';
		$action='landing';
		require_once('Vistas/layout.php');
	}	
?>

