<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
</head>
<body>
	<p >Ingresa/e Con Su Cuenta</p>
	<form class="validate-form" action="Controladores/Empleado_Controlador.php" method="POST">
		<input type="hidden" name="action" value="login_usuario">
		<div >
			<input type="correo" id="correo" name="correo">
			<label class="mdl-textfield__label" for="userName">Correo</label>
		</div>
		<div>	
			<input class="" type="password" id="clave" name="clave">
			<label class="mdl-textfield__label" for="userName">Clave</label>
		</div>
		<button  type="submit" id="Login">
			Iniciar Sesión
		</button>
		
			
		</form>

</body>
</html>
