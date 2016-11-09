<?php
include "../../php/conexion.php";
$txtCodigoUsuario = $_POST['txtCodigoUsuario'];
$txtNombreUsuario = $_POST['txtNombreUsuario'];
$txtUsuario       = $_POST['txtUsuario'];
$txtClaveUsuario  = $_POST['txtClaveUsuario'];
$cmbNivelUsuario  = $_POST['cmbNivelUsuario'];
$accion           = $_POST['accion'];

switch ($accion) {
    case 'insertar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idFeligres
             FROM usuarios WHERE idFeligres = '$txtNombreUsuario'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO  usuarios (idUsuario,
                        idFeligres, usuario, clave, nivel, fechaRegistro)
                VALUES('$txtCodigoUsuario', '$txtNombreUsuario',
                    '$txtUsuario','$txtClaveUsuario', '$cmbNivelUsuario', NOW())");
                echo 1;
            }mysql_close($conexion);
        }break;

    case 'buscar':{
            //inicio case buscar
            $donde = "1";
            if ($txtCodigoUsuario != "") {
                $donde .= " AND idUsuario like '%" . $txtCodigoUsuario . "%'";
            }
            if ($txtNombreUsuario != "") {
                $donde .= " AND idFeligres like '%" . $txtNombreUsuario . "%'";
            }
            if ($txtUsuario != "") {
                $donde .= " AND usuario like '%" . $txtUsuario . "%'";
            }
            if ($txtClaveUsuario != "") {
                $donde .= " AND clave like '%" . $txtClaveUsuario . "%'";
            }
            if ($cmbNivelUsuario != "") {
                $donde .= " AND nivel like '%" . $cmbNivelUsuario . "%'";
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
                    "' href=\"javascript:subirDatos('" . $reg['idUsuario'] . "', '" . $reg['idFeligres'] . "','" . $reg['usuario'] . "','" . $reg['clave'] . "','" . $reg['nivel'] . "')
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
                usuarios WHERE idFeligres = '$txtNombreUsuario'"));
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
