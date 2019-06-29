<?php include('validacion/server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<br><br><br>
	<center>
	<div class="header">
		<h2>Iniciar Sesion</h2>
	</div>

<form action="ingreso.php" method="post" class="sub">
	<?php  include("validacion/errors.php") ?>
	<?php  include('validacion/validate.php') ?><br>
	<div class="input-group">
		<label>Correo<br></label>
		
		<input type="email" name="correo" value="<?php echo "$correo"; ?>" placeholder="Ingrese su correo" autocomplete="off">
		
	</div>
	<div class="input-group">
		<label>Contraseña</label>
		<input type="password" name="contrasena" placeholder="Ingrese su Contraseña">
	</div>
		<div class="input-group">
		<button type="submit" name="ingreso" class="btn">Iniciar Sesion</button>
	</div>
	<p>Todavia no es miembro?<a href="registro.php">Registrarse</a>
	</p>
</form>
</center>
</body>
</html>