<?php include "../php/config.php"?>
<?php

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);mysqli_set_charset($conexion, "utf8");
$peticion = "DELETE FROM imagenesproductos WHERE id=".$_GET['id'];
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script type="text/javascript">
    var idp = "<?php echo $_GET['idp']; ?>";
    window.location="agregarimagen.php?id="+idp;
</script>
