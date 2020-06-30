<?php include "php/cabecera.php"?>

<?php

$conexion = mysqli_connect("localhost", "piston", "", "bdrefaccionaria");
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM productos WHERE idproducto=".$_GET['id']." LIMIT 1";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado))
{
	echo "<article>";
	echo "<h3>".$fila['nombre']."<h3>";
	echo "<p>".$fila['descripcion']."</p>";
	echo "<p>Precio: ".$fila['precio']." $</p>";
	$peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto = ".$fila['idproducto'];
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2))
	{
		echo "<a href='php/muestraimagen.php?id=".$fila2['id']."'><img src='photo/".$fila2['imagen']."' width=100px height=100px></a>";		
	}
	echo "<br>";
	echo "<button value='".$fila['idproducto']."' class='botoncompra'>Agregar al Carrito</button>";
	echo "</article>";
	
}
mysqli_close($conexion);

?>

<?php include "php/piedepagina.php"?>