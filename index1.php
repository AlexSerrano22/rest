<?php 
		/*$con=mysqli_connect("localhost","root",'',"orden");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		$y=0;
		$sql= "SELECT * FROM userp ";
		$x= mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($x))
		  {
		  	$y=1;
		  }
  
		  if($y > 0){
		  	$sql= "DELETE * FROM userp ";
			$x = mysqli_query($con,$sql);
		  }*/

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/estilo.css">
	
	<script type="text/javascript">
	window.addEventListener('load',init);

	function init(){
		var ob;
		  for(f=1;f<=10;f++)
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
	    m=valor;
	    if(m>0 && p>0)
	    agregar();     
	  }
	  else
	    if (e)
	    {
	      e.preventDefault();
	      var valor=e.target.getAttribute('value');
	      cad1='mesa='+encodeURIComponent(valor);
	      m=valor;
	      if(m>0 && p>0)
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
	    //alert(cad);
	    p=valor;
	    if(m>0 && p>0)
	    agregar();     
	  }
	  else
	    if (e)
	    {
	      e.preventDefault();
	      var valor=e.target.getAttribute('value');
	       cad2='peine='+encodeURIComponent(valor);
	      //alert(cad);
	      p=valor;
	      if(m>0 && p>0)
	      agregar();     
	    }
	}

	var m=0;
	var p=0;
	var cad1='';
	var cad2='';
	var cadf='';
	
	function procesarEventos()
		{
		 // var resultados = document.getElementById("resultados");
		  if(conexion1.readyState == 4)
		  {
		    //window.location="menu.php";
		    alert(conexion1.responseText);
		   // alert(p);
			//if(m>0 && p>0)
			//window.location="menu.php";
		  

		  } 
		  else 
		  {
		  	
		    resultados.innerHTML = 'Cargando...';
		  }
		}

	var conexion1;
		function agregar() 
		{
		
		  conexion1=crearXMLHttpRequest();
		  conexion1.onreadystatechange = procesarEventos;
		 conexion1.open('GET','sesion.php?cad1='+p+'&cad2='+m+'', true);
		  conexion1.send(null);  

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


</head>
<body>
	<div id="peine">
		<h1>Peine: </h1>
<?php
for($i=1; $i<11;$i++)
echo '<input type="button" id="pboton'.$i.'" class="peine" value="'.$i.'">';
?>
	</div>

	<div id="mesas">
		<h1>Mesa: </h1>
<?php
for($i=1; $i<11;$i++)
echo '<input type="button" id="mboton'.$i.'" class="mesa" value="'.$i.'">';
?>
	</div>
	<button onclick="agregar()">enviar</button>
</body>
</html>