<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Killa Cosméticos'; ?></title>
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>
    <header>
        <div class="logo">Killa Cosméticos</div>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/products">Productos</a></li>
                    <li><a href="/logout">Cerrar Sesión (<?php echo htmlspecialchars($_SESSION['user_name']); ?>)</a></li>
                <?php else: ?>
                    <li><a href="/login">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; 2026 Killa Cosméticos. Todos los derechos reservados.</p>
    </footer>

    <script src="/assets/js/main.js"></script>
</body>
</html>
