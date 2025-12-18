-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 déc. 2025 à 12:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `travel`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `name`, `city`, `duration`, `price`, `description`) VALUES
(20, 'Tour Eiffel Sommet', 'Paris', '3 heures', 30.00, 'Vue imprenable sur tout Paris depuis le sommet.'),
(21, 'Jardin Majorelle', 'Marrakech', '2 heures', 12.00, 'Promenade dans le célèbre jardin botanique.'),
(22, 'Colisée & Forum Romain', 'Rome', '3 heures', 25.00, 'Plongez dans l\'histoire de la Rome antique.'),
(23, 'Tramway 28', 'Lisbonne', '1 heure', 5.00, 'Découverte des quartiers historiques en tram emblématique.'),
(24, 'Citadelle Laferrière', 'Haiti', '4 heures', 35.00, 'Visite de la plus grande forteresse des Caraïbes classée UNESCO.'),
(25, 'Burj Khalifa', 'Dubai', '2 heures', 45.00, 'Accès à la plus haute tour du monde.');

-- --------------------------------------------------------

--
-- Structure de la table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) UNSIGNED NOT NULL,
  `flight_number` varchar(10) NOT NULL,
  `departure_city` varchar(100) NOT NULL,
  `arrival_city` varchar(100) NOT NULL,
  `departure_time` datetime DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `flights`
--

INSERT INTO `flights` (`id`, `flight_number`, `departure_city`, `arrival_city`, `departure_time`, `arrival_time`, `price`) VALUES
(1, 'AF123', 'Paris', 'Rome', '2025-12-20 08:00:00', '2025-12-20 10:00:00', 120.00),
(2, 'RY450', 'Paris', 'Rome', '2025-12-21 09:30:00', '2025-12-21 11:30:00', 90.00),
(3, 'TAP900', 'Paris', 'Lisbonne', '2025-12-22 07:15:00', '2025-12-22 09:45:00', 140.00),
(4, 'EZ100', 'Marseille', 'Rome', '2025-12-23 06:00:00', '2025-12-23 08:00:00', 110.00),
(5, 'AF200', 'Paris', 'Madrid', '2025-12-24 07:30:00', '2025-12-24 09:30:00', 110.00),
(6, 'AF201', 'Paris', 'Berlin', '2025-12-25 10:00:00', '2025-12-25 12:00:00', 130.00),
(7, 'AF202', 'Paris', 'London', '2025-12-26 08:00:00', '2025-12-26 09:00:00', 95.00),
(8, 'EZ200', 'Marseille', 'Barcelona', '2025-12-24 06:45:00', '2025-12-24 08:15:00', 85.00),
(9, 'EZ201', 'Marseille', 'Milan', '2025-12-25 14:30:00', '2025-12-25 16:00:00', 90.00),
(10, 'AZ300', 'Rome', 'Paris', '2025-12-26 11:00:00', '2025-12-26 13:00:00', 125.00),
(11, 'AZ301', 'Rome', 'Athens', '2025-12-27 09:00:00', '2025-12-27 11:30:00', 140.00),
(12, 'EK400', 'Paris', 'Dubai', '2025-12-28 21:00:00', '2025-12-29 06:00:00', 480.00),
(13, 'TK401', 'Paris', 'Istanbul', '2025-12-29 15:00:00', '2025-12-29 19:30:00', 260.00),
(14, 'AT402', 'Paris', 'Casablanca', '2025-12-30 17:00:00', '2025-12-30 19:00:00', 210.00),
(16, 'AT403', 'Casablanca', 'paris', '2026-01-06 17:00:00', '2026-01-06 19:00:00', 150.00);

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `stars` tinyint(1) DEFAULT NULL CHECK (`stars` between 1 and 5),
  `price_per_night` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city`, `stars`, `price_per_night`, `description`) VALUES
(1, 'Hotel Colosseo', 'Rome', 4, 85.00, 'À deux pas du Colisée'),
(2, 'Rome Center Inn', 'Rome', 3, 65.00, 'Bon rapport qualité-prix'),
(3, 'Lisboa View', 'Lisbonne', 4, 75.00, 'Vue magnifique sur le Tage'),
(4, 'Sofitel Casablanca Tour Blanche', 'Casablanca', 5, 180.00, NULL),
(5, 'Hotel Ritz Paris', 'Paris', 5, 800.00, NULL),
(6, 'Hotel El Aurassi', 'Alger', 5, 150.00, NULL),
(7, 'La Mamounia', 'Marrakech', 5, 500.00, NULL),
(8, 'ibis Casablanca City Center', 'Casablanca', 3, 60.00, NULL),
(9, 'Novotel Paris Les Halles', 'Paris', 4, 200.00, NULL),
(10, 'Marriott Port-au-Prince Hotel', 'Haiti', 5, 140.00, NULL),
(11, 'Sofitel Casablanca Tour Blanche', 'Casablanca', 5, 180.00, NULL),
(12, 'Hotel Ritz Paris', 'Paris', 5, 800.00, NULL),
(13, 'Hotel El Aurassi', 'Alger', 5, 150.00, NULL),
(14, 'La Mamounia', 'Marrakech', 5, 500.00, NULL),
(15, 'ibis Casablanca City Center', 'Casablanca', 3, 60.00, NULL),
(16, 'Novotel Paris Les Halles', 'Paris', 4, 200.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `item_type` enum('flight','hotel','activity') NOT NULL,
  `item_id` int(11) UNSIGNED NOT NULL,
  `date_reserved` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `item_type`, `item_id`, `date_reserved`, `created_at`) VALUES
(1, 1, 'flight', 2, '2025-12-15', '2025-12-15 14:41:53'),
(2, 1, 'hotel', 2, '2025-12-17', '2025-12-17 11:28:24'),
(3, 1, 'activity', 24, '2025-12-17', '2025-12-17 15:47:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'belghalimomo915@gmail.com', 'Belrhali@2002', '2025-11-16 13:51:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flight_number` (`flight_number`);

--
-- Index pour la table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
