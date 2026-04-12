<?php
include("../conectar.php");
$conn = conexion();

$nombre      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio      = $_POST['precio'];
$stock       = $_POST['stock'];
$id_categoria = $_POST['id_categoria'];

$sql = "INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria)
        VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_categoria')";

if(mysqli_query($conn, $sql)){
    echo "Producto registrado correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>
