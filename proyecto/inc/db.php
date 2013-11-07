<?php
require_once('restricciones.php');
require_once('configuracion.php');
if(LUGAR=='casa'){
    $db_setings['ruta']='localhost';
    $db_setings['usuario']='root';
    $db_setings['clave']='memysql636775';
    $db_setings['base']='clasesphp';
}else{
    $db_setings['ruta']='localhost';
    $db_setings['usuario']='root';
    $db_setings['clave']='';
    $db_setings['base']='clasesphp';
}
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

function ejecutarSimpleSQL($sql){
	return ejecutarSQL( $sql, true );
}

//esto filtra valores puros, arrays y matrices
function filtrarCampos( $campos ){
	global $cnx;
	if( !is_array($campos) ) return mysqli_real_escape_string( $cnx, $campos );
	foreach( $campos as $key=>$value ){
		//hago un llamado recursivo, ahora puedo presumir en los pasillos, "yo uso funciones recursivas, ¿viste?"
		$copia[ $key ] = filtrarCampos( $value );
	}
	return $copia;
}

function getSectores(){
	return ejecutarSQL('SELECT idsector as valor, nombre as texto FROM sector;');
}

function getUsuario($u, $c){
	$u = filtrarCampos($u);
	$c = filtrarCampos($c);
	$sql="
	SELECT idusuario
	FROM usuario
	WHERE usuario = $u
	";
	$usuario = ejecutarSimpleSQL($sql);
	return $usuario;
}

function getUsuarios(){
	$sql = 'SELECT * FROM usuario';
	return ejecutarSQL($sql);
}

function usuarioGuardar($campos){
	$sql = "
		INSERT INTO usuario
		( usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , fecha_alta )
		VALUES
		(
		 '$campos[usuario]',
		 '$campos[nombre]',
		 '$campos[apellido]',
		 '$campos[clave]',
		 '$campos[dni]',
		 $campos[sector],
		 '$campos[sexo]',
		 '',
		now()			 
		)
	";
	return ejecutarSQL( $sql );
}

?>