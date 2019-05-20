-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 jan. 2018 à 11:30
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_net`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(64) NOT NULL,
  `raisonSocial` varchar(64) NOT NULL,
  `adresseClient` text NOT NULL,
  `VilleClient` varchar(64) NOT NULL,
  `pays` varchar(64) NOT NULL,
  `telephone` varchar(64) NOT NULL,
  PRIMARY KEY (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `nomClient`, `raisonSocial`, `adresseClient`, `VilleClient`, `pays`, `telephone`) VALUES
(1, 'zniber', '?', 'secteur 20 bloc i n 3 hay riad ', 'rabat', 'maroc', '0644587879'),
(2, 'bakry', 'rr', 'secteur 14  bloc d im hay lmaarif ', 'casa', 'maroc', '096787544'),
(3, 'Mounir', 'kdsd', 'secteur 20 bloc i n4 rue al akhylia ', 'rabat', 'maroc', '06645865'),
(4, 'Mouline', 'dlfklk', 'secteur 24 bloc 7 n 7 agdal ', 'rabat', 'maroc', '068886565'),
(5, 'omar elouahdani', 'hhh', 'B.P:112 MACHRAA BELKSIRI', 'B.P:112 MACHRAA BELKSIRI', 'maroc', '0677636632'),
(6, 'anas ibrahimi', 'tht', 'hay zamori secteur 2', 'tanger', 'maroc', '0677636639');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `numCommande` int(11) NOT NULL AUTO_INCREMENT,
  `numClient` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`numCommande`),
  KEY `numClient` (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numCommande`, `numClient`, `dateCommande`) VALUES
(1, 1, '2016-01-07'),
(2, 4, '2016-01-01'),
(3, 2, '2016-01-08'),
(4, 3, '2016-01-09'),
(5, 1, '2017-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommande`
--

DROP TABLE IF EXISTS `detailscommande`;
CREATE TABLE IF NOT EXISTS `detailscommande` (
  `numCommande` int(11) NOT NULL,
  `refProduit` int(11) NOT NULL,
  `qteCommandee` int(11) NOT NULL,
  PRIMARY KEY (`numCommande`,`refProduit`),
  KEY `refProduit` (`refProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailscommande`
--

INSERT INTO `detailscommande` (`numCommande`, `refProduit`, `qteCommandee`) VALUES
(1, 2, 2),
(2, 2, 2),
(3, 3, 1),
(4, 5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `refProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(64) NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `qteStockee` int(11) NOT NULL,
  `indisponible` enum('0','1') NOT NULL,
  PRIMARY KEY (`refProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`refProduit`, `nomProduit`, `prixUnitaire`, `qteStockee`, `indisponible`) VALUES
(1, 'tapis', 1500, 1000, '0'),
(2, 'nappe', 100, 1000, '0'),
(3, 'couette', 400, 600, '0'),
(4, 'housse', 400, 700, '0'),
(5, 'oreiller', 300, 10000, '0'),
(6, 'kanette', 300, 200, '0');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD CONSTRAINT `detailscommande_ibfk_1` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailscommande_ibfk_2` FOREIGN KEY (`refProduit`) REFERENCES `produit` (`refProduit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
