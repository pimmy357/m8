
<?php
require('fpdf.php');
header('Content-Type: text/html; charset=utf-8'); 
$pdf=new FPDF();
$pdf->AddPage();

$pdf->AddFont('Angsa','','Angsa.php');//ธรรมดา
$pdf->SetFont('Angsa','',30);
$pdf->Cell(0,0,'ข้อความทดสอบ');
$pdf->Ln(15);




$pdf->Output();
?>