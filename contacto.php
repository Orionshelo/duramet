<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto Duramet | Cotización de Servicios Metal-Mecánicos</title>
    <meta name="description" content="Contáctenos para cotizar servicios de metalización, metalmecánica, balanceo dinámico y alquiler de equipos. Respuesta en menos de 2 horas.">
    <link rel="stylesheet" href="./styles.css">
    <link rel="shortcut icon" href="./img/logo_sin_fondo.png">
    <style>
        .contact-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 60px 20px;
            text-align: center;
            color: white;
        }
        .contact-hero h1 {
            font-size: 2.5rem;
            margin: 0 0 15px;
        }
        .contact-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        .contact-page-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 40px;
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }
        .contact-info {
            padding: 30px;
            background: var(--light);
            border-radius: 12px;
        }
        .contact-info h3 {
            color: var(--primary);
            margin: 0 0 25px;
            font-size: 1.4rem;
        }
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }
        .contact-info-icon {
            width: 40px;
            height: 40px;
            background: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .contact-info-text h4 {
            margin: 0 0 5px;
            color: var(--primary);
            font-size: 1rem;
        }
        .contact-info-text p {
            margin: 0;
            color: var(--gray);
            font-size: 0.95rem;
        }
        .contact-info-text a {
            color: var(--primary);
            text-decoration: none;
        }
        .contact-info-text a:hover {
            color: var(--accent);
        }
        .contact-whatsapp-box {
            background: var(--whatsapp);
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            margin-top: 30px;
        }
        .contact-whatsapp-box h4 {
            color: white;
            margin: 0 0 10px;
        }
        .contact-whatsapp-box p {
            color: rgba(255,255,255,0.9);
            margin: 0 0 15px;
            font-size: 0.95rem;
        }
        .contact-whatsapp-btn {
            display: inline-block;
            padding: 12px 24px;
            background: white;
            color: var(--whatsapp);
            text-decoration: none;
            font-weight: 700;
            border-radius: 8px;
            transition: var(--transition);
        }
        .contact-whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
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
        .popup p { color: var(--primary); font-size: 1.1rem; margin: 0; }
        .form-help { font-size: 12px; color: #666; margin-top: 5px; display: block; }
        .form-help.error { color: #d32f2f; }
        .form-help.success { color: #388e3c; }
        .form-group input.error, .form-group textarea.error, .form-group select.error { border-color: #d32f2f; }
        .form-group input.success, .form-group textarea.success, .form-group select.success { border-color: #388e3c; }
        @media (max-width: 768px) {
            .contact-page-content { grid-template-columns: 1fr; }
            .contact-hero h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    session_start();
    include 'layouts/header.php';
    include 'db_connection.php';

    $showPopup = false;
    if (isset($_SESSION['mensaje_exito']) && $_SESSION['mensaje_exito'] === true) {
        $showPopup = true;
        unset($_SESSION['mensaje_exito']);
    }
    if (isset($_SESSION['errores'])) { unset($_SESSION['errores']); }
    if (isset($_SESSION['mensaje_error'])) { unset($_SESSION['mensaje_error']); }

    $sql = "SELECT id, nombre FROM equipos ORDER BY nombre";
    $result = $conn->query($sql);
    session_write_close();
    ?>

    <section class="contact-hero">
        <h1>Solicite su Cotización Gratuita</h1>
        <p>Complete el formulario o contáctenos directamente. Le responderemos en menos de 2 horas hábiles.</p>
    </section>

    <div class="contact-page-content">
        <div class="contact-info">
            <h3>Información de Contacto</h3>
            
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </div>
                <div class="contact-info-text">
                    <h4>Email</h4>
                    <p><a href="mailto:durametsas@gmail.com">durametsas@gmail.com</a></p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                </div>
                <div class="contact-info-text">
                    <h4>Teléfono</h4>
                    <p><a href="tel:+576012683565">+57 601 2683565</a></p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                <div class="contact-info-text">
                    <h4>Dirección</h4>
                    <p>Dg. 19a #19A - 32<br>Bogotá, Colombia</p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                </div>
                <div class="contact-info-text">
                    <h4>Horario de Atención</h4>
                    <p>Lunes a Viernes<br>8:00 AM - 6:00 PM</p>
                </div>
            </div>

            <div class="contact-whatsapp-box">
                <h4>¿Necesita respuesta inmediata?</h4>
                <p>Escríbanos por WhatsApp y le atenderemos al instante.</p>
                <a href="https://wa.me/576012683565?text=Hola%2C%20necesito%20una%20cotización" target="_blank" class="contact-whatsapp-btn">
                    Chatear por WhatsApp
                </a>
            </div>
        </div>

        <div class="contact-form" style="background:none;padding:0;text-align:left;">
            <h2 style="text-align:left;">Complete el Formulario</h2>
            <form action="process_form.php" method="POST" id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Nombre Completo *</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Ej: Juan Pérez" required>
                        <small class="form-help" id="fullname-help">Mínimo 5 caracteres</small>
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
                        <small class="form-help" id="email-help">Formato: usuario@ejemplo.com</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono / WhatsApp *</label>
                        <input type="tel" id="phone" name="phone" placeholder="+57 300 000 0000" required>
                        <small class="form-help" id="phone-help">10 dígitos</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="equipo">Equipo de Interés (opcional)</label>
                    <select id="equipo" name="equipo_id">
                        <option value="">Seleccione un equipo</option>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nombre']) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Descripción de su Necesidad *</label>
                    <textarea id="subject" name="subject" rows="4" placeholder="Describa brevemente qué necesita..." required></textarea>
                    <small class="form-help" id="subject-help">Mínimo 10 caracteres</small>
                </div>
                <button type="submit" id="submitBtn">Enviar Solicitud de Cotización</button>
                <p class="form-note" style="text-align:center;">🔒 Su información está segura. No compartimos sus datos.</p>
            </form>
        </div>
    </div>

    <div id="successPopup" class="popup">
        <p>¡Su solicitud fue enviada exitosamente! Nos pondremos en contacto pronto.</p>
    </div>

    <script>
        var showPopupValue = <?php echo json_encode($showPopup); ?>;
    </script>
    <script src="popup.js"></script>

    <a href="https://wa.me/576012683565?text=Hola%2C%20quiero%20información%20sobre%20sus%20servicios" target="_blank" class="whatsapp-float" aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="whatsapp-tooltip">¡Chatea con nosotros!</span>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const fullname = document.getElementById('fullname');
            const phone = document.getElementById('phone');
            const email = document.getElementById('email');
            const subject = document.getElementById('subject');

            fullname.addEventListener('input', function() {
                const value = this.value.trim();
                const help = document.getElementById('fullname-help');
                if (value.length === 0) { this.className = ''; help.textContent = 'Mínimo 5 caracteres'; help.className = 'form-help'; }
                else if (value.length < 5) { this.className = 'error'; help.textContent = `Faltan ${5 - value.length} caracteres`; help.className = 'form-help error'; }
                else { this.className = 'success'; help.textContent = '✓ Nombre válido'; help.className = 'form-help success'; }
            });

            phone.addEventListener('input', function() {
                const value = this.value.replace(/\D/g, '');
                this.value = value;
                const help = document.getElementById('phone-help');
                if (value.length === 0) { this.className = ''; help.textContent = '10 dígitos'; help.className = 'form-help'; }
                else if (value.length < 10) { this.className = 'error'; help.textContent = `Faltan ${10 - value.length} dígitos`; help.className = 'form-help error'; }
                else if (value.length === 10) { this.className = 'success'; help.textContent = '✓ Número válido'; help.className = 'form-help success'; }
                else { this.className = 'error'; help.textContent = 'Máximo 10 dígitos'; help.className = 'form-help error'; this.value = value.substring(0, 10); }
            });

            email.addEventListener('input', function() {
                const value = this.value.trim();
                const help = document.getElementById('email-help');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (value.length === 0) { this.className = ''; help.textContent = 'Formato: usuario@ejemplo.com'; help.className = 'form-help'; }
                else if (!emailRegex.test(value)) { this.className = 'error'; help.textContent = 'Formato inválido'; help.className = 'form-help error'; }
                else { this.className = 'success'; help.textContent = '✓ Correo válido'; help.className = 'form-help success'; }
            });

            subject.addEventListener('input', function() {
                const value = this.value.trim();
                const help = document.getElementById('subject-help');
                if (value.length === 0) { this.className = ''; help.textContent = 'Mínimo 10 caracteres'; help.className = 'form-help'; }
                else if (value.length < 10) { this.className = 'error'; help.textContent = `Faltan ${10 - value.length} caracteres`; help.className = 'form-help error'; }
                else { this.className = 'success'; help.textContent = '✓ Asunto válido'; help.className = 'form-help success'; }
            });
        });
    </script>

    <?php 
    if(isset($conn)) { $conn->close(); }
    include 'layouts/footer.php'; 
    ?>
</body>
</html>
