<?php
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "nombre_de_tu_base_de_datos"; // Cambia esto según tu configuración

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Hashear la contraseña antes de almacenarla
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Consulta para insertar nuevo usuario
$sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente";
    // Puedes redirigir a la página de inicio de sesión
    header("Location: index.html");
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
