<?php
include("../conectar.php");
$conn = conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM almacen WHERE id_almacen = $id";
    $result = mysqli_query($conn, $sql);
    $almacen = mysqli_fetch_assoc($result);
} else {
    header("Location: mostrarAlmacen.php?msg=No+se+recibió+ningún+ID");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Almacén</title>
    <link rel="stylesheet" href="../CSS/base.css">
    <link rel="stylesheet" href="../../CSS/editar.css"> 
</head>
<body>
    <div class="form-container">
        <h2>Editar Almacén</h2>

        <form action="updateAlmacen.php" method="POST">
            <input type="hidden" name="id_almacen" value="<?php echo $almacen['id_almacen']; ?>">
            
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($almacen['nombre']); ?>" required>

            <label>Ubicación:</label>
            <input type="text" name="ubicacion" value="<?php echo htmlspecialchars($almacen['ubicacion']); ?>" required>

            <div class="form-actions">
                <button type="submit">Guardar cambios</button>
                <a href="mostrarAlmacen.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>