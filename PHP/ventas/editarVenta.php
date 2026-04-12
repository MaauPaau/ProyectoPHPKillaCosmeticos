<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarVentas.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM ventas WHERE id_venta = $id";
$res = mysqli_query($conn, $sql);
$v = mysqli_fetch_assoc($res);

$clientes = mysqli_query($conn,"SELECT id_cliente,nombre FROM clientes");
$empleados = mysqli_query($conn,"SELECT id_empleado,nombre FROM empleados");
$tiendas = mysqli_query($conn,"SELECT id_tienda,nombre_tienda FROM tiendas");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Venta</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Venta #<?php echo $v['id_venta']; ?></h2>
    
    <form action="updateVenta.php" method="POST">
        <input type="hidden" name="id_venta" value="<?php echo $v['id_venta']; ?>">

        <label>Cliente:</label>
        <select name="id_cliente" required>
            <?php while($c=mysqli_fetch_assoc($clientes)): ?>
                <option value="<?php echo $c['id_cliente']; ?>" <?php if($c['id_cliente']==$v['id_cliente']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($c['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Empleado:</label>
        <select name="id_empleado" required>
            <?php while($e=mysqli_fetch_assoc($empleados)): ?>
                <option value="<?php echo $e['id_empleado']; ?>" <?php if($e['id_empleado']==$v['id_empleado']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($e['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Tienda:</label>
        <select name="id_tienda" required>
            <?php while($t=mysqli_fetch_assoc($tiendas)): ?>
                <option value="<?php echo $t['id_tienda']; ?>" <?php if($t['id_tienda']==$v['id_tienda']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($t['nombre_tienda']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Fecha:</label>
        <input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($v['fecha'])); ?>" required>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarVentas.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>