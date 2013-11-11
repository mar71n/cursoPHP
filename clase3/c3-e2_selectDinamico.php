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
    <script>
        function ponervalor(){
            var destino = document.getElementById("eltexto");
            var fuente = document.getElementById("elselec");
            destino.value=fuente.options[fuente.selectedIndex].text;
        }
    </script>
	</head>
	<body>
		<form action='' method=''>
			<?php echo $opciones ;?>
			<input type='hidden' name='ACTION' value='ALTA_PAIS' />
			<input type='submit' />
            <select id="elselec" onchange="ponervalor()">
                <option value="1">opcion 11</option>
                <option value="2">opcion 12</option>
                <option value="3">opcion 13</option>
            </select>
            <input type="text" id="eltexto" />
		</form>
	</body>
</html>