-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : Dim 25 juin 2023 à 21:35
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tache`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `idtache` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(300) NOT NULL,
  `commentaire` varchar(900) DEFAULT NULL,
  `date` date NOT NULL,
  `etat` varchar(30) DEFAULT 'En attente',
  `idu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtache`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`idtache`, `nature`, `commentaire`, `date`, `etat`, `idu`) VALUES
(121, 'Faible', 'efef', '2023-06-25', 'Time out', 15);

-- --------------------------------------------------------

--
-- Structure de la table `utile`
--

DROP TABLE IF EXISTS `utile`;
CREATE TABLE IF NOT EXISTS `utile` (
  `idut` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(300) NOT NULL,
  PRIMARY KEY (`idut`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utile`
--

INSERT INTO `utile` (`idut`, `nature`) VALUES
(5, 'Faible'),
(6, 'Normale'),
(7, 'Haute');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idu`, `email`, `mdp`) VALUES
(15, 'yanis.boudjelal@edu.ece.fr', '123'),
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
