-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 juin 2022 à 12:25
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menagment`
--

-- --------------------------------------------------------

--
-- Structure de la table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `type` varchar(22) NOT NULL,
  `prix` int(11) NOT NULL,
  `choix` varchar(22) NOT NULL,
  `lieu` varchar(22) NOT NULL,
  `image` varchar(221) NOT NULL,
  `numer_cl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pm_clients`
--

CREATE TABLE `pm_clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `description` varchar(512) DEFAULT '',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pm_users`
--

CREATE TABLE `pm_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `role` enum('admin','manager','employee') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pm_users`
--

INSERT INTO `pm_users` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'deidine@gmail.com', '202cb962ac59075b964b07152d234b70', 'web', 'damn', 'admin'),
(2, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'steve', 'smith', 'manager'),
(3, 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 'john', 'William', 'employee');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numer_cl` (`numer_cl`);

--
-- Index pour la table `pm_clients`
--
ALTER TABLE `pm_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pm_users`
--
ALTER TABLE `pm_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pm_clients`
--
ALTER TABLE `pm_clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pm_users`
--
ALTER TABLE `pm_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
