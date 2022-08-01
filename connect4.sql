-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 31 juil. 2022 à 14:03
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `connect4`
--

-- --------------------------------------------------------

--
-- Structure de la table `game2`
--

DROP TABLE IF EXISTS `game2`;
CREATE TABLE IF NOT EXISTS `game2` (
  `id_game` int(11) NOT NULL AUTO_INCREMENT,
  `id_player1` int(11) NOT NULL,
  `nb_moves_p1` int(11) DEFAULT NULL,
  `nb_moves_p2` int(11) DEFAULT NULL,
  `id_winner` int(11) NOT NULL,
  PRIMARY KEY (`id_game`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `game2`
--

INSERT INTO `game2` (`id_game`, `id_player1`, `nb_moves_p1`, `nb_moves_p2`, `id_winner`) VALUES
(1, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'lily', '$2y$10$MLWqY22tqmVjyjwAVIFr1ufefsOVtM47eTNHPWATdMqwYCAk9M/i.'),
(6, 'lolo', '$2y$10$uw0yx0PXqfba/DIcI6ivzucfmyWznkebgfs057EFfUS8PAlZNWMkq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
