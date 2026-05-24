<?php
// Vista del Dashboard de Inventario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Inventario - Killa Cosméticos</title>
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>
    <header>
        <div class="logo">Killa Cosméticos - Admin</div>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/products">Productos</a></li>
                <li><a href="/logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-container">
            <h1>Dashboard de Inventario</h1>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Productos Totales</h3>
                    <p class="stat-value"><?php echo $totalProducts; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Stock Total</h3>
                    <p class="stat-value"><?php echo $totalStock; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Órdenes Totales</h3>
                    <p class="stat-value"><?php echo $totalOrders; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Ingresos Totales</h3>
                    <p class="stat-value">Bs. <?php echo number_format($totalRevenue, 2); ?></p>
                </div>
            </div>

            <div class="dashboard-section">
                <h2>Productos con Stock Bajo</h2>
                <?php if (!empty($lowStockProducts)): ?>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Stock</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lowStockProducts as $product): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($product['nombre']); ?></td>
                                        <td><span class="badge-warning"><?php echo $product['stock']; ?></span></td>
                                        <td><a href="/products/<?php echo $product['id_producto']; ?>/edit" class="btn btn-sm btn-primary">Editar</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>No hay productos con stock bajo.</p>
                <?php endif; ?>
            </div>

            <div class="dashboard-section">
                <h2>Productos Más Vendidos</h2>
                <?php if (!empty($topProducts)): ?>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Ventas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($topProducts as $product): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($product['nombre']); ?></td>
                                        <td><?php echo $product['ventas']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>No hay datos de ventas disponibles.</p>
                <?php endif; ?>
            </div>

            <div class="dashboard-actions">
                <a href="/export/products/pdf" class="btn btn-primary">Exportar Productos (PDF)</a>
                <a href="/export/products/excel" class="btn btn-primary">Exportar Productos (Excel)</a>
                <a href="/export/orders/csv" class="btn btn-secondary">Exportar Órdenes (CSV)</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Killa Cosméticos. Todos los derechos reservados.</p>
    </footer>

    <script src="/assets/js/main.js"></script>
</body>
</html>
