<?php
// paso1: conectar
$ruta='localhost';
$usuario='root';
$clave='123456';
$base='clasesphp';
@ $cnx = mysqli_connect($ruta, $usuario, $clave,$base);
if (!$cnx) die('error al conectar');
//armar consulta
$sql = 'select * from sector;';

//la ejecuto
$res = mysqli_query($cnx, $sql);
if (!$res) die(mysqli_error($cnx));

while ($fila = mysqli_fetch_assoc($res)){
	echo '<p>'.$fila['nombre'].'</p>';
}

var_dump($cnx);
//unset($cnx);
mysqli_close($cnx);
var_dump($cnx);

//convierto resultado a php
// $fila = mysqli_fetch_array($res);
// $fila2 = mysqli_fetch_assoc($res);
// 
// $fila = mysqli_fetch_array($res);
// 
// var_dump($cnx, $res, $fila, $fila2);

?>