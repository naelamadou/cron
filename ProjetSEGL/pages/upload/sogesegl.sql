-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Septembre 2018 à 15:19
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sogesegl`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id` int(11) NOT NULL,
  `codeAgence_UC` varchar(255) NOT NULL,
  `libelleAgence` varchar(255) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `id_resp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `agence`
--

INSERT INTO `agence` (`id`, `codeAgence_UC`, `libelleAgence`, `id_unite`, `id_resp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(131, '500', 'ROUME-ENTREPRISES', 1, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(132, '700', 'SENEGALAIS DE L?EXTERIEUR', 1, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(133, '800', 'AGENCE CARTE SALAIRE', 7, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(134, '900', 'AGENCE DES HLM6', 4, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(135, '1000', 'DAKAR-SIEGE', 7, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(136, '1100', 'YOFF', 3, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(137, '1200', 'PIKINE', 3, NULL, '2018-08-15 12:09:18', '2018-08-15 12:09:18', NULL),
(138, '1300', 'OUAKAM', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(139, '1400', 'MALICK SY', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(140, '1500', 'ZONE INDUSTRIELLE', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(141, '1600', 'POMPIDOU', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(142, '1700', 'POINT-E', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(143, '1800', 'CENTENAIRE', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(144, '1900', 'RUFISQUE', 5, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(145, '2000', 'LAMINE GUEYE', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(146, '2200', 'CAMBERENE', 3, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(147, '2500', 'TRANSFERT MONETAIRE', 7, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(148, '2900', 'ROUME PARTICULIERS', 1, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(149, '3000', 'KAOLACK', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(150, '3200', 'SALY PORTUDAL', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(151, '3500', 'TAMBACOUNDA', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(152, '4000', 'ZIGUINCHOR', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(153, '4600', 'KOLDA', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(154, '6000', 'THIES', 5, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(155, '6100', 'SAINT LOUIS', 5, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(156, '6200', 'TOUBA', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(157, '6400', 'MBOUR', 6, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(158, '10700', 'BUREAU DE REPRESENTATION PARIS', 1, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(159, '11100', 'LIBERTE V', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(160, '11200', 'THIAROYE', 3, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(161, '11300', 'ALMADIES', 3, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(162, '11500', 'HANN MARISTE', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(163, '11600', 'LAT DIOR', 2, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(164, '11700', 'SICAP BAOBABS', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(165, '11800', 'BOURGUIBA CASTORS', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(166, '11900', 'KEUR MASSAR', 5, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(167, '12000', 'PETERSEN', 4, NULL, '2018-08-15 12:09:19', '2018-08-15 12:09:19', NULL),
(168, '16000', 'TIVAOUANE', 5, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(169, '16100', 'LOUGA', 5, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(170, '20700', 'DJILY MBAYE', 1, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(171, '21100', 'GRAND YOFF', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(172, '21200', 'PIKINE ICOTAF', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(173, '21300', 'STELE MERMOZ', 4, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(174, '21600', 'CARNOT', 2, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(175, '21800', 'DERKLE-KHAR YALLA', 4, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(176, '22000', 'AUTOPORT', 1, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(177, '22200', 'PATTE D\'OIE BUILDERS', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(178, '23000', 'AGENCE DU GOLF', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(179, '26000', 'THIES RANDOULENE', 5, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(180, '26200', 'DIOURBEL', 6, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(181, '31300', 'SACRE COEUR', 4, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(182, '31800', 'NIARY TALLY', 4, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(183, '32000', 'SGBS QUATRE C', 2, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(184, '41100', 'GRAND MEDINE', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(185, '41200', 'GUEDIAWAYE', 3, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(186, '76000', 'C.S.M  RESSOURCES HUMAINES', 7, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(187, '77000', 'C.S.M  MONETIQUE', 7, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(188, '78000', 'CSM EXPLOTATION-MAINTENANCE', 7, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(189, '79000', 'DCPE Equipe Audit SGBS', 7, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(190, '79100', 'DCPE Frais Region AFS', 7, NULL, '2018-08-15 12:09:20', '2018-08-15 12:09:20', NULL),
(191, '90100', 'MANKO PIKINE', 8, NULL, '2018-08-15 12:09:21', '2018-08-15 12:09:21', NULL),
(192, '90200', 'MANKO GRAND YOFF', 8, NULL, '2018-08-15 12:09:21', '2018-08-15 12:09:21', NULL),
(193, '90300', 'MANKO HLM', 8, NULL, '2018-08-15 12:09:21', '2018-08-15 12:09:21', NULL),
(194, '90400', 'MANKO KEUR MASSAR', 8, NULL, '2018-08-15 12:09:21', '2018-08-15 12:09:21', NULL),
(195, '99500', 'ANCIEN SC SGBS', 7, NULL, '2018-08-15 12:09:21', '2018-08-15 12:09:21', NULL),
(196, 'test', 'test', 3, NULL, '2018-09-09 12:42:46', '2018-09-09 12:42:46', NULL),
(197, 'test', 'test', 3, NULL, '2018-09-09 13:49:19', '2018-09-09 13:49:19', NULL),
(198, 'test1', 'test1', 6, NULL, '2018-09-09 13:50:19', '2018-09-09 13:50:19', NULL),
(199, 'boly', 'boly', 7, NULL, '2018-09-09 13:56:19', '2018-09-09 13:56:19', NULL),
(200, 'boly', 'test', 5, NULL, '2018-09-09 13:57:35', '2018-09-09 13:57:35', NULL),
(201, 'ww', 'ww', 2, NULL, '2018-09-09 14:09:19', '2018-09-09 14:09:19', NULL),
(202, 'qq', 'qq', 6, NULL, '2018-09-09 14:10:10', '2018-09-09 14:10:10', NULL),
(203, 'qs', 'qs', 8, NULL, '2018-09-09 15:05:03', '2018-09-09 15:05:03', NULL),
(204, 'qs', 'qs', 8, NULL, '2018-09-09 15:07:00', '2018-09-09 15:07:00', NULL),
(205, 'aaaaaa', 'aaaaaaaaaa', 6, NULL, '2018-09-09 15:08:17', '2018-09-09 15:08:17', NULL),
(206, 'wxc', 'wxcx', 7, NULL, '2018-09-09 15:09:09', '2018-09-09 15:09:09', NULL),
(207, 'azerty', 'qerty', 8, NULL, '2018-09-09 15:10:27', '2018-09-09 15:10:27', NULL),
(208, 'qq', 'qqqqq', 1, NULL, '2018-09-09 15:13:16', '2018-09-09 15:13:16', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `desc_com` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id_agence` int(11) NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_users`, `desc_com`, `status`, `id_agence`, `heure`) VALUES
(67, 2, 'merci d\'effectuer des explications sur l\'erreur', 0, 131, '2018-08-29 12:10:59'),
(68, 2, 'tester', 0, 134, '2018-08-29 12:22:38'),
(69, 2, 'rpm', 0, 134, '2018-08-29 12:47:34'),
(71, 2, ' aqtydfwq', 0, 131, '2018-08-29 17:04:10'),
(72, 2, '                                              azere', 0, 131, '2018-08-29 17:07:04'),
(73, 2, 'ngorr seck', 0, 132, '2018-08-29 17:11:18'),
(74, 2, 'vous netes pas en regle', 0, 140, '2018-08-29 17:12:54'),
(75, 2, 'gagner', 0, 139, '2018-08-29 17:22:34'),
(76, 2, 'bandiare', 0, 163, '2018-08-29 17:24:26'),
(77, 2, 'awa khoumaaa', 0, 137, '2018-08-30 09:21:25'),
(78, 2, 'moustaphaa     ', 0, 158, '2018-08-30 10:21:02'),
(79, 2, 'lenaaa                         ', 0, 139, '2018-08-30 10:22:11'),
(80, 2, '                                              Ww', 0, 131, '2018-08-30 10:51:11'),
(81, 2, 'ddgjjdghfvhch                       ', 0, 132, '2018-08-30 11:55:17'),
(82, 2, 'Oui mais ce n\'est pas trop tard pour les contacter pour samedi? \nde toute facon il y a tellement de chose qui ne colle pas... \n', 0, 132, '2018-08-30 11:56:22'),
(83, 2, 'merci de nous donner des explication consernant l\'erreur', 0, 131, '2018-08-30 11:58:00'),
(84, 2, 'merci pour votre information le temps    merci pour votre information le temps merci pour votre information le temps   \r\nmerci pour votre information le temps             ', 0, 160, '2018-08-30 14:26:29'),
(85, 2, 'pre', 0, 139, '2018-08-30 14:50:08'),
(86, 2, 'expliqez                   ', 0, 192, '2018-09-02 16:30:21'),
(87, 2, '                  ""ééééertdrdfccvbhjg_                            ', 0, 170, '2018-09-03 10:29:15'),
(88, 2, '                  ""ééééertdrdfccvbhjg_                            ', 0, 170, '2018-09-03 10:31:35'),
(89, 2, '                                              azerty', 0, 141, '2018-09-06 20:55:37'),
(91, 2, '           banee                                   ', 0, 141, '2018-09-07 10:22:31'),
(93, 2, '                                              pp', 0, 131, '2018-09-07 11:18:08'),
(94, 2, '                                       djiby       ', 0, 158, '2018-09-07 12:24:38'),
(95, 2, '                                              i am a test', 0, 131, '2018-09-07 13:34:53'),
(96, 2, 'mee', 0, 176, '2018-09-07 13:56:55'),
(97, 2, 'baneeeeeeee', 0, 132, '2018-09-07 13:57:40'),
(98, 2, 'dfrgh', 0, 132, '2018-09-07 13:58:26'),
(99, 2, '', 0, 132, '2018-09-07 15:47:04'),
(100, 2, 'k,déé_ \'\'jkjqlkq/;', 0, 176, '2018-09-07 15:49:07'),
(101, 2, 'merci d\'effectuer des explications sur l\'erreur consernant l\'erreur', 0, 131, '2018-09-07 15:53:02'),
(102, 2, 'donner des explications claires consernant l\'erreur stp a cette agence', 0, 163, '2018-09-07 20:46:21');

-- --------------------------------------------------------

--
-- Structure de la table `erreur`
--

CREATE TABLE `erreur` (
  `iderreur` int(11) NOT NULL,
  `typeerreur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `grille`
--

CREATE TABLE `grille` (
  `id` int(11) NOT NULL,
  `fichier` blob NOT NULL,
  `id_responsable` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listeerreur`
--

CREATE TABLE `listeerreur` (
  `id` int(11) NOT NULL,
  `DCO` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `DEV` varchar(250) DEFAULT NULL,
  `NCP` varchar(250) DEFAULT NULL,
  `OPE` varchar(250) DEFAULT NULL,
  `LIBELLE` varchar(250) DEFAULT NULL,
  `CAISSE` varchar(250) DEFAULT NULL,
  `CUTI` varchar(250) DEFAULT NULL,
  `UTI_CAISSE` varchar(250) DEFAULT NULL,
  `MON` varchar(250) DEFAULT NULL,
  `PIE` varchar(250) DEFAULT NULL,
  `PIEO` varchar(250) DEFAULT NULL,
  `dateReport` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `listeerreur`
--

INSERT INTO `listeerreur` (`id`, `DCO`, `AGE`, `DEV`, `NCP`, `OPE`, `LIBELLE`, `CAISSE`, `CUTI`, `UTI_CAISSE`, `MON`, `PIE`, `PIEO`, `dateReport`, `status`) VALUES
(1, '10/07/2018', '500', '0', '98379200018', '559', 'ERREURS CA       7            ', '7', '1', 'A', '311', 'FC136069   ', 'FC136069   ', '2018-08-06 15:50:57', 1),
(2, '10/07/2018', '1000', '0', '98379200018', '559', 'ERREURS CA     900            ', '900', '2', 'A', '10000', 'FC133037   ', 'FC133037   ', '2018-08-06 15:50:57', 1),
(3, '10/07/2018', '1300', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '3', 'A', '13', 'FC133248   ', 'FC133248   ', '2018-08-06 15:50:57', 0),
(4, '10/07/2018', '1800', '0', '98379200018', '559', 'ERREURS CA       2            ', '2', '4', 'A', '1', 'FC133350   ', 'FC133350   ', '2018-08-06 15:50:57', 0),
(5, '10/07/2018', '1900', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '5', 'A', '5', 'FC135048   ', 'FC135048   ', '2018-08-06 15:50:57', 0),
(6, '10/07/2018', '2000', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '6', 'A', '200027', 'FC133518   ', 'FC133518   ', '2018-08-06 15:50:57', 0),
(7, '10/07/2018', '2900', '0', '98379200018', '559', 'ERREURS CA       3            ', '3', '7', 'A', '301', 'FC135355   ', 'FC135355   ', '2018-08-06 15:50:57', 0),
(8, '10/07/2018', '3500', '0', '98379200018', '559', 'ERREURS CA       3            ', '3', '8', 'A', '4', 'FC133525   ', 'FC133525   ', '2018-08-06 15:50:57', 0),
(9, '10/07/2018', '3500', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '9', 'A', '4980', 'FC133526   ', 'FC133526   ', '2018-08-06 15:50:57', 0),
(10, '10/07/2018', '6000', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '10', 'A', '23', 'FC135187   ', 'FC135187   ', '2018-08-06 15:50:57', 0),
(11, '10/07/2018', '6000', '0', '98379200018', '559', 'ERREURS CA       3            ', '3', '11', 'A', '38', 'FC135185   ', 'FC135185   ', '2018-08-06 15:50:57', 0),
(12, '10/07/2018', '6000', '0', '98379200018', '559', 'ERREURS CA       6            ', '6', '12', 'A', '297', 'FC135186   ', 'FC135186   ', '2018-08-06 15:50:57', 0),
(13, '10/07/2018', '6000', '0', '98379200018', '869', 'REGUL ERR CAISSE 100          ', '100', '13', 'A', '50012', 'OD745134   ', 'OD745134   ', '2018-08-06 15:50:58', 0),
(14, '10/07/2018', '6100', '0', '98379200018', '559', 'ERREURS CA       1            ', '1', '14', 'A', '3', 'FC134748   ', 'FC134748   ', '2018-08-06 15:50:58', 0),
(15, '10/07/2018', '6200', '0', '98379200018', '559', 'ERREURS CA       3            ', '3', '15', 'A', '2', 'FC134067   ', 'FC134067   ', '2018-08-06 15:50:58', 0),
(16, '10/07/2018', '6400', '0', '98379200018', '559', 'ERREURS CA       1            ', '1', '16', 'A', '63', 'FC135208   ', 'FC135208   ', '2018-08-06 15:50:58', 0),
(17, '10/07/2018', '6400', '0', '98379200018', '559', 'ERREURS CA       6            ', '6', '17', 'A', '602', 'FC135209   ', 'FC135209   ', '2018-08-06 15:50:58', 0),
(18, '10/07/2018', '11300', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '18', 'A', '8', 'FC134780   ', 'FC134780   ', '2018-08-06 15:50:58', 0),
(19, '10/07/2018', '11300', '0', '98379200018', '559', 'ERREURS CA       2            ', '2', '19', 'A', '112', 'FC134779   ', 'FC134779   ', '2018-08-06 15:50:58', 0),
(20, '10/07/2018', '11900', '0', '98379200018', '559', 'ERREURS CA       2            ', '2', '20', 'A', '286', 'FC133640   ', 'FC133640   ', '2018-08-06 15:50:58', 0),
(21, '10/07/2018', '16000', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '21', 'A', '2', 'FC134051   ', 'FC134051   ', '2018-08-06 15:50:58', 0),
(22, '10/07/2018', '16000', '0', '98379200018', '559', 'ERREURS CA       2            ', '2', '22', 'A', '3', 'FC134050   ', 'FC134050   ', '2018-08-06 15:50:58', 0),
(23, '10/07/2018', '16100', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '23', 'A', '292', 'FC134357   ', 'FC134357   ', '2018-08-06 15:50:58', 0),
(24, '10/07/2018', '21100', '0', '98379200018', '559', 'ERREURS CA       2            ', '2', '24', 'A', '20000', 'FC133069   ', 'FC133069   ', '2018-08-06 15:50:58', 0),
(25, '10/07/2018', '26200', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '25', 'A', '47', 'FC134205   ', 'FC134205   ', '2018-08-06 15:50:59', 0),
(26, '10/07/2018', '31300', '0', '98379200018', '559', 'ERREURS CA     100            ', '100', '26', 'A', '7000', 'FC133139   ', 'FC133139   ', '2018-08-06 15:50:59', 0);

-- --------------------------------------------------------

--
-- Structure de la table `listeerreurt`
--

CREATE TABLE `listeerreurt` (
  `id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_liste` int(11) NOT NULL,
  `id_agence` int(11) DEFAULT NULL,
  `id_commentaire` int(11) NOT NULL,
  `id_respAge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsableagence`
--

CREATE TABLE `responsableagence` (
  `id_respAge` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `responsableagence`
--

INSERT INTO `responsableagence` (`id_respAge`, `nom`, `prenom`, `email`, `id_users`) VALUES
(1, 'tapha', 'ndiaye', 'tapha@gmail.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `nom_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2018-08-03 09:05:20', '2018-08-03 09:05:20', NULL),
(2, 'agent RO', '2018-08-03 09:05:20', '2018-08-03 09:05:20', NULL),
(3, 'responsable agence', '2018-08-03 09:10:38', '2018-08-03 09:10:38', NULL),
(4, 'responsable gerant caisse', '2018-08-03 09:13:00', '2018-08-03 09:13:00', NULL),
(5, 'IGAD', '2018-08-03 09:15:08', '2018-08-03 09:15:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `unite_commerciale`
--

CREATE TABLE `unite_commerciale` (
  `id_uc` int(11) NOT NULL,
  `Code_UC` varchar(255) NOT NULL,
  `Nom_UC` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `unite_commerciale`
--

INSERT INTO `unite_commerciale` (`id_uc`, `Code_UC`, `Nom_UC`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00001', 'UNITE COMMERCIALE 1                     ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(2, '00002', 'UNITE COMMERCIALE 2                    ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(3, '00003', 'UNITE COMMERCIALE 3                     ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(4, '00004', 'UNITE COMMERCIALE 4                     ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(5, '00006', 'UNITE COMMERCIALE NORD                       ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(6, '00007', 'UNITE COMMERCIALE SUD               ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(7, '00008', 'SIEGE - CENTRE ADMINISTRATIF  ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL),
(8, '90000', 'MANKO ( NOVABANK)            ', '2018-07-24 09:41:47', '2018-07-24 09:42:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `id_role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'passer', 1, NULL, NULL, NULL, NULL),
(2, 'cheikh_sogesegl', 'cheikh.Ndour@socgen.com', 'passer', 2, NULL, NULL, NULL, NULL),
(3, 'flo_sogesegl', 'flo@gmail.com', 'passer', 5, NULL, NULL, NULL, NULL),
(4, 'malick_sogesegl', 'malick.Gueye@socgen.com', 'passer', 3, NULL, NULL, NULL, NULL),
(5, 'ouli_sogesegl', 'ouli@gmail.com', 'passer', 4, NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unite` (`id_unite`),
  ADD KEY `id_resp` (`id_resp`),
  ADD KEY `id_resp_2` (`id_resp`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_users_2` (`id_users`),
  ADD KEY `id_agence` (`id_agence`);

--
-- Index pour la table `erreur`
--
ALTER TABLE `erreur`
  ADD PRIMARY KEY (`iderreur`);

--
-- Index pour la table `grille`
--
ALTER TABLE `grille`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsable` (`id_responsable`),
  ADD KEY `id_responsable_2` (`id_responsable`);

--
-- Index pour la table `listeerreur`
--
ALTER TABLE `listeerreur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listeerreurt`
--
ALTER TABLE `listeerreurt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agence` (`id_agence`),
  ADD KEY `id_liste` (`id_liste`),
  ADD KEY `id_commentaire` (`id_commentaire`),
  ADD KEY `id_respAge` (`id_respAge`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `responsableagence`
--
ALTER TABLE `responsableagence`
  ADD PRIMARY KEY (`id_respAge`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unite_commerciale`
--
ALTER TABLE `unite_commerciale`
  ADD PRIMARY KEY (`id_uc`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT pour la table `erreur`
--
ALTER TABLE `erreur`
  MODIFY `iderreur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `grille`
--
ALTER TABLE `grille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `listeerreur`
--
ALTER TABLE `listeerreur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `listeerreurt`
--
ALTER TABLE `listeerreurt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `responsableagence`
--
ALTER TABLE `responsableagence`
  MODIFY `id_respAge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `unite_commerciale`
--
ALTER TABLE `unite_commerciale`
  MODIFY `id_uc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `agence_ibfk_1` FOREIGN KEY (`id_unite`) REFERENCES `unite_commerciale` (`id_uc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agence_ibfk_2` FOREIGN KEY (`id_resp`) REFERENCES `responsableagence` (`id_respAge`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `listeerreurt`
--
ALTER TABLE `listeerreurt`
  ADD CONSTRAINT `listeErreurT_ibfk_1` FOREIGN KEY (`id_liste`) REFERENCES `listeerreur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listeErreurT_ibfk_3` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_com`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `responsableagence`
--
ALTER TABLE `responsableagence`
  ADD CONSTRAINT `responsableAgence_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
