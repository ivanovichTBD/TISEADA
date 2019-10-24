-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 21:03:12
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensajero2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_usuario`
--

CREATE TABLE `area_usuario` (
  `ID_AREA` int(11) NOT NULL,
  `NOMBRE_AREA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area_usuario`
--

INSERT INTO `area_usuario` (`ID_AREA`, `NOMBRE_AREA`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` longtext NOT NULL,
  `nombre_imagen` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `titulo`, `contenido`, `nombre_imagen`, `imagen`) VALUES
(1, 'ewrqew', 'ewgaqweg', 'aagere', 'repo_imagenes_del_editor/gixxer.jpg'),
(2, 'pooo', 'pooo', 'pooo', 'repo_imagenes_del_editor/Pagina Inicio.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `ID_CARTA` int(11) NOT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL,
  `ID_TIPO_CARTA` int(11) DEFAULT NULL,
  `ID_PRIORIDAD` int(11) DEFAULT NULL,
  `TITULO` varchar(50) DEFAULT NULL,
  `CONTENIDO` varchar(5000) DEFAULT NULL,
  `NOMBRE_IMAGEN` varchar(200) DEFAULT NULL,
  `IMAGEN` varchar(200) DEFAULT NULL,
  `COMENTARIO` varchar(200) DEFAULT NULL,
  `ASUNTO` varchar(50) DEFAULT NULL,
  `LEIDO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`ID_CARTA`, `ID_CATEGORIA`, `ID_TIPO_CARTA`, `ID_PRIORIDAD`, `TITULO`, `CONTENIDO`, `NOMBRE_IMAGEN`, `IMAGEN`, `COMENTARIO`, `ASUNTO`, `LEIDO`) VALUES
(1, 1, NULL, NULL, 'caminando', 'primera carta creada', 'hola', 'repo_imagenes/Sin tÃ­tulo.png', NULL, NULL, NULL),
(2, NULL, NULL, NULL, 'el camino malo', 'el asdkasbjbdasdas', 'el triste perro', 'repo_imagenes/e3d426ea-fe19-466c-94ca-6ed45bedd1e8_200x200.png', NULL, 'carta a mi perro', NULL),
(11, 3, 1, 2, 'te quiero', 'el alma es el mejor amigo', 'el triste perro', 'repo_imagenes/e3d426ea-fe19-466c-94ca-6ed45bedd1e8_200x200.png', NULL, 'mi vida en ruinas', NULL),
(12, 3, 1, 2, 'te quiero qui', 'caminando hacia el alma', 'rata', 'repo_imagenes/Sin tÃ­tulo.png', NULL, 'como cmainar ', NULL),
(13, 6, 1, 2, 'te quiero conmigo', 'hola que tal el mundo es un planeta muy bonito', 'gg', 'repo_imagenes/Sin tÃ­tulo.png', NULL, 'el cuento del gato', NULL),
(14, 1, 1, 1, 'EFQEWFQ', 'SUICIDIO', 'YTWEY', 'repo_imagenes/gixxer.jpg', NULL, 'UYETR', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_carta`
--

CREATE TABLE `categoria_carta` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `CATEGORIA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_carta`
--

INSERT INTO `categoria_carta` (`ID_CATEGORIA`, `CATEGORIA`) VALUES
(1, 'Importante'),
(2, 'Ciencia'),
(3, 'Psicologia'),
(4, 'Biologia'),
(5, 'Arte'),
(6, 'Sociales'),
(7, 'Deporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `ID_PRIORIDAD` int(11) NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`ID_PRIORIDAD`, `DESCRIPCION`) VALUES
(1, 'Alta'),
(2, 'Aceptada'),
(3, 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carta`
--

CREATE TABLE `tipo_carta` (
  `ID_TIPO_CARTA` int(11) NOT NULL,
  `NOMBRE_TIPO_CARTA` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_carta`
--

INSERT INTO `tipo_carta` (`ID_TIPO_CARTA`, `NOMBRE_TIPO_CARTA`) VALUES
(1, 'CARTA'),
(2, 'REDACCION'),
(3, 'BOLETIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_TIPOUSUARIO` int(11) NOT NULL,
  `TIPO_USUARIO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_TIPOUSUARIO`, `TIPO_USUARIO`) VALUES
(1, 'Administrador'),
(2, 'Editor'),
(3, 'Especialista'),
(4, 'NiÃ±o'),
(5, 'Correjidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `ID_AREA` int(11) DEFAULT NULL,
  `ID_TIPOUSUARIO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `USUARIO` varchar(20) DEFAULT NULL,
  `CLAVE` varchar(100) DEFAULT NULL,
  `ESTATUS` int(11) DEFAULT NULL,
  `EDAD` int(11) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUSUARIO`, `ID_AREA`, `ID_TIPOUSUARIO`, `NOMBRE`, `CORREO`, `USUARIO`, `CLAVE`, `ESTATUS`, `EDAD`, `TELEFONO`) VALUES
(1, NULL, 1, 'jose', 'raqui@gmail', 'admin', '202cb962ac59075b964b07152d234b70', 1, 22, 78999999),
(2, NULL, 4, 'ivan', 'flores@gmail.com', 'kid', '7de007e43f108e4b54b079f66e4285d8', 1, 25, 65321456),
(3, NULL, 3, 'nao', 'hola', 'tuto', 'b2218117085d7b3886e312b35b7f42fa', 0, 24, 7568369),
(4, NULL, 3, 'nio', 'ratu@gmail.com', 'nio', 'd0a5fd04b4b48be7ee56c1eb538d78cb', 1, 23, 65321456),
(5, NULL, 3, 'melina', 'mel@gmail.com', 'mel', '0ef174fc614c8d61e2d63329ef7f46c0', NULL, 26, 7568369),
(6, NULL, 2, 'Ivanovic', 'hola@hola', 'kidd', '202cb962ac59075b964b07152d234b70', NULL, 26, 756326456),
(7, NULL, 3, 'car', 'car@gmail.com', 'car', 'e6d96502596d7e7887b76646c5f615d9', 1, 0, 6666666),
(8, NULL, 3, 'dag', 'dag@gmail.com', 'dag', 'b4683fef34f6bb7234f2603699bd0ded', 1, 22, 76767676);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_carta`
--

CREATE TABLE `usuario_carta` (
  `ID_CARTA` int(11) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_carta`
--

INSERT INTO `usuario_carta` (`ID_CARTA`, `IDUSUARIO`) VALUES
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_usuario`
--
ALTER TABLE `area_usuario`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`ID_CARTA`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_CATEGORIA`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_TIPO_CARTA`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PRIORIDAD`);

--
-- Indices de la tabla `categoria_carta`
--
ALTER TABLE `categoria_carta`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`ID_PRIORIDAD`);

--
-- Indices de la tabla `tipo_carta`
--
ALTER TABLE `tipo_carta`
  ADD PRIMARY KEY (`ID_TIPO_CARTA`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_TIPOUSUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_TIPOUSUARIO`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_AREA`);

--
-- Indices de la tabla `usuario_carta`
--
ALTER TABLE `usuario_carta`
  ADD PRIMARY KEY (`ID_CARTA`,`IDUSUARIO`),
  ADD KEY `FK_RELATIONSHIP_4` (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_usuario`
--
ALTER TABLE `area_usuario`
  MODIFY `ID_AREA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `ID_CARTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `categoria_carta`
--
ALTER TABLE `categoria_carta`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `ID_PRIORIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_carta`
--
ALTER TABLE `tipo_carta`
  MODIFY `ID_TIPO_CARTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_TIPOUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria_carta` (`ID_CATEGORIA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_TIPO_CARTA`) REFERENCES `tipo_carta` (`ID_TIPO_CARTA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PRIORIDAD`) REFERENCES `prioridad` (`ID_PRIORIDAD`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_TIPOUSUARIO`) REFERENCES `tipo_usuario` (`ID_TIPOUSUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_AREA`) REFERENCES `area_usuario` (`ID_AREA`);

--
-- Filtros para la tabla `usuario_carta`
--
ALTER TABLE `usuario_carta`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_CARTA`) REFERENCES `carta` (`ID_CARTA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
