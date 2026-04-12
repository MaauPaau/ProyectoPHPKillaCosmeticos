<?php
include("../conectar.php");
$conn = conexion();

$nombre_tienda = $_POST['nombre_tienda'];
$direccion     = $_POST['direccion'];

$sql = "INSERT INTO tiendas (nombre_tienda, direccion)
        VALUES ('$nombre_tienda', '$direccion')";

if(mysqli_query($conn, $sql)){
    echo "Tienda registrada correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>
