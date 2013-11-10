 <?php
	require_once('configuracion.php');
	
	if(!PRODUCCION){
		$_POST[''] = true;
	}
	
    // en alta-usuario-template.php esta el form que tiene por action el presente archivo, y tiene un campo oculto alta-usuario
	$vengoForm = isset($_POST['alta-usuario']);

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
        } else{
            require_once('inc/alta-guardar.php');
            guardarDatos( $_POST ); // en alta-guardar.php
            header('location: listado-usuarios.php');
        }
	} else {
		$sexoM = 'checked="checked"';
		$sexoF = '';
		$errores = '';
		$sectorActivo = '';
	}
	
	require_once('inc/funciones.php');
	$sectores = dibujoSectores( $sectorActivo );
 
	$titulo = 'Alta de Usuarios';
	include('inc/encabezado.template.php');
	include_once('inc/alta-usuario.template.php');
	include_once('inc/pie.template.php');
?>