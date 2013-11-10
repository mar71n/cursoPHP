<?php
	$titulo = 'Listado de usuarios';
	$css_de_la_pagina = "<link href='css/listado.css' rel='stylesheet' type='text/css' />";
	require_once('configuracion.php');
	
	require_once('inc/db.php');
	require_once('inc/funciones.php'); // para getRequest
	$usuarios = getUsuarios();
	
	//empiezo a capturar cualquier echo/print que suceda
	//ob output buffer
	function getUsuariosHTML( $usuarios ){
		ob_start();
		foreach( $usuarios as $i=>$u ){
			$impar = '';
			if( $i % 2 == 0 ) $impar = 'impar';
			
			$img = $u['ruta_imagen'];
			if( empty($img) ){
				if( $u['sexo'] == 1 ) $img = 'app_img/usuario_masc.png';
				else $img = 'app_img/usuario_fem.png';
			} else {
				$img = 'img/'.$img;
			}
			
			$css = '';
			
			include( 'inc/listado-usuario.template.php' );
		}
		return ob_get_clean(); //recupero todo lo que captur�
	}
	require_once('inc/db.php');
	
    
    /* pongo pagina en 1, y si vino por GET pongo esa*/
	$pAct = 1;
	if( isset($_GET['pagina']) ) $pAct = (int) $_GET['pagina'];
	$pAct = max( 1, $pAct ); //limito en 1 como minimo
	$pSig = $pAct+1;
	$pAnt = $pAct-1;
	
    /* las opciones de getUsuarios son la pagina ... y agregamos opciones a getUsuarios */
	$opt = array('pagina'=>$pAct);
	$opt['busqueda'] = getRequest('busqueda'); // unifica $_GET y $_POST
	$opt['orderby'] = getRequest('order', 'usuario');
	$opt['ordertype'] = getRequest('type', 'ASC');
		
	$usuariosTodo = getUsuarios( $opt );/*getUsuarios retorna [datos]: un array con los registros, [paginado]: un array [pagina],[total]*/
	$listado_body = getUsuariosHTML( $usuariosTodo['datos'] );
	
	$paginado = $usuariosTodo['paginado'];
	$listado_paginado = "";
	if( $pAct > 1 ){
		$copia = $_GET;
		$copia['pagina'] = $pAnt;
		$variables = http_build_query( $copia );// http_build_query � Generar una cadena de consulta codificada estilo URL
		$listado_paginado = "<a href='?$variables'>anterior</a>";
	}
	$listado_paginado .= "Pagina $pAct de $paginado[paginas] ($paginado[total] registros)";
	if( $pAct < $paginado['paginas'] ){
		$copia = $_GET;
		$copia['pagina'] = $pSig;
		$variables = http_build_query( $copia );
		$listado_paginado .= "<a href='?$variables'>siguiente</a>";
	}
	require_once('inc/encabezado.template.php'); // cabecera html y botonera
	require_once('inc/listado.template.php'); // form de busqueda y titulos columnas
	require_once('inc/pie.template.php'); 
?>