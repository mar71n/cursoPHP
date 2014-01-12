<?php
	require_once('inc/db.php');
	
	function guardarDatos( $campos ){
		
		$imagen = $campos['imagen'];
		if( !empty( $imagen ) && $imagen['error'] != 4 ){
			if( !file_exists( RUTA_IMAGENES ) ) mkdir( RUTA_IMAGENES );
			$ext = pathinfo( $imagen['name'], PATHINFO_EXTENSION );
			$nuevoNombre = $campos['usuario'];
			$nuevoNombre .= ".$ext";
			move_uploaded_file( $imagen['tmp_name'], RUTA_IMAGENES.'/'.$nuevoNombre );
			$campos['imagen_ruta'] = $nuevoNombre;
		}
		if( $campos['sexo'] == 'm' ) $campos['sexo'] = 1;
		else $campos['sexo'] = 2;
		
		if( $campos['alta-usuario'] ) return usuarioGuardar($campos);
		if( $campos['editar-usuario'] ) return usuarioActualizar($campos);
	}
?>