<?php
$con=mysqli_connect("localhost","root","","orden");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='1'");
$salida="<h4>Appetizers</h4><dl>";
while($row = mysqli_fetch_array($result)){
	$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >$row[Nombre]</a></dt><dd>
	</dd>";

	}

	echo $salida."</dl>";