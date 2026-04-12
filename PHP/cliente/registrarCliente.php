<?php
include("../conectar.php");
$conn = conexion();

$nombre    = $_POST['nombre'];
$telefono  = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo    = $_POST['correo'];

$sql = "INSERT INTO clientes (nombre, telefono, direccion, correo) 
        VALUES ('$nombre', '$telefono', '$direccion', '$correo')";

if (mysqli_query($conn, $sql)) {
    echo "Cliente registrado correctamente.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
