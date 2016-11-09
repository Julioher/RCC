<?php 
//////////////////////////////////////////////////////////////////
//           SISTEMA REALIZADO POR JUAN ELISEO ZAVALA ASTURIAS  //
//Correo : ingjuanzavala@gmail.com                                //
//El salvador                                                   //
//////////////////////////////////////////////////////////////////
	//genrando la codificacion json
	include ('../php/conexion.php');   
	define('FPDF_FONTPATH','../fpdf/font/');
	require('../fpdf/fpdf.php'); 

$pdf=new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage(); 
$pdf->SetFont('Arial','',10);
$pdf->SetY(0);
$w=array(27,65,25,);  
$cod=$_GET["txtCodigoFeligres"];

$ano = date('Y');
$dia = date('d');
$mes1 = date('m');
if ($mes1 == "01")
{
$mes = "ENERO";	
}
if ($mes1 == "02")
{
$mes = "FEBRERO";	
}
if ($mes1 == "03")
{
$mes = "MARZO";	
}
if ($mes1 == "04")
{
$mes = "ABRIL";	
}
if ($mes1 == "05")
{
$mes = "MAYO";	
}
if ($mes1 == "06")
{
$mes = "JUNIO";	
}
if ($mes1 == "07")
{
$mes = "JULIO";	
}
if ($mes1 == "08")
{
$mes = "AGOSTO";	
}
if ($mes1 == "09")
{
$mes = "SEPTIEMBRE";	
}
if ($mes1 == "10")
{
$mes = "OCTUBRE";	
}
if ($mes1 == "11")
{
$mes = "NOVIEMBRE";	
}
if ($mes1 == "12")
{
$mes = "DICIEMBRE";	
}
$consulta = "SELECT feligres.* FROM feligres WHERE feligres.idFeligres='$cod'";
$resultado = mysql_query($consulta, $conexion);
$lafila=mysql_fetch_array($resultado);
$nombre = $lafila["pNombre"]." ".$lafila["sNombre"]." ".$lafila["pApellido"]." ".$lafila["sApellido"];
$direccion = $lafila["direccion"];
$fechaNacimiento = $lafila["fechaNacimiento"];
$telefonoMovil = $lafila["telefonoMovil"];
$telefonoCasa = $lafila["telefonoCasa"];


 $pdf->SetY(20);
$pdf->SetX(80);
$pdf->MultiCell(80,6,$institucion,0,'C',0);
$fecha = date("d/m/Y H:i");
$pdf->SetY(40);
$pdf->SetX(160);
$pdf->Cell(20,10, $fecha, 0,'C',0);

$pdf->SetY(30);
$pdf->SetX(80);
$pdf->MultiCell(80,6,"DATOS DEl FELIGRES",0,'C',0);
$pdf->Image('../imagen/indice.jpg',30,15,40); //colocamos la imagen

  $pdf->SetY(60); 
  $pdf->SetX(20); 
  $pdf->Cell(60,6,'Nombre : '.$nombre,0,0,'L',0,0);
 
  $pdf->SetY(70); 
  $pdf->SetX(20); 
  $pdf->Cell(60,6,'Telefono Movil : '.$telefonoMovil,0,0,'L',0,0);
  
   $pdf->SetY(80); 
  $pdf->SetX(20); 
  $pdf->Cell(40,6,'Telefono Casa  : '.$telefonoCasa,0,0,'L',0,0);
  
   $pdf->SetY(90); 
  $pdf->SetX(20); 
  $pdf->Cell(20,6,'Fecha Nacimiento : '.$fechaNacimiento,0,0,'L');

  $pdf->SetY(100); 
  $pdf->SetX(20); 
  $pdf->Cell(40,6,'Direccion : '.$direccion,0,0,'L');
  
  /*  $pdf->SetY(105); 
  $pdf->SetX(100); 
  $pdf->Cell(40,6,'Otro campo : '.$direccion,0,0,'L'); */
  
   $pdf->SetY(245);
  $pdf->Output(); 
 ?>