-- Adminer 4.8.1 MySQL 8.3.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `rizyy_docker_ctf`;
CREATE DATABASE `rizyy_docker_ctf` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rizyy_docker_ctf`;

DROP TABLE IF EXISTS `login_credentials`;
CREATE TABLE `login_credentials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

TRUNCATE `login_credentials`;
INSERT INTO `login_credentials` (`id`, `username`, `password`, `email`, `phone`) VALUES
(1,	'maeve',	'$2y$09$qUumw0uYKZMaiSP2CpgLAuru5LNjnQLWKBwMA2zHpmP6u6VazW6/m',	'maeve@gmail.com',	1234567890);

-- 2024-07-16 06:32:06
