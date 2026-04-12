<?php
include("../conectar.php");
$conn = conexion();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tiendas WHERE id_tienda = $id";

    if(mysqli_query($conn, $sql)) {
        header("Location: mostrarTiendas.php?msg=Eliminado+exitosamente");
        exit;
    } else {
        echo "Error al eliminar: " . mysqli_error($conn);
    }
} else {
    echo "ID no recibido";
}

mysqli_close($conn);
?>
