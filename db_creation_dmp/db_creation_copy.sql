-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display_name` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `isSubmenu` tinyint(4) NOT NULL DEFAULT '0',
  `subTableName` varchar(50) COLLATE utf8_polish_ci DEFAULT '',
  `page_ref` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (2,'Start',0,'','start'),(3,'Projekty',1,'Projekty',NULL),(4,'O mnie',0,'','about'),(5,'Archiwum',1,'Archiwum',NULL),(6,'Linkownia',0,'','links'),(7,'Wiedza',0,'','edu'),(8,'Kontakt',0,'','contact');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_string_table`
--

DROP TABLE IF EXISTS `page_string_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_string_table` (
  `stringkey` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `value` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`stringkey`),
  UNIQUE KEY `stringkey_UNIQUE` (`stringkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_string_table`
--

LOCK TABLES `page_string_table` WRITE;
/*!40000 ALTER TABLE `page_string_table` DISABLE KEYS */;
INSERT INTO `page_string_table` VALUES ('footer_text','Projekt strony w HTML, CSS oraz programowanie w PHP, MySQL wykonane przez PiotrQ'),('gh_link','http://www.github.com/piotrku91/'),('li_link','http://linkedin.com/'),('mainpage_title','PiotrQ - Strona domowa'),('pass','make new password'),('yt_link','http://www.piotrq.eu/');
/*!40000 ALTER TABLE `page_string_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `page_UNIQUE` (`page`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'p1','Project1','Oto on'),(2,'start','Strona główna','Witaj serdecznie na mojej stronie internetowej :)'),(3,'proj_lq','LQArm (Arduino/C++/Qt)','default'),(4,'proj_libs','Moje bliblioteki Arduino (C++)','default'),(5,'arch_apki','Moje stare apki (2003-2008)','default'),(6,'arch_www','Moje stare WWW (2002-2006)','default'),(7,'arch_gal','Galeria','default'),(8,'proj_ser','Serek Commander (Python/PySimpleGUI)','default'),(9,'proj_arvu','ArVUSimple (Arduino/C++/Python)','default'),(10,'proj_hmp','PiotrQ Homepage (CSS/HTML/SQL/PHP)','default'),(11,'proj_uni','UNI3.9 (CNC/Fanuc 32i)','default'),(12,'proj_szki','Szkice gier (CRYENGINE/Unity)','default'),(15,'about','O mnie','default'),(16,'links','Linkownia','default'),(17,'contact','Kontakt','default'),(18,'edu','Wiedza','default');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenus`
--

DROP TABLE IF EXISTS `submenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subMenuName` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `display_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `page_ref` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenus`
--

LOCK TABLES `submenus` WRITE;
/*!40000 ALTER TABLE `submenus` DISABLE KEYS */;
INSERT INTO `submenus` VALUES (1,'Projekty','LQArm (Arduino/C++/Qt)','proj_lq'),(2,'Projekty','Moje bliblioteki Arduino (C++)','proj_libs'),(3,'Archiwum','Moje stare apki (2003-2008)','arch_apki'),(4,'Archiwum','Moje stare WWW (2002-2006)','arch_www'),(5,'Archiwum','Galeria','arch_gal'),(6,'Projekty','Serek Commander (Python/PySimpleGUI)','proj_ser'),(7,'Projekty','ArVUSimple (Arduino/C++/Python)','proj_arvu'),(8,'Projekty','PiotrQ Homepage (CSS/HTML/SQL/PHP)','proj_hmp'),(9,'Projekty','UNI3.9 (CNC/Fanuc 32i)','proj_uni'),(10,'Archiwum','Szkice gier (CRYENGINE/Unity)','proj_szki');
/*!40000 ALTER TABLE `submenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'web'
--
/*!50003 DROP PROCEDURE IF EXISTS `MAKE_LINK_DEFAULTS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MAKE_LINK_DEFAULTS`()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
DECLARE dn VARCHAR(100);
DECLARE pf VARCHAR(100);
DECLARE checker TINYINT;
DECLARE cn TEXT;

SELECT COUNT(*) FROM submenus INTO n;
SET i=0;
WHILE i<n DO 

SET pf = (SELECT page_ref FROM submenus LIMIT i,1);
 SET dn = (SELECT display_name FROM submenus LIMIT i,1);
SET cn = "default";
SET checker = (SELECT COUNT(*) FROM pages WHERE page=pf);

IF checker=0 THEN
  INSERT INTO pages(page,title,content) VALUES (pf,dn,cn);
  END IF;
  SET i = i + 1;
END WHILE;
End ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MAKE_LINK_DEFAULTS2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MAKE_LINK_DEFAULTS2`()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
DECLARE dn VARCHAR(100);
DECLARE pf VARCHAR(100);
DECLARE checker TINYINT;
DECLARE cn TEXT;

SELECT COUNT(*) FROM menu WHERE (isSubmenu=0 AND page_ref IS NOT NULL) INTO n;
SET i=0;
WHILE i<n DO 

SET pf = (SELECT page_ref FROM menu WHERE (isSubmenu=0 AND page_ref IS NOT NULL) LIMIT i,1);
 SET dn = (SELECT display_name FROM menu WHERE (isSubmenu=0 AND page_ref IS NOT NULL)  LIMIT i,1);
SET cn = "default";
SET checker = (SELECT COUNT(*) FROM pages WHERE (page=pf));

IF checker=0 THEN
  INSERT INTO pages(page,title,content) VALUES (pf,dn,cn);
  END IF;
  SET i = i + 1;
  
END WHILE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-20 23:40:18
