<?php
//	saldo:float
//	titular:Cliente
//	Boolean extraer(float monto)
//	depositar(float monto)
//	verSaldo() -> debería imprimir el saldo
//	verInfo() -> imprime saldo e info del titular
require_once('Cliente.class.php');

    class Cuenta{
        public $saldo=0;
        public $titular;
        public function extraer($monto){
            
        }
        public function depositar($monto){
            
        }
        public function verSaldo(){
            return $this->saldo;
        }
        public function verInfo(){
            
        }
    }
?>