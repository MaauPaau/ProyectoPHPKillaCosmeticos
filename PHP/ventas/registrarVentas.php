<?php
include("../conectar.php");
$conn = conexion();

$fecha       = $_POST['fecha'];
$id_cliente  = $_POST['id_cliente'];
$id_empleado = $_POST['id_empleado'];
$id_tienda   = $_POST['id_tienda'];

$sql = "INSERT INTO ventas (fecha, id_cliente, id_empleado, id_tienda)
        VALUES ('$fecha', '$id_cliente', '$id_empleado', '$id_tienda')";

if(mysqli_query($conn, $sql)){
    echo "Venta registrada correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>

