<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nosotros - Killa Cosméticos</title>
  <link rel="stylesheet" href="../CSS/base.css" />
  <link rel="stylesheet" href="../CSS/nosotros.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
                <li><a href="index.php" ><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="publicidad.php" ><i class="fas fa-bullhorn"></i> Publicidad</a></li>
                <li><a href="nosotros.php" class="active"><i class="fas fa-users"></i> Nosotros</a></li>
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

  <main class="nosotros">

    <section class="nosotrosPrincipal">
      <h1>NUESTRA HISTORIA</h1>
      <p>Desde nuestras humildes raíces hasta convertirnos en una marca de belleza amada, Killa Cosméticos nació con el deseo de empoderar, inspirar y cuidar la piel real.</p>
    </section>

    <section class="team-section">
      <h2>CONOCE A NUESTRO EQUIPO</h2>
      <div class="team-cards">
        <div class="team-member fade-in">
          <img src="../img/mamafer.jpeg">
          <h3>Alejandra Salinas</h3>
          <p>Fundadora y directora creativa. Pasión por la belleza natural y las raíces andinas.</p>
        </div>
        <div class="team-member fade-in">
          <img src="../img/WhatsApp Image 2025-10-21 at 21.28.39.jpeg" >
          <h3>Melani Yupanqui</h3>
          <p>Encargada de tienda y asesora en productos de cuidado facial.</p>
        </div>
        <div class="team-member fade-in">
          <img src="../img/WhatsApp Image 2025-04-29 at 22.12.46.jpeg" >
          <h3>Luz Gutierrez</h3>
          <p>Gerente de sucursal y vendedor de productos especializados.</p>
        </div>
        
        
      </div>
    </section>

    <section class="valores-section">
      <h2>NUESTROS VALORES</h2>
      <div class="valores-grid">
        <div class="valor">
          <i class="fas fa-leaf"></i>
          <h4>Natural</h4>
          <p>Usamos ingredientes amigables con tu piel y el medio ambiente.</p>
        </div>
        <div class="valor">
          <i class="fas fa-heart"></i>
          <h4>Pasión</h4>
          <p>Amamos lo que hacemos y queremos que lo sientas en cada producto.</p>
        </div>
        <div class="valor">
          <i class="fas fa-hands-helping"></i>
          <h4>Compromiso</h4>
          <p>Con la comunidad, la calidad y el servicio al cliente personalizado.</p>
        </div>
      </div>
    </section>

  </main>

  <footer class="pie-pagina">
     <div class="contenedor-pie"> 
      <div class="columna-pie"> 
          <h4>MÁS INFORMACIÓN</h4>
          <ul>
            <li><a href="#">Kueski Pay</a></li>
            <li><a href="#">Preguntas Frecuentes</a></li>
            <li><a href="contacto.php">Contáctanos</a></li>
            <li><a href="#">Por el Planeta</a></li>
            <li><a href="#">Compra en línea y recoge en tienda</a></li>
            <li><a href="#">Whatsapp y Horarios de Tienda</a></li>
            <li><a href="#">Bolsa de trabajo</a></li>
          </ul>
        </div>
       <div class="columna-pie"> 
          <h4>SERVICIO AL CLIENTE</h4>
          <ul>
            <li><a href="#">Facturación Compras en Sucursales</a></li>
            <li><a href="#">Facturación Compras Online</a></li>
            <li><a href="#">Aviso de Privacidad</a></li>
            <li><a href="#">Términos y Condiciones</a></li>
            <li><a href="#">Política de Envío y Seguridad</a></li>
            <li><a href="#">Política de Cambios</a></li>
            <li><a href="#">Condiciones de Monedero Electrónico</a></li>
            <li><a href="#">¿Tuviste una incidencia? Da clic aquí</a></li>
          </ul>
        </div>
      <div class="columna-pie newsletter"> 
          <h4>REGISTRO</h4>
          <form action="#" method="post">
            <input type="email" placeholder="Correo*" required>
            <input type="text" placeholder="Nombre*" required>
            <select required>
              <option value="enero">Enero</option>
              <option value="febrero">Febrero</option>
              <option value="marzo">Marzo</option>
              <option value="abril">Abril</option>
              <option value="mayo">Mayo</option>
              <option value="junio">Junio</option>
              <option value="julio">Julio</option>
              <option value="agosto">Agosto</option>
              <option value="septiembre">Septiembre</option>
              <option value="octubre">Octubre</option>
              <option value="noviembre">Noviembre</option>
              <option value="diciembre">Diciembre</option>
            </select>
            <button type="submit">SUSCRIBIRSE</button>
          </form>
        </div>
        <div class="pie-social"> 
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
     <a href="https://wa.me/59168836655" class="whatsapp" target="_blank" rel="noopener noreferrer">
  <i class="fab fa-whatsapp"></i>
    </footer>
   
   
</body>
</html>
