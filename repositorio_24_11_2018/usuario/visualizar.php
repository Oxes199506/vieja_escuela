<!DOCTYPE html>
<html>
<head>
	<title>Datos</title>
</head>
<body>
<?php   
        include ("../validacion/conexion.php");
        $query="SELECT * FROM archivos WHERE id_doc=".$_GET['id'];
        $resultado=$conexion->query($query);
        if ($row=$resultado->fetch_assoc()){
        	if ($row['nombre_archivo']=="") {?>
        		<p>No tiene archivos</p>
        	<?php 
        } else{
        	header('content-type: application/pdf');
        	readfile('../archivospdf/'.$row['nombre_archivo']);}}
        	?>
        		
</body>
</html>