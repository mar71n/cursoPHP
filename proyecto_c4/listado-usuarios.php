<?php
	$titulo = 'Listado de usuarios';
	$css_de_la_pagina = "<link href='css/listado.css' rel='stylesheet' type='text/css' />";
	require_once('configuracion.php');
	require_once('inc/db.php');
	require_once('inc/funciones.php');
	
	if( isset($_GET['action']) ){
		switch( $_GET['action'] ){
			case 'borrar':
			if( tienePermiso($_GET['id']) ){
				usuarioDesactivar( $_GET['id'] );
				header( 'location: listado-usuarios.php' );
			}
			break;
			
			case 'editar':
			header( 'location: editar-usuario.php?id='.$_GET['id'] );
			break;
		}
	}
		
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
			$botonEditar = '';
			$botonBorrar = '';
			if( tienePermiso( $u['idusuario'] ) ){
				$botonEditar = "<a href='?action=editar&id=$u[idusuario]'><img src='app_img/editar.png' /></a>";
				$botonBorrar = "<a onclick='return confirm(\"¿Está seguro que desea eliminar al usuario?\");' href='?action=borrar&id=$u[idusuario]'><img src='app_img/borrar.png' /></a>";
				$css = 'activo';
			}
			
			include( 'inc/listado-usuario.template.php' );
		}
		return ob_get_clean(); //recupero todo lo que capturé
	}
	
	function getHeaderHTML(){
		$html = "<th><!-- photo --></th>";
		//si bien parece repetir, me permite separar cómo muestro el nombre de la columna del nombre real que paso en el orderby
		$campos[] = array( 'texto'=>'usuario', 'valor'=>'usuario' );
		$campos[] = array( 'texto'=>'nombre', 'valor'=>'nombre' );
		$campos[] = array( 'texto'=>'sector', 'valor'=>'sector' );
		$campos[] = array( 'texto'=>'email', 'valor'=>'email' );
		$campos[] = array( 'texto'=>'edad', 'valor'=>'edad' );
		foreach( $campos as $c ){
			$type = 'ASC';		
			$activo = $_GET['order'] == $c['valor'];
			
			if( $activo && $_GET['type'] == 'ASC' ) $type = 'DESC';
			
			$css = $type;
			if( $activo ) $css .= ' activo';
			
			
			
			$copia = $_GET;
			$copia['order'] =$c['valor'];
			$copia['type'] = $type;
			$copia['pagina'] = 1;
			$variables = http_build_query($copia);
			$html .= "
			<th><a href='?$variables' class='$css'>$c[texto]</a></th>
			";
		}
		$html .= "
		<th><!-- edit --></th>
		<th><!-- delete --></th>
		";
		return $html;
	}
	
	$listado_header = getHeaderHTML();
	
	$pAct = (int) getRequest('pagina', 1 );
	$pAct = max( 1, $pAct ); //limito en 1 como minimo
	$pSig = $pAct+1;
	$pAnt = $pAct-1;
	
	$opt = array('pagina'=>$pAct);
	$opt['busqueda'] = getRequest('busqueda');
	$opt['orderby'] = getRequest('order', 'usuario');
	$opt['ordertype'] = getRequest('type', 'ASC');
		
	$usuariosTodo = getUsuarios( $opt );/*getUsuarios retorna [datos]: un array con los registros, [paginado]: un array [pagina],[total]*/
	$listado_body = getUsuariosHTML( $usuariosTodo['datos'] );
	
	$paginado = $usuariosTodo['paginado'];
	$listado_paginado = "";
	if( $pAct > 1 ){
		$copia = $_GET;
		$copia['pagina'] = $pAnt;
		$variables = http_build_query( $copia );// http_build_query — Generar una cadena de consulta codificada estilo URL
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