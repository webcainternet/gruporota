CREATE DATABASE  IF NOT EXISTS `webca_rotaengenharia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webca_rotaengenharia`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.20.3    Database: webca_rotaengenharia
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
-- Table structure for table `jos_banner`
--

DROP TABLE IF EXISTS `jos_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT 'banner',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `showBanner` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_banner`
--

LOCK TABLES `jos_banner` WRITE;
/*!40000 ALTER TABLE `jos_banner` DISABLE KEYS */;
INSERT INTO `jos_banner` VALUES (1,1,'banner','OSM 1','osm-1',0,43,0,'osmbanner1.png','http://www.opensourcematters.org','2004-07-07 15:31:29',1,0,'0000-00-00 00:00:00','','',13,'',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(2,1,'banner','OSM 2','osm-2',0,49,0,'osmbanner2.png','http://www.opensourcematters.org','2004-07-07 15:31:29',1,0,'0000-00-00 00:00:00','','',13,'',0,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(3,1,'','Joomla!','joomla',0,20,0,'','http://www.joomla.org','2006-05-29 14:21:28',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.',14,'',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(4,1,'','JoomlaCode','joomlacode',0,20,0,'','http://joomlacode.org','2006-05-29 14:19:26',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.',14,'',0,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(5,1,'','Joomla! Extensions','joomla-extensions',0,15,0,'','http://extensions.joomla.org','2006-05-29 14:23:21',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.',14,'',0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(6,1,'','Joomla! Shop','joomla-shop',0,15,0,'','http://shop.joomla.org','2006-05-29 14:23:21',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.',14,'',0,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(7,1,'','Joomla! Promo Shop','joomla-promo-shop',0,10,1,'shop-ad.jpg','http://shop.joomla.org','2007-09-19 17:26:24',1,0,'0000-00-00 00:00:00','','',33,'',0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),(8,1,'','Joomla! Promo Books','joomla-promo-books',0,11,0,'shop-ad-books.jpg','http://shop.joomla.org/amazoncom-bookstores.html','2007-09-19 17:28:01',1,0,'0000-00-00 00:00:00','','',33,'',0,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','','');
/*!40000 ALTER TABLE `jos_banner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:14
