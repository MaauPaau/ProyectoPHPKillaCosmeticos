<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarPedidos.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM pedidos WHERE id_pedido = $id";
$res = mysqli_query($conn, $sql);
$pedido = mysqli_fetch_assoc($res);

// selects para cliente y tienda
$clientes = mysqli_query($conn,"SELECT id_cliente,nombre FROM clientes");
$tiendas = mysqli_query($conn,"SELECT id_tienda,nombre_tienda FROM tiendas");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Pedido #<?php echo $pedido['id_pedido']; ?></h2>
    
    <form action="updatePedido.php" method="POST">
        <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">

        <label>Cliente:</label>
        <select name="id_cliente" required>
            <?php while($c = mysqli_fetch_assoc($clientes)): ?>
                <option value="<?php echo $c['id_cliente']; ?>" <?php if($c['id_cliente']==$pedido['id_cliente']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($c['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Tienda:</label>
        <select name="id_tienda" required>
            <?php while($t = mysqli_fetch_assoc($tiendas)): ?>
                <option value="<?php echo $t['id_tienda']; ?>" <?php if($t['id_tienda']==$pedido['id_tienda']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($t['nombre_tienda']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Fecha (fecha y hora):</label>
        <input type="datetime-local" name="fecha_pedido" value="<?php echo date('Y-m-d\TH:i', strtotime($pedido['fecha_pedido'])); ?>" required>

        <label>Estado:</label>
        <select name="estado" required>
            <?php $estados=['pendiente','confirmado','entregado']; foreach($estados as $e): ?>
                <option value="<?php echo $e; ?>" <?php if($e==$pedido['estado']) echo 'selected'; ?>><?php echo $e; ?></option>
            <?php endforeach; ?>
        </select>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarPedidos.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>