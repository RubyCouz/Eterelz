-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 avr. 2020 à 11:14
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eterelz`
--

-- --------------------------------------------------------

--
-- Structure de la table `eter_categorie`
--

DROP TABLE IF EXISTS `eter_categorie`;
CREATE TABLE IF NOT EXISTS `eter_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eter_categorie_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_525C61E4D691FA27` (`eter_categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_clan`
--

DROP TABLE IF EXISTS `eter_clan`;
CREATE TABLE IF NOT EXISTS `eter_clan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clan_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clan_members` int(11) NOT NULL,
  `clan_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clan_ban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_discord` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_recrut` tinyint(1) NOT NULL,
  `clan_slogan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_event`
--

DROP TABLE IF EXISTS `eter_clan_eter_event`;
CREATE TABLE IF NOT EXISTS `eter_clan_eter_event` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_event_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_clan_id`,`eter_event_id`),
  KEY `IDX_1AF59E1FC38162BD` (`eter_clan_id`),
  KEY `IDX_1AF59E1F51E543DE` (`eter_event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_gameplay`
--

DROP TABLE IF EXISTS `eter_clan_eter_gameplay`;
CREATE TABLE IF NOT EXISTS `eter_clan_eter_gameplay` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_gameplay_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_clan_id`,`eter_gameplay_id`),
  KEY `IDX_2A61BC6EC38162BD` (`eter_clan_id`),
  KEY `IDX_2A61BC6E756CDFE7` (`eter_gameplay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_comment`
--

DROP TABLE IF EXISTS `eter_comment`;
CREATE TABLE IF NOT EXISTS `eter_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_user_id` int(11) DEFAULT NULL,
  `content_com_id` int(11) DEFAULT NULL,
  `eter_comment_id` int(11) DEFAULT NULL,
  `com_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E95AB4199975955A` (`com_user_id`),
  KEY `IDX_E95AB4191CBA7F9B` (`content_com_id`),
  KEY `IDX_E95AB4197EA18E70` (`eter_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_content`
--

DROP TABLE IF EXISTS `eter_content`;
CREATE TABLE IF NOT EXISTS `eter_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_state_id` int(11) NOT NULL,
  `content_cat_id` int(11) NOT NULL,
  `content_user_id` int(11) NOT NULL,
  `content_update` timestamp NOT NULL,
  `content_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_date` datetime NOT NULL,
  `content_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_83EBD6DC576FD62E` (`content_state_id`),
  KEY `IDX_83EBD6DC8E9BD9EF` (`content_cat_id`),
  KEY `IDX_83EBD6DC78660A26` (`content_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_event`
--

DROP TABLE IF EXISTS `eter_event`;
CREATE TABLE IF NOT EXISTS `eter_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_date` datetime NOT NULL,
  `event_score` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_winner` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_creation` datetime NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_event_eter_user`
--

DROP TABLE IF EXISTS `eter_event_eter_user`;
CREATE TABLE IF NOT EXISTS `eter_event_eter_user` (
  `eter_event_id` int(11) NOT NULL,
  `eter_user_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_event_id`,`eter_user_id`),
  KEY `IDX_6FA6A33451E543DE` (`eter_event_id`),
  KEY `IDX_6FA6A334DA4035E0` (`eter_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_game`
--

DROP TABLE IF EXISTS `eter_game`;
CREATE TABLE IF NOT EXISTS `eter_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_gameplay`
--

DROP TABLE IF EXISTS `eter_gameplay`;
CREATE TABLE IF NOT EXISTS `eter_gameplay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameplay_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_game_eter_gender`
--

DROP TABLE IF EXISTS `eter_game_eter_gender`;
CREATE TABLE IF NOT EXISTS `eter_game_eter_gender` (
  `eter_game_id` int(11) NOT NULL,
  `eter_gender_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_game_id`,`eter_gender_id`),
  KEY `IDX_E7DF7A6D99A13F70` (`eter_game_id`),
  KEY `IDX_E7DF7A6D1C291730` (`eter_gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_gender`
--

DROP TABLE IF EXISTS `eter_gender`;
CREATE TABLE IF NOT EXISTS `eter_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_role`
--

DROP TABLE IF EXISTS `eter_label`;
CREATE TABLE IF NOT EXISTS `eter_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_state`
--

DROP TABLE IF EXISTS `eter_state`;
CREATE TABLE IF NOT EXISTS `eter_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_streamer`
--

DROP TABLE IF EXISTS `eter_streamer`;
CREATE TABLE IF NOT EXISTS `eter_streamer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eter_user_id` int(11) DEFAULT NULL,
  `stream_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stream_support` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE40567DA4035E0` (`eter_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_user`
--

DROP TABLE IF EXISTS `eter_user`;
CREATE TABLE IF NOT EXISTS `eter_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_date` datetime NOT NULL,
  `user_mail` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_zip` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_discord` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `user_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_update` datetime DEFAULT NULL,
  `user_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'utilisateur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_clan`
--

DROP TABLE IF EXISTS `eter_user_eter_clan`;
CREATE TABLE IF NOT EXISTS `eter_user_eter_clan` (
  `eter_user_id` int(11) NOT NULL,
  `eter_clan_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_user_id`,`eter_clan_id`),
  KEY `IDX_DA7BC77EDA4035E0` (`eter_user_id`),
  KEY `IDX_DA7BC77EC38162BD` (`eter_clan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_game`
--

DROP TABLE IF EXISTS `eter_user_eter_game`;
CREATE TABLE IF NOT EXISTS `eter_user_eter_game` (
  `eter_user_id` int(11) NOT NULL,
  `eter_game_id` int(11) NOT NULL,
  PRIMARY KEY (`eter_user_id`,`eter_game_id`),
  KEY `IDX_66A655FEDA4035E0` (`eter_user_id`),
  KEY `IDX_66A655FE99A13F70` (`eter_game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_role`
--

DROP TABLE IF EXISTS `eter_user_eter_label`;
CREATE TABLE IF NOT EXISTS `eter_user_eter_label` (
  `eter_user_id` int(11) NOT NULL,
  `eter_label_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`eter_user_id`,`eter_label_id`),
  KEY `IDX_12E4EE18DA4035E0` (`eter_user_id`),
  KEY `IDX_12E4EE18AB2DC4D9` (`eter_label_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eter_categorie`
--
ALTER TABLE `eter_categorie`
  ADD CONSTRAINT `FK_525C61E4D691FA27` FOREIGN KEY (`eter_categorie_id`) REFERENCES `eter_categorie` (`id`);

--
-- Contraintes pour la table `eter_clan_eter_event`
--
ALTER TABLE `eter_clan_eter_event`
  ADD CONSTRAINT `FK_1AF59E1F51E543DE` FOREIGN KEY (`eter_event_id`) REFERENCES `eter_event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1AF59E1FC38162BD` FOREIGN KEY (`eter_clan_id`) REFERENCES `eter_clan` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_clan_eter_gameplay`
--
ALTER TABLE `eter_clan_eter_gameplay`
  ADD CONSTRAINT `FK_2A61BC6E756CDFE7` FOREIGN KEY (`eter_gameplay_id`) REFERENCES `eter_gameplay` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2A61BC6EC38162BD` FOREIGN KEY (`eter_clan_id`) REFERENCES `eter_clan` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_comment`
--
ALTER TABLE `eter_comment`
  ADD CONSTRAINT `FK_E95AB4191CBA7F9B` FOREIGN KEY (`content_com_id`) REFERENCES `eter_content` (`id`),
  ADD CONSTRAINT `FK_E95AB4197EA18E70` FOREIGN KEY (`eter_comment_id`) REFERENCES `eter_comment` (`id`),
  ADD CONSTRAINT `FK_E95AB4199975955A` FOREIGN KEY (`com_user_id`) REFERENCES `eter_user` (`id`);

--
-- Contraintes pour la table `eter_content`
--
ALTER TABLE `eter_content`
  ADD CONSTRAINT `FK_83EBD6DC576FD62E` FOREIGN KEY (`content_state_id`) REFERENCES `eter_state` (`id`),
  ADD CONSTRAINT `FK_83EBD6DC78660A26` FOREIGN KEY (`content_user_id`) REFERENCES `eter_user` (`id`),
  ADD CONSTRAINT `FK_83EBD6DC8E9BD9EF` FOREIGN KEY (`content_cat_id`) REFERENCES `eter_categorie` (`id`);

--
-- Contraintes pour la table `eter_event_eter_user`
--
ALTER TABLE `eter_event_eter_user`
  ADD CONSTRAINT `FK_6FA6A33451E543DE` FOREIGN KEY (`eter_event_id`) REFERENCES `eter_event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6FA6A334DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_game_eter_gender`
--
ALTER TABLE `eter_game_eter_gender`
  ADD CONSTRAINT `FK_E7DF7A6D1C291730` FOREIGN KEY (`eter_gender_id`) REFERENCES `eter_gender` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E7DF7A6D99A13F70` FOREIGN KEY (`eter_game_id`) REFERENCES `eter_game` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_streamer`
--
ALTER TABLE `eter_streamer`
  ADD CONSTRAINT `FK_DE40567DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`);

--
-- Contraintes pour la table `eter_user_eter_clan`
--
ALTER TABLE `eter_user_eter_clan`
  ADD CONSTRAINT `FK_DA7BC77EC38162BD` FOREIGN KEY (`eter_clan_id`) REFERENCES `eter_clan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DA7BC77EDA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_user_eter_game`
--
ALTER TABLE `eter_user_eter_game`
  ADD CONSTRAINT `FK_66A655FE99A13F70` FOREIGN KEY (`eter_game_id`) REFERENCES `eter_game` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_66A655FEDA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eter_user_eter_role`
--
ALTER TABLE `eter_user_eter_label`
  ADD CONSTRAINT `FK_12E4EE18AB2DC4D9` FOREIGN KEY (`eter_label_id`) REFERENCES `eter_label` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12E4EE18DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
