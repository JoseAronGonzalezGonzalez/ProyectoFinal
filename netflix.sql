-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 20:55:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `netflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`) VALUES
(1, 'De terror', 'peliculas miedo', 'active', '2020-11-19 20:34:35'),
(3, 'dramas', 'películas que drama', 'active', '2020-11-19 20:34:39'),
(12, 'comedia', 'el mejor', 'active', '2020-12-03 00:44:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `cover` varchar(255) NOT NULL,
  `minutes` int(11) NOT NULL,
  `clasification` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `cover`, `minutes`, `clasification`, `category_id`) VALUES
(1, 'Ralph demoledor', 'pelicula del año prueba', 'ralph demoledor 2.jpg', 120, 'A', 3),
(3, 'ToyStory 4', 'pelicula chida', 'ToyStory 4.jpg', 123, 'C', 3),
(4, 'Coco', 'pelicula del año', 'coco.jpg', 90, 'BA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(45) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `rol`) VALUES
(-1, '18+', 'elmejor@alu', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-02 23:39:37', 'cliente'),
(3, 'jose', 'j@h', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-11-26 21:50:42', 'cliente'),
(4, 'lolcito', 'jose_@hm', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-11-26 22:02:47', 'cliente'),
(9, '123122312', 'j@h1', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-01 05:24:32', 'cliente'),
(10, 'el mejor', 'jose@aron', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-01 19:49:35', 'cliente'),
(50, 'Jose Aron Gonzalez', 'admi@admi', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-03 00:32:18', 'administrador'),
(51, 'lol123', 'elkaka@k', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-03 00:36:40', 'cliente'),
(52, 'admi2', 'admi2@admi2', 'f1475568c0c5e359eac1eddc6e5e70eefbfc7cd2', 'active', '2020-12-03 00:46:23', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
