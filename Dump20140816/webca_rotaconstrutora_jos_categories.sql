CREATE DATABASE  IF NOT EXISTS `webca_rotaconstrutora` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webca_rotaconstrutora`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.20.3    Database: webca_rotaconstrutora
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
-- Table structure for table `jos_categories`
--

DROP TABLE IF EXISTS `jos_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_categories`
--

LOCK TABLES `jos_categories` WRITE;
/*!40000 ALTER TABLE `jos_categories` DISABLE KEYS */;
INSERT INTO `jos_categories` VALUES (1,0,'Latest','','latest-news','taking_notes.jpg','1','left','The latest news from the Joomla! Team',1,0,'0000-00-00 00:00:00','',1,0,1,''),(2,0,'Joomla! Specific Links','','joomla-specific-links','clock.jpg','com_weblinks','left','A selection of links that are all related to the Joomla! Project.',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(3,0,'Newsflash','','newsflash','','1','left','',1,0,'0000-00-00 00:00:00','',2,0,0,''),(4,0,'Joomla!','','joomla','','com_newsfeeds','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),(5,0,'Free and Open Source Software','','free-and-open-source-software','','com_newsfeeds','left','Read the latest news about free and open source software from some of its leading advocates.',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),(6,0,'Related Projects','','related-projects','','com_newsfeeds','left','Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.',1,0,'0000-00-00 00:00:00',NULL,4,0,0,''),(12,0,'Contacts','','contacts','','com_contact_details','left','Contact Details for this Web site',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),(13,0,'Joomla','','joomla','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),(14,0,'Text Ads','','text-ads','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),(15,0,'Features','','features','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,6,0,0,''),(17,0,'Benefits','','benefits','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,4,0,0,''),(18,0,'Platforms','','platforms','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,3,0,0,''),(19,0,'Other Resources','','other-resources','','com_weblinks','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),(29,0,'The CMS','','the-cms','','4','left','Information about the software behind Joomla!<br />',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),(28,0,'Current Users','','current-users','','3','left','Questions that users migrating to Joomla! 1.5 are likely to raise<br />',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),(25,0,'The Project','','the-project','','4','left','General facts about Joomla!<br />',1,65,'2007-06-28 14:50:15',NULL,1,0,0,''),(27,0,'New to Joomla!','','new-to-joomla','','3','left','Questions for new users of Joomla!',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),(30,0,'The Community','','the-community','','4','left','About the millions of Joomla! users and Web sites<br />',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),(31,0,'General','','general','','3','left','General questions about the Joomla! CMS',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(32,0,'Languages','','languages','','3','left','Questions related to localisation and languages',1,0,'0000-00-00 00:00:00',NULL,4,0,0,''),(33,0,'Joomla! Promo','','joomla-promo','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,'');
/*!40000 ALTER TABLE `jos_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:26
