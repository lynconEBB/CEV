-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbvacinacao
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `tbpaciente`
--

DROP TABLE IF EXISTS `tPpaciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbPaciente` (
  `Email` varchar(100) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Bairro` varchar(40) NOT NULL,
  `Numero` varchar(60) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Senha` varchar(80) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `DataNascimento` date NOT NULL,
  `RG` varchar(30) NOT NULL,
  `Observacoes` varchar(150) NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpaciente`
--

LOCK TABLES `tbPaciente` WRITE;
/*!40000 ALTER TABLE `tbPaciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbPaciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvacina`
--

DROP TABLE IF EXISTS `tbVacina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbVacina` (
  `id` int(11) NOT NULL auto_increment,
  `Duracao` varchar(45) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `IdadeMinima` int(11) NOT NULL,
  `IdadeMaxima` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvacina`
--

LOCK TABLES `tbVacina` WRITE;
/*!40000 ALTER TABLE `tbVacina` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbVacina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvacinacao`
--

DROP TABLE IF EXISTS `tbVacinacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbVacinacao` (
  `id` int(11) NOT NULL auto_increment,
  `Data` date NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idVacina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbPaciente_tbVacinacao` (`idPaciente`),
  KEY `fk_tbVacina_tbVacinacao` (`idVacina`),
  CONSTRAINT `fk_tbPaciente_tbVacinacao` FOREIGN KEY (`idPaciente`) REFERENCES `tbPaciente` (`id`),
  CONSTRAINT `fk_tbVacina_tbVacinacao` FOREIGN KEY (`idVacina`) REFERENCES `tbVacina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvacinacao`
--

LOCK TABLES `tbVacinacao` WRITE;
/*!40000 ALTER TABLE `tbVacinacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbVacinacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-04 15:16:09
