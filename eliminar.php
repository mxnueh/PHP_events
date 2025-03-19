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
    echo '<a href="formulario_insercion.php" class="btn">Insertar datos</a>';
}
?>