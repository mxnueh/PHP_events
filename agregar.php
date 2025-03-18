<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar registro</title>
    <link rel="stylesheet" href="estilos.css">    
    
</head>
<body>
    <form action="" method = "POST" >
        <input type="text">
        <label for=""></label>

        <input type="date">
        <label for=""></label>

        <input type="time">
        <label for=""></label>

        <input type="text">
        <label for=""></label>

        <textarea name="" id=""></textarea>
    </form>

        
    <?php

    $mensajeConfirmacion = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = $_POST["mensaje"];

        $nombre = $conn->real_escape_string($nombre);
        $email = $conn->real_escape_string($email);
        $mensaje = $conn->real_escape_string($mensaje);

        $sql = "INSERT INTO nombre (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

        if ($conn->query($sql) === TRUE) {
            $mensajeConfirmacion = "El mensaje se envió correctamente.";
        } else {
            $mensajeConfirmacion = "Error al enviar el mensaje: " . $conn->error;
        }
    }

    ?>
</body>
</html>

