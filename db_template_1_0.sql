-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 21, 2020 at 03:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_template_1_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_sekolah`
--

CREATE TABLE `t001_sekolah` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t001_sekolah`
--

INSERT INTO `t001_sekolah` (`id`, `Nama`, `Alamat`) VALUES
(1, 'MINU Karakter Bojonegoro', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t002_tahunajaran`
--

CREATE TABLE `t002_tahunajaran` (
  `id` int(11) NOT NULL,
  `Mulai` varchar(4) NOT NULL,
  `Selesai` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t002_tahunajaran`
--

INSERT INTO `t002_tahunajaran` (`id`, `Mulai`, `Selesai`) VALUES
(1, '2019', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `t003_kelas`
--

CREATE TABLE `t003_kelas` (
  `id` int(11) NOT NULL,
  `Kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t003_kelas`
--

INSERT INTO `t003_kelas` (`id`, `Kelas`) VALUES
(1, 'III (TIGA)');

-- --------------------------------------------------------

--
-- Table structure for table `t004_semester`
--

CREATE TABLE `t004_semester` (
  `id` int(11) NOT NULL,
  `Semester` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t004_semester`
--

INSERT INTO `t004_semester` (`id`, `Semester`) VALUES
(1, '2 (DUA)');

-- --------------------------------------------------------

--
-- Table structure for table `t101_berita`
--

CREATE TABLE `t101_berita` (
  `id` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t101_berita`
--

INSERT INTO `t101_berita` (`id`, `Tanggal`, `Berita`) VALUES
(1, '2020-04-20 00:00:00', 'Contoh isi berita pertama'),
(2, '2020-04-20 00:00:00', 'Berita kedua');

-- --------------------------------------------------------

--
-- Table structure for table `t201_users`
--

CREATE TABLE `t201_users` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext DEFAULT NULL,
  `sekolah_id` int(11) DEFAULT NULL,
  `tahunajaran_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t201_users`
--

INSERT INTO `t201_users` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`, `sekolah_id`, `tahunajaran_id`, `kelas_id`, `semester_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL, 1, 1, 1, 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ee11cbb19052e40b07aac0ca060c23ee', 1, 'user', 'Y', NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t202_userlevels`
--

CREATE TABLE `t202_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t202_userlevels`
--

INSERT INTO `t202_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default'),
(1, 'User'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `t203_userlevelpermissions`
--

CREATE TABLE `t203_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t203_userlevelpermissions`
--

INSERT INTO `t203_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}d101_beranda', 8),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}d101_berita', 8),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}r101_berita', 8),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}r202_users', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t001_sekolah', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t002_tahunajaran', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t003_kelas', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t004_semester', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t101_berita', 8),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t201_users', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t202_userlevels', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t203_userlevelpermissions', 0),
(-2, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t204_audittrail', 0),
(-2, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t201_users', 0),
(-2, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t202_userlevels', 0),
(-2, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t203_userlevelpermissions', 0),
(-2, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t204_audittrail', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t001_sekolah', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t101_berita', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t201_users', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t202_userlevels', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t203_userlevelpermissions', 0),
(0, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t204_audittrail', 0),
(0, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t201_users', 0),
(0, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t202_userlevels', 0),
(0, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t203_userlevelpermissions', 0),
(0, '{6F29DB82-65C7-44E5-AF21-1A1BC640B559}t204_audittrail', 0),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}d101_beranda', 8),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}r101_berita', 8),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}r202_users', 8),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t001_sekolah', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t002_tahunajaran', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t003_kelas', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t004_semester', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t101_berita', 511),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t201_users', 12),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t202_userlevels', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t203_userlevelpermissions', 256),
(1, '{1AF74738-C327-4FF8-8DF7-23D913E26545}t204_audittrail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t204_audittrail`
--

CREATE TABLE `t204_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext DEFAULT NULL,
  `oldvalue` longtext DEFAULT NULL,
  `newvalue` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_tahunajaran`
--
ALTER TABLE `t002_tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t003_kelas`
--
ALTER TABLE `t003_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t004_semester`
--
ALTER TABLE `t004_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_berita`
--
ALTER TABLE `t101_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t201_users`
--
ALTER TABLE `t201_users`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t202_userlevels`
--
ALTER TABLE `t202_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t203_userlevelpermissions`
--
ALTER TABLE `t203_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t002_tahunajaran`
--
ALTER TABLE `t002_tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t003_kelas`
--
ALTER TABLE `t003_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t004_semester`
--
ALTER TABLE `t004_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t101_berita`
--
ALTER TABLE `t101_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t201_users`
--
ALTER TABLE `t201_users`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
