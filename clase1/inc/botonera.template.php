<?php
	/*
		encapsulo todo en una función para evitar sobreescribir variables que eran globales
	*/
	function dibujarBotones(){
		//cuando digo $nombre[] PHP genera un array secuencial con el valor en el indice 0, o utiliza la proxima posicion disponible del array
		//es equivalente a usar array_push();
		$botones[] = array('nombre'=>'Inicio', 'link'=>'index.php');
		$botones[] = array('nombre'=>'Alta Producto', 'link'=>'alta-producto.php');
		$botones[] = array('nombre'=>'Listado de Productos', 'link'=>'listado-productos.php');
		$botones[] = array('nombre'=>'Perfil de Usuario', 'link'=>'perfil.php');
		
		$botonesHTML = '';
		//si en el as defino dos variables, el foreach me va a dar el $key y el $value
		//como estoy iterando una matriz, $key va a ser la posicion (0,1,2)
		//el $value va a ser el array que define al botón
	    $ruta = $_SERVER['PHP_SELF'];
		$info= pathinfo($ruta);
		$base = '<li><a %s href="%s">%s</a></li>';
		foreach( $botones as $key=>$value ){
			$esactiv = '';
			//var_dump($info['basename'], $value['link']);
			if( $info['basename'] == $value['link']){
			//	echo $value['link']. ' - ' .$info['basename'];
				$esactiv = 'class="active"';
			}
			//sprintf recibe una cadena que puedo reemplazos marcados con %s
			//por cada %s que puse le agrego un parametro a la funcion indicando con qué reemplazo
			//printf ese reemplazo lo escribe inmediatamente (hace echo)
			//sprintf me devuelve un string para que pueda trabajar
			$botonesHTML .= sprintf($base, $esactiv, $value['link'], $value['nombre']);
			$botonesHTML .= "\r\n"; // esto es igual a $botonesHTML = $botonesHTML . '';
		}
		return $botonesHTML;
	}
?>
<ul>
	<?php echo dibujarBotones(); ?>
</ul>