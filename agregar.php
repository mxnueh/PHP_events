<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar registro</title>
    <link rel="stylesheet" href="estilos.css">    
    <style>
        .mensaje-confirmacion {
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
        
        .btn-volver {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
<?php
// Mostrar mensaje de confirmación si existe
if(isset($_GET['mensaje'])) {
    $clase = (isset($_GET['error']) && $_GET['error'] == 1) ? 'mensaje-confirmacion error' : 'mensaje-confirmacion';
    echo "<div class='{$clase}'>{$_GET['mensaje']}</div>";
}
?>

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
<a href="index.php" class="btn-volver">Volver a la lista</a>


</body>
</html>