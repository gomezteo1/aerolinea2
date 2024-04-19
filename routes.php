<?php
	function call($controller, $action){
		require_once('Controladores/' . $controller . '_Controlador.php');
		switch($controller){
			case 'empleado':
	 			require_once('Modelos/Empleado.php');
				 $controller = new Empleado_Controlador();
				 break;
			case 'landing':
				require_once('Modelos/Empleado.php');
				$controller = new Landing_Controlador();
				break;		 
				
		}
		$controller->{$action }();
	}
	//elige el acceso que tienen las personas
	if(isset($_SESSION['acceso'])){
		$controllers= array(
		'landing'=>['landing'],
		'empleado' => ['validarCorreo','index',,'indexempleado','frm_modificar_empleado','frm_registrar_empleado','frm_login','frm_singup','cerrarSesion']
		);
	}
	
	else {//aceeso pr defecto
		$controllers= array(
		'landing' =>['landing','acercaDe','contactanos','inicio'],
		'empleado' => ['frm_registrar_empleado','frm_login']);
	}	
	//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers
	if(isset($controller)){
		if (array_key_exists($controller, $controllers)) {
			//verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción
			if (in_array($action, $controllers[$controller])) {
				//llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador
				call($controller, $action);
			}else{
				call('empleado', 'error');
			}
		}
		else{}
	}
	else{}
?>