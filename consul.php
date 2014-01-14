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

						<div class="rm-middle">
							<div class="rm-inner">
								<div class="rm-content">
									<div id="desayunos2">

							<?php
								$result = mysqli_query($con,"SELECT * FROM contenido WHERE IdOrden ='$_GET[ido]'");
								 $salida="<h4>Contenido de la Orden #$_GET[ido]</h4><dl>";
									while($row = mysqli_fetch_array($result)){
										$sub= mysqli_query($con,"SELECT * FROM alimento WHERE idAlimento='$row[idAlimento]'");
										$nom = mysqli_fetch_array($sub);

										$salida.="<dt>$nom[Nombre]</dt><dd>$row[cantidad] <input type='hidden' value='$row[idAlimento]' id='$row[idAlimento]'></dd>";

										}

								echo $salida."</dl>";
  								echo "<input type='hidden' value='$_GET[ido]' id='IdO'>";
							?>

							<button onclick="window.location='imprime.php<?php echo '?ido='.$_GET['ido']; ?>'">Imprimir Cocina</button>
								<form method="GET" action="imprimeT.php">
							<label>Descuento %:</label>
							<input type="text" value='0' palceholder="Descuento" name="desc"/>
							<input type="hidden" value='<?php echo $_GET['ido']; ?>' name="ido"/>
							<input type="submit" value="Imprimir Ticket">	
							

								</form>	
							</br>
							
									</div>
								</div><!-- /rm-content -->
								<div class="rm-overlay"></div>
							</div><!-- /rm-inner -->
						</div><!-- /rm-middle -->

						
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