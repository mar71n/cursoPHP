<?php
	$db_settings['ruta'] = 'localhost';
	$db_settings['usuario'] = 'root';
	$db_settings['clave'] = 'root';
	$db_settings['base'] = 'clasesphp';
	
	$cnx = mysqli_connect( $db_settings['ruta'], $db_settings['usuario'],$db_settings['clave'],$db_settings['base']);
							
	if( !$cnx ) die( 'Error de conexión' );
	
	function logError( $mensaje, $descripcion ){
		$log[] = date('d/m/Y h:i:s');
		$log[] = "Error: $mensaje";
		$log[] = "SQL: $descripcion";
		$log[] = "-----\r\n";
		$log = implode( "\r\n", $log );
		file_put_contents( RUTA_LOG, $log, FILE_APPEND );
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
		$resultado = array(); //inicializo el array para devolver siempre un Array, de otra forma un SELECT que no devuelve registros haría que esta función retorne NULL
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
	
	function getUsuarios(){
		$sql = 'SELECT * FROM usuario';
		return ejecutarSQL($sql);
	}
	
	function usuarioGuardar($campos){
		$sql = "
			INSERT INTO usuario
			( usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , fecha_alta )
			VALUES
			(
			 '$campos[usuario]',
			 '$campos[nombre]',
			 '$campos[apellido]',
			 '$campos[clave]',
			 '$campos[dni]',
			 $campos[sector],
			 '$campos[sexo]',
			 '',
			now()			 
			)
		";
		return ejecutarSQL( $sql );
	}
?>