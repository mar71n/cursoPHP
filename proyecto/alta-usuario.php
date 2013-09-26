 <?php
 
	$vengoForm = $_SERVER['REQUEST_METHOD'] == 'POST';
	
	// esta estrategia es mas util, me permite identificar
	$vengoForm = isset($_POST['alta-usuario']);
	if ($vengoForm ){
		
	} else {
		$sexoM = 'selected="selected"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
 
	require_once('configuracion.php');
	$titulo = 'Alta Usuarios';
	include('inc/encabezado.template.php');
	include_once('inc/alta-usuario.template.php');
	include_once('inc/pie.template.php');
?>