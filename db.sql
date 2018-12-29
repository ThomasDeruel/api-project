-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: exoprod
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instruments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tracks` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `year` varchar(80) NOT NULL,
  `title` varchar(45) NOT NULL,
  `videoUrl` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `origin` varchar(80) NOT NULL,
  `pronounciation` varchar(80) NOT NULL,
  `shape` varchar(80) NOT NULL,
  `descriptionTitle` varchar(80) NOT NULL,
  `descriptionContent` longtext NOT NULL,
  `audioPath` varchar(250) NOT NULL,
  `audioType` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instruments`
--

LOCK TABLES `instruments` WRITE;
/*!40000 ALTER TABLE `instruments` DISABLE KEYS */;
INSERT INTO `instruments` VALUES (1,1,'Theremine','1920','B├©rns, Faded heart','https://www.youtube.com/watch?v=7EluXu6xg1c','soon','soon','soon','soon','soon','soon','path:)','mp3'),(2,1,'Dulcimer','Moyen ├ége','Cindy Lauper, time after time','https://www.youtusoonbe.com/watch?v=gZa4mdWu6Gs','soon','soon','soon','soon','soon','soon','soon','soon'),(3,1,'Sitar','XIV ├¿me si├¿cle','Rolling Stones, Paint It Black','https://www.youtube.com/watch?v=O4irXQhgMqg','soon','soon','soon','soon','soon','soon','soon','soon'),(4,2,'Cornemuse','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(5,2,'Lyre','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(6,3,'mexican guitarron','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(7,4,'Maracas','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(8,4,'Bat├┤n de la pluie','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(9,5,'Peruvian panpipes','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(10,5,'marimba','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(11,5,'south africa voice','soon','soon','soon','soon','soon','soon','soon','soonsoon','soon','soon','soon'),(12,6,'Banjo','1830','Taylor Swift, Mean','https://www.youtube.com/watch?time_continue=43&v=RQuY8kERaU0','soon','soon','soon','soon','soon','soon','soon','soon'),(13,6,'Guitare','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(14,6,'Flamenco','soon','soon','soon','soon','soon','soonsoon','soon','soon','soon','soon','soon'),(15,7,'medieval lute','soon','soon','soon','soon','soonsoon','soon','soon','soon','soon','soon','soon'),(16,7,'chinese ruan moon guita','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(17,8,'Taiiko','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(18,8,'latin kit','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(19,9,'chinese guzheng zither','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(20,10,'Accord├®on','soon','soon','soon','soon','soon','soonsoon','soonsoon','soonsoon','soon','soon','soon'),(21,10,'Shamisen','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(22,11,'Pipa','soon','soon','soon','soonsoonsoon','soonsoonsoon','soonsoonsoon','soonsoonsoon','soonsoonsoon','soon','soon','soon'),(23,11,'Koto','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(24,12,'Meinl','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon'),(25,12,'meinl','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon','soon');
/*!40000 ALTER TABLE `instruments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map`
--

DROP TABLE IF EXISTS `map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_instrument` int(11) DEFAULT NULL,
  `markerOffset` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map`
--

LOCK TABLES `map` WRITE;
/*!40000 ALTER TABLE `map` DISABLE KEYS */;
INSERT INTO `map` VALUES (1,3,'-25','Inde',78.9629,20.5937),(2,2,'-25','Europe du nord',12.3402,62.2786),(3,1,'-25','Russie',-82.64,27.7731),(4,23,'-25','Japon',139.692,35.6895),(5,12,'-25','Am├®rique du nord',-95.7129,37.0902);
/*!40000 ALTER TABLE `map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `songs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `group` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (1,'Viva La Vida','Coldplay'),(2,'Hallelujiah','Jeff buckley'),(3,'Hedwig\'s Theme','John Williams');
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_instrument` int(10) NOT NULL,
  `src` varchar(120) NOT NULL,
  `type` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source`
--

LOCK TABLES `source` WRITE;
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
INSERT INTO `source` VALUES (1,1,'aaa.mp3','audio/mpeg'),(2,1,'bbb.ogg','audio/ogg'),(3,2,'ccc.mp3','audio/mpeg'),(4,2,'ddd.ogg','audio/ogg'),(5,3,'eee.mp3','audio/mpeg'),(6,3,'@@@.ogg','audio/ogg'),(7,4,'fff.mp3','audio/mpeg'),(8,4,'ggg.ogg','audio/ogg'),(9,5,'hhh.mp3','audio/mpeg'),(10,5,'iii.ogg','audio/ogg'),(11,6,'jjj.mp3','audio/mpeg'),(12,6,'jjj.ogg','audio/ogg'),(13,7,'kkk.mp3','audio/mpeg'),(14,7,'lll.ogg','audio/ogg'),(15,8,'mmm.mp3','audio/mpeg'),(16,8,'nnn.ogg','audio/ogg'),(17,9,'ooo.mp3','audio/mpeg'),(18,9,'ppp.ogg','audio/ogg'),(19,10,'qqq.mp3','audio/mpeg'),(20,10,'qqq.ogg','audio/ogg'),(21,11,'rrr.mp3','audio/mpeg'),(22,11,'sss.ogg','audio/ogg'),(23,12,'ttt.mp3','audio/mpeg'),(24,12,'uuu.ogg','audio/ogg');
/*!40000 ALTER TABLE `source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_song` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_instrument` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracks`
--

LOCK TABLES `tracks` WRITE;
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;
INSERT INTO `tracks` VALUES (1,1,1,1),(2,1,2,2),(3,1,3,3),(4,1,4,4),(5,2,1,5),(6,2,2,6),(7,2,3,7),(8,2,4,8),(9,3,1,9),(10,3,2,10),(11,3,3,11),(12,3,4,12);
/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'melody'),(2,'chords'),(3,'bass'),(4,'drums');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-29 19:05:57
