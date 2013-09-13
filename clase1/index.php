<?php
	
	//en PHP la defini�n de las variables si est� fuera de funciones es global
	//PHP no es un lenguaje tipado, tiene "tipado m�gico"
	$titulo = 'Bienvenido';
	
	/* la funci�n include recibe un String como par�metro con la ubicaci�n del archivo */
	/* sino encuentro el recurso, include arroja un Warning */
	include('inc/encabezado.template.php');
	/* require arroja un FatalError si no encuentra el recurso */
	require('inc/index.template.php');
	/* 
		tanto include como require tienen una versi�n _once
		lo que hace esto es buscar al recurso si previamente no lo busc� nadie
		
		Winners use require_once
		a menos que tenga alguna necesidad de incluir varias veces algo
	*/
	include_once('inc/pie.template.php');
?>