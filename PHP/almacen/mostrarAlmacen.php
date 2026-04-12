<?php
include("../conectar.php");
$conn = conexion();

$sql = "SELECT id_almacen, nombre, ubicacion FROM almacen";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Almacenes - Killa Cosméticos</title>
    <link rel="stylesheet" href="../../CSS/base.css">
    <link rel="stylesheet" href="../../CSS/tabla.css">

</head>
<body>
<h2>Lista de Almacenes</h2>
<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar..." value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<div class="table-container">
<table border="1" >
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th colspan="2">Acciones</th> 
    </tr>
    <?php while($fila = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $fila['id_almacen']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['ubicacion']; ?></td>
        <td>
            <a href="editarAlmacen.php?id=<?php echo $fila['id_almacen']; ?>" class="btn-edit">
                <i class="fas fa-edit"></i> Editar
            </a>
        </td>
        <td>
            <a href="eliminarAlmacen.php?id=<?php echo $fila['id_almacen']; ?>" class="btn-delete"
   onclick="return confirm('⚠️ Atención: Se eliminará este almacén y todos los registros relacionados. ¿Seguro que deseas continuar?');">
    <i class="fas fa-trash"></i> Eliminar
</a>
        </td>
    </tr>
    <?php } ?>
</table>
</div>

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
