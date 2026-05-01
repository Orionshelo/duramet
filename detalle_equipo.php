<?php
include 'db_connection.php';

// Obtener el ID del equipo de la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    // Redirigir a la página de alquiler si no se proporciona un ID válido
    header("Location: alquiler.php");
    exit();
}

// Consulta para obtener los detalles del equipo
$sql = "SELECT * FROM equipos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirigir a la página de alquiler si no se encuentra el equipo
    header("Location: alquiler.php");
    exit();
}

$equipo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($equipo['nombre']); ?> - Duramet</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .equipo-detalle {
            display: flex;
            gap: 40px;
            margin-top: 20px;
        }
        .equipo-imagen {
            flex: 1;
            max-width: 500px;
        }
        .equipo-imagen img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .equipo-info {
            flex: 1;
        }
        .equipo-nombre {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .equipo-descripcion {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .equipo-precio {
            font-size: 20px;
            font-weight: bold;
            color: #f08c00;
            margin-bottom: 10px;
        }

        .equipo-precio-venta{
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .equipo-categoria {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .cta-button {
            display: inline-block;
            background-color: #f08c00;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
        }
        .status-container {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .status-label {
            font-size: 20px;
            color: #333;
            font-weight: bold;
            margin-right: 8px;
        }

        .status {
            font-size: 18px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .status-disponible {
            background-color: #e8f5e9;
            color: #4CAF50;
            border: 1px solid #4CAF50;
        }

        .status-operacion {
            background-color: #fff3e0;
            color: #FF9800;
            border: 1px solid #FF9800;
        }

        .status-vendido {
            background-color: #ffebee;
            color: #B71C1C;
            border: 1px solid #B71C1C;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <div class="container">
        <div class="equipo-detalle">
            <div class="equipo-imagen">
                <?php
                if (!empty($equipo['imagen'])) {
                    echo "<img src='" . htmlspecialchars($equipo['imagen']) . "' alt='" . htmlspecialchars($equipo['nombre']) . "'>";
                } else {
                    echo "<img src='placeholder.jpg' alt='Imagen no disponible'>";
                }
                ?>
            </div>
            <div class="equipo-info">
                <h1 class="equipo-nombre"><?php echo htmlspecialchars($equipo['nombre']); ?></h1>
                <p class="equipo-descripcion"><?php echo htmlspecialchars($equipo['descripcion']); ?></p>
                <p class="equipo-precio">Precio de alquiler: $<?php echo number_format($equipo['precio_alquiler']); ?>/día</p>
                <p class="equipo-precio-venta">Precio de venta: $<?php echo number_format($equipo['precio_venta']); ?> COP</p>
                <p class="equipo-categoria">Categoría: <?php echo htmlspecialchars($equipo['categoria']); ?></p>
                <?php
                $estado_clase = '';
                switch($equipo['estado']) {
                    case 'Disponible':
                        $estado_clase = 'status-disponible';
                        break;
                    case 'En operación':
                        $estado_clase = 'status-operacion';
                        break;
                    case 'Vendido':
                        $estado_clase = 'status-vendido';
                        break;
                }
                ?>
                <div class="status-container">
                    <span class="status-label">Estado:</span>
                    <span class="status <?php echo $estado_clase; ?>"><?php echo htmlspecialchars($equipo['estado']); ?></span>
                </div>
                <a href="contacto.php?equipo=<?php echo urlencode($equipo['nombre']); ?>" class="cta-button">Solicitar información</a>
            </div>
        </div>
    </div>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>