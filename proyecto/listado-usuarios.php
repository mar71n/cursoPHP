<?php
	$titulo = 'Listado de usuarios';
	$css_de_la_pagina = "<link href='css/listado.css' rel='stylesheet' type='text/css' />";
	require_once('configuracion.php');
	
	require_once('inc/db.php');
	$usuarios = getUsuarios();
	
	//empiezo a capturar cualquier echo/print que suceda
	//ob output buffer
	ob_start();
	foreach( $usuarios as $i=>$u ){
		$impar = '';
		if( $i % 2 == 0 ) $impar = 'impar';
		include( 'inc/listado-usuario.template.php' );
	}
	$listado_body = ob_get_clean(); //recupero todo lo que capturé
	
	require_once('inc/encabezado.template.php');
	require_once('inc/listado.template.php');
	require_once('inc/pie.template.php');
?>