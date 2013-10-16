<?php require_once('restringir.php'); ?>
<h1>Alta de usuario</h1>
<!-- voy por POST para que no se vea la clave en la URL -->
<!-- voy por POST porque voy a adjuntar un archivo, necesito si o si POST -->
<!-- con el enctype multipart/form-data estoy habilitando la transferencia de archivos -->
<form id='alta-usuario' name='alta-usuario' method='post' enctype='multipart/form-data'>
	
	<p>Usuario: <input type='text' id='usuario' name='usuario' required placeholder='Nombre de usuario' /></p>
	<p>Nombre: <input onblur='if( !this.value ) addClass("error", this )' type='text' id='nombre' name='nombre' /></p>
	<p>Apellido: <input type='text' id='apellido' name='apellido' /></p>
	<p>DNI: <input type='text' id='dni' name='dni' required /></p>
	<p>Sector: <?php echo $sectores; ?></p>
	<p>
		Masculino <input type='radio' id='sexo-m' name='sexo' value='m' <?php echo $sexoM; ?> />
		Femenino <input type='radio' id='sexo-f' name='sexo' value='f' <?php echo $sexoF; ?> />
	</p>
	<p>Clave <input type='password' id='clave' name='clave' required /></p>
	<p>Clave2 <input type='password' id='clave2' name='clave2' required /></p>
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