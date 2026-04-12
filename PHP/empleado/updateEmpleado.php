<?php
include("../conectar.php");
$conn = conexion();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: mostrarEmpleados.php"); exit;
}

$id = (int) $_POST['id_empleado'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
$cargo = mysqli_real_escape_string($conn, $_POST['cargo'] ?? '');
$id_tienda = (int) ($_POST['id_tienda'] ?? 0);

$sql = "UPDATE empleados SET 
        nombre='$nombre',
        cargo='$cargo',
        id_tienda=$id_tienda
        WHERE id_empleado=$id";

if(mysqli_query($conn,$sql)){
    header("Location: mostrarEmpleados.php?msg=Empleado+actualizado");
    exit;
}else{
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
