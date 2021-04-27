<?php
session_start();
include("consultas.php");
include("insersiones.php");
//$_SESSION["contador"]=($_SESSION["contador"]=="" OR $_SESSION["contador"]==99)?1:$_SESSION["contador"];


function obtenerHora(){
	date_default_timezone_set("America/Costa_Rica");
	$hora = getdate();
	$salida=substr($hora["year"],2);
	$salida.=(strlen($hora["mon"])<2)?"0".$hora["mon"]:$hora["mon"];
	$salida.=(strlen($hora["mday"])<2)?"0".$hora["mday"]:$hora["mday"];
	$salida.=(strlen($hora["hours"])<2)?"0".$hora["hours"]:$hora["hours"];
	$salida.=(strlen($hora["minutes"])<2)?"0".$hora["minutes"]:$hora["minutes"];
	$salida.=(strlen($hora["seconds"])<2)?"0".$hora["seconds"]:$hora["seconds"];

	return $salida;
}


function enviarMSG($remitente,$destinatario,$msg,$contador){
	insertarMsg(consultarID($remitente),consultarID($destinatario),$msg,obtenerHora().$contador,"");
}

if(isset($_POST["remitente"]) and isset($_POST["destinatario"]) and isset($_POST["msg"])){
	enviarMSG($_POST["remitente"],$_POST["destinatario"],$_POST["msg"],(strlen($_SESSION["contador"])<2)?"0".$_SESSION["contador"]:$_SESSION["contador"]);
	$_SESSION["contador"]+=1;
}

function randomName(){
	$vocales= array("a","e","i","o","u","y");
	$secundaria= array("r","l","a","e","i","o","u");
	$consonates= array("qu","w","r","t","y","p","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");
	$inicial="B";
	$nombre="";
	$contador=0;
	for ($i=0; $i < count($secundaria) ; $i++) { 
		$nombre.=$inicial.$secundaria[$i]; //secundaria
		if($secundaria[$i]== "r" OR $secundaria[$i]== "l"){ 
			for ($j=0; $j < count($vocales) ; $j++) {
			$nombre.=$vocales[$j]; //tercer char
					for ($k=0; $k < count($consonates) ; $k++) { //cuarto char
						$nombre.=$consonates[$k];
						for ($l=0; $l < count($vocales); $l++) { //quinto char
							$contador++;
						echo $nombre.$vocales[$l]."\t";
						}
						$nombre=substr($nombre,0,3);
					}
					$nombre=substr($nombre,0,2);
				}
			}else{
				echo ($secundaria[$i]== "r" OR $secundaria[$i]== "l");
			for ($m=0; $m < count($consonates); $m++) { //tercer char
				$nombre.=$consonates[$m];
				for ($n=0; $n <count($vocales) ; $n++) { //cuarto char
					$nombre.=$vocales[$n];
					for ($o=0; $o < count($consonates) ; $o++) { //quinto char
						$contador++;
						echo $nombre.$consonates[$o]."\t";
					}
					
					$nombre=substr($nombre,0,3);
				}
				$nombre=substr($nombre,0,2);
			}
		}
		$nombre="";
	}
	echo "</br>El total de combinaciones es ".$contador	;
}

randomName();

?>
<html>
<head></head>
<body>
	<form action="#" method="POST">
		Remitente:
		<input type="text" name="remitente" value="Chivi"></br>
		Destinatario:
		<input type="text" name="destinatario" value="Thanos"></br>
		msj:
		<input type="text" name="msg"></br>
		<button type="submit">Enviar</button>
	</form>
</body>
</html>