<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header("Location: mostrarVentas.php"); exit; }

$id = (int) $_POST['id_venta'];
$id_cliente = (int) ($_POST['id_cliente'] ?? 0);
$id_empleado = (int) ($_POST['id_empleado'] ?? 0);
$id_tienda = (int) ($_POST['id_tienda'] ?? 0);
$fecha = str_replace('T',' ',$_POST['fecha'] ?? '');

$sql = "UPDATE ventas SET 
        id_cliente=$id_cliente,
        id_empleado=$id_empleado,
        id_tienda=$id_tienda,
        fecha='$fecha'
        WHERE id_venta=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarVentas.php?msg=Venta+actualizada");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
