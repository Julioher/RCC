<!DOCTYPE HTML>
<html>
    <head>
        <title>Pantalla Bautismos</title>
        <meta charset="utf8">
        <script type="text/javascript" src="../../js/jquery_p.js"></script>
        <script type="text/javascript" src="../../ModBautizados/js/Bautizados.js"></script>
        <link rel="stylesheet" href="../../css/estilosFormularios2.css">
    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form id="formSacra">
                <h4>Registro de Bautismos</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text"  name="txtCodigoBautismo" id="txtCodigoBautismo" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Bautizado/a</label></td>
                        <td><input type="text"  name="txtNombreBautizado" id="txtNombreBautizado" size="55"/></td>
                    </tr>
                    <tr>
                        <td>Sacerdote</td>
                        <td><input type="text" name="txtSacerdote" id="txtSacerdote" size="55"/></td>
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
                                <input type="button" value="Buscar" name="btnBuscar" id="btnBuscar"  onclick="buscarDatos()" />
                                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar" onclick="insertarDatos()" />
                                <input type="button" value="Modificar" name="btnModificar" id="btnModificar" onclick="modificarDatos()"/>
                                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar" onclick="eliminarDatos()"/>
                                <input type="button" value="Cancelar" name="btnCancelar" id="btnCancelar" onclick="limpiarDatos()"/>
                            </div>
                            </td>
                    </tr>
                </table>
            </form>
        </div> <!--final div agrupamiento-->
    </body>
</html>
