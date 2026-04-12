<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header("Location: mostrarProductos.php"); exit; }

$id = (int) $_POST['id_producto'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
$descripcion = mysqli_real_escape_string($conn, $_POST['descripcion'] ?? '');
$precio = (float) ($_POST['precio'] ?? 0);
$stock = (int) ($_POST['stock'] ?? 0);
$id_categoria = (int) ($_POST['id_categoria'] ?? 0);

$sql = "UPDATE productos SET 
        nombre='$nombre',
        descripcion='$descripcion',
        precio=$precio,
        stock=$stock,
        id_categoria=$id_categoria
        WHERE id_producto=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarProductos.php?msg=Producto+actualizado");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
