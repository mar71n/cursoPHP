<?php
// clase en camelcase empiesa con mayuscula
class Auto{
	// defino propiedades
	// camel case empiesa por minuscula
	public $color;
	public $peso;
	public $puertas;
	public $velocidadMaxima;
}

$mi_auto = new Auto();
$mi_auto->color = 'rojo';
$mi_auto->peso = 1500;
$mi_auto->puertas = 5;

$otro = new Auto();
var_dump(get_defined_vars());

var_dump($mi_auto, $otro);

$otro = $mi_auto;
var_dump($mi_auto, $otro);
$otro = 5;
var_dump($mi_auto, $otro);
var_dump(get_defined_vars());

var_dump(get_class($mi_auto	));

?>