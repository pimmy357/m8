<?php
include("config2.php");
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<title>PDF</title>
</head>
<body>
<p>กรุณาตรวจสอบความถูกต้องของข้อมูล</p>
<p><a href="genratepdf.php" target="_blank">Dowload PDF</a></p>
<table border="3">
	
<tr>
<td style="font-weight:bold;">Production_id</td>
<style>
p{	margin-top:40px;
	text-align: center;}
	font-family:sans-serif;
    font-size:12px;
td {


  text-align: left;
 

}
body{
    margin:0;
    background: #e8dbd5;
}

a{
	background-color: #8bc34a;
    color: white;
    padding: 14px 25px;
    text-align: center;	
    text-decoration: none;
    display: inline-block;
}
table{
	
  text-align: center;
 margin: 20px 660px;
 background:white;
}
	</style>

<td style="font-weight:bold;">SUMMARY</td>
</tr>
<?php 
$sql = "SELECT Production_id, SUM(QTY) AS SUMMARY FROM tbl_info GROUP BY Production_id";

header('Content-Type: text/html; charset=utf-8'); 

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) 
	{ ?>

<tr>

<td><?php echo htmlentities($row->Production_id);?></td>
<td><?php echo htmlentities($row->SUMMARY);?></td>
</tr>

<?php } }
?>
</table>
</body>
</html>