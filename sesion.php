<?php
header ('Content-type: text/html; charset=utf-8');
$con=mysqli_connect("localhost","root",'',"orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
  date_default_timezone_set('America/Mexico_City');
   mysqli_query($con,"SET NAMES 'utf8'");
$hora = date("H:i:s"); 
$fecha = date("Y-m-d");
$mese=$_GET['mes'];
$_SESSION['m']=$_GET['cad2'];
$_SESSION['p']=$_GET['cad1'];
$res=mysqli_query($con,"SELECT * FROM orden WHERE mesa='$_GET[cad2]' AND peine='$_GET[cad1]' AND fecha='$fecha' AND pagada='0'");
if(mysqli_num_rows($res)==1){
$row = mysqli_fetch_array($res);
echo $row['idOrden'];
}else{

$sql= "INSERT INTO orden (IdOrden,mesa,peine,fecha,hora,mesero,NumPer)
VALUES ('$_SESSION[IDO]','$_GET[cad2]','$_GET[cad1]','$fecha','$hora','$mese','$_GET[nump]'); ";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

echo $_SESSION['IDO']++;
}
mysqli_close($con);
?>