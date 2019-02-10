-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Mai 2017 à 14:46
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `aukh`
--

-- --------------------------------------------------------

--
-- Structure de la table `chefdep`
--

CREATE TABLE IF NOT EXISTS `chefdep` (
`id` int(11) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chefdep`
--

INSERT INTO `chefdep` (`id`, `departement`, `employee`) VALUES
(7, 'BO', 'bureau ordres'),
(8, 'DAF', 'divisoin des affaires administratives et financiers'),
(9, 'DET', 'departement des etudes et de la topographie'),
(10, 'DGUR', 'departement de la gestion urbain et de la reglementation'),
(11, 'S.INFRMTQ', 'service informatique'),
(12, 'SECT.D', 'secritariat de la Direction');

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `department`
--

INSERT INTO `department` (`designation`) VALUES
('BO'),
('DAF'),
('DET'),
('DGUR'),
('S.INFRMTQ'),
('SECT.D');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `fullname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`fullname`, `login`, `password`, `role`) VALUES
('bureau ordres', 'bo', 'password', 'responsable_BO'),
('departement de la gestion urbain et de la reglementation', 'dgur', 'password', 'chef_department'),
('departement des etudes et de la topographie', 'det', 'password', 'chef_department'),
('divisoin des affaires administratives et financiers', 'daf', 'password', 'chef_department'),
('secritariat de la Direction', 'sect_d', 'password', 'directrice'),
('service de budget des marches et de l equipment', 'sbme', 'password', 'responsable_concerne'),
('service de l instruction', 'si', 'password', 'responsable_concerne'),
('service de l urbanisme et de l architecture', 'sua', 'password', 'responsable_concerne'),
('service de la reglementation et de l orientation', 'sro', 'password', 'responsable_concerne'),
('service de la topographie', 'st', 'password', 'responsable_concerne'),
('service des affaires juridiques ', 'saj', 'password', 'responsable_concerne'),
('service des etudes foncieres', 'sef', 'password', 'responsable_concerne'),
('service des etudes generales', 'seg', 'password', 'responsable_concerne'),
('service du control', 'sc', 'password', 'responsable_concerne'),
('service du personel  de la formation et de la documentation', 'spfd', 'password', 'responsable_concerne'),
('service informatique', 's_infrmtq', 'password', 'chef_department');

-- --------------------------------------------------------

--
-- Structure de la table `ficheorderas`
--

CREATE TABLE IF NOT EXISTS `ficheorderas` (
  `numorder` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `destination` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ficheorderas`
--

INSERT INTO `ficheorderas` (`numorder`, `objet`, `reference`, `source`, `date`, `destination`, `description`, `instruction`) VALUES
('numa12', 'objet', 'ref1', 'anka', '2010-12-05', 'sbme,spfd', 'gfdgdg', 'dfgfd');

-- --------------------------------------------------------

--
-- Structure de la table `ficheorderss`
--

CREATE TABLE IF NOT EXISTS `ficheorderss` (
  `numordersort` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ficheorderss`
--

INSERT INTO `ficheorderss` (`numordersort`, `objet`, `destination`, `source`, `date`, `description`, `reference`, `from`, `id`) VALUES
('nums15', 'objet', 'DAF', 'anka', '2010-08-09', 'dsfsdf', 'ref1', 'spfd', 1),
('nums15', 'objet', 'SECT.D', 'anka', '2010-08-09', 'dsfsdf', 'ref1', 'DAF', 2),
('nums15', 'objet', 'BO', 'anka', '2010-08-09', 'dsfsdf', 'ref1', 'SECT.D', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ficheordrea`
--

CREATE TABLE IF NOT EXISTS `ficheordrea` (
  `n_order_a` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `organisme` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ficheordrea`
--

INSERT INTO `ficheordrea` (`n_order_a`, `date`, `reference`, `organisme`, `objet`, `destination`, `description`, `instruction`) VALUES
('numa12', '2010-12-05', 'ref1', 'anka', 'objet', 'dgur,daf,s.infrmtq', 'gfdg', 'sdgsd');

-- --------------------------------------------------------

--
-- Structure de la table `ficheordres`
--

CREATE TABLE IF NOT EXISTS `ficheordres` (
  `nordres` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `desciption` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `objet` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `order`
--

INSERT INTO `order` (`objet`, `reference`, `source`) VALUES
('objet', 'ref1', 'anka');

-- --------------------------------------------------------

--
-- Structure de la table `persserv`
--

CREATE TABLE IF NOT EXISTS `persserv` (
  `service` varchar(255) NOT NULL,
  `employe` varchar(255) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `persserv`
--

INSERT INTO `persserv` (`service`, `employe`, `id`) VALUES
('sbme', 'service de budget des marches et de l equipment', 3),
('spfd', 'service du personel  de la formation et de la documentation', 4),
('s_infrmtq', 'service informatique', 5),
('seg', 'service des etudes generales', 6),
('sua', 'service de l urbanisme et de l architecture', 7),
('sef', 'service des etudes foncieres', 8),
('st', 'service de la topographie', 9),
('si', 'service de l instruction', 10),
('sc', 'service du control', 11),
('saj', 'service des affaires juridiques ', 12),
('sro', 'service de la reglementation et de l orientation', 13);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`role`) VALUES
('chef_department'),
('directrice'),
('responsable_BO'),
('responsable_concerne');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `designation` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`designation`, `departement`) VALUES
('saj', 'DGUR'),
('sbme', 'DAF'),
('sc', 'DGUR'),
('sef', 'DET'),
('seg', 'DET'),
('si', 'DGUR'),
('spfd', 'DAF'),
('sro', 'DGUR'),
('st', 'DET'),
('sua', 'DET'),
('s_infrmtq', 'S.INFRMTQ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chefdep`
--
ALTER TABLE `chefdep`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `employee` (`employee`), ADD UNIQUE KEY `departement` (`departement`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`designation`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
 ADD PRIMARY KEY (`fullname`), ADD UNIQUE KEY `full name` (`fullname`), ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `ficheorderas`
--
ALTER TABLE `ficheorderas`
 ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `ficheorderss`
--
ALTER TABLE `ficheorderss`
 ADD PRIMARY KEY (`id`), ADD KEY `fk4` (`reference`);

--
-- Index pour la table `ficheordrea`
--
ALTER TABLE `ficheordrea`
 ADD PRIMARY KEY (`n_order_a`), ADD KEY `fk1` (`reference`);

--
-- Index pour la table `ficheordres`
--
ALTER TABLE `ficheordres`
 ADD PRIMARY KEY (`nordres`), ADD KEY `fk2` (`reference`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`reference`), ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `persserv`
--
ALTER TABLE `persserv`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`role`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`designation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chefdep`
--
ALTER TABLE `chefdep`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `ficheorderss`
--
ALTER TABLE `ficheorderss`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `persserv`
--
ALTER TABLE `persserv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ficheorderas`
--
ALTER TABLE `ficheorderas`
ADD CONSTRAINT `fk3` FOREIGN KEY (`reference`) REFERENCES `order` (`reference`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ficheorderss`
--
ALTER TABLE `ficheorderss`
ADD CONSTRAINT `fk4` FOREIGN KEY (`reference`) REFERENCES `order` (`reference`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ficheordrea`
--
ALTER TABLE `ficheordrea`
ADD CONSTRAINT `fk1` FOREIGN KEY (`reference`) REFERENCES `order` (`reference`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ficheordres`
--
ALTER TABLE `ficheordres`
ADD CONSTRAINT `fk2` FOREIGN KEY (`reference`) REFERENCES `order` (`reference`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
