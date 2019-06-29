<?php include('validacion/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<br><br><br>
	<center>
	<div class="header">
		<h2>Registrarse</h2>
	</div>
<form action="registro.php" method="post">
	<?php  include('validacion/errors.php') ?>
	<?php  include('validacion/validate.php') ?><br>
	<div class="input-group">
		<label>Nombres y Apellidos<br></label>
		<input type="text" name="nombre" value="<?php echo "$nombre"; ?>" placeholder="Nombre y Apellido" autocomplete="off">
	</div>
	<div class="input-group">
		<label>Correo / Usuario<br></label>
		<input type="email" name="correo" value="<?php echo "$correo"; ?>" placeholder="Correo o Usuario" autocomplete="off">
	</div>
	<div class="input-group">
		<label>Contraseña<br></label>
		<input type="password" name="contrasena1" placeholder="Ingrese su contraseña">
	</div>
	<div class="input-group">
		<label>Confirmar contraseña<br></label>
		<input type="password" name="contrasena2" placeholder="Reingrese su contraseña">
	</div>
	<div class="input-group">
		<button type="submit" name="registro" class="btn">Registro</button>
	</div>
	<p>Ya es miembro?<a href="ingreso.php">Iniciar Sesion</a>
	</p>
</form>
</center>
</body>
</html>