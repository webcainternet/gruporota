CREATE DATABASE  IF NOT EXISTS `webca_rotalogistica` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webca_rotalogistica`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.20.3    Database: webca_rotalogistica
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
-- Table structure for table `jos_newsfeeds`
--

DROP TABLE IF EXISTS `jos_newsfeeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(11) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(11) unsigned NOT NULL DEFAULT '3600',
  `checked_out` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_newsfeeds`
--

LOCK TABLES `jos_newsfeeds` WRITE;
/*!40000 ALTER TABLE `jos_newsfeeds` DISABLE KEYS */;
INSERT INTO `jos_newsfeeds` VALUES (4,1,'Joomla! Announcements','joomla-official-news','http://feeds.joomla.org/JoomlaAnnouncements','',1,5,3600,0,'0000-00-00 00:00:00',1,0),(4,2,'Joomla! Core Team Blog','joomla-core-team-blog','http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog','',1,5,3600,0,'0000-00-00 00:00:00',2,0),(4,3,'Joomla! Community Magazine','joomla-community-magazine','http://feeds.joomla.org/JoomlaMagazine','',1,20,3600,0,'0000-00-00 00:00:00',3,0),(4,4,'Joomla! Developer News','joomla-developer-news','http://feeds.joomla.org/JoomlaDeveloper','',1,5,3600,0,'0000-00-00 00:00:00',4,0),(4,5,'Joomla! Security News','joomla-security-news','http://feeds.joomla.org/JoomlaSecurityNews','',1,5,3600,0,'0000-00-00 00:00:00',5,0),(5,6,'Free Software Foundation Blogs','free-software-foundation-blogs','http://www.fsf.org/blogs/RSS',NULL,1,5,3600,0,'0000-00-00 00:00:00',4,0),(5,7,'Free Software Foundation','free-software-foundation','http://www.fsf.org/news/RSS',NULL,1,5,3600,62,'2008-09-14 00:24:25',3,0),(5,8,'Software Freedom Law Center Blog','software-freedom-law-center-blog','http://www.softwarefreedom.org/feeds/blog/',NULL,1,5,3600,0,'0000-00-00 00:00:00',2,0),(5,9,'Software Freedom Law Center News','software-freedom-law-center','http://www.softwarefreedom.org/feeds/news/',NULL,1,5,3600,0,'0000-00-00 00:00:00',1,0),(5,10,'Open Source Initiative Blog','open-source-initiative-blog','http://www.opensource.org/blog/feed',NULL,1,5,3600,0,'0000-00-00 00:00:00',5,0),(6,11,'PHP News and Announcements','php-news-and-announcements','http://www.php.net/feed.atom',NULL,1,5,3600,62,'2008-09-14 00:25:37',1,0),(6,12,'Planet MySQL','planet-mysql','http://www.planetmysql.org/rss20.xml',NULL,1,5,3600,62,'2008-09-14 00:25:51',2,0),(6,13,'Linux Foundation Announcements','linux-foundation-announcements','http://www.linuxfoundation.org/press/rss20.xml',NULL,1,5,3600,62,'2008-09-14 00:26:11',3,0),(6,14,'Mootools Blog','mootools-blog','http://feeds.feedburner.com/mootools-blog',NULL,1,5,3600,62,'2008-09-14 00:26:51',4,0);
/*!40000 ALTER TABLE `jos_newsfeeds` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:22
