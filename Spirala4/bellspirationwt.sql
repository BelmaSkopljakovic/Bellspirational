-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 12:07 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bellspirationwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `knjiga` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id`, `autor`, `knjiga`) VALUES
(18, 'Irfan', 'Blender'),
(19, 'Irfan', 'Blender2'),
(20, 'Hana ', 'LD'),
(21, 'Hana ', 'RA'),
(22, 'Belma', 'Bellspiration'),
(23, 'Cogo', 'OOAD'),
(24, 'selma rizvic', 'RG'),
(25, 'paulo', 'brida'),
(26, 'lana', 'ride');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`) VALUES
('ana', '827ccb0eea8a706c4c34a16891f84e7b', 'ana@gmail.com'),
('belma', 'f6c854fd15eecb111f12eab549657338', 'bellspiration2k16@gmail.com'),
('irfan', '827ccb0eea8a706c4c34a16891f84e7b', 'bellspiration2k16@gmail.com'),
('sunce', '78dd70efb32507940a9c1382b4f7a971', 'irfan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `najbolje`
--

CREATE TABLE `najbolje` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `knjiga` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `korisnik` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `knjigafk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `najbolje`
--

INSERT INTO `najbolje` (`id`, `autor`, `knjiga`, `korisnik`, `knjigafk`) VALUES
(1, 'Bel', 'Bellspir', 'belma', NULL),
(2, 'Louise Hay', 'Kako izliječiti svoj život', 'belma', NULL),
(4, 'Ana Bučević', 'O mudrosti odgoja', 'belma', NULL),
(5, 'Ana Bučević', 'U vortexu ostvarenih snova', 'belma', NULL),
(6, 'Nada B', 'Nadahnuća', 'belma', NULL),
(7, 'Nada Bučević', 'Nadahnuća 2', 'belma', NULL),
(8, 'selma', 'skop', 'belma', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `najbolje`
--
ALTER TABLE `najbolje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knjigafk` (`knjigafk`,`korisnik`),
  ADD KEY `korisnik` (`korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `najbolje`
--
ALTER TABLE `najbolje`
  ADD CONSTRAINT `najbolje_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`username`),
  ADD CONSTRAINT `najbolje_ibfk_2` FOREIGN KEY (`knjigafk`) REFERENCES `knjige` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
