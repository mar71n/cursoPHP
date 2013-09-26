<?php
echo '<pre>';
var_dump($_GET);
echo '</pre>';
?>
<html>
<head>
	<title>Prueba de formulario</title>
</head>
<body>

<form>
<input type="text" name='n'> <br />
<input type="password" name='p'> <br />

<input type="checkbox" name='c'> <br />
<input type="radio" name='sexo' value='m'>
<input type="radio" name='sexo' value='f'>
<input type="radio" name='sexo' value='n'> <br />
<select name='pais'>
	<optgroup label="Limitrofe">
		<option value='arg'>Argentina</option>
		<option value='bra'>Brasil</option>
		<option value='bol'>Bolivia</option>
		<option value='chi'>Chile</option>
		<option value='uru'>Uruguay</option>
		<option value='par'>Paraguay</option>
	</optgroup>
	<optgroup label="Resto America">
		<option value='per'>Peru</option>
		<option value='col'>Colombia</option>
		<option value='ven'>Venezuela</option>
	</optgroup>
</select><br />

<p> Intereses </p>
<input type="checkbox" name='i[]' value='1'>a <br />
<input type="checkbox" name='i[]' value='2'>b <br />
<input type="checkbox" name='i[]' value='3'>c <br />
<input type="checkbox" name='i[]' value='4'>d <br />

<input type="submit" value="enviar">
<input type="reset" value="limpiar">
</form>
</body>
</html>