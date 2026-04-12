<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header("Location: mostrarUsuarios.php"); exit; }

$id = (int) $_POST['id_usuario'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
$email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$contrasena = mysqli_real_escape_string($conn, $_POST['contrasena'] ?? '');
$rol = mysqli_real_escape_string($conn, $_POST['rol'] ?? '');

$sql = "UPDATE usuarios SET 
        nombre='$nombre',
        email='$email',
        `contraseña`='$contrasena',
        rol='$rol'
        WHERE id_usuario=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarUsuarios.php?msg=Usuario+actualizado");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
