<?php include "config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE pedidos SET estado = 1 WHERE idpedido =".$_GET['id']." AND estado = 0";
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);

?>

<script>
	window.location = "../admin/gestionpedidos.php";
</script>

