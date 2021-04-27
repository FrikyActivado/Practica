<?php 
include('consultas.php');
if (isset($_POST['Emisor'],$_POST['Receptor'])) {
	$emisor=consultarID($_POST['Emisor']);
	$receptor=consultarID($_POST['Receptor']);
	
	$msj=consultarMsg($emisor,$receptor);
	foreach ($msj as $value) {
		
		echo '<div class="d-flex justify-content-end mb-4">
							<div class="msjEnviado text-break">'.
							$value["Contenido del mensaje"].
							'</div>
				</div>';
	}

}else{
	echo "No se encontró una conversacion en la Base de Datos";
}

?>
