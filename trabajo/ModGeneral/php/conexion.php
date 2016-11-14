<?php

$host     = 'localhost';
$user     = 'root';
$password = '';
$db       = 'registroiglesia';
$conexion = mysql_connect("$host", "$user", "$password") or die(mysql_error());
mysql_select_db($db, $conexion) or die("Problemas en la selección de la base de datos");

date_default_timezone_set('America/El_Salvador');

/*function conectar(){

$db_dir="localhost";
$db_usuario="root";
$db_nombre="iglesia2";
$db_clave="";

$con=mysqli_connect($db_dir,$db_usuario,$db_clave)or die("Error al conectar".mysqli_error());
mysqli_select_db($con,$db_nombre);
return $con;

}*/
