-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2019 a las 05:15:52
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transportesoccidente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_horario`
--

CREATE TABLE `asignar_horario` (
  `idAsignar_horario` int(11) NOT NULL,
  `idLugar` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idTipo_transporte` int(11) NOT NULL,
  `fecha_viaje` date NOT NULL,
  `asientos_disponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignar_horario`
--

INSERT INTO `asignar_horario` (`idAsignar_horario`, `idLugar`, `idHorario`, `idTipo_transporte`, `fecha_viaje`, `asientos_disponibles`) VALUES
(6, 5, 3, 5, '2019-10-17', 25),
(7, 5, 1, 6, '2019-10-21', 60),
(8, 7, 1, 5, '2019-10-22', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_paquete`
--

CREATE TABLE `asignar_paquete` (
  `idAsignar_paquete` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `idAsignar_horario` int(11) NOT NULL,
  `Costo_envio` decimal(10,0) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idPersona_destino` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignar_paquete`
--

INSERT INTO `asignar_paquete` (`idAsignar_paquete`, `idPaquete`, `idAsignar_horario`, `Costo_envio`, `idPersona`, `idPersona_destino`, `idEmpleado`) VALUES
(2, 2, 6, '10', 6, 5, 11),
(8, 2, 6, '10', 10, 4, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_pasajero`
--

CREATE TABLE `asignar_pasajero` (
  `idAsignar_pasajero` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idAsignar_horario` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `Numero_asiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignar_pasajero`
--

INSERT INTO `asignar_pasajero` (`idAsignar_pasajero`, `idPersona`, `idAsignar_horario`, `idEmpleado`, `Numero_asiento`) VALUES
(3, 4, 6, 11, 10),
(4, 4, 6, 11, 90),
(5, 4, 7, 13, 50),
(6, 5, 6, 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idTransporte` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Fecha_compra` date NOT NULL,
  `Precio_unitario` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  `numero_facturacompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `idTransporte`, `cantidad`, `Fecha_compra`, `Precio_unitario`, `Total`, `numero_facturacompra`) VALUES
(1, 5, 100, '2019-10-08', '200', '100', 1),
(3, 5, 10, '2019-10-24', '100', '300', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `idDetalle_Factura` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idAsignar_paquete` int(11) DEFAULT NULL,
  `idAsignar_Pasajero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Correo_electronico` varchar(30) NOT NULL,
  `Puesto` varchar(45) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `Puesto`, `Salario`, `Usuario`, `Contrasena`) VALUES
(11, 'Fernando', 'Baquiax', '41591477', '7ma avenida 9-42 zona 4 Totonicapán', 'fbaquiax@gmail.com', 'Gerente', 5000, 'Fbaquiax', '123456'),
(13, 'Patricia', 'Alvarado', '317883888', '7ma avenida 9-42 zona 4 Totonicapán', 'patyba@gmail.com', 'Gerente', 5000, 'patyba', 'paty123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `dia` varchar(12) NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `dia`, `hora`) VALUES
(1, 'viernes', '08:00:00'),
(3, 'Miercoles', '07:30:00'),
(4, 'Miercoles', '12:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `idLugar` int(11) NOT NULL,
  `Nombre_origen` varchar(45) NOT NULL,
  `Nombre_destino` varchar(45) NOT NULL,
  `Costo_pasaje` decimal(10,0) DEFAULT NULL,
  `Costo_paquete` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idLugar`, `Nombre_origen`, `Nombre_destino`, `Costo_pasaje`, `Costo_paquete`) VALUES
(5, 'Quetzaltenango', 'Guatemala', '75', '35'),
(6, 'San Marcos', 'Quetzaltenango', '50', '30'),
(7, 'San Marcos', 'Guatemala', '75', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `IdPaquete` int(11) NOT NULL,
  `TipoPaquete` varchar(10) NOT NULL,
  `Peso_lbs` decimal(10,0) NOT NULL,
  `Costo_libra` decimal(10,0) NOT NULL,
  `Costo_Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`IdPaquete`, `TipoPaquete`, `Peso_lbs`, `Costo_libra`, `Costo_Total`) VALUES
(2, 'Sobre', '10', '10', '100'),
(3, 'Sobre', '1', '5', '5'),
(12, 'Sobre', '2', '5', '10'),
(14, 'Paquete', '100', '12', '1200');

--
-- Disparadores `paquete`
--
DELIMITER $$
CREATE TRIGGER `calcular_precio_paquete` BEFORE INSERT ON `paquete` FOR EACH ROW BEGIN
Declare precio_total decimal(10,0);
set precio_total=new.Peso_lbs*new.Costo_libra;
set new.Costo_total=precio_total;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Correo_electronico` varchar(30) NOT NULL,
  `Tipo_persona` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electronico`, `Tipo_persona`) VALUES
(4, 'Luis', 'Alvarado', '776688', 'Totonicapan', 'luis@gmail.com', 'Pasajero'),
(5, 'Alex', 'Alvarado', '77662204', 'Totonicapan', 'lex@gmail.com', 'Pasajero'),
(6, 'Martin', 'Baquiax', '77665543', 'Totonicapan', 'Martin@gmail.com', 'Emisor'),
(9, 'Luis', 'Perez', '7898765', '10 avenida 9-32 zona 1 San Marcos', 'luis@gmail.com', 'Emisor'),
(10, 'Antonia', 'Hernández', '7766554', '12ave. 9-32 zona 3 Guatemala', 'ant12@gmail.com', 'Emisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_destino`
--

CREATE TABLE `persona_destino` (
  `idPersona_destino` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `Telefono_uno` varchar(12) NOT NULL,
  `Telefono_dos` varchar(12) DEFAULT NULL,
  `Nombre_empresa` varchar(30) DEFAULT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Punto_referencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_destino`
--

INSERT INTO `persona_destino` (`idPersona_destino`, `nombres`, `apellidos`, `Telefono_uno`, `Telefono_dos`, `Nombre_empresa`, `Direccion`, `Punto_referencia`) VALUES
(2, 'Armando', 'Alvarado', '32456789', '23456789', 'ArquiArmd', 'Totonicapan', 'a media cuadra del restaurante el calor de viento'),
(4, 'Joaquin', 'Aguilar', '77665543', '42567890', 'Aguilar y asociados', '8va calle 12-20 zona 3 San Marcos', NULL),
(5, 'Alejandra', 'López', '5623-2021', NULL, 'ninguna', '8va. calle 12-10 zona 1, Quetzaltenango', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `Cantidad_asientos` int(11) DEFAULT NULL,
  `placa` varchar(12) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Color` varchar(12) NOT NULL,
  `Capacidad_libras` int(11) NOT NULL,
  `Costo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idtransporte`, `descripcion`, `Cantidad_asientos`, `placa`, `Marca`, `Color`, `Capacidad_libras`, `Costo`) VALUES
(5, 'Camión', 20, 'P-456778', 'Toyota', 'amarilla', 500, '5000'),
(6, 'Autobus', 60, 'P-9078TNM', 'Toyota', 'Blanco', 90000, '250000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nancy', 'nalvarado610@gmail.com', NULL, '$2y$10$IKcxKe4VpH8OylTIvriYa.rBJq3DfGU1WLhsYyIrPISfvn3SsBBGG', NULL, '2019-10-24 08:07:28', '2019-10-24 08:07:28'),
(2, 'ventanilla1', 'ventanilla1@gmail.com', NULL, '$2y$10$LrZVneqForqmpH8XOamFn./tLpSA.NxMzolBll0oR6FAmE6WymWsS', NULL, '2019-10-24 08:50:59', '2019-10-24 08:50:59'),
(3, 'Carla López', 'secretaria@gmail.com', NULL, '$2y$10$MKme2UZB92/nluxW5PvpZOhdQGBLx796bVM8oQOZ8qCaU.1WniEU6', NULL, '2019-10-24 08:58:26', '2019-10-24 08:58:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignar_horario`
--
ALTER TABLE `asignar_horario`
  ADD PRIMARY KEY (`idAsignar_horario`),
  ADD KEY `fk_horario` (`idHorario`),
  ADD KEY `fk_tipotransporte` (`idTipo_transporte`),
  ADD KEY `fk_lugar` (`idLugar`);

--
-- Indices de la tabla `asignar_paquete`
--
ALTER TABLE `asignar_paquete`
  ADD PRIMARY KEY (`idAsignar_paquete`),
  ADD KEY `fk_idPaquete` (`idPaquete`),
  ADD KEY `fk_idAsignarhorario` (`idAsignar_horario`),
  ADD KEY `fk_idPersona` (`idPersona`),
  ADD KEY `fk_idEmpleado` (`idEmpleado`),
  ADD KEY `fk_personadestino` (`idPersona_destino`);

--
-- Indices de la tabla `asignar_pasajero`
--
ALTER TABLE `asignar_pasajero`
  ADD PRIMARY KEY (`idAsignar_pasajero`),
  ADD KEY `fk_personap` (`idPersona`),
  ADD KEY `fk_AsignarH` (`idAsignar_horario`),
  ADD KEY `fk_empleado` (`idEmpleado`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_transporte` (`idTransporte`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`idDetalle_Factura`),
  ADD KEY `fk_fact` (`idFactura`),
  ADD KEY `fk_paquete` (`idAsignar_paquete`),
  ADD KEY `fk_pasajero` (`idAsignar_Pasajero`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fK_personafac` (`idPersona`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idLugar`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`IdPaquete`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `persona_destino`
--
ALTER TABLE `persona_destino`
  ADD PRIMARY KEY (`idPersona_destino`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idtransporte`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignar_horario`
--
ALTER TABLE `asignar_horario`
  MODIFY `idAsignar_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignar_paquete`
--
ALTER TABLE `asignar_paquete`
  MODIFY `idAsignar_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignar_pasajero`
--
ALTER TABLE `asignar_pasajero`
  MODIFY `idAsignar_pasajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `idDetalle_Factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idLugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `IdPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `persona_destino`
--
ALTER TABLE `persona_destino`
  MODIFY `idPersona_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignar_horario`
--
ALTER TABLE `asignar_horario`
  ADD CONSTRAINT `fk_horario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`),
  ADD CONSTRAINT `fk_lugar` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`),
  ADD CONSTRAINT `fk_tipotransporte` FOREIGN KEY (`idTipo_transporte`) REFERENCES `transporte` (`idtransporte`);

--
-- Filtros para la tabla `asignar_paquete`
--
ALTER TABLE `asignar_paquete`
  ADD CONSTRAINT `fk_idAsignarhorario` FOREIGN KEY (`idAsignar_horario`) REFERENCES `asignar_horario` (`idAsignar_horario`),
  ADD CONSTRAINT `fk_idEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `fk_idPaquete` FOREIGN KEY (`idPaquete`) REFERENCES `paquete` (`IdPaquete`),
  ADD CONSTRAINT `fk_idPersona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  ADD CONSTRAINT `fk_personadestino` FOREIGN KEY (`idPersona_destino`) REFERENCES `persona_destino` (`idPersona_destino`);

--
-- Filtros para la tabla `asignar_pasajero`
--
ALTER TABLE `asignar_pasajero`
  ADD CONSTRAINT `fk_AsignarH` FOREIGN KEY (`idAsignar_horario`) REFERENCES `asignar_horario` (`idAsignar_horario`),
  ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `fk_personap` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_transporte` FOREIGN KEY (`idTransporte`) REFERENCES `transporte` (`idtransporte`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_fact` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `fk_paquete` FOREIGN KEY (`idAsignar_paquete`) REFERENCES `asignar_paquete` (`idAsignar_paquete`),
  ADD CONSTRAINT `fk_pasajero` FOREIGN KEY (`idAsignar_Pasajero`) REFERENCES `asignar_pasajero` (`idAsignar_pasajero`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fK_personafac` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
