<?php
include("../conectar.php");
$conn = conexion();

$id_cliente   = $_POST['id_cliente'];
$id_tienda    = $_POST['id_tienda'];
$fecha_pedido = $_POST['fecha_pedido'];
$estado       = $_POST['estado'];

$sql = "INSERT INTO pedidos (id_cliente, id_tienda, fecha_pedido, estado)
        VALUES ('$id_cliente', '$id_tienda', '$fecha_pedido', '$estado')";

if(mysqli_query($conn, $sql)){
    echo "Pedido registrado correctamente.";
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>
