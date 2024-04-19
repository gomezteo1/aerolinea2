<!DOCTYPE html>
<html>
<head>
	<title>Inicio Registro </title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div  align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio empleado
					<a class="btn btn-outline-primary" href="?controller=empleado&action=frm_registrar_empleado">Registrar</a>

				</p>
				<input type="text" name="txtbuscar" id="txtbuscar" />
				<img src="./image/buscar.png" class="btn-outline">
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div id="resultado_busqueda">
					<table id="mytable" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<td><b>Documento empleado</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>			
								
								<td><b>Numero Documento</b></td>
								<td><b>Rol</b></td>	
								<td><b>Telefono</b></td>
								<td><b>Fecha_nacimiento</b></td>
								<td><b>Estado</b></td>			
								<td><b>Correo</b></td>
								<td><b>Cambiar Clave</b></td>			
								
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php foreach($empleados as $empleado){ ?>
						<tbody>
							<tr>
								<td><?php echo $empleado->id_empleado; ?></td>
								<td><?php echo $empleado->cedula; ?></td>
								<td><?php echo $empleado->nombre; ?></td>
								<td><?php echo $empleado->apellido; ?></td>
								
								<td><?php echo $empleado->fecha_contratacion ?></td>
								<td><?php echo $empleado->salario; ?></td>
								<td><?php echo $empleado->telefono; ?></td>
								<td><?php echo $empleado->correo; ?></td>
								<!--<td><?php echo $empleado->clave; ?></th>-->
								
								<td><!--<a href=
									"?controller=empleado&action=frm_modificar_administrador&id_empleado=<?php echo
										$empleado->id_empleado ?> " class="btn btn-secondary">Actualizar
									</a>-->
								</td>
								
								
							</tr>
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial empleado</b></td>
								<td><b>Documento</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>	
								<td><b>Fecha Contratación</b></td>		
								<td><b>Salario</b></td>
								<td><b>Telefono</b></td>
								<td><b>Correo</b></td>	
								<td><b>Clave</b></td>
										
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
					</table>
				
				</div>
			</div>
		</div>		
				
	</div>
</body>
