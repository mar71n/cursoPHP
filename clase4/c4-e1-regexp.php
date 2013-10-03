<?php
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
?>