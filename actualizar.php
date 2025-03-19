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
        $id = $_POST["id"];
        $nombre = $_POST["evento"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];

        $sql = "UPDATE evento SET 
                nombre = '$nombre', 
                fecha = '$fecha', 
                hora = '$hora', 
                lugar = '$ubicacion', 
                descripcion = '$descripcion' 
                WHERE id = $id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Evento actualizado correctamente";
        } else {
            echo "Error al actualizar evento: " . $conn->error;
        }
    } else {
        echo "Método no permitido";
    }
    
    $conn->close();
?>