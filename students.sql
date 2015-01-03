-- MySQL dump 10.13  Distrib 5.5.23, for Win32 (x86)
--
-- Host: localhost    Database: students
-- ------------------------------------------------------
-- Server version	5.5.23

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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` year(4) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `sex` enum('М','Ж') COLLATE utf8_unicode_ci DEFAULT NULL,
  `groupindex` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Василий','Серебряков','theguardian@hotmail.com',1995,189,'М','8723'),(2,'Никита','Артамонов','Nikita99@yandex.ru',1995,150,'М','1473'),(3,'Сергей','Швецов','Semen215@yandex.ru',1993,18,'М','8344'),(4,'Григорий','Симоненко','thybb@lel.com',2001,499,'М','9977'),(5,'Алина','Назарбаева','Alinafemnazi@gore.com',1999,40,'Ж','8300'),(6,'Степан','Брандибак','StepanDestroyer@mail.ru',1987,315,'М','8500'),(7,'Николай','Расторгуев','Rastorguev@hotmail.com',1955,199,'М','8800'),(8,'Волчара\r\n','Абдлгн','cornerstone@gmail.com',1997,280,'Ж','9300'),(9,'Винни','Керчесов','Sick@sa.ru',1901,112,'М','1123'),(10,'Николай','Валуев','Valued23@mail.ru',1971,400,'М','1333'),(11,'Себастьян','Куросава','Dima666@mail.ru',1993,290,'М','9342'),(12,'Николай','Ключников','bane@mail.ru',1996,186,'М','89333'),(13,'Дмитрий','Черепаха','fixit@mail.ru',1998,99,'М','8888'),(14,'Рихард','Гиот','giot@gmail.com',1999,448,'М','6666'),(15,'Имбирь','Иванов','zzz@mail.ru',1999,199,'М','1918'),(16,'Степан','Задорнов','ossl@mail.ru',1999,199,'М','1919'),(17,'Квокпок','Рыбный','nec@yandex.ru',1999,15,'М','1222'),(18,'Клюква','керосин','Domoi@mail.ru',1999,93,'М','9999'),(19,'Никита','Тугриков','ABS@mail.ru',1993,199,'М','99'),(20,'Ник','Перун','zz4@mail.ru',1999,130,'М','9393'),(21,'Кевин','Митник','mitnik@hotmail.com',2005,499,'М','1444'),(22,'Гвэн','Стейси','Gwen@hotmail.com',1993,93,'Ж','1919'),(23,'Грин','Вич','MSS@mail.ru',2001,210,'М','1234'),(24,'Роджер','Рэббит','setrogen@mail.ru',1999,199,'М','4044');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-03 19:00:02
