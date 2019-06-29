<?php 
include('../validacion/server.php');
error_reporting(0);
session_start();
//quitar errores

 
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
	<title></title>
			<link rel="stylesheet" type="text/css" href="../css/stylerepo.css">
</head>
<body>
<div class="lateral">
	<div class="late">
		<img src="../img/logo.png" class="log">
	</div>

		<ul class="button">
			<li><a href="usuario.php">Inicio</a></li>
			<li><a href="subirpdf.php">Subir</a></li>
			<li><a href="lista.php">Cargar</a></li>
			<li><a href="../validacion/cerrar_sesion.php">Cerrar Sesion</a></li>
			<li></li>
		</ul>
		<h1>Sistema de Repositorio</h1>	
	
</div>
	<center>
<br>
	<form action="subirpdf.php" method="post" enctype="multipart/form-data" class="sub">
	<?php  include("../validacion/errors.php")?>
	<?php  include('../validacion/validate.php')?><br>
	<label>Titulo<br></label>
		<input type="text" name="titulo" placeholder="Ingrese el nombre" value="<?php echo "$titulo"; ?>"><br>
	<label>Descripcion<br></label>
		<textarea placeholder="Ingrese la descripcion" name="descripcion" value="<?php echo "$descripcion"; ?>"></textarea><br>
		<label>Subir Archivo<br></label>
		<input type="file" name="pdf" class="file">
<br><br>
		<button type="submit" name="subir" class="btn">Subir</button>
	</form>

</center>
</body>
</html>