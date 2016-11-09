<?php
include "../../php/conexion.php";
$txtCodigoConfirma = $_POST['txtCodigoConfirma'];
$txtNombreConfirmado = $_POST['txtNombreConfirmado'];
$txtSacerdote = $_POST['txtSacerdote'];
$accion              = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT  idConfirmante FROM confirmaciones WHERE idConfirmante ='$txtNombreConfirmado'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO confirmaciones ('', idConfirmante, idSacerdote, fechaRegistro) VALUES ('$txtCodigoConfirma',$txtNombreConfirmado','$txtSacerdote',NOW())");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case "buscar":{
            $donde = "1";
            if ($txtCodigoConfirma != "") {
                $donde .= " AND  idConfirmacion like '%" . $txtCodigoConfirma . "%'";
            }
            if ($txtNombreConfirmado != "") {
                $donde .= " AND idConfirmante like '%" . $txtNombreConfirmado . "%'";
            }
             if ($txtSacerdote != "") {
                $donde .= " AND idSacerdote like '%" . $txtSacerdote . "%'";
            }

            $consulta = mysql_query("SELECT * FROM confirmaciones WHERE $donde");

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
                    "' href=\"javascript:subirDatos('" . $reg['idConfirmacion'] . "', '" . $reg['idConfirmante'] . "','" . $reg['idSacerdote'] . "')\">" . $reg['0'] .
                    "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] . "</td><td id='" . $reg['0'] . $n . "'>
                    " . $reg['2'] . "</td></tr>";
            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break;

    case 'modificar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idConfirmante FROM  confirmaciones where idConfirmante = '$txtNombreConfirmado'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE confirmaciones SET idConfirmante =
                 '$txtNombreConfirmado', idSacerdote='$txtSacerdote',
                 fechaModificacion = NOW()
                  WHERE idConfirmacion = '$txtCodigoConfirma'");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case 'eliminar':{
            $consulta = mysql_query("DELETE FROM confirmaciones where
                idConfirmacion = '$txtCodigoConfirma'");
            echo 1;
            mysql_close($conexion);
        }
    default;
}
