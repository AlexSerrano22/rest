<?php
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM imprimir WHERE alimentos='$_GET[alim]' AND idOrden=$_GET[ido]");
  if (mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_array($result);
  $cant= $row['cant'];
  if($cant>1){
  $cant--;
  $sql = "UPDATE imprimir SET cant=$cant WHERE alimentos='$_GET[alim]' AND idOrden=$_GET[ido]";
  }else{
  $sql = "DELETE FROM imprimir WHERE alimentos='$_GET[alim]' AND idOrden=$_GET[ido]";
  }
  }else{

	}
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "guardado";