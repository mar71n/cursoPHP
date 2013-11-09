<?php
	
	$_GET['pagina'] = 1;
	$_GET['algoRaro'] = 'te re hackeo';
	$_POST['usuario'] = 'frutita';
	var_dump( $_GET, $_POST, $_REQUEST );
	
?>
<form method='post' action='c9_request.php?algoRaro=true'>
	<input type='text' name='otroValor' />
</form>