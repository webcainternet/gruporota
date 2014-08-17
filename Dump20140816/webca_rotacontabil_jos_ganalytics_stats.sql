CREATE DATABASE  IF NOT EXISTS `webca_rotacontabil` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webca_rotacontabil`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.20.3    Database: webca_rotacontabil
-- ------------------------------------------------------
-- Server version	5.1.57-community

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
-- Table structure for table `jos_ganalytics_stats`
--

DROP TABLE IF EXISTS `jos_ganalytics_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_ganalytics_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `metrics` varchar(250) NOT NULL,
  `dimensions` varchar(250) NOT NULL,
  `sort` varchar(250) NOT NULL,
  `filter` varchar(250) NOT NULL,
  `max_result` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_ganalytics_stats`
--

LOCK TABLES `jos_ganalytics_stats` WRITE;
/*!40000 ALTER TABLE `jos_ganalytics_stats` DISABLE KEYS */;
INSERT INTO `jos_ganalytics_stats` VALUES (1,'Visitors per day','ga:visits','ga:date','','',1000),(2,'Top pages','ga:visits','ga:pagePath','-ga:visits','',10),(3,'Referring Sites','ga:visits','ga:source','-ga:visits','',10),(4,'Countrys','ga:visits','ga:country','-ga:visits','',300),(5,'Browsers','ga:visits','ga:browser','-ga:visits','',10),(6,'OS','ga:visits','ga:operatingSystem','-ga:visits','',10);
/*!40000 ALTER TABLE `jos_ganalytics_stats` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:21
