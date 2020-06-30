<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "INSERT INTO productos VALUES(NULL, '".
$_POST['nombre']."','".
$_POST['descripcion']."','".
$_POST['precio']."','".
$_POST['existencias']."','".
$_POST['categoria']."','','','".
$_POST['estado']."')";
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
//	window.location="gestionproductos.php";
</script>