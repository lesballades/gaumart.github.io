-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 jan. 2018 à 10:38
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
-- Base de données :  `gaumart`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `societe` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `societe`, `tel`, `email`, `msg`, `date`) VALUES
(1, 'gniark', 'gniark', '0102030405', 'gniark@truc.com', 'dfqqfdezq', '2017-12-29'),
(2, 'moi', 'moi', '0123456789', 'moi@myself.fr', 'youpiii', '2017-12-29'),
(6, 'truc', 'muche', '8978', 'truc@toto.fr', 'blabla', '2018-01-01'),
(7, 'truc', 'muche', '8978', 'truc@toto.fr', 'blabla', '2018-01-01'),
(8, 'truc', 'muche', '8978', 'truc@toto.fr', 'blabla', '2018-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `log` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`pwd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`log`, `pwd`) VALUES
('admin', 'root');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
