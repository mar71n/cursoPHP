<?php
	//apago los Notice porque me molestan, mucho
	error_reporting( E_ALL - E_NOTICE /* - E_WARNING */ );
	//define define una constante, el primer parametro es el nombre, el 2do el valor
	//noten que no uso el signo $
	//es una buena práctica utilizar mayúsculas para definir constantes
	//el beneficio de la constante es que me aseguro que nadie puede sobreescribirla o cambiarle el tipo de dato
	define('INICIALIZADO', true);
    define('PRODUCCION', false);

?>