-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 09:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_berobat`
--

CREATE TABLE `daftar_berobat` (
  `NO_PENDAFTARAN` char(8) NOT NULL,
  `ID_PASIEN` char(6) DEFAULT NULL,
  `ID_JADWAL` char(8) DEFAULT NULL,
  `TGL_BEROBAT` date DEFAULT NULL,
  `JAM_DAFTAR` time DEFAULT NULL,
  `NO_ANTRIAN` decimal(8,0) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_berobat`
--

INSERT INTO `daftar_berobat` (`NO_PENDAFTARAN`, `ID_PASIEN`, `ID_JADWAL`, `TGL_BEROBAT`, `JAM_DAFTAR`, `NO_ANTRIAN`, `STATUS`) VALUES
('DFT001', 'PSN001', 'JDW005', '2017-05-05', '15:20:38', '1', 'Selesai'),
('DFT002', 'PSN002', 'JDW015', '2017-05-05', '15:21:28', '1', 'Selesai'),
('DFT003', 'PSN003', 'JDW015', '2017-05-05', '15:22:13', '2', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID_DOKTER` char(8) NOT NULL,
  `ID_POLI` char(8) DEFAULT NULL,
  `NAMA` varchar(35) DEFAULT NULL,
  `ALAMAT` varchar(35) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID_DOKTER`, `ID_POLI`, `NAMA`, `ALAMAT`, `NO_TELP`) VALUES
('DOK001', 'POL005', 'Dwi Sartika', 'jl.', '0811002200'),
('DOK002', 'POL004', 'Mahendra Syahputra', 'jl. ', '0811002211'),
('DOK003', 'POL001', 'Taufik Hidayat', 'jl.', '0811002200');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_JADWAL` char(8) NOT NULL,
  `ID_DOKTER` char(8) DEFAULT NULL,
  `HARI` varchar(10) DEFAULT NULL,
  `RUANGAN` varchar(10) DEFAULT NULL,
  `JAM_AWAL` time DEFAULT NULL,
  `JAM_AKHIR` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `ID_DOKTER`, `HARI`, `RUANGAN`, `JAM_AWAL`, `JAM_AKHIR`) VALUES
('JDW001', 'DOK001', 'Senin', 'A1', '09:30:00', '13:30:00'),
('JDW002', 'DOK001', 'Selasa', 'A1', '12:30:00', '18:30:00'),
('JDW003', 'DOK001', 'Rabu', 'A1', '12:30:00', '18:30:00'),
('JDW004', 'DOK001', 'Kamis', 'A1', '12:30:00', '12:30:00'),
('JDW005', 'DOK001', 'Jumat', 'A1', '10:30:00', '18:30:00'),
('JDW006', 'DOK002', 'Senin', 'A2', '12:30:00', '13:30:00'),
('JDW007', 'DOK002', 'Selasa', 'A2', '12:30:00', '14:30:00'),
('JDW008', 'DOK002', 'Rabu', 'A2', '10:30:00', '14:30:00'),
('JDW009', 'DOK002', 'Kamis', 'A2', '09:30:00', '14:30:00'),
('JDW010', 'DOK002', 'Jumat', 'A2', '08:30:00', '14:30:00'),
('JDW011', 'DOK003', 'Senin', 'A3', '12:30:00', '13:30:00'),
('JDW012', 'DOK003', 'Selasa', 'A3', '08:30:00', '13:30:00'),
('JDW013', 'DOK003', 'Kamis', 'A3', '09:30:00', '14:30:00'),
('JDW014', 'DOK003', 'Rabu', 'A3', '10:30:00', '18:30:00'),
('JDW015', 'DOK003', 'Jumat', 'A3', '12:30:00', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_PASIEN` char(6) NOT NULL,
  `NAMA_PASIEN` varchar(40) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(40) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `AGAMA` varchar(10) DEFAULT NULL,
  `ALAMAT_PASIEN` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `NAMA_PASIEN`, `JENIS_KELAMIN`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `AGAMA`, `ALAMAT_PASIEN`, `NO_TELP`) VALUES
('PSN001', 'Hussein Mubarak', 'Laki-laki', 'Arab Saudi', '1976-08-12', 'Islam', 'jl. asrama', '081221122'),
('PSN002', 'Abdul Kashim', 'Laki-laki', 'Arab Saudi', '1986-02-11', 'Islam', 'jl. ayani', '0811221212'),
('PSN003', 'Agus Margono', 'Laki-laki', 'Jakarta', '1976-08-12', 'Islam', 'jl. ayani', '11221122');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `ID_PERAWAT` char(8) NOT NULL,
  `NAMA` varchar(35) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`ID_PERAWAT`, `NAMA`, `ALAMAT`, `NO_TELP`) VALUES
('PRW001', 'Sandiaga', 'jl. ', '0899119922');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `ID_POLI` char(8) NOT NULL,
  `NAMA_POLI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`ID_POLI`, `NAMA_POLI`) VALUES
('POL001', 'Poli Gizi'),
('POL002', 'Poli Anak'),
('POL003', 'Poliklinik Umum'),
('POL004', 'Poli Gigi'),
('POL005', 'Poliklinik Umum'),
('POL006', 'Poli Kandungan');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE `rekam_medik` (
  `NO_REKAM_MEDIK` char(6) NOT NULL,
  `NO_PENDAFTARAN` char(8) DEFAULT NULL,
  `TGL_BEROBAT` date DEFAULT NULL,
  `KELUHAN` varchar(256) DEFAULT NULL,
  `PENGOBATAN` varchar(256) DEFAULT NULL,
  `RESEP` varchar(256) DEFAULT NULL,
  `TAGIHAN` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medik`
--

INSERT INTO `rekam_medik` (`NO_REKAM_MEDIK`, `NO_PENDAFTARAN`, `TGL_BEROBAT`, `KELUHAN`, `PENGOBATAN`, `RESEP`, `TAGIHAN`) VALUES
('RKM001', 'DFT001', '2017-05-05', 'Susah Buang Air Besar', 'Obat', 'Pencahar', '128000'),
('RKM002', 'DFT002', '2017-05-05', 'Sakit Perut', 'Obat', 'Obat Cacing', '90000'),
('RKM003', 'DFT003', '2017-05-05', 'Tremor', 'Obat', 'Obat Penenag Saraf', '19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_USER` char(8) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `TIPE` varchar(10) DEFAULT NULL,
  `ID_POLIKLINIK` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_USER`, `USERNAME`, `PASSWORD`, `TIPE`, `ID_POLIKLINIK`) VALUES
('USR001', 'ADMIN', 'ADMIN', 'admin', NULL),
('USR002', 'USR002', 'USR002', 'petugas', 'PRW001'),
('USR003', 'DOK001', 'DOK001', 'dokter', 'DOK001'),
('USR004', 'DOK002', 'DOK002', 'dokter', 'DOK002'),
('USR005', 'DOK003', 'DOK003', 'dokter', 'DOK003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_berobat`
--
ALTER TABLE `daftar_berobat`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_JADWAL`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_PASIEN`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_DOKTER`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_POLI`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_DOKTER`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_PASIEN`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`ID_PERAWAT`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`ID_POLI`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`NO_REKAM_MEDIK`),
  ADD KEY `FK_MEMILIKI_REKAM_MEDIK` (`NO_PENDAFTARAN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_berobat`
--
ALTER TABLE `daftar_berobat`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_POLI`) REFERENCES `poliklinik` (`ID_POLI`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

--
-- Constraints for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD CONSTRAINT `FK_MEMILIKI_REKAM_MEDIK` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `daftar_berobat` (`NO_PENDAFTARAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
