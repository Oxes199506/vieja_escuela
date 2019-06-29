<?php 

require_once ('conexion.php');

$nombre = "";
$correo = "";
$errors = array();
$validate = array();


if (isset($_POST['registro'])){

	$nombre = ($_POST['nombre']);
	$correo = ($_POST['correo']);
	$contra1 =($_POST['contrasena1']);
	$contra2 =($_POST['contrasena2']);
	$correo_vali = ($_POST['correo']);
	$perfil = 'usuario';

	if(empty($nombre)){
		array_push($errors, "Nombre es requerido");
	}
	if(empty($correo)){
		array_push($errors, "Correo es requerido");
	}
	if(empty($contra1)){
		array_push($errors, "Contrasena es requerido");
	}
	if($contra1 != $contra2){
		array_push($errors, "Las contrasenas no coinciden");
	}

	if(count($errors) == 0){

		 $buscarUsuario = "SELECT * FROM usuario 
    WHERE correo = '$correo'";
    $result = $conexion->query($buscarUsuario);
    $count = mysqli_num_rows($result);  

 if ($count < 1){
 	 	$contrasena = md5($contra1);
		$sql = "INSERT INTO usuario (nombre, correo, contrasena, perfil) VALUES ('$nombre','$correo','$contrasena','$perfil')";
		$resultado = $conexion->query($sql);

		if($resultado > 0){
			array_push($validate, "Registrado Correctamente");
 	 	}		
	}else{
 	 		array_push($errors, "Correo/Usuario no disponible");
 	 	}
}
}	
//formulario de ingreso
	if (isset($_POST['ingreso'])) {
	session_start();

		$correo = $_POST['correo'];
		$contra = $_POST['contrasena']; 

		$_SESSION['correo'] = $correo;

		if(empty($correo)){
		array_push($errors, "Correo es requerido");
		}
		if(empty($contra)){
		array_push($errors, "Contraseña es requerido");
		}
		if (count($errors) == 0) {
			
		$contras = md5($contra);
		$consulta="SELECT nombre,correo,contrasena,perfil FROM usuario WHERE correo = '$correo' and contrasena = '$contras' and perfil = 'usuario'";
		$resultados=$conexion ->query($consulta);
			/*administrador*/
		$consultaa="SELECT nombre,correo,contrasena,perfil FROM usuario WHERE correo = '$correo' and contrasena = '$contras' and perfil = 'administrador'";
		$resultadosa=$conexion ->query($consultaa);	
 

$filas=mysqli_num_rows($resultados);
if($filas > 0){

	header("location: usuario/usuario.php");

}else{
		array_push($errors, "Contraseña/Correo Incorrectos");
 }
 /*administrador*/
 $filasa=mysqli_num_rows($resultadosa);
 if($filasa > 0){

		header("location: administrador/administrador.php");
}
}
}

/* Subir archivos a las carpetas*/
if (isset($_POST['subir'])){
session_start();
error_reporting(0);
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
		 if(empty($titulo)){
		array_push($errors, "Ingrese el Titulo");
		}
		if(empty($descripcion)){
		array_push($errors, "Ingrese una descripcion");
		}

			if (count($errors) == 0) {
			

/*Inicio de solo archivos pdf*/

if ($_FILES["pdf"]["error"]>0) {
					array_push($errors, "Ingrese un archivo para subir");
				}else{
					$permitidos = array("application/pdf");
					$limite_kb = 200000;

					if (in_array($_FILES["pdf"]["type"], $permitidos) && $_FILES["pdf"]['size']<= $limite_kb * 1024) {
						
			$nombre = $_FILES['pdf']['name'];
			$tipo = $_FILES['pdf']['type'];
			$size = $_FILES['pdf']['size'];
			$ruta = $_FILES['pdf']['tmp_name'];
			$destino = "../archivospdf/".$nombre;

				

/*if inicio guardar ruta en la base de datos*/
if(copy($ruta, $destino)){
				$varsesion = $_SESSION['correo'];	
/*buscar nombres de archivos y no subir si existe*/
				 /*$buscarpdf = "SELECT * FROM archivos
    WHERE nombre_archivo = '$nombre'";
    $result = $conexion->query($buscarpdf);
    $count = mysqli_num_rows($result);*/
/*if inicio conteo nombres
    if($count<1){ */

     $sql = "INSERT INTO archivos (titulo, descripcion, size, tipo, nombre_archivo, usuario) VALUES ('$titulo','$descripcion','$size', '$tipo','$nombre','$varsesion')";
$resultado = $conexion->query($sql);

/*if inicio validacion nombre*/if ($resultado){array_push($validate, "Archivo Subido Correctamente");}
    /*}else{array_push($errors, "Archivo existente cambie el nombre");}/*if fin*/
/*if fin*/

			}else{array_push($errors, "Ingrese un archivo");}
			/*if fin de guardado de ruta en la base*/

}else{array_push($errors, "Excede el tamaño en bites o el archivo no es permitido");}
}
				/*FIN solo pdf*/
}
}

 ?>