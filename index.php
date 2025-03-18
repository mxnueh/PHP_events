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
        <button class="green" onclick="window.location.href='agregar.php';">Agregar</button>
        <button class = "yellow" onclick="window.location.href='editar.php';">Editar</button>
        <button class = "red" onclick="window.location.href='eliminar.php';">Eliminar</button>
    </div>
    <br>


    
    <?php
    $servidor = "localhost";  
    $usuario = "root";       
    $clave = "";             
    $base_de_datos = "eventos";  

    $conexion = new mysqli($servidor, $usuario, $clave, $base_de_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    } else {
        echo "La conexion fue exitosa";
    }

    ?>
    
</body>
</html>

