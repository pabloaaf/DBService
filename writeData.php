<?php
/*
     localhost/writer.php?id=0&t=7&h=3
 */

include_once('config.inc.php');

$id = $_GET['id'];
$temperatura = $_GET['t'];
$humedad = $_GET['h'];

// Insert these values if none have been passed
if (!$id) {
  $id = "0";
}
if (!$temperatura) { 
  $temperatura = 999;
}
if (!$humedad) {
  $humedad = 999;
}

echo("temperatura = ".$temperatura."    "."humedad = ".$humedad."<BR>");

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
  die("error: ".mysqli_connect_error());
}

$datenow = date("Y-m-d H:i:s");

$sql = "INSERT INTO general (logdata, id, temperatura, humedad) VALUES ('$datenow','$id','$temperatura','$humedad')";
$result = mysqli_query($conn,$sql);
	
echo "<h2>The Field and Value data have been sent</h2>";

mysqli_close($conn);
?>