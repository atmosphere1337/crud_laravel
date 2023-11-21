CREATE DATABASE laravel; 
USE laravel
DROP TABLE IF EXISTS `entities`;
CREATE TABLE `entities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `population` int NOT NULL,
  `owner` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `entities` WRITE;
INSERT INTO `entities` VALUES (1,'Moscow','Russia',12,2),(2,'London','England',9,3),(3,'Paris','France',2,4),(4,'Washington','U.S',7,2),(5,'Beijing','China',21,3);
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (2,'test','$2y$10$kPAUSwDmTJ71jEP8QL/LneuLdbpswfK6eaSPi50KN30oIFeZwrhE2','user',0),(3,'root','$2y$10$e6rVmQnBZ6gxinI273UM.eW9FEQch.Mp3yKl6U5VaWd5uZwUU8vg.','user',0),(4,'admin','$2y$10$EbUfGfDRk/yhCu8vXHQeM.UJqMnpnCi8FNv3hbxnhajWAq8xagr6G','user',0);
UNLOCK TABLES;
