<?php 
//echo '<script language="javascript">alert("juas");</script>';
//var_dump($_POST);
// echo '<script language="javascript">console.log("'.$_POST['usuario'].'");</script>';
// echo '<script language="javascript">console.log("'.$_POST['contra'].'");</script>';
include('consultas.php');
if ($_POST['usuario']!="" && $_POST['contra']!="") {
	if (isset($_POST['usuario']) && isset($_POST['contra'])) {
		if(consultarPass($_POST['usuario'])==$_POST['contra']){
			echo "y";
		}
		else
		{
			echo "Usuario o contraseña incorrecta";
		}	
	}
}
?>
