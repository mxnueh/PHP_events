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
    <title>Gestión de Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top; 
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        .btn-editar {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .btn-editar:hover {
            background-color: #0069d9;
        }
        .btn-agregar {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-agregar:hover {
            background-color: #45a049;
        }
        .no-eventos {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #777;
        }
        .contenedor-btn {
            text-align: center;
        }
        .descripcion {
            word-wrap: break-word; 
            white-space: pre-wrap; 
            max-width: 400px; 
        }
    </style>
</head>
<body>
    <div class="container">
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
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<td>" . $row["hora"] . "</td>";
                    echo "<td>" . $row["lugar"] . "</td>";
                    echo "<td class='descripcion'>" . $row["descripcion"] . "</td>";
                    echo "<td><a href='editar.php?id=" . $row["id"] . "' class='btn-editar'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-eventos'>No hay eventos registrados</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        
        <div class="contenedor-btn">
            <a href="index.php" class="btn-agregar">Volver al inicio</a>
        </div>
    </div>
</body>
</html>