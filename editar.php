<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verificar si se ha enviado un ID
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        
        // Obtener los datos del evento
        $sql = "SELECT nombre, fecha, hora, lugar, descripcion FROM evento WHERE id = $id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            $evento = $result->fetch_assoc();
        } else {
            echo "No se encontró el evento.";
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
</head>
<body>
    <h2>Editar Evento</h2>
    
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
    
    <p><a href="mostrar.php">Volver a la lista</a></p>
    
    <div id="mensaje-confirmacion" style="display: none;"></div>

    <script>
    document.getElementById('editar-form').addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const formData = new FormData(this);
        
        fetch('actualizar.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            const mensajeDiv = document.getElementById('mensaje-confirmacion');
            mensajeDiv.style.display = 'block';
            mensajeDiv.textContent = data;
            
            if(data.includes('correctamente')) {
                mensajeDiv.style.backgroundColor = '#4CAF50';
                setTimeout(function() {
                    window.location.href = 'mostrar.php';
                }, 2000);
            } else {
                mensajeDiv.style.backgroundColor = '#f44336';
            }
        })
        .catch(error => {
            const mensajeDiv = document.getElementById('mensaje-confirmacion');
            mensajeDiv.style.display = 'block';
            mensajeDiv.textContent = 'Error al actualizar la información: ' + error;
            mensajeDiv.style.backgroundColor = '#f44336';
        });
    });
    </script>
</body>
</html>