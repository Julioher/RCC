<?php
include "../../ModGeneral/php/conexion.php";
$txtCodigoTelefono = $_POST['txtCodigoTelefono'];
$txtTipoTelefono   = $_POST['txtTipoTelefono'];
$accion            = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT tipoTelefono FROM telefono
             where tipoTelefono ='$txtTipoTelefono'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO telefono (tipoTelefono,
                 fechaRegistro) VALUES ('$txtTipoTelefono',NOW())");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case "buscar":{
            $donde = "1";
            if ($txtCodigoTelefono != "") {
                $donde .= " AND idTelefono like '%" . $txtCodigoTelefono . "%'";
            }
            if ($txtTipoTelefono != "") {
                $donde .= " AND tipoTelefono like '%" . $txtTipoTelefono . "%'";
            }

            $consulta = mysql_query("SELECT * FROM telefono WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
             width:408px; border-radius:5px; text-align:left;'>
             <tr>
             <th style='border:2px solid  #F2F2F2'>No.</th>
             <th style='border:2px solid  #F2F2F2'>Cod.</th>
             <th style='border:2px solid  #F2F2F2'>Nombre</th>
             <th style='border:2px solid  #F2F2F2'>fechaRegistro</th>
             </tr>";

            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {
                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
                    <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n
                    <td>" . "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] .
                    "' href=\"javascript:subirDatos('" . $reg['0'] . "', '" . $reg['1'] . "')\">" . $reg['0'] .
                    "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] . "</td><td id='" . $reg['0'] . $n . "'>
                    " . $reg['2'] . "</td></tr>";
            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break;

    case 'modificar':{
            $consulta = mysql_num_rows(mysql_query("SELECT tipoTelefono FROM telefono where tipoTelefono = '$txtTipoTelefono'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE telefono SET tipoTelefono =
                 '$txtTipoTelefono',fechaModificacion = NOW()
                  WHERE idTelefono = '$txtCodigoTelefono'");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case 'eliminar':{
            $consulta = mysql_query("DELETE FROM telefono where
                idTelefono = '$txtCodigoTelefono'");
            echo 1;
            mysql_close($conexion);
        }
    default;
}
