-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 12 fév. 2021 à 16:23
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

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_event`
--

CREATE TABLE `eter_clan_eter_event` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_clan_eter_gameplay`
--

CREATE TABLE `eter_clan_eter_gameplay` (
  `eter_clan_id` int(11) NOT NULL,
  `eter_gameplay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `eter_event_eter_user`
--

CREATE TABLE `eter_event_eter_user` (
  `eter_event_id` int(11) NOT NULL,
  `eter_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Call of Duty'),
(2, 'Overwatch'),
(3, 'Fortnite'),
(4, 'Apex Legends');

-- --------------------------------------------------------

--
-- Structure de la table `eter_gameplay`
--

CREATE TABLE `eter_gameplay` (
  `id` int(11) NOT NULL,
  `gameplay_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_game_eter_gender`
--

CREATE TABLE `eter_game_eter_gender` (
  `eter_game_id` int(11) NOT NULL,
  `eter_gender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_gender`
--

CREATE TABLE `eter_gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_label`
--

CREATE TABLE `eter_label` (
  `id` int(11) NOT NULL,
  `label_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_product`
--

CREATE TABLE `eter_product` (
  `id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(11,2) NOT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_product`
--

INSERT INTO `eter_product` (`id`, `product_title`, `product_image`, `product_price`, `product_quantity`, `product_description`) VALUES
(1, 'PlayStation 4', 'playstation-4-background-hd-1080p-340686.jpg', 259.00, 12, 'La PlayStation 4 est une console de jeux vidéo de salon de huitième génération développée par Sony Computer Entertainment. Dans la course au progrès technologique et à la captation de nouveaux gamers, la PS4 a fait beaucoup de bruit à sa sortie car elle était en concurrence directe avec la Xbox one. Fleuron donc de l’entreprise Sony, elle permet de jouer à des jeux vidéo divers et variés qui offrent une qualité d’image et un gameplay à peine croyable grâce à des caractéristiques techniques impressionnantes toujours plus innovatrices. Que vous soyez un fan de jeux de sports mécaniques, de combats, de plateforme, d’action ou de jeux de rôles, il y en a pour tous les goûts et tous les âges.\r\n\r\nLa PS4, en plus d´être une console de jeu dernière génération vous donne aussi accès à beaucoup plus: C´est une machine de divertissement complète! Pour la musique, le \"Music Unlimited\" est un système d’abonnement musical sans publicité qui vous permet d’écouter de la musique depuis la PS4, qui devient ainsi une médiathèque musicale des plus complètes à portée de joystick. Pour le cinéma, plusieurs choix: son disque dur de 500 Go vous permet d’enregistrer et de lire tous les films de votre bibliothèque personnelle. De plus elle lit aussi les DVD et les Blu-Ray. Mais surtout son système \"Video Unlimited\" vous permet de choisir un film parmi les titres les plus populaires. Et bien sur avec le playstation network, affrontez vos amis ou des inconnus ou qu´ils soient !'),
(2, 'Casque Gamer', 'casque-gaming.jpg', 73.25, 28, 'Plongez au coeur de vos parties avec le casque-micro Aorus H5. Doté de haut-parleurs de 50 mm, il délivre un son puissant et clair afin de reproduire fidèlement ce qu\'il se passe à l\'écran. De plus, avec son microphone détachable, vous aurez toutes les armes pour atteindre la victoire. Ce modèle intègre un retro-éclairage LED multicolore afin que vous puissiez donner un look unique à votre équipement.\r\nVivez chaque partie intensément avec le casque Aorus H5. En effet, il est équipé de transducteurs de 50 mm en béryllium afin de retranscrire fidèlement l\'ambiance sonore de votre jeu ou de votre film. Ainsi, vous allez pouvoir ressentir chaque explosion ou le bruit du moteur de votre bolide ! \r\n \r\nConfortable grâce à sa légèreté, il réduit la pression globale autour de vos oreilles afin de vous assurer un confort prolongé, même après de longues sessions de jeu. De plus, un système d\'arceau suspendu offre un confort sans faille et parfaitement ajusté à votre tête.\r\n\r\nLe rétro-éclairage LED multicolore du Aorus H5 vous permettra d\'affirmer votre style avec des millions de combinaisons possibles. Depuis le logiciel dédié, vous pourrez customiser votre casque selon vos envies et ainsi vivre des moments intenses pendant vos parties. \r\n \r\nQuant à la télécommande située sur le câble, elle vous sera très utile pour gérer le volume ainsi que mettre le micro en muet lorsque vous souhaitez discuter avec les personnes se trouvant autour de vous.'),
(3, 'Clavier Gamer', 'clavier.jpg', 180.00, 100, 'Le Strix Flare embarque une plaque illuminée personnalisable. Une version vierge en acrylique n\'attend que votre créativité tandis qu\'une version avec le logo ROG vous accompagnera dans vos débuts.\r\n \r\nAutre nouveauté, les touches multimédia s\'intègrent en haut à gauche pour un contrôle pratique depuis votre main gauche. Votre main droite restera alors sur la souris pour garder la maîtrise de la partie. Une molette est également présente pour ajuster le volume.\r\n\r\n16,8 millions de combinaisons disponibles, le clavier Strix Flaire s\'illuminera de mille feux ! Découvrez 10 effets différents, un éclairage individuel de chaque touche ainsi qu\'un éclairage latéral pour une ambiance complète. De plus, grâce à Aura Sync, vous pourrez associer l\'éclairage de votre clavier à celui d\'une carte mère, une carte graphique ou tout autre périphérique ASUS ROG pour un résultat fantastique. \r\n \r\nPour un confort encore plus important, ce clavier gaming signé ASUS ROG dispose d\'un repose-poignets amovible. Fixez-le et appréciez sa surface douche ou enlevez-le si vous souhaitez obtenir un format plus compact.\r\n\r\nGrâce au logiciel ROG Armoury II, vous aurez la possibilité de créer jusqu\'à 6 profils différents, de contrôler le rétro-éclairage, d\'assigner des touches ou bien encore d\'enregistrer des macros instantanément. Nécessitant moins de ressources système que la version précédente, ce logiciel vous offrira une personnalisation étendue.\r\n\r\nLa mémoire intégrée sauvegardera vos réglages pour jouer dans les meilleures conditions sur n\'importe quelle machine.'),
(4, 'Nintendo Switch', 'switch.jpg', 350.00, 146, 'La Nintendo Switch est une console hybride unique en son genre qui brouille la frontière entre le jeu sur console de salon et le jeu plus mobile sur console portable. Avec sa conception modulaire et ses manettes Joy-Con adaptables, la Nintendo Switch permet de jouer en famille ou entre amis dans le confort de votre salon, ou être transporté où vous le souhaitez pour la même expérience de jeu.\r\n\r\nAvec son écran haute définition lumineux, la Nintendo Switch offre une expérience de jeu complète à la maison et au-delà. La batterie de la console fournit des heures de jeu mobile et se recharge avec l\'adaptateur secteur inclus, ou avec des dispositifs de charge USB de type C compatibles. De plus, il est possible pour vos amis de rassembler leurs propres consoles Nintendo Switch pour profiter d’une compétition en multijoueur et en face à face. Vous avez la possibilité de synchroniser jusqu\'à huit appareils.'),
(5, 'Bureau', 'bureau.jpg', 250.00, NULL, 'Nous vous présentons le bureau OHIO PRO, un modèle fonctionnel qui associe un design moderne à une grande surface de travail et divers espaces de rangement. Il s’agit d\'un bureau avec des finitions et des matériaux de qualité, et ce à un prix très compétitif.\r\n\r\nCe bureau informatique est très pratique, car il offre une surface utile spacieuse (120x59 cm) qui vous permettra d’effectuer vos tâches quotidiennes dans un confort optimal. En outre, il dispose d\'une tablette coulissante pour le clavier ainsi qu’un support pour l’unité centrale.\r\n\r\nCe modèle présente également divers espaces de rangement. Grâce à eux, vous pourrez organiser tous les objets nécessaires à vos tâches quotidiennes au bureau, en veillant ainsi à maintenir l\'ordre dans votre espace de travail.\r\n\r\nSoulignons que ce modèle est fabriqué à partir de matériaux d’excellente qualité. Sa structure en métal et en bois apporte à ce modèle un style très esthétique qui ne laissera personne indifférent. En outre, cette combinaison de matériaux vous garantit une résistance, une robustesse et une stabilité exceptionnelles.\r\n\r\nEn résumé, il s\'agit d\'un bureau informatique fonctionnel qui offre une grande surface de travail et divers espaces de rangement, grâce auquel vous pourrez effectuer vos tâches dans un confort absolu. Chez Chaisepro, nous vous proposons d’excellents produits, et ce toujours avec le meilleur service du marché.');

-- --------------------------------------------------------

--
-- Structure de la table `eter_product_eter_user`
--

CREATE TABLE `eter_product_eter_user` (
  `eter_product_id` int(11) NOT NULL,
  `eter_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_state`
--

CREATE TABLE `eter_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `user_description` longtext COLLATE utf8mb4_unicode_ci,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_update` datetime DEFAULT NULL,
  `user_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'utilisateur',
  `activation_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_inscr` int(255) DEFAULT NULL,
  `date_lien` int(255) DEFAULT NULL,
  `user_order_date` datetime DEFAULT NULL,
  `user_desactivate` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eter_user`
--

INSERT INTO `eter_user` (`id`, `user_login`, `user_date`, `user_mail`, `user_password`, `user_address`, `user_zip`, `user_city`, `user_discord`, `user_sex`, `statut`, `user_description`, `user_avatar`, `user_update`, `user_role`, `activation_token`, `reset_token`, `date_inscr`, `date_lien`, `user_order_date`, `user_desactivate`) VALUES
(14, 'Caroline', '2020-04-30 14:37:01', 'caroline@afpa.fr', '$2y$12$4bedSgmqGDW9XrRL.K.fSO5dUX7kZeJcOWgT6q8ru0Ioe8.I6xaYi', '12 rue de la République', '80480', 'DURY', 'Caro#1234', 'Féminin', 1, NULL, 'caroline-5ecfb0bcb99f8-5ef355a16527a.jpeg', NULL, 'Administrateur', NULL, NULL, NULL, NULL, NULL, 0),
(15, 'Clément', '2020-04-30 14:48:13', 'clement@afpa.fr', '$2y$12$IKBaiyjHRupP5UKuJ7kU9eTrr.a0XcR4dRu/JKzkfuFguTSHF6MqG', '27 rue des Cerisiers', '80000', 'AMIENS', 'Clement#1234', 'Masculin', 1, NULL, 'clement-5ecd133a82693.jpeg', NULL, 'Utilisateur', NULL, NULL, NULL, NULL, NULL, 0),
(22, 'Cédric', '2020-05-07 11:30:41', 'cedric@afpa.fr', '$2y$12$pyASQTboVqYrtO5NFSGjaeHna7mjHnt8H/nwtreXbhDZu5e5zdStu', '35 rue Delpech', '80000', 'AMIENS', 'Cédric#1234', 'Masculin', 1, NULL, 'cedric-5ecd1349da22f.jpeg', NULL, 'Utilisateur', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_clan`
--

CREATE TABLE `eter_user_eter_clan` (
  `eter_user_id` int(11) NOT NULL,
  `eter_clan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_game`
--

CREATE TABLE `eter_user_eter_game` (
  `eter_user_id` int(11) NOT NULL,
  `eter_game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eter_user_eter_label`
--

CREATE TABLE `eter_user_eter_label` (
  `eter_user_id` int(11) NOT NULL,
  `eter_label_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Index pour la table `eter_label`
--
ALTER TABLE `eter_label`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_product`
--
ALTER TABLE `eter_product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eter_product_eter_user`
--
ALTER TABLE `eter_product_eter_user`
  ADD PRIMARY KEY (`eter_product_id`,`eter_user_id`),
  ADD KEY `IDX_7B81057C34C9539` (`eter_product_id`),
  ADD KEY `IDX_7B81057DA4035E0` (`eter_user_id`);

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
-- Index pour la table `eter_user_eter_label`
--
ALTER TABLE `eter_user_eter_label`
  ADD PRIMARY KEY (`eter_user_id`,`eter_label_id`),
  ADD KEY `IDX_12E4EE18DA4035E0` (`eter_user_id`),
  ADD KEY `IDX_12E4EE18AB2DC4D9` (`eter_label_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_clan`
--
ALTER TABLE `eter_clan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_comment`
--
ALTER TABLE `eter_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_content`
--
ALTER TABLE `eter_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_event`
--
ALTER TABLE `eter_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_game`
--
ALTER TABLE `eter_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `eter_gameplay`
--
ALTER TABLE `eter_gameplay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_gender`
--
ALTER TABLE `eter_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_label`
--
ALTER TABLE `eter_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_product`
--
ALTER TABLE `eter_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `eter_state`
--
ALTER TABLE `eter_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_streamer`
--
ALTER TABLE `eter_streamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eter_user`
--
ALTER TABLE `eter_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Contraintes pour la table `eter_product_eter_user`
--
ALTER TABLE `eter_product_eter_user`
  ADD CONSTRAINT `FK_7B81057C34C9539` FOREIGN KEY (`eter_product_id`) REFERENCES `eter_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7B81057DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;

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
-- Contraintes pour la table `eter_user_eter_label`
--
ALTER TABLE `eter_user_eter_label`
  ADD CONSTRAINT `FK_12E4EE18AB2DC4D9` FOREIGN KEY (`eter_label_id`) REFERENCES `eter_label` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12E4EE18DA4035E0` FOREIGN KEY (`eter_user_id`) REFERENCES `eter_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
