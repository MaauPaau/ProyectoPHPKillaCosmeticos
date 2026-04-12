<?php
include("../conectar.php");
$conn = conexion();

$nombre    = $_POST['nombre'];
$cargo     = $_POST['cargo'];
$id_tienda = $_POST['id_tienda'];

$sql = "INSERT INTO empleados (nombre, cargo, id_tienda)
        VALUES ('$nombre', '$cargo', '$id_tienda')";

if(mysqli_query($conn, $sql)){
    echo "Empleado registrado correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>
