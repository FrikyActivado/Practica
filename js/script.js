function login(){


	var usr= document.getElementById('usr').value;
	var pass= document.getElementById('pwr').value;
	var form= new FormData();
	form.append('usuario',usr);
	form.append('contra',pass);
	var location="php/login.php";
	var params={
		method: "POST",
	 	body:form
	 };
	
	fetch(location,params)
	.then(function(response){
		return response.text();
	})
	.then(function(datos){
		if(datos==="y"){
			sessionStorage.setItem("usuario",usr);
			window.location.href="noticias.html";	
		}else{
			alert("Usuario o contraseña incorrecto");
		}
		
	});
	// var xhr = new XMLHttpRequest();
	// console.log("antes de xhr");
	// xhr.onreadystatechanged= function(){
	// 	if(this.readyState== 4 && this.status== 200){
	// 		if(this.responseText=="y"){
	// 			 location.href ="estudiantes.html";
	// 		}else{
	// 			alert("Usuario o Contraseña incorrecta");
	// 			document.getElementById('usr').innerHTML="";
	// 			document.getElementById('pwr').innerHTML="";
	// 		}
	// 	}
	// }
	// var location="php/login.php?usr="+usr+"&pwr="+pass;
	// console.log("enviando "+location);
	// xhr.open("GET",location);
	// xhr.send();
}



function aparecerPanel(x){

var emisor=sessionStorage.getItem('usuario');
var receptor=x;
enviarPOST(emisor,receptor);

	var div= document.getElementById("Chats").style.display="none";
	 div= document.getElementById("PanelChat");
	 div.classList.replace("col-sm-8","col-sm-12");
	 div.classList.add("entradaAnimada");
	 document.getElementById("navbar").style.display="none";
	 div.style.display="block";
	
}
function desaparecerPanel(){
	var div= document.getElementById("PanelChat").style.display="none";
	 div= document.getElementById("Chats");
	 div.classList.add("salidaAnimada");
	 document.getElementById("navbar").style.display="block";
	 div.style.display="block";


}

function aparecerchat(){
	if ($(window).width()>1023) {
		var div= document.getElementById("PanelChat");
		div.classList.replace("col-sm-12","col-sm-8");
		div.style.display="block";
		var div= document.getElementById("Chats");
		div.classList.replace("col-sm-12","col-sm-4");
		div.style.display="block";		
	}		
}

function enviarPOST(x,y){
var form= new FormData();
	form.append('Emisor',x);
	form.append('Receptor',y);
	var location="php/chats.php";
	var params={
		method: "POST",
	 	body:form
	 };
	
	fetch(location,params)
	.then(function(response){
		return response.text();
	})
	.then(function(datos){
		if(datos!=null){
		document.getElementById("Chat").innerHTML=datos;
		}else{
			alert("Usuario o contraseña incorrecto");
		}
		
	});
}

