<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "INSERT INTO clientes VALUES(NULL, '".$_POST['user']."','".$_POST['pass']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['telefono']."','".$_POST['correo']."','".$_POST['dircalle']."','".$_POST['dirnum']."','".$_POST['dircol']."')";
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
	window.location="index.php";
</script>