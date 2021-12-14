-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2021 a las 06:25:59
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproyecto2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `iva` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`pedido_id`),
  KEY `fk_producto` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `pedido_id`, `producto_id`, `factura_id`, `subtotal`, `iva`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 1117888, 12, 0, 12, '2021-11-30 12:33:01', '2021-11-30 12:33:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_detalle`
--

DROP TABLE IF EXISTS `compra_detalle`;
CREATE TABLE IF NOT EXISTS `compra_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compra_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_id` (`producto_id`),
  KEY `compra_id` (`compra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `descripcion`, `direccion`, `telefono`) VALUES
(2, 'Domino', 'Somos la cadena de restaurantes de entrega rápida más grande, exitosa e innovadora de México y para alcanzar el estándar de servicio necesario para lograrlo, mantenemos una estricta política de eficiencia y trato ético y honesto hacia nuestros clientes, proveedores, colaboradores, asociados y a la comunidad en general.', 'C. 41 No. 206-Int 180, Sambulá, 97780 Valladolid, Yuc', '985 8561656'),
(3, 'El Sazón de Valladolid', 'Almuerzo, Cena, Brunch, Bebidas', 'Valladolid - Cancun 231 A x 48 y 50, Bacalar, 97780 Valladolid, Yuc.', '985 119 035');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `estado_nombre` varchar(45) NOT NULL,
  `estado_valor` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado_nombre`, `estado_valor`) VALUES
(1, 'Activo', 10),
(2, 'Pendiente', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `genero_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero_nombre`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1631145764),
('m130524_201442_init', 1631145776),
('m190124_110200_add_verification_token_column_to_user_table', 1631145777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `iva` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `user_id`, `subtotal`, `iva`, `total`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 3, 0, 0, 0, '2021-11-30 00:00:14', '2021-11-30 00:12:18', 2),
(2, 2, 0, 0, 0, '2021-11-30 00:09:39', '2021-11-30 00:09:39', 1),
(3, 1, 0, 0, 0, '2021-11-30 00:10:55', '2021-11-30 00:10:55', 1),
(4, 3, 0, 0, 0, '2021-11-30 00:15:34', '2021-11-30 00:15:34', 1),
(5, 3, 0, 0, 0, '2021-11-30 00:17:12', '2021-11-30 00:17:12', 1),
(6, 3, 71, 7, 78, '2021-11-30 00:17:50', '2021-11-30 00:17:50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

DROP TABLE IF EXISTS `pedido_detalle`;
CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_id` (`compra_id`),
  KEY `empresa_id` (`empresa_id`),
  KEY `pedido_id` (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `genero_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `user_id`, `nombres`, `apellidos`, `fecha_nacimiento`, `created_at`, `updated_at`, `direccion`, `telefono`, `genero_id`) VALUES
(1, 1, 'Nanci Arai', 'Uicab Balam', '1999-09-22 00:00:00', '2021-11-19 11:58:52', '2021-11-19 11:58:52', 'Calle 18 Colonia Centro', '9841292950', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_id` (`unidad_id`),
  KEY `empresa_id` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_costo`, `precio_venta`, `empresa_id`, `unidad_id`, `stock`, `created_at`, `updated_at`) VALUES
(4, 'Mexicana', 'La pizza con los sabores auténticos de nuestro país. Chorizo, carne molida, jalapeño, cebolla.\r\nIngredientes: Chorizo, Carne Molida, Cebolla y Jalapeño ', 100, 115, 2, 1, 17, '2021-11-25 01:20:57', '2021-11-25 01:20:57'),
(6, 'Pepperoni Especial', 'La combinación perfecta entre Pepperoni y Champiñones, con un gran sabor y horneado al momento.\r\nIngredientes: Pepperoni, Champiñones Frescos y Extra Queso', 120, 125, 2, 1, 25, '2021-11-30 18:50:27', '2021-11-30 18:50:27'),
(7, 'Honolulu', 'La pizza con la perfecta combinación dulce-salado. Jamón, tocino, piña, jalapeño.\r\nIngredientes: Jamón, Piña, Tocino y Jalapeño ', 120, 125, 2, 1, 58, '2021-11-30 18:52:23', '2021-11-30 18:52:23'),
(10, 'Pechuga a la plancha', 'Con su respectiva guardicion  ', 50, 55, 3, 1, 50, '2021-11-30 19:07:12', '2021-11-30 19:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol_nombre`, `rol_valor`) VALUES
(1, 'Cliente', 10),
(2, 'Admin', 20),
(3, 'SuperUsuario', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrpcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `descrpcion`) VALUES
(1, 'NO ENTREGADO'),
(2, 'ENVIADO'),
(3, 'ENTREGADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_nombre` varchar(45) NOT NULL,
  `tipo_usuario_valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario_nombre`, `tipo_usuario_valor`) VALUES
(1, 'GRATUITO', 10),
(2, 'PAGO', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrpcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `descrpcion`) VALUES
(1, 'Ración entera'),
(2, 'Media Ración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` smallint(6) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_id` smallint(6) NOT NULL DEFAULT '1',
  `tipo_usuario_id` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `estado_id`, `created_at`, `updated_at`, `verification_token`, `rol_id`, `tipo_usuario_id`) VALUES
(1, 'nanci.uica', 'o_YLe61_MQyJJvQ_m7RaYbP25j_VVbCO', '$2y$13$RK62sOJI4R6kIvvGxgJ2BupAO6x4FLpjeZdQq/sglGO.Xy1m54jMS', NULL, 'panhead077@gmail.com', 1, '2021-11-19 11:30:55', '2021-11-24 12:12:09', 'n-3zqxts78biIsT7SbAG2w2QpwU6MIdR_1637339455', 3, 1),
(2, 'joel.uicab', 'Uu5Im4KHY76lxab5fcAPLCUVnQTKBNPj', '$2y$13$BBuffU56reV7IY2l6Exx6O5CaEVDYOKvAyprn5WrOmi.6LdcSgEbW', NULL, 'joelub@gmail.com', 1, '2021-11-19 11:31:20', '2021-11-30 20:42:32', 'Uf8R1LAcR44jbrdH_mfikbDHRM9wZuh7_1637339480', 1, 1),
(3, 'GenerUs', 'a3Kt6QxTndpVXeNwkPkjVbxbcgz4liaH', '$2y$13$csz9Fip6c5tJ3WgFUby4au4mldpbPNxFJhYoLND78XfYb7kkjyzzq', NULL, 'gener.pootcan@itsva.edu.mx', 1, '2021-11-24 18:35:58', '2021-11-24 18:38:25', 'YX6M0BQOAUUbjBvNpchw_cQ4KQ_8IRbb_1637796958', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `pedido_detalle_ibfk_2` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `pedido_detalle_ibfk_3` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `pedido_detalle_ibfk_4` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
