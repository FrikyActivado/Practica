<?php
include_once('config.php');

function consultarPass($nombreUsuario){
	global $db;
	$sql = "SELECT `Contrasena` FROM `usuarios` WHERE `Nombre`= '".$nombreUsuario."'";
	$qry = mysqli_query($db,$sql);	
	$db->close();
	return $pass=mysqli_fetch_array($qry)['Contrasena'];
}

function consultarMsg($emisor,$receptor){
	global $db;
	$sql = "SELECT `Contenido del mensaje`,`ID_Mensaje` FROM `mensajes` WHERE `Remitente`='".$emisor."' AND `Destinatario`='".$receptor."'";
	$qry = mysqli_query($db,$sql);
	$db->close();
	return mysqli_fetch_all($qry,MYSQLI_ASSOC);
}

function consultarID($nombreUsuario){
	global $db;
	$sql = "SELECT `ID` FROM `usuarios` WHERE `Nombre`='".$nombreUsuario."'";
	$qry=mysqli_query($db,$sql);
	return mysqli_fetch_array($qry)['ID'];
}

?>