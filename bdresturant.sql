-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 07 déc. 2019 à 03:50
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdresturant`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(8) NOT NULL,
  `cid` int(8) NOT NULL,
  `pid` int(8) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `eid` int(8) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` int(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `oid` int(8) NOT NULL,
  `pid` int(8) NOT NULL,
  `cid` int(8) NOT NULL,
  `quantity` int(25) NOT NULL,
  `createdAt` datetime NOT NULL,
  `quantityC` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Vehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `pid` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `prix` double NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `cid` int(8) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `addresse` text NOT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`cid`, `userName`, `email`, `password`, `phone`, `addresse`, `createdAt`) VALUES
(87654325, 'tetsone', 'test@test.test', '$2y$10$Dl4KBxNaXN48CSGYUhUl/eZ', 12345678, 'test@test.test', '2019-12-06 22:59:34'),
(87654326, 'azertyy', 'raami.rh@gmail.com', '$2y$10$cuMhCU0RdRL0ibcM4KxnZ.R', 12345678, 'raami.rh@gmail.com', '2019-12-06 23:01:22');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `vid` int(8) NOT NULL,
  `status` int(11) NOT NULL,
  `vnumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crt-customer-fkey` (`cid`),
  ADD KEY `crt-pid_fkey` (`pid`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `ord-cid_fkey` (`cid`),
  ADD KEY `ord-pid-fkey` (`pid`),
  ADD KEY `ord-vehicle-fkey` (`Vehicle`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`pid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `pid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `cid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87654327;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vid` int(8) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `crt-customer-fkey` FOREIGN KEY (`cid`) REFERENCES `users` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crt-pid_fkey` FOREIGN KEY (`pid`) REFERENCES `produit` (`pid`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ord-cid_fkey` FOREIGN KEY (`cid`) REFERENCES `users` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-pid-fkey` FOREIGN KEY (`pid`) REFERENCES `produit` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-vehicle-fkey` FOREIGN KEY (`Vehicle`) REFERENCES `vehicle` (`vid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
