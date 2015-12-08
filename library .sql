-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Décembre 2015 à 22:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_nom` varchar(25) NOT NULL,
  `admin_mdp` varchar(255) DEFAULT NULL,
  `admin_id` int(25) NOT NULL,
  PRIMARY KEY (`admin_nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`admin_nom`, `admin_mdp`, `admin_id`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `auteur_id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_nom` varchar(25) DEFAULT NULL,
  `auteur_prenom` varchar(25) DEFAULT NULL,
  `auteur_naissance` date DEFAULT NULL,
  `auteur_deces` date DEFAULT NULL,
  PRIMARY KEY (`auteur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`auteur_id`, `auteur_nom`, `auteur_prenom`, `auteur_naissance`, `auteur_deces`) VALUES
(1, 'GROSBILL', 'Frank', '1978-06-24', '0000-00-00'),
(2, 'BOBY', 'Stromae', '1930-01-23', '1982-03-10'),
(3, 'PIGEON', 'Tronqu', '1991-07-07', '2015-11-17'),
(4, 'AIRBUS', 'Rebecca', '1880-09-02', '0000-00-00'),
(5, 'FAGGOT', 'Jean-Pierre', '1966-06-06', '0000-00-00'),
(6, 'FAT', 'Bob', '1978-02-03', '0000-00-00'),
(7, 'IJAIL', 'Pauline', '1990-10-04', '0000-00-00'),
(8, 'REMI', 'Kevin', '1943-11-15', '2004-12-13'),
(9, 'JACOB', 'Michel', '1955-12-25', '0000-00-00'),
(10, 'DAESH', 'Abdul', '1970-11-04', '2015-11-14'),
(11, 'GROSBILL', 'Frank', '1978-06-24', '0000-00-00'),
(12, 'BOBY', 'Stromae', '1930-01-23', '1982-03-10'),
(13, 'PIGEON', 'Tronqu', '1991-07-07', '2015-11-17'),
(14, 'AIRBUS', 'Rebecca', '1880-09-02', '0000-00-00'),
(15, 'FAGGOT', 'Jean-Pierre', '1966-06-06', '0000-00-00'),
(16, 'FAT', 'Bob', '1978-02-03', '0000-00-00'),
(17, 'IJAIL', 'Pauline', '1990-10-04', '0000-00-00'),
(18, 'REMI', 'Kevin', '1943-11-15', '2004-12-13'),
(19, 'JACOB', 'Michel', '1955-12-25', '0000-00-00'),
(20, 'DUGAL', 'Abdul', '1970-11-04', '2015-11-14'),
(21, 'GROSBILL', 'Frank', '1978-06-24', '0000-00-00'),
(22, 'BOBY', 'Stromae', '1930-01-23', '1982-03-10'),
(23, 'PIGEON', 'Tronqu', '1991-07-07', '2015-11-17'),
(24, 'AIRBUS', 'Rebecca', '1880-09-02', '0000-00-00'),
(25, 'FAGGOT', 'Jean-Pierre', '1966-06-06', '0000-00-00'),
(26, 'FAT', 'Bob', '1978-02-03', '0000-00-00'),
(27, 'IJAIL', 'Pauline', '1990-10-04', '0000-00-00'),
(28, 'REMI', 'Kevin', '1943-11-15', '2004-12-13'),
(29, 'JACOB', 'Michel', '1955-12-25', '0000-00-00'),
(30, 'DUGAL', 'Abdul', '1970-11-04', '2015-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
  `collections_id` int(11) NOT NULL AUTO_INCREMENT,
  `collections_nom` varchar(25) DEFAULT NULL,
  `editeur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`collections_id`),
  KEY `FK_collections_editeur_id` (`editeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE IF NOT EXISTS `editeur` (
  `editeur_id` int(11) NOT NULL AUTO_INCREMENT,
  `editeur_nom` varchar(25) DEFAULT NULL,
  `editeur_coordonnees` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`editeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `emprunt_id` int(11) NOT NULL AUTO_INCREMENT,
  `emprunt_date` datetime DEFAULT NULL,
  `emprunt_retour` datetime DEFAULT NULL,
  `livre_exemplaire` decimal(10,0) NOT NULL,
  `utilisateur_numdecompte` decimal(10,0) NOT NULL,
  `utilisateur_numdecompte_1` int(11) DEFAULT NULL,
  PRIMARY KEY (`emprunt_id`),
  KEY `FK_emprunt_utilisateur_numdecompte_1` (`utilisateur_numdecompte_1`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`emprunt_id`, `emprunt_date`, `emprunt_retour`, `livre_exemplaire`, `utilisateur_numdecompte`, `utilisateur_numdecompte_1`) VALUES
(10, '2015-12-01 15:10:27', '2015-12-08 15:10:27', '123', '7', NULL),
(11, '2015-12-01 15:26:26', '2015-12-12 15:26:26', '789874956', '2', NULL),
(12, '2015-12-01 15:33:16', '2015-12-12 15:33:16', '789874956', '2', NULL),
(13, '2015-12-01 15:37:17', '2015-12-08 15:37:17', '123', '2', NULL),
(14, '2015-12-02 14:40:34', '2015-12-09 14:40:34', '1', '3', NULL),
(15, '2015-12-02 22:29:08', '2015-12-09 22:29:08', '1', '7', NULL),
(16, '2015-12-02 22:31:17', '2015-12-09 22:31:17', '1', '1', NULL),
(17, '2015-12-03 08:59:56', '2015-12-10 08:59:56', '1', '7', NULL),
(18, '2015-12-08 17:02:01', '2015-12-15 17:02:01', '2', '2', NULL),
(19, '2015-12-08 17:12:51', '2015-12-15 17:12:51', '1', '2', NULL),
(20, '2015-12-08 17:13:00', '2015-12-15 17:13:00', '1', '2', NULL),
(21, '2015-12-08 17:13:28', '2015-12-15 17:13:28', '1', '2', NULL),
(22, '2015-12-08 17:13:34', '2015-12-15 17:13:34', '1', '2', NULL),
(23, '2015-12-08 17:14:02', '2015-12-15 17:14:02', '123', '3', NULL),
(24, '2015-12-08 17:14:06', '2015-12-15 17:14:06', '123', '3', NULL),
(25, '2015-12-08 17:18:00', '2015-12-15 17:18:00', '3', '123', NULL),
(26, '2015-12-08 17:18:11', '2015-12-15 17:18:11', '3', '123', NULL),
(27, '2015-12-08 17:24:45', '2015-12-15 17:24:45', '3', '123', NULL),
(28, '2015-12-08 17:26:15', '2015-12-15 17:26:15', '3', '123', NULL),
(29, '2015-12-08 17:27:05', '2015-12-15 17:27:05', '3', '123', NULL),
(30, '2015-12-08 17:27:24', '2015-12-15 17:27:24', '3', '123', NULL),
(31, '2015-12-08 17:28:15', '2015-12-15 17:28:15', '4', '47895', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `fournisseur_id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur_nom` varchar(25) DEFAULT NULL,
  `fournisseur_coordonee` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`fournisseur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `livre_exemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `livre_auteur` varchar(255) DEFAULT NULL,
  `livre_titre` varchar(25) DEFAULT NULL,
  `livre_editeur` varchar(25) DEFAULT NULL,
  `livre_collection` varchar(25) DEFAULT NULL,
  `livre_ISBN` varchar(25) DEFAULT NULL,
  `livre_etat` varchar(25) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `emprunt_id` int(11) DEFAULT NULL,
  `collections_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`livre_exemplaire`),
  KEY `FK_livre_emprunt_id` (`emprunt_id`),
  KEY `FK_livre_collections_id` (`collections_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`livre_exemplaire`, `livre_auteur`, `livre_titre`, `livre_editeur`, `livre_collection`, `livre_ISBN`, `livre_etat`, `fournisseur_id`, `emprunt_id`, `collections_id`) VALUES
(2, 'BOBY', 'Frappe-toi', 'Grosjean', 'Idem', '3-266-11156', '', 0, NULL, NULL),
(3, 'PIGEON', 'Ombre de glace', 'Flamarion', 'Jules', '4-266-11156', '', 0, NULL, NULL),
(4, 'AIRBUS', 'Prophéties modernes', 'Soleil', 'Vent', '5-266-11156', '', 0, NULL, NULL),
(5, 'FAGGOT', 'Le secret des illuminatis', 'Dartrand', 'Devin', '6-266-11156', '', 0, NULL, NULL),
(6, 'FAT', 'Les crocodiles', 'Uflont', 'Jules', '7-266-11156', '', 0, NULL, NULL),
(7, 'AndrÃ©a', 'a', 'a', 'a', '8-266-11156', '', 0, NULL, NULL),
(8, 'REMI', 'Ruined', 'Popy', 'Fleuve jaune', '9-266-11156', '', 0, NULL, NULL),
(9, 'JACOB', 'Larmes de sel', 'Popy', 'Fleuve jaune', '10-266-11156', '', 0, NULL, NULL),
(10, 'DUGAL', 'Le retour du pape', 'Frank', 'Michel', '11-266-11156', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_numdecompte` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_nom` varchar(25) DEFAULT NULL,
  `utilisateur_prenom` varchar(25) DEFAULT NULL,
  `utilisateur_adresse` varchar(255) DEFAULT NULL,
  `utilisateur_numero` varchar(25) DEFAULT NULL,
  `utilisateur_mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`utilisateur_numdecompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_numdecompte`, `utilisateur_nom`, `utilisateur_prenom`, `utilisateur_adresse`, `utilisateur_numero`, `utilisateur_mdp`) VALUES
(1, 'a', 'a', 'a', '1', 'd6b8e48afb2534b213e391cab43016505747a234'),
(2, 'q', 'a', 'b', 'c', 'd');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `FK_collections_editeur_id` FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`editeur_id`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_emprunt_utilisateur_numdecompte_1` FOREIGN KEY (`utilisateur_numdecompte_1`) REFERENCES `utilisateur` (`utilisateur_numdecompte`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_livre_collections_id` FOREIGN KEY (`collections_id`) REFERENCES `collections` (`collections_id`),
  ADD CONSTRAINT `FK_livre_emprunt_id` FOREIGN KEY (`emprunt_id`) REFERENCES `emprunt` (`emprunt_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
