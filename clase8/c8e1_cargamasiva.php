<?php
	require_once( 'proyecto/inc/db.php' );
	
	$sexos = array( 2, 1, 1, 2, 1, 2, 2, 2, 1, 1 );
	$nombres = array('Silvia', 'Silvio', 'Alejandro', 'María Teresa', 'Martin', 'Rosana', 'Graciela', 'Raquel', 'Mauro', 'Emilio' );
	$apellidos = array('Perez', 'Soldan', 'Garcia', 'Doble Apellido', 'Alvarez', 'Gutierrez', 'Borges', 'Cortazar', 'Casares', 'Artl' );
	
	for( $i=0; $i < 100; $i++ ){
		$iNombre = array_rand( $nombres );
		$simulado['nombre'] = $nombres[ $iNombre ];
		$simulado['sexo'] = $sexos[ $iNombre ];
		$simulado['apellido'] = $apellidos[ array_rand( $apellidos ) ];
		
		$simulado['usuario'] = strtolower( substr( $simulado['nombre'], 0, 1 ) );
		$simulado['usuario'] .= strtolower( $simulado['apellido'] );
		$simulado['usuario'] .= $i;
		$simulado['usuario'] = str_replace(' ', '', $simulado['usuario'] );
		
		$simulado['clave'] = $simulado['usuario'];
		$simulado['sector'] = rand(1, 4);
		$simulado['dni'] = rand( 10, 40).rand(100, 999).rand(100, 999);
		
		usuarioGuardar( $simulado );
	}
	
	echo 'terminé, mirá la base';
?>