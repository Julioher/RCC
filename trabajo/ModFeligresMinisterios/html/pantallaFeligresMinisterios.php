<!DOCTYPE HTML>
<html>
    <head>
        <title>Pantalla Feligreses en Ministerios</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="../../css/estilosFormularios2.css">
    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form id="formSacra">
                <h4>Registro de  Feligreses en Ministerios</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text"  name="txtCodigoUsuario" id="txtCodigoUsuario" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text"  name="txtNombreUsuario" id="txtNombreUsuario" size="58"/></td>
                    </tr>
                    <tr>
                        <td><label>Grupo</label></td>
                        <td><select name="cmbNivelUsuario" id="cmbNivelUsuario" style="width:376px">
                        <option value="">Seleccione...</option>

                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Cargo</label></td>
                        <td><select name="cmbNivelUsuario" id="cmbNivelUsuario" style="width:376px">
                        <option value="">Seleccione...</option>

                        </select>
                        </td>
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
                                <input type="button" value="Buscar" name="btnBuscar" id="btnBuscar"   />
                                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar"  />
                                <input type="button" value="Modificar" name="btnModificar" id="btnModificar"/>
                                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar" />
                                <input type="button" value="Cancelar" name="btnCancelar" id="btnCancelar" />
                            </div>
                            </td>
                    </tr>
                </table>
            </form>
        </div> <!--final div agrupamiento-->
    </body>
</html>
