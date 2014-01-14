<?php
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM contenido WHERE idAlimento=$_GET[alim] AND idOrden=$_GET[ido]");
  if (mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_array($result);
  $cant= $row['cantidad'];
  if($cant>1){
  $cant--;
  $sql = "UPDATE contenido SET cantidad=$cant WHERE idAlimento=$_GET[alim] AND idOrden=$_GET[ido]";
  }else{
  $sql = "DELETE FROM contenido WHERE idAlimento=$_GET[alim] AND idOrden=$_GET[ido]";
  }
  }else{

	}
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "guardado";