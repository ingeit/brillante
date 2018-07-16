CREATE DATABASE  IF NOT EXISTS `negocio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `negocio`;
-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 192.168.1.100    Database: negocio
-- ------------------------------------------------------
-- Server version	5.6.33-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `cantidadProductosVendidosMes`
--

DROP TABLE IF EXISTS `cantidadProductosVendidosMes`;
/*!50001 DROP VIEW IF EXISTS `cantidadProductosVendidosMes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cantidadProductosVendidosMes` AS SELECT 
 1 AS `Cantidad`,
 1 AS `Mes`,
 1 AS `Año`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monto` decimal(10,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2016-10-15 20:23:38',45000.00,'A'),(2,'2016-10-15 20:30:55',1848000.00,'A'),(3,'2016-10-15 20:31:15',225000.00,'A'),(4,'2016-10-18 23:51:40',475000.00,'A'),(5,'2016-10-20 17:10:24',220.00,'A'),(6,'2016-10-20 17:10:48',220.00,'A'),(7,'2016-10-21 14:40:18',450.00,'A');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depositos`
--

DROP TABLE IF EXISTS `depositos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depositos` (
  `idDeposito` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`idDeposito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depositos`
--

LOCK TABLES `depositos` WRITE;
/*!40000 ALTER TABLE `depositos` DISABLE KEYS */;
INSERT INTO `depositos` VALUES (1,'Deposito 1 Liquidos','Godoy Cruz 123'),(2,'Deposito 2 Materiales','Pje Garcia 999'),(3,'Local','Av Belgrano 4500 ');
/*!40000 ALTER TABLE `depositos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dolar`
--

DROP TABLE IF EXISTS `dolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dolar` (
  `idDolar` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDolar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dolar`
--

LOCK TABLES `dolar` WRITE;
/*!40000 ALTER TABLE `dolar` DISABLE KEYS */;
INSERT INTO `dolar` VALUES (1,15.76,'2017-03-30 02:17:16');
/*!40000 ALTER TABLE `dolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `idIngreso` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idIngreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (1,'2016-10-15 20:23:38','A'),(2,'2016-10-15 20:30:55','A'),(3,'2016-10-15 20:31:15','A'),(4,'2016-10-15 20:31:46','A'),(5,'2016-10-15 20:32:10','A'),(6,'2016-10-15 20:32:35','A'),(7,'2016-10-18 23:51:40','A'),(8,'2016-10-20 17:11:04','A'),(9,'2016-10-21 14:40:18','A');
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineascompra`
--

DROP TABLE IF EXISTS `lineascompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineascompra` (
  `idLineaCompra` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idLineaCompra`),
  KEY `idCompra_idx` (`idCompra`),
  KEY `idProducto_idx` (`idProducto`),
  CONSTRAINT `lineaCompra_idCompra` FOREIGN KEY (`idCompra`) REFERENCES `compras` (`idCompra`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `lineaCompra_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineascompra`
--

LOCK TABLES `lineascompra` WRITE;
/*!40000 ALTER TABLE `lineascompra` DISABLE KEYS */;
INSERT INTO `lineascompra` VALUES (1,1,4,1000,45.00),(2,2,14,1000,22.00),(3,2,2,1000,400.00),(4,2,27,1000,20.00),(5,2,28,1000,40.00),(6,2,20,1000,15.00),(7,2,16,1000,10.00),(8,2,11,1000,10.00),(9,2,5,1000,3.00),(10,2,26,1000,123.00),(11,2,17,1000,555.00),(12,2,12,1000,650.00),(13,3,29,1000,12.00),(14,3,30,1000,213.00),(15,4,20,5000,15.00),(16,4,2,1000,400.00),(17,5,14,10,22.00),(18,6,14,10,22.00),(19,7,4,10,45.00);
/*!40000 ALTER TABLE `lineascompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineasingreso`
--

DROP TABLE IF EXISTS `lineasingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineasingreso` (
  `idLineaIngreso` int(11) NOT NULL,
  `idIngreso` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLineaIngreso`),
  KEY `keyIngreso_idx` (`idIngreso`),
  KEY `keyProducto_idx` (`idProducto`),
  CONSTRAINT `keyIngreso` FOREIGN KEY (`idIngreso`) REFERENCES `ingresos` (`idIngreso`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `keyProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineasingreso`
--

LOCK TABLES `lineasingreso` WRITE;
/*!40000 ALTER TABLE `lineasingreso` DISABLE KEYS */;
INSERT INTO `lineasingreso` VALUES (1,1,4,1000),(2,2,20,1000),(3,2,17,1000),(4,2,12,1000),(5,3,29,1000),(6,3,30,1000),(7,4,14,500),(8,4,2,500),(9,4,27,500),(10,5,16,500),(11,5,5,500),(12,5,26,500),(13,6,11,500),(14,6,28,500),(15,7,20,5000),(16,8,14,1),(17,9,4,10);
/*!40000 ALTER TABLE `lineasingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineasperdidaproducto`
--

DROP TABLE IF EXISTS `lineasperdidaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineasperdidaproducto` (
  `idLineaPerdidaProducto` int(11) NOT NULL,
  `idPerdidaProducto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `lugar` enum('local','deposito') NOT NULL,
  PRIMARY KEY (`idLineaPerdidaProducto`),
  KEY `idPerdidaProducto_idx` (`idPerdidaProducto`),
  KEY `idProducto_idp` (`idProducto`),
  CONSTRAINT `idPerdidaProducto` FOREIGN KEY (`idPerdidaProducto`) REFERENCES `perdidasproducto` (`idPerdidaProducto`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `key_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineasperdidaproducto`
--

LOCK TABLES `lineasperdidaproducto` WRITE;
/*!40000 ALTER TABLE `lineasperdidaproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `lineasperdidaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineastransformacion`
--

DROP TABLE IF EXISTS `lineastransformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineastransformacion` (
  `idLineaTransformacion` int(11) NOT NULL,
  `idTransformacion` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idLineaTransformacion`),
  KEY `idTransformacion_idx` (`idTransformacion`),
  KEY `idProducto_trans_idx` (`idProducto`),
  CONSTRAINT `idProducto_trans` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idTransformacion` FOREIGN KEY (`idTransformacion`) REFERENCES `transformacion` (`idTransformacion`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineastransformacion`
--

LOCK TABLES `lineastransformacion` WRITE;
/*!40000 ALTER TABLE `lineastransformacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `lineastransformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineasventa`
--

DROP TABLE IF EXISTS `lineasventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineasventa` (
  `idLineaVenta` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` decimal(10,2) NOT NULL,
  `lugar` enum('local','deposito') NOT NULL DEFAULT 'local',
  PRIMARY KEY (`idLineaVenta`),
  KEY `idProducto_idx` (`idProducto`),
  KEY `idVenta_idx` (`idVenta`),
  CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineasventa`
--

LOCK TABLES `lineasventa` WRITE;
/*!40000 ALTER TABLE `lineasventa` DISABLE KEYS */;
INSERT INTO `lineasventa` VALUES (1,1,4,50,81.68,'local'),(2,1,14,40,598.95,'local'),(3,1,2,30,919.60,'local'),(4,1,27,10,471.90,'local'),(5,1,4,50,81.68,'local'),(6,2,4,10,81.68,'local'),(7,2,27,1,471.90,'local'),(8,2,20,12,36.30,'local'),(9,2,2,50,919.60,'local'),(10,2,5,100,4.83,'local'),(11,2,5,58,4.83,'local'),(12,2,11,160,272.25,'local'),(13,3,27,203,471.90,'local'),(14,4,20,301,36.30,'local'),(15,5,28,1,1016.40,'local'),(16,5,17,2,738.71,'local'),(17,5,29,10,19.17,'local'),(18,6,4,10,81.68,'local'),(19,7,14,133,614.92,'local'),(20,8,14,10,614.92,'local'),(21,8,14,50,614.92,'local'),(22,9,4,1,81.68,'local'),(23,10,14,10,598.95,'local'),(24,11,14,1,598.95,'local'),(25,12,14,10,598.95,'deposito'),(26,13,2,50,919.60,'deposito'),(27,13,14,50,638.88,'local'),(28,13,16,500,24.20,'local'),(29,13,16,10,24.20,'deposito'),(30,14,20,10,36.30,'local'),(31,15,20,4,36.30,'local'),(32,16,14,1,638.88,'local'),(33,17,4,1,81.68,'local'),(34,18,14,1,638.88,'local');
/*!40000 ALTER TABLE `lineasventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('ricardobruno_89@hotmail.com','be83e36b5563c128b7f517b6a2e9ebf1a647cfec8380cb33b462469fef48256e','2016-10-14 16:44:46');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perdidasproducto`
--

DROP TABLE IF EXISTS `perdidasproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perdidasproducto` (
  `idPerdidaProducto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`idPerdidaProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TIPO:\np = perdida\nt = transformacion ( a suelto x kg)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perdidasproducto`
--

LOCK TABLES `perdidasproducto` WRITE;
/*!40000 ALTER TABLE `perdidasproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `perdidasproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL DEFAULT '1',
  `idDeposito` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cotizacion` varchar(10) NOT NULL,
  `ganancia` decimal(10,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idProducto`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `idProveedor_idx` (`idProveedor`),
  KEY `idDeposito_idx` (`idDeposito`),
  CONSTRAINT `productos_idDeposito` FOREIGN KEY (`idDeposito`) REFERENCES `depositos` (`idDeposito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,1,1,'Comida Para Perro',400.00,'Pesos',90.00,'A'),(3,1,2,'Cereal',1.00,'Pesos',1.00,'B'),(4,1,3,'Chuquer',45.00,'Pesos',50.00,'A'),(5,3,1,'Fosforos 3 patitos',3.00,'Pesos',33.00,'A'),(11,2,2,'Lavandina',10.00,'Dolares',50.00,'A'),(12,2,3,'iPhone 7',650.00,'Dolares',100.00,'A'),(14,1,1,'Coca Cola 1lts',22.00,'Dolares',50.00,'A'),(16,3,2,'Desodorante',10.00,'Pesos',100.00,'A'),(17,3,3,'Prueba',555.00,'Pesos',10.00,'A'),(20,1,3,'Talco',15.00,'Pesos',100.00,'A'),(26,5,1,'HOLA',123.00,'Dolares',123.00,'B'),(27,5,1,'Leche',20.00,'Dolares',30.00,'A'),(28,4,2,'Leche 2',40.00,'Dolares',40.00,'A'),(29,2,3,'Taza',12.00,'Pesos',32.00,'A'),(30,2,3,'Taza 2',213.00,'Pesos',11.00,'B'),(31,2,2,'Vaso',12.00,'Pesos',100.00,'B'),(32,4,3,'Comida perro suelta (kg)',15.00,'Pesos',100.00,'A');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `productosMasVendidos`
--

DROP TABLE IF EXISTS `productosMasVendidos`;
/*!50001 DROP VIEW IF EXISTS `productosMasVendidos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `productosMasVendidos` AS SELECT 
 1 AS `nombre`,
 1 AS `cantidad`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `razonSocial` varchar(45) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'Macro','Av Roca 999','0303456 0303456','B'),(2,'Gomez Pardo','Lejos','4895766','A'),(3,'Brillante','Av Belgrano 4100','4307331','B'),(4,'Emilio Luke','Av Belgrano 4900','4LUKE123','A'),(5,'Hiper Libertad','Av Roca 2981','4 HIPER 123','A'),(6,'Yo','Mi Local','','A');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transformacion`
--

DROP TABLE IF EXISTS `transformacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transformacion` (
  `idTransformacion` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTransformacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transformacion`
--

LOCK TABLES `transformacion` WRITE;
/*!40000 ALTER TABLE `transformacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transformacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` enum('admin','vendedor','cajero','repositor') CHARACTER SET utf8 NOT NULL DEFAULT 'vendedor',
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Ricardo Bruno','ricky','ricardobruno_89@hotmail.com','$2y$10$faq9OX.4GyfdclR1v8yA2.mb6v/k5nRfLXcc/q2X/dS70/WsmX2RC','admin','YX0lamik6nPcvgcCUqXSyCpLAirBTW19eEO7m83bHMUvONE1Dbdx7LvSP4Xq','2016-09-26 13:10:00','2016-10-22 22:52:42'),(14,'Vendedor Local','vendedor','vendedor@vendedor.com','$2y$10$353mSmZBT11RmuZYYI4Ige6d.ai/x2b9aUif21E9hpUFqfDFPHBsi','vendedor','zYLspvLfGzQLizpoLmBYrJn7RQXRWW1xnEzn5Fa88LZLe7Zbg0pR8wUS351o','2016-10-14 19:36:14','2016-12-08 20:16:48'),(15,'Cajero 1 !!','cajero','cajero@gmail.com','$2y$10$xmw6nchp7yszk1JMjsmJK.3uFcB6gRNTLk.b5yNhEWSOnu8zqg0au','cajero','QeOFSAHgnfdJLXUdkDlimTbTwrlH9aJyvi4QZgLJjlTaAZPjLqjiWXaecAs5','2016-10-14 19:36:41','2016-10-24 11:43:15'),(16,'Repositor Deposito','repositor','repositor@repositor.com','$2y$10$P0vjP12qcNk1GkVuNuy0ouJuaadiCFhM0kV0rwqpBAnGsL35MHcW6','repositor','3tbfG0aicG3QG89JDLMreKI92cPX0QkqHZe4DMBaMxtHMhTxlyPOel5Qyut2','2016-10-14 19:37:28','2016-10-14 19:37:32'),(17,'Kevin Shionen Gomez Veliz','masterk63','masterk63@gmail.com','$2y$10$9WxJnSFsnDM/AmfkwHMcn.dR2OrYvd9f/g3I1lZ4vq7QCtSODnQN.','admin','hFr5EUoTuNFaMARiW8AuUVcIJMMUjKy2sQn59OS0T8Askof6nZltFgLbOTLq','2016-12-28 16:10:35','2016-12-28 16:10:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monto` decimal(10,2) NOT NULL COMMENT 'la fecha la puse como varchar por ahora para probar y no complicaronos con el uso de DATE o TIMESTAMP... ',
  `estado` char(1) NOT NULL DEFAULT 'I' COMMENT 'estado = I impago, P pagada',
  `estadoReal` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2015-02-26 17:52:43',64433.00,'I','A'),(2,'2016-02-24 17:22:37',92027.44,'I','A'),(3,'2016-02-24 17:39:48',95795.70,'I','A'),(4,'2016-03-24 17:42:02',10926.30,'I','A'),(5,'2016-04-24 17:42:55',2685.52,'I','A'),(6,'2016-10-10 16:18:18',816.80,'I','A'),(7,'2016-10-26 16:18:45',81784.36,'I','A'),(8,'2015-04-26 19:00:21',36895.20,'I','A'),(9,'2016-10-28 22:40:37',81.68,'I','A'),(10,'2016-10-28 22:42:42',5989.50,'I','A'),(11,'2016-11-02 14:50:56',598.95,'I','A'),(12,'2016-11-04 20:26:49',5989.50,'I','A'),(13,'2016-12-08 19:37:14',90266.00,'I','A'),(14,'2016-12-08 19:39:01',363.00,'I','A'),(15,'2016-12-08 19:41:55',145.20,'P','A'),(16,'2016-12-08 19:41:16',638.88,'P','A'),(17,'2017-01-19 20:26:29',81.68,'I','A'),(18,'2017-01-20 18:21:57',638.88,'I','A');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'negocio'
--

--
-- Dumping routines for database 'negocio'
--
/*!50003 DROP PROCEDURE IF EXISTS `cliente_activar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cliente_activar`(cId INT)
BEGIN

	UPDATE clientes SET estado = 'A' WHERE id = cId;
    SELECT 1 as codigo, 'OK' mensaje;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cliente_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cliente_baja`(cIdCliente INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
    IF NOT EXISTS (SELECT id FROM clientes WHERE id = cIdCliente) THEN
		SELECT 0 as codigo, 'Cliente inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    IF (SELECT estado FROM clientes WHERE id = cIdCliente) = 'B' THEN
		SELECT 0 as codigo, 'El cliente ya se encuentra dado de baja.' mensaje;
		LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	clientes
        SET		estado = 'B'
        WHERE	id = cIdCliente;
        SELECT cIdCliente as codigo, 'Cliente dado de baja con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cliente_buscar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cliente_buscar`(pCadena VARCHAR(50))
BEGIN
	SELECT 	*
    FROM	clientes
    WHERE	nombre LIKE CONCAT('%',pCadena,'%') OR
			apellido LIKE CONCAT('%',pCadena,'%')
            -- 2,3 hace referencia a ordenar primero por la columna 2 (apellido), y luego por la columna 3 (nombre)
	ORDER BY	2,3;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `compra_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `compra_dame`(id INT)
BEGIN
	/*
    Procedimiento que devuelve compra con sus lineas de compras a partir de idCompra
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo, 'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
    
	SELECT c.*,lc.*,p.nombre,date_format(fecha,'%d-%m-%Y %h:%i') fecha FROM compras c 
    INNER JOIN lineascompra lc ON lc.idCompra=c.idCompra
    INNER JOIN productos p ON p.idProducto = lc.idProducto 
    WHERE c.idCompra=id;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `compra_eliminar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `compra_eliminar`(cIdCompra INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    IF NOT EXISTS (SELECT idCompra FROM compras WHERE idCompra = cIdCompra) THEN
		SELECT 0 as codigo,'Compra inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	compras
        SET		estado = 'B'
        WHERE	idCompra = cIdCompra;
        SELECT cIdCompra as codigo, 'Compra eliminada con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `compra_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `compra_listar`()
BEGIN
	SELECT 	*,date_format(fecha,'%d-%m-%Y %h:%i') fecha
    FROM	compras
    WHERE estado='A'
	ORDER BY idCompra DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `compra_nueva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `compra_nueva`(cMonto DECIMAL(10,2), cCadena VARCHAR(1000))
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
    DECLARE cIdCompra INT;
    DECLARE lcIdLineaCompra INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    DECLARE pPrecio DECIMAL(10,2);
    DECLARE pDeposito INT;
    DECLARE ingresoLocal VARCHAR (1000) DEFAULT "";
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (cCadena IS NULL OR cCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos en la compra.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		SET cIdCompra = 1 + (SELECT COALESCE(MAX(idCompra),0) FROM compras);
		INSERT INTO compras VALUES (cIdCompra,CURRENT_TIMESTAMP,cMonto,'A');

        
        LAZO : LOOP
			-- Obtengo Linea de Compra
            SET aux = SUBSTRING_INDEX(cCadena,'*',1);
            -- Obtengo idProducto de Linea de Compra
            SET pIdProducto = SUBSTRING_INDEX(aux,'|',1);
            -- Elimino idProducto de Linea de Compra
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo cantidad de Linea de Venta
            SET cantidad = SUBSTRING_INDEX(aux,'|',1);
			
            -- Control de parámetros incorrectos
            IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
				SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            IF (cantidad <= 0) THEN
				SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            
            -- Alta en LineasCompra
            SET lcIdLineaCompra = 1 + (SELECT COALESCE(MAX(idLineaCompra),0) FROM lineascompra);
            SET pPrecio = (SELECT precio FROM productos WHERE idProducto = pIdProducto);
            SET pDeposito = (SELECT idDeposito FROM productos WHERE idProducto = pIdProducto);
            INSERT INTO lineascompra VALUES (lcIdLineaCompra,cIdCompra,pIdProducto,cantidad,pPrecio);
            
            -- Control para ver si producto va a local o no 
            -- COn esta linea obtengo de vuelta la ultima linea entera en caso de necesitarla para el ingreso local
            SET aux = SUBSTRING_INDEX(cCadena,'*',1);  
            IF (pDeposito = 3) THEN
				SET ingresoLocal = CONCAT(ingresoLocal,aux,'*');
            END IF;
			-- Elimino Linea de Venta de pLineas
			  
			SET cCadena = RIGHT(cCadena,CHAR_LENGTH(cCadena) - CHAR_LENGTH(aux));
			SET cCadena = RIGHT(cCadena,CHAR_LENGTH(cCadena)-1);
            
            -- Condición de salida
			IF (cCadena = '') THEN
				IF (ingresoLocal <> "") THEN
						-- Eliminio el ultimo * de la linea de ingreso.. SINTAXIS: idProd|Canti* SIGUIENTE
					SET ingresoLocal = TRIM(trailing '*' FROM ingresoLocal);
                    CALL ingreso_nuevo_para_compras(ingresoLocal,@codigo);
                 --   SELECT cIdCompra AS codigo, @mensaje as mensaje;
                END IF;    
				LEAVE LAZO;
			END IF;
		END LOOP LAZO;
	IF (@codigo <> 0) THEN
		SELECT cIdCompra AS codigo, 'Compra creada con exito. Ademas se ingreso automaticamente a Local el/los productos correspondientes' mensaje;
		
	ELSE
		SELECT cIdCompra AS codigo, 'Compra creada con exito.' mensaje;
	END IF;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deposito_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deposito_listar`()
BEGIN
	SELECT 	*
    FROM	depositos
	ORDER BY nombre;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `dolar_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `dolar_dame`()
PROC: BEGIN
	SELECT precio FROM dolar;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `dolar_insertar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `dolar_insertar`(pPrecioDolar DECIMAL(10,2))
PROC: BEGIN

    -- Declaracion de variables
    DECLARE pIdDolar INT;
    DECLARE horaActual TIMESTAMP;
   
    
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo, 'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    -- Control de parametros incorrectos
    
    START TRANSACTION;
    -- Inserta el valor del dolar como ID en caso q no exista y por unica vez
    -- despues siempre que intenta insertar se fija que ya existe el id=1
    -- y solo actualiza el precio del dolar.
        INSERT INTO dolar (idDolar, precio,hora) VALUES (1, pPrecioDolar,CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE precio=pPrecioDolar, hora=CURRENT_TIMESTAMP;
	SELECT 1 as codigo, 'Dolar Actualizado con exito' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `dolar_isUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `dolar_isUpdate`()
PROC: BEGIN

    -- Declaracion de variables

    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo, 'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    -- Control de parametros incorrectos
    
    START TRANSACTION;
	/*select SEC_TO_TIME(TIMESTAMPDIFF(SECOND, (SELECT hora FROM dolar),CURRENT_TIMESTAMP())) as ultimaActualizacion
     , case 
          when hora > date_sub(now(), interval 18 hour) 
             then 'si' 
             else 'no' 
          end as esActual
	from dolar;*/
    SELECT case 
          when DATE(hora) <> CURDATE()
             then 'no' 
             else 'si' 
          end as esActual
	from dolar;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso_dame`(id INT)
BEGIN
	/*
    Procedimiento que devuelve venta con sus lineas de ventas a partir de idVenta
    */
	SELECT i.*,li.*,p.nombre,date_format(fecha,'%d-%m-%Y %h:%i') fecha FROM ingresos i 
    INNER JOIN lineasingreso li ON li.idIngreso=i.idIngreso 
    INNER JOIN productos p ON p.idProducto = li.idProducto 
    WHERE i.idIngreso=id;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso_eliminar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso_eliminar`(iIdIngreso INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    IF NOT EXISTS (SELECT idIngreso FROM ingresos WHERE idIngreso = iIdIngreso) THEN
		SELECT 0 as codigo,'ingreso inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	ingresos
        SET		estado = 'B'
        WHERE	idIngreso = iIdIngreso;
        SELECT iIdIngreso as codigo, 'Ingreso eliminado con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso_listar`()
BEGIN
	SELECT 	*,date_format(fecha,'%d-%m-%Y %h:%i') fecha
    FROM	ingresos
    WHERE estado='A'
	ORDER BY idIngreso DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso_nuevo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso_nuevo`(vCadena VARCHAR(1000))
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
    DECLARE iIdIngreso INT;
    DECLARE liIdLineaIngreso INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (vCadena IS NULL OR vCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		SET iIdIngreso = 1 + (SELECT COALESCE(MAX(idIngreso),0) FROM ingresos);
		INSERT INTO ingresos VALUES (iIdIngreso,CURRENT_TIMESTAMP,'A');

        
        LAZO : LOOP
			-- Obtengo Linea de Venta
            SET aux = SUBSTRING_INDEX(vCadena,'*',1);
            -- Obtengo idProducto de Linea de Venta
            SET pIdProducto=  SUBSTRING_INDEX(aux,'|',1);
            -- Elimino idProducto de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo cantidad de Linea de Venta
            SET cantidad = SUBSTRING_INDEX(aux,'|',1);
			
            -- Control de parámetros incorrectos
            IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
				SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            IF (cantidad <= 0) THEN
				SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            
            -- Alta en lineasingreso
            SET liIdLineaIngreso = 1 + (SELECT COALESCE(MAX(idLineaIngreso),0) FROM lineasingreso);
            INSERT INTO lineasingreso VALUES (liIdLineaIngreso,iIdIngreso,pIdProducto,cantidad);
			-- Elimino Linea de Venta de pLineas
			SET aux = SUBSTRING_INDEX(vCadena,'*',1);    
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena) - CHAR_LENGTH(aux));
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena)-1);
            
            -- Condición de salida
			IF (vCadena = '') THEN
				LEAVE LAZO;
			END IF;
		END LOOP LAZO;
	SELECT iIdIngreso AS codigo, 'Ingreso creado con exito.' mensaje;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso_nuevo_para_compras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso_nuevo_para_compras`(IN vCadena VARCHAR(1000),OUT codigo INT)
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
    DECLARE iIdIngreso INT;
    DECLARE liIdLineaIngreso INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (vCadena IS NULL OR vCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		SET iIdIngreso = 1 + (SELECT COALESCE(MAX(idIngreso),0) FROM ingresos);
		INSERT INTO ingresos VALUES (iIdIngreso,CURRENT_TIMESTAMP,'A');

        
        LAZO : LOOP
			-- Obtengo Linea de Venta
            SET aux = SUBSTRING_INDEX(vCadena,'*',1);
            -- Obtengo idProducto de Linea de Venta
            SET pIdProducto=  SUBSTRING_INDEX(aux,'|',1);
            -- Elimino idProducto de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo cantidad de Linea de Venta
            SET cantidad = SUBSTRING_INDEX(aux,'|',1);
			
            -- Control de parámetros incorrectos
            IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
				SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            IF (cantidad <= 0) THEN
				SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            
            -- Alta en lineasingreso
            SET liIdLineaIngreso = 1 + (SELECT COALESCE(MAX(idLineaIngreso),0) FROM lineasingreso);
            INSERT INTO lineasingreso VALUES (liIdLineaIngreso,iIdIngreso,pIdProducto,cantidad);
			-- Elimino Linea de Venta de pLineas
			SET aux = SUBSTRING_INDEX(vCadena,'*',1);    
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena) - CHAR_LENGTH(aux));
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena)-1);
            
            -- Condición de salida
			IF (vCadena = '') THEN
				LEAVE LAZO;
			END IF;
		END LOOP LAZO;
	SELECT iIdIngreso into codigo;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `perdida_producto_nuevo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `perdida_producto_nuevo`(IN vCadena VARCHAR(1000),IN tipo CHAR,OUT codigo VARCHAR(5), OUT mensaje VARCHAR(100))
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
   
    DECLARE pIdPerdidaProducto INT;
    DECLARE lpIdLineaPerdidaProducto INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    DECLARE lugar VARCHAR(10);
    DECLARE fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP;    
    
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (vCadena IS NULL OR vCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos para la perdida.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		SET pIdPerdidaProducto = 1 + (SELECT COALESCE(MAX(idPerdidaProducto),0) FROM perdidasproducto);
		INSERT INTO perdidasproducto VALUES (pIdPerdidaProducto,CURRENT_TIMESTAMP,tipo);  
        LAZO : LOOP
			-- Obtengo Linea de Venta
            SET aux = SUBSTRING_INDEX(vCadena,'*',1);
            -- Obtengo idProducto de Linea de Venta
            SET pIdProducto=  SUBSTRING_INDEX(aux,'|',1);
            -- Elimino idProducto de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo cantidad de Linea de Venta
            SET cantidad = SUBSTRING_INDEX(aux,'|',1);
            -- Elimino cantidad de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo lugar de Linea de Venta
            SET lugar = SUBSTRING_INDEX(aux,'|',1);
			
            -- Control de parámetros incorrectos
            IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
				SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            IF (cantidad <= 0) THEN
				SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            
            CALL producto_dame_cantidad(pIdProducto,@stockDepositoOut,@stockLocalOut);
            
			CASE lugar
				WHEN 'deposito' THEN 
					IF (@stockDepositoOut < cantidad) THEN
						SELECT 0 as codigo, 'No hay Stock suficiente en Deposito.' mensaje;
						ROLLBACK;
						LEAVE PROC;
					END IF;
				WHEN 'local' THEN
					IF (@stockLocalOut < cantidad) THEN
						SELECT 0 as codigo, 'No hay Stock suficiente en Local.' mensaje;
						ROLLBACK;
						LEAVE PROC;
					END IF;
			END CASE;
            
            
            -- Alta en LineasVenta
            SET lpIdLineaPerdidaProducto = 1 + (SELECT COALESCE(MAX(idLineaPerdidaProducto),0) FROM lineasperdidaproducto);
            INSERT INTO lineasperdidaproducto VALUES (lpIdLineaPerdidaProducto,pIdPerdidaProducto,pIdProducto,cantidad,lugar);
			
            -- Elimino Linea de Venta de pLineas
			SET aux = SUBSTRING_INDEX(vCadena,'*',1);    
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena) - CHAR_LENGTH(aux));
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena)-1);
            
            -- Condición de salida
			IF (vCadena = '') THEN
				LEAVE LAZO;
			END IF;
		END LOOP LAZO;
    
	SELECT pIdPerdidaProducto INTO codigo;
    SELECT 'Perdida creada con exito.' INTO mensaje;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_alta`(pIdProveedor INT, pIdDeposito INT, pNombre VARCHAR(45), pPrecio DECIMAL(10,2),pCotizacion VARCHAR(10),pGanancia DECIMAL(10,2))
PROC: BEGIN

	DECLARE pIdProducto INT;

	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
	-- Control de parametros vacios
    IF (pNombre IS NULL OR pNombre = '') THEN
		SELECT 0 as codigo,'Debe ingresar un nombre.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pIdProveedor IS NULL OR pIdProveedor = 0 ) THEN
		SELECT 0 as codigo,'Debe ingresar un proveedor.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pIdDeposito IS NULL OR pIdDeposito = 0 ) THEN
		SELECT 0 as codigo,'Debe ingresar un Deposito.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pPrecio IS NULL OR pPrecio <= 0 ) THEN
		SELECT 0 as codigo,'Debe ingresar un precio mayor que 0.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pCotizacion IS NULL OR pCotizacion = '') THEN
		SELECT 0 as codigo,'Debe ingresar una cotizacion.' mensaje;
        LEAVE PROC;
	END IF;
	IF (pGanancia IS NULL OR pGanancia <= 0 ) THEN
		SELECT 0 as codigo,'Debe ingresar una ganancia positiva.' mensaje;
        LEAVE PROC;
	END IF;
    
    -- Control de parametros incorrectos
	IF EXISTS (SELECT nombre FROM productos WHERE nombre = pNombre AND estado='A') THEN
		SELECT 0 as codigo, 'El producto ya existe' mensaje;
        LEAVE PROC;
	END IF;
    
    
	START TRANSACTION;
		SET pIdProducto = 1 + (SELECT COALESCE(MAX(idProducto),0) FROM productos);
		INSERT INTO productos VALUES (pIdProducto,pIdProveedor,pIdDeposito,pNombre,pPrecio,pCotizacion,pGanancia,'A');
		SELECT pIdProducto AS codigo, 'Producto creado con exito (MYSQL).' mensaje;
	COMMIT;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_baja`(pIdProducto INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    IF NOT EXISTS (SELECT idProducto FROM productos WHERE idProducto = pIdProducto) THEN
		SELECT 0 as codigo,'Producto inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    IF (SELECT estado FROM productos WHERE idProducto = pIdProducto) = 'B' THEN
		SELECT 0 as codigo, 'El producto ya se encuentra dado de baja.' mensaje;
		LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	productos
        SET		estado = 'B'
        WHERE	idProducto = pIdProducto;
        SELECT pIdProducto as codigo, 'Producto dado de baja con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_buscar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_buscar`(pCadena VARCHAR(50))
BEGIN
	SELECT 	*
    FROM	productos
    WHERE	nombre LIKE CONCAT('%',pCadena,'%') AND estado='A'
            -- 2,3 hace referencia a ordenar primero por la columna 2 (apellido), y luego por la columna 3 (nombre)
	ORDER BY nombre;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_dame`(id INT)
PROC: BEGIN
	
    DECLARE pPrecioDolar DECIMAL(10,2);
    SET pPrecioDolar = (SELECT precio FROM dolar);
    
    IF NOT EXISTS (SELECT idProducto FROM productos WHERE idProducto = id) THEN
		SELECT 0 as codigo,'Producto inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;

	/*Cuando se cierra la conexion, automaticamente se borran
    todas las tablas temporarias, pero por buenas costumbre, o 
    en el caso de que se acceseda varias veces en la misma 
    sesion se borra si existe la tabla temporaria*/
    
		/*SELECT * FROM tmp_compras;*/
	DROP TEMPORARY TABLE IF EXISTS tmp_compras;
    CREATE TEMPORARY TABLE tmp_compras (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Compras 
						FROM lineascompra AS lc
                        INNER JOIN compras AS c ON lc.idCompra=c.idCompra
                        WHERE c.estado='A'
                        GROUP BY idProducto;
  
    /*SELECT * FROM tmp_ventas;*/
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas;
    CREATE TEMPORARY TABLE tmp_ventas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ventas 
						FROM lineasventa AS lv
                        INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
                        WHERE v.estadoReal='A'
                        GROUP BY idProducto;
                        
    /*SELECT * FROM tmp_ingresos;*/
    DROP TEMPORARY TABLE IF EXISTS tmp_ingesos_local;
    CREATE TEMPORARY TABLE tmp_ingesos_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ingresos 
					FROM lineasingreso AS li 
                    INNER JOIN ingresos AS i ON li.idIngreso=i.idIngreso 
                    WHERE i.estado='A' GROUP BY idProducto;
                    
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_deposito;
    CREATE TEMPORARY TABLE tmp_ventas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasDeposito 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='deposito' AND v.estadoReal='A' 
                    GROUP BY idProducto;
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_local;
    CREATE TEMPORARY TABLE tmp_ventas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasLocal 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='local' AND v.estadoReal='A' 
                    GROUP BY idProducto;
                    
	-- PERDIDAS TOTAL
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas;
    CREATE TEMPORARY TABLE tmp_perdidas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Perdidas 
						FROM lineasperdidaproducto AS lpp
                        INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
                        GROUP BY idProducto;
                    
    -- PERDIDAS DEPOSITO                
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_deposito;
    CREATE TEMPORARY TABLE tmp_perdidas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasDeposito 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='deposito'
                    GROUP BY idProducto;
                    
	-- PERDIDAS DEPOSITO 
    DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_local;
    CREATE TEMPORARY TABLE tmp_perdidas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasLocal 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='local'
                    GROUP BY idProducto;
                    
    -- TRANSFORMACIONES
    DROP TEMPORARY TABLE IF EXISTS tmp_transformacion;
    CREATE TEMPORARY TABLE tmp_transformacion (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Transformacion 
					FROM lineastransformacion AS lt 
                    INNER JOIN transformacion AS t ON lt.idTransformacion=t.idTransformacion 
                    GROUP BY idProducto;
	
    SELECT p.idProducto,p.nombre,p.precio,p.idProveedor,p.idDeposito,p.ganancia,
    IF(p.cotizacion = 'Pesos',ROUND(p.precio*1.21*(1+p.ganancia/100),2),ROUND(p.precio*1.21*pPrecioDolar*(1+p.ganancia/100),2)) AS precioVenta,
    p.cotizacion,
    COALESCE(Compras,0) + COALESCE(Transformacion,0) - COALESCE(Ventas,0) - COALESCE(Perdidas,0) AS stock,
	COALESCE(Compras,0) - COALESCE(ventasDeposito,0) - COALESCE(Ingresos,0) - COALESCE(perdidasDeposito,0) AS stockDeposito,
    COALESCE(Ingresos,0) + COALESCE(Transformacion,0) - COALESCE(ventasLocal,0) - COALESCE(perdidasLocal,0) AS stockLocal
    FROM productos p 
    LEFT JOIN tmp_compras c ON p.idProducto = c.idProducto 
    LEFT JOIN tmp_ventas v ON p.idProducto = v.idProducto 
    LEFT JOIN tmp_ingesos_local i ON p.idProducto = i.idProducto
    LEFT JOIN tmp_ventas_deposito vd ON p.idProducto = vd.idProducto
    LEFT JOIN tmp_ventas_local vl ON p.idProducto = vl.idProducto 
	LEFT JOIN tmp_perdidas pp ON p.idProducto = pp.idProducto 
    LEFT JOIN tmp_perdidas_deposito pd ON p.idProducto = pd.idProducto
    LEFT JOIN tmp_perdidas_local pl ON p.idProducto = pl.idProducto
    LEFT JOIN tmp_transformacion t ON p.idProducto = t.idProducto
    WHERE p.estado = 'A' AND p.idProducto = id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_dame_cantidad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_dame_cantidad`(IN id INT,OUT stockDepositoOut INT,OUT stockLocalOut INT)
PROC: BEGIN
    DECLARE pPrecioDolar DECIMAL(10,2);
    SET pPrecioDolar = (SELECT precio FROM dolar);
    
    IF NOT EXISTS (SELECT idProducto FROM productos WHERE idProducto = id) THEN
		SELECT 0 as codigo,'Producto inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;

	/*Cuando se cierra la conexion, automaticamente se borran
    todas las tablas temporarias, pero por buenas costumbre, o 
    en el caso de que se acceseda varias veces en la misma 
    sesion se borra si existe la tabla temporaria*/
    
		/*SELECT * FROM tmp_compras;*/
	DROP TEMPORARY TABLE IF EXISTS tmp_compras;
    CREATE TEMPORARY TABLE tmp_compras (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Compras 
						FROM lineascompra AS lc
                        INNER JOIN compras AS c ON lc.idCompra=c.idCompra
                        WHERE c.estado='A'
                        GROUP BY idProducto;
  
    /*SELECT * FROM tmp_ventas;*/
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas;
    CREATE TEMPORARY TABLE tmp_ventas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ventas 
						FROM lineasventa AS lv
                        INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
                        WHERE v.estadoReal='A'
                        GROUP BY idProducto;
                        
    /*SELECT * FROM tmp_ingresos;*/
    DROP TEMPORARY TABLE IF EXISTS tmp_ingesos_local;
    CREATE TEMPORARY TABLE tmp_ingesos_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ingresos 
					FROM lineasingreso AS li 
                    INNER JOIN ingresos AS i ON li.idIngreso=i.idIngreso 
                    WHERE i.estado='A' GROUP BY idProducto;
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_deposito;
    CREATE TEMPORARY TABLE tmp_ventas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasDeposito 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='deposito' AND v.estadoReal='A' 
                    GROUP BY idProducto;
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_local;
    CREATE TEMPORARY TABLE tmp_ventas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasLocal 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='local' AND v.estadoReal='A' 
                    GROUP BY idProducto;
                    
                                        
	-- PERDIDAS TOTAL
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas;
    CREATE TEMPORARY TABLE tmp_perdidas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Perdidas 
						FROM lineasperdidaproducto AS lpp
                        INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
                        GROUP BY idProducto;
                    
    -- PERDIDAS DEPOSITO                
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_deposito;
    CREATE TEMPORARY TABLE tmp_perdidas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasDeposito 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='deposito'
                    GROUP BY idProducto;
                    
	-- PERDIDAS DEPOSITO 
    DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_local;
    CREATE TEMPORARY TABLE tmp_perdidas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasLocal 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='local'
                    GROUP BY idProducto;
                    
     -- TRANSFORMACIONES
    DROP TEMPORARY TABLE IF EXISTS tmp_transformacion;
    CREATE TEMPORARY TABLE tmp_transformacion (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Transformacion 
					FROM lineastransformacion AS lt 
                    INNER JOIN transformacion AS t ON lt.idTransformacion=t.idTransformacion 
                    GROUP BY idProducto;
	
	
    SELECT 
	COALESCE(Compras,0) - COALESCE(ventasDeposito,0) - COALESCE(Ingresos,0) - COALESCE(perdidasDeposito,0) AS stockDeposito
    FROM productos p 
    LEFT JOIN tmp_compras c ON p.idProducto = c.idProducto 
    LEFT JOIN tmp_ventas v ON p.idProducto = v.idProducto 
    LEFT JOIN tmp_ingesos_local i ON p.idProducto = i.idProducto
    LEFT JOIN tmp_ventas_deposito vd ON p.idProducto = vd.idProducto
    LEFT JOIN tmp_ventas_local vl ON p.idProducto = vl.idProducto 
	LEFT JOIN tmp_perdidas pp ON p.idProducto = pp.idProducto 
    LEFT JOIN tmp_perdidas_deposito pd ON p.idProducto = pd.idProducto
    LEFT JOIN tmp_perdidas_local pl ON p.idProducto = pl.idProducto
	LEFT JOIN tmp_transformacion t ON p.idProducto = t.idProducto
    WHERE p.estado = 'A' AND p.idProducto = id into stockDepositoOut;
    
    SELECT 
    COALESCE(Ingresos,0) + COALESCE(Transformacion,0) - COALESCE(ventasLocal,0) - COALESCE(perdidasLocal,0) AS stockLocal
    FROM productos p 
    LEFT JOIN tmp_compras c ON p.idProducto = c.idProducto 
    LEFT JOIN tmp_ventas v ON p.idProducto = v.idProducto 
    LEFT JOIN tmp_ingesos_local i ON p.idProducto = i.idProducto
    LEFT JOIN tmp_ventas_deposito vd ON p.idProducto = vd.idProducto
    LEFT JOIN tmp_ventas_local vl ON p.idProducto = vl.idProducto 
	LEFT JOIN tmp_perdidas pp ON p.idProducto = pp.idProducto 
    LEFT JOIN tmp_perdidas_deposito pd ON p.idProducto = pd.idProducto
    LEFT JOIN tmp_perdidas_local pl ON p.idProducto = pl.idProducto
	LEFT JOIN tmp_transformacion t ON p.idProducto = t.idProducto
    WHERE p.estado = 'A' AND p.idProducto = id into stockLocalOut;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_listado_completo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_listado_completo`(pCadena VARCHAR(50))
PROC: BEGIN
	/*Cuando se cierra la conexion, automaticamente se borran
    todas las tablas temporarias, pero por buenas costumbre, o 
    en el caso de que se acceseda varias veces en la misma 
    sesion se borra si existe la tabla temporaria*/
	DECLARE pPrecioDolar DECIMAL(10,2);
    SET pPrecioDolar = (SELECT precio FROM dolar);
    
	/*SELECT * FROM tmp_compras;*/
	DROP TEMPORARY TABLE IF EXISTS tmp_compras;
    CREATE TEMPORARY TABLE tmp_compras (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Compras 
						FROM lineascompra AS lc
                        INNER JOIN compras AS c ON lc.idCompra=c.idCompra
                        WHERE c.estado='A'
                        GROUP BY idProducto;
  
    /*SELECT * FROM tmp_ventas;*/
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas;
    CREATE TEMPORARY TABLE tmp_ventas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ventas 
						FROM lineasventa AS lv
                        INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
                        WHERE v.estadoReal='A'
                        GROUP BY idProducto;
   
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ingesos_local;
    CREATE TEMPORARY TABLE tmp_ingesos_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Ingresos 
					FROM lineasingreso AS li 
                    INNER JOIN ingresos AS i ON li.idIngreso=i.idIngreso 
                    WHERE i.estado='A' GROUP BY idProducto;
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_deposito;
    CREATE TEMPORARY TABLE tmp_ventas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasDeposito 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='deposito' AND v.estadoReal='A' 
                    GROUP BY idProducto;
    
    DROP TEMPORARY TABLE IF EXISTS tmp_ventas_local;
    CREATE TEMPORARY TABLE tmp_ventas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) ventasLocal 
					FROM lineasventa AS lv
					INNER JOIN ventas AS v ON lv.idVenta=v.idVenta
					WHERE lv.lugar='local' AND v.estadoReal='A' 
                    GROUP BY idProducto;
                    
	-- PERDIDAS TOTAL
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas;
    CREATE TEMPORARY TABLE tmp_perdidas (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Perdidas 
						FROM lineasperdidaproducto AS lpp
                        INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
                        GROUP BY idProducto;
                    
    -- PERDIDAS DEPOSITO                
	DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_deposito;
    CREATE TEMPORARY TABLE tmp_perdidas_deposito (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasDeposito 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='deposito'
                    GROUP BY idProducto;
                    
	-- PERDIDAS DEPOSITO 
    DROP TEMPORARY TABLE IF EXISTS tmp_perdidas_local;
    CREATE TEMPORARY TABLE tmp_perdidas_local (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) perdidasLocal 
					FROM lineasperdidaproducto AS lpp
					INNER JOIN perdidasproducto AS pp ON lpp.idPerdidaProducto=pp.idPerdidaProducto
					WHERE lpp.lugar='local'
                    GROUP BY idProducto;
                    
	-- TRANSFORMACIONES
    DROP TEMPORARY TABLE IF EXISTS tmp_transformacion;
    CREATE TEMPORARY TABLE tmp_transformacion (idProducto INTEGER,INDEX (idProducto))
	ENGINE = MEMORY AS SELECT idProducto,sum(cantidad) Transformacion 
					FROM lineastransformacion AS lt 
                    INNER JOIN transformacion AS t ON lt.idTransformacion=t.idTransformacion 
                    GROUP BY idProducto;
	
	
    SELECT p.idProducto,p.nombre,p.precio,p.idProveedor,p.idDeposito,p.ganancia,
    IF(p.cotizacion = 'Pesos',ROUND(p.precio*1.21*(1+p.ganancia/100),2),ROUND(p.precio*1.21*pPrecioDolar*(1+p.ganancia/100),2)) AS precioVenta,
    p.cotizacion,
    COALESCE(Compras,0) + COALESCE(Transformacion,0) - COALESCE(Ventas,0) - COALESCE(Perdidas,0) AS stock,
	COALESCE(Compras,0) - COALESCE(ventasDeposito,0) - COALESCE(Ingresos,0) - COALESCE(perdidasDeposito,0) AS stockDeposito,
    COALESCE(Ingresos,0) + COALESCE(Transformacion,0) - COALESCE(ventasLocal,0) - COALESCE(perdidasLocal,0) AS stockLocal
    FROM productos p 
    LEFT JOIN tmp_compras c ON p.idProducto = c.idProducto 
    LEFT JOIN tmp_ventas v ON p.idProducto = v.idProducto 
    LEFT JOIN tmp_ingesos_local i ON p.idProducto = i.idProducto
    LEFT JOIN tmp_ventas_deposito vd ON p.idProducto = vd.idProducto
    LEFT JOIN tmp_ventas_local vl ON p.idProducto = vl.idProducto 
	LEFT JOIN tmp_perdidas pp ON p.idProducto = pp.idProducto 
    LEFT JOIN tmp_perdidas_deposito pd ON p.idProducto = pd.idProducto
    LEFT JOIN tmp_perdidas_local pl ON p.idProducto = pl.idProducto 
	LEFT JOIN tmp_transformacion t ON p.idProducto = t.idProducto
    WHERE p.estado = 'A' AND nombre LIKE CONCAT('%',pCadena,'%')
    ORDER BY p.nombre;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `producto_modificar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `producto_modificar`(pIdProducto INT,pIdProveedor INT, pNombre VARCHAR(45), pPrecio DECIMAL(10,2),pCotizacion VARCHAR(10),pGanancia DECIMAL(10,2))
PROC: BEGIN
	-- nombre no se usa, pero para no tocar todo el codigo de laravel, lo traemos hacia al SP,
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
	-- Control de parametros vacios
    IF NOT EXISTS (SELECT idProducto FROM productos WHERE idProducto = pIdProducto)	THEN
		SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
		LEAVE PROC;
	END IF;
    IF (pIdProveedor IS NULL OR pIdProveedor = 0 ) THEN
		SELECT 0 as codigo, 'Debe ingresar un proveedor.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pPrecio IS NULL OR pPrecio <= 0 ) THEN
		SELECT 0 as codigo, 'Debe ingresar un precio mayor que 0.' mensaje;
        LEAVE PROC;
	END IF;
    IF (pCotizacion IS NULL OR pCotizacion = '') THEN
		SELECT 0 as codigo, 'Debe ingresar una cotizacion.' mensaje;
        LEAVE PROC;
	END IF;
	IF (pGanancia IS NULL OR pGanancia <= 0 ) THEN
		SELECT 0 as codigo, 'Debe ingresar una ganancia positiva.' mensaje;
        LEAVE PROC;
	END IF;
    
	START TRANSACTION;
		UPDATE productos SET idProveedor=pIdProveedor, precio=pPrecio, cotizacion=pCotizacion, ganancia=pGanancia
        WHERE idProducto=pIdProducto;
		SELECT pIdProducto as codigo, 'Producto actualizado con exito.' mensaje;
	COMMIT;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proveedor_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_alta`(pRazonSocial VARCHAR(45),pDireccion VARCHAR(45),pTelefono VARCHAR(45))
PROC: BEGIN

    -- Declaracion de variables
    DECLARE pIdProveedor INT;
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
	-- Control de parametros vacios
    IF (pRazonSocial IS NULL OR pRazonSocial = '') THEN
		SELECT 0 as codigo,'Debe ingresar un nombre.' mensaje;
        LEAVE PROC;
	END IF;
    IF EXISTS (SELECT pRazonSocial FROM proveedores WHERE razonSocial = pRazonSocial AND estado='A') THEN
		SELECT 0 as codigo, 'El proveedor ya existe' mensaje;
        LEAVE PROC;
	END IF;
    -- Control de parametros incorrectos
    
    START TRANSACTION;
		SET pIdProveedor = 1 + (SELECT COALESCE(MAX(idProveedor),0) FROM proveedores);
        INSERT INTO proveedores VALUES (pIdProveedor,pRazonSocial,pDireccion,pTelefono,'A');
	SELECT pIdProveedor AS codigo, 'Proveedor creado con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proveedor_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_baja`(pIdProveedor INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un Proveedor.
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    IF NOT EXISTS (SELECT idProveedor FROM proveedores WHERE idProveedor = pIdProveedor) THEN
		SELECT 0 as codigo,'Proveedor inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    IF (SELECT estado FROM proveedores WHERE idProveedor = pIdProveedor) = 'B' THEN
		SELECT 0 as codigo, 'El Proveedor ya se encuentra dado de baja.' mensaje;
		LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	proveedores
        SET		estado = 'B'
        WHERE	idProveedor = pIdProveedor;
        SELECT pIdProveedor as codigo, 'Proveedor dado de baja con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proveedor_buscar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_buscar`(cadena VARCHAR(50))
BEGIN
	SELECT 	*
    FROM	proveedores
    WHERE	razonSocial LIKE CONCAT('%',cadena,'%') AND estado = 'A'
	ORDER BY razonSocial;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proveedor_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_dame`(id INT)
BEGIN
	/*
    Procedimiento que devuelve productos a partir de una cadena. Para buscar todo, cadena vacia.
    */
    SELECT	*
    FROM	proveedores
    WHERE   idProveedor=id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proveedor_modificar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proveedor_modificar`(pIdProveedor INT, pRazonSocial VARCHAR(45), pDireccion VARCHAR(45), pTelefono VARCHAR(45))
PROC: BEGIN
	
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
	-- Control de parametros vacios
    IF NOT EXISTS (SELECT idProveedor FROM proveedores WHERE idProveedor = pIdProveedor)	THEN
		SELECT 0 as codigo, 'Error. Proveedor inexistente.' mensaje;
		LEAVE PROC;
	END IF;
    
	START TRANSACTION;
		UPDATE proveedores SET direccion=pDireccion, telefono=pTelefono
        WHERE idProveedor=pIdProveedor;
		SELECT pIdProveedor as codigo, 'Proveedor actualizado con exito.' mensaje;
	COMMIT;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `transformacion_producto_nueva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `transformacion_producto_nueva`(pCadena VARCHAR(1000),tCadena VARCHAR(1000))
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
    DECLARE tIdTransformacion INT;
    DECLARE ltIdLineaTransformacion INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    -- Manejo de errores    
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (tCadena IS NULL OR tCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos.' mensaje;
        LEAVE PROC;
	END IF;
	IF (pCadena IS NULL OR pCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		CALL perdida_producto_nuevo(pCadena,'t',@codigo,@mensaje);
			SET tIdTransformacion = 1 + (SELECT COALESCE(MAX(idTransformacion),0) FROM transformacion);
			INSERT INTO transformacion VALUES (tIdTransformacion,CURRENT_TIMESTAMP);

			
			LAZO : LOOP
				-- Obtengo Linea de Venta
				SET aux = SUBSTRING_INDEX(tCadena,'*',1);
				-- Obtengo idProducto de Linea de Venta
				SET pIdProducto=  SUBSTRING_INDEX(aux,'|',1);
				-- Elimino idProducto de Linea de Venta
				SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
				-- Obtengo cantidad de Linea de Venta
				SET cantidad = SUBSTRING_INDEX(aux,'|',1);
				
				-- Control de parámetros incorrectos
				IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
					SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
					ROLLBACK;
					LEAVE PROC;
				END IF;
				IF (cantidad <= 0) THEN
					SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
					ROLLBACK;
					LEAVE PROC;
				END IF;
				
				-- Alta en lineasingreso
				SET ltIdLineaTransformacion = 1 + (SELECT COALESCE(MAX(idLineaTransformacion),0) FROM lineastransformacion);
				INSERT INTO lineastransformacion VALUES (ltIdLineaTransformacion,tIdTransformacion,pIdProducto,cantidad);
				-- Elimino Linea de Venta de pLineas
				SET aux = SUBSTRING_INDEX(tCadena,'*',1);    
				SET tCadena = RIGHT(tCadena,CHAR_LENGTH(tCadena) - CHAR_LENGTH(aux));
				SET tCadena = RIGHT(tCadena,CHAR_LENGTH(tCadena)-1);
				
				-- Condición de salida
				IF (tCadena = '') THEN
					LEAVE LAZO;
				END IF;
			END LOOP LAZO;
            SELECT tIdTransformacion AS codigo, 'Transformacion a producto suelto creada con exito.' mensaje;

    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `venta_cobrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_cobrar`(vIdVenta INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
        
    IF NOT EXISTS (SELECT idVenta FROM ventas WHERE idVenta = vIdVenta) THEN
		SELECT 0 as codigo,'Venta inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;
    
    START TRANSACTION;
		UPDATE 	ventas
        SET		estado = 'P'
        WHERE	idVenta = vIdVenta;
        SELECT vIdVenta as codigo, 'Venta cobrada con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `venta_dame` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_dame`(id INT)
BEGIN
	/*
    Procedimiento que devuelve venta con sus lineas de ventas a partir de idVenta
    */
	SELECT v.*,lv.*,p.nombre,p.idDeposito,date_format(fecha,'%d-%m-%Y %h:%i') fecha FROM ventas v 
    INNER JOIN lineasventa lv ON lv.idVenta=v.idVenta 
    INNER JOIN productos p ON p.idProducto = lv.idProducto 
    WHERE v.idVenta=id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `venta_eliminar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_eliminar`(vIdVenta INT)
PROC: BEGIN
	/*
    Procedimiento que da de baja un producto.
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		BEGIN
			SELECT 0 as codigo,'Error en la transaccion.' mensaje;
            SHOW ERRORS;
            ROLLBACK;
        END;
        
    IF NOT EXISTS (SELECT idVenta FROM ventas WHERE idVenta = vIdVenta) THEN
		SELECT 0 as codigo,'Venta inexistente en el sistema.' mensaje;
        LEAVE PROC;
	END IF;

	START TRANSACTION;
		UPDATE 	ventas
        SET		estadoReal = 'B'
        WHERE	idVenta = vIdVenta;
        SELECT vIdVenta as codigo, 'Venta eliminada con exito.' mensaje;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `venta_listar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_listar`()
BEGIN
	SELECT 	*, date_format(fecha,'%d-%m-%Y %h:%i') fecha
    FROM	ventas
    WHERE estadoReal='A'
	ORDER BY idVenta DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `venta_nueva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_nueva`(vMonto DECIMAL(10,2), vCadena VARCHAR(1000))
PROC: BEGIN
	/*
    Procedimiento que permite dar de alta una venta a partir de sus Lineas de Venta, contenidas en pLineas.
    Formato de pLineas: idItem|cantidad|precio*
    El operador '|' se utiliza para separar los atributos de un Item.
    El operador '*' se utiliza para separar las Lineas de Venta.
    Devuelve el 'OK' mas el id de la nueva venta en Mensaje.
    */
    -- Declaración de variabless
    DECLARE totalSP DECIMAL(10,2);/*calculamos el total aqui en el SP*/
    DECLARE vIdVenta INT;
    DECLARE lvIdLineaVenta INT;
    DECLARE aux VARCHAR(50);
    DECLARE pIdProducto INT;
    DECLARE cantidad INT;
    DECLARE lugar VARCHAR(10);
    DECLARE pPrecioUnitario DECIMAL(10,2);
    DECLARE fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
    
    DECLARE precioDolar DECIMAL(10,2);
    
    
    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SHOW ERRORS;
			SELECT 0 as codigo, 'Error en la transacción.' mensaje;
            ROLLBACK;
		END;
	-- Control de parámetros vacíos
    IF (vCadena IS NULL OR vCadena = '') THEN
		SELECT 0 as codigo, 'Debe ingresar productos a la venta.' mensaje;
        LEAVE PROC;
	END IF;
    START TRANSACTION;
		SET vIdVenta = 1 + (SELECT COALESCE(MAX(idVenta),0) FROM ventas);
		INSERT INTO ventas VALUES (vIdVenta,fecha,vMonto,'I','A');
	SET precioDolar = (SELECT precio FROM dolar);
    SET totalSP=0;    
        LAZO : LOOP
			-- Obtengo Linea de Venta
            SET aux = SUBSTRING_INDEX(vCadena,'*',1);
            -- Obtengo idProducto de Linea de Venta
            SET pIdProducto=  SUBSTRING_INDEX(aux,'|',1);
            -- Elimino idProducto de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo cantidad de Linea de Venta
            SET cantidad = SUBSTRING_INDEX(aux,'|',1);
            -- Elimino cantidad de Linea de Venta
            SET aux = RIGHT(aux,CHAR_LENGTH(aux)-CHAR_LENGTH(SUBSTRING_INDEX(aux,'|',1))-1);
            -- Obtengo lugar de Linea de Venta
            SET lugar = SUBSTRING_INDEX(aux,'|',1);
			
            -- Control de parámetros incorrectos
            IF NOT EXISTS (SELECT pIdProducto FROM productos WHERE idProducto = pIdProducto)	THEN
				SELECT 0 as codigo, 'Error. Producto inexistente.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            IF (cantidad <= 0) THEN
				SELECT 0 as codigo, 'La cantidad no puede ser menor o igual que cero.' mensaje;
                ROLLBACK;
                LEAVE PROC;
			END IF;
            
            CALL producto_dame_cantidad(pIdProducto,@stockDepositoOut,@stockLocalOut);
            
			CASE lugar
				WHEN 'deposito' THEN 
					IF (@stockDepositoOut < cantidad) THEN
						SELECT 0 as codigo, 'No hay Stock suficiente en Deposito.' mensaje;
						ROLLBACK;
						LEAVE PROC;
					END IF;
				WHEN 'local' THEN
					IF (@stockLocalOut < cantidad) THEN
						SELECT 0 as codigo, 'No hay Stock suficiente en Local.' mensaje;
						ROLLBACK;
						LEAVE PROC;
					END IF;
			END CASE;
            
            
            -- Alta en LineasVenta
            SET lvIdLineaVenta = 1 + (SELECT COALESCE(MAX(idLineaVenta),0) FROM lineasventa);
            SET pPrecioUnitario = (SELECT IF(p.cotizacion = 'Pesos',ROUND(p.precio*1.21*(1+p.ganancia/100),2),ROUND(p.precio*1.21*precioDolar*(1+p.ganancia/100),2)) AS PrecioVenta FROM productos p WHERE idProducto=pIdProducto);
            INSERT INTO lineasventa VALUES (lvIdLineaVenta,vIdVenta,pIdProducto,cantidad,pPrecioUnitario,lugar);
			
            -- calculamos total SP
            SET totalSP = totalSP+pPrecioUnitario*cantidad;
            
            -- Elimino Linea de Venta de pLineas
			SET aux = SUBSTRING_INDEX(vCadena,'*',1);    
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena) - CHAR_LENGTH(aux));
			SET vCadena = RIGHT(vCadena,CHAR_LENGTH(vCadena)-1);
            
            -- Condición de salida
			IF (vCadena = '') THEN
				LEAVE LAZO;
			END IF;
		END LOOP LAZO;
    
    IF (vMonto <> totalSP) THEN
		SELECT 0 as codigo, 'Error en el calculo de TOTAL' mensaje;
        LEAVE PROC;
	END IF;
    
	SELECT vIdVenta AS codigo, totalSP,fecha, 'Venta creada con exito.' mensaje;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `cantidadProductosVendidosMes`
--

/*!50001 DROP VIEW IF EXISTS `cantidadProductosVendidosMes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cantidadProductosVendidosMes` AS select sum(`lv`.`cantidad`) AS `Cantidad`,concat(ucase(left(monthname(`v`.`fecha`),1)),substr(monthname(`v`.`fecha`),2)) AS `Mes`,year(`v`.`fecha`) AS `Año` from (`lineasventa` `lv` join `ventas` `v` on((`lv`.`idVenta` = `v`.`idVenta`))) where ((year(`v`.`fecha`) <= year(curdate())) and (month(`v`.`fecha`) <= month(curdate())) and (`v`.`estadoReal` = 'A')) group by date_format(`v`.`fecha`,'%Y-%m') order by cast(`v`.`fecha` as date) limit 6 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `productosMasVendidos`
--

/*!50001 DROP VIEW IF EXISTS `productosMasVendidos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `productosMasVendidos` AS select `p`.`nombre` AS `nombre`,sum(`lv`.`cantidad`) AS `cantidad` from (`productos` `p` join `lineasventa` `lv` on((`p`.`idProducto` = `lv`.`idProducto`))) group by `p`.`nombre` order by `cantidad` desc limit 5 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-16 16:28:10
