-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 sep. 2025 à 04:25
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
-- Base de données : `super_car`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Peniela', '123');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `price`, `image`, `description`) VALUES
(14, 'Porsche ', 'Porsche Cayenne', 2025, '132400.00', 'PORSHE_CAYENNE.jpg', 'Type : SUV sportif\r\n\r\nMotorisation : V6 et V8, essence ou diesel, jusqu’à 670 ch (Cayenne Turbo GT)\r\n\r\nTransmission : 4 roues motrices\r\n\r\n0-100 km/h : ~3,8 à 6,2 s selon version\r\n\r\nCaractéristique : SUV alliant luxe et performances sportives, intérieur très haut de gamme, polyvalent.'),
(13, 'Porsche', 'Porsche 911', 2025, '131700.00', 'PORSHE_911.jpg', 'Type : Coupé / Cabriolet sportif iconique\r\n\r\nMotorisation : 6 cylindres à plat, 379 à plus de 650 ch selon modèle (Carrera, Turbo, GT3)\r\n\r\nTransmission : Propulsion ou 4 roues motrices\r\n\r\n0-100 km/h : ~3,2 à 4,0 s selon version\r\n\r\nCaractéristique : Légendaire pour sa maniabilité et son moteur arrière, luxueuse et performante, design intemporel.'),
(12, 'BMW ', 'BMW Z4', 2024, '70000.00', 'BMW_I8.jpg', 'Type : Roadster 2 places\r\n\r\nMotorisation : 4 ou 6 cylindres turbo, jusqu’à 382 ch (Z4 M40i)\r\n\r\nTransmission : Propulsion\r\n\r\n0-100 km/h : ~4,1 s pour la version M40i\r\n\r\nCaractéristique : Sportivité et plaisir de conduite à ciel ouvert, design élégant, maniabilité excellente.'),
(11, 'BMW', 'BMW X5', 2024, '116900.00', 'BMW_X6_M.jpg', 'Type : SUV premium\r\n\r\nMotorisation : Essence ou diesel, 6-8 cylindres disponibles, jusqu’à 530 ch pour le X5 M\r\n\r\nTransmission : 4 roues motrices (xDrive)\r\n\r\n0-100 km/h : ~4,0 à 6,0 s selon version\r\n\r\nCaractéristique : Confort luxueux, espace intérieur généreux, technologie embarquée avancée.'),
(10, 'BMW', 'BMW M3', 2024, '70000.00', 'BMW_M3.jpg', 'Type : Berline sportive compacte\r\n\r\nMotorisation : 6 cylindres en ligne, turbo, environ 480-510 ch selon version\r\n\r\nTransmission : Propulsion ou 4 roues motrices (M3 Competition)\r\n\r\n0-100 km/h : ~3,9 à 4,2 s\r\n\r\nCaractéristique : Performances très sportives tout en restant utilisable au quotidien, direction précise, intérieur haut de gamme.'),
(15, 'Porsche ', 'Porsche Panamera', 2024, '200000.00', 'PORSHE_TAYCAN.jpg', 'Type : Berline sportive 4 portes\r\n\r\nMotorisation : V6/V8 essence ou hybride, jusqu’à 700 ch (Turbo S E-Hybrid)\r\n\r\nTransmission : Propulsion ou 4 roues motrices\r\n\r\n0-100 km/h : ~3,0 à 5,0 s selon version\r\n\r\nCaractéristique : Confort de grande berline avec performances de supercar, design élégant et intérieur luxueux.'),
(16, 'Lamborghini ', 'Lamborghini Huracan', 2024, '300000.00', 'L_HURACAN.jpg', 'Type : Coupé ou Spyder sportif\r\n\r\nMotorisation : V10 atmosphérique, 610 à 640 ch\r\n\r\nTransmission : 4 roues motrices ou propulsion\r\n\r\n0-100 km/h : ~2,9 à 3,4 s\r\n\r\nCaractéristique : Supercar ultra-sportive, design agressif, expérience de conduite extrême.'),
(17, 'Lamborghini ', 'Lamborghini Aventador', 2024, '500000.00', 'L_Aventador.jpg', 'Type : Coupé ou Roadster\r\n\r\nMotorisation : V12 atmosphérique, 730 à 770 ch\r\n\r\nTransmission : 4 roues motrices\r\n\r\n0-100 km/h : ~2,8 à 3,0 s\r\n\r\nCaractéristique : Icône de Lamborghini, moteur V12 impressionnant, style spectaculaire, conduite très puissante.');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `telephone`, `email`, `message`, `date_envoi`) VALUES
(1, 'Peniela', '8362641', 'peniela46@gmail.com', 'Bonjour!', '2025-09-21 11:31:04');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `voiture` varchar(100) DEFAULT NULL,
  `statut` varchar(50) DEFAULT 'En attente',
  `date_demande` date NOT NULL DEFAULT (curdate()),
  `heure_demande` time NOT NULL DEFAULT (curtime()),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `nom`, `email`, `telephone`, `voiture`, `statut`, `date_demande`, `heure_demande`) VALUES
(3, 'Peniela', 'peniela46@gmail.com', '8362641', 'BMW M3', 'Refusé', '2025-09-21', '14:34:14');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `description`) VALUES
(3, 'Vente de voitures de luxe :', 'BMW, Porsche, Lamborghini.'),
(4, 'Demande d’essai :', ' Réservez un essai directement en ligne.'),
(5, 'Service après-vente :', 'Entretien et réparation de véhicules de luxe.'),
(6, 'Personnalisation :', 'Accessoires et customisation de votre voiture.'),
(7, 'Conseil automobile :', 'Assistance pour choisir la voiture qui vous convient.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Peniela', 'peniela46@gmail.com', '$2y$10$XwY7n5yHLojN9WoUcZfPzuiemlsllH4PZQo8y.WUYBqQYHqGW1zia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
