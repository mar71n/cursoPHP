<?php
	require_once('configuracion.php');
	
	//puedo simular data que vino por $_POST para evitar llenar el FORM
	if( !PRODUCCION  ){
		$_POST['alta-usuario'] = true;
		$_POST['usuario'] = 'pepito22';
		$_POST['email'] = 'fruta';
		$_POST['sector'] = 1;
		$_FILES['imagen'] = array();
		$_FILES['imagen']['size'] = 8000;
		$_FILES['imagen']['type'] = 'image/png';
		$_FILES['imagen']['name'] = 'alberto.png';
		$_FILES['imagen']['tmp_name'] = '';
	}
		
	//esta estrategia es m�s �til, me permite identificar a mi formulario
	$vengoForm = isset( $_POST['alta-usuario'] );
	
	if( $vengoForm ){
		//var_dump( $_POST, $_FILES ); die();
		
		require_once('inc/alta-validar.php');
		//inyecto la imagen dentro del paquete que vino por POST
		$_POST['imagen'] = $_FILES['imagen'];
		$errores = validarDatos( $_POST );
		if( empty($errores) ){
			require_once('inc/alta-guardar.php');
			guardarDatos( $_POST );
			//realmente grabo los datos: INSERT y grabo el archivo f�sico de la imagen si la hay
			//despu�s me redirecciono
			header('location: listado-productos.php');
		}
		$errores = implode( $errores, ', ' ); //implode concatena un Array y me da un String
		$sectorActivo = $_POST['sector'];
		
	} else {
		$sexoM = 'checked="checked"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
	
	require_once('inc/funciones.php');
	$sectores = dibujoSectores( $sectorActivo );
	
	$titulo = 'Alta de usuario';
	require_once('inc/encabezado.template.php');
	require_once('inc/alta-usuario.template.php');
	require_once('inc/pie.template.php');
?>