<?php 
	function validarDatos($campos){
		$errores = array();
		// uso empty() en lugar de isset() porque POST siempre manda los valores
		if (empty($campos['usuario']) || strlen($campos['usuario']) < 6 ){
			$errores['usuario'] = 'Debe completar usuario con al menos 6 caracteres';
		}
		if (empty($campos['dni'] )){
			$errores['dni'] = 'Debe completar dni';
		}
			
		return $errores; 
	}
?>