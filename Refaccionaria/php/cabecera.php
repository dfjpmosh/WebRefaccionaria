<?php 
	session_start();
	if(!isset($_SESSION['contador']))
	{
		$_SESSION['contador'] = 0;
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Refaccionaria El Piston</title>
		<link rel="Stylesheet" href="css/estilo1000.css" media='screen and (min-width: 1000px)'>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
	</head>

	<body>
	<div id="login">
		<p>
	    	<label for="user_name"><h4>NO SOMOS UNA REFACCIONARIA SOMOS UNA SOLUCION PARA TU AUTOMOVIL</h4></label>			
	    </p>
		<ul class="nav">
			<li><a href="index.php"><strong>Inicio</strong></a></li>
			<li><a href="productos.php"><strong>Productos</strong></a></li>
			<!--<li><a href="productos.html"><strong>Promociones</strong></a></li>-->
			<li><a href="contacto.php"><strong>Contacto</strong></a></li>
		</ul>
		
	</div>
	<div class="encabezado">
		<div id="redes">
			<a href="https://twitter.com/?lang=es" target="_blank"><img src="img/twitter.png" width="30px" height="30px"></a>
			<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0#identifier" target="_blank"><img src="img/google.png" width="30px" height="30px"></a>
			<a href="https://www.facebook.com/?_rdr=p" target="_blank"><img src="img/face.png" width="30px" height="30px"></a>
		</div>
	</div>
	<div id="contenido">
	<section>
		<div id="descripcion">
			<div id="contienecarrito">
				<div id="carrito" style="background:black; color:white;">
				Carrito
				</div>
				<a href="php/destruir.php"><button>Vaciar Carrito</button></a>
				<a href="confirmar.php"><button>Ir a Caja</button></a>
			</div>