<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Pong Arduino</title>
		<meta name="description" content="">
		<meta name="author" content="satur">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="icon" href="imagenes/favicon.ico">
		<link rel="stylesheet" href="CSS/paginaInicial.css"/>
		
	</head>
	
	<body onkeydown="moverPaletas(event)" onkeyup="pararPaletas(event)">
		<div id="contenedor">
			<canvas width="600" height="300" id="canvas">

			</canvas>
			<div id="modal">
				<button id="boton" onclick="iniciar();">
					<img src="imagenes/play.jpg" />
				</button>
			</div>
		</div>
		
		<script src="JS/logicapong.js"></script>
	</body>
</html>