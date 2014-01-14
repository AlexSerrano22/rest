<?php 
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$salida="Sin: </br>";
$i=0;
$result = mysqli_query($con,"SELECT * FROM `ingalim` WHERE opcion=0 and `idAlimento`=(select idAlimento from alimento where Nombre='".$_GET['al']."')");
	if($result!=NULL)
	while($row = mysqli_fetch_array($result)){
		$alim = mysqli_query($con, "SELECT * FROM ingredientes WHERE idin=".$row['idin']);
		$raw = mysqli_fetch_array($alim);
		$salida.='<input type="checkbox" name="'.nl2br(htmlentities($raw['nombre'])).'" value="'.nl2br(htmlentities($raw['nombre'])).'" id="'.$i.'"> '.nl2br(htmlentities($raw['nombre']));
		$i++;
	
}
$salida.="<input type='hidden' class='hid' id='cont' value='".$i."'/>";

echo $salida;


 ?>