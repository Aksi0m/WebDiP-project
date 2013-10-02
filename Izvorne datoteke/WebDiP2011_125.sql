-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2012 at 05:43 AM
-- Server version: 5.0.51
-- PHP Version: 5.3.3-7+squeeze9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WebDiP2011_125`
--

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik`
--

CREATE TABLE `dnevnik` (
  `id_dnevnik` int(11) NOT NULL auto_increment,
  `dogadaj` varchar(160) character set utf8 default NULL,
  `vrijeme` date default NULL,
  PRIMARY KEY  (`id_dnevnik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `dnevnik`
--

INSERT INTO `dnevnik` (`id_dnevnik`, `dogadaj`, `vrijeme`) VALUES
(1, 'Korisnik c (ID = 3) je kreirao novi NATJEČAJ pod nazivom: test', '2012-06-02'),
(2, 'Korisnik c (ID = 3) je kreirao novu GALERIJU pod nazivom: test', '2012-06-02'),
(4, 'Korisnik a (ID = 1) je kreirao novi FAKULTET pod nazivom: test', '2012-06-02'),
(5, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(6, 'Korisnik (b2) se uspješno PRIJAVIO', '2012-06-02'),
(7, 'Korisnik  (ID = ) je kreirao novu PRIJAVNICU za natječaj (ID Natječaja = 5)', '2012-06-02'),
(8, 'Korisnik (b2) se uspješno ODJAVIO', '2012-06-02'),
(9, 'Korisnik (f) se uspješno PRIJAVIO', '2012-06-02'),
(10, 'Korisnik (f) se uspješno ODJAVIO', '2012-06-02'),
(11, 'Korisnik (f) se uspješno PRIJAVIO', '2012-06-02'),
(12, 'Korisnik f (ID = 6) je UPLOADO novu SLIKU: Untitled.jpg (Galerija: galerija 5)', '2012-06-02'),
(13, 'Korisnik f (ID = 6) je UPLOADO novu SLIKU: Untitled.jpg (Galerija: galerija 5)', '2012-06-02'),
(14, 'Korisnik (f) se uspješno ODJAVIO', '2012-06-02'),
(15, 'Korisniku (f) je ZAKLJUČAN KORISNIČKI RAČUN zbog tri neuspješne prijave!', '2012-06-02'),
(16, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(17, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(18, 'Korisnik (f) se uspješno PRIJAVIO', '2012-06-02'),
(19, 'Korisnik (f) se uspješno ODJAVIO', '2012-06-02'),
(20, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(21, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(22, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(23, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(24, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(25, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(26, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(27, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(28, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(29, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(30, 'Korisnik () se uspješno ODJAVIO', '2012-06-02'),
(31, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(32, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(33, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(34, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(35, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(36, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(37, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-02'),
(38, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-02'),
(39, 'Korisnik () se uspješno ODJAVIO', '2012-06-03'),
(40, 'Korisnik () se uspješno ODJAVIO', '2012-06-03'),
(41, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(42, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-03'),
(43, 'Korisnik () se uspješno ODJAVIO', '2012-06-03'),
(44, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(45, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(46, 'Korisnik (b2) se uspješno PRIJAVIO', '2012-06-03'),
(47, 'Korisnik (b2) se uspješno ODJAVIO', '2012-06-03'),
(48, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(49, 'Korisnik () se uspješno ODJAVIO', '2012-06-03'),
(50, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(51, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-03'),
(52, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(53, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-03'),
(54, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(55, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(56, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-03'),
(57, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-03'),
(58, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(59, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(60, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(61, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(62, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(63, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(64, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(65, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(66, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(67, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(68, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(69, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(70, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(71, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(72, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(73, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(74, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(75, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(76, 'Korisnik (c) se uspješno PRIJAVIO', '2012-06-04'),
(77, 'Korisnik (c) se uspješno PRIJAVIO', '2012-06-04'),
(78, 'Korisnik (c) se uspješno ODJAVIO', '2012-06-04'),
(79, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(80, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(81, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(82, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(83, 'Korisnik () se uspješno ODJAVIO', '2012-06-04'),
(84, 'Korisnik (c) se uspješno PRIJAVIO', '2012-06-04'),
(85, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(86, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(87, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(88, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-04'),
(89, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(90, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(91, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-04'),
(92, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-05'),
(93, 'Korisnik a (ID = 1) je kreirao novu PRIJAVNICU za natječaj (ID Natječaja = 15)', '2012-06-05'),
(94, 'Korisnik (a) se uspješno ODJAVIO', '2012-06-05'),
(95, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-05'),
(96, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-05'),
(97, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-05'),
(98, 'Korisnik (a) se uspješno PRIJAVIO', '2012-06-05'),
(99, 'Korisnik a (ID = 1) je kreirao novu PRIJAVNICU za natječaj (ID Natječaja = 4)', '2012-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `dokument`
--

CREATE TABLE `dokument` (
  `id_dokument` int(11) NOT NULL auto_increment,
  `dokument` varchar(100) default NULL,
  `vrijeme_uploadanja` datetime default NULL,
  `korisnik` int(11) NOT NULL,
  PRIMARY KEY  (`id_dokument`),
  KEY `fk_dokument_korisnik1` (`korisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `dokument`
--

INSERT INTO `dokument` (`id_dokument`, `dokument`, `vrijeme_uploadanja`, `korisnik`) VALUES
(1, 'dokument11', '0000-00-00 00:00:00', 1),
(2, 'dokument2', '0000-00-00 00:00:00', 1),
(3, 'dokument3', '0000-00-00 00:00:00', 2),
(4, 'DS EP_3. međuispitno razdoblje_2012.pdf', '0000-00-00 00:00:00', 1),
(5, 'PI-activity.pdf', '2012-05-23 04:39:44', 1),
(6, 'default.jpg', '2012-05-23 03:18:18', 1),
(15, 'dw.docx', '2012-05-23 03:39:59', 1),
(16, 'dw.doc', '2012-05-23 03:40:29', 1),
(19, 'galšććerija.jpg', '2012-06-03 15:26:27', 1),
(20, 'gaeSmile.jpg', '2012-06-03 20:26:59', 3),
(21, 'Untitled.jpg', '2012-06-04 22:06:17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dokument_portfelj`
--

CREATE TABLE `dokument_portfelj` (
  `dokument` int(11) NOT NULL,
  `portfelj_dokumenata` int(11) NOT NULL,
  PRIMARY KEY  (`dokument`,`portfelj_dokumenata`),
  KEY `fk_dokument_has_portfelj_dokumenata_portfelj_dokumenata1` (`portfelj_dokumenata`),
  KEY `fk_dokument_has_portfelj_dokumenata_dokument1` (`dokument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokument_portfelj`
--

INSERT INTO `dokument_portfelj` (`dokument`, `portfelj_dokumenata`) VALUES
(2, 1),
(3, 2),
(20, 3),
(1, 5),
(1, 7),
(2, 7),
(4, 7),
(5, 7),
(16, 7),
(1, 12),
(15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `fakultet`
--

CREATE TABLE `fakultet` (
  `id_fakultet` int(11) NOT NULL auto_increment,
  `naziv` varchar(45) default NULL,
  `adresa` varchar(45) default NULL,
  PRIMARY KEY  (`id_fakultet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fakultet`
--

INSERT INTO `fakultet` (`id_fakultet`, `naziv`, `adresa`) VALUES
(1, 'fakultet 1', 'adresa 1'),
(2, 'fakultet 2', 'adresa 2'),
(3, 'fakultet 3', 'adresa 3'),
(4, 'fakultet 4', 'adresa 4'),
(5, 'fakultet 5', 'adresa 5'),
(6, 'fakultet 6', 'adresa 6'),
(7, 'fakultet 7', 'adresa 7'),
(8, 'fakultet 8', 'adresa 8'),
(9, 'fakultet 9', 'adresa 9'),
(10, 'Fakultet Organizacije i Informatike', 'Pavlinska 2, Varaždin'),
(11, 'FER', 'zagreb bb'),
(12, 'FER 2', 'zagreb bb'),
(13, 'PMF', 'zagrebacka neka x'),
(14, 'PMF', 'asd 21'),
(15, 'test', '111');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id_galerija` int(11) NOT NULL auto_increment,
  `naziv` varchar(50) default NULL,
  `natjecaj` int(11) NOT NULL,
  PRIMARY KEY  (`id_galerija`),
  KEY `fk_galerija_slika_has_natjecaj_natjecaj1` (`natjecaj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id_galerija`, `naziv`, `natjecaj`) VALUES
(1, 'galerija 1', 1),
(2, 'galerija 2', 3),
(3, 'galerija 3', 3),
(4, 'galerija 4', 3),
(5, 'galerija 5', 4),
(6, 'galerija 6', 5),
(7, 'galerija 7', 3),
(8, 'galerija 8', 7),
(9, 'galerija 9', 3),
(10, 'galerija 10', 8),
(11, 'galerija 11', 3),
(27, 'galerija 2', 3),
(28, 'test', 4),
(29, 'test', 4);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL auto_increment,
  `vrijeme_komentiranja` datetime default NULL,
  `tekst` text,
  `korisnik` int(11) NOT NULL,
  `komentar` int(11) default NULL,
  `natjecaj` int(11) default NULL,
  PRIMARY KEY  (`id_komentar`),
  KEY `fk_komentar_korisnik1` (`korisnik`),
  KEY `fk_komentar_komentar1` (`komentar`),
  KEY `fk_komentar_natjecaj1` (`natjecaj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `vrijeme_komentiranja`, `tekst`, `korisnik`, `komentar`, `natjecaj`) VALUES
(1, '2000-01-23 00:00:00', 'abcde', 1, 10, 2),
(2, '2000-01-23 00:00:00', 'abcdeasd', 2, 9, 2),
(3, '2000-01-23 00:00:00', 'abcdefasfsa', 1, 9, 2),
(4, '2000-01-23 00:00:00', 'abcdadwe', 2, 1, 2),
(5, '2000-01-23 00:00:00', 'abcdwqdase', 3, 1, 3),
(6, '2000-01-23 00:00:00', 'abcdebgfb', 1, NULL, 1),
(7, '2000-01-23 00:00:00', 'abcbcvbde', 2, 6, 1),
(8, '2000-01-23 00:00:00', 'dfgdg', 3, 8, 4),
(9, '2000-01-23 00:00:00', 'abcdeqwdqw', 5, NULL, 2),
(10, '0000-00-00 00:00:00', 'abcdeffdv', 3, NULL, 2),
(11, '2012-05-17 03:03:06', 'zadnji', 1, 9, 2),
(14, '2012-05-24 19:56:24', 'a', 1, 9, 2),
(15, '2012-05-24 20:00:49', 'a da?', 1, 6, 1),
(16, '2012-05-24 21:38:25', ' - Odgovor na komentar od korisnika a\r\nma ne laprdaj ', 1, 9, 2),
(17, '2012-05-25 02:15:22', 'turicu, ti si pijan', 1, 9, 2),
(18, '2012-05-25 02:15:51', ' - Odgovor na komentar od korisnika a - ', 1, 6, 1),
(133, '2012-05-26 01:36:12', 'ja sam novi', 1, NULL, 1),
(136, '2012-05-26 01:46:17', 'adadadadad', 1, NULL, 1),
(162, '2012-05-26 15:55:23', 'asd', 1, NULL, 2),
(163, '2012-05-26 16:01:00', 'ad', 1, NULL, 2),
(164, '2012-05-26 16:06:47', 'asd', 1, NULL, 2),
(165, '2012-05-26 16:07:03', 'p', 1, NULL, 2),
(173, '2012-05-26 16:24:25', 'a', 1, NULL, 2),
(174, '2012-05-26 16:24:32', 'w', 1, NULL, 2),
(175, '2012-05-26 16:34:12', 'asd', 1, NULL, 2),
(176, '2012-05-26 16:34:23', 'sd', 1, NULL, 2),
(177, '2012-05-26 16:34:59', '@ Autor: a  : dw', 1, 175, 2),
(178, '2012-05-26 16:38:21', 'd', 1, NULL, 2),
(179, '2012-05-26 16:41:25', '@ Autor: a  : ', 1, 178, 2),
(180, '2012-05-26 16:41:33', 'tada', 1, NULL, 2),
(181, '2012-05-26 22:13:57', 'svida mi se', 1, NULL, 1),
(182, '2012-05-26 22:14:06', '@ Autor: a  : meni isto', 1, 181, 1),
(183, '2012-05-26 22:14:15', '@ Autor: a  : zasto?', 1, 181, 1),
(184, '2012-05-26 22:14:25', 'bezveze', 1, NULL, 1),
(196, '2012-05-27 12:38:45', 'wqeqwe', 1, NULL, 1),
(197, '2012-05-27 12:40:16', 'ds', 1, NULL, 1),
(198, '2012-05-27 19:38:17', 'sd', 1, NULL, 1),
(199, '2012-05-27 20:16:15', 'wd', 1, NULL, 1),
(208, '2012-05-27 20:26:54', '@ Autor: a  : ', 1, 196, 1),
(209, '2012-05-27 20:31:46', '@ Autor: a  : d', 1, 197, 1),
(210, '2012-05-27 20:33:05', '@ Autor: a  : d', 1, 196, 1),
(211, '2012-05-27 20:33:08', '@ Autor: a  : d', 1, 196, 1),
(212, '2012-05-27 20:33:09', '@ Autor: a  : dawd', 1, 196, 1),
(213, '2012-05-27 20:33:12', '@ Autor: a  : wad', 1, 197, 1),
(214, '2012-05-27 20:33:16', '@ Autor: a  : awd', 1, 199, 1),
(215, '2012-05-27 20:33:27', '@ Autor: a  : awdw', 1, 199, 1),
(216, '2012-05-27 20:34:23', '@ Autor: a  : d', 1, 199, 1),
(217, '2012-05-27 20:41:20', '@ Autor: a  : ajde', 1, 199, 1),
(218, '2012-05-27 20:43:22', '@ Autor: a  : d', 1, 199, 1),
(219, '2012-05-27 20:44:40', 'dobar', 1, NULL, 4),
(220, '2012-05-27 20:44:50', 'to ti mislis :P', 1, NULL, 4),
(221, '2012-05-27 20:45:01', '@ Autor: a  : Ne mislim nego znam', 1, 220, 4),
(222, '2012-05-27 20:45:39', '@ Autor: a  : da da', 1, 220, 4),
(223, '2012-05-27 20:45:45', '@ Autor: a  : WTF', 1, 219, 4),
(224, '2012-05-27 20:45:55', 'boooooze', 1, NULL, 4),
(225, '2012-05-27 20:47:30', '@ Autor: a  : ahaha', 1, 220, 4),
(226, '2012-05-28 20:41:10', '@ Autor: a  : a', 1, 175, 2),
(227, '2012-05-28 20:41:15', '@ Autor: a  : c', 1, 176, 2),
(228, '2012-05-28 20:41:19', 'd', 1, NULL, 2),
(229, '2012-05-31 01:02:42', 'Tu cu se prijaviti :D', 1, NULL, 3),
(230, '2012-05-31 12:03:36', '@ Autor: e  : komentar', 1, 9, 2),
(231, '2012-06-03 14:59:02', 'Dobar natječaj!', 1, NULL, 3),
(232, '2012-06-04 23:57:36', '@ Autor: a  : i ja isto!', 1, 229, 3),
(233, '2012-06-02 19:59:35', 'Firefox', 1, NULL, 3),
(234, '2012-06-02 19:59:51', '@ Autor: a  : \r\nTo i ja kažem', 1, 231, 3),
(235, '2012-06-03 01:39:14', 'a', 1, NULL, 2),
(236, '2012-06-03 01:39:56', '@ Autor: a  : ', 1, 228, 2),
(237, '2012-06-04 18:29:09', 'daaa', 3, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL auto_increment,
  `ime` varchar(20) default NULL,
  `prezime` varchar(20) default NULL,
  `datum_rodenja` date default NULL,
  `korisnicko_ime` varchar(20) default NULL,
  `avatar` varchar(100) default NULL,
  `email` varchar(45) default NULL,
  `lozinka` varchar(20) default NULL,
  `aktivacijski_kod` varchar(45) default NULL,
  `blokiran_do` date default NULL,
  `broj_opomena` int(11) default NULL,
  `neuspjele_prijave` int(11) default NULL,
  `tip_korisnika` int(11) NOT NULL,
  `status_korisnika` int(11) NOT NULL,
  `fakultet` int(11) default NULL,
  PRIMARY KEY  (`id_korisnik`),
  KEY `fk_korisnik_tip_korisnika` (`tip_korisnika`),
  KEY `fk_korisnik_status_korisnika1` (`status_korisnika`),
  KEY `fk_korisnik_fakultet1` (`fakultet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `prezime`, `datum_rodenja`, `korisnicko_ime`, `avatar`, `email`, `lozinka`, `aktivacijski_kod`, `blokiran_do`, `broj_opomena`, `neuspjele_prijave`, `tip_korisnika`, `status_korisnika`, `fakultet`) VALUES
(1, 'renato', 'turic', '0000-00-00', 'a', 'default.jpg', 'renato_turic@hotmail.com', 'asdD1!', '12', '0000-00-00', 0, 0, 3, 2, 1),
(2, 'danijel', 'tot', '0000-00-00', 'b2', 'default.jpg', 'b@gmail.com', 'asdD1!', '13', '0000-00-00', 0, 0, 1, 2, NULL),
(3, 'moreno', 'grguric', '0000-00-00', 'c', 'default.jpg', 'c@gmail.com', 'abc', '14', '0000-00-00', 23, 0, 2, 2, 5),
(4, 'sanjin', 'vuckovic', '0000-00-00', 'd', 'default.jpg', 'd@gmail.com', 'abc', '15', '0000-00-00', 24, 2, 1, 4, NULL),
(5, 'ivan', 'pusic', '0000-00-00', 'e', 'default.jpg', 'e@gmail.com', 'abc', '16', '0000-00-00', 25, 1, 1, 4, NULL),
(6, 'zoran', 'turk', '0000-00-00', 'f', 'default.jpg', 'f@gmail.com', 'asdD1!', '17', '0000-00-00', 0, 0, 2, 2, 5),
(7, 'marko', 'matic', '0000-00-00', 'g', 'default.jpg', 'g@gmail.com', 'abc', '18', '0000-00-00', 27, 0, 2, 2, 7),
(8, 'josip', 'zemberi', '0000-00-00', 'h', 'default.jpg', 'h@gmail.com', 'asdD1!', '19', '0000-00-00', 0, 0, 1, 2, NULL),
(9, 'mario', 'orsolic', '0000-00-00', 'i', 'default.jpg', 'i@gmail.com', 'abc', '121', '0000-00-00', 29, 1, 1, 3, NULL),
(10, 'ilija', 'zivkovic', '2000-01-11', 'j', 'default.jpg', 'j@gmail.com', 'abc', '131', '0000-00-00', 20, 0, 1, 0, NULL),
(11, 'asd', 'ew', '2000-01-11', 'j', 'default.jpg', 'j@gmail.com', 'abc', '131', '0000-00-00', 20, 0, 1, 2, NULL),
(12, 'fds', 'wq', '2000-01-11', 'k', 'default.jpg', 'k@gmail.com', 'abc', '131', '0000-00-00', 20, 0, 1, 2, NULL),
(13, 'dfg', 'sdf', '2000-01-11', 'l', 'default.jpg', 'l@gmail.com', 'abc', '131', '0000-00-00', 20, 0, 1, 2, NULL),
(14, 'Darko', 'Andro', '0000-00-00', 'darko', 'raspored.png', 'renato_turic@hotmail.com', 'asdD1!', '1337807471', '0000-00-00', 0, 0, 1, 1, NULL),
(18, 'Maroko', 'Radić', '1990-04-11', 'marooko', 'Untitled.jpg', 'renato_turic@hotmail.com', 'asdD1!', '1338676260', '0000-00-00', 0, 0, 1, 4, NULL),
(27, 'Test', 'Test', '0000-00-00', 'Test', 'raspored.png', 'renato_turic@hotmail.com', 'asdD1!', '1338728997', '0000-00-00', 0, 0, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `natjecaj`
--

CREATE TABLE `natjecaj` (
  `id_natjecaj` int(11) NOT NULL auto_increment,
  `naziv` varchar(100) default NULL,
  `opis` text,
  `broj_mjesta` int(11) default NULL,
  `troskovi` double default NULL,
  `cijena_prijave` double default NULL,
  `rok_prijave` int(11) default NULL,
  `odobren` tinyint(1) default NULL,
  `korisnik` int(11) NOT NULL,
  `fakultet` int(11) NOT NULL,
  PRIMARY KEY  (`id_natjecaj`),
  KEY `fk_natjecaj_fakultet1` (`fakultet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `natjecaj`
--

INSERT INTO `natjecaj` (`id_natjecaj`, `naziv`, `opis`, `broj_mjesta`, `troskovi`, `cijena_prijave`, `rok_prijave`, `odobren`, `korisnik`, `fakultet`) VALUES
(1, 'natjecaj2', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoid', 12, 123, 123, 1341768630, 0, 0, 7),
(2, 'natjecaj3', NULL, 32, 124, 123, 1341768630, 1, 0, 9),
(3, 'natjecaj4', NULL, 12, 125, 123, 1341768630, 1, 0, 8),
(4, 'natjecaj5', NULL, 5, 234, 123, 1341768630, 1, 3, 5),
(5, 'natjecaj6', NULL, 6, 32, 123, 1345768630, 1, 0, 4),
(6, 'natjecaj7', NULL, 21, 324, 123, 1341798630, 1, 0, 6),
(7, 'natjecaj7', NULL, 2, 325, 123, 1342768630, 1, 6, 5),
(8, 'natjecaj8', NULL, 12, 436, 123, 1141768630, 0, 0, 2),
(9, 'natjecaj9', NULL, 11, 353, 123, 1141768630, 1, 0, 3),
(10, 'natjecaj10', NULL, 10, 1244, 123, 1341768630, 1, 0, 2),
(11, 'natjecaj11', NULL, 21, 134, 123, 1341762630, 1, 0, 1),
(12, 'natjecaj12', NULL, 2, 332, 123, 1341768630, 1, 0, 1),
(13, 'natjecaj13', NULL, 12, 345, 123, 1341768630, 1, 0, 6),
(14, 'natjecaj14', NULL, 11, 344, 123, 1345768630, 1, 0, 7),
(15, 'natjecaj15', NULL, 10, 5454, 123, 1341768630, 1, 0, 8),
(16, 'Natječaj za noobove', 'Ovaj natječaj je iskljucivo za noobove', 10, 123, 321, 1441768630, 1, 0, 2),
(18, 'Natječaj za noobove2', 'a', 1, 2, 2, 1341568630, 0, 1, 1),
(19, 'Natječaj za noobove2', 'a', 1, 2, 2, 1341768630, 0, 1, 1),
(37, 'aa', 'aa', 12, 1, 1, 1339176630, 1, 1, 6),
(38, 'aa2', 'aa', 12, 1, 1, 1341768630, 0, 1, 6),
(39, 'test', 'test', 1, 1, 1, 1341768630, 0, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ocjena`
--

CREATE TABLE `ocjena` (
  `id_ocjena` int(11) NOT NULL auto_increment,
  `ocjena` int(11) default NULL,
  `vrijeme_ocjenjivanja` datetime default NULL,
  `korisnik` int(11) NOT NULL,
  `natjecaj` int(11) default NULL,
  `komentar` int(11) default NULL,
  PRIMARY KEY  (`id_ocjena`),
  KEY `fk_ocjena_korisnik1` (`korisnik`),
  KEY `fk_ocjena_natjecaj1` (`natjecaj`),
  KEY `fk_ocjena_komentar1` (`komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `ocjena`
--

INSERT INTO `ocjena` (`id_ocjena`, `ocjena`, `vrijeme_ocjenjivanja`, `korisnik`, `natjecaj`, `komentar`) VALUES
(1, 3, '0000-00-00 00:00:00', 1, 2, NULL),
(2, 2, '0000-00-00 00:00:00', 1, 3, NULL),
(3, 4, '0000-00-00 00:00:00', 2, NULL, 2),
(4, 3, '0000-00-00 00:00:00', 3, NULL, 5),
(5, 1, '0000-00-00 00:00:00', 1, NULL, 4),
(6, 1, '0000-00-00 00:00:00', 4, NULL, 7),
(7, 1, '0000-00-00 00:00:00', 6, 8, NULL),
(8, 2, '0000-00-00 00:00:00', 7, 9, NULL),
(9, 3, '2000-01-23 00:00:00', 9, NULL, 6),
(10, 4, '0000-00-00 00:00:00', 8, NULL, 4),
(27, 2, '2012-05-27 04:39:28', 2, 1, NULL),
(28, 4, '2012-05-27 04:43:17', 1, 1, NULL),
(29, 4, '2012-05-27 06:43:52', 1, 12, NULL),
(30, 2, '2012-05-27 12:54:48', 1, NULL, 6),
(33, 3, '2012-05-27 12:57:56', 1, NULL, 7),
(34, 4, '2012-05-27 14:02:02', 1, NULL, 133),
(35, 3, '2012-05-27 14:14:56', 2, NULL, 183),
(36, 4, '2012-05-27 17:20:24', 1, NULL, 197),
(37, 3, '2012-05-27 17:25:12', 1, NULL, 196),
(38, 4, '2012-05-27 17:27:11', 1, NULL, 182),
(39, 3, '2012-05-27 20:43:42', 1, NULL, 218),
(40, 3, '2012-05-27 20:46:02', 1, NULL, 220),
(41, 3, '2012-05-27 20:46:05', 1, NULL, 222),
(42, 2, '2012-05-27 20:46:14', 1, NULL, 224),
(43, 4, '2012-05-27 20:46:20', 1, 4, NULL),
(44, 5, '2012-05-27 20:47:56', 1, NULL, 225),
(45, 3, '2012-06-01 22:01:33', 2, 6, NULL),
(46, 1, '2012-06-01 23:55:33', 1, NULL, 229),
(47, 4, '2012-06-01 23:57:41', 1, NULL, 232);

-- --------------------------------------------------------

--
-- Table structure for table `portfelj_dokumenata`
--

CREATE TABLE `portfelj_dokumenata` (
  `id_portfelj_dokumenata` int(11) NOT NULL auto_increment,
  `naziv` varchar(50) default NULL,
  `datum_kreiranja` datetime default NULL,
  `korisnik` int(11) NOT NULL,
  PRIMARY KEY  (`id_portfelj_dokumenata`),
  KEY `fk_portfelj_dokumenata_korisnik1` (`korisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `portfelj_dokumenata`
--

INSERT INTO `portfelj_dokumenata` (`id_portfelj_dokumenata`, `naziv`, `datum_kreiranja`, `korisnik`) VALUES
(1, 'moj1', '0000-00-00 00:00:00', 1),
(2, 'portfelj', '0000-00-00 00:00:00', 2),
(3, 'dokumenti', '0000-00-00 00:00:00', 3),
(4, 'dokumenti za a', '0000-00-00 00:00:00', 4),
(5, 'asd', '0000-00-00 00:00:00', 9),
(6, 'fawf', '0000-00-00 00:00:00', 5),
(7, 'moj2', '0000-00-00 00:00:00', 1),
(8, 'madara', '0000-00-00 00:00:00', 6),
(9, 'vazno', '0000-00-00 00:00:00', 7),
(10, 'portfelj', '0000-00-00 00:00:00', 8),
(12, 'ahaa', '2012-05-30 17:35:06', 1),
(13, 'adaaa', '2012-05-30 17:40:31', 1),
(14, 'wtf', '2012-05-30 18:15:14', 1),
(15, 'Moj', '2012-06-03 20:26:44', 3),
(16, 'Moj portfelj za natjecaj 2', '2012-06-04 22:03:53', 2),
(17, 'Moj portfelj za natjecaj 2', '2012-06-04 22:03:54', 2),
(18, 'Novi portfelj', '2012-06-04 22:04:10', 2),
(19, 'Moj portfelj za natjecaj 3', '2012-06-04 22:04:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `preporuka`
--

CREATE TABLE `preporuka` (
  `id_preporuka` int(11) NOT NULL auto_increment,
  `pismo_preporuke` varchar(100) default NULL,
  `suglasnost` tinyint(1) default NULL,
  `vrijeme_uploadanja` datetime default NULL,
  `prijavnica` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  PRIMARY KEY  (`id_preporuka`),
  KEY `fk_preporuka_prijavnica1` (`prijavnica`),
  KEY `fk_preporuka_korisnik1` (`korisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `preporuka`
--

INSERT INTO `preporuka` (`id_preporuka`, `pismo_preporuke`, `suglasnost`, `vrijeme_uploadanja`, `prijavnica`, `korisnik`) VALUES
(1, 'aasd', 1, '0000-00-00 00:00:00', 1, 5),
(2, 'feqw', 1, '0000-00-00 00:00:00', 1, 10),
(3, NULL, 0, '0000-00-00 00:00:00', 2, 9),
(4, 'hsd', 1, '0000-00-00 00:00:00', 3, 8),
(5, 'bsdf', 1, '0000-00-00 00:00:00', 4, 7),
(6, 'rsdf', 1, '0000-00-00 00:00:00', 5, 3),
(7, 'wsf', 1, '0000-00-00 00:00:00', 6, 4),
(8, 'crfsd', 1, '0000-00-00 00:00:00', 7, 3),
(9, 'ge2c', 1, '0000-00-00 00:00:00', 8, 2),
(10, 'pismo preporuke.docx', 1, '2012-06-03 20:51:25', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prijavnica`
--

CREATE TABLE `prijavnica` (
  `id_prijavnica` int(11) NOT NULL auto_increment,
  `prijava_prihvacena` tinyint(1) default NULL,
  `vrijeme_prijave` datetime default NULL,
  `natjecaj` int(11) NOT NULL,
  `portfelj_dokumenata` int(11) NOT NULL,
  PRIMARY KEY  (`id_prijavnica`),
  KEY `fk_portfelj_dokumenata_has_natjecaj_natjecaj1` (`natjecaj`),
  KEY `fk_prijavnica_portfelj_dokumenata1` (`portfelj_dokumenata`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `prijavnica`
--

INSERT INTO `prijavnica` (`id_prijavnica`, `prijava_prihvacena`, `vrijeme_prijave`, `natjecaj`, `portfelj_dokumenata`) VALUES
(1, 1, '0000-00-00 00:00:00', 1, 10),
(2, 1, '0000-00-00 00:00:00', 2, 9),
(3, 0, '0000-00-00 00:00:00', 3, 7),
(4, 1, '0000-00-00 00:00:00', 6, 6),
(5, 0, '0000-00-00 00:00:00', 5, 5),
(6, 0, '0000-00-00 00:00:00', 6, 4),
(7, 1, '0000-00-00 00:00:00', 7, 2),
(8, 1, '0000-00-00 00:00:00', 4, 3),
(9, 0, '0000-00-00 00:00:00', 3, 2),
(10, 1, '2000-01-23 00:00:00', 2, 1),
(11, 1, '2012-05-31 04:17:34', 3, 13),
(12, 0, '2012-06-04 23:58:14', 3, 7),
(13, 0, '2012-06-02 17:07:52', 5, 16),
(14, 0, '2012-06-05 00:24:02', 15, 1),
(15, 0, '2012-06-05 07:25:34', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id_slika` int(11) NOT NULL auto_increment,
  `slika` varchar(100) default NULL,
  `vrijeme_uploadanja` datetime default NULL,
  `galerija` int(11) NOT NULL,
  PRIMARY KEY  (`id_slika`),
  KEY `fk_slika_galerija1` (`galerija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id_slika`, `slika`, `vrijeme_uploadanja`, `galerija`) VALUES
(1, 'wqe', '0000-00-00 00:00:00', 10),
(2, 'ert', '2000-03-25 00:00:00', 7),
(3, 'rtz', '0000-00-00 00:00:00', 6),
(4, 'tzu', '0000-00-00 00:00:00', 4),
(5, 'fgh', '0000-00-00 00:00:00', 1),
(6, 'cvb.jpg', '0000-00-00 00:00:00', 3),
(7, 'sdf.jpg', '0000-00-00 00:00:00', 3),
(8, 'cvb', '0000-00-00 00:00:00', 2),
(9, 'gbd', '0000-00-00 00:00:00', 9),
(10, 'fgb', '2000-01-24 00:00:00', 1),
(12, 'raspored.png', '2012-05-30 16:14:55', 3),
(13, 'Desert.jpg', '2012-05-30 16:21:18', 2),
(14, 'Desert.jpg', '2012-05-30 16:22:29', 2),
(15, 'epepe@foi.hr_neutral-feel-like-a-sir-clean.jpg', '2012-05-30 16:26:48', 3),
(24, 'galerija.jpg', '2012-05-30 16:57:17', 3),
(25, 'Untitled.jpg', '2012-06-02 17:10:28', 5),
(26, 'Untitled.jpg', '2012-06-02 17:11:13', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status_korisnika`
--

CREATE TABLE `status_korisnika` (
  `id_status` int(11) NOT NULL auto_increment,
  `status` varchar(20) default NULL,
  PRIMARY KEY  (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status_korisnika`
--

INSERT INTO `status_korisnika` (`id_status`, `status`) VALUES
(0, 'obrisan'),
(1, 'neaktivan'),
(2, 'aktivan'),
(3, 'suspendiran'),
(4, 'zaključan');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `id_tip` int(11) NOT NULL auto_increment,
  `tip` varchar(45) default NULL,
  PRIMARY KEY  (`id_tip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id_tip`, `tip`) VALUES
(1, 'registriran'),
(2, 'administrator fakulteta'),
(3, 'administrator sustava'),
(4, 'preporucivac');

-- --------------------------------------------------------

--
-- Table structure for table `vrijeme`
--

CREATE TABLE `vrijeme` (
  `id_vrijeme` int(11) NOT NULL auto_increment,
  `pomak` int(11) default NULL,
  PRIMARY KEY  (`id_vrijeme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vrijeme`
--

INSERT INTO `vrijeme` (`id_vrijeme`, `pomak`) VALUES
(1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokument`
--
ALTER TABLE `dokument`
  ADD CONSTRAINT `fk_dokument_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dokument_portfelj`
--
ALTER TABLE `dokument_portfelj`
  ADD CONSTRAINT `fk_dokument_has_portfelj_dokumenata_dokument1` FOREIGN KEY (`dokument`) REFERENCES `dokument` (`id_dokument`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dokument_has_portfelj_dokumenata_portfelj_dokumenata1` FOREIGN KEY (`portfelj_dokumenata`) REFERENCES `portfelj_dokumenata` (`id_portfelj_dokumenata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `galerija`
--
ALTER TABLE `galerija`
  ADD CONSTRAINT `fk_galerija_slika_has_natjecaj_natjecaj1` FOREIGN KEY (`natjecaj`) REFERENCES `natjecaj` (`id_natjecaj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_komentar1` FOREIGN KEY (`komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_natjecaj1` FOREIGN KEY (`natjecaj`) REFERENCES `natjecaj` (`id_natjecaj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_fakultet1` FOREIGN KEY (`fakultet`) REFERENCES `fakultet` (`id_fakultet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_status_korisnika1` FOREIGN KEY (`status_korisnika`) REFERENCES `status_korisnika` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika`) REFERENCES `tip_korisnika` (`id_tip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `natjecaj`
--
ALTER TABLE `natjecaj`
  ADD CONSTRAINT `fk_natjecaj_fakultet1` FOREIGN KEY (`fakultet`) REFERENCES `fakultet` (`id_fakultet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ocjena`
--
ALTER TABLE `ocjena`
  ADD CONSTRAINT `fk_ocjena_komentar1` FOREIGN KEY (`komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocjena_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocjena_natjecaj1` FOREIGN KEY (`natjecaj`) REFERENCES `natjecaj` (`id_natjecaj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `portfelj_dokumenata`
--
ALTER TABLE `portfelj_dokumenata`
  ADD CONSTRAINT `fk_portfelj_dokumenata_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `preporuka`
--
ALTER TABLE `preporuka`
  ADD CONSTRAINT `fk_preporuka_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preporuka_prijavnica1` FOREIGN KEY (`prijavnica`) REFERENCES `prijavnica` (`id_prijavnica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prijavnica`
--
ALTER TABLE `prijavnica`
  ADD CONSTRAINT `fk_portfelj_dokumenata_has_natjecaj_natjecaj1` FOREIGN KEY (`natjecaj`) REFERENCES `natjecaj` (`id_natjecaj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prijavnica_portfelj_dokumenata1` FOREIGN KEY (`portfelj_dokumenata`) REFERENCES `portfelj_dokumenata` (`id_portfelj_dokumenata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `fk_slika_galerija1` FOREIGN KEY (`galerija`) REFERENCES `galerija` (`id_galerija`) ON DELETE NO ACTION ON UPDATE NO ACTION;
