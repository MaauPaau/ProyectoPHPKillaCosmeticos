<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto - Killa Cosméticos</title>
  <link rel="stylesheet" href="../CSS/base.css" />
  <link rel="stylesheet" href="../CSS/contacto.css" />
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
                <li><a href="publicidad.php"><i class="fas fa-bullhorn"></i> Publicidad</a></li>
                <li><a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a></li>
                <li><a href="contacto.php" class="active"><i class="fas fa-envelope"></i> Contacto</a></li>
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

  <main>
    <section class="contact-section">
      <h2>CONTÁCTANOS</h2>
      <div class="contact-container">
        <div class="contact-info">
          <img src="../img/contact-us_1640x.webp">
          <div class="info-text">
            <p><strong>¡PONTE EN CONTACTO CON NOSOTROS!</strong></p>
            <p>+591 68836655</p>
            <p><strong>Horario de atención:</strong><br>
              Lunes a Viernes 9:00 am – 7:00 pm</p>
            <p><strong>Chat o WhatsApp:</strong><br>
              Lunes a Viernes 10:00 am – 10:00 pm<br>
              Sábado y Domingo 11:30 am – 2:00 pm y 4:00 pm – 9:00 pm</p>
          </div>
        </div>
        <div class="contact-form">
          <h3>¡QUEREMOS SABER DE TI!</h3>
          <p>¿Tienes algún problema con tu pedido? Escríbenos y nos pondremos en contacto contigo.</p>
          <p>#ANTETODOSOYKILLA</p>
          <form>
            <input type="text" placeholder="Nombre" required />
            <input type="email" placeholder="Email" required />
            <textarea placeholder="Mensaje" required></textarea>
            <button type="submit">ENVIAR</button>
          </form>
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
</a>
    </footer>
   

</body>
</html>

