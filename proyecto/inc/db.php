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
    $db_setings['clave']='123456';
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
	global $cnx; //aviso que la variable $cnx viene de afuera		
	$res = mysqli_query( $cnx, $sql );
	if( !$res ){
		logError( mysqli_error($cnx), $sql );
		return false;
	}
	if( $res === true ) return $res; //INSERT, UPDATE o DELETE exitosos
	if( $first ) return mysqli_fetch_assoc($res);
	$resultado = array(); //inicializo el array para devolver siempre un Array, de otra forma un SELECT que no devuelve registros haría que esta función retorne NULL
	while( $fila = mysqli_fetch_assoc($res) ){
		$resultado[] = $fila;
	}
	return $resultado; //estoy devolviendo siempre una matriz
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
		
		$pagina = 1;
		if( $opciones && $opciones['pagina'] ) $pagina = $opciones['pagina'];
		
		$registros = 10;
		if( $opciones && $opciones['registros'] ) $registros = $opciones['registros'];
		
		$where = '';
		if( $opciones && $opciones['busqueda'] ){
			$b = filtrarCampos( $opciones['busqueda'] );
			
			$where = "
			AND ( u.usuario LIKE '%$b%' OR u.nombre LIKE '%$b%' )
			";
		}
		
		$orderCampo = filtrarCampos( $opciones['orderby'] );
		$orderType = filtrarCampos( $opciones['ordertype'] );
		$orderBy = "ORDER BY $orderCampo $orderType";
				
		$sql = "
		SELECT 
			count(idusuario) as total, 
			ceil( count(idusuario) / $registros ) as paginas
		FROM usuario as u
		WHERE activo
		$where
		";
		$paginado = ejecutarSimpleSQL($sql); /*$paginado resulta una array con [total] y [paginas]*/
		
		$pagina = limitar( $pagina, 1, $paginado['paginas'] );
		$inicio = ($pagina-1) * $registros;
		
		$sql = "
		SELECT u.idusuario, u.usuario, u.nombre, u.apellido, u.dni, u.sexo, s.nombre as sector, u.email,
		(YEAR( CURRENT_DATE ) - YEAR( fecha_nac )) - ( DATE_FORMAT(CURDATE(),'%m-%d') < DATE_FORMAT(fecha_nac,'%m-%d') ) as edad
		FROM usuario as u INNER JOIN sector as s ON u.idsector = s.idsector
		WHERE activo 
		$where
		$orderBy
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
        ( usuario, nombre, apellido, clave, dni, idsector, sexo, ruta_imagen , fecha_alta, fecha_nac, email )
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

function usuarioActualizar($campos_sin_filtrar){
	$campos = filtrarCampos( $campos_sin_filtrar );
	$sql = "
		UPDATE usuario SET
         usuario = '$campos[usuario]', 
         nombre = '$campos[nombre]', 
         apellido = '$campos[apellido]', 
         clave = '$campos[clave]', 
         dni = '$campos[dni]', 
         idsector = $campos[sector], 
         sexo = '$campos[sexo]', 
         ruta_imagen = '$campos[ruta_imagen]', 
         -- fecha_alta, 
         fecha_nac = '$campos[nacimiento]', 
         email = '$campos[email]'
         WHERE idusuario = '$campos[idusuario]'
	";
	return ejecutarSQL( $sql );
}

function usuarioDesactivar( $id ){
	$id = (int) $id;
	$sql = "
	UPDATE usuario 
	SET activo = false 
	WHERE idusuario = $id
	";
	return ejecutarSQL( $sql );
}
?>