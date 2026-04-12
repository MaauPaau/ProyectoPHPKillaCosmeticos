<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header("Location: mostrarPedidos.php"); exit; }

$id = (int) $_POST['id_pedido'];
$id_cliente = (int) ($_POST['id_cliente'] ?? 0);
$id_tienda = (int) ($_POST['id_tienda'] ?? 0);
$fecha = str_replace('T',' ',$_POST['fecha_pedido'] ?? '');
$estado = mysqli_real_escape_string($conn, $_POST['estado'] ?? '');

$sql = "UPDATE pedidos SET 
        id_cliente=$id_cliente,
        id_tienda=$id_tienda,
        fecha_pedido='$fecha',
        estado='$estado'
        WHERE id_pedido=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarPedidos.php?msg=Pedido+actualizado");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
