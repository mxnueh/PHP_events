<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $lugar = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    
    $sql = "UPDATE evento SET 
            nombre = '$nombre',
            fecha = '$fecha',
            hora = '$hora',
            lugar = '$lugar',
            descripcion = '$descripcion'
            WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de mostrar con un mensaje de éxito
        header("Location: mostrar.php?mensaje=Evento actualizado correctamente&tipo=exito");
        exit;
    } else {
        // Redirigir de vuelta al formulario con un mensaje de error
        header("Location: editar.php?id=$id&mensaje=Error al actualizar: " . $conn->error . "&tipo=error");
        exit;
    }
}

$conn->close();
?>