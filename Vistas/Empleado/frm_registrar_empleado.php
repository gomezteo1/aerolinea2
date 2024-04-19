<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario</title>
</head>
<body>
	<div id="registrar-usuario">	
	<form action="Controladores/Empleado_Controlador.php" method="POST" id="res-registrar-usuario">
	<input  type="hidden" name="action" value="registrar_usuario">
		Registrarse
		Cedula
		<input type="number" id="cedula" name="cedula" >
		Nombre
		<input type="text" id="nombres" name="nombres">
		Apellido
		<input type="text" id="apellidos" name="apellidos" >
		Fecha Contratación
		<input type="date" id="fecha_contratacion" name="fecha_contratacion">
		Salario
		<input type="number" id="salario" name="salario" >
		Telefono
		<input type="number"  id="telefono" name="telefono" >
		Clave
		<input type="password" id="clave" name="clave" >
		Correo
		<input type="email" id="correo" name="correo" >
					
				<button id="button-Rempleado"  type="submit" on>
					Agregar
				</button>
				
			
	</form>
</body>
</html>



