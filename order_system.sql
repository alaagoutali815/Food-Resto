-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 déc. 2019 à 19:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `order_system`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(8) NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `pwd` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `Phone` int(11) NOT NULL,
  `Addresse` mediumtext COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(8) NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `ordres`
--

DROP TABLE IF EXISTS `ordres`;
CREATE TABLE IF NOT EXISTS `ordres` (
  `oid` int(8) NOT NULL,
  `pid` int(8) NOT NULL,
  `cid` int(8) NOT NULL,
  `Quantity` int(25) NOT NULL,
  `Odate` datetime NOT NULL,
  `Quantity_pbc` int(11) NOT NULL,
  `Delivery_Status` int(1) NOT NULL,
  `Vehicle` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `pid` (`pid`),
  KEY `pid_2` (`pid`),
  KEY `cid` (`cid`),
  KEY `Vehicle` (`Vehicle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(8) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `Descr` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `Price` double NOT NULL,
  `File` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `stock_qte` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`pid`, `Name`, `Descr`, `Price`, `File`, `stock_qte`) VALUES
(651, 'Pizza Fruit Mère', 'Pizza', 12, 'https://via.placeholder.com/100.png?text=Pizza+Fruit+Mère', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vid` int(8) NOT NULL,
  `Status` int(11) NOT NULL,
  `Vehicle-Number` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ordres`
--
ALTER TABLE `ordres`
  ADD CONSTRAINT `ord-cid_fkey` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-pid-fkey` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-vehicle-fkey` FOREIGN KEY (`Vehicle`) REFERENCES `vehicle` (`vid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
