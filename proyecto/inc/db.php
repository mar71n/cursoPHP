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

function ejecutarSQL( $sql, $first=false ){
	global $cnx;
	$res = mysqli_query($cnx, $sql);
	if ( !$res ) logError(mysqli_error($cnx),$sql);
	if ( $res === true) return $res;
    if( $first ) return mysqli_fetch_assoc($res);
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

	function getUsuarios( $opciones=null ){
		if( empty($opciones) ){
			$opciones['pagina'] = 1;
			$opciones['registros'] = 10;
		}
		$pagina = $opciones['pagina'];
		$registros = $opciones['registros'];
				
		$sql = "
		SELECT 
			count(idusuario) as total, 
			ceil( count(idusuario) / $registros ) as paginas
		FROM usuario
		WHERE activo";
		$paginado = ejecutarSimpleSQL($sql); /*$paginado resulta una array con [total] y [paginas]*/
		
		$pagina = min( $paginado['paginas'], $pagina );
		$inicio = ($pagina-1) * $registros;
		
		$sql = "
		SELECT u.idusuario, u.usuario, u.nombre, u.apellido, u.dni, u.sexo, s.nombre as sector, u.email,
		(YEAR( CURRENT_DATE ) - YEAR( fecha_nac )) - ( DATE_FORMAT(CURDATE(),'%m-%d') < DATE_FORMAT(fecha_nac,'%m-%d') ) as edad
		FROM usuario as u INNER JOIN sector as s ON u.idsector = s.idsector
		WHERE activo
		LIMIT $inicio, $registros";
		$usuarios = ejecutarSQL($sql);
		
		$resultado['datos'] = $usuarios;
		$resultado['paginado'] = $paginado;
		return $resultado;
	}
	
	function existeUsuario( $usuario ){
		$sql = "
		SELECT idusuario
		FROM usuario
		WHERE usuario = '$usuario'
		";
		$res = ejecutarSQL($sql);
		return count($res) > 0;
 	}
	function usuarioGuardar($campos_sin_filtrar){
	$campos = filtrarCampos( $campos_sin_filtrar );
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
		now(),
    	'$campos[nacimiento]',
		'$campos[email]'
		)
	";
	return ejecutarSQL( $sql );
}

?>