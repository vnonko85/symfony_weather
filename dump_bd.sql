-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: spectral
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Sumy'),(2,'Kiev');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191104222751','2019-11-04 22:41:02'),('20191104224118','2019-11-04 22:49:57');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weather_info`
--

DROP TABLE IF EXISTS `weather_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weather_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `temp` double NOT NULL,
  `humidity` int(11) NOT NULL,
  `pressure` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_550AAB2E8BAC62AF` (`city_id`),
  CONSTRAINT `FK_550AAB2E8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weather_info`
--

LOCK TABLES `weather_info` WRITE;
/*!40000 ALTER TABLE `weather_info` DISABLE KEYS */;
INSERT INTO `weather_info` VALUES (1,2,1572922800,13.75,77,998),(2,2,1572933600,13.34,71,1000),(3,2,1572944400,14.55,56,1003),(4,2,1572955200,16.28,46,1004),(5,2,1572966000,14.67,51,1005),(6,2,1572976800,13.92,53,1006),(7,2,1572987600,13.88,54,1005),(8,2,1572998400,13.55,55,1004),(9,2,1573009200,12.9,62,1002),(10,2,1573020000,12.92,62,1002),(11,2,1573030800,16.45,51,1001),(12,2,1573041600,17.09,50,1000),(13,2,1573052400,16.57,53,1002),(14,2,1573063200,13.21,65,1006),(15,2,1573074000,11.33,71,1008),(16,2,1573084800,10.23,69,1010),(17,2,1573095600,9.98,68,1011),(18,2,1573106400,10.29,66,1012),(19,2,1573117200,12.28,54,1012),(20,2,1573128000,13.33,50,1012),(21,2,1573138800,12.2,58,1012),(22,2,1573149600,11.15,70,1013),(23,2,1573160400,10.25,78,1012),(24,2,1573171200,9.46,80,1012),(25,2,1573182000,8.89,85,1013),(26,2,1573192800,8.94,83,1014),(27,2,1573203600,10.08,77,1016),(28,2,1573214400,10.84,75,1016),(29,2,1573225200,10.07,79,1017),(30,2,1573236000,9.77,81,1018),(31,2,1573246800,9.65,84,1018),(32,2,1573257600,9.33,88,1017),(33,2,1573268400,10.47,88,1016),(34,2,1573279200,11.44,91,1016),(35,2,1573290000,13.72,87,1015),(36,2,1573300800,15.73,76,1014),(37,2,1573311600,15.02,75,1014),(38,2,1573322400,14.34,66,1014),(39,2,1573333200,13.55,73,1014),(40,2,1573344000,12.82,74,1013),(41,1,1572922800,12.85,76,1003),(42,1,1572933600,13.65,70,1003),(43,1,1572944400,13.02,89,1002),(44,1,1572955200,15.04,75,1003),(45,1,1572966000,12.49,74,1006),(46,1,1572976800,10.45,82,1008),(47,1,1572987600,9.96,81,1008),(48,1,1572998400,9.08,81,1008),(49,1,1573009200,9.44,76,1007),(50,1,1573020000,10.38,83,1007),(51,1,1573030800,13.75,74,1005),(52,1,1573041600,16.27,65,1004),(53,1,1573052400,15.68,71,1003),(54,1,1573063200,14.86,70,1005),(55,1,1573074000,12.23,79,1006),(56,1,1573084800,10.35,84,1009),(57,1,1573095600,9.53,89,1010),(58,1,1573106400,9.64,86,1012),(59,1,1573117200,11.28,70,1013),(60,1,1573128000,10.33,78,1013),(61,1,1573138800,9.78,83,1014),(62,1,1573149600,9.48,84,1014),(63,1,1573160400,9.35,86,1014),(64,1,1573171200,9.2,92,1013),(65,1,1573182000,9.43,94,1013),(66,1,1573192800,10.15,95,1013),(67,1,1573203600,10.02,92,1015),(68,1,1573214400,9.23,89,1016),(69,1,1573225200,7.9,93,1018),(70,1,1573236000,7.04,94,1019),(71,1,1573246800,7.78,94,1020),(72,1,1573257600,8.73,94,1020),(73,1,1573268400,9.1,92,1020),(74,1,1573279200,9.88,91,1021),(75,1,1573290000,11.04,87,1021),(76,1,1573300800,12.88,82,1020),(77,1,1573311600,11.1,90,1019),(78,1,1573322400,10.61,92,1019),(79,1,1573333200,9.99,88,1019),(80,1,1573344000,9.24,85,1018);
/*!40000 ALTER TABLE `weather_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-05  4:18:36