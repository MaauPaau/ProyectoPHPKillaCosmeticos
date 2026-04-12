<?php
include("../conectar.php");
$conn = conexion();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id_producto = $id";

    if(mysqli_query($conn, $sql)) {
        header("Location: mostrarProductos.php?msg=Eliminado+exitosamente");
        exit;
    } else {
        echo "Error al eliminar: " . mysqli_error($conn);
    }
} else {
    echo "ID no recibido";
}

mysqli_close($conn);
?>
