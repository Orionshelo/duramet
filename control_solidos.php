<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duramet - Control de Sólidos</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .service-hero {
            background-image: url('img/Control de sólidos/control_solidos.jpeg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }
        .service-hero h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }
        .service-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        .service-description {
            margin-bottom: 40px;
            line-height: 1.6;
        }
        .service-description h2 {
            color: #1c3c60
        }
        .service-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.7);
            color: #fff;
            padding: 10px;
            text-align: center;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }
        .cta-section {
            background-color: #f5f5f5;
            padding: 40px;
            text-align: center;
            border-radius: 8px;
        }
        .cta-button {
            display: inline-block;
            background-color: #f08c00;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .cta-button:hover {
            background-color: #d67a00;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    
    <section class="service-hero">
        <h1>Control de Sólidos</h1>
    </section>

    <section class="service-content">
        <div class="service-description">
        <h2>Soluciones integrales para el Control de Sólidos</h2>
        <p>En Duramét, ofrecemos soluciones avanzadas para el control de sólidos en diversos procesos industriales. Nuestros sistemas de separación y filtración están diseñados para mejorar la eficiencia de los procesos, reducir costos operativos y cumplir con las normativas ambientales más exigentes.</p>
        <p>Nuestros servicios de control de sólidos incluyen:</p>
            <ul>
                <li>Diseño e implementación de sistemas de separación de sólidos</li>
                <li>Instalación y mantenimiento de equipos de filtración</li>
                <li>Optimización de procesos de control de sólidos</li>
                <li>Tratamiento y manejo de lodos industriales</li>
                <li>Sistemas de recuperación y reciclaje de sólidos</li>
            </ul>
            <p>Industrias que atendemos:</p>
            <ul>
                <li>Minería</li>
                <li>Petróleo y gas</li>
                <li>Tratamiento de aguas</li>
                <li>Industria química</li>
                <li>Procesamiento de alimentos</li>
            </ul>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="img/Venta y renta de equipos/Centrifugas/centrifuga_518.png" alt="Proceso de metalización por arco eléctrico">
                <div class="gallery-caption">Sistema avanzado de separación de sólido</div>
            </div>
            <div class="gallery-item">
                <img src="img/Venta y renta de equipos/Centrifugas/centrifuga_gtech.jpg" alt="Pieza metalizada resistente a la corrosión">
                <div class="gallery-caption">Equipo de filtración de alta eficiencia</div>
            </div>
            <div class="gallery-item">
                <img src="img/Venta y renta de equipos/Centrifugas/centrifuga_kubco}.jpg" alt="Metalización de grandes estructuras">
                <div class="gallery-caption">Planta de tratamiento de lodos industriales</div>
            </div>
            <div class="gallery-item">
                <img src="img/Venta y renta de equipos/Tanques/tanque_mezcla.jpg" alt="Detalle de superficie metalizada">
                <div class="gallery-caption">Sistema de recuperación y reciclaje de sólidos</div>
            </div>
        </div>

        <div class="cta-section">
            <h3>¿Busca mejorar el control de sólidos en su proceso industrial?</h3>
            <p>Contáctenos hoy mismo para obtener más información y una cotización personalizada para su proyecto.</p>
            <a href="./contacto.php" class="cta-button">Solicitar información</a>
        </div>
    </section>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>