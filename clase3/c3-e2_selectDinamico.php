<?php
echo '<pre>';
var_dump($_GET);
echo '</pre>';

	require_once('c3-e2_funciones.php');
	$datos = getPaises();
		
	$activo = '';
	if( isset( $_GET['pais'] ) ) $activo = $_GET['pais'];
	$opciones = dibujoSelect( 'pais', $datos, $activo );


?>
<html>
	<head>
	</head>
	<body>
		<form action='' method=''>
			<?php echo $opciones ;?>
			<input type='hidden' name='ACTION' value='ALTA_PAIS' />
			<input type='submit' />
		</form>
	</body>
</html>