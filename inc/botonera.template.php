<?php 
	function dibujarBotones(){
		$botones[] = array('nombre'=>'Inicio','link'=>'index.php');
		$botones[] = array('nombre'=>'Alta de Productos','link'=>'alta-productos.php');
		$botones[] = array('nombre'=>'Listado de Productos','link'=>'listado-productos.php');
		$botones[] = array('nombre'=>'Perfil Usuario','link'=>'perfil-usuario.php');

		$botonesHTML = '';
		// ssi defimo dos variables las toma como key value
		foreach($botones as $key=>$value){
			$base='<li><a href="%s">%s</a></li>';
			$botonesHTML .= sprintf($base, $value['link'], $value['nombre']);
			$botonesHTML .= "\r\n";
		}
		return $botonesHTML;
	}
?>
<ul>
	<?php echo dibujarBotones();?>
</ul>