<!DOCTYPE html>
<html lang="es">
<head>
	<title>empleado</title>
</head>
<body>
	<form action="Controladores/Empleado_Controlador.php" method="POST" >
		<input type="hidden" name="action" value="modificar_empleado">
		<p>Modificar empleado</p>
			<h1> Información Basica</h1>
				<input value="<?php echo $empleado->id_empleado ?>" name="id_empleado" id="id_empleado" type="id_empleado" hidden> 
				
				cedula
				<input id="cedula" name="numero_documento" value="<?php echo $empleado->numero_documento  ?>">
																			
				nombre
				<input id="nombres" name="nombres" value="<?php echo $empleado->nombres  ?>">
				
				apellido
				<input id="apellidos" name="apellidos" value="<?php echo $empleado->apellidos  ?>">
						
				<div>
					<?php
						/*$llenar_select_tipo_documento="si";
						require("Controladores/Tipo_Documento_Controlador.php");
					*/ ?>
				</div>
				
				telefono
				<input  id="telefono" name="telefono" value="<?php echo $empleado->telefono  ?>">
				
				fecha de contratacion			
				<input type="date" id="fecha_contratacion" name="fecha_contratacion" value="<?php echo $empleado->fecha_contratacion  ?>">
					
				correo
				<input id="correo" name="correo" value="<?php echo $empleado->correo  ?>">
						
				clave 
				<input  id="clave" name="clave" value="<?php echo $empleado->clave  ?>">
						
			<p class="text-center">
					<button id="" type="submit" on>
						<i class="zmdi zmdi-plus">Modificar empleado</i>
					</button>
			</p>
					
	</form>	
</body>
</html>

