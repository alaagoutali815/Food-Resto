-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 déc. 2019 à 20:38
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordres`
--

INSERT INTO `ordres` (`oid`, `pid`, `cid`, `Quantity`, `Odate`, `Quantity_pbc`, `Delivery_Status`, `Vehicle`) VALUES
(1, 66, 1, 1, '2019-12-04 19:56:10', 0, 2, 498),
(2, 89, 1, 3, '2019-12-04 19:56:26', 0, 3, 1),
(3, 89, 1, 1, '2019-12-07 15:15:42', 0, 1, 1);

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
  `stock_qte` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`pid`, `Name`, `Desription`, `Price`, `File`, `stock_qte`) VALUES
(1, 'Pizza', 'Why choose one when you can choose three? Select three appetizers and enjoy! Served with dipping sauces.	', 30, 'img/pizza.jpg', 12),
(10, 'Pizza', 'Why choose one when you can choose three? Select three appetizers and enjoy! Served with dipping sauces.', 30, 'img/pizza.jpg', NULL),
(12, 'Loaded BonelessWings', 'Smothered in white queso, shredded cheese, bacon, green onions. Served with house-made ranch.\r\n', 25, 'img/img2.png', NULL),
(13, 'Nachos with Chicken', '\r\nChicken, 3-cheese blend, black beans, jalapeños, Skillet Queso. Served with pico & sour cream.\r\n\r\n', 15, 'img/img3.png', NULL),
(14, 'Meal for 2', 'Double up on flavor and feed two people with this special! Choose a starter, two full sized entrees and a dessert. Dinner for 2 for only $25\r\n', 75, 'img/img4.png', NULL),
(15, 'Ancho Salmon', 'Seared chile-rubbed Atlantic salmon, spicy citrus-chile sauce, cilantro, queso fresco. Served with Mexican rice & steamed broccoli.\r\n', 25, 'img/img5.png', NULL),
(16, 'MargaritaGrilled', 'Pico, tortilla strips, Mexican rice, black beans. It only tastes like a guilty pleasure.\r\n', 35, 'img/img6.png', NULL),
(17, 'Mango-Chile Chicken', 'Chile spices, mango glaze & topped with chopped mango, cilantro, pico, avocado. Served with Mexican rice, steamed broccoli.\r\n', 20, 'img/img7.png', NULL),
(18, 'Grilled Chicken ', 'Tomatoes, corn & black bean salsa, shredded cheese with honey-lime vinaigrette.\r\n', 40, 'img/img8.png', NULL),
(19, 'BEVERAGES', 'Enjoy our house-made lemonades, teas & soft drinks.', 5, 'img/drink.png', NULL),
(22, 'Black Bean ', '<p>Black bean patty, roasted asparagus, sauteed mushrooms, corn &amp; black bean salsa, queso fresco, avocado &amp; a drizzle of spicy Santa Fe sauce.</p>\r\n', 30, 'img/img1.png', 2),
(66, 'Pizza 2 saisons', '<p><em>brferfber</em></p>\r\n', 15, 'img/drink.PNG', 0),
(89, 'soda coka', '<p>soda</p>\r\n', 2, 'https://via.placeholder.com/100.png?text=Pizza+Fruit+Mère', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `vid` int(8) NOT NULL,
  `Status` int(11) NOT NULL,
  `vehiculeMarque` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`vid`),
  KEY `vid` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`vid`, `Status`, `vehiculeMarque`) VALUES
(1, 1, 'Pegout 206'),
(85, 1, 'BMW Série 7'),
(498, 1, 'Nissan Qashkai'),
(6698498, 1, 'Audi A3 ');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ordres`
--
ALTER TABLE `ordres`
  ADD CONSTRAINT `ord-cid_fkey` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-pid-fkey` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ord-vehicle-fkey` FOREIGN KEY (`Vehicle`) REFERENCES `vehicules` (`vid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
