/*
Navicat MySQL Data Transfer

Source Server         : ConLocal-mysql
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_ecomm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-07-06 09:29:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for daftarmember
-- ----------------------------
DROP TABLE IF EXISTS `daftarmember`;
CREATE TABLE `daftarmember` (
  `idmember` int(11) NOT NULL AUTO_INCREMENT,
  `kode_member` varchar(9) DEFAULT NULL,
  `nm_member` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of daftarmember
-- ----------------------------
INSERT INTO `daftarmember` VALUES ('1', 'MB2022001', 'Ardi', 'ardi@gmail.com', '1242525325', '2022-06-15 10:44:20', '2022-06-08', '08109810401', 'jalan maju jaya no.8 bandung', 'Wanita', 'brosurNEW.jpg');
INSERT INTO `daftarmember` VALUES ('2', 'MB2022002', 'AniNur', 'aninur@gmail.com', '123', '2022-06-29 10:51:15', '2022-06-30', '08301801800', 'jalan no.6', 'laki-laki', '5-destinasi-bukit-teletubbies-di-indonesia-dari-ba');
INSERT INTO `daftarmember` VALUES ('3', 'MB2022003', 'Aditya', 'adit@gmail.com', '123', '2022-07-04 15:31:33', '2000-06-28', '23520920290', 'jalan merdekano.13 surabaya', 'laki-laki', 'bismillaah.jpg');

-- ----------------------------
-- Table structure for hakakses_menu
-- ----------------------------
DROP TABLE IF EXISTS `hakakses_menu`;
CREATE TABLE `hakakses_menu` (
  `id_hakakses` int(11) NOT NULL AUTO_INCREMENT,
  `idmenu` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_hakakses`),
  KEY `idmenu_fk` (`idmenu`),
  KEY `iduser_fk` (`iduser`),
  CONSTRAINT `idmenu_fk` FOREIGN KEY (`idmenu`) REFERENCES `mst_menu` (`idmenu`),
  CONSTRAINT `iduser_fk` FOREIGN KEY (`iduser`) REFERENCES `mst_userlogin` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of hakakses_menu
-- ----------------------------
INSERT INTO `hakakses_menu` VALUES ('1', '1', '1');
INSERT INTO `hakakses_menu` VALUES ('2', '2', '1');
INSERT INTO `hakakses_menu` VALUES ('3', '3', '1');
INSERT INTO `hakakses_menu` VALUES ('4', '1', '3');
INSERT INTO `hakakses_menu` VALUES ('5', '2', '3');
INSERT INTO `hakakses_menu` VALUES ('6', '3', '3');
INSERT INTO `hakakses_menu` VALUES ('7', '4', '3');
INSERT INTO `hakakses_menu` VALUES ('8', '5', '3');
INSERT INTO `hakakses_menu` VALUES ('9', '6', '3');
INSERT INTO `hakakses_menu` VALUES ('10', '7', '3');
INSERT INTO `hakakses_menu` VALUES ('11', '8', '3');
INSERT INTO `hakakses_menu` VALUES ('12', '3', '4');
INSERT INTO `hakakses_menu` VALUES ('13', '4', '4');
INSERT INTO `hakakses_menu` VALUES ('14', '5', '4');

-- ----------------------------
-- Table structure for kategoriproduk
-- ----------------------------
DROP TABLE IF EXISTS `kategoriproduk`;
CREATE TABLE `kategoriproduk` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `nmkategori` varchar(50) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategoriproduk
-- ----------------------------
INSERT INTO `kategoriproduk` VALUES ('1', 'Kaos');
INSERT INTO `kategoriproduk` VALUES ('2', 'Sweater');
INSERT INTO `kategoriproduk` VALUES ('3', 'Celana');

-- ----------------------------
-- Table structure for mst_menu
-- ----------------------------
DROP TABLE IF EXISTS `mst_menu`;
CREATE TABLE `mst_menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `kode_menu` varchar(8) NOT NULL,
  `nmmenu` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_menu
-- ----------------------------
INSERT INTO `mst_menu` VALUES ('1', 'M2022001', 'Kategori Produk', 'mod_kategoriproduk', '<i class=\"bi bi-boxes\"></i>');
INSERT INTO `mst_menu` VALUES ('2', 'M2022002', 'Produk', 'mod_produk', '<i class=\"bi bi-bag-check-fill\"></i>');
INSERT INTO `mst_menu` VALUES ('3', 'M2022003', 'Data Member', 'mod_member', '<i class=\"bi bi-person-bounding-box\"></i>');
INSERT INTO `mst_menu` VALUES ('4', 'M2022004', 'Data Transaksi', 'mod_transaksi', '<i class=\"bi bi-basket-fill\"></i>');
INSERT INTO `mst_menu` VALUES ('5', 'M2022005', 'Data UserLogin', 'mod_userlogin', '<i class=\"bi bi-person-workspace\"></i>');
INSERT INTO `mst_menu` VALUES ('6', 'M2022006', 'Data Menu', 'mod_menu', '<i class=\"bi bi-text-left\"></i>');
INSERT INTO `mst_menu` VALUES ('7', 'M2022007', 'Setting Hak Akses', 'mod_hakakses', '<i class=\"bi bi-person-check\"></i>');
INSERT INTO `mst_menu` VALUES ('8', 'M2022008', 'Modul Contoh', 'mod_contoh', '<i class=\"bi bi-patch-question-fill\"></i>');

-- ----------------------------
-- Table structure for mst_produk
-- ----------------------------
DROP TABLE IF EXISTS `mst_produk`;
CREATE TABLE `mst_produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `nmproduk` varchar(50) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` varchar(10) NOT NULL,
  PRIMARY KEY (`idproduk`),
  KEY `fk_id_kategori` (`idkategori`),
  CONSTRAINT `fk_id_kategori` FOREIGN KEY (`idkategori`) REFERENCES `kategoriproduk` (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_produk
-- ----------------------------
INSERT INTO `mst_produk` VALUES ('1', 'Sweater 001 - white', 'baju1.jpg', '2', '150000', '6', 'Baru', 'Sweatshirt saat ini merupakan salah satu lini pakaian terbaik dan berkualitas tinggi di antara Local Brand Indonesia. Dengan model loose-fit berlengan panjang tanpa tudung.', '110 Gram');
INSERT INTO `mst_produk` VALUES ('2', 'Basic Sweater Polos', 'baju2.jpg', '2', '100000', '10', 'Baru', 'Nyaman dipakai, Bisa Digunakan diberbagai Acara, trendy & cocok untuk semua gaya', '');
INSERT INTO `mst_produk` VALUES ('3', 'Sweater 003 ', 'baju4.jpg', '2', '200000', '20', 'Baru', 'weatshirt saat ini merupakan salah satu lini pakaian terbaik dan berkualitas tinggi di antara Local Brand Indonesia. Dengan model loose-fit berlengan panjang tanpa tudung.', '');
INSERT INTO `mst_produk` VALUES ('4', 'Kaos Remaja', 'baju3.jpg', '1', '100000', '20', 'Baru', 'kaos remaja putih,kaos remaja putih,kaos remaja putihkaos remaja putihkaos remaja putihkaos remaja putihkaos remaja putihkaos remaja putihkaos remaja putihkaos remaja putih', '200Gram');
INSERT INTO `mst_produk` VALUES ('5', 'Sweater Unisex 004', 'baju1.jpg', '2', '150000', '10', 'Baru', 'Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004Sweater Unisex 004', '200Gram');
INSERT INTO `mst_produk` VALUES ('6', 'Sweater Unisex 005', 'baju2.jpg', '2', '175000', '15', 'Baru', '		\r\nSweater Unisex 005\r\nSweater Unisex 005\r\n		Sweater Unisex 005\r\n		Sweater Unisex 005\r\n		Sweater Unisex 005\r\n', '250Gram');
INSERT INTO `mst_produk` VALUES ('7', 'Celana Cewek 001', 'celana1.jpg', '3', '125000', '17', 'Baru', 'Kualitas produk sangat baik produk ori Kualitas produk sangat baik produk ori Kualitas produk sangat baik produk ori Kualitas produk sangat baik produk ori ', '200Gram');

-- ----------------------------
-- Table structure for mst_userlogin
-- ----------------------------
DROP TABLE IF EXISTS `mst_userlogin`;
CREATE TABLE `mst_userlogin` (
  `iduser` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_userlogin
-- ----------------------------
INSERT INTO `mst_userlogin` VALUES ('1', 'mahasiswa', 'Calon Orang Sukses', '827ccb0eea8a706c4c34a16891f84e7b', '1');
INSERT INTO `mst_userlogin` VALUES ('3', 'admin', 'Abang Admin', '202cb962ac59075b964b07152d234b70', '1');
INSERT INTO `mst_userlogin` VALUES ('4', 'agung', 'Agung Cakep', 'd9b1d7db4cd6e70935368a1efb10e377', '1');

-- ----------------------------
-- Table structure for tst_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tst_penjualan`;
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
  `is_closed` enum('1','0') NOT NULL,
  PRIMARY KEY (`no_invoice`),
  KEY `fk_idproduk` (`idproduk`),
  KEY `fk_idmember` (`idmember`),
  CONSTRAINT `fk_idmember` FOREIGN KEY (`idmember`) REFERENCES `daftarmember` (`idmember`),
  CONSTRAINT `fk_idproduk` FOREIGN KEY (`idproduk`) REFERENCES `mst_produk` (`idproduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tst_penjualan
-- ----------------------------
INSERT INTO `tst_penjualan` VALUES ('INV-20220002', '1', '3', '3', '150000', '450000', '2022-07-04 15:39:30', '9713465eb94f3034f5fea9d96899e861.jpg', '1', '1');
INSERT INTO `tst_penjualan` VALUES ('INV-20220003', '2', '1', '2', '100000', '200000', '2022-07-04 15:42:39', 'bukti.jpg', '1', '1');
INSERT INTO `tst_penjualan` VALUES ('INV-20220004', '2', '2', '1', '100000', '100000', '2022-07-04 15:47:18', 'bukti.jpg', '1', '1');
INSERT INTO `tst_penjualan` VALUES ('INV-20220005', '1', '2', '1', '150000', '150000', '2022-07-04 19:03:50', '', '0', '0');
INSERT INTO `tst_penjualan` VALUES ('INV-20220006', '2', '1', '2', '100000', '200000', '2022-07-04 19:04:23', '', '0', '0');
INSERT INTO `tst_penjualan` VALUES ('INV-20220007', '7', '3', '3', '125000', '375000', '2022-07-06 08:23:35', '', '0', '0');

-- ----------------------------
-- Table structure for tst_request
-- ----------------------------
DROP TABLE IF EXISTS `tst_request`;
CREATE TABLE `tst_request` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_baru` varchar(100) NOT NULL,
  `date_request` date NOT NULL,
  PRIMARY KEY (`id_request`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tst_request
-- ----------------------------

-- ----------------------------
-- View structure for hakakses_view
-- ----------------------------
DROP VIEW IF EXISTS `hakakses_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `hakakses_view` AS SELECT
hm.id_hakakses, mu.iduser, mu.username, mm.idmenu, mm.nmmenu
FROM mst_userlogin mu INNER JOIN hakakses_menu hm ON mu.iduser=hm.iduser
INNER JOIN mst_menu mm ON mm.idmenu=hm.idmenu ;

-- ----------------------------
-- View structure for produkterlaris
-- ----------------------------
DROP VIEW IF EXISTS `produkterlaris`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `produkterlaris` AS SELECT
	a.idproduk,
	a.nmproduk,
	a.harga,
	a.gambar,
	sum(b.qty) AS jmljterjual
FROM
	mst_produk a
INNER JOIN tst_penjualan b ON b.idproduk = a.idproduk
GROUP BY
	a.nmproduk
ORDER BY
	jmljterjual DESC
LIMIT 6 ;
