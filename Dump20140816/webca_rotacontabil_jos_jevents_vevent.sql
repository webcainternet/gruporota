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
-- Table structure for table `jos_jevents_vevent`
--

DROP TABLE IF EXISTS `jos_jevents_vevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_jevents_vevent` (
  `ev_id` int(12) NOT NULL AUTO_INCREMENT,
  `icsid` int(12) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '1',
  `uid` varchar(255) NOT NULL DEFAULT '',
  `refreshed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(100) NOT NULL DEFAULT '',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `rawdata` longtext NOT NULL,
  `recurrence_id` varchar(30) NOT NULL DEFAULT '',
  `detail_id` int(12) NOT NULL DEFAULT '0',
  `state` tinyint(3) NOT NULL DEFAULT '1',
  `lockevent` tinyint(3) NOT NULL DEFAULT '0',
  `author_notified` tinyint(3) NOT NULL DEFAULT '0',
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ev_id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `icsid` (`icsid`),
  KEY `stateidx` (`state`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_jevents_vevent`
--

LOCK TABLES `jos_jevents_vevent` WRITE;
/*!40000 ALTER TABLE `jos_jevents_vevent` DISABLE KEYS */;
INSERT INTO `jos_jevents_vevent` VALUES (1,1,34,'7f0d62096ff97f00ae2e7db640fa33fc','0000-00-00 00:00:00','2012-03-05 14:16:13',62,'',62,'a:18:{s:3:\"UID\";s:32:\"7f0d62096ff97f00ae2e7db640fa33fc\";s:11:\"X-EXTRAINFO\";s:2:\"d3\";s:8:\"LOCATION\";s:4:\"dww1\";s:11:\"allDayEvent\";s:3:\"off\";s:7:\"CONTACT\";s:3:\"ds2\";s:11:\"DESCRIPTION\";s:5:\"dwdw0\";s:12:\"publish_down\";s:10:\"2012-03-05\";s:10:\"publish_up\";s:10:\"2012-03-05\";s:7:\"SUMMARY\";s:5:\"teste\";s:3:\"URL\";s:0:\"\";s:11:\"X-CREATEDBY\";i:62;s:7:\"DTSTART\";i:1330945200;s:5:\"DTEND\";i:1330977600;s:5:\"RRULE\";a:4:{s:4:\"FREQ\";s:4:\"none\";s:5:\"COUNT\";i:1;s:8:\"INTERVAL\";s:1:\"1\";s:5:\"BYDAY\";s:2:\"MO\";}s:8:\"MULTIDAY\";s:1:\"1\";s:9:\"NOENDTIME\";s:1:\"0\";s:7:\"X-COLOR\";s:0:\"\";s:9:\"LOCKEVENT\";s:1:\"0\";}','',1,1,0,0,0);
/*!40000 ALTER TABLE `jos_jevents_vevent` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:19
