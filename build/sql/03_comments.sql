-- Adminer 4.8.1 MySQL 9.0.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;
USE `rizyy_docker_ctf`;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `player` text NOT NULL,
  `username` text NOT NULL,
  `comment` text NOT NULL,
  `comment_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

TRUNCATE `comments`;
INSERT INTO `comments` (`id`, `player`, `username`, `comment`, `comment_time`) VALUES
(1,	'scream',	'maeve',	'yep',	'2024-07-16 17:22:46'),
(2,	'scream',	'maeve',	'ok bro',	'2024-07-16 17:34:50'),
(3,	'tenz',	'maeve',	'ok tenz',	'2024-07-16 18:13:15'),
(4,	'shroud',	'maeve',	'im good',	'2024-07-16 18:16:40');

-- 2024-07-16 18:21:25
