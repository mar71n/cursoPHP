<?php
	function getPaises(){
		$datos[] = array('valor'=>'arg', 'texto'=>'Argentina');
		$datos[] = array('valor'=>'bra', 'texto'=>'Brasil');
		$datos[] = array('valor'=>'bol', 'texto'=>'Bolivia');
		$datos[] = array('valor'=>'chi', 'texto'=>'Chile');
		$datos[] = array('valor'=>'uru', 'texto'=>'Uruguay');
		$datos[] = array('valor'=>'par', 'texto'=>'Paraguay');
		return $datos;
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