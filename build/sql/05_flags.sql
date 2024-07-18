-- Adminer 4.8.1 MySQL 9.0.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;
USE `rizyy_docker_ctf`;

DROP TABLE IF EXISTS `flags`;
CREATE TABLE `flags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `challenge_name` text NOT NULL,
  `flag` text NOT NULL,
  `completion_status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

TRUNCATE `flags`;
INSERT INTO `flags` (`id`, `challenge_name`, `flag`, `completion_status`) VALUES
(1,	'sql_injection',	'$2y$09$gaM9EXWos06ko/xSSaFKROd5N6AK7WYIHSau1ruuPaEswVJcpLefe',	0),
(2,	'xss',	'$2y$09$G98BfZmHYD6Ek8jw1y.0Te4eI8i/8e99FBd9ybpL.mkzJjMjpJ36K',	0),
(3,	'idor',	'$2y$09$FMh3o.OaQqovW.25jpp9CO..OQKjv7NT8.PYant4wPwWo1Ad/a6hy',	0),
(4,	'insecure_file_upload',	'$2y$09$pTo88xd7wsK6zuvNvb41O.fVyFoE.JXh1pmb1AiwF3q/ReEZmxfxa',	0),
(5,	'directory_traversal',	'$2y$09$5CP9fwxtubf0KNK4oIiFsOatQ3PFvB57IsWfbb2iSLr8br9si8tGm',	0);

-- 2024-07-18 17:54:38
