<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "INSERT INTO imagenesproductos VALUES(NULL, ".
$_GET['id'].",'".
$_FILES['archivo']['name']."','','')";
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
    var id = "<?php echo $_GET['id']; ?>";
    window.location="agregarimagen.php?id="+id;
</script>



