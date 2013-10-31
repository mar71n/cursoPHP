<html>
	<head>
		<title><?php echo $titulo;?></title>
		<link href='css/main.css' rel='stylesheet' type='text/css' />
		<?php if(isset($css_de_la_pagina)) echo $css_de_la_pagina ?>
		<!-- incluyo mi libreria de funciones -->
		<script src='js/funciones.js'></script>
		<?php if(isset($js_de_la_pagina)) echo $js_de_la_pagina ?>
	</head>
	<body>
		<div id='header'>Encabezado con el logo</div>
		<div id='navbar'>
			<?php require_once('botonera.template.php'); ?>
		</div>
		<div id='content'>
