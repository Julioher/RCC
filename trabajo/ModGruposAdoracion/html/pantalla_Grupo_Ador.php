<!DOCTYPE HTML>
       <html>
	<head>
		<title>Pantalla Grupos de Adoración</title>
		<meta charset="utf8">
		<link rel="stylesheet" href="../../ModGeneral/css/estilosFormularios2.css">
		<script type="text/javascript" src="../../ModGeneral/js/jquery_p.js"></script>
        <script type="text/javascript" src="../../ModGruposAdoracion/js/grupoAdor.js"></script>
	</head>
	<body background="fondo2.jpg">
		<div class="agrupamiento"><!--inicio div agrupamiento-->
			<form id="form-registerGA">
				<h4>Mantenimiento de Grupos de Adoración</h4>
				<table id="tbpadre">
					<tr>
						<td><label>Código</label></td>
						<td><input type="text"  name="txtCodigoGrupoAdor" id="txtCodigoGrupoAdor" size="9"/></td>
					</tr>
					<tr>
						<td><label>Nombre</label></td>
						<td><input type="text"  name="txtNombreGrupoAdor" id="txtNombreGrupoAdor" size="57"/></td>
					</tr>

					<tr>
						<td><label>Estado</label></td>
						<td><select name="cmbEstadoGrupoAdor" id="cmbEstadoGrupoAdor" style="width:372px">
	                    <option value="">Seleccione...</option>
	                    <option value="1">Activo</option>
	                    <option value="0">Inactivo</option>
						</select>
	            		</td>
					</tr>
					<tr>
						<td><label>Dirección</label></td>
						<td colspan=""><TEXTAREA COLS=44 ROWS=1  name="txtAreaDireccionGrupoAdor" id="txtAreaDireccionGrupoAdor"></TEXTAREA></td>
					</tr>
					<tr style="height: 5px;">
			        	<td colspan="2">&nbsp;</td>
			        </tr>
					<tr>
			        	<td colspan="2">
			            	<div id="mostrar" style="overflow: auto; height: 100px; width:425px;">
							</div>
			           </td>
			        </tr>
			        <tr style="height: 5px;">
			        	<td colspan="2">&nbsp;</td>
			        </tr>
			        <tr>
				        <td colspan="2">
				        	<div id="boton">
				            	<input type="button" value="Buscar" name="btnBuscar" id="btnBuscar" onclick="buscarDatos()" />
				                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar" onclick="insertarDatos()" />
				                <input type="button" value="Modificar" name="btnModificar" id="btnModificar" onclick="modificarDatos()" />
				                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar" onclick="eliminarDatos()" />
				                <input type="button" value="Cancelar" name="btnCancelar" id="btnCancelar" onclick="limpiarDatos()" />
				            </div>
				        </td>
        			</tr>
				</table>
			</form>
		</div> <!--final div agrupamiento-->
	</body>
</html>
