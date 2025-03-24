<?php

$servername = "localhost";
$username = "root";     
$password = "";  
$dbname = "eventos";     

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variable para almacenar mensajes
$mensaje = "";

// Verificar si se ha enviado un ID para eliminar
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); 
    
    // Usar consulta preparada para prevenir inyección SQL
    $stmt = $conn->prepare("DELETE FROM evento WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $mensaje = "El evento ha sido eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el evento: " . $conn->error;
    }
    $stmt->close();
}

$sql = "SELECT * FROM evento ORDER BY fecha DESC";
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
            margin: 0;
            padding: 20px;
            background-color:rgb(234, 235, 236);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #E63946;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .descripcion {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .btn-editar {
            background-color: #3498db;
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
            background-color: #2980b9;
        }
        .btn-eliminar {
            background-color: #E63946;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-left: 5px;
        }
        .btn-eliminar:hover {
            background-color: #c0392b;
        }
        .no-eventos {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
        }
        .mensaje {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            text-align: center;
        }
        .mensaje-exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .mensaje-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Eventos</h1>
        
        <?php
        // Mostrar mensaje si existe
        if(!empty($mensaje)) {
            echo '<div class="mensaje mensaje-exito">' . $mensaje . '</div>';
        }
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Lugar</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["fecha"]. "</td>";
                        echo "<td>" . $row["hora"] . "</td>";
                        echo "<td>" . $row["lugar"] . "</td>";
                        echo "<td class='descripcion'>" . $row["descripcion"] . "</td>";
                        echo "<td> 
                                <a href='eliminar.php?id=" . $row["id"] . "' class='btn-eliminar'>Eliminar</a> 
                             </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-eventos'>No hay eventos registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <br>
        <a href="index.php" class="btn-editar">Volver al inicio</a>
    </div>
</body>
</html>

<?php
// Cerrar conexión después de que se ha usado
$conn->close();
?>