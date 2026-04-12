<?php
session_start();
include("conectar.php");

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['contraseña'];

    // Prepared statement
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $usuario['contraseña'])) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol'];

            header("Location: ../HTML/index.php");
            exit;

        } else {
            echo "<p style='color:red'>Contraseña incorrecta</p>";
        }

    } else {
        echo "<p style='color:red'>Usuario no encontrado</p>";
    }

    $stmt->close();
}
?>