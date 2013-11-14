<?php
	require_once('configuracion.php');
	require_once('inc/db.php');
	
	//esta estrategia es más útil, me permite identificar a mi formulario
	$vengoForm = isset( $_POST['editar-usuario'] );
	
	if( $vengoForm ){
				
		require_once('inc/alta-validar.php');
		//inyecto la imagen dentro del paquete que vino por POST
		$_POST['imagen'] = $_FILES['imagen'];
		$errores = validarDatos( $_POST );
		if( empty($errores) ){
			require_once('inc/alta-guardar.php');
			guardarDatos( $_POST );
			//realmente grabo los datos: INSERT y grabo el archivo físico de la imagen si la hay
			//después me redirecciono
			header('location: listado-usuarios.php');
		}
		$scriptErrores = '';
		foreach( $errores as $campo=>$error ){
			$scriptErrores .= "addClass('error', '$campo');\r\n";
		}
		$errores = implode( $errores, ', ' ); //implode concatena un Array y me da un String
		extract( $_POST );
		
	} else {
		
		//Sino vengo del formulario (sería la primera vez) busco todos los campos de la base
		$datos = getUsuarioByID( $_GET['id'] );
		extract($datos);
		
		$sexoM = '';
		$sexoF = '';
		if( $sexo == 1 ){
			$sexoM = 'checked="checked"';
		} else {
			$sexoF = 'checked="checked"';
		}
		
		$errores = '';
		$scriptErrores = '';
		foreach($datos as $key=>$value){
			$scriptErrores .= "// getEl('$key').value = '$value';\r\n";
		}
	}
		
	$titulo = 'Edición de usuario';
	$form_titulo = 'Formulario de edición';
	$mensaje_submit = 'Actualizar';
	$form_tipo = 'editar-usuario';
	$acepto_tyc = '';
	$usuario_props = 'disabled';
	$clave_props = '';
	
	require_once('inc/funciones.php');
	$sectores = dibujoSectores( $sector );
	
	require_once('inc/encabezado.template.php');
	require_once('inc/alta-usuario.template.php');
	require_once('inc/pie.template.php');
?>