<?php include "cabeceraadmin.php"?>
<?php include "../php/config.php"?>

<link rel="stylesheet" type="text/css" href="csscalendario/calendario.css">
<script type="text/javascript" src="jscalendario/calendario.js"></script>
<script type="text/javascript">
	$(function(){
		$("#fecha1").datepicker();			
		$("#fecha2").datepicker();			
	})
</script>

<div style="height:80px;">
	<form action="pedidoporcliente.php" method="post">
		<input type="text" name="nombre" style="text-align:center;" placeholder="Por Cliente">
		<input type="submit" value="Buscar">
	</form>
	<form action="pedidoporestado.php" method="post">
		<td><select name="estado" style="text-align:center;" placeholder="Por Estado">
				<option value="0">En Proceso</option>
				<option value="1">Servido</option>
				<option value="2">Cancelado</option>
			</select>
		</td>			
		<input type="submit" value="Buscar">
	</form>
	<form action="pedidoporfecha.php" method="post">
		<label>Fecha Inicial:</label>
		<input type="text" name="fechainicial" id="fecha1" value="10/14/2015">
		<label>Fecha Final:</label>
		<input type="text" name="fechafinal" id="fecha2" value="10/14/2015">
		<input type="submit" value="Buscar">
	</form>
</div>

<table border="1">
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM pedidos, clientes WHERE pedidos.idcliente=clientes.idcliente AND (nombre LIKE '%".
$_POST['nombre']."%' OR clientes.apellidos LIKE '%".$_POST['nombre']."%') ORDER BY estado, fecha ASC";
$resultado = mysqli_query($conexion, $peticion);
echo '<tr style="background:#A7AEAE; color:black; text-align:center;"><td>Cliente</td><td>Fecha</td><td>Estado</td><td colspan="3"></td></tr>';
while($fila = mysqli_fetch_array($resultado))
{
	switch($fila['estado'])
	{
		case 0: $estado = "En Proceso"; break;
		case 1: $estado = "Servido"; break;
		case 2: $estado = "Cancelado"; break;
	}
	
	echo '<tr text-align:center;"';
	switch($fila['estado'])
	{
		case 0: echo ' style="background: black;"'; break;
		case 1: echo ' style="background: green"'; break;
		case 2: echo ' style="background: red"'; break;
	}
	
	echo '>
		<td width="300px">'.$fila['nombre'].' '.$fila['apellidos'].'</td>
		<td width="200px">'.date("d/m/y H:i:s",$fila['fecha']).'</td>
		<td width="100px">'.$estado.'</td>
		<td><a href="gpedido.php?id='.$fila['idpedido'].'"><button>Ver Detalle</button></a></td>
		<td><a href="../php/pedidoservido.php?id='.$fila['idpedido'].'"><button>Pedido Servido</button></a></td>
		<td><a href="../php/cancelarpedido.php?id='.$fila['idpedido'].'"><button>Cancelar</button></a></td>
	</tr>';
	
}
mysqli_close($conexion);

?>
</table>
<?php include "piedepaginaadmin.php"?>