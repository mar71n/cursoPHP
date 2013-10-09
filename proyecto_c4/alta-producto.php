<?php
	
	//este chequeo lo único que define es que alguien me pidió este recurso y adjuntó variables por POST
	//podría ser cualquier pedido, no estoy verificando qué formulario es
	$vengoForm = $_SERVER['REQUEST_METHOD'] == 'POST';
	
	//esta estrategia es más útil, me permite identificar a mi formulario
	$vengoForm = isset( $_POST['alta-usuario'] );
	
	if( $vengoForm ){
		$sectorActivo = $_POST['sector'];
		
	} else {
		$sexoM = 'selected="selected"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
	
	$data = getSectores();
	$sectores = dibujarSelect( 'sector', $data, $sectorActivo );
	
	$titulo = 'Alta de usuario';
	require_once('configuracion.php');
	require_once('inc/encabezado.template.php');
	require_once('inc/alta-usuario.template.php');
	require_once('inc/pie.template.php');
?>