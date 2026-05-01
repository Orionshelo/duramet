<?php
include 'db_connection.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    $categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : '';
    $estado = isset($_POST['estado']) ? trim($_POST['estado']) : '';
    $precio_alquiler = isset($_POST['precio_alquiler']) ? floatval($_POST['precio_alquiler']) : 0;
    $precio_venta = isset($_POST['precio_venta']) ? floatval($_POST['precio_venta']) : 0;

    // Validar los datos
    if ($id === 0 || empty($nombre) || empty($descripcion) || empty($categoria) || empty($estado)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Preparar la consulta SQL
    $sql = "UPDATE equipos SET nombre = ?, descripcion = ?, categoria = ?, estado = ?, precio_alquiler = ?, precio_venta = ? WHERE id = ?";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("ssssddi", $nombre, $descripcion, $categoria, $estado, $precio_alquiler, $precio_venta, $id);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Éxito
        $mensaje = "El equipo ha sido actualizado correctamente.";
    } else {
        // Error
        $mensaje = "Error al actualizar el equipo: " . $conn->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Si no se envió el formulario, redirigir a la página de lista de equipos
    header("Location: lista_equipos.php");
    exit();
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Edición - Duramet</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .message {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <div class="container">
        <h1>Resultado de la Edición</h1>
        
        <div class="message <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'success'; ?>">
            <?php echo $mensaje; ?>
        </div>
        
        <a href="lista_equipos.php" class="btn">Volver a la Lista de Equipos</a>
    </div>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>