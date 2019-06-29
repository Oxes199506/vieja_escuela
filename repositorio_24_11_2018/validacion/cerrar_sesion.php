<?php
 
session_start();
 
session_destroy();
 
echo '<script> alert("Vuelve pronto, GRACIAS."); </script>';
echo '<script> window.location = "../ingreso.php"; </script>';

?>
 