<?php
include "../../php/conexion.php";
$txtCodigoMinisterio  = $_POST['txtCodigoMinisterio'];
$txtNombreMinisterio  = $_POST['txtNombreMinisterio'];
$cmbEstadosMinisterio = $_POST['cmbEstadosMinisterio'];
$accion               = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT nombreMinisterio
             FROM  ministerios WHERE nombreMinisterio = '$txtNombreMinisterio'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO ministerios (idMinisterio,
                    nombreMinisterio, estadoRegistro, fechaRegistro)
                VALUES('$txtCodigoMinisterio', '$txtNombreMinisterio',
                    '$cmbEstadosMinisterio', NOW())");
                echo 1;
            }mysql_close($conexion);
        }break;

    case "buscar":{
            //inicio case buscar
            $donde = "1";
            if ($txtCodigoMinisterio != "") {
                $donde .= " AND idMinisterio like '%" . $txtCodigoMinisterio . "%'";
            }
            if ($txtNombreMinisterio != "") {
                $donde .= " AND nombreMinisterio like '%" . $txtNombreMinisterio . "%'";
            }
            if ($cmbEstadosMinisterio != "") {
                $donde .= " AND estadoRegistro like '%" . $cmbEstadosMinisterio . "%'";
            }

            $consulta = mysql_query("SELECT * FROM ministerios WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
            width:423px; border-radius:5px; text-align:left;'>
            <tr>
            <th style='border:2px solid  #F2F2F2'>No.</th>
            <th style='border:2px solid  #F2F2F2'>Cod.</th>
            <th style='border:2px solid  #F2F2F2'>Nombre</th>
            </tr>";

            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {
                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
                <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n<td>" .
                    "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] .
                    "' href=\"javascript:subirDatos('" . $reg['idMinisterio'] . "', '" . $reg['nombreMinisterio'] . "','" . $reg['2'] . "')
                 \">" . $reg['0'] . "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] .
                    "</td></tr>";

            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break; //fin case buscar

    case "modificar":{
//inicio case modificar
            $consulta = mysql_num_rows(mysql_query("SELECT nombreMinisterio FROM
                ministerios where nombreMinisterio = '$txtNombreMinisterio'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE ministerios SET nombreMinisterio =
                 '$txtNombreMinisterio', estadoRegistro = '$cmbEstadosMinisterio',
                 fechaModificacion = NOW()
                  WHERE idMinisterio = '$txtCodigoMinisterio'");
                echo 1;
            }
            mysql_close($conexion);
        }break; //fin case modificar

    case "eliminar":{
            //inicio case eliminar
            $consulta = mysql_query("DELETE FROM ministerios WHERE
                idMinisterio = '$txtCodigoMinisterio'");
            echo 1;
            mysql_close($conexion);
        }default; //fin case eliminar

}
