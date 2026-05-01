<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $precio_alquiler = $_POST['precio_alquiler'];
    $precio_venta = $_POST['precio_venta'];
    
    // Manejo de la imagen
    $imagen = '';
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $imagen = $target_file;
        }
    }

    $sql = "INSERT INTO equipos (nombre, descripcion, categoria, estado, precio_alquiler, precio_venta, imagen) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdds", $nombre, $descripcion, $categoria, $estado, $precio_alquiler, $precio_venta, $imagen);
    
    if ($stmt->execute()) {
        echo "Equipo creado con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Equipo - Duramet</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #f08c00;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #d67a00;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <div class="form-container">
        <h2>Crear Nuevo Equipo</h2>
        <form action="crear_equipo.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Equipo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="Disponible">Disponible</option>
                    <option value="En operación">En operación</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>
            <div class="form-group">
                <label for="precio_alquiler">Precio de Alquiler:</label>
                <input type="number" id="precio_alquiler" name="precio_alquiler" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de Venta:</label>
                <input type="number" id="precio_venta" name="precio_venta" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Equipo:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*">
            </div>
            <input type="submit" value="Crear Equipo">
        </form>
    </div>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>