	//defino una clase
	//uso camelCase comenzando en mayúscula
	// en vez de auto digo Auto
	// en vez de auto_muy_loco AutoMuyLoco
	class Auto {
		
		//defino propiedades
		public String color;
		public float peso;
		public int puertas;
		public float velocidadMaxima;
		
	}
	
	...
	
	main(){
		Auto mi_auto = new Auto();
		mi_auto.color = 'rojo'; //noten que pierdo el signo $
		mi_auto.peso = 2.5;
		mi_auto.puertas = 4;
		mi_auto.velocidadMaxima = 300.0;
	}
	
?>