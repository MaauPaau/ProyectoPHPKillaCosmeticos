<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarEmpleados.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM empleados WHERE id_empleado = $id";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($res);

$tiendas = mysqli_query($conn, "SELECT id_tienda,nombre_tienda FROM tiendas");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Empleado #<?php echo $fila['id_empleado']; ?></h2>
    
    <form action="updateEmpleado.php" method="POST">
        <input type="hidden" name="id_empleado" value="<?php echo $fila['id_empleado']; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>

        <label>Cargo:</label>
        <input type="text" name="cargo" value="<?php echo htmlspecialchars($fila['cargo']); ?>">

        <label>Tienda:</label>
        <select name="id_tienda" required>
            <?php while($t = mysqli_fetch_assoc($tiendas)): ?>
                <option value="<?php echo $t['id_tienda']; ?>" <?php if($t['id_tienda']==$fila['id_tienda']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($t['nombre_tienda']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarEmpleados.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>