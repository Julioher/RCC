<?php
include "../../php/conexion.php";
$txtCodigoMatrimonio = $_POST['txtCodigoMatrimonio'];
$txtEsposo = $_POST['txtEsposo'];
$txtEsposa = $_POST['txtEsposa'];
$txtSacerdote = $_POST['txtSacerdote'];
$accion              = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT idEsposo FROM matrimonios
             where  idEsposo ='$txtEsposo'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO matrimonios ('', idEsposo, idEsposa,idSacerdote, fechaRegistro) VALUES ('$txtCodigoMatrimonio',$txtEsposo','$txtEsposa',$txtSacerdote',NOW())");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case "buscar":{
            $donde = "1";
            if ($txtCodigoMatrimonio != "") {
                $donde .= " AND idMatrimonio like '%" . $txtCodigoMatrimonio . "%'";
            }
            if ($txtEsposo != "") {
                $donde .= " AND idEsposo like '%" . $txtEsposo . "%'";
            }
            if ($txtEsposa != "") {
                $donde .= " AND idEsposa like '%" . $txtEsposa . "%'";
            }
             if ($txtSacerdote != "") {
                $donde .= " AND idSacerdote like '%" . $txtSacerdote . "%'";
            }

            $consulta = mysql_query("SELECT * FROM matrimonios WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
             width:408px; border-radius:5px; text-align:left;'>
             <tr>
             <th style='border:2px solid  #F2F2F2'>No.</th>
             <th style='border:2px solid  #F2F2F2'>Cod.</th>
             <th style='border:2px solid  #F2F2F2'>Esposo</th>
              <th style='border:2px solid  #F2F2F2'>Esposa</th>
             <th style='border:2px solid  #F2F2F2'>fechaRegistro</th>
             </tr>";

            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {
                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
                    <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n
                    <td>" . "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] .
                    "' href=\"javascript:subirDatos('" . $reg['idMatrimonio'] . "', '" . $reg['idEsposo'] . "','" . $reg['idEsposa'] . "','" . $reg['idSacerdote'] . "')\">" . $reg['0'] .
                    "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] . "</td><td id='" . $reg['0'] . $n . "'>
                    " . $reg['2'] . "</td></tr>";
            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break;

    case 'modificar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idEsposo FROM matrimonios where idEsposo = '$txtEsposo'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE matrimonios SET idEsposo =
                 '$txtEsposo', idEsposa ='$txtEsposa', idSacerdote='$txtSacerdote',
                 fechaModificacion = NOW()
                  WHERE idMatrimonio = '$txtCodigoMatrimonio'");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case 'eliminar':{
            $consulta = mysql_query("DELETE FROM matrimonios where
                idMatrimonio = '$txtCodigoMatrimonio'");
            echo 1;
            mysql_close($conexion);
        }
    default;
}
