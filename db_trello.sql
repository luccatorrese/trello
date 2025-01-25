-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 jan. 2025 à 07:49
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
-- Base de données : `trello`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `titre`) VALUES
(1, 'A faire'),
(2, 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_groupe` int NOT NULL,
  `titre` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `categorie` tinytext NOT NULL,
  `date_limite` datetime NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `id_groupe`, `titre`, `description`, `categorie`, `date_limite`, `date_ajout`) VALUES
(1, 1, 'Faire le devoir maison.', 'Devoir portant sur la création de cartes en HTML.', 'Informatique.', '2024-03-21 15:08:35', '2024-02-29 15:10:57'),
(2, 1, 'Test', 'Ajout de carte', 'Aucune', '2024-03-17 10:56:13', '2024-03-17 11:56:37'),
(6, 2, 'Convention de stage', 'Signer la convention', 'Catégorie', '2024-03-17 16:21:38', '2024-03-17 16:22:33'),
(5, 1, 'Test', 'Description', 'Catégorie Informatique', '2024-03-17 15:19:18', '2024-03-17 16:19:49'),
(7, 2, 'Devoir terminé', 'Le 17 mars', 'Catégorie', '2024-03-17 15:28:12', '2024-03-17 16:28:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
