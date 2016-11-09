<!doctype html>
<html>
	<head>
		<title>pantalla formulario feligres</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/estilosFormularios2.css"/>
		<link rel="stylesheet" href="../../css/calendario.css"/>
		<script type="text/javascript" src="../../js/jquery_p.js"></script>
        <script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/calendario.js"></script>
		<script type="text/javascript" src="../../js/codigo.js"></script>
		<script type="text/javascript" src="../../ModFeligreses/js/formulario.js"></script>
	</head>
	<body background="fondo2.jpg">
		<div class="agrupamiento"> <!--Inicio div agrupamiento  src="../js/formulario.js"-->
			<form id="form-register2">
				<h4>Registro de Feligreses</h4>
		<table id="tbpadre">
    	<tr>
			<td><label>Código</label></td>
			<td><input type="text"  name="txtCodigoFeligres" id="txtCodigoFeligres" size="12"/></td>
		</tr>
		<tr>
			<td><label>Primer nombre</label></td>
			<td><input type="text"  name="txtPrimerNombre" id="txtPrimerNombre" size="28"/></td>

			<td>Segundo nombre</td>
			<td><input type="text" name="txtSegundoNombre" id="txtSegundoNombre" size="28"/></td>
		</tr>

		<tr>
			<td><label>Primer apellido</label></td>
			<td><input type="text" name="txtPrimerApellido" id="txtPrimerApellido" size="28"/></td>

			<td>Segundo apellido</td>
			<td><input type="text" name="txtSegundoApellido" id="txtSegundoApellido" size="28"/></td>
		</tr>
		<tr>
        	<td><label>Apellido casada</label></td>
			<td><input type="text" name="txtApellidoCasada" id="txtApellidoCasada" size="28"/></td>

			<td>Fecha de nacimiento</td>
			<td><input type="text" name="txtFechaNacimiento" id="txtFechaNacimiento" size="25"/></td>
		</tr>
		<tr>
			<td><label>Género</label> </td>
			<td><select name="cmbGeneros" id="cmbGeneros" style="width:188px">
					<option value="" >Seleccione...</option>
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
				</select></td>
			<td><label>Estado</label></td>
			<td><select name="cmbEstados" id="cmbEstados" style="width:188px">
                    <option value="">Seleccione...</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
				</select>
            </td>

		</tr>
		<tr>
			<td><label>Cargo</label> </td>
			<td><select name="cmbCargo" id="cmbCargo" style="width:188px">

					<option value="">Seleccione...</option>
				</select></td>
		</tr>
		<tr>
			<td><label>Dirección</label></td>
			<td colspan="4"><TEXTAREA COLS=64 ROWS=1  name="txtAreaDireccion" id="txtAreaDireccion"></TEXTAREA></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: center;"><label>Sacramentos</label></td>
		</tr>
		<tr>
			<td colspan="4">
				<div id="divAE" style="width 200px; height: 100px; background: #fff;
				 border: 1px solid gray ; overflow-y: auto; height: 75px; margin-left:150px; margin-right:150px;"> <!--inicio de divAE-->
						<?php
include "../../php/conexion.php";
//$con=conectar();

/*$registros = mysql_query("SELECT * FROM atributo");

echo "<table id='tbAtributos'>";
$n=1;
echo "<tbody id='tbyAtributos'>";

while ($reg = mysql_fetch_array($registros)){
$n++;
echo "<tr><td><input type='hidden' id='txtDetalleAtributo' name='txtDetalleAtributo' value='0000'/><input type='hidden' id='txtAtributo' name='txtAtributo' value='".$reg['0']."'/><input type='checkbox' id='cbxAtributo".$n."' name ='cbxAtributo'></td><td style=' text-align: left;'>".$reg['1']."</td></tr>";

}
echo "</tbody>";
echo "</table>";

//$insertar_atributo="INSERT into atributo(nombre) values('$reg')";
//$resultado= mysql_query($insertar_atributo) or die("error al enviar");
mysql_close($conexion);    */
?>

				</div>
			</td>
		</tr>
        <tr style="height: 5px;">
        	<td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        	<td colspan="4">
            	<div id="mostrar" style="overflow: auto; height: 100px;">
				</div>
           </td>
        </tr>
        <tr>
        	<td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="4">
        	<div id="boton">
            	<input type="button" value="Buscar" name="btnBuscar" id="btnBuscar"  onclick="buscarDatos()" />
                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar" onclick="insertarDatos()" />
                <input type="button" value="Modificar" name="btnModificar" id="btnModificar"  onclick="modificarDatos()"/>
                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar" onclick="eliminarDatos()"/>
				<input type="button" value="Imprimir" name="btnImprimir" id="btnImprimir" onclick="imprimirDatos()"/>
                <input type="button" value="Cancelar" name="btnCancelar" id="btnCancelar" onclick="limpiarDatos()"/>
            </div>
            </td>
        </tr>

        </table>

		</form>
		</div><!--div agrupamiento-->
	</body>
</html>