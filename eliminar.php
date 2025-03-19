<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Registrar Evento</title>
    <link rel="stylesheet" href="estilos.css">    
</head>
<body>

    <h2>Administrador de Eventos</h2>
    <div class="container">
        
        <?php
        require_once "conexion.php";
        $query = "SELECT COUNT(*) as total FROM evento";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['total'] > 0) {
            $query = "SELECT * FROM evento";
            $result = mysqli_query($conexion, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) {
                echo "Dato: " . $fila['nombre'] . "<br>";
            }
        } else {
            echo "<p>No hay información disponible. Por favor, inserte datos primero.</p>";
            echo '<a href="agregar.php" class="btn">Insertar datos</a>';
        }
        ?>
    </div>
    <br>
</body>
</html>
