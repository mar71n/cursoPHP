<?php
	require_once('configuracion.php');
	
	$titulo = 'Bienvenido';
	
	//siempre chequeo contra el submit
	$vengoForm = isset( $_POST['login'] );
	
	if( $vengoForm ){
		require_once('inc/db.php');
		$usuario = getUsuario( $_POST['login_usuario'], $_POST['login_clave'] );
		if( $usuario ){
			//die('¡alto login!');
			$_SESSION['usuario'] = $usuario;
		}
	}
	
	require_once('inc/encabezado.template.php');
	require_once('inc/index.template.php');
	require_once('inc/pie.template.php');
?>