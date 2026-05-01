<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duramet - Metalmecánica</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .service-hero {
            background-image: url('img/Balanceo/balance.jpeg');
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
            color: #1c3c60;
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

        .video-container {
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .video-container video {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    
    <section class="service-hero">
        <h1>Balanceo Dinámico</h1>
    </section>

    <section class="service-content">
        <div class="service-description">
        <h2>Optimización de rendimiento mediante Balanceo Dinámico</h2>
        <p>En Duramet, ofrecemos servicios de balanceo dinámico de alta precisión para optimizar el rendimiento y prolongar la vida útil de equipos rotativos, utilizando tecnología de vanguardia para diagnosticar y corregir desequilibrios en componentes giratorios como rotores industriales, ventiladores, sopladores, turbinas y bombas centrífugas. Nuestros servicios ayudan a reducir vibraciones y ruido, disminuir el desgaste prematuro, mejorar la eficiencia energética, aumentar la vida útil de los equipos y minimizar tiempos de inactividad no programados.</p>
        </div>

        <div class="video-container">
            <video controls poster="img/Balanceo/balance.jpeg">
                <source src="videos/BALANCEO DINAMICO.mp4" type="video/mp4">
                Su navegador no soporta el tag de video.
            </video>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="img/Balanceo/balanceo_3.jpg" alt="Proceso de metalización por arco eléctrico">
                <div class="gallery-caption">Equipo de balanceo de última generación</div>
            </div>
            <div class="gallery-item">
                <img src="img/Balanceo/balanceo_2.jpg" alt="Pieza metalizada resistente a la corrosión">
                <div class="gallery-caption">Balanceo de rotor industrial</div>
            </div>
            <div class="gallery-item">
                <img src="./metallic_structure.jpeg" alt="Metalización de grandes estructuras">
                <div class="gallery-caption">Análisis de vibración avanzado</div>
            </div>
            <div class="gallery-item">
                <img src="img/Balanceo/balanceo_1.jpg" alt="Detalle de superficie metalizada">
                <div class="gallery-caption">Proceso de corrección de desequilibrio</div>
            </div>
        </div>

        <div class="cta-section">
            <h3>¿Interesado en nuestros servicios de Balanceo Dinámico?</h3>
            <p>Contáctenos hoy mismo para obtener más información y una cotización personalizada para su proyecto.</p>
            <a href="./contacto.php" class="cta-button">Solicitar información</a>
        </div>
    </section>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>