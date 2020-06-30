<?php include "cabeceraadmin.php"?>
<?php include "../php/config.php"?>
<div style="height:60px;">
	<form action="clienteporusuario.php" method="post">
		<input type="text" name="usuario" style="text-align:center;" placeholder="Por Usuario">
		<input type="submit" value="Buscar">
	</form>
	<form action="clientepornombre.php" method="post">
		<input type="text" name="nombre" style="text-align:center;" placeholder="Por Nombre">
		<input type="submit" value="Buscar">
	</form>
</div>

<table border="1">
	<tr style="background:#A7AEAE; color:black; text-align:center;"><td>Usuario</td><td>Contraseña</td><td>Nombre</td><td>Telefono</td><td>Correo</td><td>Direccion</td><td colspan="2"></td></tr>
	<tr style="background:#016EC2; text-align:center;">
		<form action="nuevocliente.php" method="POST">
			<td><input size="10" type="text" name="user" placeholder="usuario"></td>			
			<td><input size="15" type="text" name="pass" placeholder="contraseña"></td>			
			<td><input size="22" type="text" name="nombre" placeholder="nombre">
			<input size="22" type="text" name="apellidos" placeholder="apellidos"></td>						
			<td><input size="10" type="text" name="telefono" placeholder="telefono"></td>			
			<td><input type="text" name="correo" placeholder="correo"></td>			
			<td><input size="30" type="text" name="dircalle" placeholder="calle">
			<input size="30" type="text" name="dirnum" placeholder="numero">						
			<input size="30" type="text" name="dircol" placeholder="colonia"></td>						
			<td colspan="2"><input type="submit" value="Agregar"></td>
		</form>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM clientes WHERE user<>'admin'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado))
{
	echo '<tr>';
	echo '
		<form action="actualizarcliente.php?id='.$fila['idcliente'].'" method="POST">
		<td><input size="10" type="text" name="user" value="'.$fila['user'].'"></td>
		<td><input size="15" type="text" name="pass" value="'.$fila['pass'].'"></td>
		<td><input size="22"type="text" name="nombre" value="'.$fila['nombre'].'">
		<input size="22" type="text" name="apellidos" value="'.$fila['apellidos'].'"></td>
		<td><input size="10" type="text" name="telefono" value="'.$fila['telefono'].'"></td>
		<td><input type="text" name="correo" value="'.$fila['correo'].'"></td>
		<td><input size="30" type="text" name="dircalle" value="'.$fila['dircalle'].'">
		<input size="30" type="text" name="dirnum" value="'.$fila['dirnum'].'">
		<input size="30" type="text" name="dircol" value="'.$fila['dircol'].'"></td>
		<td><input type="submit" value="Actualizar"></td>
	</form>
	<td><a href="eliminarcliente.php?id='.$fila['idcliente'].'"><button>Eliminar</button></a></td>
		
	</tr>';
	
}
mysqli_close($conexion);
?>
</table>
<?php include "piedepaginaadmin.php"?>
