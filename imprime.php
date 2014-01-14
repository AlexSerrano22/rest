<?php 
$con=mysqli_connect("localhost","root","","orden");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

date_default_timezone_set('America/Mexico_City');
$hora = date("H:i:s"); 
$fecha = date("Y-m-d");
session_start();
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
		<center>
		<img src="images/restaurant2.png">
	</br>
		<p>Orden # <?php echo $_GET['ido'];
			$ress = mysqli_query($con, "SELECT * FROM orden WHERE IdOrden='$_GET[ido]' AND fecha='$fecha'");
			$row = mysqli_fetch_array($ress);
		 echo "</br>Mesero: ".$row['mesero']."</br>Peine: $_SESSION[p]  Mesa: $_SESSION[m]";

		 ?></p>
		 <p> <?php echo "<table border='0'><tr><td>".$fecha."</td><td></td><td>".$hora."</td></tr></table>"; ?></p>

		<p>
		<?php
			$result = mysqli_query($con,"SELECT * FROM imprimir WHERE IdOrden ='$_GET[ido]'");
			$salida = "<table class='tabla' border='1'>";
				while($row = mysqli_fetch_array($result)){
					$salida.="<tr><td class='num'>$row[cant]</td><td>".nl2br(htmlentities($row['alimentos']))."</td></tr>";

					}

				echo $salida."</table>";
  				echo "<input type='hidden' value='$_GET[ido]' id='IdO'>";

  				mysqli_query($con,"DELETE FROM imprimir WHERE IdOrden='$_GET[ido]'");
		?>
			
		</p>
	</center>
	</div>

</body>
</html>