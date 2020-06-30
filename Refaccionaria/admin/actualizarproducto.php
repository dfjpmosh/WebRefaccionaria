<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE productos SET nombre='".$_POST['nombre'].
"',descripcion='".$_POST['descripcion'].
"',precio=".$_POST['precio'].
",existencias=".$_POST['existencias'].
",categoria='".$_POST['categoria'].
"',activado=".$_POST['estado'].
" WHERE idproducto=".$_GET['id'];

$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
	window.location="gestionproductos.php";
</script>