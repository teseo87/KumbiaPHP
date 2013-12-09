-- Conjunto de tablas para el Banco de tiempo

--
-- Estructura de tabla para la tabla `categoriadetrabajo`
--

CREATE TABLE IF NOT EXISTS `categoriadetrabajo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `detalle` varchar(200),
  `estado` char(1),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `ingreso_at` date NOT NULL,
  `tipo_doc` char(1) NOT NULL,
  `nro_doc` varchar(100) NOT NULL,
  `saldo` float NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `oferta` puede ser de un socio o genérica para los trabajos a distribuir
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateroriadetrabajo_id` int(11) NOT NULL,
  `socio_id` int(11),
  `ingreso_at` date NOT NULL,
  `actualizacion_in` date NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(100) NOT NULL,
  `oferta_id` char(1) NOT NULL,
  `ingreso_at` date NOT NULL,
  `actualizacion_at` date NOT NULL,
  `estado` char(1),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oferta_id` varchar(100) NOT NULL,
  `ingreso_at` date NOT NULL,
  `actualizacion_at` date NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `aceptacion`
--

CREATE TABLE IF NOT EXISTS `aceptacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitud_id` varchar(100) NOT NULL,
  `ingreso_at` date NOT NULL,
  `actualizacion_at` date NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int NOT NULL,
  `detalle` varchar(100),
  `solicitud_id` char(1) NOT NULL,
  `ingreso_at` date NOT NULL,
  `estado` char(1),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `movimiento` en la cuenta corrirnte del socio
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socio_id` int(11) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `ingreso_at` date NOT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;
