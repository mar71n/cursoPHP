<?php
	
	require_once('Cliente.class.php');
	
	$pepe = new Cliente();
	$pepe->nombre = 'Jose';
	$pepe->apellido = 'Alvarez';
	$pepe->dni = '30298382';
	$pepe->nuevoValor = 30; //esto es particular de PHP, le genero una nueva propiedad en tiempo de ejecución!
	
	$cacho = new Cliente();
	$cacho->nombre = 'Carlos';
	$cacho->apellido = 'Castaña';
	$cacho->amigo = $pepe;
	
	var_dump( $pepe, $cacho );
	
	$pepe->imprimirNombreCompleto('red');
	$cacho->imprimirNombreCompleto();
    
    /*
    var_dump(get_class($pepe));

    var_dump(get_class_methods($pepe));
    var_dump(get_class_vars(get_class($pepe)));
    
    
    var_dump(get_defined_vars());
    
    var_dump(get_class_methods(get_parent_class(get_class($pepe))));
    var_dump(get_parent_class(get_class($pepe)));
    */
	
?>