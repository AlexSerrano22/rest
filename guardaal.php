<?php
  header ('Content-type: text/html; charset=utf-8');
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  mysqli_query($con,"SET NAMES 'utf8'");

  $alimento = mysqli_query($con,"SELECT * FROM alimento WHERE idAlimento=$_GET[ida]");
  $raw = mysqli_fetch_array($alimento);
echo  $cad = $raw['Nombre']." ".$_GET['alim'];
  $result = mysqli_query($con,"SELECT * FROM imprimir WHERE alimentos='$cad' AND idOrden=$_GET[ido]");
  if (mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_array($result);
  $cant= $row['cant']+$_GET['cant'];
  echo $sql = "UPDATE imprimir SET cant=$cant WHERE alimentos='$cad' AND idOrden=$_GET[ido]";
  }else{

  echo $sql = "INSERT INTO imprimir VALUES ($_GET[ido],'$cad',$_GET[cant])";
	}
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "";