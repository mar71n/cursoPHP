<?php
	
	$copia = $_GET;
	$copia['pagina'] = 2;
	
	//var_dump( $_GET, $copia );
	echo http_build_query( $copia );
	
?>