<?php
	
	//defino una clase
	//uso camelCase comenzando en mayúscula
	// en vez de auto digo Auto
	// en vez de auto_muy_loco AutoMuyLoco
	class Auto {
		
		//defino propiedades
		public $color; //string
		public $peso; //float
		public $puertas; //integer
		public $velocidadMaxima; //float
		public $marca; //es una Marca
		
	}
	
	class Marca {
	
	}
	
	$mi_auto = new Auto();
	$mi_auto->color = 'rojo'; //noten que pierdo el signo $
	$mi_auto->peso = 2.5;
	$mi_auto->puertas = 4;
	$mi_auto->velocidadMaxima = 300;

	$otro = new Auto();
	$otro->puertas = 2;
	$copia = $otro;
	$otro = $mi_auto;
	$mi_auto->color = 'verde';
	var_dump( $mi_auto, $otro, $copia );



	
	
?>