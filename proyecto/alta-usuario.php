 <?php
	require_once('configuracion.php');
	require_once('alta-usuario-validar.php');
	
	if(!PRODUCCION){
		$_POST[''] = true;
	}
	
	$vengoForm = isset($_POST['alta-usuario']);

	if ($vengoForm ){
		//var_dump( $_POST, $_FILES);die();
		$errores = validarDatos( $_POST, $_FILES);
        if (!empty($errores)){
            $sectorActivo = $_POST['sector'];
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
        }
	} else {
		$sexoM = 'checked="checked"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
	
	require_once('inc/funciones.php');
	$sectores = dibujoSectores( $sectorActivo );
 
	$titulo = 'Alta de Usuarios';
	include('inc/encabezado.template.php');
	include_once('inc/alta-usuario.template.php');
	include_once('inc/pie.template.php');
?>