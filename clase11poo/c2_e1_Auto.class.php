<?php 
require_once('c2_e2_Motor.class.php');
class Auto{
	public $velocidad;
	public $motor;
	public $ruedas=array();
	
	
	function Auto(){
		$this->motor="V8";
	}
	
	function acelerar(){
	}
	function __toString(){
		return "<p>
		auto de velocidad $this->velocidad mi motor $this->motor
		</p>";
	}
}
?>