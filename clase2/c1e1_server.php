<?php
	
	//var_dump( $_SERVER ); //con esto puedo aprender toda la información que me ofrece PHP del servidor
	
	$ruta = $_SERVER['PHP_SELF'];
	$info = pathinfo( $ruta );
	// PATHINFO_BASENAME es una constante de PHP que vale un INT
	$base = pathinfo( $ruta, PATHINFO_BASENAME );
	var_dump( $info, $info['basename'], $base );
	
?>