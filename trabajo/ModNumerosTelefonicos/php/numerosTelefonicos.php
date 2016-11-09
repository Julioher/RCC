<?php
include "../../php/conexion.php";
$txtCodigoNumeroTelefono = $_POST['txtCodigoNumeroTelefono'];
$txtNombreNumeroTelefono = $_POST['txtNombreNumeroTelefono'];
$txtNumeroTelefono       = $_POST['txtNumeroTelefono'];

$accion           = $_POST['accion'];

switch ($accion) {
    case 'insertar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idFeligres
             FROM feligrestelefonos WHERE idFeligres = '$txtNombreNumeroTelefono'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO  feligrestelefonos (idFeligresTelefono, idFeligres, numeroTelefono, fechaRegistro)
                VALUES('$txtCodigoNumeroTelefono', '$txtNombreNumeroTelefono',
                    '$txtNumeroTelefono', NOW())");
                echo 1;
            }mysql_close($conexion);
        }break;

    case 'buscar':{
            //inicio case buscar
            $donde = "1";
            if ($txtCodigoNumeroTelefono != "") {
                $donde .= " AND idFeligresTelefono like '%" . $txtCodigoNumeroTelefono . "%'";
            }
            if ($txtNombreNumeroTelefono != "") {
                $donde .= " AND idFeligres like '%" . $txtNombreNumeroTelefono . "%'";
            }
            if ($txtNumeroTelefono != "") {
                $donde .= " AND numeroTelefono like '%" . $txtNumeroTelefono . "%'";
            }

            $consulta = mysql_query("SELECT * FROM usuarios WHERE $donde");

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
                    "' href=\"javascript:subirDatos('" . $reg['idFeligresTelefono'] . "', '" . $reg['idFeligres'] . "','" . $reg['numeroTelefono'] . "')
                 \">" . $reg['0'] . "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] .
                    "</td></tr>";

            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break; //fin case buscar

    case 'modificar':{
//inicio case modificar
            $consulta = mysql_num_rows(mysql_query("SELECT idFeligres FROM
                 feligrestelefonos WHERE idFeligres = '$txtNombreNumeroTelefono'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE usuarios SET usuario =
                 '$txtUsuario', fechaModificacion = NOW()
                  WHERE idUsuario = '$txtCodigoUsuario'");
                echo 1;
            }
            mysql_close($conexion);
        }break; //fin case modificar

    case 'eliminar':{
            //inicio case eliminar
            $consulta = mysql_query("DELETE FROM usuarios WHERE
               idUsuario = '$txtCodigoUsuario'");
            echo 1;
            mysql_close($conexion);
        }default; //fin case eliminar

}
