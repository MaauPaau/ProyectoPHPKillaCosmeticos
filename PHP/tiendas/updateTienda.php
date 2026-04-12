<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header("Location: mostrarTiendas.php"); exit; }

$id = (int) $_POST['id_tienda'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre_tienda'] ?? '');
$direccion = mysqli_real_escape_string($conn, $_POST['direccion'] ?? '');

$sql = "UPDATE tiendas SET 
        nombre_tienda='$nombre',
        direccion='$direccion'
        WHERE id_tienda=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarTiendas.php?msg=Tienda+actualizada");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
