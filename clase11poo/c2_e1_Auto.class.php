<?php 
require_once('c2_e2_Motor.class.php');
class Auto{
	public $velocidad;
	public $motor;
	function acelerar(){
	}
	function __toString(){
		return "<p>
		auto de velocidad $this->velocidad
		</p>";
	}
}
?>