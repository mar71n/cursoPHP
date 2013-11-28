<?php
	// Cliente.class.php
	class Cliente {
		
		var $dni; //forma de declarar un estado dejando que tome por default la visibilidad
		public $edad = 18;
		public $activo = true;
		public $nombre;
		public $apellido;
		public $amigo; //Cliente
		
		public function imprimirNombreCompleto($color='black'){
			//$this refiere a la instancia que está ejecutando el método
			echo "<p style='color: $color'>$this->nombre $this->apellido</p>";
			if( isset($this->amigo) ){
				echo "Y tengo un amigo...";
				$this->amigo->imprimirNombreCompleto();
				echo "<hr />";
			}
		}
		
	}
	
	
?>