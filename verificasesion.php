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
if($res!=NULL){
if(mysqli_num_rows($res)==1){
$row = mysqli_fetch_array($res);
echo "Esta mesa esta atendida por: ".$row['mesero'];
}else{
 echo "0";
}}else{
	echo "0";
}
mysqli_close($con);
?>