<?php include "cabeceraadmin.php"?>
<?php include "../php/config.php"?>
<table border="1">
	<tr style="background:#A7AEAE; color:black; text-align:center;"><td>Imagen</td><td>Archivo</td></tr>
	<tr style="background:#016EC2; text-align:center;">
		<?php echo'<form enctype="multipart/form-data" action="nuevaimagen.php?id='.$_GET['id'].'" method="POST">
			<td></td>
			<td><input type="file" name="archivo" ></td>			
			<td><input type="submit" value="Agregar"></td>
		</form>'?>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>	
	
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM imagenesproductos WHERE idproducto=".$_GET['id']." GROUP BY imagen";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado))
{
	echo '<tr>';
	echo '
	
		<td><img src="../photo/'.$fila['imagen'].'" width="50px" height="50px"/></td>
		<td>'.$fila['imagen'].'</td>
		<td><a href="eliminarimagen.php?id='.$fila['id'].'&idp='.$fila['idproducto'].'"><button>Eliminar</button></a></td>
	</tr>';
	
}
mysqli_close($conexion);
?>
</table>
<?php include "piedepaginaadmin.php"?>

