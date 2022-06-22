-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 06:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarmember`
--

CREATE TABLE `daftarmember` (
  `idmember` int(11) NOT NULL,
  `kode_member` varchar(9) DEFAULT NULL,
  `nm_member` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `jk` varchar(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriproduk`
--

CREATE TABLE `kategoriproduk` (
  `idkategori` int(11) NOT NULL,
  `nmkategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriproduk`
--

INSERT INTO `kategoriproduk` (`idkategori`, `nmkategori`) VALUES
(1, 'Kaos'),
(2, 'Sweater');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `idmenu` int(11) NOT NULL,
  `kode_menu` varchar(8) NOT NULL,
  `nmmenu` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`idmenu`, `kode_menu`, `nmmenu`, `link`, `icon`) VALUES
(1, 'M2022001', 'menuu01', '', ''),
(2, 'M2022002', 'Menuuu', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_produk`
--

CREATE TABLE `mst_produk` (
  `idproduk` int(11) NOT NULL,
  `nmproduk` varchar(50) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_produk`
--

INSERT INTO `mst_produk` (`idproduk`, `nmproduk`, `gambar`, `idkategori`, `harga`, `stock`, `kondisi`, `deskripsi`, `berat`) VALUES
(1, 'Sweater 001 - white', 'baju1.jpg', 2, 150000, 10, 'Baru', 'Sweatshirt saat ini merupakan salah satu lini pakaian terbaik dan berkualitas tinggi di antara Local Brand Indonesia. Dengan model loose-fit berlengan panjang tanpa tudung.', '110 Gram'),
(2, 'Basic Sweater Polos', '', 2, 100000, 15, 'Baru', 'Nyaman dipakai, Bisa Digunakan diberbagai Acara, trendy & cocok untuk semua gaya', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_userlogin`
--

CREATE TABLE `mst_userlogin` (
  `iduser` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_userlogin`
--

INSERT INTO `mst_userlogin` (`iduser`, `username`, `nama_lengkap`, `password`, `is_active`) VALUES
(1, 'mahasiswa', 'Calon Orang Sukses', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tst_penjualan`
--

CREATE TABLE `tst_penjualan` (
  `no_invoice` varchar(12) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `buktipembayaran` varchar(50) NOT NULL,
  `is_bayar` enum('1','0') NOT NULL,
  `is_closed` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarmember`
--
ALTER TABLE `daftarmember`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `mst_produk`
--
ALTER TABLE `mst_produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `fk_id_kategori` (`idkategori`);

--
-- Indexes for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tst_penjualan`
--
ALTER TABLE `tst_penjualan`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `fk_idmember` (`idmember`),
  ADD KEY `fk_idproduk` (`idproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_produk`
--
ALTER TABLE `mst_produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_produk`
--
ALTER TABLE `mst_produk`
  ADD CONSTRAINT `fk_id_kategori` FOREIGN KEY (`idkategori`) REFERENCES `kategoriproduk` (`idkategori`);

--
-- Constraints for table `tst_penjualan`
--
ALTER TABLE `tst_penjualan`
  ADD CONSTRAINT `fk_idmember` FOREIGN KEY (`idmember`) REFERENCES `daftarmember` (`idmember`),
  ADD CONSTRAINT `fk_idproduk` FOREIGN KEY (`idproduk`) REFERENCES `mst_produk` (`idproduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
