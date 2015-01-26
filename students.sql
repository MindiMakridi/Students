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
  `sex` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `groupindex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secretcode` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Василий','Серебряков','theguardian@hotmail.com',1995,189,'Male','8723',NULL),(2,'Никита','Артамонов','Nikita99@yandex.ru',1995,150,'Male','1473',NULL),(3,'Сергей','Швецов','Semen215@yandex.ru',1993,18,'Male','8344',NULL),(4,'Григорий','Симоненко','thybb@lel.com',2001,499,'Male','9977',NULL),(5,'Алина','Назарбаева','Alinafemnazi@gore.com',1999,40,'Female','8300',NULL),(6,'Степан','Брандибак','StepanDestroyer@mail.ru',1987,315,'Male','8500',NULL),(7,'Николай','Расторгуев','Rastorguev@hotmail.com',1955,199,'Male','8800',NULL),(8,'Волчара\r\n','Абдлгн','cornerstone@gmail.com',1997,280,'Female','9300',NULL),(9,'Винни','Керчесов','Sick@sa.ru',1901,112,'Male','1123',NULL),(10,'Николай','Валуев','Valued23@mail.ru',1971,400,'Male','1333',NULL),(11,'Себастьян','Куросава','Dima666@mail.ru',1993,290,'Male','9342',NULL),(12,'Николай','Ключников','bane@mail.ru',1996,186,'Male','89333',NULL),(13,'Дмитрий','Черепаха','fixit@mail.ru',1998,99,'Male','8888',NULL),(14,'Рихард','Гиот','giot@gmail.com',1999,448,'Male','6666',NULL),(15,'Имбирь','Иванов','zzz@mail.ru',1999,199,'Male','1918',NULL),(16,'Степан','Задорнов','ossl@mail.ru',1999,199,'Male','1919',NULL),(17,'Квокпок','Рыбный','nec@yandex.ru',1999,15,'Male','1222',NULL),(18,'Кедр','Кафир','nice@mail.ru',1999,93,'Male','9999',NULL),(19,'Никита','Тугриков','ABS@mail.ru',1993,199,'Male','99',NULL),(20,'Ник','Перун','zz4@mail.ru',1999,130,'Male','9393',NULL),(21,'Кевин','Митник','mitnik@hotmail.com',2005,499,'Male','1444',NULL),(22,'Гвэн','Стейси','Gwen@hotmail.com',1993,93,'Female','1919',NULL),(23,'Грин','Вич','MSS@mail.ru',2001,210,'Male','1234',NULL),(24,'Роджер','Рэббит','rabbit@mail.ru',1999,199,'Male','4044',NULL),(25,'Нельсон','Мандела','Mandela@died.com',1995,111,'Male','1111',NULL),(26,'Найджел','Дыа','Lion@mail.ru',1999,199,'Male','1919',NULL),(27,'Иван','Стыценко','Asfa@mail.ru',1999,199,'Male','1919',NULL),(28,'Александр','Давыдов','Alex@mail.ru',1999,199,'Male','1919',NULL),(29,'Никита','Самсонов','sag@mail.ru',1999,199,'Male','1919',NULL),(30,'Заебало','БЛЯ','SSS@mail.ru',1999,199,'Male','1919',NULL),(31,'Вермут','ыбыы','ZAEBALO@mail.com',1999,199,'Male','1919',NULL),(32,'Настоебло','Мне','Zapolnyat@etu.huyny',1999,199,'Male','1919',NULL),(33,'ффАЫ','фыыы','ssf@mail.ru',1999,199,'Male','1919',NULL),(34,'Соник','Снг','sha@ma.ru',1999,193,'Male','1919',NULL),(35,'Николас','двд','Nickolas@refn.ru',1999,199,'Male','1088',NULL),(36,'Лаура','сфцу','laura@mamba.ru',1999,199,'Female','1919',NULL),(37,'Николай','Свитч','ya@ya.Ya',1999,199,'Male','9999',NULL),(38,'Родео','хкы','Sn@ma.ma',1999,199,'Male','1919',NULL),(39,'Кевин','Смит','Smith@mail.ru',1999,100,'Male','1010',NULL),(40,'Степан','Демидов','nicenicenice@mail.ru',1998,100,'Male','1919',NULL),(41,'Агастас','Гиббонс','Agc@maul.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(42,'Курт','Даы','Kurt@mail.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(43,'Себастьян','Бах','Seb@mail.ru',1999,199,'Male','1919','ef1cb9f7efc31630a83343a898efbeea'),(44,'Ричард','Кнаак','Dick@mail.ru',1999,199,'Male','1919','9ec1c39e7ea09a1cfad07b49cf0142a6'),(45,'Сет','Грин','Seth@mail.ru',1999,199,'Male','1919','81606e762ed2a88f0acffc5d1b72704a'),(46,'Клинт','Иствуд','michman@mail.ru',1999,199,'Male','1919','0b0fca36a5d01fb3943273dfa4750b43'),(47,'Валентин','Демидов','theguardian@hotmail.com',1999,199,'Male','1919','f07019a3e354a699cb01e80dc6176c73'),(48,'Степан','Борода','Step@by.ru',1999,199,'Male','1919','bf671d383274d1f294d58c7b3c8a7069'),(49,'Сергей','Степанов','serg@mail.ru',1999,199,'Male','1919','0aedad7800a4d36d5cabb08c9830a476'),(50,'Дмитрий','Выхин','dmtt@dm.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(51,'Ингеборг','Кафир','gibons@mail.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(52,'Агастас','Гиббонс','xxx@mail.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(53,'Серж','Такинян','nyan@mail.ru',1999,199,'Male','1919','27c0ded091c6d91c4f30ddbda9172ca8'),(54,'Крис','Рок','kris@mail.ru',1999,199,'Male','1919','2d72517d225f73ff1d1a8c4ce570346c'),(55,'Игорь','Сечин','Se4in@maul.ru',1999,199,'Male','1919','7210a567df490aff6d7e53130019be9a'),(56,'Роберт','Баратеон','GoldStag@mail.ru',1999,199,'Male','1919','0846c25347ce33930219e9c48b226ce5'),(57,'Григорий','Распутин','theguardian@hotmail.com',1999,199,'Male','1919','0ed122639784082aa5d20b7ebcd557fe'),(58,'Григорий','Антипенко','theguardian@hotmail.com',1999,199,'Male','1919','c68b5b744d69e2aa3ddb0da4c0d04317'),(59,'Крис','Прэт','Prat@mail.ru',1999,199,'Male','1919','cfec6dfdfa380cf3dbe14adfa8c53da2'),(60,'Зинаида','Семенова','theguardian@hotmail.com',1999,199,'Female','1919','96fc37343834986a1742c444237539ac'),(61,'Кевин','Спейси','Gol@mail.ru',1999,199,'Male','1919','11b6e54330dcd4444d615289e04ce907'),(62,'Сергей','Северин','michman@mail.ru',1999,199,'Male','1919','66a1234f25077e6a296e5f875b22b909'),(63,'Бакстер','Стокман','fafaf@mail,ru',1999,199,'Male','1919','4712bf45dc1718ae3130c47acb668a92'),(64,'Выродок','Тварь','SK@mail,ry',1999,199,'Male','1919','6bbd8aff302f1343ea25a361a999031d'),(65,'Барабан','миы','Semsen215@yandex.ru',1999,199,'Male','1919','a7e26227fafda25b8a2902e479dbac90'),(66,'Сара','Керриган','tge@telenok',1999,199,'Female','1919','0fbf51768a7f1ffb6c5de6a90fdc4744'),(67,'Некто','Никто','dddd@mail.ru',1999,199,'Male','1818','ed765a5eab314119daa0cc97d233508e'),(68,'Степан','Кожух','mm@mm',1999,199,'Male','1919',NULL),(69,'Дебик','Леь','Debik@debik',1999,199,'Male','1919','66ce98484ebcae2db2cf72026431f252'),(70,'Дебик','дддебик','DEub@mail.',1999,199,'Male','1919','1d2b95f119fd6567ce2bb05909c96c76'),(71,'Камино','ЛЫА','kamino@gmail.com',1999,199,'Male','1811','7dc1f1b8d6a02e8b26b7327cd8935c84'),(72,'Сангвиний','Дпф','Sang@mail.ru',1999,199,'Male','1919','6bbd8aff302f1343ea25a361a999031d'),(73,'Механикум','фдпдло','Meh@mail.ru',1999,199,'Male','1919','e05a473a13c1107a82234ebaf4848ae7'),(74,'Тест','тест','test@test',1999,199,'Male','1919','a48dc4b0f65ec92b1dda6abcca744f5e'),(75,'Тестдва','тест','test2@test',1999,199,'Male','1919','b2111fcc8414ac9a3bd3ec360b0de5b7'),(76,'Йактон','Крузэ','Kruze@mail.ru',1993,199,'Male','1919','9b7b171a3716e30684247d0c16a04ae4'),(77,'Локен','Гарвель','Loken@mail.rui',1999,199,'Male','1919','9f5f95016eb457e336f63e61ca77045d'),(78,'Хорус','Аксиманд','littlehorus@mail.ru',1999,199,'Male','1919','b0f6de4b38ed675c12fec7a950dd9e7b'),(79,'Ричард','Никсон','nix@mail.ru',1999,199,'Male','1919','753973da179f0a2f01cae867a178ffd5'),(80,'Кельвин','Кляйн','Eeager@maul',1999,199,'Male','1919','01c4de40ee2e3404f477c7cd90618d9d'),(81,'Робаут','Жилиман','Guliman@a',1999,199,'Male','1919','ad901ab0014d753eaa2045dfa354786b'),(82,'Рогал','Дорн','Rogal@dorn',1999,199,'Male','1919','1daf184e2a079cc1b8713c1629f2f318'),(83,'ДЖагатай','Хан','Khan@mail.ru',1999,199,'Male','1919','5cb1afb64d56aa490c8c005a45a7b6bf'),(84,'Феррус','Манус','ironhands@mail.ru',1999,199,'Male','1919','1371c9a2cfdaf787fcb56b0f0523fbd5'),(85,'Пертурабо','нмн','Perturabo@maul',1999,199,'Male','1919','75cf11e7e92eec1b755db3fd0bcb7e5e'),(86,'Стив','Роджерс','Steve@mail.ru',1999,199,'Male','1919','1c6058e6b3220776d9032ba57a3499a2'),(87,'Марлон','Брандо','mr@mr',1999,199,'Male','1919','92838cec61f9e84a17ae84030cbb30bb'),(88,'Дмиж','Керри','carry@mai',1999,199,'Male','1919','48128b299f49bec1923803c5c7ebbfdf'),(89,'Джон','Фоссовей','fov@mail.ru',1999,199,'Male','1919','608cd20cb8e035bd21f9abc3df98fa3e'),(90,'Киану','Ривз','theone@mail.ru',1999,199,'Male','1919','edc90b0741287d261e936a4610b1b317'),(91,'чук','гек','CHUCK@CHUCK',1999,199,'Male','1919','4727a04ad382a9a5df10e1dbb85b6fae'),(92,'Смесь','Цемента','msga@mail.ru',1999,199,'Male','1919','f10800a389384fce91874604b4a38415'),(93,'Доминик','кокошник','ms@pain.ru',1999,199,'Male','1919','cccb068bf08648ec489766580cf08664'),(94,'Корвин','Мейстер','SSSH@maui',1999,199,'Male','1919','a9457a30c74c13f4e92f058d93eb22b8'),(95,'Изекиль','Аббаддон','abbadon@eyeofterror.com',1999,199,'Male','1919','69af80b0e12bf23264f15566e6aeaef2'),(96,'Кенни','Маккормик','Kenny@mail.ru',1999,199,'Male','1919','7c2b8135dea6815a569a4d430d059574');
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

-- Dump completed on 2015-01-26 13:01:02
