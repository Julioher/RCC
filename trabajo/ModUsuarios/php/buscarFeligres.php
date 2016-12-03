<?php
@session_start();
include '../../ModGeneral/php/conexion.php';
include '../../ModGeneral/php/JSON.php';
$json = new Services_JSON();

$accion = $_POST["accion"];
//$txtCodigoPersona = $_POST["prmTxtCodigoPersona"];
$txtNombresPersona   = addslashes(strtoupper($_POST["prmNombresPersona"]));
$txtApellidosPersona = addslashes(strtoupper($_POST["prmApellidosPersona"]));
$numeroPersonas      = 0;

switch ("$accion") {

    case "buscarPersonaNombresApellidosMultiple":
        {
            $consultaPersonas = mysql_query("SELECT idFeligres,apellidoCasada, pApellido, sApellido, pNombre, sNombre FROM feligreses
                WHERE apellidoCasada like '%$txtApellidosPersona%'
                OR pApellido like '%$txtApellidosPersona%'
                OR sApellido like '%$txtApellidosPersona%'
                OR pNombre like '%$txtNombresPersona%'
                OR sNombre like '%$txtNombresPersona%' AND estadoRegistro='1'");

            $resultadoPersonas = "<table border='0' id='dataGridB' style='width:100%'>";
            while ($regPersonas = mysql_fetch_array($consultaPersonas)) {
                $numeroPersonas++;

                $resultadoPersonas .= "<tr style='cursor: pointer; ' onClick=\"javascript:fnSubirDatosPersona
                ('" . $regPersonas["idFeligres"] . "', '". $regPersonas["apellidoCasada"] . "', '" . $regPersonas["pApellido"] . "', '"
                    . $regPersonas["sApellido"] . "', '" . $regPersonas["pNombre"] . "', '"
                    . $regPersonas["sNombre"] . "', '" . $_POST["id"] . "', '" . $_POST["ojetoCodigo"]
                    . "')\"><td style='width: 10px;'>" . $regPersonas["idFeligres"]
                    . "</td><td style='width: 200px;'>" . $regPersonas["apellidoCasada"] . " ". $regPersonas["pApellido"] . " "
                    . $regPersonas["sApellido"] . ", " . $regPersonas["pNombre"] . " "
                    . $regPersonas["sNombre"] . "</td></tr>";

            }
            mysql_close($conexion);
            $resultado .= "</table>";
            $returnArray = array(numeroPersonas => $numeroPersonas, resultadoPersonas => $resultadoPersonas);
            $myjson      = $json->encode($returnArray);
            echo $myjson;
        }
        break;

}
