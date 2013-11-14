<?php
	$db_settings['ruta'] = 'localhost';
	$db_settings['usuario'] = 'root';
	$db_settings['clave'] = '';
	$db_settings['base'] = 'clasesphp';
	
	$cnx = mysqli_connect( $db_settings['ruta'], $db_settings['usuario'],$db_settings['clave'],$db_settings['base']);
							
	if( !$cnx ) die( 'Error de conexión' );
	
	require_once( 'inc/funciones.php' );
	
	function logError( $mensaje, $descripcion ){
		$log[] = date('d/m/Y h:i:s');
		$log[] = "Error: $mensaje";
		$log[] = "SQL: $descripcion";
		$log[] = "-----\r\n";
		$log = implode( "\r\n", $log );
		file_put_contents( RUTA_LOG, $log, FILE_APPEND );
	}
	
	//de esta función espero o FALSE o un Array (en el caso del SELECT) o TRUE (en el caso de UPDATE, DELETE, INSERT)
	function ejecutarSQL( $sql, $first=false ){
		global $cnx; //aviso que la variable $cnx viene de afuera		
		$res = mysqli_query( $cnx, $sql );
		if( !$res ){
			logError( mysqli_error($cnx), $sql );
			return false;
		}
		if( $res === true ) return $res; //INSERT, UPDATE o DELETE exitosos
		
		if( $first ) return mysqli_fetch_assoc($res);
		
		$resultado = array(); //inicializo el array para devolver siempre un Array, de otra forma un SELECT que no devuelve registros haría que esta función retorne NULL
		while( $fila = mysqli_fetch_assoc($res) ){
			$resultado[] = $fila;
		}
		return $resultado; //estoy devolviendo siempre una matriz
	}
	function ejecutarSimpleSQL($sql){
		return ejecutarSQL( $sql, true );
	}
	//esto filtra valores puros, arrays y matrices
	function filtrarCampos( $campos ){
		global $cnx;
		if( !is_array($campos) ) return mysqli_real_escape_string( $cnx, $campos );
		foreach( $campos as $key=>$value ){
			//hago un llamado recursivo, ahora puedo presumir en los pasillos, "yo uso funciones recursivas, ¿viste?"
			$copia[ $key ] = filtrarCampos( $value );
		}
		return $copia;
	}
	
	function getSectores(){
		$sql = '
		SELECT idsector as valor, nombre as texto 
		FROM sector
		ORDER BY nombre ASC
		';
		return ejecutarSQL($sql);
	}
	
	function getUsuarioByID( $id ){
		$id = (int) $id;
		$sql = "
		SELECT idusuario, usuario, nombre, apellido, dni, idsector as sector, fecha_nac as nacimiento, sexo, email
		FROM usuario
		WHERE activo 
		AND idusuario = $id
		";
		return ejecutarSimpleSQL( $sql );
	}
	
	function getUsuario( $u, $c ){
		$u = filtrarCampos( $u );
		$c = filtrarCampos( $c );
		$sql = "
		SELECT idusuario, usuario, nombre, apellido
		FROM usuario
		WHERE activo 
		AND usuario = '$u' AND clave = '$c'
		";
		return ejecutarSimpleSQL( $sql );
	}
	
	function getUsuarios( $opciones=null ){
		
		$pagina = 1;
		if( $opciones && $opciones['pagina'] ) $pagina = $opciones['pagina'];
		
		$registros = 10;
		if( $opciones && $opciones['registros'] ) $registros = $opciones['registros'];
		
		$where = '';
		if( $opciones && $opciones['busqueda'] ){
			$b = filtrarCampos( $opciones['busqueda'] );
			
			$where = "
			AND ( u.usuario LIKE '%$b%' OR u.nombre LIKE '%$b%' )
			";
		}
		
		$orderCampo = filtrarCampos( $opciones['orderby'] );
		$orderType = filtrarCampos( $opciones['ordertype'] );
		$orderBy = "ORDER BY $orderCampo $orderType";
				
		$sql = "
		SELECT 
			count(idusuario) as total, 
			ceil( count(idusuario) / $registros ) as paginas
		FROM usuario as u
		WHERE activo
		$where
		";
		$paginado = ejecutarSimpleSQL($sql);
		
		$pagina = limitar( $pagina, 1, $paginado['paginas'] );
		$inicio = ($pagina-1) * $registros;
		
		$sql = "
		SELECT u.idusuario, u.usuario, u.nombre, u.apellido, u.dni, u.sexo, s.nombre as sector, u.email,
		(YEAR( CURRENT_DATE ) - YEAR( fecha_nac )) - ( DATE_FORMAT(CURDATE(),'%m-%d') < DATE_FORMAT(fecha_nac,'%m-%d') ) as edad
		FROM usuario as u INNER JOIN sector as s ON u.idsector = s.idsector
		WHERE activo 
		$where
		$orderBy
		LIMIT $inicio, $registros";
		$usuarios = ejecutarSQL($sql);
		
		$resultado['datos'] = $usuarios;
		$resultado['paginado'] = $paginado;
		return $resultado;
	}
	
	function existeUsuario( $usuario ){
		$sql = "
		SELECT idusuario
		FROM usuario
		WHERE usuario = '$usuario'
		";
		$res = ejecutarSQL($sql);
		return count($res) > 0;
	}
	
	function usuarioGuardar($campos_sin_filtrar){
		$campos = filtrarCampos( $campos_sin_filtrar );
		$sql = "
			INSERT INTO usuario
			( usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , fecha_alta, fecha_nac, email )
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
			now(),
			 '$campos[nacimiento]',
			 '$campos[email]'
			)
		";
		
		return ejecutarSQL( $sql );
	}
	
	function usuarioDesactivar( $id ){
		$id = (int) $id;
		$sql = "
		UPDATE usuario 
		SET activo = false 
		WHERE idusuario = $id
		";
		return ejecutarSQL( $sql );
	}
?>