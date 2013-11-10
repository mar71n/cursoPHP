<?php 
	function validarDatos($campos){ // ahora resive solo $campos porque $imagenes va inyectado
		$errores = array();
		// uso empty() en lugar de isset() porque POST siempre manda los valores
		if (empty($campos['usuario']) || strlen($campos['usuario']) < 6 ){
			$errores['usuario'] = 'Debe completar usuario con al menos 6 caracteres';
		}
		if (empty($campos['dni'] )){
			$errores['dni'] = 'Debe completar dni';
		}
        
        if (!filter_var($campos['email'],FILTER_VALIDATE_EMAIL)){
            $errores['email'] = 'seguro que eso es un email???';
        }

		$patron = '/^[a-zA-Z0-9_-]{6,16}$/';
		if( !preg_match( $patron, $campos['clave'] ) ){
			$errores['clave'] = 'La contraseña debe ser alfanumérica de 6 a 16 caracteres';
		} else if ( $campos['clave'] != $campos['clave2'] ){
			$errores['clave2'] = 'Las contraseñas deben coincidir';
		}
        
		if( $campos['imagen']['error'] != 4 ){
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