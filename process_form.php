<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Incluir conexión a la base de datos
require_once 'db_connection.php';

// Función para limpiar y validar datos
function validar_datos($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = validar_datos($_POST["fullname"]);
    $phone = validar_datos($_POST["phone"]);
    $email = validar_datos($_POST["email"]);
    $subject = validar_datos($_POST["subject"]);
    $equipo_id = !empty($_POST["equipo_id"]) ? intval($_POST["equipo_id"]) : null;
    
    $errores = [];

    // Validaciones
    if (strlen($fullname) < 5) {
        $errores[] = "El nombre debe tener al menos 5 caracteres.";
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errores[] = "El número de teléfono debe tener 10 dígitos.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }
    if (strlen($subject) < 10) {
        $errores[] = "El asunto debe tener al menos 10 caracteres.";
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header("Location: contacto.php");
        exit();
    }

    // Si no hay errores, insertar en la base de datos
    try {
        $sql = "INSERT INTO contacto (full_name, phone, email, subject, equipo_id) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }

        $stmt->bind_param("ssssi", $fullname, $phone, $email, $subject, $equipo_id);
        
        if ($stmt->execute()) {
            $inserted_id = $stmt->insert_id;
            $stmt->close();
            
            // Enviar correo electrónico
            $to = "ventas@durametsas.com";
            $email_subject = "Nuevo contacto desde el sitio web: " . $fullname;
            
            $message = "Se ha recibido un nuevo mensaje de contacto:\n\n";
            $message .= "Nombre: " . $fullname . "\n";
            $message .= "Teléfono: " . $phone . "\n";
            $message .= "Correo: " . $email . "\n";
            $message .= "Asunto: " . $subject . "\n";

            // Obtener información del equipo si se seleccionó uno
            if ($equipo_id) {
                $sql_equipo = "SELECT nombre FROM equipos WHERE id = ?";
                $stmt_equipo = $conn->prepare($sql_equipo);
                if ($stmt_equipo) {
                    $stmt_equipo->bind_param("i", $equipo_id);
                    $stmt_equipo->execute();
                    $result = $stmt_equipo->get_result();
                    if ($row = $result->fetch_assoc()) {
                        $message .= "Equipo de interés: " . $row['nombre'] . "\n";
                    }
                    $stmt_equipo->close();
                }
            }
            
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            // Enviar correo
            mail($to, $email_subject, $message, $headers);

            $_SESSION['mensaje_exito'] = true;
            
        } else {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
        
    } catch (Exception $e) {
        $_SESSION['mensaje_error'] = "Error al procesar la solicitud: " . $e->getMessage();
    }
} else {
    $_SESSION['mensaje_error'] = "Método de solicitud no válido";
}

if (isset($conn)) {
    $conn->close();
}

header("Location: contacto.php");
exit();
?>
