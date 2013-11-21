<?php
require_once('Cliente.class.php');

$pepe = new Cliente();
$pepe->nombre = 'Jose';
$pepe->dni = '12321321';
$pepe->cualquiera = 123;
$pepe->apellido='Loco';

echo "<p>Nombre: $pepe->nombre - Apellido: $pepe->apellido</p>";

var_dump(get_class($pepe));

var_dump(get_class_methods($pepe));
var_dump(get_class_vars(get_class($pepe)));


var_dump(get_defined_vars());

var_dump(get_class_methods(get_parent_class(get_class($pepe))));
var_dump(get_parent_class(get_class($pepe)));
?>