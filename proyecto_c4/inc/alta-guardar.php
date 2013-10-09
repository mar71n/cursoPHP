<?php
	function guardarDatos( $campos ){
		
		$imagen = $campos['imagen'];
		if( !empty( $imagen ) ){
			if( !file_exists( RUTA_IMAGENES ) ) mkdir( RUTA_IMAGENES );
			$ext = pathinfo( $imagen['name'], PATHINFO_EXTENSION );
			$nuevoNombre = $campos['usuario'];
			$nuevoNombre .= ".$ext";
			move_uploaded_file( $imagen['tmp_name'], RUTA_IMAGENES.'/'.$nuevoNombre );
		}
		
		$sql = "
			INSERT INTO usuario
			( usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , nacimiento, fecha_alta )
			VALUES
			(
			 '$campos[usuario]',
			 '$campos[apellido]',
			 '$campos[clave]',
			 '$campos[dni]',
			 $campos[sector],
			 $campos[sexo],
			 '',
			 '$campos[nacimiento]',
			 now()			 
			)
		";
		
		die( $sql );
	}
?>