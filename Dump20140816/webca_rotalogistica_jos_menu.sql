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
-- Table structure for table `jos_menu`
--

DROP TABLE IF EXISTS `jos_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_menu`
--

LOCK TABLES `jos_menu` WRITE;
/*!40000 ALTER TABLE `jos_menu` DISABLE KEYS */;
INSERT INTO `jos_menu` VALUES (1,'mainmenu','Home','home','index.php?option=com_content&view=frontpage','component',1,0,20,0,10,0,'0000-00-00 00:00:00',0,0,0,3,'num_leading_articles=0\nnum_intro_articles=1\nnum_columns=1\nnum_links=0\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=Welcome to the Frontpage\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(2,'mainmenu','Serviços','joomla-license','index.php?option=com_content&view=article&id=46','component',1,0,20,0,12,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Servicos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(41,'mainmenu','FAQ','faq','index.php?option=com_content&view=section&id=3','component',-2,0,20,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1',0,0,0),(11,'othermenu','Joomla! Home','joomla-home','http://www.joomla.org','url',1,0,0,0,1,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(12,'othermenu','Joomla! Forums','joomla-forums','http://forum.joomla.org','url',1,0,0,0,2,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(13,'othermenu','Joomla! Documentation','joomla-documentation','http://docs.joomla.org','url',1,0,0,0,3,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(14,'othermenu','Joomla! Community','joomla-community','http://community.joomla.org','url',1,0,0,0,4,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(15,'othermenu','Joomla! Magazine','joomla-community-magazine','http://community.joomla.org/magazine.html','url',1,0,0,0,5,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(16,'othermenu','OSM Home','osm-home','http://www.opensourcematters.org','url',1,0,0,0,6,0,'0000-00-00 00:00:00',0,0,0,6,'menu_image=-1\n\n',0,0,0),(17,'othermenu','Administrator','administrator','administrator/','url',1,0,0,0,7,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),(18,'topmenu','News','news','index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1','component',-2,0,11,0,1,0,'0000-00-00 00:00:00',0,0,0,3,'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',0,0,0),(20,'usermenu','Your Details','your-details','index.php?option=com_user&view=user&task=edit','component',1,0,14,0,1,0,'0000-00-00 00:00:00',0,0,1,3,'',0,0,0),(24,'usermenu','Logout','logout','index.php?option=com_user&view=login','component',1,0,14,0,4,0,'0000-00-00 00:00:00',0,0,1,3,'',0,0,0),(38,'keyconcepts','Content Layouts','content-layouts','index.php?option=com_content&view=article&id=24','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(27,'mainmenu','Joomla! Overview','joomla-overview','index.php?option=com_content&view=article&id=19','component',-2,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(28,'topmenu','About Joomla!','about-joomla','index.php?option=com_content&view=article&id=25','component',-2,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(29,'topmenu','Features','features','index.php?option=com_content&view=article&id=22','component',-2,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(30,'topmenu','The Community','the-community','index.php?option=com_content&view=article&id=27','component',-2,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(34,'mainmenu','What\'s New in 1.5?','what-is-new-in-1-5','index.php?option=com_content&view=article&id=22','component',-2,0,20,1,7,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(40,'keyconcepts','Extensions','extensions','index.php?option=com_content&view=article&id=26','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(37,'mainmenu','More about Joomla!','more-about-joomla','index.php?option=com_content&view=section&id=4','component',-2,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1',0,0,0),(43,'keyconcepts','Example Pages','example-pages','index.php?option=com_content&view=article&id=43','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(44,'ExamplePages','Section Blog','section-blog','index.php?option=com_content&view=section&layout=blog&id=3','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(45,'ExamplePages','Section Table','section-table','index.php?option=com_content&view=section&id=3','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(46,'ExamplePages','Category Blog','categoryblog','index.php?option=com_content&view=category&layout=blog&id=31','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(47,'ExamplePages','Category Table','category-table','index.php?option=com_content&view=category&id=32','component',1,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(48,'mainmenu','Web Links','web-links','index.php?option=com_weblinks&view=categories','component',-2,0,4,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Weblinks\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',0,0,0),(49,'mainmenu','News Feeds','news-feeds','index.php?option=com_newsfeeds&view=categories','component',-2,0,11,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',0,0,0),(50,'mainmenu','The News','the-news','index.php?option=com_content&view=category&layout=blog&id=1','component',-2,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),(51,'usermenu','Submit an Article','submit-an-article','index.php?option=com_content&view=article&layout=form','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,2,0,'',0,0,0),(52,'usermenu','Submit a Web Link','submit-a-web-link','index.php?option=com_weblinks&view=weblink&layout=form','component',1,0,4,0,3,0,'0000-00-00 00:00:00',0,0,2,0,'',0,0,0),(53,'topmenu','Home','home','index.php?option=com_content&view=frontpage','component',1,0,20,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'num_leading_articles=0\nnum_intro_articles=1\nnum_columns=1\nnum_links=0\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=0\nshow_pagination_results=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,1),(54,'topmenu','Quem Somos','about-us','index.php?option=com_content&view=article&id=47','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Quem Somos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(55,'topmenu','pricing','pricing','index.php?option=com_content&view=article&id=5','component',0,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=pricing\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(56,'topmenu','Servicos','services','index.php?option=com_content&view=article&id=46','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Servicos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(57,'topmenu','Contato','contacts','index.php?option=com_content&view=article&id=48','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=contato\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(58,'mainmenu','Quem Somos','blog','index.php?option=com_content&view=article&id=47','component',1,0,20,0,11,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Quem Somos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(59,'mainmenu','Contato','joomla-overview','index.php?option=com_content&view=article&id=48','component',1,0,20,0,13,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=contato\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(60,'mainmenu','More about Joomla!','more-about-joomla','index.php?option=com_content&view=section&layout=blog&id=4','component',0,0,20,0,14,0,'0000-00-00 00:00:00',0,0,0,0,'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=1\nnum_columns=1\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=More about Joomla!\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(61,'mainmenu','News Feeds','news-feeds','index.php?option=com_newsfeeds&view=newsfeed&id=1','component',0,0,11,0,15,0,'0000-00-00 00:00:00',0,0,0,0,'show_headings=\nshow_name=\nshow_articles=\nshow_link=\nshow_cat_description=\nshow_cat_items=\nshow_feed_image=\nshow_feed_description=\nshow_item_description=\nfeed_word_count=0\npage_title=News Feeds \nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(62,'mainmenu','Wrapper','wrapper','index.php?option=com_wrapper&view=wrapper','component',0,0,17,0,16,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://google.com\nscrolling=auto\nwidth=100%\nheight=500\nheight_auto=0\nadd_scheme=1\npage_title=Wrapper\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(63,'mainmenu','Web Links','web-links','index.php?option=com_weblinks&view=categories','component',0,0,4,0,17,62,'2010-04-14 09:02:41',0,0,0,0,'image=articles.jpg\nimage_align=right\nshow_feed_link=1\nshow_comp_description=\ncomp_description=\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=Web Links\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(64,'mainmenu','x1','x1','index.php?option=com_search&view=search','component',-2,0,15,1,2,0,'0000-00-00 00:00:00',0,0,0,0,'search_areas=1\nshow_date=\nenabled=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(65,'mainmenu','x2','x2','index.php?option=com_search&view=search','component',-2,0,15,1,1,0,'0000-00-00 00:00:00',0,0,0,0,'search_areas=1\nshow_date=\nenabled=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(66,'topmenu','Section Blog','section-blog','index.php?option=com_content&view=section&layout=blog&id=1','component',0,54,20,1,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=1\nnum_columns=1\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Section Blog\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(67,'topmenu','Search','search','index.php?option=com_search&view=search','component',0,54,15,1,2,0,'0000-00-00 00:00:00',0,0,0,0,'search_areas=1\nshow_date=\nenabled=\npage_title=Search\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0);
/*!40000 ALTER TABLE `jos_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:23
