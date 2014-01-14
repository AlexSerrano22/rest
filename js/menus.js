function menuss(){

	var x = document.getElementById("men");
	
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

	xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				x.innerHTML=xmlHttp.responseText;
				//setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET","menu.php",false);
		xmlHttp.send(null);

}