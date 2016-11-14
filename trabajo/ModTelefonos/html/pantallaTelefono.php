<!DOCTYPE HTML>
<html>
    <head>
        <title>Pantalla Teléfonos</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="../../ModGeneral/css/estilosFormularios2.css">
        <script type="text/javascript" src="../../ModTelefonos/js/telefono.js"></script>
        <script type="text/javascript" src="../../ModGeneral/js/jquery_p.js"></script>
    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form id="formSacra">
                <h4>Registro de Teléfonos</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text"  name="txtCodigoTelefono" id="txtCodigoTelefono" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Tipo</label></td>
                        <td><input type="text"  name="txtTipoTelefono" id="txtTipoTelefono" size="59"/></td>
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
