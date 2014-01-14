<?php 
$con=mysqli_connect("localhost","root","","orden");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

 date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
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
		
			<script type="text/javascript">
			window.addEventListener('load',init);

			function init(){
				var ob;
				document.getElementById("mesero").value="";
				  for(f=1;f<=15;f++)
				  {
				    ob=document.getElementById('mboton'+f);
				    ob.addEventListener('click',aprieta,false);
				    ob=document.getElementById('pboton'+f);
				    ob.addEventListener('click',aprietap,false);
				  }
			}
			
			function aprieta(e)
			{
			  if (window.event)
			  {
			    window.event.returnValue=false;
			    var valor=window.event.srcElement.getAttribute('value');
			    cad1='mesa='+encodeURIComponent(valor);
			    mes = document.getElementById("mesero").value;
			    m=valor;
			    if(m>0 && p>0 && mes!= "")
			    agregar();     
			  }
			  else
			    if (e)
			    {
			      e.preventDefault();
			      var valor=e.target.getAttribute('value');
			      cad1='mesa='+encodeURIComponent(valor);
			      mes = document.getElementById("mesero").value;
			      m=valor;
			    if(m>0 && p>0 && mes!= "")
			      agregar();     
			    }
			}




			function aprietap(e)
			{
			  if (window.event)
			  {
			    window.event.returnValue=false;
			    var valor=window.event.srcElement.getAttribute('value');
			     cad2='peine='+encodeURIComponent(valor);
			    mes = document.getElementById("mesero").value;

			   //alert(mes);
			    p=valor;
			    if(m>0 && p>0 && mes!= "")
			    agregar();     
			  }
			  else
			    if (e)
			    {
			      e.preventDefault();
			      var valor=e.target.getAttribute('value');
			       cad2='peine='+encodeURIComponent(valor);
			       mes = document.getElementById("mesero").value;
			      //alert(mes);
			      p=valor;
			      if(m>0 && p>0 && mes!= "")
			      agregar();     
			    }
			}

			var m=0;
			var p=0;
			var cad1='';
			var cad2='';
			var cadf='';
			var mes='';
			
			function procesarEventos()
				{
				 // var resultados = document.getElementById("resultados");
				  if(conexion1.readyState == 4)
				  {
				    //window.location="menu.php";
				    var idO = conexion1.responseText;
				   // alert(p);
					//if(m>0 && p>0)
					num=Number(""+idO);
					if(num>0)
					window.location = "pag1.php?ido="+idO;
				  	else{
				  		alert("Error Ingresa los datos nuevamente");
				  	window.location = "index.php";
				  	
				  }
				  } 
				  else 
				  {
				  	
				   
				  }
				}

				function procesar()
				{
				 // var resultados = document.getElementById("resultados");
				  if(conexion1.readyState == 4)
				  {
				    //window.location="menu.php";
				    nus=conexion1.responseText;
				   // alert(p);
					//if(m>0 && p>0)
					if(nus!="0"){
						alert(nus);
						iniciar();
					}else{
						iniciar();
					}
					}
				}

			var conexion1;
				function agregar() 
				{
					var nump = document.getElementById("personas").value; 
				  conexion1=crearXMLHttpRequest();
				  conexion1.onreadystatechange = procesar;
				conexion1.open('GET','verificasesion.php?cad1='+p+'&cad2='+m+'&mes='+mes+'&nump='+nump+'', true);
				  conexion1.send(null);  	
				}

				function iniciar(){
					var nump = document.getElementById("personas").value; 
				  conexion1=crearXMLHttpRequest();
				  conexion1.onreadystatechange = procesarEventos;
				conexion1.open('GET','sesion.php?cad1='+p+'&cad2='+m+'&mes='+mes+'&nump='+nump+'', true);
				  conexion1.send(null);  
				 // alert(mes);
				}


				 function crearXMLHttpRequest() {
				   var resultat=null;
				   try {//prueba para los navegadores : Mozilla, Opera, ...
					    resultat= new XMLHttpRequest();
				     } 
				     catch (Error) {
				     try {//prueba para los navegadores Internet Explorer > 5.0
				     resultat= new ActiveXObject("Msxml2.XMLHTTP");
				     
				     }
				     catch (Error) {
				         try {//prueba para los navegadores Internet Explorer 5.0
				         resultat= new ActiveXObject("Microsoft.XMLHTTP");
				         }
				         catch (Error) {
				            resultat= null;
				         }
				     }
				  }
				return resultat;
				}
	</script>
			<!--[if lte IE 8]><style>.support-note .note-ie{display:block;}</style><![endif]-->

	<script >
	function Muestra(){
		document.getElementById("numeros").style.display = "block";
		document.getElementById("mesero").style.display = "none";

	}

	function Muestra2(){
		if(Number(""+document.getElementById("personas").value)>0){
		document.getElementById("numeros").style.display = "none";
		document.getElementById("numeros2").style.display = "block";
	}else{
		alert("ingresa un numero");
	}
		
	}
	</script>
    </head>
    <body >

    	<?php 
    		
$result = mysqli_query($con, "SELECT count(*) FROM orden WHERE fecha='".$fecha."'") ;
$num = mysqli_fetch_array($result);
if($num['count(*)']<1){

$_SESSION['IDO']=1;
}else{
	$ress= mysqli_query($con,"SELECT * FROM orden WHERE fecha='".$fecha."' order by IdOrden desc");
	$xy=0;
	while($re = mysqli_fetch_array($ress)){
		if($xy==0)
	$_SESSION['IDO'] = $re['idOrden']+1;
		$xy=1;
	}
}
echo $_SESSION['IDO'];
    	 ?>
        <div class="container">
		
			
			<header>
			
				<h1>PEINE/MESAS</h1>
				
				
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
																			<label>Nombre</label>
										<input type="text" id="mesero" placeholder="Nombre del Mesero" onChange="Muestra()">
										
										<div id="numeros" style="Display: none;">
											</br><label>Numero de personas</label></br>
											<input type="text" id="personas" placeholder="No. de Personas"  onChange="Muestra2()" />
										</br>
									</div>
										<div id="numeros2" style="Display: none;">
									<div id="peine">
										<h1>Peine: </h1>
											<?php
												for($i=1; $i<16;$i++)
													echo '<input type="button" id="pboton'.$i.'" class="peine" value="'.$i.'">';
											?>
									</div>

									<div id="mesas">
										<h1>Mesa: </h1>
											<?php
												for($i=1; $i<16;$i++)
													echo '<input type="button" id="mboton'.$i.'" class="mesa" value="'.$i.'">';
											?>
									</div>

									<div id="mese">

										<button onclick="window.location ='index.php'">Reiniciar</button>
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
					<li><a href="gastos.php">Gastos</a></li>
					<li><a href="desgloce.php">Desglose</a></li>
					<li><a href="imprimeD.php">Imprimir totales</a></li>
				</ul>
				
			</nav>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>
