-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Août 2017 à 19:43
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
-- Structure de la table `valeur_carte`
--

CREATE TABLE `valeur_carte` (
  `id_val` int(11) NOT NULL,
  `chemin_carte_val` varchar(200) NOT NULL,
  `nombre_val` varchar(5) NOT NULL,
  `couleur_val` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `valeur_carte`
--

INSERT INTO `valeur_carte` (`id_val`, `chemin_carte_val`, `nombre_val`, `couleur_val`) VALUES
(1, 'images/(1).png', '1', 'carreau'),
(2, 'images/(2).png', '1', 'coeur'),
(3, 'images/(3).png', '1', 'pique'),
(4, 'images/(4).png', '1', 'trefle'),
(5, 'images/(5).png', '2', 'carreau'),
(6, 'images/(6).png', '2', 'coeur'),
(7, 'images/(7).png', '2', 'pique'),
(8, 'images/(8).png', '2', 'trefle'),
(9, 'images/(9).png', '3', 'carreau'),
(10, 'images/(10).png', '3', 'coeur'),
(11, 'images/(11).png', '3', 'pique'),
(12, 'images/(12).png', '3', 'trefle'),
(13, 'images/(13).png', '4', 'carreau'),
(14, 'images/(14).png', '4', 'coeur'),
(15, 'images/(15).png', '4', 'pique'),
(16, 'images/(16).png', '4', 'trefle'),
(17, 'images/(17).png', '5', 'carreau'),
(18, 'images/(18).png', '5', 'coeur'),
(19, 'images/(19).png', '5', 'pique'),
(20, 'images/(20).png', '5', 'trefle'),
(21, 'images/(21).png', '6', 'carreau'),
(22, 'images/(22).png', '6', 'coeur'),
(23, 'images/(23).png', '6', 'pique'),
(24, 'images/(24).png', '6', 'trefle'),
(25, 'images/(25).png', '7', 'carreau'),
(26, 'images/(26).png', '7', 'coeur'),
(27, 'images/(27).png', '7', 'pique'),
(28, 'images/(28).png', '7', 'trefle'),
(29, 'images/(29).png', '8', 'carreau'),
(30, 'images/(30).png', '8', 'coeur'),
(31, 'images/(31).png', '8', 'pique'),
(32, 'images/(32).png', '8', 'trefle'),
(33, 'images/(33).png', '9', 'carreau'),
(34, 'images/(34).png', '9', 'coeur'),
(35, 'images/(35).png', '9', 'pique'),
(36, 'images/(36).png', '9', 'trefle'),
(37, 'images/(37).png', '10', 'carreau'),
(38, 'images/(38).png', '10', 'coeur'),
(39, 'images/(39).png', '10', 'pique'),
(40, 'images/(40).png', '10', 'trefle'),
(41, 'images/(41).png', '12', 'carreau'),
(42, 'images/(42).png', '12', 'coeur'),
(43, 'images/(43).png', '12', 'pique'),
(44, 'images/(44).png', '12', 'trefle'),
(45, 'images/(45).png', '13', 'carreau'),
(46, 'images/(46).png', '13', 'coeur'),
(47, 'images/(47).png', '13', 'pique'),
(48, 'images/(48).png', '13', 'trefle'),
(49, 'images/(49).png', '11', 'carreau'),
(50, 'images/(50).png', '11', 'coeur'),
(51, 'images/(51).png', '11', 'pique'),
(52, 'images/(52).png', '11', 'trefle');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `valeur_carte`
--
ALTER TABLE `valeur_carte`
  ADD PRIMARY KEY (`id_val`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `valeur_carte`
--
ALTER TABLE `valeur_carte`
  MODIFY `id_val` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
