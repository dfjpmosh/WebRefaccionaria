<?php include "config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM detallepedido,pedidos WHERE detallepedido.idpedido=pedidos.idpedido AND detallepedido.idpedido=".$_GET['id']." AND pedidos.estado = 0";
$resultado = mysqli_query($conexion, $peticion);			
while($fila = mysqli_fetch_array($resultado))
{
	$idproducto = $fila['idproducto'];
	$cantidad = $fila['cantidad'];
	
	$peticion2 = "SELECT * FROM productos WHERE idproducto = ".$idproducto;
	$resultado2 = mysqli_query($conexion, $peticion2);			
	while($fila2 = mysqli_fetch_array($resultado2))
	{
		$existencias = $fila2['existencias'];
		
		$peticion3 = "UPDATE productos SET existencias = ".($existencias + $cantidad)." WHERE idproducto = ".$idproducto;
		$resultado3 = mysqli_query($conexion, $peticion3);			
	}
	
	echo $idproducto.' '.$existencias.' '.$cantidad.'<br>';
}

$peticion = "UPDATE pedidos SET estado = 2 WHERE idpedido =".$_GET['id']." AND estado = 0";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);

?>

<script>
	window.location = "../admin/gestionpedidos.php";
</script>


