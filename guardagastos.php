<?php 

$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
$hora = date("H:i:s");
 
 $sql = "INSERT INTO gastos VALUES (null,'$fecha','$hora',$_POST[tipo],$_POST[total],'$_POST[desc]')";
	
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
header("Location: Index.php");
 ?>