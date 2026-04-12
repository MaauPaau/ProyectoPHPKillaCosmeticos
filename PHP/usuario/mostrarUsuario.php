<?php
include("../conectar.php");
$conn = conexion();

$sql = "SELECT id_usuario, nombre, email, contraseña, rol  FROM usuarios";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios - Killa Cosméticos</title>
<link rel="stylesheet" href="../../CSS/base.css">
    <link rel="stylesheet" href="../../CSS/tabla.css"></head>
<body>
<h2>Lista de Usuarios</h2>
<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar..." value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>contraseña</th>
        <th>Rol</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php while($fila = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $fila['id_usuario']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['email']; ?></td>
        <td><?php echo $fila['contraseña']; ?></td>
        <td><?php echo $fila['rol']; ?></td>
   <td>
            <a href="editarUsuario.php?id=<?php echo $fila['id_usuario']; ?>" class="btn-edit">
                <i class="fas fa-edit"></i> Editar
            </a>
        </td>
        <td>
            <a href="eliminarUsuario.php?id=<?php echo $fila['id_usuario']; ?>" class="btn-delete"
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
