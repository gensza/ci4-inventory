-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 31, 2026 at 04:28 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `Barang`
--

CREATE TABLE `Barang` (
  `ID` int(11) NOT NULL,
  `NamaBarang` varchar(100) NOT NULL,
  `IDKategori` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `TanggalPembelian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Barang`
--

INSERT INTO `Barang` (`ID`, `NamaBarang`, `IDKategori`, `Harga`, `TanggalPembelian`) VALUES
(1, 'Oppo ', 1, 1200000, '2026-01-30'),
(2, 'Logitect', 4, 57000, '2026-01-24'),
(5, 'Reno 4', 1, 100000, '2025-12-14'),
(6, 'SSD 1 TB', 5, 2500000, '2026-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `Kategori`
--

CREATE TABLE `Kategori` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Kategori`
--

INSERT INTO `Kategori` (`ID`, `Nama`) VALUES
(5, 'Hardisk'),
(3, 'Keyboard'),
(4, 'Mouse'),
(2, 'Notebook'),
(1, 'Smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`) VALUES
(1, 'admin', '$2y$10$0s1Yta9pozUmFy2EGVPNfOaJ1x6.WiQKqAjOp1eOODl8ztj4Qbd9C'),
(2, 'admin2', '$2y$10$NYWcIiHjYQkqXFbJeggvpOMpI1O.lSc7mAbRNiO.0KerdA454kany');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Barang`
--
ALTER TABLE `Barang`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_namaBarang` (`NamaBarang`),
  ADD KEY `fk_kategori` (`IDKategori`);

--
-- Indexes for table `Kategori`
--
ALTER TABLE `Kategori`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_nama` (`Nama`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Barang`
--
ALTER TABLE `Barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Kategori`
--
ALTER TABLE `Kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Barang`
--
ALTER TABLE `Barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`IDKategori`) REFERENCES `Kategori` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
