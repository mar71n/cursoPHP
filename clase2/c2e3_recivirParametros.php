<?php
var_dump($_GET);

/* llamando
http://localhost/curso-PHP/clase2/c2e3_recivirParametros.php?id=4&nombre=pepe
regresa
array(2) { ["id"]=> string(1) "4" ["nombre"]=> string(4) "pepe" }
*/

?>
<p> Hola <?php echo $_GET["nombre"]; ?> ¿como estas?

<?php
// mejora de estilo:

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'invitado';
echo ("<p>Hola $nombre, ¿como estas? </p>");


?>

<a href='?nombre=hugo'>saludar a hugo</a>

<form action='' method='get'> <!-- todo lo que tenga name, el form lo manda
post va por los encabezados, get por la url.
si los parametros no tienen info sencible ni implican cambios fisicos en archivos o bases, conviene ir por get
asi se puede guardar la url a ese estado.
-->
	<input type='text' name='nombre' />
	<input type='number' name='edad' />
	<input type='password' name='clave' />
	<input type='submit'value='saludo uno.' />
</form>
