<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Killa Cosméticos' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Killa Cosméticos</div>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/products">Productos</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="container">
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Killa Cosméticos - Profesional</p>
    </footer>
</body>
</html>
