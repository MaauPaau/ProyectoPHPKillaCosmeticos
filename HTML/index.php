<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Killa Cosméticos | Inicio - Belleza Natural y Ética</title>
    
    <meta name="description" content="Killa Cosméticos: Tu tienda online de maquillaje y cuidado personal natural y de alta calidad. Descubre nuestras ofertas y nuevas colecciones.">
    <meta property="og:title" content="Killa Cosméticos | Inicio">
    <meta property="og:description" content="Descubre la belleza natural con Killa Cosméticos. Envíos a domicilio y pagos seguros.">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="stylesheet" href="../CSS/base.css"/> 
    <link rel="stylesheet" href="../CSS/index.css"/>
    <link rel="stylesheet" href="../CSS/dashboard.css"/>
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
                <li><a href="index.php" class="active"><i class="fas fa-home"></i> Inicio</a></li>
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


<main>
    <section class="bannerPrincipal">
        <h1>Bienvenido a nuestra plataforma</h1>
        <p>Conoce Killa Cosméticos, donde la belleza natural cobra vida.</p>
        <div class="botonesBanner">
            <a href="compras.php" class="btnAccion principal">Comprar Ahora</a> 
            <a href="nosotros.php" class="btnAccion secundario">Conócenos</a>
        </div>
    </section>

  


    <section class="ofertas">
        <h2>Ofertas especiales</h2>
        <div class="rejillaProductos">
            <div class="tarjetaProducto">
                <img src="../img/v1.webp"  />
                <h3>Descuento en maquillaje</h3>
                <p>Hasta 50% de descuento en productos seleccionados.</p>
            </div>
            <div class="tarjetaProducto">
                <img src="../img/v2.webp"  />
                <h3>Skincare exclusivo</h3>
                <p>Cuida tu piel con nuestras nuevas fórmulas.</p>
            </div>
            <div class="tarjetaProducto">
                <img src="../img/v3.webp"  />
                <h3>Cabello radiante</h3>
                <p>Productos para un cabello saludable y brillante.</p>
            </div>
        </div>
    </section>

  

    <section class="bannersGrandes">
        <img src="../img/post_1_1_-_1_-_wet_n_wild_400x.webp"  />
        <img src="../img/post_1_1_-_2_-_wet_n_wild_400x.webp"  />
        <img src="../img/BLOQUE_1_55196203-6250-41ba-9bbd-56f312e4a15c_400x.webp"  />
        <img src="../img/BLOQUE_2_6039f588-d9c7-41bb-b072-01cbee7ef8ea_400x.webp"  />
    </section>
   

    <section class="productosDestacados">
        <h2>Anuncio</h2>
        <div class="rejillaProductos aparecerDesvanecer">
            <div class="articuloProducto">
                <img src="../img/v4.webp"  />
                <h3>Base líquida</h3>
                <p>Cobertura perfecta para todo el día.</p>
            </div>
            <div class="articuloProducto">
                <img src="../img/v5.webp"  />
                <h3>Paleta de sombras</h3>
                <p>Colores vibrantes para cada ocasión.</p>
            </div>
            <div class="articuloProducto">
                <img src="../img/v6.webp"  />
                <h3>Labial mate</h3>
                <p>Duración prolongada y colores intensos.</p>
            </div>
        </div>
    </section>

    <section class="resenas">
        <h2>RESEÑAS</h2>
        <div class="galeria">
        <img src="../img/revie-social_7_400x.webp" />
        <img src="../img/revie-social_2_54e80503-9e0c-4993-a864-899507de19cb_400x.webp" />
        <img src="../img/revie-social_11_9c6d77dc-4786-4be0-8c53-68be5be1863b_400x.webp" />
        <img src="../img/revie-social_10_2f21b4cb-8180-4b95-8e1b-4eeb3691c585_400x.webp"  />
        <img src="../img/revie-social_10_2f21b4cb-8180-4b95-8e1b-4eeb3691c585_400x.webp"  />
     
      </div>
    </section>
    
   


    <section class="beneficios">
        <h2>BENEFICIOS DE CLIENTES KILLA COSMÉTICOS</h2>
        <div class="listaBeneficios">
            <div class="beneficio">
          <img src="../img/delivery-truck-2_280x_66f33b28-cf2b-4c79-9154-65149f0c07ff_55x.webp"  >
          <h3>ENVÍOS A DOMICILIO</h3>
          <p>Recibe tus favoritos con ENVÍO GRATIS en compras mayores a Bs.599</p>
        </div>
        <div class="beneficio">
          <img src="../img/secure-payment_280x_dcf4da77-9044-4ca2-a6a3-00a74943f056_55x.webp"  >
          <h3>PAGO SEGURO</h3>
          <p>Tarjetas de Débito y Crédito – PayPal – MercadoPago – YoloPago – Yape</p>
        </div>
        <div class="beneficio">
          <img src="../img/pickup_1fc26ff6-3589-4417-9bb9-3525015aa341_280x_copia_55x.webp"  >
          <h3>COMPRA EN LÍNEA Y RECOGE EN TIENDA</h3>
          <p>En compras mayores a Bs.299</p>
        </div>
        <div class="beneficio">
          <img src="../img/chat_280x_8c9d9562-8dbf-413e-8c98-224ad9a576f4_55x.webp"  >
          <h3>ATENCIÓN PERSONALIZADA</h3>
          <p>¿Dudas sobre qué producto elegir? Te asesoramos por WhatsApp</p>
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
   

   
<?php if(isset($_SESSION['id_usuario'])): ?>
<div class="dashboard-overlay"></div>

<div class="dashboard-panel">
  <div class="dashboard-header">
    <button class="dashboard-close">&times;</button>
    <div class="user-info">
      <img src="../img/user.png"  class="user-avatar" >
      <div>
        <h2><?php echo htmlspecialchars($_SESSION['nombre']); ?></h2>
        <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <span class="rol"><?php echo ucfirst($_SESSION['rol']); ?></span>
      </div>
    </div>
  </div>

  <div class="dashboard-content">

    <?php if($_SESSION['rol'] == 'cliente'): ?>
      <div class="cliente-info">
        <h3><i class="fas fa-user"></i> Información Personal</h3>
        <div class="info-card">
          <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['nombre']); ?></p>
          <p><strong>Correo:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
          <p><strong>Rol:</strong> Cliente</p>
          <p><em>Gracias por ser parte de Killa Cosméticos 💜</em></p>
        </div>
      </div>

    <?php else: ?>
      <h3><i class="fas fa-plus-circle"></i> Registrar</h3>
      <ul class="dashboard-list">
        <?php if($_SESSION['rol'] == 'admin'): ?>
          <li><a href="empleados/registroEmpleado.php">👥 Registrar Empleado</a></li>
          <li><a href="almacen/registrarAlmacen.html">🏭 Registrar Almacén</a></li>
          <li><a href="tiendas/registroTiendas.html">🏬 Registrar Tienda</a></li>
          <li><a href="cliente/registrarCliente.html">👤 Registrar Usuario</a></li>

        <?php elseif($_SESSION['rol'] == 'encargadoDistribucion'): ?>
          <li><a href="pedidos/registroPedidos.php">📦 Registrar Pedido</a></li>

        <?php elseif($_SESSION['rol'] == 'cajero'): ?>
          <li><a href="ventas/registroVentas.php">💵 Registrar Venta</a></li>
          <li><a href="productos/registroProductos.php">🛍️ Registrar Producto</a></li>

        <?php elseif($_SESSION['rol'] == 'atencionCliente'): ?>
          <li><a href="cliente/registrarCliente.html">🧑 Registrar Cliente</a></li>

        <?php elseif($_SESSION['rol'] == 'encargadoAlmacen'): ?>
          <li><a href="productos/registroProductos.php">🛍️ Registrar Producto</a></li>
          <li><a href="categorias/registroCategorias.html">📂 Registrar Categoría</a></li>
        <?php endif; ?>
      </ul>

      <h3><i class="fas fa-list"></i> Mostrar / Consultar</h3>
      <ul class="dashboard-list">
        <?php if($_SESSION['rol'] == 'admin'): ?>
          <li><a href="panelRegistros.php">📋 Panel de Registros</a></li>
          <li><a href="../PHP/empleado/mostrarEmpleados.php">👥 Empleados</a></li>
          <li><a href="../PHP/almacen/mostrarAlmacen.php">🏭 Almacén</a></li>
          <li><a href="../PHP/tiendas/mostrarTiendas.php">🏬 Tiendas</a></li>
          <li><a href="../PHP/usuario/mostrarUsuario.php">👤 Usuarios</a></li>

        <?php elseif($_SESSION['rol'] == 'encargadoDistribucion'): ?>
          <li><a href="../PHP/pedidos/mostrarPedido.php">📦 Pedidos</a></li>

        <?php elseif($_SESSION['rol'] == 'cajero'): ?>
          <li><a href="../PHP/ventas/mostrarVentas.php">💵 Ventas</a></li>
          <li><a href="../PHP/usuario/mostrarUsuario.php">👤 Usuarios</a></li>

        <?php elseif($_SESSION['rol'] == 'atencionCliente'): ?>
          <li><a href="../PHP/cliente/mostrarCliente.php">🧑 Clientes</a></li>
          <li><a href="../PHP/usuario/mostrarUsuario.php">👤 Usuarios</a></li>

        <?php elseif($_SESSION['rol'] == 'encargadoAlmacen'): ?>
          <li><a href="../PHP/productos/mostrarProductos.php">🛍️ Productos</a></li>
          <li><a href="../PHP/categorias/mostrarCategorias.php">📂 Categorías</a></li>
          <li><a href="../PHP/usuario/mostrarUsuario.php">👤 Usuarios</a></li>
        <?php endif; ?>
      </ul>
    <?php endif; ?>
  </div>

  <div class="dashboard-footer">
    <a href="../PHP/logout.php" class="logout-btn">
      <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a>
  </div>
</div>




<script>
  const toggleBtn = document.querySelector(".dashboard-toggle");
  const panel = document.querySelector(".dashboard-panel");
  const overlay = document.querySelector(".dashboard-overlay");
  const closeBtn = document.querySelector(".dashboard-close");

  if(toggleBtn){
    toggleBtn.addEventListener("click", e=>{
      e.preventDefault();
      panel.classList.add("active");
      overlay.classList.add("active");
      document.body.style.overflow = "hidden";
    });
  }

  [overlay, closeBtn].forEach(el=>{
    if(el) el.addEventListener("click", ()=>{
      panel.classList.remove("active");
      overlay.classList.remove("active");
      document.body.style.overflow = "auto";
    });
  });

</script>
<?php endif; ?>

</body>
</html>
