-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2019 a las 19:25:24
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensajero`
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
(2, 'Ciencia'),
(3, 'Psicologia'),
(4, 'Biologia'),
(5, 'Arte'),
(6, 'Sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` varchar(5000) NOT NULL,
  `nombre_imagen` varchar(80) NOT NULL,
  `imagen` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `titulo`, `contenido`, `nombre_imagen`, `imagen`) VALUES
(1, 'test de articulo', 'prueba de los redactores a enviar a editor', 'puesta de sol', 'repo_imagenes_del_editor/gixxer blue.jpg'),
(2, 'prueba 3 de una redaccion al editor', 'yo tengo una laptop', 'muestra de redaccion', 'repo_imagenes_del_editor/756444bb819791ce078d42ff0a76fe41.jpg'),
(3, 'hola ki onda', 'hola ki onda', 'hola ki onda', 'repo_imagenes_del_editor/gixxer blue.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `id_boletin` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` varchar(1500) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletin`
--

INSERT INTO `boletin` (`id_boletin`, `titulo`, `descripcion`, `imagen`) VALUES
(33, 'test 1', 'mozilla', 'mozilla12-pdf.pdf'),
(34, 'test 2', 'php', 'php.pdf'),
(35, 'test 44', 'ooooo', 'EJEMPLO.pdf'),
(36, 'test 88|', '', 'sistema/repo_imagenes_boletin/');

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
(54, 5, 1, 2, 'me gusta bailar ', 'me gusta bailar ', 'me gusta bailar ', 'repo_imagenes/pp.jpg', 'me gusto tu carta siiiiiiiiiiiii', 'me gusta bailar ', NULL),
(55, 5, 1, 2, 'me gusta cantar', 'me gusta cantar', 'me gusta cantar', 'repo_imagenes/ac}.jpg', 'me gusto mucho tu carta', 'me gusta cantar', NULL),
(56, 2, 1, 2, 'laptop', 'yo tengo una laptop', 'laptop', 'repo_imagenes/gixxer blue.jpg', NULL, 'tengo laptop', NULL),
(57, 1, 1, 1, 'fffffffff', 'el suicidio es malo', 'pruebassssss', 'repo_imagenes/des.jpg', NULL, 'deporte', NULL),
(58, 1, 1, 1, 'hola ki onda', 'el suicidio es el suicidio mas comun', 'hola ki onda', 'repo_imagenes/des.jpg', NULL, 'hola ki onda', NULL),
(59, 5, 1, 2, 'el cielo es azul y me gustan los colores ', 'el cielo es azul y me gustan los colores ', 'el cielo es azul y me gustan los colores ', 'repo_imagenes/des.jpg', 'su carta me gusto mucho sigue adelante', 'ppppp', NULL);

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
-- Estructura de tabla para la tabla `permisos_usuario`
--

CREATE TABLE `permisos_usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `ID_PRIVILEGIOS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `ID_PLANTILLA` int(11) NOT NULL,
  `PLANTILLA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `ID_PRIVILEGIOS` int(11) NOT NULL,
  `NOMBRE_PRIVILEGIO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`ID_PRIVILEGIOS`, `NOMBRE_PRIVILEGIO`) VALUES
(1, 'Ver Lista de Carta'),
(2, 'Ver Lista de de Usuario'),
(3, 'Crear nuevo Usuario'),
(4, 'Crear Redaccion'),
(5, 'Ver Informacion de Usuario'),
(6, 'Ver Carta '),
(7, 'Enviar Carta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` mediumtext,
  `tamanio` int(10) UNSIGNED DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_archivo`) VALUES
(6, 'test 111', 'es un php', 100152, 'application/pdf', 'php.pdf'),
(7, 'test 2', 'es un pdf de mozilla', 350270, 'application/pdf', 'mozilla12-pdf.pdf'),
(8, 'test 100', 'prueba de ejemplo222', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(9, 'test 12', 'ggggggg', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(10, 'test 12', 'ggggggg', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(11, 'test 12', 'ggggggg', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(12, 'test 12', 'ggggggg', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(13, 'test 13', 'cooroeea', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(14, 'test 13', 'cooroeea', 171758, 'application/pdf', 'EJEMPLO.pdf');

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
  `TELEFONO` int(11) DEFAULT NULL,
  `DISTRIBUCION` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUSUARIO`, `ID_AREA`, `ID_TIPOUSUARIO`, `NOMBRE`, `CORREO`, `USUARIO`, `CLAVE`, `ESTATUS`, `EDAD`, `TELEFONO`, `DISTRIBUCION`) VALUES
(1, NULL, 1, 'jose', 'raqui@gmail', 'admin', '202cb962ac59075b964b07152d234b70', 1, 22, 78999999, 0),
(2, NULL, 4, 'ivan', 'flores@gmail.com', 'kid', '7de007e43f108e4b54b079f66e4285d8', 1, 25, 65321456, 0),
(3, 2, 3, 'nao', 'hola', 'tuto', 'b2218117085d7b3886e312b35b7f42fa', 1, 24, 7568369, 1),
(4, 2, 3, 'nio', 'ratu@gmail.com', 'nio', 'd0a5fd04b4b48be7ee56c1eb538d78cb', 1, 23, 65321456, 1),
(5, 3, 3, 'melina', 'mel@gmail.com', 'mel', '0ef174fc614c8d61e2d63329ef7f46c0', 1, 26, 7568369, 1),
(6, 2, 3, 'Ivanovic', 'hola@hola', 'kidd', '202cb962ac59075b964b07152d234b70', 1, 26, 756326456, 1),
(11, 5, 3, 'jose campos', 'raqui@gmail,bo', 'raquitich', '6ebb02e482851804e964db5f50d36318', 1, 22, 65321456, 1),
(12, 6, 3, 'Soria Rami', 'holowiwi@gmail.com', 'fanoem', 'f020ef7c6521c69ba5bd192c3472738c', 0, 23, 7568366, 0),
(13, 2, 2, 'eliana', 'eliana@gmail.com', 'eliana', '4b5feade9732bab1148ea9e7a2c4fb66', 1, 28, 76985476, 1),
(14, 4, 4, 'ddoo', 'ddoo@gmail.com', 'ddoo', 'ed70114efdedc13005c524b01ccd62f7', 1, 23, 78965888, 0),
(15, 4, 3, 'harlin', 'harlin@gmail.com', 'harlin', 'ea31d6fe63c61782649a4e5f22ef59f6', 0, 26, 76435678, 0);

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
(54, 2),
(54, 11),
(55, 2),
(55, 11),
(56, 2),
(56, 6),
(57, 2),
(57, 4),
(58, 2),
(58, 3),
(59, 2),
(59, 11);

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
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`id_boletin`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`ID_CARTA`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_CATEGORIA`) USING BTREE,
  ADD KEY `FK_RELATIONSHIP_6` (`ID_TIPO_CARTA`) USING BTREE,
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PRIORIDAD`) USING BTREE;

--
-- Indices de la tabla `categoria_carta`
--
ALTER TABLE `categoria_carta`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  ADD PRIMARY KEY (`IDUSUARIO`,`ID_PRIVILEGIOS`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_PRIVILEGIOS`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`ID_PLANTILLA`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`ID_PRIORIDAD`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`ID_PRIVILEGIOS`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`id_documento`);

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
  ADD KEY `FK_RELATIONSHIP_1` (`ID_TIPOUSUARIO`) USING BTREE,
  ADD KEY `FK_RELATIONSHIP_2` (`ID_AREA`) USING BTREE;

--
-- Indices de la tabla `usuario_carta`
--
ALTER TABLE `usuario_carta`
  ADD PRIMARY KEY (`ID_CARTA`,`IDUSUARIO`),
  ADD KEY `FK_RELATIONSHIP_4` (`IDUSUARIO`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_usuario`
--
ALTER TABLE `area_usuario`
  MODIFY `ID_AREA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `id_boletin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `ID_CARTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `categoria_carta`
--
ALTER TABLE `categoria_carta`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `ID_PLANTILLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `ID_PRIORIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `ID_PRIVILEGIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `carta_ibfk_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria_carta` (`ID_CATEGORIA`),
  ADD CONSTRAINT `carta_ibfk_2` FOREIGN KEY (`ID_TIPO_CARTA`) REFERENCES `tipo_carta` (`ID_TIPO_CARTA`),
  ADD CONSTRAINT `carta_ibfk_3` FOREIGN KEY (`ID_PRIORIDAD`) REFERENCES `prioridad` (`ID_PRIORIDAD`);

--
-- Filtros para la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_PRIVILEGIOS`) REFERENCES `privilegios` (`ID_PRIVILEGIOS`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_TIPOUSUARIO`) REFERENCES `tipo_usuario` (`ID_TIPOUSUARIO`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_AREA`) REFERENCES `area_usuario` (`ID_AREA`);

--
-- Filtros para la tabla `usuario_carta`
--
ALTER TABLE `usuario_carta`
  ADD CONSTRAINT `usuario_carta_ibfk_1` FOREIGN KEY (`ID_CARTA`) REFERENCES `carta` (`ID_CARTA`),
  ADD CONSTRAINT `usuario_carta_ibfk_2` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
