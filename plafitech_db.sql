-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 juin 2022 à 16:13
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `plafitech_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `CUSTOMER_COMPANY` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_ADDRESS` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_CITY` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_POSTAL_CODE` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_CONTACT_NAME` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_DIRECTION` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `CUSTOMER_COMPANY`, `CUSTOMER_ADDRESS`, `CUSTOMER_CITY`, `CUSTOMER_POSTAL_CODE`, `CUSTOMER_CONTACT_NAME`, `CUSTOMER_DIRECTION`) VALUES
(1, 'Pôle emploi', 'Place Général Ferrié', 'Laval', '53062', NULL, NULL),
(2, 'Laval Agglo', '1 Place Général Ferrié', 'Laval', '53000', 'Florian Bercault', NULL),
(3, 'Centre E.LECLERC', '62 Boulevard Louis Armand', 'Saint-Berthevin', '53940', 'Karine Jaud', NULL),
(4, 'Mayenne Habitat', '10 Rue Auguste Beuneux', 'Laval', '53000', 'Sébastien Mauguy', NULL),
(5, 'CPAM Rennes', '4 Avenue des Français Libres', 'Rennes', '35000', 'Bryan Roger', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `demand`
--

CREATE TABLE `demand` (
  `DEMAND_ID` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sending_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `DEMAND_TYPE_ID` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demand`
--

INSERT INTO `demand` (`DEMAND_ID`, `message`, `sending_date`, `status`, `DEMAND_TYPE_ID`, `EMPLOYEE_ID`) VALUES
(1, '<div>Nouvelle demande :</div><ul><li>zoaepoiaze</li><li>azeazeaze</li><li><pre>srzerzerzerzerzerzerzerzer</pre></li></ul>', '2021-06-14 23:04:23', 0, 1, 1),
(2, '<blockquote>Je demande à ce que l\'utilisateur cerise soit licencier</blockquote>', '2021-06-16 00:00:00', 1, 2, 1),
(3, '<div>Dessert carrot cake soufflé halvah liquorice. Carrot cake icing caramels topping. Sweet toffee chocolate jelly gummi bears fruitcake cake. Cake sweet roll liquorice lemon drops marshmallow.</div>', '2021-06-22 22:59:53', 0, 1, NULL),
(5, 'Give my mdp', '2021-06-22 23:20:33', 0, 3, 1),
(6, 'iauzyerazer@gmail.com', '2021-07-15 23:57:14', 0, 3, NULL),
(7, 'c.bigare@plafitech.fr', '2021-07-16 09:23:38', 0, 3, 13),
(8, 'c.bigare@plafitech.fr', '2021-07-16 11:26:02', 0, 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `demand_type`
--

CREATE TABLE `demand_type` (
  `DEMAND_TYPE_ID` int(11) NOT NULL,
  `DEMAND_TYPE_LABEL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demand_type`
--

INSERT INTO `demand_type` (`DEMAND_TYPE_ID`, `DEMAND_TYPE_LABEL`) VALUES
(1, 'Création'),
(2, 'Radiation'),
(3, 'Recuperation MDP');

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
('DoctrineMigrations\\Version20210429164304', '2021-04-30 09:29:57', 1999),
('DoctrineMigrations\\Version20210430082430', '2021-06-05 10:59:02', 118),
('DoctrineMigrations\\Version20210602121843', '2021-06-10 18:17:02', 85),
('DoctrineMigrations\\Version20210610163159', '2021-06-10 18:32:03', 384),
('DoctrineMigrations\\Version20210610165013', '2021-06-10 18:50:19', 156),
('DoctrineMigrations\\Version20210614195503', '2021-06-14 21:55:16', 190),
('DoctrineMigrations\\Version20210614200048', '2021-06-14 22:00:54', 128),
('DoctrineMigrations\\Version20210614203001', '2021-06-14 22:31:12', 134),
('DoctrineMigrations\\Version20210614204618', '2021-06-14 22:46:23', 94),
('DoctrineMigrations\\Version20210624202654', '2021-06-24 22:27:00', 55),
('DoctrineMigrations\\Version20210628191826', '2021-06-28 21:18:59', 969),
('DoctrineMigrations\\Version20210628201602', '2021-06-29 17:57:34', 245),
('DoctrineMigrations\\Version20210629155729', '2021-06-29 17:57:34', 341),
('DoctrineMigrations\\Version20210629161448', '2021-06-29 18:14:53', 131),
('DoctrineMigrations\\Version20210629164504', '2021-06-29 18:45:11', 36),
('DoctrineMigrations\\Version20210629193857', '2021-06-29 21:39:02', 133),
('DoctrineMigrations\\Version20210629194431', '2021-06-29 21:45:07', 51),
('DoctrineMigrations\\Version20210629203110', '2021-06-29 22:31:15', 818),
('DoctrineMigrations\\Version20210703104306', '2021-07-03 12:43:22', 453),
('DoctrineMigrations\\Version20210703121813', '2021-07-15 10:14:41', 25),
('DoctrineMigrations\\Version20210703143846', '2021-07-03 16:39:09', 346),
('DoctrineMigrations\\Version20210713080926', '2021-07-13 10:10:56', 336),
('DoctrineMigrations\\Version20210715080946', '2021-07-15 11:30:46', 583),
('DoctrineMigrations\\Version20210715091415', '2021-07-15 12:05:43', 526);

-- --------------------------------------------------------

--
-- Structure de la table `document_eav`
--

CREATE TABLE `document_eav` (
  `DOCUMENT_EAV_ID` int(11) NOT NULL,
  `DOCUMENT_EAV_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_EAV_TITLE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_EAV_IS_VISIBLE` tinyint(1) DEFAULT NULL,
  `DOCUMENT_EAV_DESCIPTION` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_EAV_VALIDATION_RULE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_eav`
--

INSERT INTO `document_eav` (`DOCUMENT_EAV_ID`, `DOCUMENT_EAV_CODE`, `DOCUMENT_EAV_TITLE`, `DOCUMENT_EAV_IS_VISIBLE`, `DOCUMENT_EAV_DESCIPTION`, `DOCUMENT_EAV_VALIDATION_RULE`) VALUES
(5, 'date_intervention', 'Date intervention', 1, 'Date de l\'intervention sur le chantier', NULL),
(6, 'equipe', 'Équipe', 1, 'Nom de l\'équipe qui s\'occupe du chantier', NULL),
(7, 'plan', 'Plans', 1, 'Permet de savoir si des plans sont fournis', NULL),
(8, 'hauteur_travail', 'Hauteur de travail', 1, 'Hauteur en mètre à laquelle le chantier aura lieu', NULL),
(9, 'besoin_interimaire', 'Besoin intérimaire', 1, 'Permet de savoir si le chantier a besoin d\'intérimaires', NULL),
(10, 'livraison_materiaux_site', 'Livraison matériaux sur site', 1, 'Permet de savoir si le chantier a une livraison de matériaux.\r\noui/non', NULL),
(11, 'copie_bon_commande', 'Copie bon de commande', 1, 'Permet de savoir si il y a une copie d\'un bon de commande.\r\nOui/Non', NULL),
(12, 'besoin_echafaudage', 'Besoin échafaudage', 1, 'Permet de savoir il y a besoin d\'un échafaudage sur le chantier.\r\nOui/Non', NULL),
(13, 'hauteur_echafaudage', 'Hauteur échafaudage', 1, 'Hauteur de l\'échafaudage en mètre', NULL),
(14, 'aire_stockage_materiaux', 'Aire de stockage pour matériaux', 1, 'Permet de savoir si il y a une aire de stockage pour matériaux sur le chantier', NULL),
(15, 'date_chantier_fini', 'Chantier fini le', 1, 'Date à laquelle le chantier est terminé', NULL),
(16, 'chantier_fini', 'Chantier fini', 1, 'Permet de savoir le chantier est fini.\r\nOui/Non', NULL),
(17, 'observations_compagnons', 'Observations des compagnons', 1, 'Commentaire/Observation des compagnons sur le chantier', NULL),
(18, 'observations', 'Observations', 1, 'Observations quelconques', NULL),
(19, 'fiche_de_non_conformite', 'Fiche de non conformité', 1, 'Permet de savoir si une fiche de non conformité a été créée pour le chantier.\r\nOui/Non', NULL),
(20, 'materiaux_a_prendre_a_atelier', 'Matériaux à prendre à l’atelier', 1, 'Liste des matériaux à prendre à l\'atelier pour le chantier.', NULL),
(21, 'acceptation_client', 'Acceptation Client', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `document_eav_type`
--

CREATE TABLE `document_eav_type` (
  `DOCUMENT_EAV_TYPE_ID` int(11) NOT NULL,
  `DOCUMENT_EAV_TYPE_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_EAV_TYPE_TITLE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_EAV_TYPE_ORDER` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_eav_type`
--

INSERT INTO `document_eav_type` (`DOCUMENT_EAV_TYPE_ID`, `DOCUMENT_EAV_TYPE_CODE`, `DOCUMENT_EAV_TYPE_TITLE`, `DOCUMENT_EAV_TYPE_ORDER`) VALUES
(1, 'caracteristiques_chantier', 'CARACTERISTIQUES CHANTIER', '5'),
(2, 'info_complementaire', 'INFORMATIONS  COMPLEMENTAIRES', '6'),
(3, 'observations', 'OBSERVATIONS', '7'),
(4, 'general', 'GENERAL', '0');

-- --------------------------------------------------------

--
-- Structure de la table `document_eav_type_document_eav`
--

CREATE TABLE `document_eav_type_document_eav` (
  `DOCUMENT_EAV_ID` int(11) NOT NULL,
  `DOCUMENT_EAV_TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `document_eav_type_document_entity`
--

CREATE TABLE `document_eav_type_document_entity` (
  `DOCUMENT_ID` int(11) NOT NULL,
  `DOCUMENT_EAV_TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_eav_type_document_entity`
--

INSERT INTO `document_eav_type_document_entity` (`DOCUMENT_ID`, `DOCUMENT_EAV_TYPE_ID`) VALUES
(1, 2),
(1, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity`
--

CREATE TABLE `document_entity` (
  `DOCUMENT_ID` int(11) NOT NULL,
  `DOCUMENT_REFERENCE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_CREATED_AT` date DEFAULT NULL,
  `DOCTYPE_ID` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `SITE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity`
--

INSERT INTO `document_entity` (`DOCUMENT_ID`, `DOCUMENT_REFERENCE`, `DOCUMENT_CREATED_AT`, `DOCTYPE_ID`, `EMPLOYEE_ID`, `SITE_ID`) VALUES
(1, 'pole_emploi_cloison_v1', '2021-06-29', 1, 1, 2),
(4, 'Renovation_salle_de_conseil_mairie_pose_plaques', '2021-07-15', 1, 11, 5),
(5, 'pole_emploi_cloison_v2', '2021-07-15', 1, 1, 2),
(6, 'rennes_cpam_renovation_plafonds', '2021-07-15', 2, 13, 9),
(7, 'mayenne_habitat_construction_evron', '2021-07-15', 1, 11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity_boolean`
--

CREATE TABLE `document_entity_boolean` (
  `DOCUMENT_ENTITY_BOOLEAN_ID` int(11) NOT NULL,
  `DOCUMENT_ENTITY_BOOLEAN_VALUE` tinyint(1) DEFAULT NULL,
  `DOCUMENT_ID` int(11) DEFAULT NULL,
  `DOCUMENT_EAV_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity_boolean`
--

INSERT INTO `document_entity_boolean` (`DOCUMENT_ENTITY_BOOLEAN_ID`, `DOCUMENT_ENTITY_BOOLEAN_VALUE`, `DOCUMENT_ID`, `DOCUMENT_EAV_ID`) VALUES
(1, 1, 1, 7),
(2, 1, 1, 21),
(3, 1, 1, 12),
(5, 0, 7, 16),
(6, 1, 7, 7),
(7, 0, 7, 9),
(8, 1, 7, 21),
(9, 1, 7, 11),
(10, 1, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity_date`
--

CREATE TABLE `document_entity_date` (
  `DOCUMENT_ENTITY_DATE_ID` int(11) NOT NULL,
  `DOCUMENT_ENTITY_DATE_VALUE` date DEFAULT NULL,
  `DOCUMENT_ID` int(11) DEFAULT NULL,
  `DOCUMENT_EAV_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity_date`
--

INSERT INTO `document_entity_date` (`DOCUMENT_ENTITY_DATE_ID`, `DOCUMENT_ENTITY_DATE_VALUE`, `DOCUMENT_ID`, `DOCUMENT_EAV_ID`) VALUES
(1, '2021-07-24', 1, 5),
(3, '2021-06-27', 5, 5),
(4, '2021-07-02', 1, 15),
(5, '2021-06-11', 5, 5),
(6, '2021-03-01', 6, 5),
(7, '2021-05-28', 6, 15),
(8, '2021-07-05', 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity_int`
--

CREATE TABLE `document_entity_int` (
  `DOCUMENT_ENTITY_INT_ID` int(11) NOT NULL,
  `DOCUMENT_ENTITY_INT_VALUE` int(11) DEFAULT NULL,
  `DOCUMENT_ID` int(11) DEFAULT NULL,
  `DOCUMENT_EAV_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity_int`
--

INSERT INTO `document_entity_int` (`DOCUMENT_ENTITY_INT_ID`, `DOCUMENT_ENTITY_INT_VALUE`, `DOCUMENT_ID`, `DOCUMENT_EAV_ID`) VALUES
(1, 5, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity_site`
--

CREATE TABLE `document_entity_site` (
  `SITE_ID` int(11) NOT NULL,
  `DOCUMENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity_site`
--

INSERT INTO `document_entity_site` (`SITE_ID`, `DOCUMENT_ID`) VALUES
(2, 1),
(2, 5),
(5, 4),
(6, 7),
(9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `document_entity_varchar`
--

CREATE TABLE `document_entity_varchar` (
  `DOCUMENT_ENTITY_VARCHAR_ID` int(11) NOT NULL,
  `DOCUMENT_ENTITY_VARCHAR_VALUE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCUMENT_ID` int(11) DEFAULT NULL,
  `DOCUMENT_EAV_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_entity_varchar`
--

INSERT INTO `document_entity_varchar` (`DOCUMENT_ENTITY_VARCHAR_ID`, `DOCUMENT_ENTITY_VARCHAR_VALUE`, `DOCUMENT_ID`, `DOCUMENT_EAV_ID`) VALUES
(1, 'Tart cupcake sweet roll chocolate tart pastry oat cake candy. Carrot cake lemon drops liquorice apple pie liquorice cupcake. Tootsie roll sesame snaps donut. Toffee tootsie roll dragée wafer chupa chups danish.', 1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `document_type`
--

CREATE TABLE `document_type` (
  `DOCTYPE_ID` int(11) NOT NULL,
  `DOCTYPE_TITLE` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCTYPE_CODE` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_type`
--

INSERT INTO `document_type` (`DOCTYPE_ID`, `DOCTYPE_TITLE`, `DOCTYPE_CODE`) VALUES
(1, 'CHANTIER Cloisons', 'cloison'),
(2, 'CHANTIER Plafonds', 'plafond'),
(3, 'CHANTIER Projections', 'projection');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `EMPLOYEE_FIRSTNAME` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_LASTNAME` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_EMAIL` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_ADDRESS` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_CITY` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_POSTAL_CODE` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_HASHED_MDP` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_GENRE` tinyint(1) DEFAULT NULL,
  `EMPLOYEE_CREATED_AT` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `ROLE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `EMPLOYEE_FIRSTNAME`, `EMPLOYEE_LASTNAME`, `EMPLOYEE_EMAIL`, `EMPLOYEE_ADDRESS`, `EMPLOYEE_CITY`, `EMPLOYEE_POSTAL_CODE`, `EMPLOYEE_HASHED_MDP`, `EMPLOYEE_GENRE`, `EMPLOYEE_CREATED_AT`, `roles`, `ROLE_ID`) VALUES
(1, 'Tangi', 'GREFFIER', 'tangigreffier@gmail.com', '1 Place de l\'église', 'St Cyr Le Gravelais', '53320', 'Tangidu53', 1, '2021-06-07 22:24:00', '[]', 1),
(11, 'Benjamin', 'Cossoneux', 'b.cossoneux@plafitech.fr', '33 rue de la paix', 'Laval', '53000', 'root', 1, '2021-07-15 00:00:00', '[]', 1),
(12, 'Pierre', 'Denis', 'pierre.denis@orange.fr', '44, rue de nantes', 'Laval', '53000', 'root', 1, '2021-07-15 23:17:00', '[]', 3),
(13, 'Charles', 'Biguaré', 'c.bigare@plafitech.fr', '26, allée alexandre semain', 'Changé', '53026', 'root2', 1, '2021-07-15 23:18:45', '[]', 2),
(14, 'Test', 'Nom de Test', 'test@gmail.com', '98 Rue de test', 'Laval', '53000', 'root', 0, '2021-07-15 23:19:25', '[]', 8);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_TITLE` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRODUCT_UNITARY_PRICE` decimal(10,2) DEFAULT NULL,
  `PRODUCT_DIMENSION` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_TITLE`, `PRODUCT_UNITARY_PRICE`, `PRODUCT_DIMENSION`) VALUES
(1, 'Dalle murale PVC acajou', '1.35', 'L.250 x l.37.5cm x Ep.8mm'),
(2, 'Lambris PVC blanc lisse ARTENS', '5.51', 'L.260 x l.37.5cm x Ep.8mm'),
(3, 'Dalle murale PVC gris clair DUMAWALL', '24.90', 'L.65 x l.37.5cm x Ep.5mm'),
(4, 'Lambris PVC bois raboté savane ARTENS', '6.95', 'L.260 x l.37.5cm x Ep.8mm'),
(5, 'Dalle murale PVC Mystic gris mat DUMAWALL', '24.90', 'L.65 x l.37.5cm x Ep.5mm'),
(6, 'Lambris PVC bois naturel', '20.48', 'L.260 x l.37.5cm x Ep.5mm');

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

CREATE TABLE `provider` (
  `PROVIDER_ID` int(11) NOT NULL,
  `PROVIDER_COMPANY_NAME` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROVIDER_SIRET` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROVIDER_CONTACT_FULLNAME` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROVIDER_CONTACT_GENRE` tinyint(1) DEFAULT NULL,
  `PROVIDER_EMAIL` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROVIDER_TEL` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `provider` (`PROVIDER_ID`, `PROVIDER_COMPANY_NAME`, `PROVIDER_SIRET`, `PROVIDER_CONTACT_FULLNAME`, `PROVIDER_CONTACT_GENRE`, `PROVIDER_EMAIL`, `PROVIDER_TEL`) VALUES
(1, 'PUM', '552 178 639 00132', 'Denise PAPIN', 0, 'dpapin@pum.com', '0757901915'),
(2, 'Réseau Pro Laval', '024 356 185 00139', 'Philippe GRAPHIK', 1, 'contact@reseauprolaval.fr', '0243591859'),
(3, 'Gedimat Socramat', '024 368 686 00138', 'Jean GEDIMAT', 1, 'contact@gedimat-socramat.fr', '0243686300'),
(4, 'Point.P - Laval Ouest', '075 554 670 00132', 'Jérémy FAILLEUL', 1, 'contact@pointp.fr', '0755546702'),
(5, 'Larivière', '024 390 757 00137', 'Pierre LARIVIERE', 1, 'pierre@lariviere.fr', '0243907575');

-- --------------------------------------------------------

--
-- Structure de la table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `PURCH_ORDER_ID` int(11) NOT NULL,
  `PURCH_ORDER_CREATED_AT` date DEFAULT NULL,
  `PURCH_ORDER_ASKED_PRICE` tinyint(1) DEFAULT NULL,
  `PURCH_ORDER_DELIVERY_DATE` date DEFAULT NULL,
  `PURCH_ORDER_DELIVERY_LOCATION` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PURCH_ORDER_NB_PAGE` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `PROVIDER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `purchase_order`
--

INSERT INTO `purchase_order` (`PURCH_ORDER_ID`, `PURCH_ORDER_CREATED_AT`, `PURCH_ORDER_ASKED_PRICE`, `PURCH_ORDER_DELIVERY_DATE`, `PURCH_ORDER_DELIVERY_LOCATION`, `PURCH_ORDER_NB_PAGE`, `EMPLOYEE_ID`, `PROVIDER_ID`) VALUES
(14, '2021-07-15', 1, '2021-07-15', 'Boulevard de la Communication, 53950 LOUVERNÉ', 1, 11, 1),
(16, '2021-07-15', 0, '2021-07-16', 'La Vionnère, 53960 Bonchamps-lès-Laval', 1, 11, 2),
(17, '2021-07-15', 0, '2021-07-17', '39 Boulevard Jean Jaurès, 53000 Laval', 1, 13, 3),
(18, '2021-07-15', 0, '2021-07-19', 'Impasse de Saint Melaine, 53005 Laval', 1, 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `purchase_order_product`
--

CREATE TABLE `purchase_order_product` (
  `QUANTITY` int(11) NOT NULL,
  `PURCH_ORDER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `purchase_order_product`
--

INSERT INTO `purchase_order_product` (`QUANTITY`, `PURCH_ORDER_ID`, `PRODUCT_ID`) VALUES
(1, 14, 1),
(1, 16, 1),
(2, 16, 2),
(1, 17, 1),
(2, 17, 2),
(3, 17, 3),
(1, 18, 1),
(2, 18, 2),
(3, 18, 3),
(4, 18, 4);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_TITLE` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_TITLE`) VALUES
(1, 'Administrateur'),
(2, 'Conducteur de travaux'),
(3, 'Technicien'),
(8, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `SITE_ID` int(11) NOT NULL,
  `SITE_TITLE` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SITE_CREATED_AT` date DEFAULT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `SITE_NEUF` tinyint(1) DEFAULT NULL,
  `SITE_RENOVATION` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`SITE_ID`, `SITE_TITLE`, `SITE_CREATED_AT`, `CUSTOMER_ID`, `SITE_NEUF`, `SITE_RENOVATION`) VALUES
(2, 'LAVAL - Renforcement charpente Pôle Emploi', '2021-06-29', 1, 0, 1),
(5, 'LAVAL - Rénovation salle de conseil de la mairie', '2021-07-15', 2, 0, 1),
(6, 'EVRON - Construction 18 logts Les Coquelicots', '2021-07-15', 4, 1, 0),
(7, 'LAVAL - Rénovation énergétique centre administratif', '2021-07-15', 2, 0, 1),
(8, 'LAVAL - Aménagement du mail Leclerc', '2021-07-15', 3, 0, 1),
(9, 'RENNES - Rénovation accueil siège CPAM', '2021-07-15', 5, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Index pour la table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`DEMAND_ID`),
  ADD KEY `IDX_428D797340253CC1` (`DEMAND_TYPE_ID`),
  ADD KEY `IDX_428D7973394D2554` (`EMPLOYEE_ID`);

--
-- Index pour la table `demand_type`
--
ALTER TABLE `demand_type`
  ADD PRIMARY KEY (`DEMAND_TYPE_ID`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `document_eav`
--
ALTER TABLE `document_eav`
  ADD PRIMARY KEY (`DOCUMENT_EAV_ID`),
  ADD UNIQUE KEY `UNIQ_A777ACD277013E7F` (`DOCUMENT_EAV_CODE`);

--
-- Index pour la table `document_eav_type`
--
ALTER TABLE `document_eav_type`
  ADD PRIMARY KEY (`DOCUMENT_EAV_TYPE_ID`);

--
-- Index pour la table `document_eav_type_document_eav`
--
ALTER TABLE `document_eav_type_document_eav`
  ADD PRIMARY KEY (`DOCUMENT_EAV_ID`,`DOCUMENT_EAV_TYPE_ID`),
  ADD KEY `IDX_ADEB1A5DB082086C` (`DOCUMENT_EAV_ID`),
  ADD KEY `IDX_ADEB1A5D4352B72F` (`DOCUMENT_EAV_TYPE_ID`);

--
-- Index pour la table `document_eav_type_document_entity`
--
ALTER TABLE `document_eav_type_document_entity`
  ADD PRIMARY KEY (`DOCUMENT_ID`,`DOCUMENT_EAV_TYPE_ID`),
  ADD KEY `IDX_11057FE87671AC3F` (`DOCUMENT_ID`),
  ADD KEY `IDX_11057FE84352B72F` (`DOCUMENT_EAV_TYPE_ID`);

--
-- Index pour la table `document_entity`
--
ALTER TABLE `document_entity`
  ADD PRIMARY KEY (`DOCUMENT_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_DOCUMENT_TYPE` (`DOCTYPE_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_SITE` (`SITE_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_EMPLOYEE` (`EMPLOYEE_ID`);

--
-- Index pour la table `document_entity_boolean`
--
ALTER TABLE `document_entity_boolean`
  ADD PRIMARY KEY (`DOCUMENT_ENTITY_BOOLEAN_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_BOOLEAN_DOCUMENT_ENTITY` (`DOCUMENT_ID`),
  ADD KEY `IDX_63054F47B082086C` (`DOCUMENT_EAV_ID`);

--
-- Index pour la table `document_entity_date`
--
ALTER TABLE `document_entity_date`
  ADD PRIMARY KEY (`DOCUMENT_ENTITY_DATE_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_DATE_DOCUMENT_ENTITY` (`DOCUMENT_ID`),
  ADD KEY `IDX_60FBB93BB082086C` (`DOCUMENT_EAV_ID`);

--
-- Index pour la table `document_entity_int`
--
ALTER TABLE `document_entity_int`
  ADD PRIMARY KEY (`DOCUMENT_ENTITY_INT_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_INT_DOCUMENT_ENTITY` (`DOCUMENT_ID`),
  ADD KEY `IDX_CB1D1140B082086C` (`DOCUMENT_EAV_ID`);

--
-- Index pour la table `document_entity_site`
--
ALTER TABLE `document_entity_site`
  ADD PRIMARY KEY (`SITE_ID`,`DOCUMENT_ID`),
  ADD KEY `IDX_A32687A5F1B5AEBC` (`SITE_ID`),
  ADD KEY `IDX_A32687A57671AC3F` (`DOCUMENT_ID`);

--
-- Index pour la table `document_entity_varchar`
--
ALTER TABLE `document_entity_varchar`
  ADD PRIMARY KEY (`DOCUMENT_ENTITY_VARCHAR_ID`),
  ADD KEY `FK_DOCUMENT_ENTITY_VARCHAR_DOCUMENT_ENTITY` (`DOCUMENT_ID`),
  ADD KEY `IDX_16541A93B082086C` (`DOCUMENT_EAV_ID`);

--
-- Index pour la table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`DOCTYPE_ID`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `UNIQ_5D9F75A1E31B0E06` (`EMPLOYEE_EMAIL`),
  ADD KEY `FK_EMPLOYEE_ROLE` (`ROLE_ID`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Index pour la table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`PROVIDER_ID`);

--
-- Index pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`PURCH_ORDER_ID`),
  ADD KEY `FK_PURCHASE_ORDER_PROVIDER` (`PROVIDER_ID`),
  ADD KEY `FK_PURCHASE_ORDER_EMPLOYEE` (`EMPLOYEE_ID`);

--
-- Index pour la table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  ADD PRIMARY KEY (`PURCH_ORDER_ID`,`PRODUCT_ID`),
  ADD KEY `IDX_F32214F94BBA2C4B` (`PURCH_ORDER_ID`),
  ADD KEY `IDX_F32214F976563D85` (`PRODUCT_ID`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`SITE_ID`),
  ADD KEY `FK_SITE_CUSTOMER` (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `demand`
--
ALTER TABLE `demand`
  MODIFY `DEMAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `demand_type`
--
ALTER TABLE `demand_type`
  MODIFY `DEMAND_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_eav`
--
ALTER TABLE `document_eav`
  MODIFY `DOCUMENT_EAV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `document_eav_type`
--
ALTER TABLE `document_eav_type`
  MODIFY `DOCUMENT_EAV_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `document_entity`
--
ALTER TABLE `document_entity`
  MODIFY `DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `document_entity_boolean`
--
ALTER TABLE `document_entity_boolean`
  MODIFY `DOCUMENT_ENTITY_BOOLEAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `document_entity_date`
--
ALTER TABLE `document_entity_date`
  MODIFY `DOCUMENT_ENTITY_DATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `document_entity_int`
--
ALTER TABLE `document_entity_int`
  MODIFY `DOCUMENT_ENTITY_INT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `document_entity_varchar`
--
ALTER TABLE `document_entity_varchar`
  MODIFY `DOCUMENT_ENTITY_VARCHAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `DOCTYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `provider`
--
ALTER TABLE `provider`
  MODIFY `PROVIDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `PURCH_ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `SITE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demand`
--
ALTER TABLE `demand`
  ADD CONSTRAINT `FK_428D7973394D2554` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_428D797340253CC1` FOREIGN KEY (`DEMAND_TYPE_ID`) REFERENCES `demand_type` (`DEMAND_TYPE_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document_eav_type_document_eav`
--
ALTER TABLE `document_eav_type_document_eav`
  ADD CONSTRAINT `FK_ADEB1A5D4352B72F` FOREIGN KEY (`DOCUMENT_EAV_TYPE_ID`) REFERENCES `document_eav_type` (`DOCUMENT_EAV_TYPE_ID`);

--
-- Contraintes pour la table `document_eav_type_document_entity`
--
ALTER TABLE `document_eav_type_document_entity`
  ADD CONSTRAINT `FK_11057FE84352B72F` FOREIGN KEY (`DOCUMENT_EAV_TYPE_ID`) REFERENCES `document_eav_type` (`DOCUMENT_EAV_TYPE_ID`),
  ADD CONSTRAINT `FK_11057FE87671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`);

--
-- Contraintes pour la table `document_entity`
--
ALTER TABLE `document_entity`
  ADD CONSTRAINT `FK_B04AF50E394D2554` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_B04AF50E8DCA2D63` FOREIGN KEY (`DOCTYPE_ID`) REFERENCES `document_type` (`DOCTYPE_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_B04AF50EF1B5AEBC` FOREIGN KEY (`SITE_ID`) REFERENCES `site` (`SITE_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document_entity_boolean`
--
ALTER TABLE `document_entity_boolean`
  ADD CONSTRAINT `FK_63054F477671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`),
  ADD CONSTRAINT `FK_63054F47B082086C` FOREIGN KEY (`DOCUMENT_EAV_ID`) REFERENCES `document_eav` (`DOCUMENT_EAV_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document_entity_date`
--
ALTER TABLE `document_entity_date`
  ADD CONSTRAINT `FK_60FBB93B7671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`),
  ADD CONSTRAINT `FK_60FBB93BB082086C` FOREIGN KEY (`DOCUMENT_EAV_ID`) REFERENCES `document_eav` (`DOCUMENT_EAV_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document_entity_int`
--
ALTER TABLE `document_entity_int`
  ADD CONSTRAINT `FK_CB1D11407671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`),
  ADD CONSTRAINT `FK_CB1D1140B082086C` FOREIGN KEY (`DOCUMENT_EAV_ID`) REFERENCES `document_eav` (`DOCUMENT_EAV_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document_entity_site`
--
ALTER TABLE `document_entity_site`
  ADD CONSTRAINT `FK_A32687A57671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`),
  ADD CONSTRAINT `FK_A32687A5F1B5AEBC` FOREIGN KEY (`SITE_ID`) REFERENCES `site` (`SITE_ID`);

--
-- Contraintes pour la table `document_entity_varchar`
--
ALTER TABLE `document_entity_varchar`
  ADD CONSTRAINT `FK_16541A937671AC3F` FOREIGN KEY (`DOCUMENT_ID`) REFERENCES `document_entity` (`DOCUMENT_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_16541A93B082086C` FOREIGN KEY (`DOCUMENT_EAV_ID`) REFERENCES `document_eav` (`DOCUMENT_EAV_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A1D10B9A56` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ROLE_ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `FK_21E210B2394D2554` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`),
  ADD CONSTRAINT `FK_21E210B2BF1D7CA2` FOREIGN KEY (`PROVIDER_ID`) REFERENCES `provider` (`PROVIDER_ID`);

--
-- Contraintes pour la table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  ADD CONSTRAINT `FK_F32214F94BBA2C4B` FOREIGN KEY (`PURCH_ORDER_ID`) REFERENCES `purchase_order` (`PURCH_ORDER_ID`),
  ADD CONSTRAINT `FK_F32214F976563D85` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`);

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `FK_694309E426DB17FB` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
