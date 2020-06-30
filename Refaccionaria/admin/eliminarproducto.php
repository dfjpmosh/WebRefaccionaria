<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "DELETE FROM productos WHERE idproducto=".$_GET['id'];
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
	window.location="gestionproductos.php";
</script>