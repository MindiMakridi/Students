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
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` year(4) NOT NULL,
  `points` int(11) NOT NULL,
  `sex` enum('М','Ж') COLLATE utf8_unicode_ci NOT NULL,
  `groupindex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secretcode` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Василий','Серебряков','theguardian@hotmail.com',1995,189,'М','8723',NULL),(2,'Никита','Артамонов','Nikita99@yandex.ru',1995,150,'М','1473',NULL),(3,'Сергей','Швецов','Semen215@yandex.ru',1993,18,'М','8344',NULL),(4,'Григорий','Симоненко','thybb@lel.com',2001,499,'М','9977',NULL),(5,'Алина','Назарбаева','Alinafemnazi@gore.com',1999,40,'Ж','8300',NULL),(6,'Степан','Брандибак','StepanDestroyer@mail.ru',1987,315,'М','8500',NULL),(7,'Николай','Расторгуев','Rastorguev@hotmail.com',1955,199,'М','8800',NULL),(8,'Волчара\r\n','Абдлгн','cornerstone@gmail.com',1997,280,'Ж','9300',NULL),(9,'Винни','Керчесов','Sick@sa.ru',1901,112,'М','1123',NULL),(10,'Николай','Валуев','Valued23@mail.ru',1971,400,'М','1333',NULL),(11,'Себастьян','Куросава','Dima666@mail.ru',1993,290,'М','9342',NULL),(12,'Николай','Ключников','bane@mail.ru',1996,186,'М','89333',NULL),(13,'Дмитрий','Черепаха','fixit@mail.ru',1998,99,'М','8888',NULL),(14,'Рихард','Гиот','giot@gmail.com',1999,448,'М','6666',NULL),(15,'Имбирь','Иванов','zzz@mail.ru',1999,199,'М','1918',NULL),(16,'Степан','Задорнов','ossl@mail.ru',1999,199,'М','1919',NULL),(17,'Квокпок','Рыбный','nec@yandex.ru',1999,15,'М','1222',NULL),(18,'Кедр','Кафир','nice@mail.ru',1999,93,'М','9999',NULL),(19,'Никита','Тугриков','ABS@mail.ru',1993,199,'М','99',NULL),(20,'Ник','Перун','zz4@mail.ru',1999,130,'М','9393',NULL),(21,'Кевин','Митник','mitnik@hotmail.com',2005,499,'М','1444',NULL),(22,'Гвэн','Стейси','Gwen@hotmail.com',1993,93,'Ж','1919',NULL),(23,'Грин','Вич','MSS@mail.ru',2001,210,'М','1234',NULL),(24,'Роджер','Рэббит','rabbit@mail.ru',1999,199,'М','4044',NULL),(25,'Нельсон','Мандела','Mandela@died.com',1995,111,'М','1111',NULL),(26,'Найджел','Дыа','Lion@mail.ru',1999,199,'М','1919',NULL),(27,'Иван','Стыценко','Asfa@mail.ru',1999,199,'М','1919',NULL),(28,'Александр','Давыдов','Alex@mail.ru',1999,199,'М','1919',NULL),(29,'Никита','Самсонов','sag@mail.ru',1999,199,'М','1919',NULL),(30,'Заебало','БЛЯ','SSS@mail.ru',1999,199,'М','1919',NULL),(31,'Вермут','ыбыы','ZAEBALO@mail.com',1999,199,'М','1919',NULL),(32,'Настоебло','Мне','Zapolnyat@etu.huyny',1999,199,'М','1919',NULL),(33,'ффАЫ','фыыы','ssf@mail.ru',1999,199,'М','1919',NULL),(34,'Соник','Снг','sha@ma.ru',1999,193,'М','1919',NULL),(35,'Николас','двд','Nickolas@refn.ru',1999,199,'М','1088',NULL),(36,'Лаура','сфцу','laura@mamba.ru',1999,199,'Ж','1919',NULL),(37,'Николай','Свитч','ya@ya.Ya',1999,199,'М','9999',NULL),(38,'Родео','хкы','Sn@ma.ma',1999,199,'М','1919',NULL),(39,'Кевин','Смит','Smith@mail.ru',1999,100,'М','1010',NULL),(40,'Степан','Демидов','nicenicenice@mail.ru',1998,100,'М','1919',NULL),(41,'абв','гвж','abc@mail.ru',1999,199,'М','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(42,'Курт','Даы','Kurt@mail.ru',1999,199,'М','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(43,'Себастьян','Бах','Seb@mail.ru',1999,199,'М','1919','ef1cb9f7efc31630a83343a898efbeea'),(44,'Ричард','Кнаак','Dick@mail.ru',1999,199,'М','1919','9ec1c39e7ea09a1cfad07b49cf0142a6'),(45,'Сет','Грин','Seth@mail.ru',1999,199,'М','1919','81606e762ed2a88f0acffc5d1b72704a'),(46,'Клинт','Иствуд','michman@mail.ru',1999,199,'М','1919','0b0fca36a5d01fb3943273dfa4750b43');
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

-- Dump completed on 2015-01-11 13:01:59
