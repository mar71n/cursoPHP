<?php
$listado['lunes']='a';
$listado['martes']='b';
$listado['miercoles']='c';
$listado['jueves']='d';

extract($listado);

var_dump($lunes, $martes);

foreach (get_defined_vars() as $a => $b ){
	echo $a."<br>";
}

?>