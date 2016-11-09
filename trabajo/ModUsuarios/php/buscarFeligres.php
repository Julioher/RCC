<?php

include '../../php/conexion.php';

if ($_POST) {
    $q   = $_POST["palabra"];
    $sql = mysql_query("SELECT * FROM feligreses WHERE pNombre LIKE '%$q%'");

    while ($sql_res = mysql_fetch_array($sql)) {
        $idFeligres     = $sql_res["idFeligres"];
        $pNombre        = $sql_res["pNombre"];
        $sNombre        = $sql_res["sNombre"];
        $pApellido      = $sql_res["pApellido"];
        $sApellido      = $sql_res["sApellido"];
        $apellidoCasada = $sql_res["apellidoCasada"];
        ?>

<div><?php echo $pNombre; ?> <?php echo $sNombre; ?> <?php echo $pApellido; ?> <?php echo $sApellido; ?> <?php echo $apellidoCasada; ?></div>

<?php
}
} else {

}
/*$res = mysql_query($sql_res);

$arreglo_php = array();

if (mysql_num_rows($res) == 0) {
array_push($arreglo_php, "No hay datos");
} else {
while ($palabras = mysql_fetch_array($res)) {
array_push($arreglo_php, $palabras["pNombre"]);
}
}*/
