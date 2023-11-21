CREATE DATABASE test; 
USE test
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int NOT NULL,
  `name` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `person` WRITE;
INSERT INTO `person` VALUES (1,'igor'),(2,'boldyrev'),(3,'boldyrev'),(4,'sergeevich');
UNLOCK TABLES;
