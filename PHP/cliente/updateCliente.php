<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: mostrarClientes.php");
    exit;
}

$id = (int) $_POST['id_cliente'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
$telefono = mysqli_real_escape_string($conn, $_POST['telefono'] ?? '');
$direccion = mysqli_real_escape_string($conn, $_POST['direccion'] ?? '');
$correo = mysqli_real_escape_string($conn, $_POST['correo'] ?? '');

$sql = "UPDATE clientes SET 
        nombre='$nombre',
        telefono='$telefono',
        direccion='$direccion',
        correo='$correo'
        WHERE id_cliente=$id";

if(mysqli_query($conn, $sql)){
    header("Location: mostrarClientes.php?msg=Cliente+actualizado");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
