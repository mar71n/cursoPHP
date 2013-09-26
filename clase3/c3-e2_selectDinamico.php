<?php

    $datos[] = array('valor'=>'arg', 'texto'=>'Argentina');
    $datos[] = array('valor'=>'bra', 'texto'=>'Brasil');
    $datos[] = array('valor'=>'bol', 'texto'=>'Bolivia');
    $datos[] = array('valor'=>'chi', 'texto'=>'Chile');
    $datos[] = array('valor'=>'uru', 'texto'=>'Uruguay');
    $datos[] = array('valor'=>'par', 'texto'=>'Paraguay');
	
	$opciones = '<SELECT>';
	$maqueta= '<option value="{VALUE}" {SELECTED}> {TEXTO} </option>';
	$find = array('{VALUE}','{SELECTED}','{TEXTO}');
	foreach ($datos as $pais){
		$replace = array($pais['valor'], '', $pais['texto']);
		$opciones .= str_replace($find, $replace, $maqueta);
	}
	$opciones .= '</select>';
	
?>
<html>
	<head>
	</head>
	<body>
		<form>
			<?php echo $opciones ?>

		</form>
	</body>
</html>