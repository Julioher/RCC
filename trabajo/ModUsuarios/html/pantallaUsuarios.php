<?php
include '../../php/conexion.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Pantalla Usuarios</title>
        <meta charset="utf8">
        <script type="text/javascript" src="../../js/jquery_p.js"></script>
        <script type="text/javascript" src="../../js/jquery-ui.js"></script><!--agregado reciente-->
        <script type="text/javascript" src="../../js/jquery-ui.min.js"></script><!--agregado reciente-->
        <script type="text/javascript" src="../../ModUsuarios/js/usuarios.js"></script>
        <script type="text/javascript" src="../../ModUsuarios/js/buscarFeligres.js"></script>
        <link rel="stylesheet" href="../../css/estilosFormularios2.css">
    </head>
    <body background="fondo2.jpg">
        <div class="agrupamiento"><!--inicio div agrupamiento-->
            <form  id="formSacra">
                <h4>Registro de Usuarios</h4>
                <table id="tbpadre">
                    <tr>
                        <td><label>Código</label></td>
                        <td><input type="text" name="txtCodigoUsuario" id="txtCodigoUsuario" size="9"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td>
                         <input type="text" class="busca"  name="txtNombreUsuario" id="txtNombreUsuario" size="58" />
                           <!--<div id="resultado" style="width:1000px; heigt:1000px;"></div>-->
                            <div style="position:absolute; background-color:#F2F2F2; " id="display"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="password" name="txtUsuario" id="txtUsuario" size="58"/></td>
                    </tr>
                    <tr>
                        <td>Clave</td>
                        <td><input type="text" name="txtClaveUsuario" id="txtClaveUsuario" size="58"/></td>
                    </tr>
                    <tr>
                        <td><label>Nivel</label></td>
                        <td><select name="cmbNivelUsuario" id="cmbNivelUsuario" style="width:376px">
                        <option value="">Seleccione...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Consultor</option>
                        <option value="3">Programador</option>
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
                                <input type="button" value="Buscar" name="btnBuscar" id="btnBuscar" onclick="buscarDatos()"/>
                                <input type="button" value="Guardar" name="btnGuardar" id="btnGuardar" onclick="insertarDatos()"/>
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
