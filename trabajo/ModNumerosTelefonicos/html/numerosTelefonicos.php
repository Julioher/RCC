<!DOCTYPE HTML>
<html>
    <head>
        <title>Pantalla Números Telefónicos</title>
        <meta charset="utf8">
         <script type="text/javascript" src="../../ModGeneral/js/jquery_p.js"></script>
        <script type="text/javascript" src="../../ModNumerosTelefonicos/js/numerosTelefonicos.js"></script>
        <link rel="stylesheet" href="../../ModGeneral/css/estilosFormularios2.css">

    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form id="formSacra">
                <h4>Registro de Números Telefónicos</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text"  name="txtCodigoNumeroTelefono" id="txtCodigoNumeroTelefono" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text"  name="txtNombreNumeroTelefono" id="txtNombreNumeroTelefono" size="58"/></td>
                    </tr>
                    <tr>
                        <td>Número</td>
                        <td><input type="text" name="txtNumeroTelefono" id="txtNumeroTelefono" size="58"/></td>
                    </tr>
                    <tr style="height: 5px;">
                        <td colspan="2" style="text-align: center;" ><label>Tipo de Teléfono</label></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="divAE" style="width 200px; height: 100px; background: #fff;
                     border: 1px solid gray ; overflow-y: auto; height: 75px; margin-left:150px; margin-right:150px;"> <!--inicio de divAE-->
                        </td>
                            </div>
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
                                <input type="button" value="Buscar" name="btnBuscar" id="btnBuscar"          onclick="buscarDatos()"/>
                                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar"       onclick="insertarDatos()"/>
                                <input type="button" value="Modificar" name="btnModificar" id="btnModificar" onclick="modificarDatos()"/>
                                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar"    onclick="eliminarDatos()"/>
                                <input type="button" value="Cancelar" name="btnCancelar" id="btnCancelar"    onclick="limpiarDatos()"/>
                            </div>
                            </td>
                    </tr>
                </table>
            </form>
        </div> <!--final div agrupamiento-->
    </body>
</html>
