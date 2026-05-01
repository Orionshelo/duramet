<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Duramet | Metalización, Metalmecánica y Más</title>
    <meta name="description" content="Servicios profesionales de metalización, metalmecánica, balanceo dinámico, control de sólidos y alquiler de equipos industriales en Bogotá.">
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .services-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 80px 20px;
            text-align: center;
            color: white;
        }
        .services-hero h1 {
            font-size: 2.5rem;
            margin: 0 0 15px;
        }
        .services-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto 25px;
        }
        .services-hero .btn-hero-primary {
            font-size: 16px;
            padding: 14px 28px;
        }
        .services-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }
        .service-item {
            display: flex;
            margin-bottom: 80px;
            align-items: center;
            gap: 50px;
        }
        .service-item:nth-child(even) { flex-direction: row-reverse; }
        .service-icon-large {
            flex: 0 0 120px;
            height: 120px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }
        .service-details { flex: 1; }
        .service-details h2 {
            color: var(--primary);
            margin: 0 0 15px;
            font-size: 1.8rem;
        }
        .service-details p {
            margin-bottom: 20px;
            line-height: 1.7;
            color: var(--gray);
        }
        .service-features {
            list-style: none;
            padding: 0;
            margin: 0 0 25px;
        }
        .service-features li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
            color: var(--dark);
        }
        .service-features li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--accent);
            font-weight: 700;
        }
        .service-cta {
            display: inline-block;
            background-color: var(--accent);
            color: white;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            margin-right: 10px;
        }
        .service-cta:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(240, 140, 0, 0.3);
        }
        .service-cta-whatsapp {
            display: inline-block;
            background-color: var(--whatsapp);
            color: white;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
        }
        .service-cta-whatsapp:hover {
            background-color: #1ebd57;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .service-item, .service-item:nth-child(even) {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            .service-icon-large { margin: 0 auto; }
            .service-features li { text-align: left; }
            .services-hero h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <?php include 'layouts/header.php'; ?>

    <section class="services-hero">
        <h1>Servicios Industriales de Alta Tecnología</h1>
        <p>Soluciones integrales para la industria colombiana con tecnología de punta y personal altamente capacitado.</p>
        <a href="https://wa.me/573103489282?text=Hola%2C%20necesito%20cotizar%20un%20servicio" target="_blank" class="btn-hero-primary">Cotizar Ahora por WhatsApp</a>
    </section>

    <section class="services-content">
        <div class="service-item">
            <div class="service-icon-large" style="background-color: #f0a500;">&#9881;</div>
            <div class="service-details">
                <h2>Metalización de Precisión</h2>
                <p>Recubrimientos metálicos avanzados con tecnología computarizada para proteger y mejorar las propiedades de sus piezas y equipos industriales.</p>
                <ul class="service-features">
                    <li>Protección anticorrosiva de larga duración</li>
                    <li>Restauración de piezas desgastadas</li>
                    <li>Mejora de propiedades térmicas y eléctricas</li>
                    <li>Tecnología de proyección térmica CNC</li>
                </ul>
                <a href="metalizacion.php" class="service-cta">Ver Detalles →</a>
                <a href="https://wa.me/573103489282?text=Hola%2C%20quiero%20cotizar%20metalización" target="_blank" class="service-cta-whatsapp">Cotizar</a>
            </div>
        </div>

        <div class="service-item">
            <div class="service-icon-large" style="background-color: #b0b0b0;">&#9881;</div>
            <div class="service-details">
                <h2>Metalmecánica Integral</h2>
                <p>Servicios completos de mecanizado, soldadura y fabricación de piezas y estructuras metálicas a medida.</p>
                <ul class="service-features">
                    <li>Torneado y fresado de precisión</li>
                    <li>Soldadura especializada (MIG, TIG, electrodo)</li>
                    <li>Fabricación de piezas y estructuras</li>
                    <li>Reparación de componentes industriales</li>
                </ul>
                <a href="metalmecanica.php" class="service-cta">Ver Detalles →</a>
                <a href="https://wa.me/573103489282?text=Hola%2C%20quiero%20cotizar%20metalmecánica" target="_blank" class="service-cta-whatsapp">Cotizar</a>
            </div>
        </div>

        <div class="service-item">
            <div class="service-icon-large" style="background-color: #d90000;">&#9881;</div>
            <div class="service-details">
                <h2>Balanceo Dinámico en Sitio</h2>
                <p>Diagnóstico y corrección de desequilibrios en equipos rotativos sin necesidad de desmontaje, directamente en sus instalaciones.</p>
                <ul class="service-features">
                    <li>Servicio a domicilio en toda Colombia</li>
                    <li>Reducción de vibraciones y ruido</li>
                    <li>Extensión de vida útil de equipos</li>
                    <li>Equipos de diagnóstico de última generación</li>
                </ul>
                <a href="balanceo_dinamico.php" class="service-cta">Ver Detalles →</a>
                <a href="https://wa.me/573103489282?text=Hola%2C%20necesito%20balanceo%20dinámico" target="_blank" class="service-cta-whatsapp">Cotizar</a>
            </div>
        </div>

        <div class="service-item">
            <div class="service-icon-large" style="background-color: #d16e46;">&#9881;</div>
            <div class="service-details">
                <h2>Control de Sólidos Avanzado</h2>
                <p>Sistemas integrales de separación y filtración para optimizar procesos industriales y cumplir normativas ambientales.</p>
                <ul class="service-features">
                    <li>Sistemas de separación de sólidos</li>
                    <li>Filtración industrial de alta eficiencia</li>
                    <li>Cumplimiento normativo ambiental</li>
                    <li>Aplicaciones en minería, petróleo y gas</li>
                </ul>
                <a href="control_solidos.php" class="service-cta">Ver Detalles →</a>
                <a href="https://wa.me/573103489282?text=Hola%2C%20necesito%20control%20de%20sólidos" target="_blank" class="service-cta-whatsapp">Cotizar</a>
            </div>
        </div>

        <div class="service-item">
            <div class="service-icon-large" style="background-color: #c8ff00;">&#9881;</div>
            <div class="service-details">
                <h2>Alquiler de Equipos Especializados</h2>
                <p>Maquinaria de última generación disponible para alquiler con soporte técnico incluido y opciones flexibles.</p>
                <ul class="service-features">
                    <li>Equipos de metalización, balanceo y más</li>
                    <li>Planes de alquiler flexibles</li>
                    <li>Soporte técnico durante todo el contrato</li>
                    <li>Disponibilidad inmediata</li>
                </ul>
                <a href="alquiler.php" class="service-cta">Ver Equipos →</a>
                <a href="https://wa.me/573103489282?text=Hola%2C%20quiero%20alquilar%20equipos" target="_blank" class="service-cta-whatsapp">Cotizar</a>
            </div>
        </div>
    </section>

    <a href="https://wa.me/573103489282?text=Hola%2C%20quiero%20información%20sobre%20sus%20servicios" target="_blank" class="whatsapp-float" aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="whatsapp-tooltip">¡Chatea con nosotros!</span>
    </a>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>
