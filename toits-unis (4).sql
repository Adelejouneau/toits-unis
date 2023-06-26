-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 25 juin 2023 à 11:14
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `toits-unis`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `street_number`, `street_name`, `zip_code`, `city`) VALUES
(57, '12', 'rue Colbert', '75001', 'Paris'),
(58, '3', 'rue de Romainville', '75019', 'Paris'),
(59, '78-80', 'rue de la Réunion', '75020', 'Paris'),
(60, '66', 'rue des couronnes', '75020', 'Paris'),
(61, '2', 'avenue du Docteur Emile Roux', '06200', 'Nice'),
(62, '8', 'rue Duchefdelaville', '75013', 'Paris'),
(63, '35', 'rue Jules Verne ', '44700', 'Orvault'),
(64, '35', 'rue Lune Gerbe', '75019', 'Paris'),
(65, '35', 'avenue Courteline', '75012', 'Paris'),
(66, '34', 'boulevard Sébastopol', '75004', 'Paris'),
(67, '24', 'rue Marc Seguin', '75018', 'Paris'),
(68, '103', 'rue de Charenton', '75012', 'Paris'),
(69, '16', 'boulevard Charles de Gaulle', '44800', 'Saint-Herblain'),
(70, '80', 'rue Camille Desmoulins', '92130', 'Issy les Moulineaux');

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `id` int(11) NOT NULL,
  `name_asso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_asso` longtext COLLATE utf8mb4_unicode_ci,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name_asso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number_asso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_asso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_asso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`id`, `name_asso`, `description_asso`, `website_url`, `image_name_asso`, `phone_number_asso`, `email_asso`, `slug_asso`, `address_id`, `updated_at`) VALUES
(41, 'Utopia 56 Paris', 'Lorem ipsum', 'utopia56.org', 'logo-utopia.png', '0123456789', 'contact@utopia56.org', 'utopia-56-paris', 63, NULL),
(42, 'Fondation Abbé Pierre', 'Lorem ipsum', 'fondation-abbe-pierre.fr', 'abbépierre-logo.png', '01.55.56.37.00', 'service.donateurs@fondation-abbe-pierre.fr', 'fondation-abbe-pierre', 58, NULL),
(43, 'Croix-rouge française', 'Lorem ipsum', 'croix-rouge.fr', 'logo_croixrouge.jpg', '01.46.36.30.31', 'contactparis20@croixrouge.org', 'croix-rouge-française', 68, NULL),
(44, 'ALC', 'Lorem ipsum', 'association-alc.org', 'alc-logo.png', '0493524252', 'siege@association-alc.org', 'alc', 61, NULL),
(45, 'BAAM', 'Lorem ipsum', 'baamasso.org', 'baam-logo.jpg', '0123456789', 'baam.asso@gmail.com', 'baam', 62, NULL),
(46, 'Bureaux du coeur', 'Lorem ipsum', 'baamasso.org', 'bureauxcoeur-logo.png', '0102030405', 'contact@bureauxducoeur.org', 'bureau-du-coeur', 69, NULL),
(47, 'Info migrants', 'Lorem ipsum', 'infomigrants.net/fr/', 'info-migrants_logo.jpg', '0120568489', 'contact@infomigrants.org', 'info-migrants', 70, NULL),
(48, 'Samu social', 'Lorem ipsum', 'www.samusocial.paris', 'logo-samusocial.jpg', '0141748484', 'contact@samusocial-75.fr', 'samu-social', 65, NULL),
(49, 'Aurore', 'Lorem ipsum', 'aurore.asso.fr', 'logo_aurore.png', '0173000230', 'contact@aurore.fr', 'aurore', 66, NULL),
(50, 'France Terre d\'Asile', 'Lorem ipsum', 'france-terre-asile.org', 'logo-ftda.png', '0124252627', 'contact@franceterredasile.fr', 'france-terre-d-asile', 67, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `slug_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name_cat`, `updated_at`, `slug_cat`) VALUES
(41, 'Appartement', '2023-06-21 21:13:12', 'appartement'),
(42, 'Maison', '2023-06-21 21:13:12', 'maison'),
(43, 'Hôtel', '2023-06-21 21:13:12', 'hotel'),
(44, 'Entreprise', '2023-06-21 21:13:12', 'entreprise'),
(45, 'Coin canapé', '2023-06-21 21:13:12', 'coin-canape'),
(46, 'Chambre', '2023-06-21 21:13:12', 'chambre'),
(47, 'Chambre partagée', '2023-06-21 21:13:12', 'chambre-partagee'),
(48, 'Autre', '2023-06-21 21:13:12', 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `description_comment` longtext COLLATE utf8mb4_unicode_ci,
  `matched_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `entry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leaving_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `department`
--

INSERT INTO `department` (`id`, `name_department`, `code_department`) VALUES
(142, 'Ain', 1),
(143, 'Aisne', 2),
(144, 'Allier', 3),
(145, 'Alpes-de-Haute-Provence', 4),
(146, 'Hautes-Alpes', 5),
(147, 'Alpes-Maritimes', 6),
(148, 'Ardèche', 7),
(149, 'Ardennes', 8),
(150, 'Ariège', 9),
(151, 'Aube', 10),
(152, 'Aude', 11),
(153, 'Aveyron', 12),
(154, 'Loire Atlantique', 44),
(155, 'Paris', 75),
(156, 'Seine-Maritime', 76),
(157, 'Seine-et-Marne', 77),
(158, 'Yvelines', 78),
(159, 'Deux-Sèvres', 79),
(160, 'Somme', 80),
(161, 'Essonne', 91),
(162, 'Hauts-de-Seine', 92),
(163, 'Seine St Denis', 93),
(164, 'Val-de-Marne ', 94),
(165, 'Val-D\'Oise ', 95),
(166, 'Guadeloupe', 971),
(167, 'Martinique ', 972),
(168, 'Guyane', 973),
(169, 'La Réunion', 974),
(170, 'Mayotte', 976);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230614111746', '2023-06-14 11:17:58', 63),
('DoctrineMigrations\\Version20230614153834', '2023-06-14 15:38:46', 215),
('DoctrineMigrations\\Version20230615104231', '2023-06-15 10:42:35', 69),
('DoctrineMigrations\\Version20230616080828', '2023-06-16 08:08:47', 57),
('DoctrineMigrations\\Version20230616144758', '2023-06-16 15:08:46', 29),
('DoctrineMigrations\\Version20230616150838', '2023-06-16 15:08:47', 14),
('DoctrineMigrations\\Version20230621111217', '2023-06-21 11:12:31', 126),
('DoctrineMigrations\\Version20230622190440', '2023-06-22 19:04:48', 77);

-- --------------------------------------------------------

--
-- Structure de la table `lodging`
--

CREATE TABLE `lodging` (
  `id` int(11) NOT NULL,
  `description_lod` longtext COLLATE utf8mb4_unicode_ci,
  `image_name_lod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `slug_lod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_lod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lodging`
--

INSERT INTO `lodging` (`id`, `description_lod`, `image_name_lod`, `longitude`, `latitude`, `slug_lod`, `title_lod`, `category_id`, `department_id`, `user_id`) VALUES
(1, 'Description du appartement amenagé', 'image1.jpg', 2.3522, 48.8566, 'logement-1', 'Un chambre amenagé', 41, 142, 5),
(2, 'Description du logement 2', 'image8.jpg', 1.444, 43.6045, 'logement-2', 'Local entreprise', 41, 146, 5),
(3, 'Description du logement 3', 'image8.jpg', -1.6778, 48.1173, 'logement-3', 'Hotel', 47, 155, 5),
(4, 'Description du logement 4', 'image1.jpg', -1.5536, 47.2184, 'logement-4', 'Coin salon agréable', 45, 158, 5),
(5, 'Description du logement 6', 'image1.jpg', 2.3522, 48.8566, 'chambre-partagée', 'chambre disponible', 44, 162, 5),
(8, 'Description du logement 6', 'image1.jpg', 2.3522, 48.8566, 'chambre-partagée', 'chambre disponible', 44, 162, 5),
(9, 'Description du appartement amenagé', 'image7.png', 2.3522, 48.8566, 'logement-1', 'Un chambre amenagé', 41, 142, 5),
(10, 'Description du logement 2', 'image7.png', 1.444, 43.6045, 'logement-2', 'Local entreprise', 41, 146, 5),
(11, 'Description du logement 3', 'image7.png', -1.6778, 48.1173, 'logement-3', 'Hotel', 47, 155, 7),
(12, 'Description du logement 6', 'image7.png', 2.3522, 48.8566, 'chambre-partagée', 'chambre disponible', 44, 162, 5),
(13, 'Description du logement 2', 'image7.png', 1.444, 43.6045, 'logement-2', 'Local entreprise', 41, 146, 5);

-- --------------------------------------------------------

--
-- Structure de la table `lodging_date`
--

CREATE TABLE `lodging_date` (
  `lodging_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matched`
--

CREATE TABLE `matched` (
  `id` int(11) NOT NULL,
  `lodging_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:53:\\\"registration_guest/confirmation_guest_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:167:\\\"http://127.0.0.1:8000/verify/email?expires=1687349556&signature=WRlLmGzbE0zFE9KBOCZju74eH6UZTSGBruzbie7tzOI%3D&token=%2BP7j2NQM8AXAOQ%2F4176240YvEdneyfe5G5dYcBEDPBI%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:20:\\\"mailer@toitsUnis.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:9:\\\"toitsUnis\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:13:\\\"bibi@bibi.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:28:\\\"Confirmation de votre e-mail\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-06-21 11:12:36', '2023-06-21 11:12:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `nombre_lit` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `entreprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `last_name`, `first_name`, `phone_user`, `image_name_user`, `updated_at`, `gender`, `address_id`, `is_verified`, `nombre_lit`, `description`, `entreprise`, `fonction`) VALUES
(4, 'sidib.bintou@gmail.com', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$WcGmd3UvjBIvr3Bimr.BseLHl7NRr/PYeuYrHMFnBIAhBuZ6ZmkXW', 'sidibe', 'bintou', '06.11.22.33.44', 'lorem ipsem', '2023-06-21 21:13:11', 'feminin', NULL, 1, NULL, NULL, NULL, NULL),
(5, 'bibi@bibi.com', '[\"ROLE_USER\"]', '$2y$13$3A4ZIpdRkmjV3xZ6RdqJpug1q6tI7jE3tdHETExgtLsxRD/3jV1qm', 'SI-Bachir', 'Nassima', '06.11.22.33.44', 'lorem ipsem', '2023-06-21 21:13:11', 'feminin', NULL, 1, NULL, NULL, NULL, NULL),
(6, 'john.doe@example.com', '[\"ROLE_USER\"]', '$2y$13$WcGmd3UvjBIvr3Bimr.BseLHl7NRr/PYeuYrHMFnBIAhBuZ6ZmkXW', 'Doe', 'john', '06.11.22.33.44', 'lorem ipsem', '2023-06-21 21:13:11', 'feminin', NULL, 1, NULL, NULL, NULL, NULL),
(7, 'jane.smith@example.com', '[\"ROLE_USER\"]', '$2y$13$WcGmd3UvjBIvr3Bimr.BseLHl7NRr/PYeuYrHMFnBIAhBuZ6ZmkXW', 'Smith', 'jane', '06.11.22.33.42', 'lorem ipsem', '2023-06-21 21:13:11', 'feminin', NULL, 1, NULL, NULL, NULL, NULL),
(12, 'bi@bi.com', '[\"ROLE_GUEST\"]', '$2y$13$/X30uDdAx6lBbzEIk/m8Ge0djtBmJyfm5IFmTpKOf2gqFyaKzgTUG', 'bintou', 'sidibe', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(15, 'bin@bi.com', '[\"ROLE_GUEST\"]', '$2y$13$GTns3nSX9qQZdL4r8Vvg.Ov9P7HY2dSaY4q5.DK3oBKUaLDsYv8qK', 'sid', 'bint', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(18, 'kim@tran.com', '[\"ROLE_GUEST\"]', '$2y$13$YltRZoQ0qEqZxKmaW0D18OoK71bvwoWWvIX/cBCncbMCvrUSCwpJ6', 'kim', 'tran', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(19, 'flo@flo.com', '[\"ROLE_GUEST\"]', '$2y$13$DizpBNjwG6SOIGgvJlXKC.ZzoS7zuDxVC8L6OgrbsRxpzIY7dyFGq', 'flo', 'flo', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD8521CCF5B7AF75` (`address_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C86FEB23F` (`matched_id`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `lodging`
--
ALTER TABLE `lodging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D35182A12469DE2` (`category_id`),
  ADD KEY `IDX_8D35182AAE80F5DF` (`department_id`),
  ADD KEY `IDX_8D35182AA76ED395` (`user_id`);

--
-- Index pour la table `lodging_date`
--
ALTER TABLE `lodging_date`
  ADD PRIMARY KEY (`lodging_id`,`date_id`),
  ADD KEY `IDX_45EACEC987335AF1` (`lodging_id`),
  ADD KEY `IDX_45EACEC9B897366B` (`date_id`);

--
-- Index pour la table `matched`
--
ALTER TABLE `matched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_85F5907D87335AF1` (`lodging_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649F5B7AF75` (`address_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT pour la table `lodging`
--
ALTER TABLE `lodging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `matched`
--
ALTER TABLE `matched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `FK_FD8521CCF5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C86FEB23F` FOREIGN KEY (`matched_id`) REFERENCES `matched` (`id`);

--
-- Contraintes pour la table `lodging`
--
ALTER TABLE `lodging`
  ADD CONSTRAINT `FK_8D35182A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_8D35182AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_8D35182AAE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Contraintes pour la table `lodging_date`
--
ALTER TABLE `lodging_date`
  ADD CONSTRAINT `FK_45EACEC987335AF1` FOREIGN KEY (`lodging_id`) REFERENCES `lodging` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_45EACEC9B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `matched`
--
ALTER TABLE `matched`
  ADD CONSTRAINT `FK_85F5907D87335AF1` FOREIGN KEY (`lodging_id`) REFERENCES `lodging` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
