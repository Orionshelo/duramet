<?php
include 'db_connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$categoria_filtro = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$categorias_query = "SELECT DISTINCT categoria FROM equipos ORDER BY categoria ASC";
$categorias_result = $conn->query($categorias_query);
$categorias = $categorias_result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * FROM equipos WHERE estado IN ('Disponible', 'En operación', 'Vendido')";
$params = [];
$types = "";

if (!empty($search)) {
    $sql .= " AND (nombre LIKE ? OR descripcion LIKE ?)";
    $searchParam = "%$search%";
    $params[] = $searchParam;
    $params[] = $searchParam;
    $types .= "ss";
}

if (!empty($categoria_filtro)) {
    $sql .= " AND categoria = ?";
    $params[] = $categoria_filtro;
    $types .= "s";
}

$sql .= " ORDER BY nombre ASC";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler y Venta de Equipos Industriales | Duramet</title>
    <meta name="description" content="Alquiler y venta de equipos industriales especializados. Metalización, balanceo dinámico, control de sólidos. Disponibilidad inmediata en Bogotá.">
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .alquiler-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 80px 20px;
            text-align: center;
            color: white;
        }
        .alquiler-hero h1 {
            font-size: 2.5rem;
            margin: 0 0 15px;
        }
        .alquiler-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto 25px;
        }
        .search-section {
            background: var(--light);
            padding: 30px 20px;
        }
        .search-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .search-inputs {
            display: flex;
            flex: 1;
            gap: 15px;
            min-width: 300px;
        }
        .search-inputs input, .search-inputs select {
            flex: 1;
            padding: 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
        }
        .search-inputs input:focus, .search-inputs select:focus {
            outline: none;
            border-color: var(--accent);
        }
        .search-button {
            padding: 14px 28px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: var(--transition);
        }
        .search-button:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
        }
        .equipment-grid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        .equipment-item {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        .equipment-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        .equipment-item img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .equipment-info {
            padding: 20px;
        }
        .equipment-item h3 {
            margin: 0 0 10px;
            color: var(--primary);
            font-size: 1.2rem;
        }
        .equipment-item .price {
            font-weight: 800;
            color: var(--accent);
            font-size: 1.3rem;
            margin: 10px 0 5px;
        }
        .equipment-item .price-venta {
            font-weight: 600;
            color: var(--gray);
            font-size: 1rem;
            margin: 0 0 15px;
        }
        .equipment-item .status {
            font-size: 13px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .status-disponible { background: #e8f5e9; color: #2e7d32; }
        .status-operacion { background: #fff3e0; color: #f57c00; }
        .status-vendido { background: #ffebee; color: #c62828; }
        .equipment-actions {
            display: flex;
            gap: 10px;
        }
        .btn-details {
            flex: 1;
            display: block;
            padding: 10px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            transition: var(--transition);
        }
        .btn-details:hover { background: var(--accent); }
        .btn-whatsapp-equip {
            flex: 1;
            display: block;
            padding: 10px;
            background: var(--whatsapp);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            transition: var(--transition);
        }
        .btn-whatsapp-equip:hover { background: #1ebd57; }
        @media (max-width: 768px) {
            .search-inputs { flex-direction: column; }
            .search-button { width: 100%; }
            .alquiler-hero h1 { font-size: 1.8rem; }
            .equipment-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <section class="alquiler-hero">
        <h1>Equipos Industriales para Alquiler y Venta</h1>
        <p>Maquinaria especializada de última generación con disponibilidad inmediata. Soporte técnico incluido en todos nuestros equipos.</p>
        <a href="https://wa.me/576012683565?text=Hola%2C%20necesito%20alquilar%20un%20equipo" target="_blank" class="btn-hero-primary">Solicitar Cotización</a>
    </section>

    <section class="search-section">
        <div class="search-container">
            <form action="" method="GET" class="search-form">
                <div class="search-inputs">
                    <input type="text" name="search" placeholder="Buscar equipo..." value="<?php echo htmlspecialchars($search); ?>">
                    <select name="categoria">
                        <option value="">Todas las categorías</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['categoria']); ?>" <?php echo ($categoria_filtro == $cat['categoria']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['categoria']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="search-button">Buscar</button>
            </form>
        </div>
    </section>

    <div class="equipment-grid">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='equipment-item'>";
                if (!empty($row['imagen'])) {
                    echo "<img src='" . htmlspecialchars($row['imagen']) . "' alt='" . htmlspecialchars($row['nombre']) . "' loading='lazy'>";
                } else {
                    echo "<img src='placeholder.jpg' alt='Imagen no disponible'>";
                }
                echo "<div class='equipment-info'>";
                echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                echo "<p class='price'>Alquiler: $" . number_format($row['precio_alquiler'], 0, ',', '.') . "/día</p>";
                echo "<p class='price-venta'>Venta: $" . number_format($row['precio_venta'], 0, ',', '.') . " COP</p>";
                
                $estado_clase = '';
                $estado_texto = htmlspecialchars($row['estado']);
                switch($row['estado']) {
                    case 'Disponible': $estado_clase = 'status-disponible'; break;
                    case 'En operación': $estado_clase = 'status-operacion'; $estado_texto = 'En Operación'; break;
                    case 'Vendido': $estado_clase = 'status-vendido'; $estado_texto = 'Vendido'; break;
                }
                echo "<span class='status " . $estado_clase . "'>" . $estado_texto . "</span>";
                
                echo "<div class='equipment-actions'>";
                echo "<a href='detalle_equipo.php?id=" . $row['id'] . "' class='btn-details'>Ver Detalles</a>";
                echo "<a href='https://wa.me/576012683565?text=Hola%2C%20me%20interesa%20" . urlencode($row['nombre']) . "' target='_blank' class='btn-whatsapp-equip'>Cotizar</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p style='text-align:center;grid-column:1/-1;color:var(--gray);font-size:1.1rem;'>No se encontraron equipos con los filtros seleccionados.</p>";
        }
        ?>
    </div>

    <a href="https://wa.me/576012683565?text=Hola%2C%20quiero%20información%20sobre%20equipos" target="_blank" class="whatsapp-float" aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="whatsapp-tooltip">¡Chatea con nosotros!</span>
    </a>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>
