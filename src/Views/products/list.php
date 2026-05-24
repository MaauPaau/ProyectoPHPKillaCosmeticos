<h1>Lista de Productos</h1>

<div class="actions">
    <a href="/products/create" class="btn btn-primary">Nuevo Producto</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id_producto'] ?></td>
            <td><?= App\Core\Validator::clean($product['nombre']) ?></td>
            <td><?= $product['precio'] ?></td>
            <td><?= $product['stock'] ?></td>
            <td><?= App\Core\Validator::clean($product['nombre_categoria']) ?></td>
            <td>
                <a href="/products/edit/<?= $product['id_producto'] ?>"><i class="fas fa-edit"></i></a>
                <a href="/products/delete/<?= $product['id_producto'] ?>" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
