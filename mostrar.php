<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, nombre, fecha, hora, lugar, descripcion FROM evento";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar registro</title>
    <link rel="stylesheet" href="estilos.css">  
</head>
<body>
    <h2>Lista de Eventos</h2>
    
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        
        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . $row["hora"] . "</td>";
                echo "<td>" . $row["lugar"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay eventos registrados</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    
    <p><a href="agregar.php">Agregar nuevo evento</a></p>
</body>
</html>