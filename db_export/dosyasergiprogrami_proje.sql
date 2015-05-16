CREATE DATABASE  IF NOT EXISTS `dosyasergiprogrami` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dosyasergiprogrami`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: dosyasergiprogrami
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `proje`
--

DROP TABLE IF EXISTS `proje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proje` (
  `ProjeID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjeBaslik` varchar(75) DEFAULT NULL,
  `YuklemeTarihi` datetime DEFAULT NULL,
  `Bilgilendirme` varchar(300) DEFAULT NULL,
  `DosyaLink` varchar(70) DEFAULT NULL,
  `ResimLink` varchar(70) DEFAULT NULL,
  `KullaniciID` int(11) DEFAULT NULL,
  `DersID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProjeID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proje`
--

LOCK TABLES `proje` WRITE;
/*!40000 ALTER TABLE `proje` DISABLE KEYS */;
INSERT INTO `proje` VALUES (1,'odev1',NULL,'php odev1 aciklama bolumu','resim_dosya/EkranGoruntusu_odev1_1_1.jpg','resim_dosya/Dosya_odev1_1_1.zip',1,1),(2,'odev2',NULL,'php odev2','resim_dosya/EkranGoruntusu_odev2_1_1.jpg','resim_dosya/Dosya_odev2_1_1.zip',1,1),(3,'soru_cozumleri1',NULL,'sayisal tasarim 1 soru cozumleri odevim','resim_dosya/EkranGoruntusu_soru_cozumleri1_1_6.jpg','resim_dosya/Dosya_soru_cozumleri1_1_6.zip',1,6),(4,'java_vize_odev1',NULL,'java dersi vize 1. odevi','resim_dosya/EkranGoruntusu_java_vize_odev1_2_2.jpg','resim_dosya/Dosya_java_vize_odev1_2_2.zip',2,2),(5,'tasarÄ±m_odev1',NULL,'sayÄ±sal tasarÄ±m 1. odevim','resim_dosya/EkranGoruntusu_tasarÄ±m_odev1_2_6.jpg','resim_dosya/Dosya_tasarÄ±m_odev1_2_6.zip',2,6),(6,'odev1',NULL,'tasarim odev1','resim_dosya/EkranGoruntusu_odev1_2_6.jpg','resim_dosya/Dosya_odev1_2_6.zip',2,6);
/*!40000 ALTER TABLE `proje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-14  5:01:58
