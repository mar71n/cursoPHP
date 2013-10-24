<?php
	$db_settings['ruta'] = 'localhost';
	$db_settings['usuario'] = 'root';
	$db_settings['clave'] = 'root';
	$db_settings['base'] = 'clasesphp';
	
	$cnx = mysqli_connect( $db_settings['ruta'], $db_settings['usuario'],$db_settings['clave'],$db_settings['base']);
							
	if( !$cnx ) die( 'Error de conexión' );
	
	function logError( $mensaje, $descripcion ){
		echo $mensaje;
		echo $descripcion;
		die( 'Chicos, ponganse las pilas, estaría bueno que incorporen el momento exacto en que sucede este log y usar el modo APPEND para que se sumen lineas en ese archivo' );
	}
	
	//de esta función espero o FALSE o un Array (en el caso del SELECT) o TRUE (en el caso de UPDATE, DELETE, INSERT)
	function ejecutarSQL( $sql ){
		global $cnx; //aviso que la variable $cnx viene de afuera		
		$res = mysqli_query( $cnx, $sql );
		if( !$res ){
			logError( mysqli_error($cnx), $sql );
			return false;
		}
		if( $res === true ) return $res; //INSERT, UPDATE o DELETE exitosos
		while( $fila = mysqli_fetch_assoc($res) ){
			$resultado[] = $fila;
		}
		return $resultado; //estoy devolviendo siempre una matriz
	}
	
	function getSectores(){
		$sql = '
		SELECT idsector as valor, nombre as texto 
		FROM sector
		ORDER BY nombre ASC
		';
		return ejecutarSQL($sql);
	}
?>