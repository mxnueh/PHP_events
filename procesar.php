<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $mensajeConfirmacion = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["evento"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];

        $sql = "INSERT INTO evento (nombre, fecha, hora, lugar, descripcion) VALUES ('$nombre', '$fecha', '$hora', '$ubicacion', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            $mensajeConfirmacion = "El mensaje se envió correctamente.";
        } else {
            $mensajeConfirmacion = "Error al enviar el mensaje: " . $conn->error;
        }
    }

?>