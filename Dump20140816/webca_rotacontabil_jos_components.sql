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
-- Table structure for table `jos_components`
--

DROP TABLE IF EXISTS `jos_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_components`
--

LOCK TABLES `jos_components` WRITE;
/*!40000 ALTER TABLE `jos_components` DISABLE KEYS */;
INSERT INTO `jos_components` VALUES (1,'Banners','',0,0,'','Banner Management','com_banners',0,'js/ThemeOffice/component.png',0,'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n',1),(2,'Banners','',0,1,'option=com_banners','Active Banners','com_banners',1,'js/ThemeOffice/edit.png',0,'',1),(3,'Clients','',0,1,'option=com_banners&c=client','Manage Clients','com_banners',2,'js/ThemeOffice/categories.png',0,'',1),(4,'Web Links','option=com_weblinks',0,0,'','Manage Weblinks','com_weblinks',0,'js/ThemeOffice/component.png',0,'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',1),(5,'Links','',0,4,'option=com_weblinks','View existing weblinks','com_weblinks',1,'js/ThemeOffice/edit.png',0,'',1),(6,'Categories','',0,4,'option=com_categories&section=com_weblinks','Manage weblink categories','',2,'js/ThemeOffice/categories.png',0,'',1),(7,'Contacts','option=com_contact',0,0,'','Edit contact details','com_contact',0,'js/ThemeOffice/component.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),(8,'Contacts','',0,7,'option=com_contact','Edit contact details','com_contact',0,'js/ThemeOffice/edit.png',1,'',1),(9,'Categories','',0,7,'option=com_categories&section=com_contact_details','Manage contact categories','',2,'js/ThemeOffice/categories.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),(10,'Polls','option=com_poll',0,0,'option=com_poll','Manage Polls','com_poll',0,'js/ThemeOffice/component.png',0,'',1),(11,'News Feeds','option=com_newsfeeds',0,0,'','News Feeds Management','com_newsfeeds',0,'js/ThemeOffice/component.png',0,'',1),(12,'Feeds','',0,11,'option=com_newsfeeds','Manage News Feeds','com_newsfeeds',1,'js/ThemeOffice/edit.png',0,'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',1),(13,'Categories','',0,11,'option=com_categories&section=com_newsfeeds','Manage Categories','',2,'js/ThemeOffice/categories.png',0,'',1),(14,'User','option=com_user',0,0,'','','com_user',0,'',1,'',1),(15,'Search','option=com_search',0,0,'option=com_search','Search Statistics','com_search',0,'js/ThemeOffice/component.png',1,'enabled=0\n\n',1),(16,'Categories','',0,1,'option=com_categories&section=com_banner','Categories','',3,'',1,'',1),(17,'Wrapper','option=com_wrapper',0,0,'','Wrapper','com_wrapper',0,'',1,'',1),(18,'Mail To','',0,0,'','','com_mailto',0,'',1,'',1),(19,'Media Manager','',0,0,'option=com_media','Media Manager','com_media',0,'',1,'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n',1),(20,'Articles','option=com_content',0,0,'','','com_content',0,'',1,'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n',1),(21,'Configuration Manager','',0,0,'','Configuration','com_config',0,'',1,'',1),(22,'Installation Manager','',0,0,'','Installer','com_installer',0,'',1,'',1),(23,'Language Manager','',0,0,'','Languages','com_languages',0,'',1,'',1),(24,'Mass mail','',0,0,'','Mass Mail','com_massmail',0,'',1,'mailSubjectPrefix=\nmailBodySuffix=\n\n',1),(25,'Menu Editor','',0,0,'','Menu Editor','com_menus',0,'',1,'',1),(27,'Messaging','',0,0,'','Messages','com_messages',0,'',1,'',1),(28,'Modules Manager','',0,0,'','Modules','com_modules',0,'',1,'',1),(29,'Plugin Manager','',0,0,'','Plugins','com_plugins',0,'',1,'',1),(30,'Template Manager','',0,0,'','Templates','com_templates',0,'',1,'',1),(31,'User Manager','',0,0,'','Users','com_users',0,'',1,'allowUserRegistration=0\nnew_usertype=Registered\nuseractivation=0\nfrontend_userparams=0\n\n',1),(32,'Cache Manager','',0,0,'','Cache','com_cache',0,'',1,'',1),(33,'Control Panel','',0,0,'','Control Panel','com_cpanel',0,'',1,'',1),(34,'com_jevents','option=com_jevents',0,0,'option=com_jevents','com_jevents','com_jevents',0,'js/ThemeOffice/component.png',0,'com_calViewName=alternative\ndarktemplate=0\ncom_dateformat=0\ncom_calUseStdTime=0\ncom_blockRobots=1\nrobotprior=-1 month\nrobotpost=+1 month\ncom_cache=0\ncom_calHeadline=comp\ncom_calUseIconic=1\ncom_navbarcolor=green\ncom_earliestyear=2000\ncom_latestyear=2015\ncom_starday=0\ncom_print_icon_view=1\ncom_email_icon_view=1\ncom_hideshowbycats=1\ninstalllayouts=0\ncom_copyright=1\nlargeDataSetLimit=100000\nshowPanelNews=1\nhideMigration=1\nicaltimezonelive=America/Sao_Paulo\nregexsearch=1\ncatseparator=\\|\nallowraw=0\njevadmin=62\njevcreator_level=19\njeveditor_level=20\njevpublish_level=21\nauthorisedonly=0\njevpublishown=0\nicaltimezone=\nicalkey=SECRET_PHRASE\nshowicalicon=0\ndisableicalexport=0\noutlook2003icalexport=0\nicalmultiday=0\nicalmultiday24h=0\nfeimport=0\nallowedit=0\nicalformatted=0\neditpopup=0\ndisablerepeats=0\npopupw=800\npopuph=500\ndefaultcat=0\nforcepopupcalendar=1\ncom_calForceCatColorEventForm=2\ncom_single_pane_edit=0\ntimebeforedescription=0\ncom_show_editor_buttons=0\ncom_editor_button_exceptions=pagebreak,readmore\ncom_notifyboth=0\ncom_notifyallevents=0\ncom_notifyauthor=0\nshowpriority=0\nmultiday=1\ncheckclashes=0\nnoclashes=0\nskipreferrer=0\ndefaultstarttime=08:00\ndefaultendtime=17:00\ncom_byview=1\ncom_mailview=1\ncom_hitsview=1\ncom_repeatview=1\ncom_calCutTitle=15\ncom_calMaxDisplay=15\ncom_calDisplayStarttime=1\ncom_enableToolTip=1\ntooltiptype=overlib\ncom_calTTBackground=1\ncom_calTTPosX=LEFT\ncom_calTTPosY=BELOW\ncom_calTTShadow=0\ncom_calTTShadowX=0\ncom_calTTShadowY=0\ncom_calEventListRowsPpg=10\nshowyearpast=1\ncom_showrepeats=1\nshowyeardate=0\ncom_rss_cache=1\ncom_rss_cache_time=3600\ncom_rss_count=5\ncom_rss_live_bookmarks=1\ncom_rss_modid=0\ncom_rss_title=JEVENTS_SYNDICATION_FOR_JOOMLA\ncom_rss_description=Powered by JEvents!\ncom_rss_limit_text=0\ncom_rss_text_length=20\ncom_rss_logo=\nmodcal_DispLastMonth=NO\nmodcal_DispLastMonthDays=0\nmodcal_DispNextMonth=NO\nmodcal_DispNextMonthDays=0\nmodcal_LinkCloaking=0\nmodlatest_MaxEvents=10\nmodlatest_Mode=0\nmodlatest_Days=5\nstartnow=0\nmodlatest_NoRepeat=1\nmodlatest_DispLinks=1\nmodlatest_DispYear=0\nmodlatest_DisDateStyle=0\nmodlatest_DisTitleStyle=0\nmodlatest_LinkToCal=0\nmodlatest_LinkCloaking=0\nmodlatest_SortReverse=0\nmodlatest_CustFmtStr=${eventDate}[!a: - ${endDate(%I:%M%p)}]\\n${title}\nmodlatest_RSS=0\nmodlatest_contentplugins=0\n\n',1),(35,'GAnalytics','option=com_ganalytics',0,0,'option=com_ganalytics','GAnalytics','com_ganalytics',0,'js/ThemeOffice/component.png',0,'',1),(36,'Dashboard','',0,35,'option=com_ganalytics&view=dashboard','Dashboard','com_ganalytics',0,'js/ThemeOffice/component.png',0,'',1),(37,'Configuration','',0,35,'option=com_ganalytics&view=config','Configuration','com_ganalytics',1,'js/ThemeOffice/component.png',0,'',1),(38,'Profiles','',0,35,'option=com_ganalytics&view=profiles','Profiles','com_ganalytics',2,'js/ThemeOffice/component.png',0,'',1),(39,'Tools','',0,35,'option=com_ganalytics&view=tools','Tools','com_ganalytics',3,'js/ThemeOffice/component.png',0,'',1),(40,'Help','',0,35,'option=com_ganalytics&view=help','Help','com_ganalytics',4,'js/ThemeOffice/component.png',0,'',1),(41,'GCalendar','option=com_gcalendar',0,0,'option=com_gcalendar','GCalendar','com_gcalendar',0,'js/ThemeOffice/component.png',0,'',1),(42,'GCalendars','',0,41,'option=com_gcalendar&task=gcalendars','GCalendars','com_gcalendar',0,'js/ThemeOffice/component.png',0,'',1),(43,'Tools','',0,41,'option=com_gcalendar&view=tools','Tools','com_gcalendar',1,'js/ThemeOffice/component.png',0,'',1),(44,'Support','',0,41,'option=com_gcalendar&view=support','Support','com_gcalendar',2,'js/ThemeOffice/component.png',0,'',1);
/*!40000 ALTER TABLE `jos_components` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-16 23:33:20
