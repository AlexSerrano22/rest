<?php 
$con=mysqli_connect("localhost","root","","orden");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
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
 
		<script type="text/javascript">
		function mena(){
			$container = $( '#rm-container' );

			$container.addClass( 'rm-open' );
		}

		</script>

			<!--[if lte IE 8]><style>.support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body onload="mena();">
        	<div class="container">
			
			<header>
			
				<h1>MENU</h1>
				
				
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
									
									<div class="rm-logo"></div>
									<h2>Rincon de los Angeles</h2>
									<h3>Restaurant</h3>

									<a href="#" class="rm-button-open">View the Menu</a>
									

								</div><!-- /rm-content -->
							</div><!-- /rm-front -->

							<div class="rm-back">
								<div class="rm-content">

										
									<div id="desayunos">

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='14'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='14'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
								echo "<input type='hidden' value='$_GET[ido]' id='IdO'>";
							?>
									</div>


								</div><!-- /rm-content -->
								<div class="rm-overlay"></div>

							</div><!-- /rm-back -->

						</div><!-- /rm-cover -->

						<div class="rm-middle">
							<div class="rm-inner">
								<div class="rm-content">
									<div id="desayunos2">

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='15'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='15'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
							?>

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='16'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='16'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
							?>
									</div>
								</div><!-- /rm-content -->
								<div class="rm-overlay"></div>
							</div><!-- /rm-inner -->
						</div><!-- /rm-middle -->

						<div class="rm-right">

							<div class="rm-front">
								
							</div>

							<div class="rm-back">
								<span class="rm-close">Close</span>
								<div class="rm-content">
									
									<div id="desayunos3">

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='17'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='17'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
							?>

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='18'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='18'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
							?>

							<?php
								$result = mysqli_query($con,"SELECT * FROM alimento WHERE IdSub ='19'");
								$sub= mysqli_query($con,"SELECT * FROM submenu WHERE idSub='19'");
								$rsub =  mysqli_fetch_array($sub);
								 $salida="<h4>$rsub[Descripcion]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$salida.="<dt><a href='#' class='rm-viewdetails' data-thumb='images/11.jpg' >".nl2br(htmlentities($row['Nombre']))."</a></dt><dd><input type='hidden' value='$row[idAlimento]' id='".nl2br(htmlentities($row['Nombre']))."'></dd>";

										}

								echo $salida."</dl>";
							?>


									</div>

									<!--<div class="rm-order">
										<p><strong>Would you like us to cater your event?</strong> Call us &amp; we'll help you find a venue and organize the event: <strong>626.511.1170</strong></p>
									</div>-->
							</div><!-- /rm-content -->
							</div><!-- /rm-back -->

						</div><!-- /rm-right -->
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
					<li><a href="pag1.php<?php echo '?ido='.$_GET['ido']; ?>">Desayunos</a></li>
					<li><a href="pag2.php<?php echo '?ido='.$_GET['ido']; ?>">Ensaladas</a></li>
					<li><a href="pag3.php<?php echo '?ido='.$_GET['ido']; ?>">Comidas</a></li>
					<li><a href="pag4.php<?php echo '?ido='.$_GET['ido']; ?>">Bebidas y Postres</a></li>
				</ul>
				<ul>
					<li><a href="consul.php<?php echo '?ido='.$_GET['ido']; ?>" class="bt-icon icon-printer" title="Imprimir Cocina">imprimir</a></li>
					<li><a href="consul.php<?php echo '?ido='.$_GET['ido']; ?>" class="bt-icon icon-file-add" title="Revisar Orden">consultar</a></li>
					<li><a href="delet.php<?php echo '?ido='.$_GET['ido']; ?>" class="bt-icon icon-window-delete" title="Eliminar Alimento">eliminar</a></li>
					<li><a href="index.php" class="bt-icon icon-home" title="Cerrar Menu">cerrar</a></li>
				</ul>

			</nav>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>