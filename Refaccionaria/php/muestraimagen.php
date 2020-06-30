<?php include "config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion2 = "SELECT * FROM imagenesproductos WHERE id = ".$_GET['id']." LIMIT 1";
$resultado2 = mysqli_query($conexion, $peticion2);
while($fila2 = mysqli_fetch_array($resultado2))
{
	echo "<img src='../photo/".$fila2['imagen']."'>";		
}

mysqli_close($conexion);

?>
