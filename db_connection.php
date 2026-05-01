<?php
// Configuración de la base de datos
// En Render usa variables de entorno; en local usa valores por defecto
$servername = getenv('DB_HOST') ?: 'localhost';
$port = getenv('DB_PORT') ?: '3306';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: 'root';
$dbname = getenv('DB_NAME') ?: 'duramet';

// En desarrollo mostrar errores, en producción ocultarlos
if ($servername === 'localhost') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    // Establecer charset a utf8
    if (!$conn->set_charset("utf8")) {
        throw new Exception("Error cargando el conjunto de caracteres utf8: " . $conn->error);
    }

} catch (Exception $e) {
    if ($servername === 'localhost') {
        die("Error: " . $e->getMessage());
    } else {
        error_log("DB Error: " . $e->getMessage());
        die("Error de conexión a la base de datos.");
    }
}
?>
