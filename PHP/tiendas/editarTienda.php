<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarTiendas.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM tiendas WHERE id_tienda = $id";
$res = mysqli_query($conn, $sql);
$t = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Tienda</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Tienda #<?php echo $t['id_tienda']; ?></h2>
    
    <form action="updateTienda.php" method="POST">
        <input type="hidden" name="id_tienda" value="<?php echo $t['id_tienda']; ?>">

        <label>Nombre tienda:</label>
        <input type="text" name="nombre_tienda" value="<?php echo htmlspecialchars($t['nombre_tienda']); ?>" required>

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo htmlspecialchars($t['direccion']); ?>" required>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarTiendas.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>