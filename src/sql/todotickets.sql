-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2026 a las 11:51:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todotickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `tipo_entrada` enum('general','preferente','vip') NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(8,2) NOT NULL,
  `metodo_pago` enum('tarjeta','paypal','bizum') NOT NULL,
  `estado` enum('confirmada','pendiente','cancelada') DEFAULT 'confirmada',
  `fecha_compra` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `evento_id`, `tipo_entrada`, `cantidad`, `precio_total`, `metodo_pago`, `estado`, `fecha_compra`) VALUES
(2, 2, 2, 'vip', 1, 200.00, 'paypal', 'confirmada', '2026-05-09 11:49:17'),
(3, 3, 4, 'preferente', 3, 165.00, 'bizum', 'pendiente', '2026-05-09 11:49:17'),
(4, 3, 5, 'general', 2, 100.00, 'tarjeta', 'confirmada', '2026-05-09 11:49:17'),
(5, 1, 3, 'general', 1, 32.00, 'tarjeta', 'confirmada', '2026-05-11 10:46:47'),
(6, 1, 6, 'preferente', 3, 122.00, 'tarjeta', 'confirmada', '2026-05-11 10:47:19'),
(7, 1, 2, 'vip', 4, 802.00, 'tarjeta', 'confirmada', '2026-05-11 10:53:37'),
(8, 1, 2, 'vip', 4, 802.00, 'tarjeta', 'confirmada', '2026-05-11 10:57:04'),
(9, 1, 8, 'general', 2, 2722.00, 'tarjeta', 'confirmada', '2026-05-13 17:01:23'),
(10, 5, 6, 'vip', 5, 402.00, 'tarjeta', 'confirmada', '2026-05-13 17:03:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio_general` decimal(8,2) NOT NULL,
  `precio_preferente` decimal(8,2) DEFAULT NULL,
  `precio_vip` decimal(8,2) DEFAULT NULL,
  `entradas_disponibles` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `categoria`, `fecha`, `hora`, `lugar`, `descripcion`, `precio_general`, `precio_preferente`, `precio_vip`, `entradas_disponibles`, `imagen`, `fecha_creacion`) VALUES
(2, 'Bad Bunny — World Tour', 'concierto', '2026-05-22', '20:00:00', 'Estadio Olímpico de Montjuic, Barcelona', 'El artista más escuchado del mundo llega a Barcelona.', 198.00, 424.00, 1288.00, 172, 'concierto.jpg', '2026-05-09 11:49:17'),
(3, 'Real Madrid vs Barça — ACB', 'baloncesto', '2026-06-01', '19:00:00', 'Palacio de los Deportes, Madrid', 'El clásico del baloncesto español.', 30.00, 50.00, 100.00, 319, 'baloncesto.jpg', '2026-05-09 11:49:17'),
(4, 'El Rey León — Musical', 'teatro', '2026-06-08', '18:00:00', 'Teatro Lope de Vega, Madrid', 'El musical más taquillero del mundo en Madrid.', 35.00, 55.00, 90.00, 150, 'teatro.jpg', '2026-05-09 11:49:17'),
(5, 'Velada del Año IV', 'boxeo', '2026-06-20', '21:00:00', 'Cívitas Metropolitano, Madrid', 'El evento de boxeo más esperado del año.', 50.00, 80.00, 150.00, 500, 'boxeo.jpg', '2026-05-09 11:49:17'),
(6, 'Monster Jam — Spain Tour', 'monster-truck', '2026-07-05', '17:00:00', 'RCDE Stadium, Barcelona', 'Los monster trucks más espectaculares del mundo.', 25.00, 40.00, 80.00, 392, 'monstertruck.jpg', '2026-05-09 11:49:17'),
(7, 'UFC 250 Casa Blanca', 'boxeo', '2026-06-13', '22:00:00', 'Casa Blanca (Washington)', 'Celebración del 250 aniversario de Estados Unidos y el 80 cumpleaños de Donald Trump. Cartelera estelar con el evento principal del combate entre Ilia Topuria vs Justin Gaethje.', 75.00, 150.00, 650.00, 362, 'boxeo.jpg', '2026-05-11 11:14:56'),
(8, 'Mundial Estados Unidos - Mexico - Canada 2026', 'futbol', '2026-06-11', '21:00:00', 'Estadio Banorte, Ciudad de México', 'Partido inaugural del mundial de selecciones de FIFA entre México vs Sudáfrica', 1360.00, 10434.00, 28256.00, 19998, 'futbol.jpg', '2026-05-11 11:32:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'Alberto Chicote', 'alberto@chicote.com', 'reembolso', 'Devolver el dinero', '2026-05-13 11:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario',
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `contrasena`, `rol`, `fecha_registro`) VALUES
(1, 'Javier', 'Caballero Miras', 'javier@todotickets.es', '5ce41ada64f1e8ffb0acfaafa622b141438f3a5777785e7f0b830fb73e40d3d6', 'admin', '2026-05-09 11:49:17'),
(2, 'María', 'García López', 'maria@email.com', '61caf957c630c84de3ee1cb7e20f5f3c7b7ca7ad50addab02158bd7cd4b4c30c', 'usuario', '2026-05-09 11:49:17'),
(3, 'Carlos', 'López Martínez', 'carlos@email.com', '22ed5a7a4d808106ceedad5208b9d3c2915568b5c7bc6093389b43b8434e77e4', 'usuario', '2026-05-09 11:49:17'),
(4, 'javier', 'caballero', 'javiercaballero@gmail.com', '5bfe7abf43af7237fb5a0cf61122231f76bed7bccbb5af740967f16bfcbe637b', 'usuario', '2026-05-09 12:09:20'),
(5, 'raul', 'gonzalez', 'raul@gonzalez.com', 'adc055c4d6ff304577a7fd94aa36274f28d598c313e0ec2252115d46b17465ce', 'usuario', '2026-05-13 17:02:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
