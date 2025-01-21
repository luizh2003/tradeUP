CREATE DATABASE  IF NOT EXISTS `tradeup` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tradeup`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tradeup
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ceps`
--

DROP TABLE IF EXISTS `ceps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ceps` (
  `id_cep` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `unidade` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `uf` char(2) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `regiao` varchar(255) DEFAULT NULL,
  `ibge` varchar(7) NOT NULL,
  `gia` varchar(4) DEFAULT NULL,
  `ddd` varchar(2) DEFAULT NULL,
  `siafi` varchar(4) DEFAULT NULL,
  `valido` enum('s','n') DEFAULT 's',
  PRIMARY KEY (`id_cep`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ceps`
--

LOCK TABLES `ceps` WRITE;
/*!40000 ALTER TABLE `ceps` DISABLE KEYS */;
INSERT INTO `ceps` VALUES (1,'06703-140','Rua Arlete','','','Jardim Dinorah','Cotia','SP','São Paulo','Sudeste','3513009','2781','11','6361','s'),(2,'06700-513','Rua Esplanada','','','Jardim Araruama','Cotia','SP','São Paulo','Sudeste','3513009','2781','11','6361','s'),(3,'02170-984','Avenida Morvan Dias de Figueiredo','5845','CEE Vila Matilde','Vila Maria','São Paulo','SP','São Paulo','Sudeste','3550308','1004','11','7107','s');
/*!40000 ALTER TABLE `ceps` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-21 18:20:26
