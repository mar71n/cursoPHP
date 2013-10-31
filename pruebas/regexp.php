<?php
	$patron = '/mañas/i';
    $patron=preg_replace("/ñ/","Ñ",$patron);
    
    $texto="alimañas";
	var_dump( preg_match($patron, $texto) , $patron);
    $texto="ALIMAÑAS";
	var_dump( preg_match($patron, $texto) , $patron);

?>