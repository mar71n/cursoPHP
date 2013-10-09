<?php
	
	function getSectores(){
		$datos[] = array('valor'=>'3', 'texto'=>'Campo');
		$datos[] = array('valor'=>'2', 'texto'=>'Desarrollo');
		$datos[] = array('valor'=>'4', 'texto'=>'Procesamiento');
		$datos[] = array('valor'=>'1', 'texto'=>'RRHH');
		return $datos;
	}
	
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