<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_categoria'];
    $nombre = $_POST['nombre_categoria'];

    $sql = "UPDATE categorias SET nombre_categoria='$nombre' WHERE id_categoria=$id";

    if(mysqli_query($conn, $sql)) {
        header("Location: mostrarCategorias.php?msg=Categoría+actualizada+correctamente");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
