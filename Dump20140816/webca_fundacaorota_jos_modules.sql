CREATE DATABASE  IF NOT EXISTS `webca_fundacaorota` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webca_fundacaorota`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.20.3    Database: webca_fundacaorota
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
-- Table structure for table `jos_modules`
--

DROP TABLE IF EXISTS `jos_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_modules`
--

LOCK TABLES `jos_modules` WRITE;
/*!40000 ALTER TABLE `jos_modules` DISABLE KEYS */;
INSERT INTO `jos_modules` VALUES (1,'Rota fundacao','',1,'left',62,'2012-04-19 06:20:35',1,'mod_mainmenu',0,0,0,'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',1,0,''),(2,'Login','',1,'login',0,'0000-00-00 00:00:00',1,'mod_login',0,0,1,'',1,1,''),(3,'Popular','',3,'cpanel',0,'0000-00-00 00:00:00',1,'mod_popular',0,2,1,'',0,1,''),(4,'Recent added Articles','',4,'cpanel',0,'0000-00-00 00:00:00',1,'mod_latest',0,2,1,'ordering=c_dsc\nuser_id=0\ncache=0\n\n',0,1,''),(5,'Menu Stats','',5,'cpanel',0,'0000-00-00 00:00:00',1,'mod_stats',0,2,1,'',0,1,''),(6,'Unread Messages','',1,'header',0,'0000-00-00 00:00:00',1,'mod_unread',0,2,1,'',1,1,''),(7,'Online Users','',2,'header',0,'0000-00-00 00:00:00',1,'mod_online',0,2,1,'',1,1,''),(8,'Toolbar','',1,'toolbar',0,'0000-00-00 00:00:00',1,'mod_toolbar',0,2,1,'',1,1,''),(9,'Quick Icons','',1,'icon',0,'0000-00-00 00:00:00',1,'mod_quickicon',0,2,1,'',1,1,''),(10,'Logged in Users','',2,'cpanel',0,'0000-00-00 00:00:00',1,'mod_logged',0,2,1,'',0,1,''),(11,'Footer','',0,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,1,'',1,1,''),(12,'Admin Menu','',1,'menu',0,'0000-00-00 00:00:00',1,'mod_menu',0,2,1,'',0,1,''),(13,'Admin SubMenu','',1,'submenu',0,'0000-00-00 00:00:00',1,'mod_submenu',0,2,1,'',0,1,''),(14,'User Status','',1,'status',0,'0000-00-00 00:00:00',1,'mod_status',0,2,1,'',0,1,''),(15,'Title','',1,'title',0,'0000-00-00 00:00:00',1,'mod_title',0,2,1,'',0,1,''),(29,'Rota fundacao','',0,'user3',62,'2012-04-19 06:20:27',1,'mod_mainmenu',0,0,0,'menutype=topmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-nav\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=-1\nindent_image2=-1\nindent_image3=-1\nindent_image4=-1\nindent_image5=-1\nindent_image6=-1\nspacer=\nend_spacer=\n\n',1,0,''),(41,'Welcome to Joomla!','<div style=\"padding: 5px\">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href=\"http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews\" target=\"_blank\">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href=\"http://www.joomla.org/download.html\" target=\"_blank\">latest Joomla! release;</a> and (3) a <a href=\"http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup\" target=\"_blank\" title=\"good Web host\">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href=\"http://docs.joomla.org/Category:Security_Checklist\" target=\"_blank\" title=\"Joomla! Security Checklist\">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href=\"http://developer.joomla.org/security/contact-the-team.html\" target=\"_blank\" title=\"Joomla! Security Task Force\">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   \"<a href=\"http://docs.joomla.org/beginners\" target=\"_blank\">Absolute Beginner\'s   Guide to Joomla!.</a>\" There, you will find a Quick Start to Joomla!   <a href=\"http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf\" target=\"_blank\">guide</a>   and <a href=\"http://help.joomla.org/ghop/feb2008/task167/index.html\" target=\"_blank\">video</a>,   amongst many other tutorials. The   <a href=\"http://community.joomla.org/magazine/view-all-issues.html\" target=\"_blank\">Joomla!   Community Magazine</a> also has   <a href=\"http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html\" target=\"_blank\">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href=\"http://docs.joomla.org/Category:FAQ\" target=\"_blank\">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href=\"http://forum.joomla.org/\" target=\"_blank\">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name=\"twjs\" title=\"twjs\"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href=\"http://www.joomla.org/about-joomla/contribute-to-joomla.html\" target=\"_blank\">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>',0,'cpanel',0,'0000-00-00 00:00:00',1,'mod_custom',0,2,1,'moduleclass_sfx=\n\n',1,1,''),(42,'Joomla! Security Newsfeed','',6,'cpanel',62,'2008-10-25 20:15:17',1,'mod_feed',0,0,1,'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n',0,1,''),(43,'Flash Home','<p>\r\n<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"960\" height=\"384\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,24\">\r\n<param name=\"movie\" value=\"images/stories/header_v8.swf\" />\r\n<param name=\"quality\" value=\"high\" />\r\n<param name=\"menu\" value=\"false\" />\r\n<param name=\"wmode\" value=\"opaque\" /> <!-- [if !IE]> --> \r\n<object width=\"960\" height=\"384\" type=\"application/x-shockwave-flash\" data=\"images/stories/header_v8.swf\">\r\n<param name=\"quality\" value=\"high\" />\r\n<param name=\"menu\" value=\"false\" />\r\n<param name=\"wmode\" value=\"opaque\" />\r\n<param name=\"pluginurl\" value=\"http://www.macromedia.com/go/getflashplayer\" /> FAIL (the browser should render some flash content, not this).\r\n</object>\r\n<!-- [endif] -->\r\n</object>\r\n</p>',0,'top',62,'2012-04-19 06:20:31',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(48,'Flash Internas','<p><img src=\"images/stories/banner_int.png\" border=\"0\" /></p>',2,'top',62,'2012-04-19 06:20:40',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(44,'Imagem Home Visao Missao','<table CELLPADDING=3 CELLSPACING=3 style=\"width: 100%;\" border=0>\r\n<tr>\r\n  <td colspan=\"2\">\r\n<div class=\"custom-row\" style=\"height: 250px;width: 100%;\">\r\n<div class=\"col-1 fleft\" style=\"height: 250px;width: 100%;\">\r\n\r\n\r\n<table style=\"width: 100%\">\r\n\r\n<tr>\r\n  <td  style=\"width: 70%; height: 250px;\"  align=\"justify\">\r\n\r\n<div style=\"font-family: Arial, Helvetica; font-size: 33px;color: #FFAA23;line-height: 33px;text-transform: capitalize;\">\r\n\r\n\r\nA Fundação Rota do Brasil \r\n</div><br />\r\nPromoverá o acesso da sociedade a diversas atividades de caráter esportivo, social, profissionalizante e educacional.Essas tarefas demandam um conjunto de princípios éticos e gerenciais que orientam ações pessoais e coletivas na condução de projetos em realização tais como formação e profissionalização, a prática de esportes e integração de milhares de brasileiros nos mais diversos recantos do país.\r\n<br /><br />\r\nA Fundação Rota do Brasil estará presente em locais onde carece de instrumentos de inserção social promovendo e integrando os cidadãos aos objetivos destes projetos ou programas em parcerias que impactam na vida familiar, social e profissional dos beneficiários.\r\n<br /><br />\r\nO Sucesso desta Instituição será completo quando seus objetivos atingirem o maior numero de beneficiários em diversas regiões do Brasil. Assim os esforços que norteam todas as atividades surtirão com plenitude na satisfação dos envolvidos direta e indiretamente, Integrando o Desenvolvimento deste país.\r\n\r\n\r\n\r\n\r\n  </td>\r\n\r\n  <td>\r\n<img src=\"img/home_fund.jpg\" alt=\"\" />\r\n  </td>\r\n</tr>\r\n\r\n</table>\r\n\r\n\r\n\r\n</div></div> </td>\r\n\r\n</tr>\r\n</table>\r\n<br /><br /><br />',0,'user1',62,'2012-04-23 04:34:21',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,'');
/*!40000 ALTER TABLE `jos_modules` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:17
