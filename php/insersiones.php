<?php 
include_once(`config.php`);
include_once('consultas.php');


function insertarMsg($remitente,$destinatario,$msj,$idMsg,$adjunto){
	$estado=1;
	global $db;

	echo "ESTE ES EL ID ".$idMsg;
	$sql= "INSERT INTO `mensajes`(`Remitente`, `Destinatario`, `Contenido del mensaje`, `ID_Mensaje`, `Estado_del_mensaje`, `Ruta_de_archivo`) VALUES (".$remitente.",".$destinatario.",'".$msj."',".$idMsg.",".$estado.",'')";
	$db->query($sql);
	$db->close();
}

 ?>