<?php
include "../../ModGeneral/php/conexion.php";
$txtCodigoBautismo  = $_POST['txtCodigoBautismo'];
$txtCodigoFeligres  = $_POST['txtCodigoFeligres'];
$txtNombreBautizado = $_POST['txtNombreBautizado'];
$txtSacerdote       = $_POST['txtSacerdote'];
$txtNombrePadre     = $_POST['txtNombrePadre'];
$txtNombreMadre     = $_POST['txtNombreMadre'];
$txtNombrePadrino   = $_POST['txtNombrePadrino'];
$txtNombreMadrina   = $_POST['txtNombreMadrina'];
$accion             = $_POST['accion'];

switch ($accion) {
    case "insertar":{
            $consulta = mysql_num_rows(mysql_query("SELECT  idBautizado FROM bautismos  where idBautizado ='$txtNombreBautizado'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("INSERT INTO bautismos (    idBautismo, idBautizado,  idSacerdote, fechaRegistro)
                 VALUES ('$txtCodigoBautismo',$txtNombreBautizado','$txtSacerdote',NOW())");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case "buscar":{
            $donde = "1";
            if ($txtCodigoBautismo != "") {
                $donde .= " AND  idBautismo like '%" . $txtCodigoBautismo . "%'";
            }
           if ($txtCodigoFeligres != "") {
                $donde .= " AND idFeligres like '%" . $txtCodigoFeligres . "%'";
            }
            if ($txtNombreBautizado != "") {
                $donde .= " AND idBautizado like '%" . $txtNombreBautizado . "%'";
            }
            if ($txtSacerdote != "") {
                $donde .= " AND idSacerdote like '%" . $txtSacerdote . "%'";
            }


           /*$consulta= mysql_query("SELECT idFeligres FROM feligreses INNER JOIN bautismos ON 
                feligreses.idFeligres = bautismos.idBautizado")*/

            //$consulta = mysql_query("SELECT * FROM bautismos WHERE $donde");
           /* $consulta = mysql_query("SELECT  feligreses.apellidoCasada, feligreses.pApellido, feligreses.sApellido, feligreses.pNombre, feligreses.sNombre FROM feligreses WHERE $donde AND bautismos.idBautizado=feligreses.idFeligres");*/

           $consulta= mysql_query("SELECT idBautizado,idFeligres, apellidoCasada, pApellido,sApellido, pNombre, sNombre, FROM bautismos, feligreses WHERE $donde AND feligreses.idFeligres=bautismos.idBautizado");


            $resultado = "<table style='border:1px solid #F2F2F2;
             width:408px; border-radius:5px; text-align:left;'>
             <tr>
             <th style='border:2px solid  #F2F2F2'>No.</th>
             <th style='border:2px solid  #F2F2F2'>Cod.</th>
               <th style='border:2px solid  #F2F2F2'>CodFeligres.</th>
             <th style='border:2px solid  #F2F2F2'>Nombre</th>
             <th style='border:2px solid  #F2F2F2'>fechaRegistro</th>
             </tr>";

            $n = 0;
            while ($reg = mysql_fetch_array($consulta)) {
                $n++;
                $resultado .= "<tr id='eliminar" . $reg['0'] . $n . "'>
                    <td><font color='#000000'>" . $n . "</font>" . "</td>" . "\n
                    <td>" . "<a name='" . $reg['0'] . "/" . $n . "' id='" . $reg['0'] .
                    "' href=\"javascript:subirDatos('" . $reg['idBautismo'] . "', '" . $reg['pApellido'] . "','" . $reg['sApellido'] . "','" . $reg['pNombre'] . "','" . $reg['sNombre'] . "')\">" . $reg['0'] .
                    "</a>" . "</td><td id='" . $reg['0'] . $n . "'>" . $reg['1'] . "</td><td id='" . $reg['0'] . $n . "'>
                    " . $reg['2'] . "</td></tr>";
            }
            $resultado .= "</table>";
            echo $resultado;
            mysql_close($conexion);
        }break;

    case 'modificar':{
            $consulta = mysql_num_rows(mysql_query("SELECT idBautizado FROM bautismos where idBautizado = '$txtNombreBautizado'"));
            if ($consulta > 0) {
                echo 0;
            } else {
                $consulta = mysql_query("UPDATE bautismos SET idBautizado =
                 '$txtNombreBautizado', idSacerdote='$txtSacerdote',
                 fechaModificacion = NOW()
                  WHERE idBautismo = '$txtCodigoBautismo'");
                echo 1;
            }
            mysql_close($conexion);
        }
        break;

    case 'eliminar':{
            $consulta = mysql_query("DELETE FROM bautismos where
                idBautismo = '$txtCodigoBautismo'");
            echo 1;
            mysql_close($conexion);
        }
    default;
}
