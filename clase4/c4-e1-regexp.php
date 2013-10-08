<?php
	//http://php.net/manual/en/function.preg-match.php
	$patron = '/^[a-zA-Z0-9_-]{6,16}$/';
	$patron = '/^image\/.+$/';
	$valores = array('pepe','pepitos','cañete','image/png');
	echo "<p> Patron : $patron ";
	echo "<pre>";
	foreach($valores as $valor){
		$resultado = preg_match($patron, $valor);
		var_dump($valor, $resultado);
	}
	
	echo "con filter_var <br/>";
	
	foreach($valores as $valor){
		$resultado = filter_var($valor,FILTER_VALIDATE_REGEXP,array('options'=>array('regexp'=>$patron)));
		var_dump($valor, $resultado);
	}

	echo "con valor de filter_var <br/>";
//un patrón que define que empiece con la cadena 'image/'
	//notar que la barra va escapada con \
	$patron = '/^image\//';
	var_dump( preg_match($patron, 'image/fruta' ) );
	var_dump( preg_match($patron, 'imagen/fruta' ) );
	var_dump( preg_match($patron, 'pimage/fruta' ) );
?>