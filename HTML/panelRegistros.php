<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Registros - Killa Cosméticos</title>
    <link rel="stylesheet" href="../CSS/base.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
        <div class="logo">Killa Cosméticos</div>
        <div class="menu-alternar" onclick="document.querySelector('nav ul').classList.toggle('activo')">
    <span></span>
    <span></span>
    <span></span>
</div>
        <nav>
            <ul>
                <li><a href="compras.php"><i class="fas fa-shopping-bag"></i> Tienda</a></li>
                <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="publicidad.php"><i class="fas fa-bullhorn"></i> Publicidad</a></li>
                <li><a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a></li>
                <li><a href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a></li>
            </ul>
        </nav>
<div class="iconos-acciones"> 
  <a href="compras.php" aria-label="Comprar "><i class="fas fa-shopping-cart"></i></a>        

        <?php if(isset($_SESSION['id_usuario'])): ?>
            <a href="#" class="dashboard-toggle"><i class="fas fa-user-circle"></i></a>
        <?php else: ?>
            <a href="login.html" title="Iniciar Sesión / Registrarse"><i class="fas fa-user-circle"></i></a>
        <?php endif; ?>
    </div>
    
    </header>

<main class="form-container">
    <h2>Panel de Registros</h2>
    <p>Seleccione el módulo que desea gestionar:</p>

   <div class="registros-menu">
    <ul>
        <li>
            <i class="fas fa-user-tie"></i> Empleados
            <a href="empleados/registroEmpleado.php">Registrar</a> |
            <a href="../PHP/empleado/mostrarEmpleados.php">Mostrar</a> |
           
        </li>
        <li>
            <i class="fas fa-user"></i> Clientes
            <a href="cliente/registrarCliente.html">Registrar</a> |
            <a href="../PHP/cliente/mostrarClientes.php">Mostrar</a> |
            
        </li>
        <li>
            <i class="fas fa-box"></i> Productos
            <a href="productos/registroProductos.php">Registrar</a> |
            <a href="../PHP/productos/mostrarProductos.php">Mostrar</a> |
            
        </li>
        <li>
            <i class="fas fa-warehouse"></i> Almacén
            <a href="almacen/registrarAlmacen.html">Registrar</a> |
            <a href="../PHP/almacen/mostrarAlmacen.php">Mostrar</a> |
            
        </li>
        <li>
            <i class="fas fa-tags"></i> Categorías
            <a href="categorias/registroCategorias.html">Registrar</a> |
            <a href="../PHP/categorias/mostrarCategorias.php">Mostrar</a> |
           
        </li>
        <li>
            <i class="fas fa-receipt"></i> Ventas
            <a href="ventas/registroVentas.php">Registrar</a> |
            <a href="../PHP/ventas/mostrarVentas.php">Mostrar</a> |
           
        </li>
        <li>
            <i class="fas fa-shopping-bag"></i> Pedidos
            <a href="pedidos/registroPedidos.php">Registrar</a> |
            <a href="../PHP/pedidos/mostrarPedidos.php">Mostrar</a> |
            
        </li>
        <li>
            <i class="fas fa-store"></i> Tiendas
            <a href="tiendas/registroTiendas.html">Registrar</a> |
            <a href="../PHP/tiendas/mostrarTiendas.php">Mostrar</a> |
            
        </li>
        <li>
            <i class="fas fa-user-circle"></i> Usuarios
            <a href="usuario/registro.html">Registrar</a> |
            <a href="../PHP/usuario/mostrarUsuario.php">Mostrar</a> |
           
        </li>
    </ul>
</div>

</main>

</body>
</html>
