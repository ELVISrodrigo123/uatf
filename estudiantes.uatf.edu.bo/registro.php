<?php
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "uatf"; // Cambia esto según tu configuración

$conn = mysqli_connect($servername, $username, $password, $dbname);
/* $conn = mysqli_connect($servername, $username, $password, $dbname); */

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'] ?? ''; // Usar ?? para evitar undefined index
$pass = $_POST['password'] ?? '';


// Validación básica
if (empty($user) || empty($pass)) {
    echo "<script>alert('Por favor, complete todos los campos.'); window.location.href='index.html';</script>";
    exit();

}

// Verificar si el usuario ya existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

$sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo"New record created successfully";
}

if ($result->num_rows > 0) {
    // Si el usuario ya existe, mostramos un mensaje de error
    echo "<script>alert('El usuario ya existe.'); window.location.href='index.html';</script>";
} else {
    // Si el usuario no existe, procedemos con el registro
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT); // Encriptamos la contraseña
    $sql_insert = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $user, $hashed_password);

    if ($stmt_insert->execute()) {
        // Registro exitoso
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); // Redirigir a la página del dashboard después de registro
        exit();
    } else {
        // Error en la inserción
        echo "<script>alert('Error al registrar el usuario.'); window.location.href='index.html';</script>";
    }

    $stmt_insert->close();
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
