-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 10:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `penulis` varchar(250) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `thn_terbit` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `penulis`, `penerbit`, `thn_terbit`, `gambar`) VALUES
(1, 'Naruto Shippuden', 'Masashi Kishimoto', 'Shueisha', 1999, 'naruto.jpg'),
(2, 'Upin & Ipin', 'Burhanuddin Radzi', 'Dar Mizan', 2007, 'upin ipin.jpg'),
(3, 'One Piece', 'Eiichiro Oda', 'Weekly Shonen Jump', 1997, 'one piece.jpg'),
(4, 'Doraemon', 'Fujiko A.Fujio', 'Shogakukan', 1970, 'doraemon.jpg'),
(18, 'Tokyo Revenger', 'Ken Wakui', 'Kodansha', 2017, 'tokyo revenger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori_id` int(11) NOT NULL,
  `nm_kategori` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku_relasi`
--

CREATE TABLE `kategori_buku_relasi` (
  `kategori_buku_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `koleksi_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`koleksi_id`, `username`, `judul`) VALUES
(3, 'angga', 'One Piece'),
(2, 'angga', 'Upin & Ipin'),
(4, 'angga', 'Upin & Ipin');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_peminjaman` varchar(50) NOT NULL,
  `tgl_pengembalian` varchar(50) NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman`, `username`, `judul`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES
(33, 'novi', 'Upin & Ipin', '05-03-2024', '05-03-2024', 'Sudah dikembalikan'),
(34, 'admin', 'Upin & Ipin', '05-03-2024', '14-03-2024', 'Sudah dikembalikan'),
(32, 'petugas', 'Doraemon', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(31, 'angga', 'Upin & Ipin', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(29, 'angga', 'One Piece', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(30, 'angga', 'Tokyo Revenger', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(28, 'angga', 'Naruto Shippuden', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(27, 'angga', 'Doraemon', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(26, 'angga', 'Naruto Shippuden', '04-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(25, 'angga', 'Upin & Ipin', '03-03-2024', '04-03-2024', 'Sudah dikembalikan'),
(35, 'admin', 'Upin & Ipin', '06-03-2024', '14-03-2024', 'Sudah dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `gambar`) VALUES
(26, 'yoan', '202cb962ac59075b964b07152d234b70', '', '', ''),
(27, 'novi', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(25, 'petugas', '202cb962ac59075b964b07152d234b70', '', '', ''),
(23, 'angga', '202cb962ac59075b964b07152d234b70', ' Angga Haady Wijaya', 'Sei Siskambing C II ', 'angga.jpeg'),
(24, 'admin', '202cb962ac59075b964b07152d234b70', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kategori_buku_relasi`
--
ALTER TABLE `kategori_buku_relasi`
  ADD PRIMARY KEY (`kategori_buku_id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`koleksi_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
