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
  `matricule` varchar(50) NOT NULL DEFAULT '',
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.agents : ~5 rows (environ)
REPLACE INTO `agents` (`id`, `nom`, `prenom`, `date_naissance`, `contact`, `cin`, `matricule`, `situation_matrimoniale`, `date_entree`, `corps`, `grade`, `indice`, `qualite`, `localisation`, `direction`, `created_at`, `updated_at`, `deleted_at`, `photo`, `password`, `niveau`, `reference`, `email`, `adresse`, `statut`) VALUES
	(2, 'RAOBELISON', 'Kanto Jerry', '2004-01-27', '0340257574', '457789956658', '000001', 'Celibataire', '2023-02-10', 'operateur', '2C1E', '0001', 'EFA', 'Antananarivo', 'DRH', '2025-05-16 11:05:46', '2025-09-14 16:36:35', NULL, 'agent_id2_1757867795_c52a5d38eebffd67ca8e.jpg', '$2y$10$4n2W.jfBW1S6lSVp3KGm1ea7MFicO3z.EhQMK9ncgBMRthJjvoh0e', 1, NULL, 'jessicaraharimamonjy@gmail.com', 'Ankadindramamy', NULL),
	(4, 'RAJOSY', 'Steeven', '2004-02-16', '0344552556', '232256658895', '000002', 'Celibataire', '2023-02-02', 'sous-operateur', '1C1E', '2569', 'HEE', 'Boeny', 'DSI', '2025-06-06 11:16:19', '2025-06-18 12:39:21', NULL, NULL, '', 2, NULL, 'jeanjacks@gmail.com', 'Nanisana', NULL),
	(6, 'RAHARIMAMONJY', 'Soloniaina Jessica', '2002-10-30', '0380993895', '510012030154', '258963', 'Celibataire', '2023-11-15', 'sous-operateur', '1C1E', '2605', 'ELD', 'Vakinakaratra', 'DSI', '2025-08-30 03:36:24', '2025-09-02 13:42:34', NULL, 'agent_id6_1756819670_5aaf469f98373af2a80e.jpg', '$2y$10$mVAtAFBieNdG3gwrALdKJeW7HZnDXujIFLay/gzOo5ysodS9HdfBW', 3, NULL, 'jessicataharimamonjy@gmail.com', 'Ankadindramamy', NULL),
	(7, 'RAKOTOMALALA', 'Jenny', '2001-08-21', '0377017593', '987563365859', '321654', 'Celibataire', '2024-09-25', 'Technicien_Superieur', '2C3E', '5986', 'FONCTIONNAIRE', 'Vakinakaratra', 'DRH', '2025-09-10 11:08:56', '2025-09-10 11:08:56', NULL, NULL, '', 3, NULL, NULL, NULL, NULL),
	(8, 'FALY', 'Mahefa', '1989-09-25', '0326558956', '326859987458', '000005', 'Veuf/Veuve', '2022-10-05', 'cpci', '1C2E', '3652', 'EFA', 'Analamanga', 'DSI', '2025-09-10 11:52:20', '2025-09-12 07:53:39', NULL, NULL, '$2y$10$NFb4fi2EUwwhydOQOH.DS.Mik1oLKsac/1m1F6GSxUw3DDPRLOlha', 3, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.archives : ~24 rows (environ)
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
	(16, '', '123456', 'suppression', '{"id":"1","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","matricule":"123456","situation_matrimoniale":"Celibataire","date_entree":"2024-11-15","corps":"encadreur","grade":"1C1E","indice":"1234","qualite":"ELD","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-13 09:22:52","updated_at":"2025-06-16 11:01:48","deleted_at":null,"photo":"agent_id1_1747386125_6ad43cd6c6be1db96a69.jpg","password":"$2y$10$03ldbW2LuTWu.F3ETd5Xm.64iIR\\/7Zvv9S6AB0DrI9jMbdR4oUKni","niveau":"3","agent_id":"1","date_archivage":"2025-06-16 11:27:49"}', '2025-06-16 12:27:49', '2025-06-16 12:27:49', NULL),
	(17, '1', '258963', 'ajout', '{"matricule":"258963","nom":"RAHARIMAMONJY","prenom":"Soloniaina Jessica","date_naissance":"2002-10-30","contact":"0380993895","cin":"510012030154","situation_matrimoniale":"Celibataire","date_entree":"2023-11-15","corps":"sous-operateur","grade":"1C1E","indice":"2605","qualite":"ELD","localisation":"Vakinakaratra","direction":"DSI","agent_id":6,"date_archivage":"2025-08-30 03:36:24"}', '2025-08-30 04:36:24', '2025-08-30 04:36:24', NULL),
	(18, '1', '321654', 'ajout', '{"matricule":"321654","nom":"RAKOTOMALALA","prenom":"Jenny","date_naissance":"2001-08-21","contact":"0377017593","cin":"987563365859","situation_matrimoniale":"Celibataire","date_entree":"2024-09-25","corps":"Technicien_Superieur","grade":"2C3E","indice":"5986","qualite":"FONCTIONNAIRE","localisation":"Vakinakaratra","direction":"DRH","agent_id":7,"date_archivage":"2025-09-10 11:08:58"}', '2025-09-10 12:08:59', '2025-09-10 12:08:59', NULL),
	(19, '1', '000005', 'ajout', '{"matricule":"000005","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2002-05-15","corps":"encadreur","grade":"1C2E","indice":"3652","qualite":"EFA","localisation":"Menabe","direction":"DSI","agent_id":8,"date_archivage":"2025-09-10 11:52:20"}', '2025-09-10 12:52:20', '2025-09-10 12:52:20', NULL),
	(20, '', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"sous-operateur","grade":"1C2E","indice":"0001","qualite":"HEE","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-09-02 08:29:34","deleted_at":null,"photo":"agent_id2_1756801774_b66c94ad20ca9ee5b543.jpg","password":"$2y$10$4n2W.jfBW1S6lSVp3KGm1ea7MFicO3z.EhQMK9ncgBMRthJjvoh0e","niveau":"1","reference":null,"email":"jessicaraharimamonjy@gmail.com","adresse":"Ankadindramamy","statut":null},"apres":{"matricule":"1","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"operateur","grade":"1C2E","indice":"0001","direction":"DRH","qualite":"HEE","localisation":"Antananarivo"}}', '2025-09-10 13:35:55', '2025-09-10 13:35:55', NULL),
	(21, '1', '5', 'modification', '{"avant":{"id":"8","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","matricule":"5","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2014-02-10","corps":"sous-operateur","grade":"1C2E","indice":"3652","qualite":"EFA","localisation":"Menabe","direction":"DSI","created_at":"2025-09-10 11:52:20","updated_at":"2025-09-12 07:13:26","deleted_at":null,"photo":null,"password":"","niveau":"3","reference":null,"email":null,"adresse":null,"statut":null},"apres":{"matricule":"5","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2014-02-10","corps":"sous-operateur","grade":"1C2E","indice":"3652","direction":"DSI","qualite":"EFA","localisation":"Menabe"}}', '2025-09-12 08:16:48', '2025-09-12 08:16:48', NULL),
	(22, '1', '5', 'modification', '{"avant":{"id":"8","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","matricule":"5","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2014-02-10","corps":"sous-operateur","grade":"1C2E","indice":"3652","qualite":"EFA","localisation":"Menabe","direction":"DSI","created_at":"2025-09-10 11:52:20","updated_at":"2025-09-12 07:16:48","deleted_at":null,"photo":null,"password":"","niveau":"3","reference":null,"email":null,"adresse":null,"statut":null},"apres":{"matricule":"5","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2022-10-05","corps":"cpci","grade":"1C2E","indice":"3652","direction":"DSI","qualite":"EFA","localisation":"Menabe"}}', '2025-09-12 08:17:26', '2025-09-12 08:17:26', NULL),
	(23, '1', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"operateur","grade":"1C2E","indice":"0001","qualite":"HEE","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-09-10 12:35:55","deleted_at":null,"photo":"agent_id2_1756801774_b66c94ad20ca9ee5b543.jpg","password":"$2y$10$4n2W.jfBW1S6lSVp3KGm1ea7MFicO3z.EhQMK9ncgBMRthJjvoh0e","niveau":"1","reference":null,"email":"jessicaraharimamonjy@gmail.com","adresse":"Ankadindramamy","statut":null},"apres":{"matricule":"1","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"operateur","grade":"1C2E","indice":"0001","direction":"DRH","qualite":"EFA","localisation":"Antananarivo"}}', '2025-09-12 08:38:11', '2025-09-12 08:38:11', NULL),
	(24, '1', '1', 'modification', '{"avant":{"id":"2","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","matricule":"1","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"operateur","grade":"1C2E","indice":"0001","qualite":"EFA","localisation":"Antananarivo","direction":"DRH","created_at":"2025-05-16 11:05:46","updated_at":"2025-09-12 07:38:11","deleted_at":null,"photo":"agent_id2_1756801774_b66c94ad20ca9ee5b543.jpg","password":"$2y$10$4n2W.jfBW1S6lSVp3KGm1ea7MFicO3z.EhQMK9ncgBMRthJjvoh0e","niveau":"1","reference":null,"email":"jessicaraharimamonjy@gmail.com","adresse":"Ankadindramamy","statut":null},"apres":{"matricule":"1","nom":"RAOBELISON","prenom":"Kanto Jerry","date_naissance":"2004-01-27","contact":"0340257574","cin":"457789956658","situation_matrimoniale":"Celibataire","date_entree":"2023-02-10","corps":"operateur","grade":"2C1E","indice":"0001","direction":"DRH","qualite":"EFA","localisation":"Antananarivo"}}', '2025-09-12 08:46:09', '2025-09-12 08:46:09', NULL),
	(25, '1', '5', 'modification', '{"avant":{"id":"8","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","matricule":"5","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2022-10-05","corps":"cpci","grade":"1C2E","indice":"3652","qualite":"EFA","localisation":"Menabe","direction":"DSI","created_at":"2025-09-10 11:52:20","updated_at":"2025-09-12 07:25:53","deleted_at":null,"photo":null,"password":"$2y$10$NFb4fi2EUwwhydOQOH.DS.Mik1oLKsac\\/1m1F6GSxUw3DDPRLOlha","niveau":"3","reference":null,"email":null,"adresse":null,"statut":null},"apres":{"matricule":"5","nom":"FALY","prenom":"Mahefa","date_naissance":"1989-09-25","contact":"0326558956","cin":"326859987458","situation_matrimoniale":"Veuf\\/Veuve","date_entree":"2022-10-05","corps":"cpci","grade":"1C2E","indice":"3652","direction":"DSI","qualite":"EFA","localisation":"Analamanga"}}', '2025-09-12 08:53:39', '2025-09-12 08:53:39', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.certificat : ~15 rows (environ)
REPLACE INTO `certificat` (`id`, `agent_id`, `annee`, `numero_formatte`, `action`, `details`, `created_at`) VALUES
	(1, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-17'),
	(2, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-17'),
	(3, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-17'),
	(4, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-17'),
	(5, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-17'),
	(6, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(7, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(8, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(9, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(10, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(11, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(12, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(13, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(14, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(15, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19'),
	(16, 2, '2025', NULL, 'Certificat administratif', 'Certificat généré automatiquement', '2025-09-19');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.familles : ~1 rows (environ)
REPLACE INTO `familles` (`id`, `matricule`, `nom_famille`, `prenom`, `date_naissance`, `relation`, `contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, '123456', 'RAOBE', 'Jerry', '2022-05-25', 'Conjointe', 332556225, '2025-05-19 07:51:19', NULL, NULL),
	(4, '123456', 'RAHARIMAMONJY', 'Francia Jenny', '2025-05-19', 'Enfant', 322625652, '2025-05-19 07:57:10', NULL, NULL),
	(5, '000001', 'RAHARIMAMONJY ', 'Soloniaina Jessica', '2002-10-30', 'Conjointe', 380993895, '2025-06-06 13:01:37', NULL, NULL),
	(6, '258963', 'FARA', 'SOLO', '2025-02-11', 'Conjointe', 325669558, '2025-09-19 16:51:15', NULL, NULL);

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

-- Listage de la structure de table recensement. situations_admin
CREATE TABLE IF NOT EXISTS `situations_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agent_matricule` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `corps` varchar(50) NOT NULL,
  `cat` varchar(50) DEFAULT NULL,
  `grade` varchar(50) NOT NULL,
  `acte` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table recensement.situations_admin : ~4 rows (environ)
REPLACE INTO `situations_admin` (`id`, `agent_matricule`, `date_debut`, `date_fin`, `corps`, `cat`, `grade`, `acte`, `created_at`, `updated_at`) VALUES
	(5, '000005', '2014-02-10', '2019-03-20', 'encadreur', '7', 'stagiaire', 'avenant numero 12', '2025-09-16 10:28:25', NULL),
	(6, '000005', '2021-07-20', '2026-10-20', 'Technicien_Superieur', 'cat', '2C2E', 'contrat num 12', '2025-09-17 17:20:52', '2025-09-17 17:20:52'),
	(7, '000005', '2024-09-16', '2025-11-17', 'operateur', 'cat 1', '1C1E', 'acte 1', '2025-09-17 17:24:35', '2025-09-17 17:24:35'),
	(8, '000005', '2023-07-04', '2025-09-30', 'realisateur', 'cat 2', '1C2E', 'acte 2', '2025-09-17 17:26:04', '2025-09-17 17:26:04'),
	(9, '000001', '2025-01-13', '2025-12-15', 'planificateur', 'cat 3', '1C3E', 'acte 3', '2025-09-17 18:24:13', '2025-09-17 18:24:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
