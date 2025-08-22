-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour recensement
CREATE DATABASE IF NOT EXISTS `recensement` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `recensement`;

-- Listage de la structure de table recensement. agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `contact` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cin` varchar(20) NOT NULL,
  `matricule` int NOT NULL,
  `situation_matrimoniale` varchar(50) NOT NULL,
  `date_entree` date NOT NULL,
  `corps` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `indice` varchar(20) DEFAULT NULL,
  `qualite` varchar(50) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `direction` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `niveau` tinyint NOT NULL DEFAULT '3',
  `reference` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `statut` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.agents : ~2 rows (environ)
REPLACE INTO `agents` (`id`, `nom`, `prenom`, `date_naissance`, `contact`, `cin`, `matricule`, `situation_matrimoniale`, `date_entree`, `corps`, `grade`, `indice`, `qualite`, `localisation`, `direction`, `created_at`, `updated_at`, `deleted_at`, `photo`, `password`, `niveau`, `reference`, `email`, `adresse`, `statut`) VALUES
	(2, 'RAOBELISON', 'Kanto Jerry', '2004-01-27', '0340257574', '457789956658', 1, 'Celibataire', '2023-02-10', 'sous-operateur', '1C2E', '0001', 'HEE', 'Antananarivo', 'DRH', '2025-05-16 11:05:46', '2025-08-06 16:58:16', NULL, 'agent_id2_1750247763_930f3cf739243e92dd94.jpg', '$2y$10$4n2W.jfBW1S6lSVp3KGm1ea7MFicO3z.EhQMK9ncgBMRthJjvoh0e', 1, NULL, 'jessicaraharimamonjy@gmail.com', 'Ankadindramamy', NULL),
	(4, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '232256658895', 2, 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'HEE', 'Boeny', 'DSI', '2025-06-06 11:16:19', '2025-06-18 12:39:21', NULL, NULL, '', 2, NULL, 'jeanjacks@gmail.com', 'Nanisana', NULL);

-- Listage de la structure de table recensement. archives
CREATE TABLE IF NOT EXISTS `archives` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_matricule` varchar(20) NOT NULL,
  `agent_matricule` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `details` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.archives : ~14 rows (environ)
REPLACE INTO `archives` (`id`, `user_matricule`, `agent_matricule`, `action`, `details`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '123456', '000003', 'ajout', '{"matricule":"000003","nom":"Solo","prenom":"Romea","date_naissance":"2000-05-14","contact":"0341756592","cin":"102320265852","situation_matrimoniale":"Celibataire","date_entree":"2024-03-02","corps":"sous-operateur","grade":"1C2E","indice":"1256","qualite":"ELD","localisation":"Amoroni-mania","direction":"DSI","agent_id":3,"date_archivage":"2025-05-26 11:55:13"}', '2025-05-26 12:55:13', '2025-05-26 12:55:13', NULL),
	(2, '123456', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Mari\\u00e9","date_entree":"2023-02-10","corps":"sous-operateur","grade":"1C2E","indice":"0001","qualite":"EFA","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-05-26 11:45:30","deleted_at":null,"photo":null,"password":"","niveau":"3"},"apres":{"matricule":"1","corps":"sous-operateur","nom":"RAOBELISON","grade":"1C2E","prenom":"Kanto Jerry","indice":"0001","date_naissance":"2004-01-27","date_entree":"2023-02-10","contact":"0340257574","direction":"DRH","cin":"457789956658","qualite":"EFA","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-05-26 12:56:29', '2025-05-26 12:56:29', NULL),
	(3, '123456', '3', 'suppression', '{"id":"3","nom":"Solo","prenom":"Romea","date_naissance":"2000-05-14","contact":"0341756592","cin":"102320265852","matricule":"3","situation_matrimoniale":"Celibataire","date_entree":"2024-03-02","corps":"sous-operateur","grade":"1C2E","indice":"1256","qualite":"ELD","localisation":"Amoroni-mania","direction":"DSI","created_at":"2025-05-26 11:55:13","updated_at":"2025-05-26 11:55:13","deleted_at":null,"photo":null,"password":"","niveau":"3","agent_id":"3","date_archivage":"2025-05-26 12:51:04"}', '2025-05-26 13:51:04', '2025-05-26 13:51:04', NULL),
	(4, '1', '000002', 'ajout', '{"matricule":"000002","nom":"RAJOSY","prenom":"Steeven","date_naissance":"2004-02-16","contact":"0344552556","cin":"232256658895","situation_matrimoniale":"Celibataire","date_entree":"2023-02-02","corps":"sous-operateur","grade":"1C1E","indice":"2569","qualite":"EFA","localisation":"Boeny","direction":"DSI","agent_id":5,"date_archivage":"2025-06-06 11:20:20"}', '2025-06-06 12:20:21', '2025-06-06 12:20:21', NULL),
	(5, '1', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"ELD","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-05-16 09:02:05","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"FONCTIONNAIRE","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-06 12:23:52', '2025-06-06 12:23:52', NULL),
	(6, '1', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"FONCTIONNAIRE","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-06 11:23:51","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"FONCTIONNAIRE","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-06 12:41:53', '2025-06-06 12:41:53', NULL),
	(7, '1', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"FONCTIONNAIRE","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-06 11:41:53","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"EFA","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-06 12:47:44', '2025-06-06 12:47:44', NULL),
	(8, '1', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"EFA","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-06 11:47:43","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"ELD","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-06 13:25:26', '2025-06-06 13:25:26', NULL),
	(9, '1', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"sous-operateur","grade":"1C2E","indice":"0001","qualite":"EFA","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-06-06 09:18:03","deleted_at":null,"photo":null,"password":"$2y$10$cnF\\/YgpnR\\/6DYQTafpz9pex2cDuEBhRuUU2U7XcphF1ZcnErt77Gm","niveau":"2"},"apres":{"matricule":"1","corps":"sous-operateur","nom":"RAOBELISON","grade":"1C2E","prenom":"Kanto Jerry","indice":"0001","date_naissance":"2004-01-27","date_entree":"2023-02-10","contact":"0340257574","direction":"DRH","cin":"457789956658","qualite":"FONCTIONNAIRE","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-06 13:32:13', '2025-06-06 13:32:13', NULL),
	(10, '1', '2', 'suppression', '{"id":"5","nom":"RAJOSY","prenom":"Steeven","date_naissance":"2004-02-16","contact":"0344552556","cin":"232256658895","matricule":"2","situation_matrimoniale":"Celibataire","date_entree":"2023-02-02","corps":"sous-operateur","grade":"1C1E","indice":"2569","qualite":"EFA","localisation":"Boeny","direction":"DSI","created_at":"2025-06-06 11:20:20","updated_at":"2025-06-06 11:20:20","deleted_at":null,"photo":null,"password":"","niveau":"3","agent_id":"5","date_archivage":"2025-06-06 12:38:11"}', '2025-06-06 13:38:11', '2025-06-06 13:38:11', NULL),
	(11, '1', '2', 'modification', '{"avant":{"id":"4","nom":"RAJOSY","prenom":"Steeven","date_naissance":"2004-02-16","contact":"0344552556","cin":"232256658895","matricule":"2","situation_matrimoniale":"Celibataire","date_entree":"2023-02-02","corps":"sous-operateur","grade":"1C1E","indice":"2569","qualite":"EFA","localisation":"Boeny","direction":"DSI","created_at":"2025-06-06 11:16:19","updated_at":"2025-06-06 11:16:19","deleted_at":null,"photo":null,"password":"","niveau":"3"},"apres":{"matricule":"2","corps":"sous-operateur","nom":"RAJOSY","grade":"1C1E","prenom":"Steeven","indice":"2569","date_naissance":"2004-02-16","date_entree":"2023-02-02","contact":"0344552556","direction":"DSI","cin":"232256658895","qualite":"HEE","situation_matrimoniale":"Celibataire","localisation":"Boeny"}}', '2025-06-06 13:39:16', '2025-06-06 13:39:16', NULL),
	(12, '', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"FONCTIONNAIRE","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-16 10:45:10","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"FONCTIONNAIRE","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-16 11:48:49', '2025-06-16 11:48:49', NULL),
	(13, '', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"FONCTIONNAIRE","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-16 10:48:48","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DSI","cin":"510012030154","qualite":"ELD","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-16 11:49:01', '2025-06-16 11:49:01', NULL),
	(14, '', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"sous-operateur","grade":"1C2E","indice":"0001","qualite":"FONCTIONNAIRE","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-06-06 12:32:13","deleted_at":null,"photo":null,"password":"$2y$10$cnF\\/YgpnR\\/6DYQTafpz9pex2cDuEBhRuUU2U7XcphF1ZcnErt77Gm","niveau":"1"},"apres":{"matricule":"1","corps":"sous-operateur","nom":"RAOBELISON","grade":"1C2E","prenom":"Kanto Jerry","indice":"0001","date_naissance":"2004-01-27","date_entree":"2023-02-10","contact":"0340257574","direction":"DRH","cin":"457789956658","qualite":"HEE","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-16 12:01:16', '2025-06-16 12:01:16', NULL),
	(15, '', '123456', 'modification', '{"avant":{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"ELD","localisation":"Antananarivo","direction":"DSI","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-16 10:49:01","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3"},"apres":{"matricule":"123456","corps":"encadreur","nom":"RAHARIMAMONJY","grade":"1C1E","prenom":"Soloniaina Jessica","indice":"1234","date_naissance":"2002-10-30","date_entree":"2024-11-15","contact":"0380993895","direction":"DRH","cin":"510012030154","qualite":"ELD","situation_matrimoniale":"Celibataire","localisation":"Antananarivo"}}', '2025-06-16 12:01:48', '2025-06-16 12:01:48', NULL),
	(16, '', '123456', 'suppression', '{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"ELD","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-16 11:01:48","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3","agent_id":"1","date_archivage":"2025-06-16 11:27:49"}', '2025-06-16 12:27:49', '2025-06-16 12:27:49', NULL);

-- Listage de la structure de table recensement. archive_agents
CREATE TABLE IF NOT EXISTS `archive_agents` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` int unsigned NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `matricule` varchar(255) NOT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `situation_matrimoniale` varchar(50) DEFAULT NULL,
  `date_entree` date DEFAULT NULL,
  `corps` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `indice` varchar(20) DEFAULT NULL,
  `qualite` varchar(50) DEFAULT NULL,
  `localisation` varchar(100) DEFAULT NULL,
  `direction` varchar(100) DEFAULT NULL,
  `date_archivage` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.archive_agents : ~22 rows (environ)
REPLACE INTO `archive_agents` (`id`, `agent_id`, `nom`, `prenom`, `date_naissance`, `contact`, `matricule`, `cin`, `situation_matrimoniale`, `date_entree`, `corps`, `grade`, `indice`, `qualite`, `localisation`, `direction`, `date_archivage`, `created_at`, `deleted_at`, `updated_at`) VALUES
	(1, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DRH', '2025-06-16 11:27:49', '2025-05-13 09:22:52', NULL, '2025-06-16 11:01:48'),
	(2, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'sous-operateur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DSI', '2025-05-13 09:23:28', '2025-05-13 09:23:28', NULL, '2025-05-13 09:23:28'),
	(3, 3, 'Solo', 'Romea', '2000-05-14', '0341756592', '3', '102320265852', 'Celibataire', '2024-03-02', 'sous-operateur', '1C2E', '1256', 'ELD', 'Amoroni-mania', 'DSI', '2025-05-26 12:51:04', '2025-05-26 11:55:13', NULL, '2025-05-26 11:55:13'),
	(4, 4, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '2', '232256658895', 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'HEE', 'Boeny', 'DSI', '2025-06-16 11:02:39', '2025-06-06 11:16:19', NULL, '2025-06-06 12:39:16'),
	(5, 5, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '2', '232256658895', 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'EFA', 'Boeny', 'DSI', '2025-06-06 12:38:11', '2025-06-06 11:20:20', NULL, '2025-06-06 11:20:20'),
	(6, 3, 'Solo', 'Romea', '2000-05-14', '0341756592', '000003', '102320265852', 'Celibataire', '2024-03-02', 'sous-operateur', '1C2E', '1256', 'ELD', 'Amoroni-mania', 'DSI', '2025-05-26 11:55:13', '2025-05-26 11:55:13', NULL, '2025-05-26 11:55:13'),
	(7, 2, 'RAOBELISON', 'Kanto Jerry', '2004-01-27', '0340257574', '1', '457789956658', 'Celibataire', '2023-02-10', 'sous-operateur', '1C2E', '0001', 'EFA', 'Antananarivo', 'DRH', '2025-05-26 11:56:28', '2025-05-26 11:56:28', NULL, '2025-05-26 11:56:28'),
	(8, 5, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '000002', '232256658895', 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'EFA', 'Boeny', 'DSI', '2025-06-06 11:20:20', '2025-06-06 11:20:20', NULL, '2025-06-06 11:20:20'),
	(9, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'FONCTIONNAIRE', 'Antananarivo', 'DSI', '2025-06-06 11:23:52', '2025-06-06 11:23:52', NULL, '2025-06-06 11:23:52'),
	(10, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'FONCTIONNAIRE', 'Antananarivo', 'DSI', '2025-06-06 11:41:53', '2025-06-06 11:41:53', NULL, '2025-06-06 11:41:53'),
	(11, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'EFA', 'Antananarivo', 'DSI', '2025-06-06 11:47:44', '2025-06-06 11:47:44', NULL, '2025-06-06 11:47:44'),
	(12, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DSI', '2025-06-06 12:25:26', '2025-06-06 12:25:26', NULL, '2025-06-06 12:25:26'),
	(13, 2, 'RAOBELISON', 'Kanto Jerry', '2004-01-27', '0340257574', '1', '457789956658', 'Celibataire', '2023-02-10', 'sous-operateur', '1C2E', '0001', 'FONCTIONNAIRE', 'Antananarivo', 'DRH', '2025-06-06 12:32:13', '2025-06-06 12:32:13', NULL, '2025-06-06 12:32:13'),
	(14, 4, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '2', '232256658895', 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'HEE', 'Boeny', 'DSI', '2025-06-06 12:39:16', '2025-06-06 12:39:16', NULL, '2025-06-06 12:39:16'),
	(15, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DRH', '2025-06-16 10:31:34', '2025-06-16 10:31:34', NULL, '2025-06-16 10:31:34'),
	(16, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DRH', '2025-06-16 10:33:38', '2025-06-16 10:33:38', NULL, '2025-06-16 10:33:38'),
	(17, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DSI', '2025-06-16 10:33:59', '2025-06-16 10:33:59', NULL, '2025-06-16 10:33:59'),
	(18, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DRH', '2025-06-16 10:35:13', '2025-06-16 10:35:13', NULL, '2025-06-16 10:35:13'),
	(19, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DSI', '2025-06-16 10:44:19', '2025-06-16 10:44:19', NULL, '2025-06-16 10:44:19'),
	(20, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'FONCTIONNAIRE', 'Antananarivo', 'DSI', '2025-06-16 10:45:10', '2025-06-16 10:45:10', NULL, '2025-06-16 10:45:10'),
	(21, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'FONCTIONNAIRE', 'Antananarivo', 'DSI', '2025-06-16 10:48:48', '2025-06-16 10:48:48', NULL, '2025-06-16 10:48:48'),
	(22, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DSI', '2025-06-16 10:49:01', '2025-06-16 10:49:01', NULL, '2025-06-16 10:49:01'),
	(23, 2, 'RAOBELISON', 'Kanto Jerry', '2004-01-27', '0340257574', '1', '457789956658', 'Celibataire', '2023-02-10', 'sous-operateur', '1C2E', '0001', 'HEE', 'Antananarivo', 'DRH', '2025-06-16 11:01:16', '2025-06-16 11:01:16', NULL, '2025-06-16 11:01:16'),
	(24, 1, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '123456', '510012030154', 'Celibataire', '2024-11-15', 'encadreur', '1C1E', '1234', 'ELD', 'Antananarivo', 'DRH', '2025-06-16 11:01:48', '2025-06-16 11:01:48', NULL, '2025-06-16 11:01:48');

-- Listage de la structure de table recensement. certificat
CREATE TABLE IF NOT EXISTS `certificat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agent_id` int NOT NULL,
  `annee` year NOT NULL,
  `numero_formatte` varchar(50) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `details` text,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  CONSTRAINT `certificat_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.certificat : ~0 rows (environ)

-- Listage de la structure de table recensement. ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.ci_sessions : ~0 rows (environ)

-- Listage de la structure de table recensement. familles
CREATE TABLE IF NOT EXISTS `familles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricule` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_famille` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.familles : ~1 rows (environ)
REPLACE INTO `familles` (`id`, `matricule`, `nom_famille`, `prenom`, `date_naissance`, `relation`, `contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, '123456', 'RAOBE', 'Jerry', '2022-05-25', 'Conjointe', 332556225, '2025-05-19 07:51:19', NULL, NULL),
	(4, '123456', 'RAHARIMAMONJY', 'Francia Jenny', '2025-05-19', 'Enfant', 322625652, '2025-05-19 07:57:10', NULL, NULL),
	(5, '000001', 'RAHARIMAMONJY ', 'Soloniaina Jessica', '2002-10-30', 'Conjointe', 380993895, '2025-06-06 13:01:37', NULL, NULL);

-- Listage de la structure de table recensement. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table recensement.migrations : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
