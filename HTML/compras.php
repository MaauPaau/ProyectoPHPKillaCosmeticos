<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.html");
  exit();
}

include("../PHP/conectar.php");
$conn = conexion();
$conn->set_charset("utf8");

// filtros
$busqueda = $_GET['busqueda'] ?? '';
$categoria = $_GET['categoria'] ?? '';
$precio_min = $_GET['precio_min'] ?? '';
$precio_max = $_GET['precio_max'] ?? '';
$stock_estado = $_GET['stock_estado'] ?? '';

// validación
$precio_min = is_numeric($precio_min) ? $precio_min : '';
$precio_max = is_numeric($precio_max) ? $precio_max : '';

// ================= QUERY =================
$sql = "
SELECT 
    p.id_producto, 
    p.nombre, 
    p.descripcion, 
    p.precio, 
    p.stock, 
    p.imagen, 
    c.nombre_categoria AS categoria
FROM productos p
LEFT JOIN categorias c 
    ON p.id_categoria = c.id_categoria
WHERE 1=1
";

$params = [];
$types = "";

// filtros
if (!empty($busqueda)) {
    $sql .= " AND p.nombre LIKE ?";
    $params[] = "%" . $busqueda . "%";
    $types .= "s";
}

if (!empty($categoria)) {
    $sql .= " AND c.nombre_categoria = ?";
    $params[] = $categoria;
    $types .= "s";
}

if ($precio_min !== '') {
    $sql .= " AND p.precio >= ?";
    $params[] = $precio_min;
    $types .= "d";
}

if ($precio_max !== '') {
    $sql .= " AND p.precio <= ?";
    $params[] = $precio_max;
    $types .= "d";
}

if ($stock_estado === "agotado") {
    $sql .= " AND p.stock = 0";
} elseif ($stock_estado === "disponible") {
    $sql .= " AND p.stock > 0";
}

$sql .= " ORDER BY p.nombre ASC";

// preparar
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$productos = $stmt->get_result();

// categorías
$categorias_query = mysqli_query($conn, "SELECT nombre_categoria FROM categorias ORDER BY nombre_categoria ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Catálogo</title>

<link rel="stylesheet" href="../CSS/base.css">
<link rel="stylesheet" href="../CSS/compras.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<header>
    <div class="logo">Killa Cosméticos</div>

    <div class="menu-alternar" onclick="document.querySelector('nav ul').classList.toggle('activo')">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <nav>
        <ul>
            <li><a href="compras.php" class="active"><i class="fas fa-shopping-bag"></i> Tienda</a></li>
            <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="publicidad.php"><i class="fas fa-bullhorn"></i> Publicidad</a></li>
            <li><a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a></li>
            <li><a href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a></li>
        </ul>
    </nav>

    <div class="iconos-acciones"> 
        <a href="compras.php" aria-label="Comprar">
            <i class="fas fa-shopping-cart"></i>
        </a>

        <?php if(isset($_SESSION['id_usuario'])): ?>
            <a href="#" class="dashboard-toggle">
                <i class="fas fa-user-circle"></i>
            </a>
        <?php else: ?>
            <a href="login.html" title="Iniciar Sesión / Registrarse">
                <i class="fas fa-user-circle"></i>
            </a>
        <?php endif; ?>
    </div>
</header>

<h2>Catálogo de Productos</h2>

<p><?= $productos->num_rows ?> productos encontrados</p>

<!-- FILTROS -->
<section class="filtros">
<form method="GET">

<input type="text" name="busqueda" placeholder="Buscar..." value="<?= htmlspecialchars($busqueda) ?>">

<select name="categoria">
  <option value="">Todas</option>
  <?php while ($cat = mysqli_fetch_assoc($categorias_query)) { ?>
    <option value="<?= $cat['nombre_categoria'] ?>" <?= ($categoria == $cat['nombre_categoria']) ? 'selected' : '' ?>>
      <?= $cat['nombre_categoria'] ?>
    </option>
  <?php } ?>
</select>

<input type="number" name="precio_min" placeholder="Precio mín" value="<?= $precio_min ?>">
<input type="number" name="precio_max" placeholder="Precio máx" value="<?= $precio_max ?>">

<select name="stock_estado">
  <option value="">Todo</option>
  <option value="disponible" <?= ($stock_estado == 'disponible') ? 'selected' : '' ?>>Disponible</option>
  <option value="agotado" <?= ($stock_estado == 'agotado') ? 'selected' : '' ?>>Agotado</option>
</select>

<button type="submit">Filtrar</button>

<a href="compras.php">Limpiar filtros</a>

</form>
</section>

<!-- PRODUCTOS -->
<div class="productos-container">

<?php if ($productos->num_rows === 0): ?>
  <p class="sin-resultados">No se encontraron productos con esos filtros.</p>
<?php endif; ?>

<?php while ($fila = $productos->fetch_assoc()): ?>
<div class="producto-card <?= $fila['stock'] == 0 ? 'sin-stock' : '' ?>">

<img src="../IMG/<?= $fila['imagen'] ?: 'sinimagen.jpg'; ?>" class="producto-img">

<?php if ($fila['stock'] == 0): ?>
<div class="etiqueta-agotado">SIN STOCK</div>
<?php endif; ?>

<div class="producto-info">

<h3><?= htmlspecialchars($fila['nombre']) ?></h3>

<p class="categoria"><?= htmlspecialchars($fila['categoria']) ?></p>

<div class="precio">Bs <?= number_format($fila['precio'], 2) ?></div>

<div class="stock <?= $fila['stock'] == 0 ? 'rojo' : 'verde' ?>">
<?= $fila['stock'] == 0 ? 'Agotado' : 'Stock: ' . $fila['stock'] ?>
</div>

<p class="descripcion">
<?= substr(htmlspecialchars($fila['descripcion']), 0, 80) ?>...
</p>

</div>

</div>
<?php endwhile; ?>

</div>

</body>
</html>

<?php $conn->close(); ?>