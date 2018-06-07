-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 30 Juin 2014 à 22:28
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `site02`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `lib_cat` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `lib_cat`) VALUES
(1, 'Mobile'),
(2, 'Computers'),
(3, 'Materiel Informatique'),
(4, 'Electromenager'),
(5, 'Offre Speciale');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idcompte` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_user` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcompte`),
  KEY `user_id_user` (`user_id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `user_id_user`, `username`, `password`, `role`) VALUES
(1, 1, 'imad.belarabi@gmail.com', 'BelarabiImad32', 3),
(2, 2, 'simo.meknes@gmail.com', 'MarghichiMohammed55', 1),
(3, 3, 'hamza.sabic@gmail.com', 'SabicHamza98', 1);

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE IF NOT EXISTS `enchere` (
  `id_ench` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_bin NOT NULL,
  `max_mise` int(10) NOT NULL,
  `mise_inc` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `ref_prdt` int(11) NOT NULL,
  `etat` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_ench`),
  KEY `fk_prdt_enchere` (`ref_prdt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `enchere`
--

INSERT INTO `enchere` (`id_ench`, `libelle`, `max_mise`, `mise_inc`, `date_debut`, `date_fin`, `ref_prdt`, `etat`) VALUES
(1, 'Iphone5S ', 10, 6, '2014-06-16 00:00:00', '2014-06-30 00:00:00', 1, 'en coure'),
(2, 'Samsung camera 2', 10, 0, '2014-06-17 00:00:00', '2014-06-18 00:00:00', 3, 'end'),
(3, 'Sony Bravia', 40, 0, '2014-06-22 21:00:00', '2014-06-22 21:12:00', 5, 'end'),
(4, 'Computer  Asus', 20, 3, '2014-06-21 00:00:00', '2014-06-29 00:00:00', 7, 'end'),
(5, 'Samsung galaxy s5', 10, 1, '2014-06-22 00:00:00', '2014-06-25 00:00:00', 2, 'end'),
(6, 'Side By Side Samsung', 3, 3, '2014-06-21 00:00:00', '2014-06-26 00:00:00', 4, 'end');

-- --------------------------------------------------------

--
-- Structure de la table `jeton_user`
--

CREATE TABLE IF NOT EXISTS `jeton_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_jeton` int(11) NOT NULL,
  `ref_user` int(11) NOT NULL,
  `date_achat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `jeton_user`
--

INSERT INTO `jeton_user` (`id`, `ref_jeton`, `ref_user`, `date_achat`) VALUES
(1, 2, 3, '2014-06-29 17:28:12');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id_role`, `role`) VALUES
(1, 'Membre'),
(2, 'Membre++'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `pack_jetons`
--

CREATE TABLE IF NOT EXISTS `pack_jetons` (
  `id_pack` int(11) NOT NULL AUTO_INCREMENT,
  `lib_pack` varchar(100) COLLATE utf8_bin NOT NULL,
  `prix_pack` float NOT NULL,
  `nbr_jetons` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pack`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pack_jetons`
--

INSERT INTO `pack_jetons` (`id_pack`, `lib_pack`, `prix_pack`, `nbr_jetons`) VALUES
(1, 'pack dibutant', 0, 3),
(2, '10Jetons', 8.9, 10),
(3, '20Jetons', 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_prdt` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(100) CHARACTER SET latin1 NOT NULL,
  `prix` varchar(100) COLLATE utf8_bin NOT NULL,
  `ref_cat` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_prdt`),
  KEY `fk_cat_prdt` (`ref_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_prdt`, `libelle`, `designation`, `prix`, `ref_cat`, `img`) VALUES
(1, 'Iphone5s', 'IPH5S', '399,00', 1, '4c77ef3ad044125d0085427abf349572.png'),
(2, 'samsung galaxy s5', 'SGS5', '400,00', 1, '77bc6786020dfdf78d065cb50eb6085f.png'),
(3, 'samsung camera 2', 'SC2', '6000,00', 1, '7a581325d1996f4034e1609614761268.png'),
(4, 'Side_By_Side', 'RSG5PURS1', '500,00', 4, 'a1c3dfe5ebdbd604b847a0d95e3b8378.jpg'),
(5, 'Sony Bravia', 'KDL-42W807', '400,00', 4, 'b9a3cb282553e2d47fdff22cd8c18391.jpg'),
(6, 'Graveur Blu-Ray', ' SE-506BB', '290,00', 3, '0a94e4273ddde29d67817eee3b4be713.jpg'),
(7, 'Computer  Asus', 'F200CA', '349,00', 5, 'c1e0ca81304a77d8070918e910699ca1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `age` varchar(10) COLLATE utf8_bin NOT NULL,
  `date_naiss` varchar(100) COLLATE utf8_bin NOT NULL,
  `ville` varchar(100) COLLATE utf8_bin NOT NULL,
  `cp` int(100) NOT NULL,
  `niveau_id_role` int(11) NOT NULL,
  `jeton` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_niveau1` (`niveau_id_role`),
  KEY `date_naiss` (`date_naiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nom`, `prenom`, `age`, `date_naiss`, `ville`, `cp`, `niveau_id_role`, `jeton`) VALUES
(1, 'imad.belarabi@gmail.com', 'Belarabi', 'Imad', '21', '1993-06-03', 'meknes', 50000, 3, 3),
(2, 'simo.meknes@gmail.com', 'Marghichi', 'Mohammed', '26', '1988-09-04', 'meknes', 50000, 2, 2),
(3, 'hamza.sabic@gmail.com', 'Sabic', 'Hamza', '15', '1999-12-22', 'Fes', 75000, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user_enchere`
--

CREATE TABLE IF NOT EXISTS `user_enchere` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref_user` int(11) NOT NULL,
  `ref_ench` int(11) NOT NULL,
  `mise` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user_enchere`
--

INSERT INTO `user_enchere` (`id`, `ref_user`, `ref_ench`, `mise`) VALUES
(1, 3, 6, 0.45),
(2, 3, 5, 11.00),
(3, 3, 4, 30.00),
(4, 2, 6, 23.00),
(5, 3, 4, 26.00),
(6, 3, 6, 33.00),
(7, 3, 4, 12.00),
(8, 3, 1, 0.45),
(10, 3, 1, 0.45),
(11, 3, 1, 12.00),
(12, 3, 1, 0.10),
(13, 3, 1, 12.00);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `fk_prdt_enchere` FOREIGN KEY (`ref_prdt`) REFERENCES `produit` (`id_prdt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_cat_prdt` FOREIGN KEY (`ref_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`niveau_id_role`) REFERENCES `niveau` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
