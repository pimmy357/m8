<html>
<head>
<title>DATA</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<style>
table 
{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  background:white;
}

td, th 
{
  border: 1px solid #3DA7EE;
  text-align: left;
  padding: 8px;
  
}
body
{
    margin:0;
    background:#e8dbd5;
}
tr:nth-child(even) 
{
  background-color:#669999;
  color: #fff;
}
a:link 
{
    text-decoration: none;
}

a:visited 
{
    text-decoration: none;
    color: #87AAAA;
}

a:hover 
{
    text-decoration: underline;
}

a:active 
{
    text-decoration: underline;

}
input[type=button], input[type=submit], input[type=reset], 
button[type=submit] {
    display: inline-block;
  border-radius: 4px;
  background-color: #8bc34a;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
 margin-top: 80px;
}
.outer-container
{
    text-align:center;
}
input[type="file"]
{
    width:100%;
    height:100%;
    position:absolute;
    top:0;
    left:0;
    opacity:0;
    cursor:pointer;
   
   
   
}
.filewrap
{
    position:relative;
    background: #ffffff;
    border-radius: 25px;
    border:10px solid #669999;
    padding:50px 200px;
    color:	black;
    font-family:sans-serif;
    font-size:12px;
    margin-bottom:20px;
    

    
    
}
.navbar
{
    background:#FEF9EF;
    height:80px;
    margin-bottom:100px;
}
.logo
{
    font-family:"Impact", "fantasy";
    font-size: 30px;
    padding-top:20px;
    color:#4CA1A3;
    padding-left:80px;
    letter-spacing: 8px;
  
}
a
{
    margin-right:1000px;
    float:right;
    font-size:18;
    margin-top:10px;
    font-family:"Times New Roman", Times, serif;
    font-style: italic;
    letter-spacing: 4px;
}
</style>
<nav class="navbar">
    <div class="logo">
    <span>   DATACSP </span>
    <span><a href="fpdf/index.php" target="_blank">Generate PDF</a></span>
    </div>
</nav>
    

<div class="outer-container">
    <form action="f_save.php" method="post"
    name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <p>
    <span class="filewrap">
    Choose excel file
    <input  type="file" name="file" id="file" accept=".xls,.xlsx">
    </span>
    </p>
            
    <p>
    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
    </p>
    </form>
</div>
    
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
       
<?php 
header('Content-Type: text/html; charset=utf-8'); 
$conn = mysqli_connect("localhost","root","","ex_c");  
mysqli_query($conn,"set character set UTF8   ");
    $sqlSelect = "SELECT * FROM tbl_info";
    $result = mysqli_query($conn, $sqlSelect);
    $conn->query("SET NAMES UTF8");
  
if (mysqli_num_rows($result) > 0)
{
?>
   <center>  
    <table >
        
            <tr>
                <th>No</th>
                <th>Order_id</th>
                <th>Production_id</th>
                <th>QTY</th>

            </tr>
        
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        
        <tr>
            <td><?php  echo $row['No']; ?></td>
            <td><?php  echo $row['Order_id']; ?></td>
            <td><?php  echo $row['Production_id']; ?></td>
            <td><?php  echo $row['QTY']; ?></td>
        </tr>
<?php
    }
?>
        
    </table></center>   
<?php 
} 
?>
</body>
</html> 