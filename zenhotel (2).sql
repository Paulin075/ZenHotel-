-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 jan. 2025 à 19:55
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zenhotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

DROP TABLE IF EXISTS `chambres`;
CREATE TABLE IF NOT EXISTS `chambres` (
  `chambre_id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int DEFAULT NULL,
  `nombre_lits` int NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `salle_eau` enum('douche','baignoire') DEFAULT NULL,
  PRIMARY KEY (`chambre_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`chambre_id`, `hotel_id`, `nombre_lits`, `prix`, `numero`, `salle_eau`) VALUES
(1, 1, 1, 100.00, '101', 'douche'),
(2, 1, 2, 120.00, '102', 'baignoire'),
(3, 1, 1, 150.00, '103', 'douche'),
(4, 1, 3, 150.00, '104', 'baignoire'),
(5, 1, 1, 150.00, '105', 'douche'),
(6, 1, 2, 150.00, '106', 'douche'),
(7, 1, 2, 150.00, '107', 'baignoire'),
(8, 1, 1, 150.00, '108', 'douche'),
(9, 1, 1, 150.00, '109', 'douche'),
(10, 1, 2, 150.00, '110', 'douche'),
(11, 1, 1, 150.00, '111', 'baignoire'),
(12, 1, 1, 150.00, '112', 'douche'),
(13, 1, 3, 150.00, '113', 'douche'),
(14, 1, 5, 150.00, '114', 'baignoire'),
(15, 1, 3, 150.00, '116', 'douche'),
(16, 1, 1, 150.00, '117', 'douche'),
(17, 1, 4, 150.00, '118', 'baignoire'),
(18, 1, 1, 150.00, '119', 'douche'),
(19, 1, 2, 140.00, '120', 'baignoire');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `employe_id` int NOT NULL AUTO_INCREMENT,
  `personne_id` int DEFAULT NULL,
  `role` enum('directeur','employe') NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`employe_id`),
  KEY `personne_id` (`personne_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`employe_id`, `personne_id`, `role`, `nom`, `prenom`) VALUES
(1, 4, 'directeur', 'Kouadio', 'Yao'),
(2, 5, 'employe', 'Diop', 'Fatou'),
(3, 6, 'employe', 'Mensah', 'Kwame'),
(4, 7, 'employe', 'Nguyen', 'Thierry'),
(5, 8, 'employe', 'Okafor', 'Chinelo'),
(6, 9, 'employe', 'Mabika', 'Grace'),
(7, 10, 'employe', 'N\'Diaye', 'Amadou'),
(8, 11, 'employe', 'Oluwaseun', 'Bola'),
(9, 12, 'employe', 'Ba', 'Aissata'),
(10, 1, 'employe', 'Mukama', 'John'),
(11, 2, 'employe', 'Afolabi', 'Toyin');

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `nombre_pieces` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `adresse`, `nombre_pieces`, `categorie`) VALUES
(1, 'Lome, Agoe, Avedji', 50, '4 étoiles');

-- --------------------------------------------------------

--
-- Structure de la table `occupants`
--

DROP TABLE IF EXISTS `occupants`;
CREATE TABLE IF NOT EXISTS `occupants` (
  `occupant_id` int NOT NULL AUTO_INCREMENT,
  `personne_id` int DEFAULT NULL,
  `hotel_id` int DEFAULT NULL,
  PRIMARY KEY (`occupant_id`),
  KEY `personne_id` (`personne_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `occupants`
--

INSERT INTO `occupants` (`occupant_id`, `personne_id`, `hotel_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 9, 1),
(5, 10, 1),
(6, 11, 1),
(7, 12, 1),
(8, 1, 1),
(9, 2, 1),
(10, 3, 1),
(11, 9, 1),
(12, 10, 1),
(13, 11, 1),
(14, 12, 1),
(15, 13, NULL),
(16, 14, NULL),
(17, 15, NULL),
(18, 16, NULL),
(19, 17, NULL),
(20, 18, NULL),
(21, 19, NULL),
(22, 20, NULL),
(23, 21, NULL),
(24, 22, NULL),
(25, 23, NULL),
(26, 24, NULL),
(27, 25, NULL),
(28, 26, NULL),
(29, 27, NULL),
(30, 28, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `personne_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `type_personne` enum('enfant','adulte') DEFAULT NULL,
  `reservation_id` int DEFAULT NULL,
  PRIMARY KEY (`personne_id`),
  KEY `fk_reservation` (`reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`personne_id`, `nom`, `prenom`, `type_personne`, `reservation_id`) VALUES
(1, 'Dupont', 'Jean', 'adulte', 25),
(2, 'Martin', 'Sophie', 'adulte', 26),
(3, 'Durand', 'Pierre', 'adulte', 27),
(4, 'Lefevre', 'Claire', 'adulte', 28),
(5, 'Bernard', 'Paul', 'adulte', 29),
(6, 'Moreau', 'Julie', 'adulte', NULL),
(7, 'Petit', 'Marc', 'adulte', NULL),
(8, 'Roux', 'Nicolas', 'adulte', NULL),
(9, 'Dupont', 'Marie', 'enfant', NULL),
(10, 'Martin', 'Lucas', 'enfant', 30),
(11, 'Durand', 'Alice', 'enfant', NULL),
(12, 'Petit', 'Lucie', 'enfant', NULL),
(13, 'Amah', 'Komlan paulin', 'adulte', NULL),
(14, 'Amah', 'Komlan paulin', 'adulte', NULL),
(15, 'Amah', 'Komlan paulin', 'adulte', NULL),
(16, 'Amah', 'Komlan paulin', 'adulte', NULL),
(17, 'Amah', 'Komlan paulin', 'adulte', NULL),
(18, 'Amah', 'Komlan paulin', 'adulte', NULL),
(19, 'Amah', 'Komlan paulin', 'adulte', NULL),
(20, 'Amah', 'Komlan paulin', 'adulte', NULL),
(21, 'Amah', 'Komlan paulin', 'adulte', NULL),
(22, 'Amah', 'Komlan paulin', 'adulte', NULL),
(23, 'Amah', 'Komlan paulin', 'adulte', NULL),
(24, 'Amah', 'Komlan paulin', 'adulte', NULL),
(25, 'Amah', 'Komlan paulin', 'adulte', NULL),
(26, 'Amah', 'Komlan paulin', 'adulte', NULL),
(27, 'Bougoune', 'Kizerbo', 'adulte', NULL),
(28, 'DAO', 'Kokou', 'adulte', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `chambre_id` int DEFAULT NULL,
  `occupant_id` int DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `personne_id` int DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `chambre_id` (`chambre_id`),
  KEY `occupant_id` (`occupant_id`),
  KEY `fk_personnes` (`personne_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `chambre_id`, `occupant_id`, `date_arrivee`, `date_depart`, `personne_id`) VALUES
(25, 7, 12, '2023-10-05', '2023-10-07', 1),
(26, 8, 1, '2023-10-06', '2023-10-08', 2),
(27, 9, 2, '2023-10-07', '2023-10-09', 3),
(28, 10, 3, '2023-10-08', '2023-10-10', 4),
(29, 11, 9, '2023-10-09', '2023-10-11', 5),
(30, 12, 10, '2023-10-10', '2023-10-12', 6),
(45, 3, NULL, '2025-01-25', '2025-01-27', 27),
(46, 3, NULL, '2023-10-26', '2023-10-29', 28);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`personne_id`);

--
-- Contraintes pour la table `occupants`
--
ALTER TABLE `occupants`
  ADD CONSTRAINT `occupants_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`personne_id`),
  ADD CONSTRAINT `occupants_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `fk_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_personne` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`personne_id`),
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`chambre_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`occupant_id`) REFERENCES `occupants` (`occupant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
