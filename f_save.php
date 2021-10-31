<?php
header('Content-Type: text/html; charset=utf-8');

$conn = mysqli_connect("localhost","root","","ex_c");
$conn->query("set names utf8");
require_once('php-excel-reader/excel_reader2.php');
require_once('SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $Order_id = "";//ฟิว 1
                if(isset($Row[0])) {
                    $Order_id = mysqli_real_escape_string($conn,$Row[0]);
                }//ฟิว 1
                
                $Production_id = "";//ฟิว 2
                if(isset($Row[1])) {
                    $Production_id = mysqli_real_escape_string($conn,$Row[1]);
                }//ฟิว 2

                $QTY = "";//ฟิว 3
                if(isset($Row[2])) {
                    $QTY = mysqli_real_escape_string($conn,$Row[2]);
                }//ฟิว 3




                
                if (!empty($Order_id) || 
                    !empty($Production_id) || 
                    !empty($QTY)) {

                    $query = "insert into tbl_info
                              (Order_id,Production_id,QTY) 
                              values('".$Order_id."',
                                     '".$Production_id."',
                                     '".$QTY."')";
                    $result = mysqli_query($conn, $query);
                

                
                    if (! empty($result)) {
                      $type = "success";
                      $message = "Excel Data Imported into the Database";
                      echo "<script>";
                      echo"alert('success Excel Data Imported into the Database');";
                      echo"window.location ='f.php';";
                      echo "</script>";
                        

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        echo "<script>";
                        echo"alert('error Problem in Importing Excel Data');";
                        echo"window.location ='f.php';";
                        echo "</script>";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        echo "<script>";
        echo"alert('error Invalid File Type. Upload Excel File.');";
        echo"window.location ='f.php';";
        echo "</script>";
  }
}
?>