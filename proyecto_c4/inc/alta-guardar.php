<?php
	require_once('inc/db.php');
	
	function guardarDatos( $campos ){
		
		$imagen = $campos['imagen'];
		if( !empty( $imagen ) ){
			if( !file_exists( RUTA_IMAGENES ) ) mkdir( RUTA_IMAGENES );
			$ext = pathinfo( $imagen['name'], PATHINFO_EXTENSION );
			$nuevoNombre = $campos['usuario'];
			$nuevoNombre .= ".$ext";
			move_uploaded_file( $imagen['tmp_name'], RUTA_IMAGENES.'/'.$nuevoNombre );
		}
		if( $campos['sexo'] == 'm' ) $campos['sexo'] = 1;
		else $campos['sexo'] = 2;
		
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
		ejecutarSQL( $sql );
	}
?>