<?php
$servername = "db"; // Nombre del servicio en docker-compose
$username = "user";
$password = "password";
$dbname = "uatf";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Insertar datos en la tabla
$sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
