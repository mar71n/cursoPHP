<?php
	
	/**
		@param	Array $_POST
		@return Array de errores
	**/
	function validarDatos( $campos ){
		$errores = array();
		
		//strtolower() pasa un String a minúsculas (lowercase)
		//preg_match() me permite evaluar un String con una expresión regular
		//http://net.tutsplus.com/tutorials/other/8-regular-expressions-you-should-know/
		$patron = '/^[a-z0-9_-]{6,16}$/';
		$usuarioLower = strtolower($campos['usuario']);
		if( !preg_match( $patron, $usuarioLower ) ){
			$errores['usuario'] = 'Debe completar usuario con al menos 6 caracteres';
		}
		
		if( empty( $campos['dni'] ) ){
			$errores['dni'] = 'El DNI debe fruta';
		}
		
		//investiguen la función filter_var que tiene PHP para el EMAIL
		if( !filter_var( $campos['email'], FILTER_VALIDATE_EMAIL ) ){
			$errores['email'] = 'El email no es válido';
		}
		
		$patron = '/^[a-zA-Z0-9_-]{6,16}$/';
		if( !preg_match( $patron, $campos['clave'] ) ){
			$errores['clave'] = 'La contraseña debe ser alfanumérica de 6 a 16 caracteres';
		} else if ( $campos['clave'] != $campos['clave2'] ){
			$errores['clave2'] = 'Las contraseñas deben coincidir';
		}
		
		if( !empty( $campos['imagen'] ) ){
			//esta validación no es obligatoria, sólo se hace si hay valor adentro del campo imagen
			$imagen = $campos['imagen'];
			
			$max_size = 1 * 1024 * 1024; //1MB
			$check_size = $imagen['size'] <= $max_size;
			$type_match = '/^image\//';
			$check_type = preg_match( $type_match, $imagen['type'] );
			if( !$check_size || !$check_type ){
				$errores['imagen'] = 'El archivo debe ser una imagen inferior a '.($max_size/1024/1024).'mb';
			}
		}
		
		if( empty( $campos['acepto'] ) ){
			$errores['acepto'] = 'Debe aceptar los términos y condiciones';
		}
		
		return $errores;
	}
	
?>	