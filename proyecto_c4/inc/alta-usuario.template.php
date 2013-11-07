<?php require_once('restringir.php'); ?>
<h1>Alta de usuario</h1>
<!-- voy por POST para que no se vea la clave en la URL -->
<!-- voy por POST porque voy a adjuntar un archivo, necesito si o si POST -->
<!-- con el enctype multipart/form-data estoy habilitando la transferencia de archivos -->
<form id='alta_usuario' name='alta_usuario' method='post' enctype='multipart/form-data'>
	
	<p>Usuario: <input type='text' id='usuario' name='usuario' required placeholder='Nombre de usuario' value='<?php echo $usuario; ?>' /></p>
	<p>Nombre: <input onkeyup='validarVacio(this)' onblur='validarVacio(this)' type='text' id='nombre' name='nombre' value='<?php echo $nombre; ?>'/></p>
	<p>Apellido: <input onblur='validarVacio(this)' type='text' id='apellido' name='apellido' value='<?php echo $apellido; ?>'/></p>
	<p>DNI: <input onblur='validarVacio(this)' type='text' id='dni' name='dni' required value='<?php echo $dni; ?>'/></p>
	<p>Sector: <?php echo $sectores; ?></p>
	<p>
		Masculino <input type='radio' id='sexo-m' name='sexo' value='m' <?php echo $sexoM; ?> />
		Femenino <input type='radio' id='sexo-f' name='sexo' value='f' <?php echo $sexoF; ?> />
	</p>
	<p>Clave <input onblur='validarVacio(this)' type='password' id='clave' name='clave' required /></p>
	<p>Clave2 <input onkeyup='mismoValor(this, "clave")' onblur='mismoValor(this, "clave")' type='password' id='clave2' name='clave2' required /></p>
	<p>Email <input type='email' id='email' name='email' /></p>
	<p>Nacimiento <input type='date' id='nacimiento' name='nacimiento' /></p>
	<p>Foto <input type='file' id='imagen' name='imagen' accept='image/*' /></p>
	<p><input type='checkbox' id='acepto' name='acepto' required /> Acepto términos</p>
	<p><input type='submit' name='alta-usuario' value='Alta de usuario' /></p>
	
	<p class='error'>
		<?php echo $errores; ?>
	</p>
	<script>
		<?php echo $scriptErrores; ?>
	</script>
	
</form>