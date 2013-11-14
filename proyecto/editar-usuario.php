<?php
var_dump($_GET);
	require_once('configuracion.php');
	require_once('inc/db.php');
	
	if(!PRODUCCION){
		$_POST[''] = true;
	}
	
    // en alta-usuario-template.php esta el form que tiene por action el presente archivo, y tiene un campo oculto alta-usuario
	$vengoForm = isset($_POST['editar-usuario']);

	if ($vengoForm ){
		//var_dump( $_POST, $_FILES);die();
        require_once('alta-usuario-validar.php'); // la funcionalidad de validar datos
		//inyecto la imagen dentro del paquete que vino por POST
		$_POST['imagen'] = $_FILES['imagen'];
		$errores = validarDatos( $_POST); // en alta-usuario-validar.php
        if (!empty($errores)){
            $sectorActivo = $_POST['sector'];
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $clave = $_POST['clave'];
            $clave2 = $_POST['clave2'];
            $email = $_POST['email'];
            $nacimiento = $_POST['nacimiento'];
            $imagen = $_POST['imagen'];
            if( !isset( $campos['acepto'] ) ){
                $campos['acepto'] = '';
            }
        } else{
            require_once('inc/alta-guardar.php');
            guardarDatos( $_POST ); // en alta-guardar.php
            header('location: listado-usuarios.php');
        }
	} else {
		$datos = getUsuarioById($_POST['id']);
		$sexoM = 'checked="checked"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
	
	require_once('inc/funciones.php');
	$sectores = dibujoSectores( $sectorActivo );
 
	$titulo = 'Editar de Usuarios';
	include('inc/encabezado.template.php');
	include_once('inc/alta-usuario.template.php');
	include_once('inc/pie.template.php');
?>
?>