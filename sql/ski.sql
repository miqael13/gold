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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `jeverlies` */

insert  into `jeverlies`(`id`,`userId`,`categoryId`,`weight`,`stone`,`karat`,`price`,`type`,`sex`,`pic1`,`pic2`,`created`,`modefied`) values (39,15,1,45345,'1',345345,345345,'BIJOU','MEN','91bdfb89a10e874245dc93e2f9c4f594.jpg','31cf6bdb14864e063336f1757f211d0e.png','2013-03-16 00:22:34',NULL),(40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-16 00:25:10',NULL),(41,15,2,234,'10',67467,677657,'BIJOU','MEN','e82a472313a6c6eafd62525462da251b.jpg','2610efb87dbd62017f9bb4c400cb0277.jpg','2013-03-16 20:10:51',NULL),(42,15,6,10.6,'1',20,500,'BIJOU','MEN','01cc75aaf5c42b7ed222c80aab05b090.jpg','7ae0a38b5e9358f1acf6f5da54cde42f.jpg','2013-03-16 20:11:16',NULL),(43,15,6,234234,'1',500,9620,'BIJOU','WOMEN','f30cc209d8f102697d0674879d8c6a0c.jpg','ec866aa5d61f3cbf5098ee13cb605c5c.jpg','2013-03-16 20:12:27',NULL),(44,15,11,234234,'14',300,5645,'BIJOU','MEN',NULL,NULL,'2013-03-16 20:13:14',NULL),(45,15,1,545454,'1',45454,4545,'BIJOU','MEN',NULL,NULL,'2013-03-16 20:14:00',NULL),(46,15,1,45454,'1',4545,45454,'BIJOU','MEN',NULL,NULL,'2013-03-16 20:14:07',NULL),(47,15,1,45454,'1',4545,454545,'BIJOU','MEN','f325806e40a8fe3f33e46900f4eedab1.jpg',NULL,'2013-03-16 20:14:21',NULL),(48,15,1,343443,'1',4344,34343,'BIJOU','MEN',NULL,NULL,'2013-03-16 20:14:40',NULL),(49,15,1,343443,'1',4344,34343,'BIJOU','MEN',NULL,NULL,'2013-03-16 20:15:19',NULL),(50,16,1,31231,'1',123123,1231231,'BIJOU','MEN','46f73c18827ddd02c30be3a2bbedb8a0.jpg','ccac1beee2072b00e6b79edf1fbdd800.jpg','2013-03-16 20:22:32',NULL);

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
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modefied` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstName`,`lastName`,`email`,`phone`,`address`,`pavilion`,`limit`,`startDate`,`endDate`,`active`,`created`,`modefied`) values (15,'Arsen','Petrosyan','arsen1500@list.ru',93445309,'V.papazyan','dfgdfgdfg',10,'2013-03-16','2013-04-20',1,'2013-03-15 21:49:39',NULL),(16,'Miqael','Alaverdyan','miqael.alaverdyan@gmail.com',77140889,'V.papazyan','17',10,NULL,NULL,NULL,'2013-03-16 20:22:03',NULL);
