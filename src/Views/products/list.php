<section class="list-container">
    <h1>Lista de Productos</h1>

    <div class="actions-bar">
        <a href="/products/create" class="btn btn-primary">Nuevo Producto</a>
        <form action="/products" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Buscar productos..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <?php if ($product['imagen']): ?>
                                    <img src="/img/<?php echo htmlspecialchars($product['imagen']); ?>" alt="<?php echo htmlspecialchars($product['nombre']); ?>" width="50">
                                <?php else: ?>
                                    <span>Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($product['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($product['nombre_categoria'] ?? 'N/A'); ?></td>
                            <td>Bs. <?php echo number_format($product['precio'], 2); ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td>
                                <a href="/products/edit?id=<?php echo $product['id_producto']; ?>" class="btn-edit">Editar</a>
                                <form action="/products/delete" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro?')">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $product['id_producto']; ?>">
                                    <button type="submit" class="btn-delete" style="border:none; cursor:pointer;">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No se encontraron productos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="/products?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" class="<?php echo $i === $currentPage ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</section>
