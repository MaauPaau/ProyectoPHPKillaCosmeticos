<?php
session_start();

// Si no hay sesión, redirige al login
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../HTML/login.html");
    exit();
}

include("../conectar.php");
$conn = conexion();

// Validar que se haya pasado el producto
if (!isset($_GET['id_producto'])) {
    die("Error: No se seleccionó ningún producto.");
}

$idProducto = intval($_GET['id_producto']);
$cantidad = 1; // compra directa de una unidad
$nombreUsuario = $_SESSION['nombre']; // nombre del usuario logueado

// 1️⃣ Buscar si ya existe un cliente con el mismo nombre
$sqlCliente = "SELECT id_cliente FROM clientes WHERE nombre = '$nombreUsuario' LIMIT 1";
$resCliente = mysqli_query($conn, $sqlCliente);

if ($resCliente && mysqli_num_rows($resCliente) > 0) {
    $row = mysqli_fetch_assoc($resCliente);
    $idCliente = $row['id_cliente'];
} else {
    // 2️⃣ Si no existe, crear un nuevo cliente
    mysqli_query($conn, "INSERT INTO clientes (nombre) VALUES ('$nombreUsuario')");
    $idCliente = mysqli_insert_id($conn);
}

// 3️⃣ Crear pedido (pendiente)
$sqlPedido = "INSERT INTO pedidos (id_cliente, fecha_pedido, estado, id_tienda)
              VALUES ('$idCliente', NOW(), 'pendiente', 1)";
mysqli_query($conn, $sqlPedido);
$idPedido = mysqli_insert_id($conn);

// 4️⃣ Insertar detalle del producto
$sqlDetalle = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, subtotal)
               VALUES ('$idPedido', '$idProducto', '$cantidad', 0)";
mysqli_query($conn, $sqlDetalle);

// 5️⃣ Mensaje de confirmación
echo "<h2>✅ Pedido registrado correctamente</h2>";
echo "<p>Producto ID: <b>$idProducto</b><br>Estado actual: <b>Pendiente</b></p>";
echo "<a href='../../HTML/compras.php'>Volver al catálogo</a>";

mysqli_close($conn);
?>
