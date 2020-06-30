<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE clientes SET user='".$_POST['user']."',pass='".$_POST['pass']."',nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos'].
"',telefono='".$_POST['telefono']."',correo='".$_POST['correo'].
"',dircalle='".$_POST['dircalle']."',dirnum='".$_POST['dirnum']."',dircol='".$_POST['dircol'].
"' WHERE idcliente=".$_GET['id'];

$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
	window.location="gestionclientes.php";
</script>