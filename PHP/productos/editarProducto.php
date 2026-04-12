<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarProductos.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM productos WHERE id_producto = $id";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($res);

// categorias para select
$cats = mysqli_query($conn, "SELECT id_categoria,nombre_categoria FROM categorias");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
    <link rel="stylesheet" href="../../CSS/formulario.css"> 
</head>
<body class="form-container-body">
    
<div class="form-container">
    <h2>Editar Producto #<?php echo $fila['id_producto']; ?></h2>
    
    <form action="updateProducto.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>

        <label>Descripción:</label>
        <textarea name="descripcion" rows="3"><?php echo htmlspecialchars($fila['descripcion']); ?></textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $fila['stock']; ?>" required>

        <label>Categoría:</label>
        <select name="id_categoria" required>
            <?php while($c = mysqli_fetch_assoc($cats)): ?>
                <option value="<?php echo $c['id_categoria']; ?>" <?php if($c['id_categoria']==$fila['id_categoria']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($c['nombre_categoria']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarProductos.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>