-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 avr. 2020 à 14:42
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eterelz`
--

-- --------------------------------------------------------

--
-- Structure de la table `eter_categorie`
--

CREATE TABLE `eter_categorie` (
  `id` int(11) NOT NULL,
  `eter_categorie_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_categorie`
--

INSERT INTO `eter_categorie` (`id`, `eter_categorie_id`, `cat_name`) VALUES
(1, NULL, 'artwork'),
(2, NULL, 'Vidéos'),
(3, 2, 'Anime'),
(4, 2, 'Vidéos InGame'),
(5, NULL, 'Texte'),
(6, NULL, 'fdghjfd'),
(7, 6, 'fghjfgjfj');

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan`
--

CREATE TABLE `eter_clan` (
  `id` int(11) NOT NULL,
  `clan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clan_members` int(11) NOT NULL,
  `clan_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `clan_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_discord` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_recrut` tinyint(1) NOT NULL,
  `clan_slogan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clan_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_clan`
--

INSERT INTO `eter_clan` (`id`, `clan_name`, `clan_members`, `clan_desc`, `clan_ban`, `clan_discord`, `clan_recrut`, `clan_slogan`, `clan_update`) VALUES
(1, 'Light Of Belenos', 64, 'RESPECT, ENTRAIDE ET BONNE HUMEUR !!\r\n\r\n\r\nLes demandes spontanées faites sans avoir contacté un des administrateurs du clan seront pas validées.', 'LOB.jpg', 'https://discord.gg/4y3M4K', 1, 'Toujours plus !!!', '2020-03-24 20:49:01'),
(2, 'NoJoker', 36, 'Bienvenue à tous chez les NJkR,\r\n\r\nNous sommes un petit groupe de passionnés de Destiny avec comme objectif: partir à la découverte du contenu à sa sortie et d\'aller chercher les challenges les plus élevées possibles afin de s\'améliorer.\r\nNous acceptons tout style de joueurs, casual ou expérimenté, tant que ces personnes veulent évoluer sur leurs niveaux de jeu et ne vont pas demander à se faire carry à chaque activité.\r\nDifférents tuto, formation sont évidement disponibles sur demande.\r\n\r\nLes prérequis :\r\n- Discord\r\n- Shadowkeep\r\n\r\n-- RECRUTEMENT: --\r\nmerci de passer sur notre DISCORD et de suivre les instructions.\r\nVous pouvez d\'ailleurs nous découvrir en tant que visiteur puis poser votre candidature si cela vous intéresse.', 'NJKR.jpg', 'https://discord.gg/ddDffvb', 1, '\"Karma is a b*tch\"', '2020-03-24 20:49:14'),
(3, 'sdgfhjkl', 21, 'ghgj jkh kk lhl', '1408565702_45060.jpg', NULL, 0, NULL, '2020-03-24 17:09:37'),
(4, 'kiujyhtg', 1, ';kt,jr rtnte ntnh', 'wallhaven-0pqyy9.jpg', NULL, 1, NULL, '2020-03-25 10:39:36'),
(5, 'efsgdfhgdjhf', 21, 'rsdtfghkjk', 'wallhaven-47xgo9.jpg', NULL, 0, NULL, '2020-03-25 12:30:02');

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_event`
--

CREATE TABLE `eter_clan_eter_event` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_clan_eter_event`
--

INSERT INTO `eter_clan_eter_event` (`eter_clan_id`, `eter_event_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_gameplay`
--

CREATE TABLE `eter_clan_eter_gameplay` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_gameplay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_clan_eter_gameplay`
--

INSERT INTO `eter_clan_eter_gameplay` (`eter_clan_id`, `eter_gameplay_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `eter_comment`
--

CREATE TABLE `eter_comment` (
  `id` int(11) NOT NULL,
  `com_user_id` int(11) DEFAULT NULL,
  `content_com_id` int(11) DEFAULT NULL,
  `eter_comment_id` int(11) DEFAULT NULL,
  `com_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_comment`
--

INSERT INTO `eter_comment` (`id`, `com_user_id`, `content_com_id`, `eter_comment_id`, `com_content`, `com_date`) VALUES
(4, 1, 2, NULL, 'test com', '2020-04-09 07:07:00'),
(5, 1, 2, NULL, 'retest blabla', '2020-09-09 06:10:00'),
(6, 1, 2, 4, 'réponse de commentaire', '2021-07-12 06:08:00');

-- --------------------------------------------------------

--
-- Structure de la table `eter_content`
--

CREATE TABLE `eter_content` (
  `id` int(11) NOT NULL,
  `content_state_id` int(11) NOT NULL,
  `content_cat_id` int(11) NOT NULL,
  `content_user_id` int(11) NOT NULL,
  `content_update` timestamp NOT NULL,
  `content_text` longtext COLLATE utf8mb4_unicode_ci,
  `content_date` datetime NOT NULL,
  `content_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_content`
--

INSERT INTO `eter_content` (`id`, `content_state_id`, `content_cat_id`, `content_user_id`, `content_update`, `content_text`, `content_date`, `content_pic`, `content_name`) VALUES
(2, 1, 5, 1, '2020-04-07 12:54:37', 'blablabla', '2019-05-17 13:13:00', NULL, 'Test'),
(19, 1, 1, 1, '2020-03-25 12:05:09', 'EZTQRYTKUYTJRYETZRAEZRETRYT', '2019-05-17 17:17:00', 'wallhaven-0w9ggx.jpg', 'azretrytjykyjhsdgqsfer');

-- --------------------------------------------------------

--
-- Structure de la table `eter_event`
--

CREATE TABLE `eter_event` (
  `id` int(11) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_score` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_winner` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_creation` datetime NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_event`
--

INSERT INTO `eter_event` (`id`, `event_date`, `event_score`, `event_winner`, `event_creation`, `event_name`) VALUES
(1, '2020-03-14 21:30:00', NULL, NULL, '2020-01-17 18:00:00', 'SpeedRun Riven'),
(2, '2021-10-17 18:09:00', NULL, NULL, '2018-05-08 16:08:00', 'Battle Royale');

-- --------------------------------------------------------

--
-- Structure de la table `eter_event_eter_user`
--

CREATE TABLE `eter_event_eter_user` (
  `eter_event_id` int(11) NOT NULL,
  `eter_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_event_eter_user`
--

INSERT INTO `eter_event_eter_user` (`eter_event_id`, `eter_user_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eter_game`
--

CREATE TABLE `eter_game` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_game`
--

INSERT INTO `eter_game` (`id`, `game_name`) VALUES
(1, 'Destiny 2'),
(2, 'The Division 2');

-- --------------------------------------------------------

--
-- Structure de la table `eter_gameplay`
--

CREATE TABLE `eter_gameplay` (
  `id` int(11) NOT NULL,
  `gameplay_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_gameplay`
--

INSERT INTO `eter_gameplay` (`id`, `gameplay_type`) VALUES
(1, 'Chill'),
(2, 'Try Hard');

-- --------------------------------------------------------

--
-- Structure de la table `eter_game_eter_gender`
--

CREATE TABLE `eter_game_eter_gender` (
  `eter_game_id` int(11) NOT NULL,
  `eter_gender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_game_eter_gender`
--

INSERT INTO `eter_game_eter_gender` (`eter_game_id`, `eter_gender_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `eter_gender`
--

CREATE TABLE `eter_gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_gender`
--

INSERT INTO `eter_gender` (`id`, `gender_name`) VALUES
(1, 'F.P.S'),
(2, 'Shooter-looter'),
(3, 'M.M.O'),
(4, 'T.P.S');

-- --------------------------------------------------------

--
-- Structure de la table `eter_role`
--

CREATE TABLE `eter_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_role`
--

INSERT INTO `eter_role` (`id`, `role_name`) VALUES
(1, 'administrateur'),
(2, 'leader'),
(3, 'organisateur'),
(4, 'pvp'),
(5, 'pve');

-- --------------------------------------------------------

--
-- Structure de la table `eter_state`
--

CREATE TABLE `eter_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_state`
--

INSERT INTO `eter_state` (`id`, `state_name`) VALUES
(1, 'Validé'),
(2, 'En attente'),
(3, 'Supprimé');

-- --------------------------------------------------------

--
-- Structure de la table `eter_streamer`
--

CREATE TABLE `eter_streamer` (
  `id` int(11) NOT NULL,
  `eter_user_id` int(11) DEFAULT NULL,
  `stream_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stream_support` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_streamer`
--

INSERT INTO `eter_streamer` (`id`, `eter_user_id`, `stream_url`, `stream_support`) VALUES
(1, 1, 'https://www.twitch.tv/rubycouz', 'pc');

-- --------------------------------------------------------

--
-- Structure de la table `eter_user`
--

CREATE TABLE `eter_user` (
  `id` int(11) NOT NULL,
  `user_login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_date` datetime NOT NULL,
  `user_mail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_zip` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_discord` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sex` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `user_description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_user`
--

INSERT INTO `eter_user` (`id`, `user_login`, `user_date`, `user_mail`, `user_password`, `user_address`, `user_zip`, `user_city`, `user_discord`, `user_sex`, `statut`, `user_description`) VALUES
(1, 'RubyCouz', '2020-03-12 12:48:00', 'ced270784@gmail.com', 'RubyCouz02072014', NULL, NULL, NULL, 'RubyCouz#2253', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_clan`
--

CREATE TABLE `eter_user_eter_clan` (
  `eter_user_id` int(11) NOT NULL,
  `eter_clan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_user_eter_clan`
--

INSERT INTO `eter_user_eter_clan` (`eter_user_id`, `eter_clan_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_game`
--

CREATE TABLE `eter_user_eter_game` (
  `eter_user_id` int(11) NOT NULL,
  `eter_game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_user_eter_game`
--

INSERT INTO `eter_user_eter_game` (`eter_user_id`, `eter_game_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_role`
--

CREATE TABLE `eter_user_eter_role` (
  `eter_user_id` int(11) NOT NULL,
  `eter_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_user_eter_role`
--

INSERT INTO `eter_user_eter_role` (`eter_user_id`, `eter_role_id`) VALUES
(1, 1),
(1, 2),
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200407124729', '2020-04-07 12:54:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eter_categorie`
--
ALTER TABLE `eter_categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_525C61E4D691FA27` (`eter_categorie_id`);

--
-- Index pour la table `eter_clan`
--
ALTER TABLE `eter_clan`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_clan_eter_event`
--
ALTER TABLE `eter_clan_eter_event`
  ADD PRIMARY KEY (`eter_clan_id`,`eter_event_id`),
  ADD KEY `IDX_1AF59E1FC38162BD` (`eter_clan_id`),
  ADD KEY `IDX_1AF59E1F51E543DE` (`eter_event_id`);

--
-- Index pour la table `eter_clan_eter_gameplay`
--
ALTER TABLE `eter_clan_eter_gameplay`
  ADD PRIMARY KEY (`eter_clan_id`,`eter_gameplay_id`),
  ADD KEY `IDX_2A61BC6EC38162BD` (`eter_clan_id`),
  ADD KEY `IDX_2A61BC6E756CDFE7` (`eter_gameplay_id`);

--
-- Index pour la table `eter_comment`
--
ALTER TABLE `eter_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E95AB4199975955A` (`com_user_id`),
  ADD KEY `IDX_E95AB4191CBA7F9B` (`content_com_id`),
  ADD KEY `IDX_E95AB4197EA18E70` (`eter_comment_id`);

--
-- Index pour la table `eter_content`
--
ALTER TABLE `eter_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_83EBD6DC576FD62E` (`content_state_id`),
  ADD KEY `IDX_83EBD6DC8E9BD9EF` (`content_cat_id`),
  ADD KEY `IDX_83EBD6DC78660A26` (`content_user_id`);

--
-- Index pour la table `eter_event`
--
ALTER TABLE `eter_event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_event_eter_user`
--
ALTER TABLE `eter_event_eter_user`
  ADD PRIMARY KEY (`eter_event_id`,`eter_user_id`),
  ADD KEY `IDX_6FA6A33451E543DE` (`eter_event_id`),
  ADD KEY `IDX_6FA6A334DA4035E0` (`eter_user_id`);

--
-- Index pour la table `eter_game`
--
ALTER TABLE `eter_game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_gameplay`
--
ALTER TABLE `eter_gameplay`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_game_eter_gender`
--
ALTER TABLE `eter_game_eter_gender`
  ADD PRIMARY KEY (`eter_game_id`,`eter_gender_id`),
  ADD KEY `IDX_E7DF7A6D99A13F70` (`eter_game_id`),
  ADD KEY `IDX_E7DF7A6D1C291730` (`eter_gender_id`);

--
-- Index pour la table `eter_gender`
--
ALTER TABLE `eter_gender`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_role`
--
ALTER TABLE `eter_role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_state`
--
ALTER TABLE `eter_state`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_streamer`
--
ALTER TABLE `eter_streamer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DE40567DA4035E0` (`eter_user_id`);

--
-- Index pour la table `eter_user`
--
ALTER TABLE `eter_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_user_eter_clan`
--
ALTER TABLE `eter_user_eter_clan`
  ADD PRIMARY KEY (`eter_user_id`,`eter_clan_id`),
  ADD KEY `IDX_DA7BC77EDA4035E0` (`eter_user_id`),
  ADD KEY `IDX_DA7BC77EC38162BD` (`eter_clan_id`);

--
-- Index pour la table `eter_user_eter_game`
--
ALTER TABLE `eter_user_eter_game`
  ADD PRIMARY KEY (`eter_user_id`,`eter_game_id`),
  ADD KEY `IDX_66A655FEDA4035E0` (`eter_user_id`),
  ADD KEY `IDX_66A655FE99A13F70` (`eter_game_id`);

--
-- Index pour la table `eter_user_eter_role`
--
ALTER TABLE `eter_user_eter_role`
  ADD PRIMARY KEY (`eter_user_id`,`eter_role_id`),
  ADD KEY `IDX_12E4EE18DA4035E0` (`eter_user_id`),
  ADD KEY `IDX_12E4EE18AB2DC4D9` (`eter_role_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eter_categorie`
--
ALTER TABLE `eter_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `eter_clan`
--
ALTER TABLE `eter_clan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `eter_comment`
--
ALTER TABLE `eter_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `eter_content`
--
ALTER TABLE `eter_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `eter_event`
--
ALTER TABLE `eter_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `eter_game`
--
ALTER TABLE `eter_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `eter_gameplay`
--
ALTER TABLE `eter_gameplay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `eter_gender`
--
ALTER TABLE `eter_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `eter_role`
--
ALTER TABLE `eter_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `eter_state`
--
ALTER TABLE `eter_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `eter_streamer`
--
ALTER TABLE `eter_streamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `eter_user`
--
ALTER TABLE `eter_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
ALTER TABLE `eter_user_eter_role`
  ADD CONSTRAINT `FK_12E4EE18AB2DC4D9` FOREIGN KEY (`eter_role_id`) REFERENCES `eter_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12E4EE18DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
