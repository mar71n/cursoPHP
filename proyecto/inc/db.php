<?php
$db_setings['ruta']='localhost';
$db_setings['usuario']='root';
$db_setings['clave']='123456';
$db_setings['base']='clasesphp';

@ $cnx = mysqli_connect($db_setings['ruta'], 
                        $db_setings['usuario'], 
						$db_setings['clave'],
						$db_setings['base']);
if (!$cnx) die('error al conectar');

function logError($mensaje, $descripcion){
	
}

function ejecutarSQL($sql){
	global $cnx;
	$res = mysqli_query($cnx, $sql);
	if ( !$res ) logError(mysqli_error($cnx),$sql);
	if ( $res === true) return $res;
	while ($fila = mysqli_fetch_assoc($res)){
		$resultado[]=$fila;
	}
	return $resultado;
}

function getSectores(){
	return ejecutarSQL('SELECT idsector as valor, nombre as texto FROM sector;');
}
?>