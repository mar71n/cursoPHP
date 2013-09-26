<?php
echo '<pre>';
var_dump($_GET);
echo '</pre>';

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

<form name="input" action='' method="get" autocomplete='on'>
    First name: <input type="text" name="firstname"><br>
    Last name: <input type="text" name="lastname" datalist='browsers'><br>

    Password: <input type="password" name="pwd"><br>

    <input type="radio" name="sex" value="male">Male<br>
    <input type="radio" name="sex" value="female">Female<br>

    <input type="checkbox" name="vehicle[]" value="Bike">I have a bike<br>
    <input type="checkbox" name="vehicle[]" value="Car">I have a car<br>
    
    <hr>
    
    <textarea rows="4" cols="50" name='comentario'>
    At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
    </textarea><br>
    
    <input list="browsers" name='browsers'>
    <datalist id="browsers">
      <option value="Internet Explorer">
      <option value="Firefox">
      <option value="Chrome">
      <option value="Opera">
      <option value="Safari">
    </datalist>

    <input type="submit" value="Mandar"> 
</form>