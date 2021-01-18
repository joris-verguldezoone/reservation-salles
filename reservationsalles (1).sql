-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 jan. 2021 à 11:09
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(37, 'Jeej', 'il etait une fois ', '2021-01-27 08:00:00', '2021-01-27 09:00:00', 25),
(38, 'Jojo\'s', 'Je n\'ai aucune idée de ce que l\'on va bien pouvoir faire cependant il me semblait important de partager avec vous une description de l\'ennuie que nous allons vivre ', '2021-02-04 16:00:00', '2021-02-04 17:00:00', 26),
(36, 'verguldezoonejoris', 'jhgjhgjhgjhg', '2021-01-22 08:00:00', '2021-01-22 09:00:00', 24),
(35, 'Coucou les amis ', 'Il etait une fois une carotte radioactive blablabla 15 morts a fukushima pcq y mange des carottes radioactive bref qui est cho pique nique a fukushima', '2021-01-26 15:00:00', '2021-01-26 16:00:00', 24),
(34, 'ahahaha', 'ahahahahh', '2021-01-19 08:00:00', '2021-01-19 09:00:00', 24);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(23, 'TRUMP', '$2y$10$Fmx0CTxQL1Dmdr8x0VrGM.pxdY6MW3v75cRc2OOoVHMkUon.AlPtm'),
(24, 'Joris', '$2y$10$.L7y0Ia5HV9SrykbkjXCl.J/JVJAb1dIlzZCEQ9LOHpQt6BBurgYe'),
(26, 'HARDJOJO', '$2y$10$tZVdoENWEHDt0WnHzbWSRuHqoz8/i1Rb5YM5sWlJsVLL25K5MxD5q'),
(25, 'JeanemarreJeanemarre', '$2y$10$Tvh42CbTdE6SFx5dCn8wa.0TRscYCUVelEw.3Aplrdj9gix2lrLx6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
