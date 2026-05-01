<?php
include 'db_connection.php';

$sql = "SELECT * FROM equipos WHERE estado IN ('Disponible') ORDER BY RAND() LIMIT 10";
$result = $conn->query($sql);

$equipos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $equipos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duramet | Metalización, Metalmecánica y Alquiler de Equipos Industriales en Bogotá</title>
    <meta name="description" content="Servicios profesionales de metalización de precisión, metalmecánica, balanceo dinámico y alquiler de equipos industriales en Bogotá. +10 años de experiencia. Cotice ahora.">
    <meta name="keywords" content="metalización, metalmecánica, balanceo dinámico, control de sólidos, alquiler equipos industriales, Bogotá, Colombia">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://duramet.com/">

    <!-- Open Graph -->
    <meta property="og:title" content="Duramet | Soluciones Metal-Mecánicas Industriales">
    <meta property="og:description" content="Metalización de precisión, metalmecánica, balanceo dinámico y alquiler de equipos. Más de 10 años protegiendo la industria colombiana.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://duramet.com/">
    <meta property="og:image" content="./img/logo_sin_fondo.png">
    <meta property="og:locale" content="es_CO">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Duramet | Soluciones Metal-Mecánicas Industriales">
    <meta name="twitter:description" content="Metalización de precisión, metalmecánica y alquiler de equipos industriales en Bogotá.">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Duramet SAS",
        "description": "Servicios de metalización, metalmecánica, balanceo dinámico y alquiler de equipos industriales",
        "url": "https://duramet.com",
        "telephone": "+576012683565",
        "email": "durametsas@gmail.com",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Dg. 19a #19A - 32",
            "addressLocality": "Bogotá",
            "addressCountry": "CO"
        },
        "openingHours": "Mo-Fr 08:00-18:00",
        "priceRange": "$$",
        "image": "./img/logo_sin_fondo.png",
        "sameAs": []
    }
    </script>

    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            z-index: 10000;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            border-radius: 12px;
            text-align: center;
            max-width: 400px;
        }
        .popup p { color: #1c3c60; font-size: 1.1rem; margin: 0; }
    </style>
</head>
<body>
    <?php
    session_start();
    include 'layouts/header.php';

    $showPopup = false;
    if (isset($_SESSION['mensaje_exito']) && $_SESSION['mensaje_exito'] === true) {
        $showPopup = true;
        unset($_SESSION['mensaje_exito']);
    }
    session_write_close();
    ?>

    <!-- HERO -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-text-container">
            <span class="hero-badge">+10 Años de Experiencia</span>
            <h1>Soluciones Metal-Mecánicas que Prolongan la Vida de sus Equipos</h1>
            <p>Metalización de precisión, metalmecánica integral y alquiler de equipos industriales. Tecnología de punta y servicio técnico especializado en Bogotá.</p>
            <div class="hero-buttons">
                <a href="https://wa.me/576012683565?text=Hola%2C%20necesito%20cotizar%20un%20servicio%20para%20mi%20empresa" target="_blank" class="btn-hero-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Cotizar por WhatsApp
                </a>
                <a href="#contacto" class="btn-hero-secondary">
                    Solicitar Cotización
                </a>
            </div>
            <div class="hero-trust">
                <div class="hero-trust-item">
                    <div class="hero-trust-number">500+</div>
                    <div class="hero-trust-label">Proyectos</div>
                </div>
                <div class="hero-trust-item">
                    <div class="hero-trust-number">120+</div>
                    <div class="hero-trust-label">Clientes</div>
                </div>
                <div class="hero-trust-item">
                    <div class="hero-trust-number">10+</div>
                    <div class="hero-trust-label">Años Exp.</div>
                </div>
                <div class="hero-trust-item">
                    <div class="hero-trust-number">24/7</div>
                    <div class="hero-trust-label">Soporte</div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST BAR -->
    <section class="trust-bar">
        <div class="trust-bar-container">
            <div class="trust-item">
                <div class="trust-icon">&#9989;</div>
                <div class="trust-number">100%</div>
                <div class="trust-label">Garantía en cada trabajo</div>
            </div>
            <div class="trust-item">
                <div class="trust-icon">&#9881;</div>
                <div class="trust-number">Tecnología CNC</div>
                <div class="trust-label">Equipos computarizados</div>
            </div>
            <div class="trust-item">
                <div class="trust-icon">&#128666;</div>
                <div class="trust-number">Servicio en sitio</div>
                <div class="trust-label">Vamos a su planta</div>
            </div>
            <div class="trust-item">
                <div class="trust-icon">&#9201;</div>
                <div class="trust-number">Respuesta 2h</div>
                <div class="trust-label">Cotización rápida</div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services">
        <h2>Servicios Industriales de Alta Tecnología</h2>
        <p class="services-subtitle">Soluciones integrales para la industria colombiana con tecnología de punta y personal altamente capacitado.</p>
        
        <div class="service">
            <div class="icon" style="background-color: #f0a500;">&#9881;</div>
            <h3>Metalización de Precisión</h3>
            <p>Recubrimientos metálicos avanzados con tecnología computarizada. Protección anticorrosiva y restauración de piezas industriales.</p>
            <a href="metalizacion.php" class="more">Ver Servicio →</a>
        </div>
        <div class="service">
            <div class="icon" style="background-color: #b0b0b0;">&#9881;</div>
            <h3>Metalmecánica Integral</h3>
            <p>Torneado, fresado, soldadura y fabricación de piezas a medida. Soluciones para proyectos de alta complejidad.</p>
            <a href="metalmecanica.php" class="more">Ver Servicio →</a>
        </div>
        <div class="service">
            <div class="icon" style="background-color: #d90000;">&#9881;</div>
            <h3>Balanceo Dinámico en Sitio</h3>
            <p>Diagnóstico y corrección de vibraciones sin desmontar equipos. Tecnología de punta directo en sus instalaciones.</p>
            <a href="balanceo_dinamico.php" class="more">Ver Servicio →</a>
        </div>
        <div class="service">
            <div class="icon" style="background-color: #d16e46;">&#9881;</div>
            <h3>Control de Sólidos Avanzado</h3>
            <p>Sistemas eficientes de separación y control de sólidos para la industria petrolera y minera.</p>
            <a href="control_solidos.php" class="more">Ver Servicio →</a>
        </div>
        <div class="service">
            <div class="icon" style="background-color: #c8ff00;">&#9881;</div>
            <h3>Alquiler de Equipos</h3>
            <p>Equipos especializados de última generación disponibles para alquiler. Flexibilidad y disponibilidad inmediata.</p>
            <a href="alquiler.php" class="more">Ver Equipos →</a>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="benefits">
        <div class="benefits-container">
            <h2>¿Por Qué Elegir Duramet?</h2>
            <p class="benefits-subtitle">Más que proveedores, somos su aliado estratégico en mantenimiento industrial.</p>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">&#127942;</div>
                    <h3>Experiencia Comprobada</h3>
                    <p>Más de 10 años resolviendo los desafíos más complejos de la industria metalmecánica colombiana.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">&#128200;</div>
                    <h3>Tecnología de Punta</h3>
                    <p>Equipos computarizados y procesos certificados que garantizan precisión y calidad en cada trabajo.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">&#128666;</div>
                    <h3>Servicio a Domicilio</h3>
                    <p>Nos desplazamos a su planta o instalación para realizar balanceo dinámico y mantenimiento in situ.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">&#9201;</div>
                    <h3>Respuesta Inmediata</h3>
                    <p>Entendemos la urgencia de su operación. Cotizamos en menos de 2 horas y ejecutamos en tiempo récord.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">&#128176;</div>
                    <h3>Precios Competitivos</h3>
                    <p>Ofrecemos la mejor relación calidad-precio del mercado con planes de alquiler flexibles.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">&#128737;</div>
                    <h3>Garantía Total</h3>
                    <p>Todos nuestros trabajos cuentan con garantía. Su satisfacción y la durabilidad están aseguradas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPMENT CAROUSEL -->
    <section class="equipment-carousel">
        <h2>Equipos Disponibles para Alquiler</h2>
        <p class="equipment-subtitle">Maquinaria especializada lista para su proyecto. Disponibilidad inmediata.</p>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($equipos as $equipo): ?>
                    <div class="swiper-slide">
                        <div class="slide-content">
                            <img src="<?php echo htmlspecialchars($equipo['imagen'] ?: 'placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($equipo['nombre']); ?>" loading="lazy">
                            <div class="slide-info">
                                <h3><?php echo htmlspecialchars($equipo['nombre']); ?></h3>
                                <p><?php echo htmlspecialchars(substr($equipo['descripcion'], 0, 70)) . '...'; ?></p>
                                <div class="price-container">
                                    <span class="price">$<?php echo number_format($equipo['precio_alquiler'], 0, ',', '.'); ?>/día</span>
                                    <span class="availability-badge">Disponible</span>
                                </div>
                                <a href="detalle_equipo.php?id=<?php echo $equipo['id']; ?>" class="cta-button">Ver Detalles</a>
                                <a href="https://wa.me/576012683565?text=Hola%2C%20me%20interesa%20alquilar%20el%20equipo%20<?php echo urlencode($equipo['nombre']); ?>" target="_blank" class="whatsapp-equip">Cotizar por WhatsApp</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <h2>Lo Que Dicen Nuestros Clientes</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-text">"Duramet nos salvó en una parada de planta. El balanceo dinámico en sitio fue impecable y redujimos las vibraciones a niveles óptimos en pocas horas."</p>
                <p class="testimonial-author">Carlos Rodríguez</p>
                <p class="testimonial-role">Jefe de Mantenimiento - Empresa Petrolera</p>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-text">"La calidad de la metalización superó nuestras expectativas. Llevamos 3 años con los recubrimientos y siguen como nuevos. Totalmente recomendados."</p>
                <p class="testimonial-author">María Fernanda López</p>
                <p class="testimonial-role">Gerente de Operaciones - Industria Manufacturera</p>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="testimonial-text">"Alquilamos equipos para un proyecto de 3 meses. La maquinaria estaba en excelente estado y el soporte técnico fue excepcional durante todo el contrato."</p>
                <p class="testimonial-author">Jorge Martínez</p>
                <p class="testimonial-role">Director de Proyectos - Constructora</p>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section class="portfolio-section">
        <div class="portfolio-content">
            <h2>Descubra Nuestro Portafolio Completo</h2>
            <p>Explore nuestra gama completa de soluciones innovadoras y proyectos de alta complejidad. Calidad y excelencia en cada trabajo.</p>
            <a href="https://acortar.link/productosyserviciosduramet" target="_blank" class="portfolio-button">Ver Portafolio Completo →</a>
        </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="contact-form" id="contacto">
        <h2>Solicite su Cotización Gratuita</h2>
        <p class="contact-form-subtitle">Complete el formulario y le responderemos en menos de 2 horas hábiles.</p>
        <form action="process_form.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="fullname">Nombre Completo *</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Ej: Juan Pérez" required>
                </div>
                <div class="form-group">
                    <label for="company">Empresa</label>
                    <input type="text" id="company" name="company" placeholder="Nombre de su empresa">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" placeholder="correo@empresa.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / WhatsApp *</label>
                    <input type="tel" id="phone" name="phone" placeholder="+57 300 000 0000" required>
                </div>
            </div>
            <div class="form-group">
                <label for="service">Servicio de Interés *</label>
                <select id="service" name="service" required>
                    <option value="">Seleccione un servicio...</option>
                    <option value="metalizacion">Metalización de Precisión</option>
                    <option value="metalmecanica">Metalmecánica Integral</option>
                    <option value="balanceo">Balanceo Dinámico en Sitio</option>
                    <option value="control_solidos">Control de Sólidos</option>
                    <option value="alquiler">Alquiler de Equipos</option>
                    <option value="otro">Otro / Consulta General</option>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Descripción de su Necesidad *</label>
                <textarea id="subject" name="subject" rows="4" placeholder="Describa brevemente qué necesita: tipo de equipo, dimensiones, urgencia, etc." required></textarea>
            </div>
            <button type="submit">Enviar Solicitud de Cotización</button>
            <p class="form-note">🔒 Su información está segura. No compartimos sus datos con terceros.</p>
        </form>
    </section>

    <!-- WHATSAPP FLOATING BUTTON -->
    <a href="https://wa.me/576012683565?text=Hola%2C%20quiero%20información%20sobre%20sus%20servicios" target="_blank" class="whatsapp-float" aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="whatsapp-tooltip">¡Chatea con nosotros!</span>
    </a>

    <div id="successPopup" class="popup">
        <p>¡Su solicitud fue guardada exitosamente! Nos pondremos en contacto con usted en menos de 2 horas.</p>
    </div>

    <script>
        var showPopupValue = <?php echo json_encode($showPopup); ?>;
    </script>
    <script src="popup.js"></script>

    <!-- Mobile Menu -->
    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('active');
        });
    </script>

    <?php include 'layouts/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    </script>
</body>
</html>
