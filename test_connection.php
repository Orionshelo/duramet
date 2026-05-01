<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>Test de Conexión</h2>";

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "duramet";

try {
    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    echo "<p style='color: green;'>✓ Conexión exitosa a la base de datos</p>";

    // Verificar tabla contacto
    $result = $conn->query("DESCRIBE contacto");
    if ($result) {
        echo "<h3>Estructura de la tabla contacto:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Campo</th><th>Tipo</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Test de inserción
    $test_insert = "INSERT INTO contacto (full_name, phone, email, subject) VALUES ('Test Usuario', '1234567890', 'test@test.com', 'Este es un mensaje de prueba')";
    
    if ($conn->query($test_insert)) {
        echo "<p style='color: green;'>✓ Test de inserción exitoso</p>";
        $last_id = $conn->insert_id;
        echo "<p>ID del registro insertado: $last_id</p>";
        
        // Eliminar el registro de prueba
        $conn->query("DELETE FROM contacto WHERE id = $last_id");
        echo "<p style='color: blue;'>✓ Registro de prueba eliminado</p>";
    } else {
        echo "<p style='color: red;'>✗ Error en test de inserción: " . $conn->error . "</p>";
    }

    $conn->close();

} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}
?>
