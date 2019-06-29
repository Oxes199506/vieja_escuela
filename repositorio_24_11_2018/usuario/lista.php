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
	<title>archivos subidos</title>
				<link rel="stylesheet" type="text/css" href="../css/stylerepo.css">
					<link rel="stylesheet" type="text/css" href="../css/styles_tabla.css">


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

		<center><table>
			<tr>
			<td class="title">Titulo</td>
				<td class="title">Descripcion</td>
					<td class="title">Tamaño</td>
						<td class="title">Tipo</td>	
							<td class="title">Nombre</td>
			</tr>
		
<?php   
        include ("../validacion/conexion.php");
        include('../validacion/server.php');
error_reporting(0);
session_start();
//quitar errores

 
$varsesion = $_SESSION['correo'];
        $query="SELECT * FROM archivos WHERE usuario = '$varsesion'";
        $resultado=$conexion->query($query);
        while($row=$resultado->fetch_assoc()){
        ?> 
        <tr>
        	<td><?php echo $row['titulo'];?></td>
        		<td><?php echo $row['descripcion'];?></td>
        			<td><?php echo $row['size'];?> bites</td>
        				<td><?php echo $row['tipo'];?></td>
        					<td><a href="visualizar.php?id=<?php echo $row['id_doc'];?>" target="_BLANK"> 
        						<?php echo $row['nombre_archivo'];?> </a></td>
        </tr>
    <?php } ?>
        </table>
        </center>
</body>
</html>