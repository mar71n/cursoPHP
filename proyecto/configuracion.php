<?php
	//apago los Notice porque me molestan, mucho
	error_reporting( E_ALL - E_NOTICE /* - E_WARNING */ );
	//define define una constante, el primer parametro es el nombre, el 2do el valor
	//noten que no uso el signo $
	//es una buena práctica utilizar mayúsculas para definir constantes
	//el beneficio de la constante es que me aseguro que nadie puede sobreescribirla o cambiarle el tipo de dato
	define('INICIALIZADO', true);
	//file_get_contents equivale a fopen() fread() y fclose()
	$datos = file_get_contents( 'config.ini' );
	$datos = trim( $datos, "\r\n" ); //elimino el enter del final
	$lineas = explode( "\r\n", $datos );
	foreach( $lineas as $llave=>$valor ){
		//$valor = explode( '=', $valor ); //esto no funciona, necesito pisarle el valor al indice del array
		$lineas[$llave] = explode( '=', $valor );
	}
    define('PRODUCCION', $lineas[0][1] == 'si');
   	define('RUTA_IMAGENES', $lineas[1][1] );
   	define('LUGAR', $lineas[2][1] );
   	define('RUTA_LOG', $lineas[3][1] );
?>