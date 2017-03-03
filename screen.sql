-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2017 a las 14:02:08
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `screen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_infouser`
--

CREATE TABLE IF NOT EXISTS `t_infouser` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(100) NOT NULL,
  `State` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL,
  `max_space` int(150) NOT NULL COMMENT 'MB',
  PRIMARY KEY (`id`),
  KEY `user_info` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_permsuser`
--

CREATE TABLE IF NOT EXISTS `t_permsuser` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `upload` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_perms` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_typeuser`
--

CREATE TABLE IF NOT EXISTS `t_typeuser` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `typeDesc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `t_typeuser`
--

INSERT INTO `t_typeuser` (`id`, `name`, `typeDesc`) VALUES
(1, 'Admin', 'Super Admin Screens');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_type` int(100) NOT NULL,
  `user_info` int(100) NOT NULL,
  `user_perms` int(100) NOT NULL,
  `sup_user` int(100) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_surname` varchar(150) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `salt_password` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `t_user`
--

INSERT INTO `t_user` (`id`, `user_type`, `user_info`, `user_perms`, `sup_user`, `user_name`, `user_surname`, `user_email`, `salt_password`, `user_password`) VALUES
(1, 1, 1, 1, 0, 'Xevi', 'Cayuela Rivera', 'xevi.cayuela92@gmail.com', '58b934dd4c7892.60875011', 'bf08746aa729a98311413abcfd28a57e'),
(4, 1, 2, 2, 0, 'Test', 'Tester', 'test@tester.com', '58b9654956a867.45960822', '41a934af6385e62c7997b8b14e8b53b8');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_infouser`
--
ALTER TABLE `t_infouser`
  ADD CONSTRAINT `user_info` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);

--
-- Filtros para la tabla `t_permsuser`
--
ALTER TABLE `t_permsuser`
  ADD CONSTRAINT `user_perms` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);

--
-- Filtros para la tabla `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type`) REFERENCES `t_typeuser` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
