-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`, `nama`) VALUES
(2, 'admin', 'admin', 'Udin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kdBuku` int(3) NOT NULL,
  `jdlBuku` varchar(30) NOT NULL,
  `stok` int(3) NOT NULL,
  `rak` varchar(10) NOT NULL,
  `kdKategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kdBuku`, `jdlBuku`, `stok`, `rak`, `kdKategori`) VALUES
(1, 'Algoritma', 5, 'R-12', 3),
(2, 'Pemrograman Web Lanjut', 2, 'T-1', 4),
(5, 'Struktur Data', 10, 'A-6', 4),
(6, 'Anggit Sang Pakboi', 12, 'A-1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kdKategori` int(3) NOT NULL,
  `nmKategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kdKategori`, `nmKategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Sains'),
(4, 'Pemrograman'),
(5, 'Fiksi'),
(7, 'Biografi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kdPeminjaman` int(3) NOT NULL,
  `kdBuku` int(3) NOT NULL,
  `kdPengunjung` int(3) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kdPeminjaman`, `kdBuku`, `kdPengunjung`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 2, 1, '2021-01-03', '2021-01-23'),
(4, 6, 4, '2021-01-05', '2021-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `kdPengunjung` int(3) NOT NULL,
  `nmPengunjung` varchar(30) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`kdPengunjung`, `nmPengunjung`, `kontak`, `email`) VALUES
(1, 'Nurdin', '087111111111', 'nurdin@amikom.com'),
(2, 'Firdaus', '0851231321241', 'firdaus@amikom.com'),
(4, 'Pamungkas', '0812318371', 'pamungkas@amikom.com'),
(5, 'Adit', '0823714t281741', 'adit@amikom.com'),
(9, 'Bayu', '131241201', 'Bayu@amikom.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kdBuku`),
  ADD KEY `kdKategori` (`kdKategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kdKategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kdPeminjaman`),
  ADD KEY `kdBuku` (`kdBuku`),
  ADD KEY `kdPengunjung` (`kdPengunjung`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`kdPengunjung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kdBuku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kdKategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `kdPeminjaman` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `kdPengunjung` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kdKategori`) REFERENCES `kategori` (`kdKategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kdBuku`) REFERENCES `buku` (`kdBuku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kdPengunjung`) REFERENCES `pengunjung` (`kdPengunjung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
