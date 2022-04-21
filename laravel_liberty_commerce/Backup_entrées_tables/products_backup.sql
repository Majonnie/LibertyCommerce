-- MySQL dump 10.13  Distrib 8.0.27, for macos11.6 (x86_64)
--
-- Host: localhost    Database: liberty_commerce
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (15,'Burger',47,7.00,'Etats-Unis','1638176807_burger.jpeg','Un burger au boeuf et au fromage de chèvre.'),(16,'Burger rose',39,7.00,'Etats-Unis','1638176822_burger_rose.jpeg','Un burger au boeuf et au cheddar, mais rose (parce que c\'est beau).'),(17,'Paëlla',56,15.00,'Espagne','1638176702_paella.jpeg','Une merveilleuse paëlla aux divers fruits de mer.'),(19,'Tortilla',33,4.00,'Espagne','1638176730_tortilla.jpeg','Une tortilla pour 5 personnes à partager en famille ou entre amis. :)'),(20,'Raclette',23,20.00,'France','1638176533_raclette.jpg','Raclette complète contenant des pommes de terre, différents fromages et sortes de charcuterie. (Appareil non fourni)'),(21,'BAGUETTE',666,0.75,'France','1638176410_baguette.jpeg','UNE BAGUETTE'),(22,'Sushis',44,5.00,'Japon','1638176832_sushis.jpeg','Lot de 3 différents sushis aléatoires parmi les variétés proposées par notre site.'),(23,'Vol au vent',18,10.00,'France','1638176654_vol_au_vent.jpeg','Truc feuilleté stylé c\'est bon bam'),(24,'Pain au chocolatine',2000,3.00,'France','1638176507_painauchocolat.jpeg','A u   s e c o u r s'),(25,'Bœuf bourguignon',32,17.00,'France','1638176480_boeuf_bourguignon.jpeg','Morceaux de bœuf cuits longuement en cocotte au vin de Bourgogne, avec carottes et champignons.');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 15:46:58
