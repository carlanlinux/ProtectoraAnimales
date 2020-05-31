-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2020 at 04:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `protectora_animales`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
                          `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                          `id` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`password`, `id`) VALUES
('e3afed0047b08059d0fada10f400c1e5', 'Admin'),
('porrero', 'el petas'),
('8fe918632d847e8ea3ebffbd47bd8ca9', 'Carlos');

-- --------------------------------------------------------

--
-- Table structure for table `adopcion`
--

CREATE TABLE `adopcion` (
                            `id` int(11) NOT NULL,
                            `idAnimal` int(11) NOT NULL,
                            `idUsuario` int(11) NOT NULL,
                            `fecha` date NOT NULL,
                            `razon` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `adopcion`
--

INSERT INTO `adopcion` (`id`, `idAnimal`, `idUsuario`, `fecha`, `razon`) VALUES
(3, 3, 3, '2020-03-01', 'Regalo para su madre'),
(4, 1, 1, '2020-03-20', 'Regalo para sus hijos'),
(6, 6, 4, '2020-03-18', 'regalo a su hijita'),
(7, 1, 1, '1992-05-26', 'perra guapa'),
(9, 2, 3, '2121-11-09', 'Paso de tu cara, colega'),
(10, 2, 3, '2121-11-09', 'Paso de tu cara, colega'),
(11, 2, 3, '2020-05-29', ''),
(12, 2, 3, '2020-05-29', 'Me gustan los gatos');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
                          `id` int(11) NOT NULL,
                          `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
                          `especie` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                          `raza` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                          `genero` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
                          `color` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                          `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `nombre`, `especie`, `raza`, `genero`, `color`, `edad`) VALUES
(1, 'Ozzy', 'perro', 'pastor alemán', 'Macho', 'Dorado', 12),
(2, 'Pepita', 'gato', 'Siamés', 'Hembra', 'Marrón', 2),
(3, 'Lucas', 'gato', 'Persa', 'Macho', 'Blanco', 1),
(6, 'Coby', 'Perro', 'Husky', 'Hembra', 'negro', 0),
(9, 'Lupi', 'gato', 'mezcla', 'Macho', 'gris', 3),
(10, 'lola', 'perro', 'pitbull', 'mujer', 'negro', 2),
(11, 'Peter', 'Perro', 'Carlino', 'macho', 'marron', 10),
(12, 'Peter', 'Perro', 'Carlino', 'macho', 'marron', 10);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
                            `id` int(11) NOT NULL,
                            `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
                            `apellido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
                            `sexo` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
                            `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
                            `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `sexo`, `direccion`, `telefono`) VALUES
(1, 'Juan', 'Pérez', 'Masculino', 'Calle del Prado, nº 3, 28006 Madrid', '+34 698782187'),
(2, 'Letizia', 'Ortiz', 'Femenino', 'Calle del Castillo, nº 2, 28045 Madrid', '+34 222222222'),
(3, 'Felipe', 'Sexto', 'Masculino', 'Calle del Pardo, nº 28, 28050 Madrid', '+34 999777666'),
(4, 'Ismael', 'García', 'Masculino', 'Calle del Río Júcar, nº 60, 28033 Madrid', '+34 666333888'),
(5, 'Maura', 'López', 'Femenino', 'Calle del programador, nº 1, 28700 Madrid', '+34 111222333'),
(6, 'Clara', 'Rivera', 'Femenino', 'Calle del Oso, nº 120, 28369 Madrid', '+34 999887714'),
(7, 'Juan', 'Ballester', 'hombre', 'mostoles', '8778787878'),
(8, 'Juanita', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(10, 'Juanita', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(12, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(14, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(16, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(17, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(18, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(19, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(20, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(21, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(22, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(23, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(24, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(25, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(26, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(27, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(28, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(29, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(30, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(31, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(32, 'Ilusa', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(33, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(34, 'cojones', 'Ballesteros', 'hombre', 'mostoles', '8778787878'),
(35, 'Petra', 'Ballesteros', 'hombre', 'mostoles', '8778787878');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopcion`
--
ALTER TABLE `adopcion`
    ADD PRIMARY KEY (`id`),
    ADD KEY `idAnimal` (`idAnimal`),
    ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopcion`
--
ALTER TABLE `adopcion`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopcion`
--
ALTER TABLE `adopcion`
    ADD CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`idAnimal`) REFERENCES `animal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
