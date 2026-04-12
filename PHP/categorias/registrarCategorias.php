<?php
include("../conectar.php");
$conn = conexion();

$nombre_categoria = $_POST['nombre_categoria'];

$sql = "INSERT INTO categorias (nombre_categoria)
        VALUES ('$nombre_categoria')";

if(mysqli_query($conn, $sql)){
    echo "Categoría registrada correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>
