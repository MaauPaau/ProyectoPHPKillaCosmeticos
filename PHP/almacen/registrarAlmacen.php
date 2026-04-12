<?php
include("../conectar.php");
$conn = conexion();

$nombre    = $_POST["nombre"];
$ubicacion = $_POST["ubicacion"];

$sql = "INSERT INTO almacen (nombre, ubicacion) 
        VALUES ('$nombre', '$ubicacion')";

if (mysqli_query($conn, $sql)) {
    echo "Almacén registrado correctamente.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
