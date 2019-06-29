<?php

session_start();
//quitar errores
error_reporting(0);
 
$varsesion = $_SESSION['correo'];
 
if($varsesion == null || $varsesion = ''){
    echo "Inicie sesion para poder realizar cambios en el sistema (SIN AUTORIZACION)."."<br>";
    echo "<a href='../ingreso.php'>INICIO</a>";
    die();
}
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
			<link rel="stylesheet" type="text/css" href="../css/stylerepo.css">

</head>
<body>
<div class="lateral">
	<div class="late">
		<img src="../img/logo.png" class="log">
	</div>

		<ul class="button">
			<li><a href="usuarios.php">Usuarios</a></li>
			<li><a href="subirpdf.php">Subir</a></li>
			<li><a href="lista.php">Cargar</a></li>
			<li><a href="../validacion/cerrar_sesion.php">Cerrar Sesion</a></li>
			<li></li>
		</ul>
		<h1>Sistema de Repositorio</h1>
	</div>


</body>
</html>