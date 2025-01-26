-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 jan. 2025 à 14:50
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_trello`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `titre`) VALUES
(1, 'Devoirs à faire'),
(2, 'Devoirs terminés');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_groupe` int NOT NULL,
  `titre` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `categorie` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `date_limite` datetime NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `id_groupe`, `titre`, `description`, `categorie`, `date_limite`, `date_ajout`) VALUES
(1, 1, 'Faire le devoir maison.', 'Devoir portant sur la création de cartes en HTML.', 'Informatique.', '2024-03-21 15:08:35', '2024-02-29 15:10:57'),
(2, 1, 'Devoir maison', 'Rendre le devoir maison Trello pour le 26/01/2025.', 'Développement, front et intégration', '2025-01-26 23:59:59', '2024-03-17 11:56:37'),
(6, 2, 'Convention de stage', 'Signer la convention de stage avant avril 2025.', 'SAE 406 - Stage', '2025-04-04 18:00:00', '2024-03-17 16:22:33'),
(5, 1, 'SAE', 'Continuer d\'avancer le portfolio pour le semestre 4.', 'SAE - Démarche Portfolio', '2025-06-06 23:59:59', '2024-03-17 16:19:49'),
(7, 2, 'SAE', 'Rendre le livrable de la SAE 302 portant sur la création d\'une bière, pour le 16/01/2025 avant 20h.', 'SAE 302 - Produire des contenus pour une com plurimédia', '2025-01-16 20:00:00', '2024-03-17 16:28:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
