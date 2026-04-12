<?php
include("../conectar.php");
$conn = conexion();

$sql = "SELECT id_pedido, id_cliente, fecha_pedido, estado, id_tienda FROM pedidos";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos - Killa Cosméticos</title>
<link rel="stylesheet" href="../../CSS/base.css">
    <link rel="stylesheet" href="../../CSS/tabla.css"></head>
<body>
<h2>Lista de Pedidos</h2>
<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar..." value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>ID Cliente</th>
        <th>Fecha Pedido</th>
        <th>Estado</th>
        <th>ID Tienda</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php while($fila = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $fila['id_pedido']; ?></td>
        <td><?php echo $fila['id_cliente']; ?></td>
        <td><?php echo $fila['fecha_pedido']; ?></td>
        <td><?php echo $fila['estado']; ?></td>
        <td><?php echo $fila['id_tienda']; ?></td>
   <td>
            <a href="editarPedido.php?id=<?php echo $fila['id_pedido']; ?>" class="btn-edit">
                <i class="fas fa-edit"></i> Editar
            </a>
        </td>
        <td>
            <a href="eliminarPedido.php?id=<?php echo $fila['id_pedido']; ?>" class="btn-delete"
              onclick="return confirm('⚠️ Atención: Se eliminará este almacén y todos los registros relacionados. ¿Seguro que deseas continuar?');">
    <i class="fas fa-trash"></i> Eliminar
</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="../../HTML/index.php" class="volver-panel"
   onclick="return confirm('¿Deseas volver al inicio?');">
   Volver 
</a>


<?php
if(isset($_GET['msg'])){
    echo "<script>alert('".$_GET['msg']."');</script>";
}
?>
<?php mysqli_close($conn); ?>
</body>
</html>
