-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2020 a las 01:01:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mystore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `perfil` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fotito` text NOT NULL,
  `ultimo_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `nombre`, `usuario`, `password`, `estado`, `fecha`, `fotito`, `ultimo_login`) VALUES
(16, 'Administrador', 'noahxd', 'spainbarca', '$2a$07$asxx54ahjppf45sd87a5auz9XPduE3pKi04ObHV7cThjbTHM./py.', 1, '2020-11-22 23:34:48', '', '2020-11-22 18:34:48'),
(32, 'Administrador', 'noahh', 'ahorasixdxd', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 0, '2020-11-17 22:24:44', '', '0000-00-00 00:00:00'),
(33, 'Administrador', 'Juan Lopez', 'juanitoxDxd', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 0, '2020-11-18 06:35:05', 'vistas/img/admins/juanitoxDxd/464.jpg', '2020-11-10 05:05:48'),
(36, 'Especial', 'Nadia Mejía', 'nameliss', '$2a$07$asxx54ahjppf45sd87a5aupoy5vR7uq0YNdwTDtqS8uvIP9.DCGkm', 1, '2020-11-18 06:35:56', 'vistas/img/admins/nameliss/918.png', '2020-11-10 12:54:23'),
(37, 'Administrador', 'noah', 'cvcvcv', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 1, '2020-11-10 21:49:34', 'vistas/img/admins/cvcvcv/682.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `id_habitacion`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 1, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(2, 2, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(3, 3, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(4, 4, '2019-04-29 18:00:00', '2019-04-29 19:00:00'),
(5, 5, '2019-05-29 18:00:00', '2019-05-29 19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(7, 'vistas/img/banner/498.jpg', '2020-10-15 15:45:48'),
(8, 'vistas/img/banner/539.jpg', '2020-10-15 15:45:58'),
(9, 'vistas/img/banner/892.jpg', '2020-10-15 15:46:06'),
(10, 'vistas/img/banner/768.jpg', '2020-10-15 15:46:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `incluye`, `fecha`) VALUES
(25, 'telas-ropa', '#b01515', 'Telas', 'vistas/img/telas/portada.jpg', 'Es un material textil', '[{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"}]', '2020-11-18 05:58:42'),
(26, 'prendas-vestir', '#0157f7', 'Ropas', 'vistas/img/ropas/portada.jpg', 'Prendas para vestirse', '[{\"item\":\"Sofá\",\"icono\":\" fas fa-couch\"},{\"item\":\"Balcón\",\"icono\":\"far fa-image\"}]', '2020-11-18 06:18:14'),
(27, 'calzado-pies', '#36f031', 'Calzado', 'vistas/img/calzado/portada.jpg', 'Para los pies', '[{\"item\":\"Sofá\",\"icono\":\" fas fa-couch\"}]', '2020-11-18 06:20:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'Juan Mora xD', 7451425, 'aspai@gmail.com', '(745) 124-654-564', '123456', '2020-11-04', 40, '2020-11-18 12:27:15', '2020-11-18 17:27:15'),
(2, 'Jonas', 154561, 'spain@gmail.com', '(051) 521-212-313', 'Av. Los conquistadores', '2000-10-12', 47, '2020-11-22 03:28:14', '2020-11-22 08:28:14'),
(4, 'hola', 456456, 'dasdas@gmail.com', '(111) 111-111-111', '456456456', '1212-12-12', 12, '2020-11-22 02:51:23', '2020-11-22 07:51:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_h` int(11) NOT NULL,
  `tipo_h` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `video` text NOT NULL,
  `recorrido_virtual` text NOT NULL,
  `descripcion_h` text NOT NULL,
  `fecha_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_h`, `tipo_h`, `estilo`, `galeria`, `video`, `recorrido_virtual`, `descripcion_h`, `fecha_h`) VALUES
(34, 25, 'Gasa', '[\"vistas\\/img\\/telas\\/gasa1.jpg\",\"vistas\\/img\\/telas\\/gasa2.jpg\",\"vistas\\/img\\/telas\\/gasa3.jpg\",\"vistas\\/img\\/telas\\/gasa4.jpg\",\"vistas\\/img\\/telas\\/gasa5.jpg\",\"vistas\\/img\\/telas\\/gasa6.jpg\"]', 'ta1755NbmY8', 'vistas/img/telas/gasa-360.jpg', '<h3><strong>Gasa</strong></h3><p>Tejido realizado a partir de&nbsp;algodón, lana, seda u otros materiales.&nbsp;Sus principales características son la ligereza y la delicadeza. Otra característica propia de la gasa es la transpiración; por lo tanto es una tela ideal para prendas veraniegas como faldas, túnicas y vestidos. volantes o velos.</p>', '2020-11-18 06:12:30'),
(35, 26, 'Polos', '[\"vistas\\/img\\/ropas\\/polos1.jpg\",\"vistas\\/img\\/ropas\\/polos2.jpg\",\"vistas\\/img\\/ropas\\/polos3.jpg\",\"vistas\\/img\\/ropas\\/polos4.jpg\",\"vistas\\/img\\/ropas\\/polos5.jpg\"]', 'J4AUYZ74xV4', 'vistas/img/ropas/polos-360.jpg', '<h3>Polos</h3><p>Un polo es una prenda de punto para el tronco que tiene la misma forma que una camiseta o playera, pero además tiene cuello, llegando también hasta la cintura y que puede tener manga larga o corta.</p>', '2020-11-18 06:25:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `id_de` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `mensagem` varchar(255) CHARACTER SET latin1 NOT NULL,
  `time` int(11) NOT NULL,
  `lido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `tipo`, `cantidad`, `fecha`) VALUES
(1, 'reservas', 0, '2019-09-24 00:55:26'),
(2, 'testimonios', 0, '2020-10-15 15:35:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio_alta` float NOT NULL,
  `precio_baja` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `tipo`, `img`, `descripcion`, `precio_alta`, `precio_baja`, `fecha`) VALUES
(4, 'VERANO', 'vistas/img/planes/794.png', 'Aunque queda ya podemos decir que la primavera ha llegado, <strong>nuestras ganas de sol, paseos y noches infinitas crecen día a día.</strong> Pero soñar es gratis y la llegada del buen tiempo ha sido lo único que necesitábamos para empezar a pensar y comprar<strong>&nbsp;la ropa de la nueva temporada de primavera</strong>&nbsp;(que podrás seguir llevando en verano).</p>', 1000, 2000, '2020-10-16 03:59:18'),
(6, 'ESCOLAR', 'vistas/img/planes/883.jpg', '<p>DASDASDASDASDASDAS</p>', 1000, 1000, '2020-10-16 04:00:56'),
(7, 'INVIERNO', 'vistas/img/planes/514.jpg', '<p>Me gustaría recibir noticias sobre productos y servicios de adidas. Consiento recibir mensajes de marketing personalizados por correo electrónico de adidas Perú S.A.C</p>', 100000, 10000, '2020-10-16 04:02:39'),
(9, 'PRIMAVERA', 'vistas/img/planes/619.jpg', '<p>DASDAS</p>', 1000, 1000, '2020-10-16 15:36:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `incluye` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `codigo`, `descripcion`, `incluye`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(12, 26, 35, '4564564', 'Camiseta Barcelona Local 2020 Talla L XL', '[{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"},{\"item\":\"Sofá\",\"icono\":\"fas fa-couch\"}]', 'vistas/img/productos/4564564/618.jpg', 365, 25, 40, 35, '2020-11-22 08:28:14'),
(13, 26, 35, '123456', 'CAMISETA SEGUNDA EQUIPACIÓN REAL MADRID 20 21', '[{\"item\":\"Balcón\",\"icono\":\"far fa-image\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"}]', 'vistas/img/productos/123456/632.jpg', 136, 50, 75, 64, '2020-11-22 08:28:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorrido`
--

CREATE TABLE `recorrido` (
  `id` int(11) NOT NULL,
  `foto_peq` text NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recorrido`
--

INSERT INTO `recorrido` (`id`, `foto_peq`, `foto_grande`, `titulo`, `descripcion`, `fecha`) VALUES
(6, 'vistas/img/recorrido/809.jpg', 'vistas/img/recorrido/362.png', 'EMPORIO COMERCIAL GAMARRA', 'El Emporio Comercial de Gamarra, conocido popularmente como Gamarra, es un lugar de gran movimiento comercial principalmente relacionado con la industria de la moda y la fabricación de prendas de vestir.', '2020-10-16 07:15:29'),
(7, 'vistas/img/recorrido/326.jpg', 'vistas/img/recorrido/175.jpg', 'CALLES', 'Tienda mayorista de Gamarra, nos encargamos de realizar ventas al por mayor de las tiendas de Gamarra, reunimos todos los productos a un precio por mayor para su negocio, realizamos envíos a todo el Perú', '2020-10-16 07:18:01'),
(8, 'vistas/img/recorrido/880.jpg', 'vistas/img/recorrido/824.jpg', 'ENTORNO', 'Los empresarios del sector textil-confecciones de Gamarra se preparan para la campaña navideña en tiempos de pandemia del COVID -19 y un punto importante para esta actividad será el fortalecimiento de la seguridad', '2020-10-19 07:36:41'),
(9, 'vistas/img/recorrido/844.jpg', 'vistas/img/recorrido/245.jpg', 'TRANSPORTE', 'Gamarra es la decimoquinta estación de la línea 1 del metro de Lima. Está ubicada en la intersección de la avenida Aviación con el jirón Hipólito Unanue, en el distrito de La Victoria. ', '2020-10-19 07:38:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` float NOT NULL,
  `numero_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_habitacion`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `codigo_reserva`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`) VALUES
(8, 1, 8, 900000, '19680828', '6NJS06V8L', 'Habitación Suite Oriental - Plan Continental - 2 personas', '2019-05-17', '2019-05-20', '2019-05-14 18:11:33'),
(9, 2, 8, 760000, '19680844', 'M1UHK6R50', 'Habitación Suite Moderna - Plan Americano - 2 personas', '2019-05-22', '2019-05-24', '2019-05-14 18:12:53'),
(10, 3, 8, 420000, '19680849', 'YK51N1HAQ', 'Habitación Suite Africana - Plan Romantico - 2 personas', '2019-05-30', '2019-05-31', '2019-06-14 18:13:50'),
(11, 1, 7, 860000, '19680940', '2S7PLNC32', 'Habitación Suite Oriental - Plan Luna de Miel - 2 personas', '2019-05-20', '2019-05-22', '2019-06-14 18:21:53'),
(12, 2, 7, 820000, '19681854', '3UD1XIBEO', 'Habitación Suite Moderna - Plan Aventura - 2 personas', '2019-05-15', '2019-05-17', '2019-07-14 19:33:10'),
(13, 3, 7, 1260000, '19681866', 'WFZIEN8MO', 'Habitación Suite Africana - Plan Romantico - 2 personas', '2019-11-18', '2019-11-21', '2019-07-23 22:01:42'),
(14, 1, 3, 900000, '19681883', '3U2WO6002', 'Habitación Suite Oriental - Plan Continental - 2 personas', '2019-05-27', '2019-05-30', '2019-08-14 19:35:10'),
(15, 2, 3, 860000, '19681896', 'N10L457ZB', 'Habitación Suite Moderna - Plan Luna de Miel - 2 personas', '2019-05-25', '2019-05-27', '2019-08-14 19:36:07'),
(16, 3, 3, 900000, '19681906', 'IMSB2OKGV', 'Habitación Suite Africana - Plan Continental - 2 personas', '2019-10-15', '2019-10-18', '2019-08-23 22:01:29'),
(17, 1, 4, 425000, '19681954', '6VZ4HIZ27', 'Habitación Suite Oriental - Plan SPA - 2 personas', '2019-05-30', '2019-05-31', '2019-09-14 19:39:24'),
(18, 2, 4, 300000, '19681999', 'L5BCTUYGM', 'Habitación Suite Moderna - Plan Continental - 2 personas', '2019-05-17', '2019-05-18', '2019-09-14 19:42:47'),
(19, 3, 4, 1290000, '19682031', 'ACXC0HPO5', 'Habitación Suite Africana - Plan Luna de Miel - 2 personas', '0000-00-00', '0000-00-00', '2019-09-23 22:32:14'),
(20, 1, 3, 760000, '19686161', 'ZLMAOP6C0', 'Habitación Suite Oriental - Plan Americano - 2 personas', '2019-06-01', '2019-06-03', '2019-09-14 23:17:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas2`
--

CREATE TABLE `reservas2` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas2`
--

INSERT INTO `reservas2` (`id`, `id_habitacion`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 1, '2019-05-03', '2019-05-05'),
(2, 2, '2019-05-02', '2019-05-05'),
(3, 3, '2019-05-03', '2019-05-05'),
(4, 4, '2019-05-05', '2019-05-07'),
(5, 5, '2019-05-03', '2019-05-05'),
(6, 1, '2019-05-06', '2019-05-07'),
(7, 2, '2019-05-06', '2019-05-08'),
(8, 3, '2019-05-05', '2019-05-05'),
(9, 4, '2019-05-08', '2019-05-10'),
(10, 5, '2019-05-06', '2019-05-07'),
(11, 1, '2019-05-09', '2019-05-12'),
(12, 2, '2019-05-09', '2019-05-13'),
(13, 3, '2019-05-05', '2019-05-10'),
(14, 4, '2019-05-10', '2019-05-11'),
(15, 5, '2019-05-07', '2019-05-09'),
(16, 1, '2019-05-16', '2019-05-17'),
(17, 2, '2019-05-15', '2019-05-16'),
(18, 3, '2019-05-19', '2019-05-21'),
(19, 4, '2019-05-18', '2019-05-19'),
(20, 5, '2019-05-11', '2019-05-15'),
(21, 1, '2019-05-26', '2019-05-28'),
(22, 2, '2019-05-26', '2019-05-28'),
(23, 3, '2019-05-26', '2019-05-28'),
(24, 4, '2019-05-26', '2019-05-28'),
(25, 5, '2019-05-26', '2019-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id`, `img`, `descripcion`, `fecha`) VALUES
(10, 'vistas/img/restaurante/806.jpg', 'xd', '2020-10-16 07:11:44'),
(11, 'vistas/img/restaurante/691.png', 'Administrador', '2020-10-19 07:49:47'),
(12, 'vistas/img/restaurante/635.png', 'Almacenero', '2020-10-19 07:50:01'),
(13, 'vistas/img/restaurante/471.png', 'Vendedora', '2020-10-19 07:50:12'),
(14, 'vistas/img/restaurante/461.png', 'Cajera', '2020-10-19 07:50:21'),
(15, 'vistas/img/restaurante/353.png', 'Auxiliar de ventas', '2020-10-19 07:50:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_testimonio` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_hab` int(11) NOT NULL,
  `testimonio` text NOT NULL,
  `aprobado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_testimonio`, `id_us`, `id_res`, `id_hab`, `testimonio`, `aprobado`, `fecha`) VALUES
(1, 3, 8, 9, 'Fue una experiencia maravillosa', 1, '2020-11-22 19:51:54'),
(2, 3, 8, 9, 'Siempre quise una Luna de Miel como la que viví en este hotel', 1, '2020-11-22 19:51:57'),
(3, 3, 8, 9, 'La mejor experiencia de mi vida', 1, '2020-11-22 19:51:59'),
(4, 3, 8, 9, 'Me encantó estar en esta habitación.', 1, '2020-11-22 19:52:22'),
(5, 8, 8, 9, 'Super siempre quise estar acá', 1, '2020-11-22 19:52:02'),
(6, 8, 8, 2, 'Estoy muy agradecido con el personal del hotel', 0, '2020-11-22 19:52:04'),
(7, 8, 8, 10, 'La comida maravillosa', 1, '2020-11-22 19:52:08'),
(8, 7, 8, 10, 'Es una experiencia inolvidable', 0, '2020-11-22 19:52:09'),
(9, 7, 8, 10, 'El lugar es de ensueños', 1, '2020-11-22 19:52:11'),
(10, 7, 8, 11, 'Gracias, todo muy bien!', 0, '2020-11-22 19:52:14'),
(11, 4, 8, 11, 'Que belleza de lugar', 0, '2020-11-22 19:52:16'),
(12, 4, 8, 11, 'Volveré con mi familia', 1, '2020-11-22 19:52:18'),
(13, 4, 8, 11, 'Sin lugar a dudas, el mejor hotel de la zona', 1, '2020-11-22 19:52:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `password`, `email`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(3, 'noah', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'correotutorialesatualcance@gmail.com', 'vistas/img/usuarios/3/279.png', 'directo', 0, '678ec21f18a39c43b95e93de54d78a93', '2020-11-02 20:18:40'),
(4, 'Karl Lewis', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'felipe@hotmail.com', 'keyner.jpg', 'directo', 1, '8fe863573a42ae1ec12c4d3c1d591c6d', '2020-11-02 20:18:43'),
(7, 'Yelena Isinbayev', 'null', 'correo.tutorialesatualcance@gmail.com', 'https://lh4.googleusercontent.com/-80gqeIg_Gq8/AAAAAAAAAAI/AAAAAAAAAF4/0_8JQ_8Gffk/s96-c/photo.jpg', 'google', 1, 'null', '2020-11-02 20:19:19'),
(8, 'Radomic Antic', 'null', 'juanustudio@hotmail.com', 'http://graph.facebook.com/10219668435251136/picture?type=large', 'facebook', 1, 'null', '2020-11-02 20:17:52'),
(10, 'Maria del mar', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'maria@gmail.com', 'keyner.jpg', 'directo', 0, 'c3a724f59d3245b0e166b278f809a9c7', '2020-11-02 20:19:20'),
(13, 'noah', '$2a$07$asxx54ahjppf45sd87a5auz9XPduE3pKi04ObHV7cThjbTHM./py.', 'spain.barcelona.1999@gmail.com', 'keyner.jpg', 'directo', 1, '51033f048a85424d7aada1ce31af3535', '2020-11-02 20:30:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(1, 10001, 1, 16, '[{\"id\":\"13\",\"descripcion\":\"CAMISETA SEGUNDA EQUIPACIÓN REAL MADRID 20 21\",\"cantidad\":\"40\",\"stock\":\"160\",\"precio\":\"75\",\"total\":\"3000\"}]', 0, 3000, 0, 'EFECTIVO', '2020-11-18 17:28:19'),
(2, 10002, 2, 16, '[{\"id\":\"13\",\"descripcion\":\"CAMISETA SEGUNDA EQUIPACIÓN REAL MADRID 20 21\",\"cantidad\":\"5\",\"stock\":\"155\",\"precio\":\"75\",\"total\":\"375\"},{\"id\":\"12\",\"descripcion\":\"Camiseta Barcelona Local 2020 Talla L XL\",\"cantidad\":\"9\",\"stock\":\"391\",\"precio\":\"40\",\"total\":\"360\"}]', 0, 735, 735, 'Efectivo', '2020-11-22 07:40:13'),
(3, 10003, 4, 16, '[{\"id\":\"13\",\"descripcion\":\"CAMISETA SEGUNDA EQUIPACIÓN REAL MADRID 20 21\",\"cantidad\":\"12\",\"stock\":\"143\",\"precio\":\"75\",\"total\":\"900\"}]', 45, 900, 945, 'TC-1132123', '2020-11-22 07:51:23'),
(4, 10004, 2, 16, '[{\"id\":\"13\",\"descripcion\":\"CAMISETA SEGUNDA EQUIPACIÓN REAL MADRID 20 21\",\"cantidad\":\"7\",\"stock\":\"136\",\"precio\":\"75\",\"total\":\"525\"},{\"id\":\"12\",\"descripcion\":\"Camiseta Barcelona Local 2020 Talla L XL\",\"cantidad\":\"26\",\"stock\":\"365\",\"precio\":\"40\",\"total\":\"1040\"}]', 125.2, 1565, 1690.2, 'TC-45645646', '2020-11-22 08:28:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_h`);

--
-- Indices de la tabla `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `reservas2`
--
ALTER TABLE `reservas2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_testimonio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reservas2`
--
ALTER TABLE `reservas2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
