-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 17 août 2022 à 09:01
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

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
-- Structure de la table `creators`
--

CREATE TABLE `creators` (
  `id_creator` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `win_games` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `creators`
--

INSERT INTO `creators` (`id_creator`, `login`, `password`, `win_games`) VALUES
(10, 'lily', '$2y$10$XhzqvPbXO/8bGw36BPJ94.y6wAvOh0SOYDDxFUvuA5TJns43mjnB2', 2),
(11, 'seb', '$2y$10$I.HjapXr0Gghe4wQRxy4hu21/Aa68155Ca5UywcoKNnWGgmrnDlYC', 1);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
  `id_player1` int(11) NOT NULL,
  `login_player1` varchar(255) NOT NULL,
  `game_name` text NOT NULL,
  `moves_player1` int(11) NOT NULL,
  `moves_player2` int(11) NOT NULL,
  `winner` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id_game`, `id_player1`, `login_player1`, `game_name`, `moves_player1`, `moves_player2`, `winner`) VALUES
(1, 10, 'lily', 'The game', 4, 3, 'lily'),
(2, 10, 'lily', 'Pumpitup', 4, 4, 'Joueur 2'),
(3, 10, 'lily', 'poupou', 4, 3, 'lily'),
(4, 10, 'lily', 'Youpi', 5, 5, 'Joueur 2'),
(5, 11, 'seb', 'Wonder', 4, 3, 'seb');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`id_creator`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creators`
--
ALTER TABLE `creators`
  MODIFY `id_creator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
