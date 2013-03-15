/*
SQLyog Ultimate v8.32 
MySQL - 5.5.16 : Database - gold
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gold` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gold`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`login`,`password`,`created`,`modified`) values (1,'Miqael','Miqael','likmuf13',NULL,NULL);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`created`,`modified`) values (1,'Колье',NULL,NULL),(2,'Кольцо',NULL,NULL),(3,'Серьги',NULL,NULL),(4,'Браслет',NULL,NULL),(5,'Цепь',NULL,NULL),(6,'Кулон',NULL,NULL),(7,'Часы',NULL,NULL),(8,'Пирстинг',NULL,NULL),(9,'Перстень',NULL,NULL),(10,'Брошь',NULL,NULL),(11,'Запонки',NULL,NULL),(12,'Зажимы для галстуков',NULL,NULL);

/*Table structure for table `jeverlies` */

DROP TABLE IF EXISTS `jeverlies`;

CREATE TABLE `jeverlies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `stone` varchar(255) DEFAULT NULL,
  `karat` float DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` enum('BIJOU','WHITE','GOLDEN') DEFAULT NULL,
  `sex` enum('MEN','WOMEN') DEFAULT NULL,
  `pic1` varchar(255) DEFAULT NULL,
  `pic2` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modefied` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `jeverlies` */

insert  into `jeverlies`(`id`,`userId`,`categoryId`,`weight`,`stone`,`karat`,`price`,`type`,`sex`,`pic1`,`pic2`,`created`,`modefied`) values (25,15,5,10.6,'5',100,9566,'BIJOU','MEN','766bc93da90ce5a80c97420b3c367353.jpg','b2410d1e36f5b3ce083478d2f8dbf203.png','2013-03-15 23:00:51',NULL),(26,15,3,44444,'19',200,44444,'GOLDEN','WOMEN','82dd53796d992eba466c4ac022c35aa3.jpg','83375d678b00500eb39bf65ad6627395.png','2013-03-15 23:16:50',NULL);

/*Table structure for table `stones` */

DROP TABLE IF EXISTS `stones`;

CREATE TABLE `stones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modifed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `stones` */

insert  into `stones`(`id`,`title`,`created`,`modifed`) values (1,'Изумруд',NULL,NULL),(2,'Корунд',NULL,NULL),(3,'Сапфир',NULL,NULL),(4,'Гранат',NULL,NULL),(5,'Опал',NULL,NULL),(6,'Рубин',NULL,NULL),(7,'Бриллиант',NULL,NULL),(8,'Коралл',NULL,NULL),(9,'Перламутр',NULL,NULL),(10,'Жемчуг',NULL,NULL),(11,'Янтарь',NULL,NULL),(12,'Бирюза',NULL,NULL),(13,'Аметист',NULL,NULL),(14,'Александрит',NULL,NULL),(15,'Аквамарин',NULL,NULL),(16,'Топаз',NULL,NULL),(17,'Лазурит',NULL,NULL),(18,'Оникс',NULL,NULL),(19,'Жадеит',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pavilion` varchar(255) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modefied` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstName`,`lastName`,`email`,`phone`,`address`,`pavilion`,`limit`,`startDate`,`endDate`,`created`,`modefied`) values (15,'Arsen','Petrosyan','arsen1500@list.ru',93445309,'V.papazyan','dfgdfgdfg',20,NULL,NULL,'2013-03-15 21:49:39',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
