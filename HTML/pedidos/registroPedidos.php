<?php
include("../../PHP/conectar.php");
$conn = conexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Pedido - Killa Cosméticos</title>
  <link rel="stylesheet" href="../../CSS/base.css">
<link rel="stylesheet" href="../../CSS/formulario.css">  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
                <li><a href="../compras.php"><i class="fas fa-shopping-bag"></i> Tienda</a></li>
                <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="../publicidad.php"><i class="fas fa-bullhorn"></i> Publicidad</a></li>
                <li><a href="../nosotros.php"><i class="fas fa-users"></i> Nosotros</a></li>
                <li><a href="../contacto.php"><i class="fas fa-envelope"></i> Contacto</a></li>
            </ul>
        </nav>
<div class="iconos-acciones"> 
  <a href="../compras.php" aria-label="Comprar "><i class="fas fa-shopping-cart"></i></a>        
    </div>
    
    </header>


<main class="form-container">
  <h2>REGISTRO DE PEDIDO</h2>
  <p class="subtitle">Por favor, complete los siguientes datos:</p>

  <form action="../../PHP/pedidos/registrarPedidos.php" method="POST" class="form">
    <label for="id_cliente">Cliente:</label>
    <select name="id_cliente" required>
      <?php
        $sql = "SELECT id_cliente, nombre FROM clientes";
        $tabla = mysqli_query($conn, $sql);
        while($fila = mysqli_fetch_array($tabla)) {
          echo '<option value="'.$fila['id_cliente'].'">'.$fila['nombre'].'</option>';
        }
      ?>
    </select><br><br>

    <label for="id_tienda">Tienda:</label>
    <select name="id_tienda" required>
      <?php
        $sql2 = "SELECT id_tienda, nombre_tienda FROM tiendas";
        $tabla2 = mysqli_query($conn, $sql2);
        while($fila2 = mysqli_fetch_array($tabla2)) {
          echo '<option value="'.$fila2['id_tienda'].'">'.$fila2['nombre_tienda'].'</option>';
        }
      ?>
    </select><br><br>

    <label for="fecha_pedido">Fecha del pedido:</label>
    <input type="date" name="fecha_pedido" required><br><br>

    <label for="estado">Estado:</label>
    <select name="estado" required>
      <option value="pendiente">Pendiente</option>
      <option value="procesando">Procesando</option>
      <option value="enviado">Enviado</option>
      <option value="entregado">Entregado</option>
    </select><br><br>

    <button type="submit" class="btn-submit">Registrar Pedido</button>
  </form>
</main>

</body>
</html>

<?php
mysqli_close($conn);
?>
