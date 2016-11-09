<?php
include "../../php/conexion.php";

$txtCodigoFeligres  = $_POST['txtCodigoFeligres'];
$txtPrimerNombre    = $_POST['txtPrimerNombre'];
$txtSegundoNombre   = $_POST['txtSegundoNombre'];
$txtPrimerApellido  = $_POST['txtPrimerApellido'];
$txtSegundoApellido = $_POST['txtSegundoApellido'];
$txtApellidoCasada  = $_POST['txtApellidoCasada'];
$txtFechaNacimiento = $_POST['txtFechaNacimiento'];
$cmbGeneros         = $_POST['cmbGeneros'];
$cmbEstados         = $_POST['cmbEstados'];
//$cmbCargo = $_POST['cmbCargo'];
$txtAreaDireccion = $_POST['txtAreaDireccion'];
$accion           = $_POST['accion'];

switch ($accion) {
    //inicio switch
    case 'insertar':{
            //falta código
            $consulta = mysql_query("INSERT INTO feligreses (idFeligres,
             pNombre, sNombre, pApellido, sApellido, apellidoCasada,
             genero, direccion, fechaNacimiento, estadoRegistro, fechaRegistro)
            VALUES ('$txtCodigoFeligres','$txtPrimerNombre','$txtSegundoNombre',
            '$txtPrimerApellido','$txtSegundoApellido','$txtApellidoCasada',
            '$cmbGeneros','$txtAreaDireccion','$txtFechaNacimiento','$cmbEstados',
            NOW())"); //verificar cargo, no sé si va a ir...'$cmbCargo'
            echo 1;
            mysql_close($conexion);
        }break;

    case 'buscar':{
            $donde = "1";
            if ($txtCodigoFeligres != "") {
                $donde .= " AND idFeligres like '%" . $txtCodigoFeligres . "%'";
            }
            if ($txtPrimerNombre != "") {
                $donde .= " AND pNombre like '%" . $txtPrimerNombre . "%'";
            }
            if ($txtSegundoNombre != "") {
                $donde .= " AND sNombre like '%" . $txtSegundoNombre . "%'";
            }
            if ($txtPrimerApellido != "") {
                $donde .= " AND pApellido like '%" . $txtPrimerApellido . "%'";
            }
            if ($txtSegundoApellido != "") {
                $donde .= " AND sApellido like '%" . $txtSegundoApellido . "%'";
            }
            if ($txtApellidoCasada != "") {
                $donde .= " AND apellidoCasada like '%" . $txtApellidoCasada . "%'";
            }
            if ($cmbGeneros != "") {
                $donde .= " AND genero like '%" . $cmbGeneros . "%'";
            }
            if ($txtAreaDireccion != "") {
                $donde .= " AND direccion like '%" . $txtAreaDireccion . "%'";
            }
            if ($txtFechaNacimiento != "") {
                $donde .= " AND fechaNacimiento like '%" . $txtFechaNacimiento . "%'";
            }
            if ($cmbEstados != "") {
                $donde .= " AND estadoRegistro like '%" . $cmbEstados . "%'";
            }

            $consulta = mysql_query("SELECT * FROM feligreses WHERE $donde");

            $resultado = "<table style='border:1px solid #F2F2F2;
             width:616px; border-radius:5px;'>
             <tr>
             <th style='border:1px solid #F2F2F2'>No.</th>
             <th style='border:1px solid #F2F2F2'>Cod.</th>
             <th style='border:1px solid #F2F2F2'>Nombre</th>
             </tr>";
            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {

                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
            <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n<td>" .
                    "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] . "'
            href=\"javascript:subirDatos('" . $reg['0'] . "', '" . $reg['1'] . "',
            '" . $reg['2'] . "', '" . $reg['3'] . "', '" . $reg['4'] . "', '" . $reg['5'] . "',
            '" . $reg['6'] . "', '" . $reg['7'] . "', '" . $reg['8'] . "', '" . $reg['9'] . "',
            '" . $reg['10'] . "', '" . $reg['11'] . "', '" . $reg['12'] . "', '" . $reg['13'] . "',
            '" . $reg['15'] . "')\">" . $reg['0'] . "</a>" . "</td>
            <td id='" . $reg['0'] . $n . "'>" . $reg['1'] . " " . $reg['2'] . " " . $reg['3'] . "
             " . $reg['4'] . "</td></tr>";
            }

            $resultado .= "</table>";

            echo $resultado;
            mysql_close($conexion);

        }break;

    case 'modificar':{
            $consulta = mysql_num_rows(mysql_query("SELECT pNombre FROM
                feligreses WHERE pNombre = '$txtPrimerNombre'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE feligreses SET pNombre =
                 '$txtPrimerNombre', sNombre = '$txtSegundoNombre',
                 pApellido = '$txtPrimerApellido', sApellido = '$txtSegundoApellido',
                 apellidoCasada = '$txtApellidoCasada', genero = '$cmbGeneros',
                direccion = '$txtAreaDireccion', estadoRegistro='$cmbEstados',
                 fechaNacimiento = '$txtFechaNacimiento', fechaModificacion = NOW()
                  WHERE idFeligres = '$txtCodigoFeligres'");
                echo 1;
            }
            mysql_close($conexion);
        }break;

    case 'eliminar':{
            $consulta = mysql_query("DELETE FROM feligreses where
                idFeligres = '$txtCodigoFeligres'");
            echo 1;
            mysql_close($conexion);
        }

    default;

} //fin switch
