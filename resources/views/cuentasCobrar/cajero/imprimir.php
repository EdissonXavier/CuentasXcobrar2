<?php
include 'plantiila.php';
require 'conexion.php';

$query = SELECT * FROM cajero;
//$query="SELECT c.idcajero, c.nombrecajero, c.fechanacimiento, c.ciudadnacimiento, c.direccion, c.telefono, c.email FROM cajero AS c";
$resultado=$mysqli->query($query);

$pdf = new PDF();
$pdf->AliasPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(70,6,'INFORMACION_PERSONAL',1,1,'C',1);

$pdf->Output();

?>