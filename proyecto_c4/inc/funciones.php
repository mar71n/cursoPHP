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
?>