<?php 
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$salida="";
//echo "SELECT * FROM `ingalim` WHERE opcion=2 and `idAlimento`=(select idAlimento from alimento where Nombre='".$_GET['al']."')";
$result = mysqli_query($con,"SELECT * FROM `ingalim` WHERE opcion=2 and `idAlimento`=(select idAlimento from alimento where Nombre='".$_GET['al']."')");
	if($result!=NULL)
	if(mysqli_num_rows($result)>0){
		$salida.="<select name='m2' id='m2'>";
	while($row = mysqli_fetch_array($result)){
		$alim = mysqli_query($con, "SELECT * FROM ingredientes WHERE idin=".$row['idin']);
		$raw = mysqli_fetch_array($alim);
		$salida.='<option value="'.nl2br(htmlentities($raw['nombre'])).'" id="'.nl2br(htmlentities($raw['nombre'])).'"> '.nl2br(htmlentities($raw['nombre']))."</option>";
		
	}
	$salida.="</select></br>";
}

$result = mysqli_query($con,"SELECT * FROM `ingalim` WHERE opcion=1 and `idAlimento`=(select idAlimento from alimento where Nombre='".$_GET['al']."')");
	if($result!=NULL)
	if(mysqli_num_rows($result)>0){
		$salida.="<select name='m1' id='m1'>";
	while($row = mysqli_fetch_array($result)){
		$alim = mysqli_query($con, "SELECT * FROM ingredientes WHERE idin=".$row['idin']);
		$raw = mysqli_fetch_array($alim);
		$salida.='<option value="'.nl2br(htmlentities($raw['nombre'])).'" id="'.nl2br(htmlentities($raw['nombre'])).'"> '.nl2br(htmlentities($raw['nombre']))."</option>";
		
	}
}


echo $salida."</select>";


 ?>