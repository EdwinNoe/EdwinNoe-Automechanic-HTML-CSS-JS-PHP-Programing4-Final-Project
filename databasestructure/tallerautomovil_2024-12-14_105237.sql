-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tallerautomovil
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `tipo_servicio` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado_cita` varchar(50) DEFAULT 'Pendiente',
  `hora` time DEFAULT NULL,
  `PagoConfirmado` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`usuario_id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha_emision` date DEFAULT current_timestamp(),
  `numero_tarjeta` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'Relación con usuarios (id)',
  `id_citas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_facturas_usuarios` (`id_usuario`),
  KEY `frk_facid` (`id_citas`),
  CONSTRAINT `fk_facturas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factura_id` int(11) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_servicio` varchar(255) DEFAULT NULL COMMENT 'Tipo de servicio',
  PRIMARY KEY (`id`),
  KEY `fk_factura` (`factura_id`),
  CONSTRAINT `fk_factura` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

--
-- Table structure for table `reparacion_vehiculos`
--

DROP TABLE IF EXISTS `reparacion_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reparacion_vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparacion_vehiculos`
--

/*!40000 ALTER TABLE `reparacion_vehiculos` DISABLE KEYS */;
INSERT INTO `reparacion_vehiculos` VALUES (1,'Cambio de repuestos','Reemplazo de repuestos defectuosos o desgastados para mantener el vehículo en buen estado de funcionamiento.',1500.00),(2,'Enderezado y pintado','Reparación de carrocería con enderezado de partes dañadas y pintura para restaurar la estética del vehículo.',3000.00),(3,'Revisión del sistema eléctrico','Inspección y reparación de componentes eléctricos del vehículo, incluyendo batería, luces, y sistemas electrónicos.',1200.00),(4,'Reparacion Completo','Incluye cambio de repuestos, enderezado y pintado, y revisión del sistema eléctrico del vehículo.',5500.00);
/*!40000 ALTER TABLE `reparacion_vehiculos` ENABLE KEYS */;

--
-- Table structure for table `servicios_mantenimiento`
--

DROP TABLE IF EXISTS `servicios_mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios_mantenimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_mantenimiento`
--

/*!40000 ALTER TABLE `servicios_mantenimiento` DISABLE KEYS */;
INSERT INTO `servicios_mantenimiento` VALUES (1,'Mantenimiento básico','Incluye cambio de aceite, revisión de dirección, revisión de frenos, cambio de filtros de aire y combustible, y revisión general de líquidos del vehículo.',2400.00),(2,'Cambio de aceite','Reemplazo del aceite del motor para mantener el buen funcionamiento del vehículo.',720.00),(3,'Revisión de dirección','Inspección del sistema de dirección para asegurar su correcto funcionamiento y evitar fallos.',960.00),(4,'Cambio de filtros de aire y combustible','Reemplazo de los filtros de aire y combustible para mantener el motor funcionando de manera eficiente y prolongar su vida útil.',1000.00);
/*!40000 ALTER TABLE `servicios_mantenimiento` ENABLE KEYS */;

--
-- Table structure for table `tarjetas_credito`
--

DROP TABLE IF EXISTS `tarjetas_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarjetas_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_tarjeta` varchar(16) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre_tarjeta` varchar(15) DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_tarjeta` (`usuario_id`),
  CONSTRAINT `fk_usuario_tarjeta` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas_credito`
--

/*!40000 ALTER TABLE `tarjetas_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas_credito` ENABLE KEYS */;

--
-- Table structure for table `tecnicos`
--

DROP TABLE IF EXISTS `tecnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tecnicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnicos`
--

/*!40000 ALTER TABLE `tecnicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tecnicos` ENABLE KEYS */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll` tinyint(1) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `numero_telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

--
-- Dumping routines for database 'tallerautomovil'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-14 10:52:57
