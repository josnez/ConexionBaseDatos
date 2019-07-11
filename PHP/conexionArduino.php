<?php

require_once("envioDatos.php");

$herramienta = new EnvioDatos();

$ingresar_dato = $herramienta->ingresar_datos($_GET["posYJug1_php"],$_GET["posYJug2_php"],$_GET["posXbol_php"],$_GET["posYbol_php"]);
	
?>