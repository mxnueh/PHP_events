<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Variable para mensajes de confirmación
    $mensaje = "";
    $tipo_mensaje = "";

    if(isset($_GET['mensaje']) && isset($_GET['tipo'])) {
        $mensaje = $_GET['mensaje'];
        $tipo_mensaje = $_GET['tipo'];
    }

    // Verificar si se ha enviado un ID
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT nombre, fecha, hora, lugar, descripcion FROM evento WHERE id = $id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            $evento = $result->fetch_assoc();
        } else {
            echo "<h2>No se encontró el evento.</h2>";
            exit;
        }
    } else {
        echo "ID de evento no especificado.";
        exit;
    }

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .btn-agregar {
            background-color: #007bff;
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
            background-color: #007bff;
        }
        .mensaje {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            color: white;
        }
        .exito {
            background-color: #4CAF50;
        }
        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2>Editar Evento</h2>
    
    <?php
    // Mostrar mensaje de confirmación si existe
    if(!empty($mensaje)) {
        $clase = ($tipo_mensaje == 'exito') ? 'exito' : 'error';
        echo "<div class='mensaje $clase'>$mensaje</div>";
    }
    ?>
    
    <form id="editar-form" action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="evento">Nombre del evento:</label>
        <input type="text" id="evento" name="evento" value="<?php echo $evento['nombre']; ?>" required>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $evento['fecha']; ?>" required>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" value="<?php echo $evento['hora']; ?>" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $evento['lugar']; ?>" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $evento['descripcion']; ?></textarea>

        <input type="submit" value="Actualizar evento">
    </form>
    
    <div>
        <a href="index.php" class="btn-agregar">Volver a la lista</a>
    </div>
</body>
</html>