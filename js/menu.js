var Menu = (function() {
	
	var $container = $( '#rm-container' ),						
		$cover = $container.find( 'div.rm-cover' ),
		$middle = $container.find( 'div.rm-middle' ),
		$right = $container.find( 'div.rm-right' ),
		$open = $cover.find('a.rm-button-open'),
		$close = $right.find('span.rm-close'),
		$details = $container.find( 'a.rm-viewdetails' ),

		init = function() {

			initEvents();

		},
		initEvents = function() {

			$open.on( 'click', function( event ) {

				openMenu();
				return false;

			} );

			$close.on( 'click', function( event ) {

				closeMenu();
				return false;

			} );

			$details.on( 'click', function( event ) {

				$container.removeClass( 'rm-in' ).children( 'div.rm-modal' ).remove();
				viewDetails( $( this ) );
				return false;

			} );
			
		},
		openMenu = function() {

			$container.addClass( 'rm-open' );

		},
		closeMenu = function() {

			$container.removeClass( 'rm-open rm-nodelay rm-in' );

		},

		

		viewDetails = function( recipe ) {

			var title = recipe.text(),
				img = noopcionales(title),
				id = document.getElementById(""+title).value,
				description = opcionales(title),
				url = "<button onClick='Guarda("+id+");Guarda2("+id+");' class='guarda'>Guardar</button>";
				//alert(id);
			var $modal = $( '<div class="rm-modal"><h5>' + title + '</h5><div>'+ img +'</div></br><div>' + description + '</div>' + url + '<div> <lablel> cantidad </label></br> <input type="text" value="1" id="canti" placeholder="Cantidad"/></br><lablel> Algo mas </label></br> <input type="text" id="extra" placeholder="Datos Extras"/> </div><div><label>Segundo: </label><input type="checkbox" value="(2)" id="2t" name="2t" ></div><span class="rm-close-modal">x</span></div>' );

			$modal.appendTo( $container );

			var h = $modal.outerHeight( true );
			$modal.css( 'margin-top', -h / 2 );

			setTimeout( function() {

				$container.addClass( 'rm-in rm-nodelay' );

				$modal.find( 'span.rm-close-modal' ).on( 'click', function() {

					$container.removeClass( 'rm-in' );

				} );
			
			}, 0 );

		};

	return { init : init };

})();

function cerrar(){
	$container = $( '#rm-container' ).removeClass( 'rm-in' );
}

function opcionales( alim ){
	
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}

		var x;
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				x= xmlHttp.responseText;
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","opcionales.php?al="+alim,false);
		xmlHttp.send(null);
	
	return x;
}
function noopcionales( alim ){
	
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}

		var x;
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				x= xmlHttp.responseText;
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","noopcionales.php?al="+alim,false);
		xmlHttp.send(null);

	return x;
}

function Guarda(t){
	cerrar();
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}
	var ido = document.getElementById("IdO").value;
	var can = document.getElementById("canti").value;
	//var alim = document.getElementById();
	//alert(t);
	//alert(ido+" "+t);
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				//alert(xmlHttp.responseText);
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","guarda.php?ido="+ido+"&alim="+t+"&cant="+can+"",false);
		xmlHttp.send(null);

}

function Guarda2(t){
	cerrar();
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}

	var ido = document.getElementById("IdO").value;
	var lim = document.getElementById('cont').value;
	var cad="";
	if(document.getElementById('m2')!=null){
	var posicion=document.getElementById('m2').options.selectedIndex; //posicion
	cad+=" "+document.getElementById('m2').options[posicion].text+" - ";
	}
	if(document.getElementById('m1')!=null){
	var posicion2=document.getElementById('m1').options.selectedIndex; //posicion
	cad+=" "+document.getElementById('m1').options[posicion2].text+" :";
	}
	
	for(i=0;i<lim;i++){
		x = document.getElementById(""+i).checked;
		if(x){
			cad+=" sin "+document.getElementById(""+i).value+","; 
		}
	}

	cad+=" "+document.getElementById('extra').value;
	var can = document.getElementById("canti").value;
	

	tiempo = document.getElementById("2t").checked;
	if(tiempo){
		cad+=" (2)";
	}
	//alert(cad);
	//var alim = document.getElementById();
	//alert(t);
	//alert(ido+" "+t);
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
	xmlHttp.open("GET","guardaal.php?ido="+ido+"&alim="+cad+"&ida="+t+"&cant="+can+"",false);
		xmlHttp.send(null);

}

function elimina(r){
	
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}
	var ido = document.getElementById("IdO").value;
	//var alim = document.getElementById();
	//alert(t);
	//alert(ido+" "+t);
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				//alert(xmlHttp.responseText);
				
				location.href='delet.php?ido='+ido;
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","elimina.php?ido="+ido+"&alim="+r+"",false);
		xmlHttp.send(null);

}

function eliminaC(r){
	
	var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}
	var ido = document.getElementById("IdO").value;
	var x = document.getElementById(r).value;
	//var alim = document.getElementById();
	//alert(t);
	//alert(ido+" "+t);
	//alert(x);
	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				//alert(xmlHttp.responseText);
				
				location.href='deletcocina.php?ido='+ido;
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","eliminaC.php?ido="+ido+"&alim="+x+"",false);
		xmlHttp.send(null);

}