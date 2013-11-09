<?php
	
	require_once('inc/db.php');
	
	//dibujoSectores "envuelve" a la función genérica dibujoSelect
	//de alguna forma estoy particularizando eso que era genérico
	function dibujoSectores( $sectorActivo ){
		return dibujoSelect( 'sector', getSectores(), $sectorActivo );
	}
	
	function dibujoSelect( $nombre, $datos, $valorActivo='' ){
		$opciones = "<select name='$nombre'>\r\n";
		foreach( $datos as $item ){
			$activo = '';
			if( $valorActivo == $item['valor'] ) $activo = " selected='selected' ";
			$opciones .= "\t<option $activo value='$item[valor]'>$item[texto]</option>\r\n";
		}
		$opciones .= '</select>';
		$opciones .= "\r\n<!-- fin select -->";
		return $opciones;
	}
	
	function limitar( $n, $min, $max ){
		//solo limito contra el maximo si es superior al minimo, no permito rangos 1,0
		if( $max > $min ) $n = min( $n, $max );
		$n = max( $n, $min );
		return $n;
	}
	
	function getRequest( $prop, $default=null ){
		//$_REQUEST almacena lo que vino por $_GET y $_POST
		if( isset( $_REQUEST[$prop] ) && !empty($_REQUEST[$prop]) ) return $_REQUEST[$prop];
		return $default;
	}
?>