<?php
include("../conectar.php");
$conn = conexion();

if(!isset($_GET['id'])) { header("Location: mostrarUsuarios.php?msg=ID+no+recibido"); exit; }
$id = (int) $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
$res = mysqli_query($conn, $sql);
$u = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../../CSS/editar.css">
</head>
<body>
    
<div class="form-container">
    <h2>Editar Usuario #<?php echo $u['id_usuario']; ?></h2>
    
    <form action="updateUsuario.php" method="POST">
        <input type="hidden" name="id_usuario" value="<?php echo $u['id_usuario']; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($u['nombre']); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($u['email']); ?>" required>

        <label>Contraseña:</label>
        <input type="text" name="contrasena" value="<?php echo htmlspecialchars($u['contraseña']); ?>" required>

        <label>Rol:</label>
        <select name="rol" required>
            <?php $roles=['admin','empleado','cliente']; foreach($roles as $r): ?>
                <option value="<?php echo $r; ?>" <?php if($r==$u['rol']) echo 'selected'; ?>><?php echo $r; ?></option>
            <?php endforeach; ?>
        </select>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="mostrarUsuarios.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
<?php mysqli_close($conn); ?>