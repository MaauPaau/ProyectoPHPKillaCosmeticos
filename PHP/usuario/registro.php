<?php
include("../conectar.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = conexion();

    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $password = $_POST["contraseña"];

    $nombre_completo = $nombre . " " . $apellido;
    $rol = "cliente";

    // Hash de contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepared statement
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre_completo, $email, $hash, $rol);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registrado correctamente');
                window.location.href = '../../HTML/login.html';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($conn);
}
?>