<?php
include("../conectar.php");
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_almacen'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];

    $sql = "UPDATE almacen SET nombre='$nombre', ubicacion='$ubicacion' WHERE id_almacen=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: mostrarAlmacen.php?msg=Registro+actualizado+correctamente");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
