<?php
include "../../php/conexion.php";
$txtCodigoCargo = $_POST['txtCodigoCargo'];
$txtNombreCargo = $_POST['txtNombreCargo'];
$cmbEstadoCargo = $_POST['cmbEstadoCargo'];
$accion         = $_POST['accion'];

switch ($accion) {
    case 'insertar':{
            $consulta = mysql_num_rows(mysql_query("SELECT nombreCargo, estadoCargo,
             FROM cargos WHERE nombreCargo = '$txtNombreCargo'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO cargos (idCargo,
                    nombreCargo, estadoCargo, fechaRegistro)
                VALUES('$txtCodigoCargo', '$txtNombreCargo',
                    '$cmbEstadoCargo', NOW())");
                echo 1;
            }mysql_close($conexion);
        }break;

    case 'buscar':{
            //inicio case buscar
            $donde = "1";
            if ($txtCodigoCargo != "") {
                $donde .= " AND idCargo like '%" . $txtCodigoCargo . "%'";
            }
            if ($txtNombreCargo != "") {
                $donde .= " AND nombreCargo like '%" . $txtNombreCargo . "%'";
            }
            if ($cmbEstadoCargo != "") {
                $donde .= " AND estadoCargo like '%" . $cmbEstadoCargo . "%'";
            }

            $consulta = mysql_query("SELECT * FROM cargos WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
            width:408px; border-radius:5px; text-align:left;'>
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
                    "' href=\"javascript:subirDatos('" . $reg['idCargo'] . "', '" . $reg['nombreCargo'] . "','" . $reg['estadoCargo'] . "')
                 \">" . $reg['0'] . "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] .
                    "</td></tr>";

            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break; //fin case buscar

    case 'modificar':{
//inicio case modificar
            $consulta = mysql_num_rows(mysql_query("SELECT nombreCargo FROM
                cargos WHERE nombreCargo = '$txtNombreCargo'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE cargos SET nombreCargo =
                 '$txtNombreCargo', fechaModificacion = NOW()
                  WHERE idCargo = '$txtCodigoCargo'");
                echo 1;
            }
            mysql_close($conexion);
        }break; //fin case modificar

    case 'eliminar':{
            //inicio case eliminar
            $consulta = mysql_query("DELETE FROM cargos WHERE
                idCargo = '$txtCodigoCargo'");
            echo 1;
            mysql_close($conexion);
        }default; //fin case eliminar

}
