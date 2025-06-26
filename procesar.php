<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $lugar = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    
    $sql = "INSERT INTO evento (nombre, fecha, hora, lugar, descripcion) 
            VALUES ('$nombre', '$fecha', '$hora', '$lugar', '$descripcion')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página del formulario con un mensaje de éxito
        header("Location: agregar.php?mensaje=Información guardada correctamente");
        exit;
    } else {
        // Redirigir a la página del formulario con un mensaje de error
        header("Location: agregar.php?mensaje=Error al guardar la información: " . $conn->error . "&error=1");
        exit;
    }
}

$conn->close();
?>