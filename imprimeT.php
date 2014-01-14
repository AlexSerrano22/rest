<?php 
$con=mysqli_connect("localhost","root","","orden");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
 date_default_timezone_set('America/Mexico_City');
$hora = date("H:i"); 
$fecha = date("Y-m-d");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/impirme.css" media="print"/>
	<script>
	function imprime(){
	window.print();
	window.location="index.php";
	}
	</script>

</head>
<body onload="imprime()">

	<div id="imprim" class="imprimir">
		<center><img src="images/restaurant2.png">
		<p>Av, de la Compañia</br>Metepec, Atlixco, Puebla</br>Tel: 244 44 4 08 78</p>
		
		<p> <?php echo "<table border='0'><tr><td>".$fecha."</td><td></td><td>".$hora."</td></tr></table>"; ?></p>

		<?php 
					$result = mysqli_query($con,"SELECT * FROM orden WHERE IdOrden ='$_GET[ido]' and fecha='$fecha'");
					$row = mysqli_fetch_array($result);

			echo "<p><table border='0'><tr><td>Peine: ".$row['Peine']."</td><td></td><td>Mesa: ".$row['Mesa']."</td><td>Personas: ".$row['NumPer']."</td></tr></table></p>";
		

		 ?>
		
		<p>
		<?php
		$costop=0;
		$costot=0;
			$result = mysqli_query($con,"SELECT * FROM Contenido WHERE IdOrden ='$_GET[ido]'");
			$salida = "<table class='tabla' border='0' >";
				while($row = mysqli_fetch_array($result)){
					$res = mysqli_query($con,"SELECT * FROM alimento WHERE idAlimento='$row[idAlimento]'");  
					$raw = mysqli_fetch_array($res);
					$costop = $row['cantidad']*$raw['Costo'];
					$salida.="<tr><td class='num'>$row[cantidad]</td><td>".nl2br(htmlentities($raw['Nombre']))."</td><td class='num'> ".$costop."</td></tr>";
					$costot+=$costop;
					}
					if($_GET['desc'] > 0){
				$costot=round($costot - (($costot*$_GET['desc'])/100));
				$salida.="<tr><td></td><td>Descuento del $_GET[desc] %</td></tr>";	
			}
				$salida.="<tr><td></td></tr><tr><td></td><td>Total</td><td class='num'>$ ".$costot."</td></tr>";
				echo $salida."</table>";
  				echo "<input type='hidden' value='$_GET[ido]' id='IdO'>";
		
  				mysqli_query($con,"UPDATE orden SET pagada=1, total=$costot WHERE IdOrden='$_GET[ido]' and fecha='$fecha'");
  				mysqli_query($con,"DELETE FROM Contenido WHERE IdOrden='$_GET[ido]'");
		?>
			
		</p>


<p>Gracias por su visita</p>
<p>
<?php 
$ar=fopen("Frase.txt","r") or
  die("No se pudo abrir el archivo");
while (!feof($ar))
{
  $linea=fgets($ar);
  echo "".nl2br(htmlentities($linea));
}
fclose($ar);

 ?>
</p>
</center>
	</div>
</br>
	
</body>
</html>