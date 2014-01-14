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
	<center>
	<div id="imprim" class="imprimir">
		<img src="images/restaurant2.png">
	</br>
		<p><?php 
			
		 echo "</br>Fecha: ".$fecha."</br>Hora: ".$hora;


		 ?></p>

		<p>
		<?php
			$num=0;
			$num2=0;
			$num4=0;
			$ress = mysqli_query($con, "SELECT sum(total) FROM orden WHERE fecha='$fecha'");
			$row = mysqli_fetch_array($ress);
			$num += $row['sum(total)'];
			$salida = "<table class='tabla' border='1'>";
					$salida.="<tr><td>gastos: </td><td class='num'></td></tr>";
			$ress = mysqli_query($con, "SELECT * FROM gastos WHERE fecha='$fecha' AND tipo=0");
			while($row = mysqli_fetch_array($ress)){
				//$num=0;
			$salida.="<tr><td>".$row['descripcion']."</td><td class='num'>".$row['total']."</td></tr>";

			}

			$salida.="<tr><td>ingresos: </td><td class='num'></td></tr>";
		
			$ress = mysqli_query($con, "SELECT * FROM gastos WHERE fecha='$fecha' AND tipo=1");
			while($row = mysqli_fetch_array($ress)){
				
			$salida.="<tr><td>".$row['descripcion']."</td><td class='num'>".$row['total']."</td></tr>";

			}

					echo $salida."</table>";
  				
  	?>
			
		</p>
	</div>
</center>
</body>
</html>