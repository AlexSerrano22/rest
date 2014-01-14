<?php 
$con=mysqli_connect("localhost","root","","orden");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

 date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
$hora = date("H:i:s");
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>El Rincon de los angeles</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/style5.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:300,500|Arvo:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
		<script src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
			<!--[if lte IE 8]><style>.support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body >

        <div class="container">
		
			
			<header>
			
				<h1>Gastos/Ingresos</h1>
				
				
				<div class="support-note"><!-- let's check browser support with modernizr -->
					<span class="no-cssanimations">CSS animations are not supported in your browser</span>
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span>
					<span class="no-csstransitions">CSS transitions are not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">

				<div id="rm-container" class="rm-container">

					<div class="rm-wrapper">

						<div class="rm-cover">

							<div class="rm-front">
								<div class="rm-content">

									<form method='post' action='guardagastos.php'>
										<select name="tipo">
											<option value='1' name="ingreso">Ingreso</option>
											<option value='0' name="gastos">Gasto</option>
											<option value='2' name="gastos">Inicio Caja</option>
										</select>
									</br>

									</br>

									<label>total</label></br>
										<input type="text" id="total" name="total" placeholder="Cantidad"/>

									</br>
									</br>
									<label>Descripcion</label></br>
										<input type="text" id="desc" name="desc" placeholder="Descripcion"/>

									</br>
									</br>
									<input type="submit" value="enviar"/>
									</form>
									</br>
									</br>
										
										<button onclick="window.location ='gastos.php'">Reiniciar</button>
									</div>
																			

								</div><!-- /rm-content -->
							</div><!-- /rm-front -->
						
						</div><!-- /rm-cover -->

					</div><!-- /rm-wrapper -->

				</div><!-- /rm-container -->

			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript">
			$(function() {

				Menu.init();
			
			});
		</script>
    
    <nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="imprimeD.php">Imprimir totales</a></li>
				</ul>
				
			</nav>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>
