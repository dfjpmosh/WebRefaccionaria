<?php include "cabeceraadmin.php"?>
<?php include "../php/config.php"?>
<div style="height:90px;">
	<form action="productopornombre.php" method="post">
		<input type="text" name="nombre" style="text-align:center;" placeholder="Por Palabra">
		<input type="submit" value="Buscar">
	</form>
	<form action="productoporestado.php" method="post">
		<select name="estado" style="text-align:center;" placeholder="Por Estado">
			<option value="1">Activado</option>
			<option value="0">Desactivado</option>
		</select>
		<input type="submit" value="Buscar">
	</form>
	<form action="productoporcategoria.php" method="post">
		<input type="text" name="categoria" style="text-align:center;" placeholder="Por Categoria">
		<input type="submit" value="Buscar">
	</form>
</div>
<table border="1">
	<tr style="background:#A7AEAE; color:black; text-align:center;"><td>Producto</td><td>Descripcion</td><td>Precio</td><td>Existencia</td><td>Categoria</td><td>Estado</td><td colspan="3"></td></tr>
	<tr style="background:#016EC2; text-align:center;">
		<form action="nuevoproducto.php" method="POST">
			<td><input size="25" type="text" name="nombre" placeholder="nombre del producto"></td>			
			<td><input size="30" type="text" name="descripcion" placeholder="descripcion del producto"></td>			
			<td><input size="7" style="text-align:right;" type="text" name="precio" placeholder="precio"></td>			
			<td><input size="8" style="text-align:right;" type="text" name="existencias" placeholder="exicestencia"></td>			
			<td><input size="10" style="text-align:right;" type="text" name="categoria" placeholder="categoria"></td>			
			<td><select name="estado" style="text-align:center;" placeholder="Por Estado">
					<option value="1">Activado</option>
					<option value="0">Desactivado</option>
				</select>
			</td>			
			<td colspan="3"><input type="submit" value="Agregar"></td>
		</form>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>	
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM productos WHERE nombre LIKE '%".$_POST['nombre']."%' GROUP BY nombre";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado))
{
	echo '<tr>';
	echo '
		<form action="actualizarproducto.php?id='.$fila['idproducto'].'" method="POST">
		<td><input size="25" type="text" name="nombre" value="'.$fila['nombre'].'"></td>
		<td><input size="30" type="text" name="descripcion" value="'.$fila['descripcion'].'"></td>
		<td><input size="7" style="text-align:right;" type="text" name="precio" value="'.$fila['precio'].'"></td>
		<td><input size="8" style="text-align:right;" type="text" name="existencias" value="'.$fila['existencias'].'"></td>
		<td><input size="10" style="text-align:right;" type="text" name="categoria" value="'.$fila['categoria'].'"></td>';
	if($fila['activado'] == 0)
	{
		echo '<td><select name="estado" style="text-align:center;">
					<option value="1" >Activado</option>
					<option value="0" selected>Desactivado</option>
			      </select>
			  </td>';
	}
	else
	{
		echo '<td><select name="estado" style="text-align:center;">
					<option value="1" selected>Activado</option>
					<option value="0">Desactivado</option>
			      </select>
			  </td>';
	}
	echo '
		<td><input type="submit" value="Actualizar"></td>
	</form>
	<td><a href="eliminarproducto.php?id='.$fila['idproducto'].'"><button>Eliminar</button></a></td>
	<td><a href="agregarimagen.php?id='.$fila['idproducto'].'"><button>Imagenes</button></a></td>
	</tr>';
	
}
mysqli_close($conexion);
?>
</table>
<?php include "piedepaginaadmin.php"?>
