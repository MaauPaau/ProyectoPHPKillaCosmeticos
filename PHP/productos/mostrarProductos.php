<?php
include("../conectar.php");
$conn = conexion();

// Hacemos un JOIN con la tabla categorias para traer el nombre de la categoría
$sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, c.nombre_categoria
        FROM productos p
        LEFT JOIN categorias c ON p.id_categoria = c.id_categoria";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Killa Cosméticos</title>
<link rel="stylesheet" href="../../CSS/base.css">
    <link rel="stylesheet" href="../../CSS/tabla.css"></head>
    
<body>
<h2>Lista de Productos</h2>
<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar..." value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Categoría</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php while($fila = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $fila['id_producto']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['descripcion']; ?></td>
        <td><?php echo $fila['precio']; ?></td>
        <td><?php echo $fila['stock']; ?></td>
        <td><?php echo $fila['nombre_categoria']; ?></td>
        <td>
            <a href="editarProducto.php?id=<?php echo $fila['id_producto']; ?>" class="btn-edit">
                <i class="fas fa-edit"></i> Editar
            </a>
        </td>
        <td>
            <a href="eliminarProducto.php?id=<?php echo $fila['id_producto']; ?>" class="btn-delete"
               onclick="return confirm('⚠️ Atención: Se eliminará este producto y todos los registros relacionados. ¿Seguro que deseas continuar?');">
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
mysqli_close($conn);
?>
</body>
</html>
