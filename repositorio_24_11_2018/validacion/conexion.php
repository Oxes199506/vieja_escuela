<?php  

$hostdb = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'sr_web';

$conexion = new mysqli($hostdb, $userdb, $passdb, $namedb);

if($conexion == true){
	echo "";
}else{
	echo "conexion erronea";
}


?>