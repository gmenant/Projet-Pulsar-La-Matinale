-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 07:51 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulsar`
--

-- --------------------------------------------------------

--
-- Table structure for table `chroniqueur`
--

CREATE TABLE `chroniqueur` (
  `id_chroniqueur` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee_diff` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lundi` tinyint(1) NOT NULL,
  `mardi` tinyint(1) NOT NULL,
  `mercredi` tinyint(1) NOT NULL,
  `jeudi` tinyint(1) NOT NULL,
  `vendredi` tinyint(1) NOT NULL,
  `samedi` tinyint(1) NOT NULL,
  `dimanche` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chroniqueur`
--

INSERT INTO `chroniqueur` (`id_chroniqueur`, `nom`, `prenom`, `annee_diff`, `password`, `mail`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`) VALUES
(1, 'menant', 'gabriel', '2015', '123', 'gab.menant@gmail.com', 0, 0, 0, 1, 1, 0, 0),
(2, 'thimonnier', 'ange', '2018', '123', 'qzrh@qerg.com', 1, 0, 1, 1, 0, 0, 0),
(10, 'michel', 'menant', '1453', '123', 'detj@eqsth', 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contenu`
--

CREATE TABLE `contenu` (
  `id_contenu` int(11) NOT NULL,
  `titre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texte` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_chroniqueur` int(11) DEFAULT NULL,
  `id_emission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contenu`
--

INSERT INTO `contenu` (`id_contenu`, `titre`, `texte`, `id_chroniqueur`, `id_emission`) VALUES
(10, 'Chronique 2', 'Le contenu de la chronique 2', 1, 1),
(11, 'Chronique 1', 'Le contenu de la chronique', 1, 2),
(12, 'qehqerh', 'qehqwjqetjqrtjyr', 1, 7),
(13, 'sryjsryj', 'fjhshysrykjsryjfj', 1, 13),
(14, 'tuim:uti:tu', 'sgsrth\'\'shs\'hhshs', 1, 19),
(15, 'dgh,dgh,dgtd', 'dgh,dgh,dtyjdtyj', 1, 20),
(16, 'dtydtkyldssry', 'dgh,dgh,dtyjdtyj', 1, 8),
(20, 'bvcxgfds', 'bvcxgfsd', 2, 19),
(21, 'jhgf', 'jhgfbvcxgfsd', 2, 13),
(22, 'jhfg', 'jgf', 2, 7),
(23, 'edt', 'srtjsrjtsrtjsrtj', 10, 7),
(24, 'srtj', 'srfgjsgjtj', 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `diffuse`
--

CREATE TABLE `diffuse` (
  `id_emission` int(11) NOT NULL,
  `id_chroniqueur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emissions`
--

CREATE TABLE `emissions` (
  `date_diff` date DEFAULT NULL,
  `id_emission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emissions`
--

INSERT INTO `emissions` (`date_diff`, `id_emission`) VALUES
('2018-01-14', 1),
('2018-01-19', 2),
('2018-01-07', 3),
('2018-01-08', 4),
('2018-01-09', 5),
('2018-01-10', 6),
('2018-01-11', 7),
('2018-01-12', 8),
('2018-01-14', 9),
('2018-01-15', 10),
('2018-01-16', 11),
('2018-01-17', 12),
('2018-01-18', 13),
('2018-01-19', 14),
('2018-01-21', 15),
('2018-01-22', 16),
('2018-01-23', 17),
('2018-01-24', 18),
('2018-01-25', 19),
('2018-01-26', 20),
('2018-01-28', 21),
('2018-01-29', 22),
('2018-01-30', 23),
('2018-01-31', 24);

-- --------------------------------------------------------

--
-- Table structure for table `fichier`
--

CREATE TABLE `fichier` (
  `id_fichier` int(11) NOT NULL,
  `adresse_fichier` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_fichier` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_contenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chroniqueur`
--
ALTER TABLE `chroniqueur`
  ADD PRIMARY KEY (`id_chroniqueur`);

--
-- Indexes for table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id_contenu`),
  ADD KEY `FK_contenu_id_chroniqueur` (`id_chroniqueur`),
  ADD KEY `FK_contenu_id_emission` (`id_emission`);

--
-- Indexes for table `diffuse`
--
ALTER TABLE `diffuse`
  ADD PRIMARY KEY (`id_emission`,`id_chroniqueur`),
  ADD KEY `FK_diffuse_id_chroniqueur` (`id_chroniqueur`);

--
-- Indexes for table `emissions`
--
ALTER TABLE `emissions`
  ADD PRIMARY KEY (`id_emission`);

--
-- Indexes for table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id_fichier`),
  ADD KEY `FK_fichier_id_contenu` (`id_contenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chroniqueur`
--
ALTER TABLE `chroniqueur`
  MODIFY `id_chroniqueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id_contenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `emissions`
--
ALTER TABLE `emissions`
  MODIFY `id_emission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id_fichier` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `FK_contenu_id_chroniqueur` FOREIGN KEY (`id_chroniqueur`) REFERENCES `chroniqueur` (`id_chroniqueur`),
  ADD CONSTRAINT `FK_contenu_id_emission` FOREIGN KEY (`id_emission`) REFERENCES `emissions` (`id_emission`);

--
-- Constraints for table `diffuse`
--
ALTER TABLE `diffuse`
  ADD CONSTRAINT `FK_diffuse_id_chroniqueur` FOREIGN KEY (`id_chroniqueur`) REFERENCES `chroniqueur` (`id_chroniqueur`),
  ADD CONSTRAINT `FK_diffuse_id_emission` FOREIGN KEY (`id_emission`) REFERENCES `emissions` (`id_emission`);

--
-- Constraints for table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `FK_fichier_id_contenu` FOREIGN KEY (`id_contenu`) REFERENCES `contenu` (`id_contenu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
