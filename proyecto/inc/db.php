<?php
require_once('restricciones.php');
$db_setings['ruta']='localhost';
$db_setings['usuario']='root';
$db_setings['clave']='memysql636775';
$db_setings['base']='clasesphp';

$cnx = mysqli_connect($db_setings['ruta'], 
                        $db_setings['usuario'], 
						$db_setings['clave'],
						$db_setings['base']);
if (!$cnx) {
    logError("no se pudo conectar","");
    die("no conecto");
}

function logError($mensaje, $descripcion){
	$archivolog = fopen("log/log.txt","a");
    fwrite($archivolog, "\n".$mensage." - ".$descripcion.date ("d/m/Y h:i:s"));
}

function ejecutarSQL($sql){
	global $cnx;
	$res = mysqli_query($cnx, $sql);
	if ( !$res ) logError(mysqli_error($cnx),$sql);
	if ( $res === true) return $res;
	$resultado = array(); //sino un select que no devuelve registros hace fallar la proxima linea
	while ($fila = mysqli_fetch_assoc($res)){
		$resultado[]=$fila;
	}
	return $resultado;
}

function getSectores(){
	return ejecutarSQL('SELECT idsector as valor, nombre as texto FROM sector;');
}
?>