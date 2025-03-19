<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar registro</title>
    <link rel="stylesheet" href="estilos.css">    
    <style>
        #mensaje-confirmacion {
            display: none;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    
<form id="evento-form" action="procesar.php" method="POST">
    <label for="evento">Nombre del evento:</label>
    <input type="text" id="evento" name="evento" required>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required>

    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" required>

    <label for="ubicacion">Ubicación:</label>
    <input type="text" id="ubicacion" name="ubicacion" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea>

    <input type="submit" value="Guardar evento">
</form>

<div id="mensaje-confirmacion"></div>

<script>
document.getElementById('evento-form').addEventListener('submit', function(event) {
    event.preventDefault(); 
    
    const formData = new FormData(this);
    
    fetch('procesar.php', {
        method: 'POST',
        body: formData
    })
    

    .then(response => response.text())
    .then(data => {
        const mensajeDiv = document.getElementById('mensaje-confirmacion');
        mensajeDiv.style.display = 'block';
        mensajeDiv.textContent = 'Información guardada correctamente';
        mensajeDiv.classList.remove('error');
        
        document.getElementById('evento-form').reset();
    })
    .catch(error => {
        const mensajeDiv = document.getElementById('mensaje-confirmacion');
        mensajeDiv.style.display = 'block';
        mensajeDiv.textContent = 'Error al guardar la información: ' + error;
        mensajeDiv.classList.add('error');
    });
});
</script>

</body>
</html>