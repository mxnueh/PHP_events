<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar registro</title>
    <link rel="stylesheet" href="estilos.css">    
    
</head>
<body>
    
<form action="procesar.php" method="POST">
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

    <input type="submit" value="Guardar evento"></input>
</form>
</body>
</html>

