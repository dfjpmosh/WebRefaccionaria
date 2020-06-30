<?php include "php/cabecera.php"?>
<?php include "php/config.php"?>

<div style="height:30px;">
	<form action="productospornombre.php" method="post">
		<input type="text" name="nombre" style="text-align:center;" placeholder="Por Palabra">
		<input type="submit" value="Buscar">
	</form>
</div>

<?php
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT DISTINCT categoria FROM productos";
$resultado = mysqli_query($conexion, $peticion);
echo '<div>
		<form action="productosporcategoria.php" method="post">
			<select name="categoria" style="text-align:center;">';
while($fila = mysqli_fetch_array($resultado))
{
	echo '<option value="'.$fila['categoria'].'">'.$fila['categoria'].'</option>';
}
echo '		</select>
			<input type="submit" value="Buscar">
		</form>
	</div>';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM productos WHERE categoria = '".$_POST['categoria']."' AND activado = 1 GROUP BY nombre";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado))
{
	echo "<article>";
	$peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto = ".$fila['idproducto']." LIMIT 1";
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2))
	{
		echo "<img src='photo/".$fila2['imagen']."' width=100px>";		
	}
	echo "<h3>".$fila['nombre']."<h3>";
	echo "<p>".$fila['descripcion']."</p>";
	echo "<p>Categoria: ".$fila['categoria']." </p>";	
	echo "<p>Precio: ".$fila['precio']." $</p>";	
	echo "<br>";
	echo "<a href='detalleproducto.php?id=".$fila['idproducto']."'><button>Ver Imagenes</button></a>";
	echo "<button value='".$fila['idproducto']."' class='botoncompra'>Agregar al Carrito</button>";
	echo "</article>";
	
}
mysqli_close($conexion);

?>

<?php include "php/piedepagina.php"?>