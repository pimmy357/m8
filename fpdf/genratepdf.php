<?php


require_once("config.php");
//

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('THSarabun','','THSarabun.php');
	$pdf->SetFont('THSarabun','',16);
	
// code for print Heading of tables

$ret ="SELECT PRODUCTION_ID , QTY FROM `tbl_info`";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สรุปยอดรวม'),0,1,"C");
$pdf->Ln(5);

//code for print data
$sql = "SELECT Production_id, SUM(QTY) AS SUMMARY FROM tbl_info GROUP BY Production_id ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{

foreach($results as $row) {
	
	$pdf->AddFont('THSarabun','','THSarabun.php');
	$pdf->SetFont('THSarabun','',16);

	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(95,12,$column,1);
} }


$pdf->Output();
?>