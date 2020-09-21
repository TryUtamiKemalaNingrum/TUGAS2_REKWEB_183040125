-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 06:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw09_183040125`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelektronik`
--

CREATE TABLE `pelektronik` (
  `ID` int(11) NOT NULL,
  `Nama Peralatan` varchar(15) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Produksi` varchar(4) NOT NULL,
  `Harga Baru` varchar(10) NOT NULL,
  `Harga Second` varchar(10) NOT NULL,
  `Foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelektronik`
--

INSERT INTO `pelektronik` (`ID`, `Nama Peralatan`, `Type`, `Produksi`, `Harga Baru`, `Harga Second`, `Foto`) VALUES
(1, 'Laptop', 'Acer Aspire 3', '2016', '7.000.000', '5.600.000', 'laptop.jpg'),
(2, 'Setrika', 'Cosmos', '2017', '80.000', '50.000', 'setrika.jpg'),
(3, 'Magic Com', 'Cosmos', '2017', '100.000', '80.000', 'magiccom.jpg'),
(4, 'Tv', 'LG', '2015', '6.000.000', '3.000.000', 'tv.jpg'),
(5, 'Kipas angin', 'Polytron', '2018', '400.000', '250.000', 'kipasangin.jpg'),
(6, 'Ipad', 'F7', '2016', '3.000.000', '2.000.000', 'ipad.jpg'),
(7, 'AC', 'Redmi3', '2018', '3.500.000', '2.000.000', 'ac.jpg'),
(8, 'Blender', 'Sharp', '2017', '500.000', '200.000', 'blender.jpg'),
(9, 'Mesin Cuci', 'Samsung', '2012', '5.000.000', '3.500.000', 'mesincuci.gif'),
(10, 'Mixer', 'Mix', '2017', '500.000', '200.000', 'mixer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelektronik`
--
ALTER TABLE `pelektronik`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelektronik`
--
ALTER TABLE `pelektronik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
