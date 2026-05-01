<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duramet - Metalización</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .service-hero {
            background-image: url('./metallizing_person.jpeg');
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
        <h1>Metalización</h1>
    </section>

    <section class="service-content">
        <div class="service-description">
            <h2>Protección y mejora de superficies mediante metalización</h2>
            <p>En Duramét, ofrecemos servicios de metalización de vanguardia para proteger y mejorar las propiedades superficiales de diversos materiales. Nuestras técnicas avanzadas de aplicación de revestimientos metálicos proporcionan una excelente resistencia a la corrosión y al desgaste, además de mejorar las propiedades térmicas y eléctricas de los componentes.</p>
            <p>Utilizamos equipos de última generación y contamos con un equipo altamente capacitado para garantizar resultados de alta calidad en cada proyecto.</p>
        </div>

        <div class="video-container">
            <video controls poster="img/Balanceo/Metalizado caliente 01.png">
                <source src="videos/metalizacion.mp4" type="video/mp4">
                Su navegador no soporta el tag de video.
            </video>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="img/Metalizado/trabajo_realizado_frío_1.png" alt="Proceso de metalización por arco eléctrico">
                <div class="gallery-caption">Metalización en frío</div>
            </div>
            <div class="gallery-item">
                <img src="img/Metalizado/Metalizado caliente 01.png" alt="Pieza metalizada resistente a la corrosión">
                <div class="gallery-caption">Metalización en caliente</div>
            </div>
            <div class="gallery-item">
                <img src="./metallic_structure.jpeg" alt="Metalización de grandes estructuras">
                <div class="gallery-caption">Metalización de estructuras industriales</div>
            </div>
            <div class="gallery-item">
                <img src="./metallic_structure.jpeg" alt="Detalle de superficie metalizada">
                <div class="gallery-caption">Detalle de acabado metalizado</div>
            </div>
        </div>

        <div class="cta-section">
            <h3>¿Interesado en nuestros servicios de metalización?</h3>
            <p>Contáctenos hoy mismo para obtener más información y una cotización personalizada para su proyecto.</p>
            <a href="./contacto.php" class="cta-button">Solicitar información</a>
        </div>
    </section>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>