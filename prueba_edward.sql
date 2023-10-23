

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `prueba_edward`
--

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `areas` (`id`, `nombre_area`) VALUES
(1, 'Informatica'),
(2, 'Servicios Generales');


--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `sexo` int(1) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `personal` (`id`, `nombres`, `apellidos`, `sexo`, `pais`, `departamento`, `fecha_nacimiento`, `email`, `area`) VALUES
(1, 'Edward Amilcar', 'Servellon Dominguez', 1, 'El Salvador', 'San Salvador', '1999-06-30', 'edward.servellon1@gmail.com', 1),
(2, 'Alan Brito', 'Delgado Gris', 1, 'El Salvador', 'Sonsonate', '1980-06-30', 'alan@prueba.com', 2),
(3, 'Astrid America', 'Colon Ramirez', 2, 'El Salvador', 'Santa Ana', '1950-02-01', 'astrid@goes.gob.sv', 1);


--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`);

ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


