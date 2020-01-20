-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2020 at 08:27 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gombak`
--

-- --------------------------------------------------------

--
-- Table structure for table `fajok`
--

DROP TABLE IF EXISTS `fajok`;
CREATE TABLE IF NOT EXISTS `fajok` (
  `id_faj` int(11) NOT NULL AUTO_INCREMENT,
  `faj_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `latin_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `elofordulas` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fogyaszthatosag` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id_faj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `fajok`
--

INSERT INTO `fajok` (`id_faj`, `faj_nev`, `latin_nev`, `elofordulas`, `fogyaszthatosag`) VALUES
(3, 'Kerti tintagomba', 'Coprinellus micacenus', 'mezo', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kepek`
--

DROP TABLE IF EXISTS `kepek`;
CREATE TABLE IF NOT EXISTS `kepek` (
  `id_kep` int(11) NOT NULL AUTO_INCREMENT,
  `id_faj` int(11) NOT NULL,
  PRIMARY KEY (`id_kep`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `kepek`
--

INSERT INTO `kepek` (`id_kep`, `id_faj`) VALUES
(3, 1),
(4, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kerdesek`
--

DROP TABLE IF EXISTS `kerdesek`;
CREATE TABLE IF NOT EXISTS `kerdesek` (
  `id_kerdes` int(11) NOT NULL AUTO_INCREMENT,
  `kerdes_szoveg` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szoveg_segitseg` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `kep_segitseg` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id_kerdes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagok`
--

DROP TABLE IF EXISTS `tagok`;
CREATE TABLE IF NOT EXISTS `tagok` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `felhasznalonev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `vezeteknev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `keresztnev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `reg_datum` date NOT NULL,
  `aktiv` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `tagok`
--

INSERT INTO `tagok` (`id_tag`, `felhasznalonev`, `jelszo`, `vezeteknev`, `keresztnev`, `email`, `reg_datum`, `aktiv`) VALUES
(3, 'asd', 'asd', 'asd', 'asd', 'asd@asd', '2020-01-05', 0),
(5, 'ds', '', 'sad', 'sad', 'das@gmail.com', '2020-01-07', 0),
(6, '', '', '', '', '', '2020-01-07', 0),
(7, '', '', '', '', '', '2020-01-07', 0),
(8, '', '', 'gdf', '', '', '2020-01-07', 0),
(9, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf@asdf.asdf', '2020-01-20', 0),
(10, 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty@q.com', '2020-01-20', 0),
(11, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe@q.com', '2020-01-20', 0),
(12, 'tre', 'tre', 'tre', 'tre', 'tre@tre.com', '2020-01-20', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
