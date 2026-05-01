<?php
include 'db_connection.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No se proporcionó un ID de equipo válido.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM equipos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: No se encontró ningún equipo con el ID proporcionado.");
}

$equipo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo - Duramet</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <div class="container">
        <h1>Editar Equipo</h1>

        <div class="form-container">
            <form action="procesar_edicion.php" method="post">
                <input type="hidden" name="id" value="<?php echo $equipo['id']; ?>">
                
                <div class="form-group">
                    <label for="nombre">Nombre del Equipo:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($equipo['nombre']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($equipo['descripcion']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($equipo['categoria']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="Disponible" <?php echo $equipo['estado'] == 'Disponible' ? 'selected' : ''; ?>>Disponible</option>
                        <option value="En operación" <?php echo $equipo['estado'] == 'En operación' ? 'selected' : ''; ?>>En operación</option>
                        <option value="Vendido" <?php echo $equipo['estado'] == 'Vendido' ? 'selected' : ''; ?>>Vendido</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="precio_alquiler">Precio de Alquiler:</label>
                    <input type="number" id="precio_alquiler" name="precio_alquiler" value="<?php echo $equipo['precio_alquiler']; ?>" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="precio_venta">Precio de Venta:</label>
                    <input type="number" id="precio_venta" name="precio_venta" value="<?php echo $equipo['precio_venta']; ?>" step="0.01" required>
                </div>

                <button type="submit">Actualizar Equipo</button>
            </form>
        </div>
    </div>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>