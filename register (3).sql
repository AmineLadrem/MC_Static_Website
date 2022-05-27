-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2022 at 09:53 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `Name` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Major` varchar(20) NOT NULL,
  `faculty` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(20) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `AcademicYear` varchar(20) NOT NULL,
  `Matricule` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Matricule` (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Name`, `Lastname`, `Major`, `faculty`, `Email`, `phonenumber`, `AcademicYear`, `Matricule`) VALUES
('aaaacc', 'cccaaa', 'mi', 'Elec', 'amiddddne@gmail.com', '2135667588', 'L2', '12515'),
('cccccc', '333', 'mi', 'Math', 'ccc@cc.com', '05644540162', 'L3', '4122477'),
('Taha', 'cccc', 'MI', 'Elec', 'awper@gmail.com', '', 'L1', '44515'),
('FFFFFFF', 'ggggggggg', 'mi', 'Elec', 'ccccc@gmail.com', '', 'L2', '1451541'),
('Amine', 'Ladrem', 'mi', 'Phy', 'dddaaad@gmail', 'Phy', 'L3', '66666'),
('Amineaa', 'Ladremaaa', 'mi', 'Phy', 'dddaacccad@gmail', '', 'L3', '666663'),
('aaaaaaa', 'ccccccccc', 'mi', 'Math', 'ladrsity@gmail.com', '213541675881', 'L2', '4877815411'),
('cccc', 'acacac', 'mi', 'Math', 'aminaae@gmail.comaa', '05645640', 'L3', '4122'),
('cccccc', 'acacaac', 'mi', 'GAT', 'aminaaae@gmail.comaa', '056456401', 'M2', '412266'),
('cccccc', 'accccc', 'snv', 'Math', 'amccine@gmail.com', '05645640112', 'L3', '41226641'),
('cccccc', 'acccccc', 'mi', 'Math', 'amccince@gmail.com', '05645640112', 'M2', '412236641'),
('cccccc', 'acccccc', 'mi', 'Math', 'amccincejh@gmail.com', '0564564011662', 'L3', '41223666641'),
('cccccc', 'acccccc', 'mi', 'Math', 'amcciejh@gmail.com', '05645640162', 'M2', '4122136641'),
('cccccc', 'acccccc', 'mi', 'GAT', 'amccciejh@gmail.com', '056445640162', 'L3', '41221366541'),
('cccccc', 'Ladrem', 'mi', 'Math', 'lydia.bdendmrane@gma', '21354167588', 'L3', '4562145'),
('acasss', '2222', 'mi', 'CE', 'aminddde@gmail.com', '132156451', 'L2', '41228121'),
('Abd Ul Haq Amine', 'Ladrem', 'mi', 'CS', 'awpxrr@gmail.com', '441675881', 'L2', '25156145');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
