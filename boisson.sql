-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 nov. 2018 à 16:58
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boisson`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` tinyint(1) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codepostal` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `numtel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`login`, `mdp`, `nom`, `prenom`, `sexe`, `mail`, `datenaissance`, `adresse`, `codepostal`, `ville`, `numtel`) VALUES
('bigbossdu55', 'bigbossdu55', 'Big', 'Boss', 1, 'bigbossdu55@gmail.com', '1995-10-05', '3 rue du big boss', '55000', 'Bar-le-duc', '123456789'),
('ldvhqdfjvqfdv', 'udvquhsbdvq', 'qsudhvqsdvhb', 'qusdvqlhsdvb', 0, 'lqshdbvqlhdsbvqlsdhvqdv@gmail.fr', '2018-11-15', 'sidvbqvbqdljcbqldhvb sdivuqsdiv qiuqsdkv f', '10256', 'iqhbsdvqsv', '0254698753');

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `login` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`login`, `id`) VALUES
('bigbossdu55', 25);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`login`) REFERENCES `client` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
