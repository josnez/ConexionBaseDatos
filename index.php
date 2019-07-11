<!DOCTYPE html>
<html lang="es">
<head>
	<title>Pong Arduino</title>
	<link rel="icon" href="imagenes/favicon.ico">
	<meta charset="iso-8559-1"/>
	<meta name="description" content="Pagina web del juego pong"/>
	<meta name="keywords" content="juego, pong, arduino, programacion"/>
	<link rel="stylesheet" href="CSS/pongstreaming.css"/>
	
</head>
<body id="body">
	<header id="cabeceraWeb">
		<h1> PONG</h1>
		<h2> Clasico juego de pong hecho con un arduino</h2>
	</header>

	<nav id="navegacionPrincipal">
		<ul>
			<li>Quienes somos</li>
			<li>Materiales usados</li>
			<li>Estadisticas</li>
		</ul>
	</nav>

	<aside id="barraLateral">
		<blockquote>Movimientos :</blockquote>
		<table id="datos">
			<tr>
				<td>id</td>
				<td>posYjug1</td>
				<td>posYjug2</td>
				<td>posXbol</td>
				<td>posYbol</td>
			</tr>
			<?php 
			include("PHP/conexion.php");

			$this->conexion = new conexion();
			$this->conexion->conectar();

			$sql = "SELECT * from movimientos"; 
			$result = mysqli_query($con, $sql);

			while ($mostrar=mysqli_fetch_array($result)) {
		
			?>
			<tr>
				<td><?php echo $mostrar['id'] ?></td>
				<td><?php echo $mostrar['posYJug1'] ?></td>
				<td><?php echo $mostrar['posYJug2'] ?></td>
				<td><?php echo $mostrar['posXbol'] ?></td>
				<td><?php echo $mostrar['posYbol'] ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
	</aside>

	<section id="contenidoPrincipal">

		<h3>En directo</h3>
		<div id="contenedor">
			
			<canvas width="840" height="420" id="canvas">

			</canvas>
			<div id="modal">
				<button id="boton" onclick="iniciar();">
					<img src="imagenes/play.jpg" />
				</button>
			</div>
		</div>

		<script src="JS/dibujarpong.js"></script>

		<article>
			<header>
				<h2>Puntajes</h2>
			</header>

			<p><cite>Mejor jugador</cite></p>
			<p>Mejores puntajes <cite>Mejor jugador</cite></p>

		</article>

	</section>
		
	<footer id="piePrincipal">
		<small>Universidad Distrital <address>Francisco Jose De Caldas</address></small>
	</footer>
</body>
</html>