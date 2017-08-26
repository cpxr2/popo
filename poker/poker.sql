-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Août 2017 à 05:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `poker`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu_carte`
--

CREATE TABLE `jeu_carte` (
  `id` int(11) NOT NULL,
  `carte` varchar(255) NOT NULL,
  `tirer` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `jeu_carte`
--

INSERT INTO `jeu_carte` (`id`, `carte`, `tirer`) VALUES
(2, 'images/(1).png', 0),
(3, 'images/(2).png', 0),
(4, 'images/(3).png', 0),
(5, 'images/(4).png', 0),
(6, 'images/(5).png', 0),
(7, 'images/(6).png', 0),
(8, 'images/(7).png', 0),
(9, 'images/(8).png', 0),
(10, 'images/(9).png', 0),
(11, 'images/(10).png', 0),
(12, 'images/(11).png', 0),
(13, 'images/(12).png', 0),
(14, 'images/(13).png', 0),
(15, 'images/(14).png', 0),
(16, 'images/(15).png', 0),
(17, 'images/(16).png', 0),
(18, 'images/(17).png', 0),
(19, 'images/(18).png', 0),
(20, 'images/(19).png', 0),
(21, 'images/(20).png', 0),
(22, 'images/(21).png', 0),
(23, 'images/(22).png', 0),
(24, 'images/(23).png', 0),
(25, 'images/(24).png', 0),
(26, 'images/(25).png', 0),
(27, 'images/(26).png', 0),
(28, 'images/(27).png', 0),
(29, 'images/(28).png', 0),
(30, 'images/(29).png', 0),
(31, 'images/(30).png', 0),
(32, 'images/(31).png', 0),
(33, 'images/(32).png', 0),
(34, 'images/(33).png', 0),
(35, 'images/(34).png', 0),
(36, 'images/(35).png', 0),
(37, 'images/(36).png', 0),
(38, 'images/(37).png', 0),
(39, 'images/(38).png', 0),
(40, 'images/(39).png', 0),
(41, 'images/(40).png', 0),
(42, 'images/(41).png', 0),
(43, 'images/(42).png', 0),
(44, 'images/(43).png', 0),
(45, 'images/(44).png', 0),
(46, 'images/(45).png', 0),
(47, 'images/(46).png', 0),
(48, 'images/(47).png', 0),
(49, 'images/(48).png', 0),
(50, 'images/(49).png', 0),
(51, 'images/(50).png', 0),
(52, 'images/(51).png', 0),
(53, 'images/(52).png', 0),
(54, 'images/(53).png', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jeu_carte`
--
ALTER TABLE `jeu_carte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jeu_carte`
--
ALTER TABLE `jeu_carte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
