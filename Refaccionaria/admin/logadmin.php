<?php include "../php/config.php"?>
<?php

$contador = 0;
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");
if($_POST['user'] == 'admin')
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
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
	}
	else
	{
		echo '<script> alert ("Contrasena Incorrecta");</script>';
		echo '<meta http-equiv="refresh" content="0; url=../confirmaradmin.php">';
	}
}
else
{
	echo '<script> alert ("Usuario Incorrecto");</script>';
	echo '<meta http-equiv="refresh" content="0; url=../confirmaradmin.php">';
}

mysqli_close($conexion);

?>
