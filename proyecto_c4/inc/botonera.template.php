<?php
	//la función defined me permite saber si una constante está definida
	require_once('restringir.php');
	/*
		encapsulo todo en una función para evitar sobreescribir variables que eran globales
	*/
	function dibujarBotones(){
		//cuando digo $nombre[] PHP genera un array secuencial con el valor en el indice 0, o utiliza la proxima posicion disponible del array
		//es equivalente a usar array_push();
		$botones[] = array('nombre'=>'Inicio', 'link'=>'index.php');
		$botones[] = array('nombre'=>'Alta Usuario', 'link'=>'alta-usuario.php');
		$botones[] = array('nombre'=>'Listado de Usuarios', 'link'=>'listado-usuarios.php');
		$botones[] = array('nombre'=>'Perfil de Usuario', 'link'=>'perfil.php');
		
		$botonesHTML = '';
		$base = '<li><a class="%s" href="%s">%s</a></li>';
		
		$archivo = pathinfo( $_SERVER['PHP_SELF'], PATHINFO_BASENAME );
		
		foreach( $botones as $key=>$value ){
			//si soy el boton que lleva a la pantalla que estoy mirando defino un string que vale 'activo'
			//sino soy ese boton defino un string que vale ''
			$css = '';
			if( $value['link'] == $archivo ) $css = 'activo';
			
			$botonesHTML .= sprintf($base, $css, $value['link'], $value['nombre']);
			$botonesHTML .= "\r\n";
		}
		return $botonesHTML;
	}
?>
<ul>
	<?php echo dibujarBotones(); ?>
</ul>