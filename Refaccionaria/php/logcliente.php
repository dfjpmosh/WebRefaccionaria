<?php include "config.php"?>
<?php

session_start();

$contador = 0;
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
if($_POST['user'] != 'admin')
{
	$peticion = "SELECT * FROM clientes WHERE user = '".$_POST['user']."' AND pass ='".$_POST['pass']."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado))
	{
		$contador++;	
		$_SESSION['usuario'] = $fila['idcliente'];
	}
	
	if($contador > 0)
	{
		$peticion = "INSERT INTO pedidos VALUES(NULL,".$_SESSION['usuario'].",'".date("Y/m/d H:i:s")."','0')";
		$resultado = mysqli_query($conexion, $peticion);
		
		$peticion = "SELECT * FROM pedidos WHERE idcliente = '".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado))
		{
			$_SESSION['idpedido'] = $fila['idpedido'];
		}
		
		
		for($i = 0; $i < $_SESSION['contador'];$i++)
		{
			$peticion = "INSERT INTO detallepedido VALUES (NULL, ".$_SESSION['idpedido'].",".$_SESSION['producto'][$i].",1)";
			$resultado = mysqli_query($conexion, $peticion);			
			
			$peticion = "SELECT * FROM productos WHERE idproducto = ".$_SESSION['producto'][$i];
			$resultado = mysqli_query($conexion, $peticion);			
			while($fila = mysqli_fetch_array($resultado))
			{
				$existencias = $fila['existencias'];
				
				$peticion2 = "UPDATE productos SET existencias = ".($existencias-1)." WHERE idproducto = ".$_SESSION['producto'][$i];
				$resultado2 = mysqli_query($conexion, $peticion2);			
			}

		}
			
		
		echo '<script> alert ("Tu Pedido se ha realizado satisfactoriamente...");</script>';
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; url=../index.php">';
		
	

	}
	else
	{
		echo '<script> alert ("Usuario y/o Contrasena Incorrecto");</script>';
		echo '<meta http-equiv="refresh" content="0; url=../index.php">';
	}
}
else
{
	echo "El usuario es administrador";
}

mysqli_close($conexion);

?>
