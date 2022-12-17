-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2022 at 05:05 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siia`
--

-- --------------------------------------------------------

--
-- Table structure for table `alta_materias`
--

CREATE TABLE `alta_materias` (
  `id_materia` int(11) NOT NULL,
  `Clave` varchar(10) NOT NULL,
  `Ciclo` varchar(15) NOT NULL,
  `id_profesor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alta_materias`
--

INSERT INTO `alta_materias` (`id_materia`, `Clave`, `Ciclo`, `id_profesor`) VALUES
(1, 'C29', '23/23', '1998T1'),
(4, 'C27', '23/23', '1998T1'),
(5, 'C1', '23/23', '1990K3');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(10) NOT NULL,
  `a_name` varchar(60) DEFAULT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`matricula`, `a_name`, `Password`) VALUES
('1339846K', 'Christopher Nolan Magaña Barocio', 'test1234'),
('1436018C', 'Daniel Jossu Romero García', 'test1234');

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_profesor` varchar(10) NOT NULL,
  `Periodo` varchar(10) NOT NULL,
  `alumno_id` varchar(10) NOT NULL,
  `Calificacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_materia`, `id_profesor`, `Periodo`, `alumno_id`, `Calificacion`) VALUES
(1, 1, '1998T1', '23/23', '1339846K', 10),
(2, 1, '1998T1', '23/23', '1436018C', 10),
(5, 4, '1998T1', '23/23', '1339846K', 9),
(6, 4, '1998T1', '23/23', '1436018C', 10),
(7, 5, '1990K3', '23/23', '1339846K', 6);

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(10) NOT NULL,
  `Ciclo` varchar(10) NOT NULL,
  `id_alumno` varchar(10) NOT NULL,
  `Materia` int(10) NOT NULL,
  `id_profesor` varchar(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripcion`, `Ciclo`, `id_alumno`, `Materia`, `id_profesor`, `fecha`) VALUES
(1, '23/23', '1339846K', 1, '1998T1', '2022-12-15 02:10:59'),
(2, '23/23', '1436018C', 1, '1998T1', '2022-12-15 02:10:59'),
(9, '23/23', '1339846K', 4, '1998T1', '2022-12-15 03:18:34'),
(10, '23/23', '1339846K', 5, '1990K3', '2022-12-15 03:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `mapa_curricular`
--

CREATE TABLE `mapa_curricular` (
  `Clave` varchar(5) NOT NULL,
  `Nombre_materia` varchar(51) DEFAULT NULL,
  `Requisitos` varchar(22) DEFAULT NULL,
  `Teoricas` varchar(8) DEFAULT NULL,
  `Practicas` varchar(9) DEFAULT NULL,
  `Creditos` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapa_curricular`
--

INSERT INTO `mapa_curricular` (`Clave`, `Nombre_materia`, `Requisitos`, `Teoricas`, `Practicas`, `Creditos`) VALUES
('C1', 'Algoritmos I', 'TC7, TC8', '4', '0', 8),
('C10', 'Algoritmos Aleatorios', 'C2', '4', '0', 8),
('C11', 'Procesamiento de Cadenas', 'C1', '4', '0', 8),
('C12', 'Análisis de Algoritmos II', 'C2', '4', '0', 8),
('C13', 'Complejidad', 'C2, C4', '4', '0', 8),
('C14', 'Álgebra Booleana', 'C5', '4', '0', 8),
('C15', 'Diseño Digital', 'C14', '4', '0', 8),
('C16', 'Teoría de Autómatas', 'M4, M27', '4', '0', 8),
('C17', 'Programación de Sistemas', 'C3, C15', '4', '0', 8),
('C18', 'Compiladores', 'C17', '4', '0', 8),
('C19', 'Sistemas Operativos', 'TC8, C17', '4', '0', 8),
('C2', 'Análisis de Algoritmos I', 'C1', '4', '0', 8),
('C20', 'Redes de Computadoras', 'TC8, C15', '4', '0', 8),
('C21', 'Inteligencia Artificial', 'TC10, TC11, TC13, C6', '4', '0', 8),
('C22', 'Introducción al Reconocimiento de Patrones', 'M34, TC12, TC16', '4', '0', 8),
('C23', 'Procesamiento Digital de Imágenes', 'TC10, TC16, M34, C1', '4', '0', 8),
('C24', 'Graficación I', 'TC3, C1', '4', '0', 8),
('C25', 'Interacción Hombre-máquina', 'TC8', '4', '0', 8),
('C26', 'Seminario de Usabilidad', 'TC8', '4', '0', 8),
('C27', 'Interfaces de Usuario', 'TC8', '4', '0', 8),
('C28', 'Recuperación de Información', 'C1, C11', '4', '0', 8),
('C29', 'Bases de Datos', 'TC4, C1', '4', '0', 8),
('C3', 'Lenguajes Formales', 'TC4, M4, M27', '4', '0', 8),
('C4', 'Computabilidad', 'C3, M8', '4', '0', 8),
('C5', 'Diseños Computacionales', 'TC7', '4', '0', 8),
('C6', 'Lenguajes de Programación', 'TC4', '4', '0', 8),
('C7', 'Geometría Computacional I', 'TC1, TC3', '4', '0', 8),
('C8', 'Geometría Computacional II', 'C7', '4', '0', 8),
('C9', 'Algoritmos Avanzados', 'C2', '4', '0', 8),
('E1', 'Educación Matemática', '100 CRÉDITOS EN TC', '4', '0', 8),
('E10', 'Didáctica de las Matemáticas II', 'E4', '3', '2', 8),
('E11', 'Métodos de Investigación en Educación Matemática II', 'E7', '4', '0', 8),
('E12', 'Epistemología de las Matemáticas', 'E2, E3', '4', '0', 8),
('E13', 'Diseño y Desarrollo de Software Educativo I', 'TC8', '4', '0', 8),
('E14', 'Diseño y Desarrollo de Software Educativo II', 'E13', '4', '0', 8),
('E15', 'Teorías sobre Resolución de Problemas', 'E3, E4', '4', '0', 8),
('E16', 'Filosofía de las Ciencias', '120 CRÉDITOS EN TC', '4', '0', 8),
('E17', 'Constructivismo', 'E9', '4', '0', 8),
('E18', 'Teoría de la Cognición', 'E9', '4', '0', 8),
('E19', 'Tópicos Especiales de Didáctica I', 'E4', '4', '0', 8),
('E2', 'Historia de las Matemáticas I', '120 CRÉDITOS EN TC', '4', '0', 8),
('E20', 'Tópicos Especiales de Didáctica II', 'E4', '4', '0', 8),
('E21', 'Seminario sobre Temas de Educación I', '48 CRÉDITOS EN E', '4', '0', 8),
('E22', 'Seminario sobre Temas de Educación II', '48 CRÉDITOS EN E', '4', '0', 8),
('E3', 'Teorías de Aprendizaje I', '120 CRÉDITOS EN TC', '4', '0', 8),
('E4', 'Didáctica de las Matemáticas I', '120 CRÉDITOS EN TC', '3', '2', 8),
('E5', 'Uso de Nuevas Tecnologías', '120 CRÉDITOS EN TC', '3', '2', 8),
('E6', 'Currículo y Evaluación', 'E3, E4', '4', '0', 8),
('E7', 'Métodos de Investigación en Educación Matemática I', 'E3, E4', '4', '0', 8),
('E8', 'Historia de las Matemáticas II', 'E2', '4', '0', 8),
('E9', 'Teorías de Aprendizaje II', 'E3', '4', '0', 8),
('F1', 'Laboratorio de Física General', '**', '0', '4', 4),
('F10', 'Teoría Electromagnética I', 'TC18, F7', '4', '0', 8),
('F11', 'Electrónica I', 'TC13, TC18, F5', '4', '0', 8),
('F12', 'Mecánica Cuántica I', 'TC19, F7, F8', '4', '0', 8),
('F13', 'Mecánica Cuántica II', 'F12', '4', '0', 8),
('F14', 'Estado Sólido I', 'F12', '4', '0', 8),
('F15', 'Mecánica Estadística I', 'F4, F12', '4', '0', 8),
('F16', 'Introducción a la Ciencia de los Materiales', 'TC19', '4', '0', 8),
('F17', 'Fisicoquímica', 'TC19, F4', '4', '0', 8),
('F18', 'Electrónica II', 'F11', '4', '0', 8),
('F19', 'Física de Semiconductores', 'F14', '4', '0', 8),
('F2', 'Laboratorio de Mecánica', 'F1', '0', '4', 4),
('F20', 'Estado Sólido II', 'F14', '4', '0', 8),
('F21', 'Física de Dispositivos Semiconductores I', 'F14', '4', '0', 8),
('F22', 'Fotónica', 'F6, F10', '4', '0', 8),
('F23', 'Procesos Ópticos en Semiconductores', 'F14', '4', '0', 8),
('F24', 'Propiedades Ópticas de Películas Delgadas', 'F6, F10', '4', '0', 8),
('F25', 'Circuitos Digitales I', 'F18', '4', '0', 8),
('F26', 'Física de Dispositivos Semiconductores II', 'F21', '4', '0', 8),
('F27', 'Estado sólido III', 'F20', '4', '0', 8),
('F28', 'Circuitos Digitales II', 'F25', '4', '0', 8),
('F29', 'Física del Láser', 'F12', '4', '0', 8),
('F3', 'Métodos Matemáticos de la Física I', 'TC10', '4', '0', 8),
('F30', 'Introducción a la Ingeniería Nuclear', 'TC19', '4', '0', 8),
('F31', 'Física de Fluidos', 'F3, F4', '4', '0', 8),
('F32', 'Ingeniería Óptica', 'F6', '4', '0', 8),
('F33', 'Señales y Sistemas', 'F7', '4', '0', 8),
('F34', 'Microprocesadores', 'F25', '4', '0', 8),
('F35', 'Control de Sistemas', 'F33', '4', '0', 8),
('F36', 'Métodos Matemáticos de la Física III', 'F7', '4', '0', 8),
('F37', 'Teoría Electromagnética II', 'F10', '4', '0', 8),
('F38', 'Historia de las Ciencias', '*', '4', '0', 8),
('F39', 'Relatividad General I', 'TC19, F3, F8', '4', '0', 8),
('F4', 'Termodinámica', 'TC10, TC14', '4', '0', 8),
('F40', 'Dinámica no Lineal y Caos', 'F8', '4', '0', 8),
('F41', 'Cosmología', 'TC19', '4', '0', 8),
('F42', 'Relatividad General II', 'F39', '4', '0', 8),
('F43', 'Mecánica Cuántica III', 'F13', '4', '0', 8),
('F44', 'Introducción a la Teoría Cuántica de Campos', 'F12', '4', '0', 8),
('F45', 'Partículas Elementales', 'F12', '4', '0', 8),
('F46', 'Mecánica Estadística II', 'F15', '4', '0', 8),
('F47', 'Óptica Geométrica', 'F6', '4', '0', 8),
('F48', 'Óptica Física I', 'F6', '4', '0', 8),
('F49', 'Laboratorio de Óptica II', 'F6, F9', '0', '4', 4),
('F5', 'Laboratorio de Electromagnetismo', 'TC14, F2', '0', '4', 4),
('F50', 'Óptica Física II', 'F48', '4', '0', 8),
('F51', 'Radiometría', 'F6', '4', '0', 8),
('F52', 'Optoelectrónica', 'F6, F11', '4', '0', 8),
('F53', 'Laboratorio de Caracterización Óptica de Materiales', 'F49', '0', '4', 4),
('F54', 'Óptica Cuántica', 'F6, F12', '4', '0', 8),
('F55', 'Óptica No Lineal', 'F6, F10', '4', '0', 8),
('F56', 'Introducción a Materiales Avanzados', 'F14', '4', '0', 8),
('F57', 'Laboratorio de Espectroscopias Ópticas', 'F6, F14', '0', '4', 4),
('F58', 'Laboratorio de Crecimiento de Películas Delgadas', 'F14', '0', '4', 4),
('F59', 'Laboratorio de Dispositivos Semiconductores', 'F11, F16, F21', '0', '4', 4),
('F6', 'Óptica', 'TC18', '4', '0', 8),
('F60', 'Física Nuclear', 'F12', '4', '0', 8),
('F61', 'Laboratorio de Sistemas Digitales y Control', 'F28, F33', '0', '4', 4),
('F62', 'Curso Especial de Física', '*', '4', '0', 8),
('F63', 'Temas Selectos de Física', '*', '4', '0', 8),
('F7', 'Métodos Matemáticos de la Física II', 'TC13, TC17, F3', '4', '0', 8),
('F8', 'Mecánica Teórica', 'TC10, TC13, TC14', '4', '0', 8),
('F9', 'Laboratorio de Óptica I', 'F5', '0', '4', 4),
('M1', 'Análisis Matemático I', 'TC10, TC11', '5', '0', 10),
('M10', 'Geometría Diferencial', 'TC15', '4', '0', 8),
('M11', 'Teoría de Números', 'TC2', '4', '0', 8),
('M12', 'Matemáticas Discretas I', 'TC2', '4', '0', 8),
('M13', 'Geometría Moderna', 'M3', '4', '0', 8),
('M14', 'Ecuaciones Diferenciales Ordinarias II', 'TC13, TC16, M1', '4', '0', 8),
('M15', 'Teoría de la Medida', 'M5', '4', '0', 8),
('M16', 'Análisis Funcional', 'M5', '4', '0', 8),
('M17', 'Topología Diferencial', 'TC11, TC15, M8', '4', '0', 8),
('M18', 'Teoría de Campos', 'M4', '4', '0', 8),
('M19', 'Introducción al Álgebra Homológica', 'M6', '4', '0', 8),
('M2', 'Métodos Numéricos', 'TC6, TC7, TC8', '3', '2', 8),
('M20', 'Topología de Conjuntos', 'M8, 120 CRÉDITOS EN TC', '4', '0', 8),
('M21', 'Introducción a la Topología Algebraica', 'M4, M8', '4', '0', 8),
('M22', 'Matemáticas Discretas II', 'M12', '4', '0', 8),
('M23', 'Ecuaciones Diferenciales Parciales I', 'TC10, TC13', '4', '0', 8),
('M24', 'Cálculo de Variaciones', 'TC10, TC13', '4', '0', 8),
('M25', 'Ecuaciones Diferenciales Parciales II', 'M1, M23', '4', '0', 8),
('M26', 'Geometría Proyectiva', 'TC11, M3', '4', '0', 8),
('M27', 'Lógica', 'M9', '4', '0', 8),
('M28', 'Teoría de Categorías', 'M6, M9', '4', '0', 8),
('M29', 'Análisis Complejo II', 'M7', '4', '0', 8),
('M3', 'Geometría Euclidiana', 'PR1, PR2, PR3', '4', '0', 8),
('M30', 'Álgebra Lineal Numérica', 'TC11, M2', '4', '0', 8),
('M31', 'Análisis Numérico I', 'M1, M2', '4', '0', 8),
('M32', 'Análisis Numérico II', 'M31', '4', '0', 8),
('M33', 'Solución Numérica de Ecs Diferenciales Ordinarias', 'TC13, M31', '4', '0', 8),
('M34', 'Estadística I', 'TC6, TC12', '4', '0', 8),
('M35', 'Estadística II', 'M34', '4', '0', 8),
('M36', 'Solución Numérica de Ecs Diferenciales Parciales', 'M23, M33', '4', '0', 8),
('M37', 'Optimización', 'TC15, M1', '4', '0', 8),
('M38', 'Investigación de Operaciones', 'TC10, TC11', '4', '0', 8),
('M39', 'Curso Especial de Matemáticas', '*', '4', '0', 8),
('M4', 'Álgebra Moderna', 'TC11', '5', '0', 10),
('M42', 'Temas Selectos de Matemáticas', '*', '4', '0', 8),
('M43', 'Seminario de Tesis', '*', '4', '0', 0),
('M5', 'Análisis Matemático II', 'M1', '4', '0', 8),
('M6', 'Teoría de Módulos', 'TC16, M4', '4', '0', 8),
('M7', 'Análisis Complejo I', 'TC17, M1', '4', '0', 8),
('M8', 'Topología', 'M1', '4', '0', 8),
('M9', 'Teoría de Conjuntos', '120 CRÉDITOS EN TC', '4', '0', 8),
('PR1', 'Precálculo', '', '3', '0', 0),
('PR2', 'Álgebra y Trigonometría', '', '3', '0', 0),
('PR3', 'Física Básica', '', '3', '0', 0),
('TC1', 'Cálculo I', '**', '6', '0', 12),
('TC10', 'Cálculo III', 'TC6', '6', '0', 12),
('TC11', 'Álgebra  Lineal I', 'TC3, TC7', '4', '0', 8),
('TC12', 'Probabilidad y Estadística', 'TC1, TC2', '4', '0', 8),
('TC13', 'Ecuaciones Diferenciales Ordinarias I', 'TC6', '4', '0', 8),
('TC14', 'Física II', 'TC9', '5', '0', 10),
('TC15', 'Cálculo IV', 'TC10, TC11', '6', '0', 12),
('TC16', 'Álgebra  Lineal II', 'TC11', '4', '0', 8),
('TC17', 'Cálculo Complejo', 'TC10, TC11', '4', '0', 8),
('TC18', 'Física III', 'TC6, TC14', '5', '0', 10),
('TC19', 'Física Moderna', 'TC18', '4', '0', 8),
('TC2', 'Álgebra Superior I', '**', '4', '0', 8),
('TC3', 'Geometría  Analítica Vectorial', '**', '4', '0', 8),
('TC4', 'Computación I', '**', '1', '4', 6),
('TC5', 'Física General', '**', '4', '0', 8),
('TC6', 'Cálculo II', 'TC1', '6', '0', 12),
('TC7', 'Álgebra  Superior II', 'TC2', '4', '0', 8),
('TC8', 'Computación II', 'TC4', '2', '2', 6),
('TC9', 'Física I', 'TC5', '5', '0', 10);

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `num_empleado` varchar(10) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`num_empleado`, `Nombre`, `Password`) VALUES
('1990K3', 'Karina Figueroa', 'test1234'),
('1998T1', 'Cuauhtémoc Rivera Loaiza', 'test1234'),
('2000R3', 'Joaquin Estevez', 'test1234');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, '1339846K', 'test1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alta_materias`
--
ALTER TABLE `alta_materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `materia-clave` (`Clave`),
  ADD KEY `materia-profesor` (`id_profesor`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `calificacion-alumno` (`alumno_id`),
  ADD KEY `calificacion-profesor` (`id_profesor`),
  ADD KEY `calificacion-materia` (`id_materia`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `inscripcion-alumno` (`id_alumno`),
  ADD KEY `inscripcion-profesor` (`id_profesor`),
  ADD KEY `inscripcion-materia` (`Materia`);

--
-- Indexes for table `mapa_curricular`
--
ALTER TABLE `mapa_curricular`
  ADD PRIMARY KEY (`Clave`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`num_empleado`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alta_materias`
--
ALTER TABLE `alta_materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alta_materias`
--
ALTER TABLE `alta_materias`
  ADD CONSTRAINT `materia-clave` FOREIGN KEY (`Clave`) REFERENCES `mapa_curricular` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia-profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`num_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificacion-alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion-materia` FOREIGN KEY (`id_materia`) REFERENCES `alta_materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion-profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`num_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion-materia` FOREIGN KEY (`Materia`) REFERENCES `alta_materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion-profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`num_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
