<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Publicidad - Killa Cosméticos</title>
  <link rel="stylesheet" href="../CSS/base.css">
  <link rel="stylesheet" href="../CSS/xd.css">
  
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
                <li><a href="publicidad.php" class="active"><i class="fas fa-bullhorn"></i> Publicidad</a></li>
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

    <div class="contenido-principal">
    
      <h2>Publicidad en nuestra plataforma</h2>
      <img src="img/publicitando2.avif"  class="imagen-publicitaria">

  <section class="descripcion-publicidad">
    <p>
      Ofrecemos espacios de publicidad exclusivos para marcas que deseen promocionar sus productos dentro de nuestra plataforma. Nuestro sitio es visitado diariamente por decenas de clientes potenciales interesados en productos naturales y de belleza.
    </p>
  </section>

  <section class="beneficios-publicidad">
    <h3>Beneficios de anunciar con nosotros</h3>
    <ul>
      <li>Mayor visibilidad para tu marca</li>
      <li>Publicidad dirigida a un público interesado en cosmética natural</li>
      <li>Espacios destacados en las secciones más vistas</li>
      <li>Posibilidad de mostrar productos en la portada</li>
    </ul>
  </section>

      <section>
        <h2>Productos Destacados</h2>
        <div class="productos">
          <div class="producto">
            <span class="etiqueta">Exclusivo online</span>
            <img src="../img/1.avif" >
            <h3>Bálsamo Labial </h3>
            <p>Brillo, aroma y humectación intensa.</p>
            <p class="precio">Bs 170</p>
          </div>
          <div class="producto">
            <img src="../img/2.webp" >
            <h3>Dúo de Rubores Patrick Ta</h3>
            <p>Rubor en crema y polvo para brillo natural.</p>
            <p class="precio">Bs 270</p>
          </div>
          <div class="producto">
            <span class="etiqueta">Mini size</span>
            <img src="../img/3.webp" >
            <h3>Spray Fijador Mate ONE/SIZE</h3>
            <p>Fijador con duración todo el día.</p>
            <p class="precio">Bs 190</p>
          </div>
          <div class="producto">
            <img src="../img/4.webp" >
            <h3>Suero Labial Tinteado LANEIGE</h3>
            <p>Color suave y humectación en un solo paso.</p>
            <p class="precio">Bs 155</p>
          </div>
          <div class="producto">
            <img src="../img/5.webp" >
            <h3>Polvo Suelto Rosado HUDA BEAUTY</h3>
            <p>Acabado suave y sin brillos.</p>
            <p class="precio">Bs 180</p>
          </div>
          <div class="producto">
            <img src="../img/6.avif" >
            <h3>Base Líquida Haus Labs</h3>
            <p>Cobertura natural, fórmula ligera.</p>
            <p class="precio">Bs 370</p>
          </div>
        </div>
      </section>
    
      <section>
        <h2>Nuevas Llegadas</h2>
        <div class="productos">
          <div class="producto">
            <img src="../img/11.webp" >
            <h3>Spray Fijador Mini ONE/SIZE</h3>
            <p>Perfecto para llevar en la cartera.</p>
            <p class="precio">Bs 190</p>
          </div>
          <div class="producto">
            <img src="../img/12.avif" >
            <h3>Rubor Líquido Sae</h3>
            <p>Color cremoso y fácil de difuminar.</p>
            <p class="precio">Bs 190</p>
          </div>
          <div class="producto">
            <img src="img/13.webp" >
            <h3>Corrector Líquido Hourglass</h3>
            <p>Alta cobertura con acabado natural.</p>
            <p class="precio">Bs 310</p>
          </div>
          <div class="producto">
            <img src="../img/14.webp" >
            <h3>Sérum Iluminador NATASHA DENONA</h3>
            <p>Hidratante facial con efecto glow.</p>
            <p class="precio">Bs 225</p>
          </div>
          <div class="producto">
            <img src="../img/15.webp" >
            <h3>Rubor Líquido HUDA BEAUTY</h3>
            <p>Brillo intenso para mejillas radiantes.</p>
            <p class="precio">Bs 180</p>
          </div>
          <div class="producto">
            <img src="../img/16.webp" >
            <h3>Bálsamo Labial Gisou</h3>
            <p>Nutrición con miel y toque floral.</p>
            <p class="precio">Bs 120</p>
          </div>
        </div>
      </section>
    
      
    </div>
    
  

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