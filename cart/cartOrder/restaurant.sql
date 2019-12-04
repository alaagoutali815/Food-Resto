-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 déc. 2019 à 20:41
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
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(8) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`cid`, `Name`, `Email`, `pwd`, `Phone`, `Address`) VALUES
(1, 'islem labidi', 'islem@gmail.com', '1234', 1111111, 'bizerte');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(8) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `Email` (`Email`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ordres`
--

DROP TABLE IF EXISTS `ordres`;
CREATE TABLE IF NOT EXISTS `ordres` (
  `oid` int(8) NOT NULL AUTO_INCREMENT,
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
  KEY `Vehicle` (`Vehicle`),
  KEY `oid` (`oid`),
  KEY `pid_3` (`pid`),
  KEY `cid_2` (`cid`),
  KEY `Vehicle_2` (`Vehicle`),
  KEY `pid_4` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordres`
--

INSERT INTO `ordres` (`oid`, `pid`, `cid`, `Quantity`, `Odate`, `Quantity_pbc`, `Delivery_Status`, `Vehicle`) VALUES
(1, 1, 1, 1, '2019-12-04 19:56:10', 1, 0, 1),
(2, 2, 1, 3, '2019-12-04 19:56:26', 3, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(8) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Desription` text NOT NULL,
  `Price` double NOT NULL,
  `File` text NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`pid`, `Name`, `Desription`, `Price`, `File`) VALUES
(1, 'Pizza', 'Pizza', 10, 'images/pizza.png'),
(2, 'soda', 'soda', 2, 'images/soda.png');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vid` int(8) NOT NULL,
  `Status` int(11) NOT NULL,
  `Vehicle-Number` varchar(30) NOT NULL,
  PRIMARY KEY (`vid`),
  KEY `vid` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `Status`, `Vehicle-Number`) VALUES
(1, 1, 'v1'),
(2, 1, 'v2');

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
