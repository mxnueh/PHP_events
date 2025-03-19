<?php
$servidor = "localhost";  
$usuario = "root";       
$clave = "";             
$base_de_datos = "eventos";  

$conexion = new mysqli($servidor, $usuario, $clave, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>
