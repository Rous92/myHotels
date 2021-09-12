-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: myhotels
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `leaving_date` date NOT NULL,
  `num_of_guests` tinyint NOT NULL,
  `room_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_rooms_id_fk` (`room_id`),
  CONSTRAINT `bookings_rooms_id_fk` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (10,'Helena','Pacheco','hpacheco@email.com','2021-07-09','2021-07-12',2,10),(20,'Martin','Mestre','mmestre@email.com','2021-08-10','2021-08-11',2,31),(21,'Jacinta','Chacón','jchacon@email.com','2021-08-19','2021-08-21',2,32),(40,'Guillermo','Sancho','gsancho@email.com','2021-09-19','2021-09-24',1,21),(41,'Rosana','Barceló','rbarcelo@email.com','2021-09-16','2021-09-21',2,22),(42,'Sofía','Bartolomé','sbartolome@email.com','2021-07-03','2021-07-08',3,23),(43,'Aitor','Recio','arecio@email.com','2021-08-08','2021-08-13',2,25),(60,'Andrea','Prats','aprats@email.com','2021-08-05','2021-08-15',1,50),(61,'Noel','Sousa','nsousa@email.com','2021-07-27','2021-07-31',2,51),(62,'Paula','Sánchez','psanchez@email.com','2021-09-25','2021-10-01',3,52),(63,'Raúl','Pérez','rperez@email.com','2021-09-05','2021-09-07',3,54),(64,'Carlos','Casado','ccasado@email.com','2021-07-19','2021-07-24',4,56),(65,'Miguel','Santos','msantos@email.com','2021-07-20','2021-07-24',1,57),(66,'Aina','Valls','avalls@email.com','2021-08-23','2021-08-26',1,59);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_bookings`
--

DROP TABLE IF EXISTS `hotel_bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotel_bookings` (
  `hotel_id` bigint unsigned NOT NULL,
  `booking_id` bigint unsigned NOT NULL,
  KEY `hotel_bookings_hotels_id_fk` (`hotel_id`),
  KEY `hotel_bookings_bookings_id_fk` (`booking_id`),
  CONSTRAINT `hotel_bookings_bookings_id_fk` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  CONSTRAINT `hotel_bookings_hotels_id_fk` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_bookings`
--

LOCK TABLES `hotel_bookings` WRITE;
/*!40000 ALTER TABLE `hotel_bookings` DISABLE KEYS */;
INSERT INTO `hotel_bookings` VALUES (100,10),(300,20),(300,21),(200,40),(200,41),(200,42),(200,43),(500,60),(500,61),(500,62),(500,63),(500,64),(500,65),(500,66);
/*!40000 ALTER TABLE `hotel_bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_rooms`
--

DROP TABLE IF EXISTS `hotel_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotel_rooms` (
  `hotel_id` bigint unsigned NOT NULL,
  `room_id` bigint unsigned NOT NULL,
  KEY `hotel_rooms_hotels_id_fk` (`hotel_id`),
  CONSTRAINT `hotel_rooms_hotels_id_fk` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_rooms`
--

LOCK TABLES `hotel_rooms` WRITE;
/*!40000 ALTER TABLE `hotel_rooms` DISABLE KEYS */;
INSERT INTO `hotel_rooms` VALUES (100,10),(200,20),(300,30),(400,40),(500,50),(100,11),(100,12),(200,21),(200,22),(200,23),(200,24),(300,31),(400,41),(500,51),(500,52),(500,53),(500,54),(500,55),(500,56),(500,57),(500,58),(500,59);
/*!40000 ALTER TABLE `hotel_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` tinyint NOT NULL,
  `rooms` tinyint NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (100,'Hotel Girona','Carrer Girona 123, Girona',4,3,'123456789'),(200,'Hotel Barcelona','Carrer Barcelona 456, Barcelona',5,5,'234567890'),(300,'Hotel Tarragona','Carrer Tarragona 678, Tarragona',2,2,'345678901'),(400,'Hotel Lleida','Carrer Lleida 234, Lleida',3,2,'456789012'),(500,'Hotel Madrid','Calle Madrid 567, Madrid',5,10,'567890123');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` bigint unsigned NOT NULL,
  `num_of_guests` tinyint NOT NULL,
  `num_of_beds` tinyint NOT NULL,
  `has_terrace` tinyint(1) NOT NULL,
  `has_television` tinyint(1) NOT NULL,
  `has_air_conditioner` tinyint(1) NOT NULL,
  `has_safe` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (10,2,1,0,1,0,0),(11,3,2,1,1,0,0),(12,4,4,1,1,1,1),(21,1,1,0,1,0,0),(22,2,1,1,1,1,1),(23,3,1,0,1,1,0),(24,4,1,0,1,0,1),(25,2,1,0,1,1,1),(31,2,1,0,1,0,0),(32,2,2,0,1,0,0),(40,2,1,1,1,0,0),(41,2,1,1,1,0,0),(50,2,1,0,1,0,0),(51,2,1,1,1,0,0),(52,3,1,0,1,0,0),(53,3,1,1,1,0,1),(54,3,1,1,1,0,0),(55,4,1,0,1,0,0),(56,4,1,1,1,1,1),(57,1,1,0,1,0,1),(58,1,1,0,1,0,1),(59,1,1,0,1,0,1);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-12 22:58:11
