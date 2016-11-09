<?php
include "../../php/conexion.php";
$txtCodigoGrupoAdor        = $_POST['txtCodigoGrupoAdor'];
$txtNombreGrupoAdor        = $_POST['txtNombreGrupoAdor'];
$cmbEstadoGrupoAdor        = $_POST['cmbEstadoGrupoAdor'];
$txtAreaDireccionGrupoAdor = $_POST['txtAreaDireccionGrupoAdor'];
$accion                    = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT nombreGrupoAdoracion,estadoRegistro, direccion
             FROM  grupoadoraciones WHERE nombreGrupoAdoracion = '$txtNombreGrupoAdor'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO grupoadoraciones
                (nombreGrupoAdoracion, estadoRegistro, direccion,  fechaRegistro)
                VALUES('$txtNombreGrupoAdor','$cmbEstadoGrupoAdor',
                    '$txtAreaDireccionGrupoAdor', NOW())");
                echo 1;
            }mysql_close($conexion);
        }break;

    case "buscar":{
            //inicio case buscar
            $donde = "1";
            if ($txtCodigoGrupoAdor != "") {
                $donde .= " AND idGrupoAdoracion like '%" . $txtCodigoGrupoAdor . "%'";
            }
            if ($txtNombreGrupoAdor != "") {
                $donde .= " AND nombreGrupoAdoracion like '%" . $txtNombreGrupoAdor . "%'";
            }

            $consulta = mysql_query("SELECT * FROM grupoadoraciones WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
            width:408px; border-radius:5px; text-align:left;'>
            <tr>
            <th style='border:2px solid  #F2F2F2'>No.</th>
            <th style='border:2px solid  #F2F2F2'>Cod.</th>
            <th style='border:2px solid  #F2F2F2'>Nombre</th>
            <th style='border:2px solid  #F2F2F2'>Estado</th>
            </tr>";

            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {
                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
                <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n<td>" .
                    "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] .
                    "' href=\"javascript:subirDatos('" . $reg['0'] . "', '" . $reg['1'] . "', '" . $reg['2'] . "', '" . $reg['6'] . "')
                 \">" . $reg['0'] . "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] .
                    "</td><td id='" . $reg['0'] . $n . "'>" . $reg['2'] . "</td></tr>";

            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break; //fin case buscar

    case "modificar":{
//inicio case modificar
            $consulta = mysql_num_rows(mysql_query("SELECT nombreGrupoAdoracion, estadoRegistro,
             direccion FROM grupoadoraciones where nombreGrupoAdoracion = '$txtNombreGrupoAdor'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE grupoadoraciones SET nombreGrupoAdoracion =
                 '$txtNombreGrupoAdor', estadoRegistro = '$cmbEstadoGrupoAdor',
                 direccion = '$txtAreaDireccionGrupoAdor',
                 fechaModificacion = NOW() WHERE idGrupoAdoracion = '$txtCodigoGrupoAdor'");
                echo 1;
            }
            mysql_close($conexion);
        }break; //fin case modificar

    case "eliminar":{
            //inicio case eliminar
            $consulta = mysql_query("DELETE FROM  grupoadoraciones WHERE
                idGrupoAdoracion = '$txtCodigoGrupoAdor'");
            echo 1;
            mysql_close($conexion);
        }default; //fin case eliminar

}
