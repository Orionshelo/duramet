<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duramet - Nosotros</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .about-section {
            padding: 60px 20px;
            background-color: #f5f5f5;
        }
        .about-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .about-content h2 {
            color: #1c3c60;
            margin-bottom: 30px;
            text-align: center;
        }
        .about-content p {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .mission-vision {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .mission, .vision {
            flex-basis: 48%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .mission h3, .vision h3 {
            color: #f08c00;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    <section class="about-section">
        <div class="about-content">
            <h2>Sobre Nosotros</h2>
            <p>Duramét es una empresa líder en el sector de la metalurgia y metalmecánica, dedicada a proporcionar soluciones innovadoras y de alta calidad a nuestros clientes. Con años de experiencia en la industria, nos hemos consolidado como un referente en metalización, metalmecánica, balanceo dinámico y control de sólidos.</p>
            <p>Nuestro compromiso con la excelencia y la satisfacción del cliente nos impulsa a ofrecer un servicio integral, desde la concepción del proyecto hasta su implementación y mantenimiento. En Duramét, combinamos tecnología de vanguardia con un equipo altamente capacitado para garantizar resultados excepcionales en cada proyecto que emprendemos.</p>
            
            <div class="mission-vision">
                <div class="mission">
                    <h3>Misión</h3>
                    <p>Ofrecer un servicio con altos estándares de calidad, responsabilidad y compromiso hacia nuestros clientes, proveedores y el reconocimiento que nos han dado al termino de 5 años de fundada nuestra organización.</p>
                </div>
                <div class="vision">
                    <h3>Visión</h3>
                    <p>Nuestra organización atenderá el mercado local y el mercado nacional basada en el crecimiento y el desarrollo de todas las especialidades desplegando recurso humano para este fin. Desarrollaremos estrategias para implementar metalizaciones, balanceo en sitio y mecanizados con tecnología computarizada. En el año 2025 queremos posicionarnos como la mejor opción en requerimientos que sean de alta complejidad en formas, tiempos y ejecución.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>