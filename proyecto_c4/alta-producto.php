<?php
	
	//este chequeo lo �nico que define es que alguien me pidi� este recurso y adjunt� variables por POST
	//podr�a ser cualquier pedido, no estoy verificando qu� formulario es
	$vengoForm = $_SERVER['REQUEST_METHOD'] == 'POST';
	
	//esta estrategia es m�s �til, me permite identificar a mi formulario
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