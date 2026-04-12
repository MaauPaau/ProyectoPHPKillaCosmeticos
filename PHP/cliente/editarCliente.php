<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) {
    header("Location: mostrarClientes.php?msg=ID+no+recibido");
    exit;
}
$id = (int) $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id_cliente = $id";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Cliente #<?php echo $fila['id_cliente']; ?></h2>
    
    <form action="updateCliente.php" method="POST">
        <input type="hidden" name="id_cliente" value="<?php echo $fila['id_cliente']; ?>">
        
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($fila['telefono']); ?>">

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo htmlspecialchars($fila['direccion']); ?>">

        <label>Correo:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($fila['correo']); ?>">

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarClientes.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>