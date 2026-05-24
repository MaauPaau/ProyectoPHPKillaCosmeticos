<div class="form-container">
    <h2><?php echo $title; ?></h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="<?php echo isset($product['id_producto']) ? '/products/update' : '/products/store'; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <?php if (isset($product['id_producto'])): ?>
            <input type="hidden" name="id_producto" value="<?php echo $product['id_producto']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($product['nombre'] ?? ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4"><?php echo htmlspecialchars($product['descripcion'] ?? ''); ?></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio (Bs.)</label>
            <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $product['precio'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?php echo $product['stock'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoría (ID)</label>
            <input type="number" name="id_categoria" id="id_categoria" value="<?php echo $product['id_categoria'] ?? ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto</label>
            <input type="file" name="imagen" id="imagen" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo isset($product['id_producto']) ? 'Actualizar' : 'Guardar'; ?></button>
            <a href="/products" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
