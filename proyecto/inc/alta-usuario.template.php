<?php
require_once('restricciones.php');
// echo '<pre>';
// var_dump($_GET);
// echo '</pre>';
?>
<h1><?php echo $titulo; ?></h1>
<!-- Voy por post para no mostrar la clave en el url, pero tambien porque voy a mandar archivos (la foto)
con enctype='multipart/form-data' habilito la transferencia de archivos
-->
<form method='post' id='alta-usuario' name='alta-usuario' enctype='multipart/form-data' action='alta-usuario.php' >
<input type='hidden' name='alta-usuario' id='alta-usuario' value='Alta usuario'/>
	<p>Usuario          <input type='text' name='usuario' id='usuario'  placeholder='nombre de usuario' value='<?php echo $usuario; ?>' /> </p>
	<p>Nombre           <input type='text' name='nombre' id='nombre' value='<?php echo $nombre; ?>' /> </p>
	<p>Apellido         <input type='text' name='apellido' id='apellido' value='<?php echo $apellido; ?>' /> </p>
	<p>DNI              <input type='text' name='dni' id='dni' value='<?php echo $dni; ?>' /> </p>
	<p>Sector (select)  <?php echo $sectores;?> </p>
	<fieldset>
	<legend>Sexo	</legend>
		Masculino       <input type='radio' name='sexo' id='sexo-m' value='m' <?php echo $sexoM;?> />
		Femenino        <input type='radio' name='sexo' id='sexo-f' value='f' <?php echo $sexoF;?> />
	</fieldset>
	<p>Clave            <input type='password' id='clave1' name='clave' value='<?php echo $clave; ?>' /> </p>
	<p>Clave2           <input type='password' id='clave2' name='clave2' value='<?php echo $clave2; ?>' /> </p>
	<p>Email            <input type='text' name='email' id='email' value='<?php echo $email; ?>' /> </p>
	<p>Nacimiento       <input type='date' name='nacimiento' id='nacimiento' value='<?php echo $nacimiento; ?>'/> </p>
	<p>Foto             <input type='file' name='imagen' id='foto' accept='image/*' value='<?php echo $imagen; ?>'/> </p>
	<p>  <input type='checkbox' name='acepto' value='<?php echo $acepto; ?>' /> Acepto t�rminos</p>
	<p>  <input type='submit' value='Alta' /></p>
	
	<p class='error'>
		<?php 
        if (!empty($errores)){
            foreach ($errores as $campo=>$valor){
                echo "<p> $campo : $valor </p>";
            }
        }
        ?>
	</p>
	
</form>
