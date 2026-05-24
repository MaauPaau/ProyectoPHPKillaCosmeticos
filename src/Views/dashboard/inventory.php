<?php
use App\Core\Validator;
?>
<section class="dashboard-container">
    <h1>Dashboard de Inventario</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Productos Totales</h3>
            <p class="stat-value"><?= (int)($totalProducts ?? 0) ?></p>
        </div>
        <div class="stat-card">
            <h3>Stock Total</h3>
            <p class="stat-value"><?= (int)($totalStock ?? 0) ?></p>
        </div>
        <div class="stat-card">
            <h3>Órdenes Totales</h3>
            <p class="stat-value"><?= (int)($totalOrders ?? 0) ?></p>
        </div>
        <div class="stat-card">
            <h3>Ingresos Totales</h3>
            <p class="stat-value">Bs. <?= number_format(($totalRevenue ?? 0), 2) ?></p>
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
                                <td><?= Validator::clean($product['nombre']) ?></td>
                                <td><span class="badge-warning"><?= (int)$product['stock'] ?></span></td>
                                <td><a href="/products/edit/<?= $product['id_producto'] ?>" class="btn btn-sm btn-primary">Editar</a></td>
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
                                <td><?= Validator::clean($product['nombre']) ?></td>
                                <td><?= (int)$product['ventas'] ?></td>
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
