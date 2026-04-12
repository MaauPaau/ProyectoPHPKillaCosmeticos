<?php
include("../../PHP/conectar.php");
$conn = conexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Producto - Killa Cosméticos</title>
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
  <h2>REGISTRO DE PRODUCTO</h2>
  <p class="subtitle">Por favor, complete los siguientes datos:</p>

  <form action="../../PHP/productos/registrarProductos.php" method="POST" class="form">
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <textarea name="descripcion" placeholder="Descripción del producto" cols="30" rows="5" required></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>

    <label for="id_categoria">Categoría:</label>
    <select name="id_categoria" required>
      <?php
        $sql = "SELECT id_categoria, nombre_categoria FROM categorias";
        $tabla = mysqli_query($conn, $sql);
        while($fila = mysqli_fetch_array($tabla)) {
          echo '<option value="'.$fila['id_categoria'].'">'.$fila['nombre_categoria'].'</option>';
        }
      ?>
    </select><br><br>

    <button type="submit" class="btn-submit">Registrar Producto</button>
  </form>
</main>

</body>
</html>

<?php
mysqli_close($conn);
?>
