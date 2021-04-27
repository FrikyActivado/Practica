function cerrarSesion(){
	sessionStorage.removeItem("usuario");
	alert("Sesion finalizada");
	window.location.href="index.html";
}