<?php
	$patron = '/ma�as/i';
    $patron=preg_replace("/�/","�",$patron);
    
    $texto="alima�as";
	var_dump( preg_match($patron, $texto) , $patron);
    $texto="ALIMA�AS";
	var_dump( preg_match($patron, $texto) , $patron);

?>