<?php
include "../../ModGeneral/php/conexion.php";
$txtCodigoUsuario  = $_POST['txtCodigoUsuario'];
$txtCodigoFeligres = $_POST['txtFeligres'];
$txtUsuario        = $_POST['txtUsuario'];
$txtClaveUsuario   = $_POST['txtClaveUsuario'];
$cmbNivelUsuario   = $_POST['cmbNivelUsuario'];
$accion            = $_POST['accion'];

switch ($accion) {
    case 'insertar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idFeligres
             FROM usuarios WHERE idFeligres = '$txtCodigoFeligres'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO  usuarios (idUsuario,
                        idFeligres, usuario, clave, nivel, fechaRegistro)
                VALUES('$txtCodigoUsuario', '$txtCodigoFeligres',
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
            if ($txtCodigoFeligres != "") {
                $donde .= " AND idFeligres like '%" . $txtCodigoFeligres . "%'";
            }
            if ($txtNombreUsuario != "") {
                $donde .= " AND idFeligres like '%" . $txtNombreUsuario . "%'";
            }
            if ($txtUsuario != "") {
                $donde .= " AND usuario like '%" . $txtUsuario . "%'";
            }
            if ($cmbNivelUsuario != "") {
                $donde .= " AND nivel like '%" . $cmbNivelUsuario . "%'";
            }

            //$consulta = mysql_query("SELECT * FROM usuarios WHERE $donde");

            $consulta = mysql_query("SELECT usuarios.*,feligreses.apellidoCasada, feligreses.pApellido, feligreses.sApellido, feligreses.pNombre, feligreses.sNombre FROM usuarios, feligreses WHERE $donde AND usuarios.idFeligres=feligreses.idFeligres");

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
                    "<a name='" . $reg['idUsuario'] . "/" . $n . "' id='" . $reg['idUsuario'] .
                    "' href=\"javascript:subirDatos('" . $reg['idUsuario'] . "', '" . $reg['idFeligres'] . "', '" . $reg['apellidoCasada'] . "', '". $reg['pApellido'] . "', '" . $reg['sApellido'] . "', '" . $reg['pNombre'] . "', '" . $reg['sNombre'] . "', '" . $reg['usuario'] . "', '" . $reg['nivel'] . "')
                 \">" . $reg['idUsuario'] . "</a>" . "</td><td id='" . $reg['idUsuario'] . $n . "'>" . $reg['pApellido'] . " " . $reg['sApellido'] . ", " . $reg['pNombre'] . " " . $reg['sNombre'] .
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
                $consulta = mysql_query("UPDATE usuarios SET nivel =
                 '$cmbNivelUsuario', fechaModificacion = NOW()
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
