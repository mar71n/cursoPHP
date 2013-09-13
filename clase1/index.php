<?php
	
	//en PHP la definión de las variables si está fuera de funciones es global
	//PHP no es un lenguaje tipado, tiene "tipado mágico"
	$titulo = 'Bienvenido';
	
	/* la función include recibe un String como parámetro con la ubicación del archivo */
	/* sino encuentro el recurso, include arroja un Warning */
	include('inc/encabezado.template.php');
	/* require arroja un FatalError si no encuentra el recurso */
	require('inc/index.template.php');
	/* 
		tanto include como require tienen una versión _once
		lo que hace esto es buscar al recurso si previamente no lo buscó nadie
		
		Winners use require_once
		a menos que tenga alguna necesidad de incluir varias veces algo
	*/
	include_once('inc/pie.template.php');
?>