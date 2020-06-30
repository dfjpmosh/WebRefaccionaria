<?php include "php/cabecera.php"?>
<br>
¿Ya eres usuario?<br>
<form action="php/logcliente.php" method="post">
	<input type="text" name="user" placeholder="Usuario">
	<input type="text" name="pass" placeholder="Contraseña">
	<input type="submit" value="Confirmar">
</form>
<br><br><br>
¿Eres nuevo usuario?<br>
<form action="registrarse.php" method="POST">
	<input size="30" type="text" name="user" placeholder="usuario"><br>
	<input size="30" type="text" name="pass" placeholder="contraseña"><br>
	<input size="30" type="text" name="confpass" placeholder="confirmar contraseña"><br>
	<input size="30" type="text" name="nombre" placeholder="nombre"><br>
	<input size="30" type="text" name="apellidos" placeholder="apellidos"><br>
	<input size="30" type="text" name="telefono" placeholder="telefono"><br>
	<input size="30" type="text" name="correo" placeholder="correo"><br>
	<input size="30" type="text" name="confcorreo" placeholder="confirmar correo"><br>
	<input size="30" type="text" name="dircalle" placeholder="calle"><br>
	<input size="30" type="text" name="dirnum" placeholder="numero"><br>					
	<input size="30" type="text" name="dircol" placeholder="colonia"><br>
	<input type="submit" value="Registrarse">
</form>

<?php include "php/piedepagina.php"?>