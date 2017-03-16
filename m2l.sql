-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mars 2017 à 15:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `idcommune` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`idcommune`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`idcommune`, `libelle`) VALUES
(1, 'test'),
(2, 'testbis'),
(77, 'Paris'),
(78, 'Oxen'),
(79, 'vie'),
(80, 'Astrub'),
(81, 'Tremblay en france'),
(82, 'couillesville'),
(83, 'testville'),
(84, 'deuxiemetestville'),
(85, 'Design'),
(86, 'Designn'),
(87, 'azae'),
(88, 'azzzzzzzz'),
(89, 'dada'),
(90, 'dadaa'),
(91, 'moines'),
(92, 'papi'),
(93, 'dazdad'),
(94, 'champs'),
(95, 'lolol');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `idformation` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `nb_jour` int(12) NOT NULL,
  `prerequis` varchar(45) NOT NULL,
  `numero` int(12) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `idcommune` int(11) NOT NULL,
  `idprestataire` int(11) NOT NULL,
  `idtypeFormation` int(11) NOT NULL,
  PRIMARY KEY (`idformation`),
  KEY `idformation_ibfk_1` (`idcommune`),
  KEY `idformation_ibfk_2` (`idprestataire`),
  KEY `idformation_ibfk_3` (`idtypeFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idformation`, `contenu`, `date`, `nb_jour`, `prerequis`, `numero`, `rue`, `idcommune`, `idprestataire`, `idtypeFormation`) VALUES
(1, 'yolo', '2016-12-29', 2, 'bts', 78, 'albert sarraut', 1, 2, 1),
(2, 'yolal', '2016-12-29', 3, 'bts +3', 74, 'albert sarral', 2, 2, 2),
(14, 'jambon', '2017-01-31', 8, 'aoiudoi', 87, 'avenue albert sarraut', 81, 2, 39),
(15, 'Formation de excel pour camille', '2017-02-03', 3, 'Avoir excel', 87, 'avenue albert sarraut', 1, 2, 1),
(16, 'Formation HTML', '2017-02-25', 2, 'BAC ', 87, 'Avenue du Bourg Palette', 77, 2, 1),
(17, 'OMGA', '2017-03-02', 2, 'Aucun', 66, 'Rue de la paix', 77, 2, 40),
(23, 'dzadaoj', '2017-03-18', 12, 'azda', 12, 'daz', 93, 23, 47),
(24, 'LEL', '2017-03-18', 12, 'aucun', 22, 'rue de champs', 95, 24, 48);

-- --------------------------------------------------------

--
-- Structure de la table `formavalid`
--

CREATE TABLE IF NOT EXISTS `formavalid` (
  `idformation` int(11) NOT NULL,
  `salarie_chef` int(11) NOT NULL,
  KEY `formavalid_ibfk_1` (`idformation`),
  KEY `formavalid_ibfk_2` (`salarie_chef`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formavalid`
--

INSERT INTO `formavalid` (`idformation`, `salarie_chef`) VALUES
(1, 2),
(15, 3),
(17, 3),
(24, 21),
(1, 3),
(2, 3),
(14, 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `idsalarie` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  PRIMARY KEY (`idmessage`),
  KEY `message_ibfk_1` (`idsalarie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idmessage`, `message`, `date`, `idsalarie`, `channel`) VALUES
(279, 'a', 1488473239, 4, 3),
(280, 'b', 1488473241, 4, 3),
(281, '', 1488473251, 4, 3),
(282, 'a', 1488473263, 4, 3),
(283, 'ff', 1488473265, 4, 3),
(284, 'zaf', 1488473343, 4, 3),
(285, 'tg', 1488529513, 3, 3),
(286, 'bonjour help', 1489498095, 20, 1),
(287, 'a', 1489591881, 3, 3),
(288, 'a', 1489591883, 3, 3),
(289, 'daz', 1489592070, 3, 3),
(290, 'daz', 1489592076, 3, 3),
(291, 'dza', 1489592091, 3, 3),
(292, 'dz', 1489592136, 3, 3),
(293, 'dza', 1489592172, 3, 3),
(294, 'dza', 1489592198, 3, 3),
(295, 'dza', 1489592263, 3, 3),
(296, 'daz', 1489592287, 3, 3),
(297, 'dza', 1489592319, 3, 3),
(298, 'a', 1489592670, 3, 3),
(299, 'dza', 1489592675, 3, 3),
(300, 'zaf', 1489592713, 3, 3),
(301, '', 1489593386, 3, 3),
(302, 'dza', 1489593388, 3, 3),
(303, 'aa', 1489593393, 3, 3),
(304, 'dza', 1489664884, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `idsalarie` int(11) NOT NULL,
  `idformation` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  KEY `participer_ibfk_1` (`idformation`),
  KEY `participer_ibfk_2` (`idsalarie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`idsalarie`, `idformation`, `etat`) VALUES
(4, 1, 'validé'),
(4, 15, 'validee'),
(4, 17, 'validee'),
(4, 2, 'validee'),
(4, 14, 'en cours de validation');

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE IF NOT EXISTS `prestataire` (
  `idprestataire` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `fonction` varchar(45) NOT NULL,
  `numeroRue` int(11) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `idcommune` int(11) NOT NULL,
  `idsalarie` int(11) NOT NULL,
  PRIMARY KEY (`idprestataire`),
  KEY `prestataire_ibfk_1` (`idcommune`),
  KEY `prestataire_ibfk_2` (`idsalarie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `prestataire`
--

INSERT INTO `prestataire` (`idprestataire`, `nom`, `prenom`, `fonction`, `numeroRue`, `rue`, `idcommune`, `idsalarie`) VALUES
(1, 'jean', 'bernard', 'pdg', 11, 'albert sarraut', 1, 2),
(2, 'jeann2', 'bernardd2', 'pdgg', 11, 'albert sarraut', 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE IF NOT EXISTS `salarie` (
  `idsalarie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `nomf` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `capital_formation` int(11) NOT NULL,
  `numeroRue` int(11) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `salarie_chef` int(11) NOT NULL,
  `idcommune` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `estChef` tinyint(1) NOT NULL,
  `estPresta` tinyint(1) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idsalarie`),
  KEY `salarie_ibfk_1` (`idcommune`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `salarie`
--

INSERT INTO `salarie` (`idsalarie`, `nom`, `nomf`, `prenom`, `mdp`, `capital_formation`, `numeroRue`, `rue`, `salarie_chef`, `idcommune`, `email`, `estChef`, `estPresta`, `estAdmin`) VALUES
(2, 'presta1', 'dqs', 'bo', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 48, 12, 'des sources', 0, 1, 'aaaa@hotmail.fr', 0, 1, 0),
(3, 'chef1', 'dzaf', 'pipi', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 12, 57, 'avenue albert sarraut', 0, 1, 'aptsdeplv93@hotmail.fr', 1, 0, 0),
(4, 'lambda1', 'kkk', 'dz', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 14, 12, 'azda', 3, 1, 'aptsdeplv923@hotmail.fr', 0, 0, 0),
(6, 'chef2', 'nathan', 'caudeli', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 12, 87, 'avenue albert', 6, 2, 'apz@hotmail.fr', 1, 0, 0),
(7, 'presta2', 'nathan', 'caudeli', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 12, 87, 'avenua', 0, 2, 'apzz@hotmail.fr', 0, 1, 0),
(10, 'admin', 'admin', 'admin', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 12, 87, 'avenue albert sarraut', 0, 1, 'aptsdeplv9311@hotmail.fr', 0, 0, 1),
(18, 'sadomaso', 'sadomaso', 'sadomaso', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 8, 24, 'rue du dopeul', 3, 80, 'dofus@contact.fr', 0, 0, 0),
(19, 'teuse', 'teuse', 'teuse', 'fb12927f05a78966c4f505d606d9cd628f6f86ea', 12, 47, 'avenue de mes couilles', 0, 82, 'ville@mail.fr', 1, 0, 0),
(20, 'prestatestt', 'prestaaaa', 'adaaaa', 'c7c7796ce3945863ec4901047ae236ef2ec14059', 12, 12, 'rue du test', 0, 83, 'aptsdeplv933@gmail.com', 0, 1, 0),
(21, 'cheftest', 'test', 'test', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 22, 12, 'rue du deuxieme test', 0, 84, 'aptsdeplv932@gmail.com', 1, 0, 0),
(22, 'tumcaslecouilles', 'caca', 'caca', '729fb9c42059641f07afc06787f24db9274ba127', 50, 12, 'azzzzzz', 0, 88, 'aptsdeplv9143@gmail.com', 0, 1, 0),
(23, 'azdaz', 'azeda', 'dazda', '2f4139df894407a731469278a026d06e6cb0a56a', 84, 55, 'rue des moines', 0, 91, 'aptsdeplv9a3@gmail.com', 0, 1, 0),
(24, 'press', 'press', 'press', '98f25363f5a60f58c4bd66f3125075f6be8578bb', 85, 1, 'rue des champs', 0, 94, 'aptsdeplv93@gmail.com', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `typeformation`
--

CREATE TABLE IF NOT EXISTS `typeformation` (
  `idtypeFormation` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`idtypeFormation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `typeformation`
--

INSERT INTO `typeformation` (`idtypeFormation`, `libelle`) VALUES
(1, 'yolo'),
(2, 'test'),
(39, 'java'),
(40, 'JAJA'),
(41, 'Photoshop'),
(42, 'Photoshopp'),
(43, 'eazea'),
(44, '888'),
(45, 'kkkk'),
(46, 'aiia'),
(47, 'dzada'),
(48, 'lol');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`idcommune`) REFERENCES `commune` (`idcommune`),
  ADD CONSTRAINT `formation_ibfk_2` FOREIGN KEY (`idprestataire`) REFERENCES `salarie` (`idsalarie`),
  ADD CONSTRAINT `formation_ibfk_3` FOREIGN KEY (`idtypeFormation`) REFERENCES `typeformation` (`idtypeFormation`);

--
-- Contraintes pour la table `formavalid`
--
ALTER TABLE `formavalid`
  ADD CONSTRAINT `formavalid_ibfk_1` FOREIGN KEY (`idformation`) REFERENCES `formation` (`idformation`),
  ADD CONSTRAINT `formavalid_ibfk_2` FOREIGN KEY (`salarie_chef`) REFERENCES `salarie` (`idsalarie`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idsalarie`) REFERENCES `salarie` (`idsalarie`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`idformation`) REFERENCES `formation` (`idformation`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`idsalarie`) REFERENCES `salarie` (`idsalarie`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `prestataire_ibfk_1` FOREIGN KEY (`idcommune`) REFERENCES `commune` (`idcommune`),
  ADD CONSTRAINT `prestataire_ibfk_2` FOREIGN KEY (`idsalarie`) REFERENCES `salarie` (`idsalarie`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `salarie_ibfk_1` FOREIGN KEY (`idcommune`) REFERENCES `commune` (`idcommune`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
