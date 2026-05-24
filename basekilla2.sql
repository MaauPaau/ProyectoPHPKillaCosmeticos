-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2026 a las 03:07:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basekilla2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `nombre`, `ubicacion`) VALUES
(16, 'Killa Almacén', 'Avenida Raul Salmón, El Alto Nro 1385');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Cremas'),
(2, 'Jabones'),
(3, 'Aceites'),
(4, 'Shampoo'),
(5, 'Perfumes'),
(6, 'Cremas'),
(7, 'Jabones'),
(8, 'Aceites'),
(9, 'Shampoo'),
(10, 'Perfumes'),
(11, 'Lociones'),
(12, 'Exfoliantes'),
(13, 'Mascarillas'),
(15, 'Protectores'),
(16, 'Labial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `telefono`, `direccion`, `correo`, `id_usuario`) VALUES
(1, 'Jorge Rojas', '71234501', 'Av. Hernando Siles, La Paz', 'jorge.rojas@gmail.com', 85),
(2, 'María Quispe', '71234502', 'Zona Miraflores, La Paz', 'maria.quispe@gmail.com', 86),
(3, 'Ana Torres', '71234503', 'El Alto, Zona 12 de Octubre', 'ana.torres@gmail.com', 87),
(4, 'Diego Alvarez', '71234504', 'Cochabamba Centro', 'diego.alvarez@gmail.com', 88),
(5, 'Sofía Gutierrez', '71234505', 'Zona Sopocachi, La Paz', 'sofia.gutierrez@gmail.com', 89),
(6, 'Kevin Flores', '71234506', 'Santa Cruz, Equipetrol', 'kevin.flores@gmail.com', 90),
(7, 'Valeria Choque', '71234507', 'El Alto, Senkata', 'valeria.choque@gmail.com', 91),
(8, 'Pedro Mamani', '71234508', 'Zona Obrajes, La Paz', 'pedro.mamani@gmail.com', 92),
(9, 'Luis Herrera', '71234509', 'Cochabamba, Quillacollo', 'luis.herrera@gmail.com', 93),
(10, 'Camila Vargas', '71234510', 'Santa Cruz Norte', 'camila.vargas@gmail.com', 94),
(11, 'Ricardo López', '71234511', 'La Paz Centro', 'ricardo.lopez@gmail.com', 95),
(12, 'Daniela Cruz', '71234512', 'El Alto, Villa Adela', 'daniela.cruz@gmail.com', 96),
(13, 'Fernando Aguilar', '71234513', 'Tarija Centro', 'fernando.aguilar@gmail.com', 97),
(14, 'Paola Ríos', '71234514', 'Sucre, Zona Central', 'paola.rios@gmail.com', 98),
(15, 'Sebastián Luna', '71234515', 'La Paz, Zona Sur', 'sebastian.luna@gmail.com', 99),
(16, 'Natalia Suarez', '71234516', 'Santa Cruz, Plan 3000', 'natalia.suarez@gmail.com', 100),
(17, 'Andrés Castro', '71234517', 'El Alto, Río Seco', 'andres.castro@gmail.com', 101),
(18, 'Gabriela Molina', '71234518', 'Cochabamba Norte', 'gabriela.molina@gmail.com', 102),
(19, 'Hugo Paredes', '71234519', 'La Paz, Miraflores Bajo', 'hugo.paredes@gmail.com', 103),
(20, 'Elena Chávez', '71234520', 'Oruro Centro', 'elena.chavez@gmail.com', 104),
(21, 'Marco Salazar', '71234521', 'La Paz, Sopocachi Alto', 'marco.salazar@gmail.com', 105),
(22, 'Verónica Ponce', '71234522', 'Santa Cruz Este', 'veronica.ponce@gmail.com', 106),
(23, 'Raúl Medina', '71234523', 'El Alto, Senkata Norte', 'raul.medina@gmail.com', 107),
(24, 'Jessica Arias', '71234524', 'Cochabamba Sur', 'jessica.arias@gmail.com', 108),
(25, 'Oscar Pinto', '71234525', 'La Paz Centro Histórico', 'oscar.pinto@gmail.com', 109),
(26, 'Patricia Vega', '71234526', 'Sucre Norte', 'patricia.vega@gmail.com', 110),
(27, 'Miguel Soria', '71234527', 'Tarija Sur', 'miguel.soria@gmail.com', 111),
(28, 'Adriana Cordero', '71234528', 'Santa Cruz Centro', 'adriana.cordero@gmail.com', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `id_tienda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `cargo`, `id_tienda`) VALUES
(1, 'Carlos Rojas', 'Cajero', 14),
(2, 'Ana Flores', 'Cajera', 14),
(3, 'Luis Paredes', 'Encargado de Ventas', 14),
(4, 'María Soto', 'Atención al Cliente', 14),
(5, 'Pedro Cruz', 'Reponedor', 14),
(6, 'Sofía Ramos', 'Supervisor', 14),
(7, 'Jorge Lima', 'Cajero', 14),
(8, 'Valeria Ruiz', 'Cajera', 14),
(9, 'Diego Peña', 'Almacenero', 14),
(10, 'Lucía Vega', 'Atención al Cliente', 14),
(11, 'Héctor Lima', 'Encargado de Tienda', 15),
(12, 'Mario Ponce', 'Cajero', 15),
(13, 'Javier Ríos', 'Cajera', 15),
(14, 'Daniel Soto', 'Reponedor', 15),
(15, 'Oscar Flores', 'Supervisor', 15),
(16, 'Miguel Torres', 'Atención al Cliente', 15),
(17, 'Andrés Vega', 'Cajero', 15),
(18, 'Luis Cruz', 'Almacenero', 15),
(19, 'Carlos Pinto', 'Cajera', 15),
(20, 'Fernando Ruiz', 'Encargado de Ventas', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT current_timestamp(),
  `estado` enum('pendiente','confirmado','entregado') DEFAULT 'pendiente',
  `id_tienda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `fecha_pedido`, `estado`, `id_tienda`) VALUES
(26, 1, '2026-03-01 00:00:00', 'pendiente', 14),
(27, 2, '2026-03-02 00:00:00', 'confirmado', 15),
(28, 3, '2026-03-03 00:00:00', 'entregado', 14),
(29, 4, '2026-03-04 00:00:00', 'pendiente', 15),
(30, 5, '2026-03-05 00:00:00', 'confirmado', 14),
(31, 6, '2026-03-06 00:00:00', 'entregado', 15),
(32, 7, '2026-03-07 00:00:00', 'pendiente', 14),
(33, 8, '2026-03-08 00:00:00', 'confirmado', 15),
(34, 9, '2026-03-09 00:00:00', 'entregado', 14),
(35, 10, '2026-03-10 00:00:00', 'pendiente', 15),
(36, 11, '2026-03-11 00:00:00', 'confirmado', 14),
(37, 12, '2026-03-12 00:00:00', 'entregado', 15),
(38, 13, '2026-03-13 00:00:00', 'pendiente', 14),
(39, 14, '2026-03-14 00:00:00', 'confirmado', 15),
(40, 15, '2026-03-15 00:00:00', 'entregado', 14),
(41, 16, '2026-03-16 00:00:00', 'pendiente', 15),
(42, 17, '2026-03-17 00:00:00', 'confirmado', 14),
(43, 18, '2026-03-18 00:00:00', 'entregado', 15),
(44, 19, '2026-03-19 00:00:00', 'pendiente', 14),
(45, 20, '2026-03-20 00:00:00', 'confirmado', 15),
(46, 21, '2026-03-21 00:00:00', 'entregado', 14),
(47, 22, '2026-03-22 00:00:00', 'pendiente', 15),
(48, 23, '2026-03-23 00:00:00', 'confirmado', 14),
(49, 24, '2026-03-24 00:00:00', 'entregado', 15),
(50, 25, '2026-03-25 00:00:00', 'pendiente', 14),
(51, 26, '2026-03-26 00:00:00', 'confirmado', 15),
(52, 27, '2026-03-27 00:00:00', 'entregado', 14),
(53, 28, '2026-03-28 00:00:00', 'pendiente', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `id_categoria`) VALUES
(42, 'Sérum de Pestañas', 'Con ingredientes activos y aceites naturales que se aplican sobre las pestañas o cejas limpias preferiblemente en la noche.', 55.00, 50, 'serum.jpg', 13),
(43, 'Crema Hidratante de Arroz', 'Crema que ayuda a mantener la humedad de la piel, suavizarla y unificar el tono, blanqueadora natural.', 42.00, 50, 'cremaHidratanteArroz.jpg', 1),
(44, 'Crema de Manos', 'Producto esencial para proteger e hidratar la piel de las manos, suavizándola.', 35.00, 50, 'jabonCarbonActivo.jpg', 1),
(45, 'Crema Hidratante de Colágeno', 'Formulada para reducir la apariencia de arrugas y líneas finas.', 42.00, 40, NULL, 1),
(46, 'Cremas Sólidas', 'Producto hecho a base de mantecas y aceites naturales que hidratan y suavizan la piel.', 25.00, 40, NULL, 1),
(47, 'Mantecas Corporales', 'Formuladas para hidratar de manera extrema la piel, con aceite de coco, almendras, rosa mosqueta, manteca de copoazú y karité.', 65.00, 30, NULL, 1),
(48, 'Tónico Capilar', 'Hecho a base de hidrolato de romero, sábila, cola de caballo, laurel y cebolla. Fortalece el cabello y estimula su crecimiento.', 40.00, 60, NULL, 4),
(49, 'Shampoo Acondicionador de Romero Sólido', 'Cosmética sólida libre de sulfatos con extractos de romero, avena y manteca de copoazú.', 35.00, 50, NULL, 4),
(50, 'Crema para Peinar de Keratina', 'Tratamiento capilar que suaviza, hidrata y trata puntas abiertas.', 50.00, 40, NULL, 4),
(51, 'Jabón de Arroz', 'Jabón de glicerina aclarante natural.', 25.00, 70, NULL, 2),
(52, 'Shampoo de Manzanilla y Gengibre', 'Con extracto de manzanilla y aloe vera, protege contra rayos UV e hidrata.', 40.00, 40, NULL, 4),
(53, 'Shampoo de Batana', 'Limpia profundamente y deja la piel suave y humectada.', 40.00, 50, NULL, 4),
(54, 'Bloqueador Solar Físico', 'Con extracto de manzanilla y aloe vera, protege el rostro de los rayos UV e hidrata naturalmente.', 80.00, 40, NULL, 15),
(55, 'Shampoo de Chocolate y Acondicionador', 'Limpia y humecta la piel, con propiedades calmantes naturales.', 40.00, 50, NULL, 4),
(56, 'Exfoliante de Café', 'Activa la circulación, elimina células muertas y suaviza el cutis.', 50.00, 50, NULL, 12),
(57, 'Exfoliante de Arcilla Rosa', 'Elimina células muertas, regenera y suaviza la piel.', 50.00, 50, NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id_tienda` int(11) NOT NULL,
  `nombre_tienda` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `nombre_tienda`, `direccion`) VALUES
(14, 'Killa Cosméticos - Rio Seco', 'Urbanización Juana Surduy de Padilla, Calle 10, El Alto'),
(15, 'Killa Cosméticos - Obrajes', 'Av. 16 de Obrajes, La Paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('admin','encargadoDistribucion','cajero','atencionCliente','encargadoAlmacen','cliente') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `contraseña`, `rol`) VALUES
(83, 'Carlos Mendoza', 'admin1@killa.com', 'Adm#K1a99', 'admin'),
(84, 'Lucía Fernández', 'admin2@killa.com', 'Adm#K2b88', 'admin'),
(85, 'Jorge Rojas', 'jorge.rojas@gmail.com', 'Cl#9mX2pL1', 'cliente'),
(86, 'María Quispe', 'maria.quispe@gmail.com', 'Cl@8kP9sQ3', 'cliente'),
(87, 'Ana Torres', 'ana.torres@gmail.com', 'Cl$7tN8vB2', 'cliente'),
(88, 'Diego Alvarez', 'diego.alvarez@gmail.com', 'Cl#5rT6yU8', 'cliente'),
(89, 'Sofía Gutierrez', 'sofia.gutierrez@gmail.com', 'Cl@4aS9dF3', 'cliente'),
(90, 'Kevin Flores', 'kevin.flores@gmail.com', 'Cl$6hJ2kL8', 'cliente'),
(91, 'Valeria Choque', 'valeria.choque@gmail.com', 'Cl#3zX3cV5', 'cliente'),
(92, 'Pedro Mamani', 'pedro.mamani@gmail.com', 'Cl@9qW8eR4', 'cliente'),
(93, 'Luis Herrera', 'luis.herrera@gmail.com', 'Cl$1tY1uI9', 'cliente'),
(94, 'Camila Vargas', 'camila.vargas@gmail.com', 'Cl#2oP8aS2', 'cliente'),
(95, 'Ricardo López', 'ricardo.lopez@gmail.com', 'Cl@5eR6tY1', 'cliente'),
(96, 'Daniela Cruz', 'daniela.cruz@gmail.com', 'Cl$7uI2oP7', 'cliente'),
(97, 'Fernando Aguilar', 'fernando.aguilar@gmail.com', 'Cl#9aS4dF6', 'cliente'),
(98, 'Paola Ríos', 'paola.rios@gmail.com', 'Cl@8zX2cV5', 'cliente'),
(99, 'Sebastián Luna', 'sebastian.luna@gmail.com', 'Cl$6mN9bV3', 'cliente'),
(100, 'Natalia Suarez', 'natalia.suarez@gmail.com', 'Cl#2qW5eR8', 'cliente'),
(101, 'Andrés Castro', 'andres.castro@gmail.com', 'Cl@7tY3uI1', 'cliente'),
(102, 'Gabriela Molina', 'gabriela.molina@gmail.com', 'Cl$4oP8aS2', 'cliente'),
(103, 'Hugo Paredes', 'hugo.paredes@gmail.com', 'Cl#9dF1gH6', 'cliente'),
(104, 'Elena Chávez', 'elena.chavez@gmail.com', 'Cl@3jK7lZ9', 'cliente'),
(105, 'Marco Salazar', 'marco.salazar@gmail.com', 'Cl$2xC5vB8', 'cliente'),
(106, 'Verónica Ponce', 'veronica.ponce@gmail.com', 'Cl#6nM1qW4', 'cliente'),
(107, 'Raúl Medina', 'raul.medina@gmail.com', 'Cl@8eR3tY6', 'cliente'),
(108, 'Jessica Arias', 'jessica.arias@gmail.com', 'Cl$5uI9oP2', 'cliente'),
(109, 'Oscar Pinto', 'oscar.pinto@gmail.com', 'Cl#1aS7dF4', 'cliente'),
(110, 'Patricia Vega', 'patricia.vega@gmail.com', 'Cl@9zX2cV6', 'cliente'),
(111, 'Miguel Soria', 'miguel.soria@gmail.com', 'Cl$3mN8bV1', 'cliente'),
(112, 'Adriana Cordero', 'adriana.cordero@gmail.com', 'Cl#7tY5uI3', 'cliente'),
(113, 'Carlos Rojas', 'cajero1@killa.com', 'Caj#11xA9', 'cajero'),
(114, 'Ana Flores', 'cajero2@killa.com', 'Caj#22yB8', 'cajero'),
(115, 'Luis Paredes', 'cajero3@killa.com', 'Caj#33zC7', 'cajero'),
(116, 'María Soto', 'cajero4@killa.com', 'Caj#44wD6', 'cajero'),
(117, 'Pedro Cruz', 'cajero5@killa.com', 'Caj#55vE5', 'cajero'),
(118, 'Sofía Ramos', 'cajero6@killa.com', 'Caj#66uF4', 'cajero'),
(119, 'Jorge Lima', 'cajero7@killa.com', 'Caj#77tG3', 'cajero'),
(120, 'Valeria Ruiz', 'cajero8@killa.com', 'Caj#88sH2', 'cajero'),
(121, 'Diego Peña', 'cajero9@killa.com', 'Caj#99rJ1', 'cajero'),
(122, 'Lucía Vega', 'cajero10@killa.com', 'Caj#10qK0', 'cajero'),
(123, 'Héctor Lima', 'almacen1@killa.com', 'Alm#11xA9', 'encargadoAlmacen'),
(124, 'Mario Ponce', 'almacen2@killa.com', 'Alm#22yB8', 'encargadoAlmacen'),
(125, 'Javier Ríos', 'almacen3@killa.com', 'Alm#33zC7', 'encargadoAlmacen'),
(126, 'Daniel Soto', 'almacen4@killa.com', 'Alm#44wD6', 'encargadoAlmacen'),
(127, 'Oscar Flores', 'almacen5@killa.com', 'Alm#55vE5', 'encargadoAlmacen'),
(128, 'Miguel Torres', 'almacen6@killa.com', 'Alm#66uF4', 'encargadoAlmacen'),
(129, 'Andrés Vega', 'almacen7@killa.com', 'Alm#77tG3', 'encargadoAlmacen'),
(130, 'Luis Cruz', 'almacen8@killa.com', 'Alm#88sH2', 'encargadoAlmacen'),
(131, 'Carlos Pinto', 'almacen9@killa.com', 'Alm#99rJ1', 'encargadoAlmacen'),
(132, 'Fernando Ruiz', 'almacen10@killa.com', 'Alm#10qK0', 'encargadoAlmacen'),
(133, 'Pedro Castillo', 'dist1@killa.com', 'Dis#11xA9', 'encargadoDistribucion'),
(134, 'Juan Herrera', 'dist2@killa.com', 'Dis#22yB8', 'encargadoDistribucion'),
(135, 'Ricardo Vega', 'dist3@killa.com', 'Dis#33zC7', 'encargadoDistribucion'),
(136, 'Luis Mendoza', 'dist4@killa.com', 'Dis#44wD6', 'encargadoDistribucion'),
(137, 'Carlos Lima', 'dist5@killa.com', 'Dis#55vE5', 'encargadoDistribucion'),
(138, 'Marco Rojas', 'dist6@killa.com', 'Dis#66uF4', 'encargadoDistribucion'),
(139, 'Diego Soto', 'dist7@killa.com', 'Dis#77tG3', 'encargadoDistribucion'),
(140, 'José Ramos', 'dist8@killa.com', 'Dis#88sH2', 'encargadoDistribucion'),
(141, 'Fernando Cruz', 'dist9@killa.com', 'Dis#99rJ1', 'encargadoDistribucion'),
(142, 'Gabriel Ruiz', 'dist10@killa.com', 'Dis#10qK0', 'encargadoDistribucion'),
(143, 'María López', 'atc1@killa.com', 'Atc#11xA9', 'atencionCliente'),
(144, 'Ana Rojas', 'atc2@killa.com', 'Atc#22yB8', 'atencionCliente'),
(145, 'Sofía Torres', 'atc3@killa.com', 'Atc#33zC7', 'atencionCliente'),
(146, 'Lucía Pérez', 'atc4@killa.com', 'Atc#44wD6', 'atencionCliente'),
(147, 'Valeria Soto', 'atc5@killa.com', 'Atc#55vE5', 'atencionCliente'),
(148, 'Camila Ruiz', 'atc6@killa.com', 'Atc#66uF4', 'atencionCliente'),
(149, 'Paola Flores', 'atc7@killa.com', 'Atc#77tG3', 'atencionCliente'),
(150, 'Daniela Vega', 'atc8@killa.com', 'Atc#88sH2', 'atencionCliente'),
(151, 'Elena Cruz', 'atc9@killa.com', 'Atc#99rJ1', 'atencionCliente'),
(152, 'Jessica Lima', 'atc10@killa.com', 'Atc#10qK0', 'atencionCliente'),
(153, 'Patricia Soto', 'atc11@killa.com', 'Atc#11xB0', 'atencionCliente'),
(154, 'Andrea Ruiz', 'atc12@killa.com', 'Atc#12yC1', 'atencionCliente'),
(155, 'Carla Mendoza', 'atc13@killa.com', 'Atc#13zD2', 'atencionCliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_tienda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendas` (`id_tienda`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_tienda`) REFERENCES `tiendas` (`id_tienda`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_tienda`) REFERENCES `tiendas` (`id_tienda`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Crear tabla detalle_ventas si no existe
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_venta` (`id_venta`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE,
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
