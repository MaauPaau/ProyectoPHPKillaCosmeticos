<?php
include("../conectar.php");
$conn = conexion();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorias WHERE id_categoria = $id";
    $result = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($result);
} else {
    // Si no hay ID, redirigir o mostrar un error para evitar problemas
    header("Location: mostrarCategorias.php?msg=ID+no+recibido");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="../../CSS/editar.css"> 
</head>
<body>
    <div class="form-container">
        <h2>Editar Categoría #<?php echo htmlspecialchars($fila['id_categoria']); ?></h2>
        
        <form action="updateCategoria.php" method="POST">
            <input type="hidden" name="id_categoria" value="<?php echo htmlspecialchars($fila['id_categoria']); ?>">
            
            <label>Nombre de la categoría:</label>
            <input type="text" name="nombre_categoria" value="<?php echo htmlspecialchars($fila['nombre_categoria']); ?>" required>
            
            <div class="form-actions">
                <button type="submit">Guardar cambios</button>
                <a href="mostrarCategorias.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>