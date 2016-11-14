<!DOCTYPE HTML>
<html>
    <head>
        <title>Detalle de Comuniones</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="../../ModGeneral/css/estilosFormularios2.css">
    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form id="formSacra">
                <h4>Detalle de Comuniones</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text"  name="txtCodigoDetComunion" id="txtCodigoDetComunion" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text"  name="txtNombrePariente" id="txtNombrePariente" size="58"/></td>
                    </tr>

                    <tr style="height: 5px;">
                        <td colspan="2" style="text-align: center;"><label>Parentesco</label></td>
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
