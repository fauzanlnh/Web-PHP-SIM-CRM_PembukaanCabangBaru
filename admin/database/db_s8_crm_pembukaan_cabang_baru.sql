-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 02:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_s8_crm_pembukaan_cabang_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `kritik_saran` text NOT NULL,
  `penanganan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik_saran`, `kritik_saran`, `penanganan`) VALUES
(1, 'Jika terdapat ketidaksesuaian antara\r\nstruk dan barang yang diterima', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`) VALUES
('PELANGGAN-0002', 'Paisal', ''),
('PELANGGAN-0004', 'Azizi', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga_jual`, `gambar`, `stok`, `deskripsi`) VALUES
('PRODUK-0001', 'tes', 't-shirt', 22000, '26072022171144myw3schoolsimage.jpg', 0, 'tes2');

-- --------------------------------------------------------

--
-- Table structure for table `spk_cabang_baru`
--

CREATE TABLE `spk_cabang_baru` (
  `id_spk_cabang_baru` varchar(15) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spk_cabang_baru`
--

INSERT INTO `spk_cabang_baru` (`id_spk_cabang_baru`, `tanggal`) VALUES
('SPK-0002', '2022-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `spk_cabang_baru_jawaban`
--

CREATE TABLE `spk_cabang_baru_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_spk_cabang_baru` varchar(15) DEFAULT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `luas_tanah` varchar(30) NOT NULL,
  `lks_dkt_pdk` varchar(30) NOT NULL,
  `lks_dkt_plg_lama` varchar(30) NOT NULL,
  `lks_dkt_cbg` varchar(30) NOT NULL,
  `lahan_parkir` varchar(30) NOT NULL,
  `harga_sewa` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spk_cabang_baru_jawaban`
--

INSERT INTO `spk_cabang_baru_jawaban` (`id_jawaban`, `id_spk_cabang_baru`, `nama_kota`, `alamat`, `luas_tanah`, `lks_dkt_pdk`, `lks_dkt_plg_lama`, `lks_dkt_cbg`, `lahan_parkir`, `harga_sewa`, `status`, `nilai`) VALUES
(1, 'SPK-0002', 'Bandung Selatan', 'tes', '1700', '1', '30', '9', '5', '140000000', 'Proses', '61.666666666667'),
(2, 'SPK-0002', 'Bandung Utara', 'Tes', '1200', '2', '40', '3', '3', '180000000', 'Proses', '66.666666666667'),
(3, 'SPK-0002', 'Bandung Barat', 'Tes', '1700', '3', '80', '8', '4', '80000000', 'Proses', '60'),
(4, 'SPK-0002', 'Bandung Timur', 'Tes', '2100', '2', '60', '2', '6', '160000000', 'Proses', '86.666666666667'),
(7, 'SPK-0002', 'edit2', 'tes2', '1232', '1232', '1232', '1232', '1232', '1232', 'Proses', '60');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tanggal_transaksi`, `subtotal`, `diskon`, `total_pembelian`) VALUES
('TRANSAKSI-0001', 'PELANGGAN-0002', '2022-07-29', 22000, 0, 22000),
('TRANSAKSI-0002', 'PELANGGAN-0002', '2022-07-29', 550000, 0, 550000),
('TRANSAKSI-0003', 'PELANGGAN-0002', '2022-07-29', 550000, 0, 550000),
('TRANSAKSI-0004', 'PELANGGAN-0002', '2022-07-29', 550000, 0, 550000),
('TRANSAKSI-0005', 'PELANGGAN-0002', '2022-07-29', 550000, 0, 550000),
('TRANSAKSI-0006', 'PELANGGAN-0002', '2022-07-29', 550000, 0, 550000),
('TRANSAKSI-0007', 'PELANGGAN-0002', '2022-07-29', 550000, 55000, 495000),
('TRANSAKSI-0008', 'PELANGGAN-0002', '2022-07-30', 264000, 0, 264000),
('TRANSAKSI-0009', 'PELANGGAN-0002', '2022-08-01', 550000, 0, 550000),
('TRANSAKSI-0010', 'PELANGGAN-0002', '2022-08-01', 550000, 0, 550000),
('TRANSAKSI-0011', 'PELANGGAN-0002', '2022-08-01', 550000, 0, 550000),
('TRANSAKSI-0012', 'PELANGGAN-0002', '2022-08-01', 550000, 0, 550000),
('TRANSAKSI-0013', 'PELANGGAN-0002', '2022-08-01', 550000, 0, 550000),
('TRANSAKSI-0015', 'PELANGGAN-0002', '2022-08-01', 550000, 55000, 495000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(15) DEFAULT NULL,
  `id_produk` varchar(15) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal_detail` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_produk`, `harga_produk`, `qty`, `subtotal_detail`, `status`) VALUES
(2, 'TRANSAKSI-0001', 'PRODUK-0001', 22000, 1, 22000, 'Checkout'),
(3, 'TRANSAKSI-0002', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(4, 'TRANSAKSI-0003', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(5, 'TRANSAKSI-0004', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(6, 'TRANSAKSI-0005', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(7, 'TRANSAKSI-0006', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(8, 'TRANSAKSI-0007', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(9, 'TRANSAKSI-0008', 'PRODUK-0001', 22000, 12, 264000, 'Checkout'),
(10, 'TRANSAKSI-0009', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(11, 'TRANSAKSI-0010', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(12, 'TRANSAKSI-0011', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(13, 'TRANSAKSI-0012', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(14, 'TRANSAKSI-0013', 'PRODUK-0001', 22000, 25, 550000, 'Checkout'),
(16, 'TRANSAKSI-0015', 'PRODUK-0001', 22000, 25, 550000, 'Checkout');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'superadmin', '$2y$10$PxTUo8xcnxgybdl7uUzqlujGatteP9qtqBpmkZw7cYvXfhj5.3EFm', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `spk_cabang_baru`
--
ALTER TABLE `spk_cabang_baru`
  ADD PRIMARY KEY (`id_spk_cabang_baru`);

--
-- Indexes for table `spk_cabang_baru_jawaban`
--
ALTER TABLE `spk_cabang_baru_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_spk_cabang_baru` (`id_spk_cabang_baru`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spk_cabang_baru_jawaban`
--
ALTER TABLE `spk_cabang_baru_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spk_cabang_baru_jawaban`
--
ALTER TABLE `spk_cabang_baru_jawaban`
  ADD CONSTRAINT `spk_cabang_baru_jawaban_ibfk_1` FOREIGN KEY (`id_spk_cabang_baru`) REFERENCES `spk_cabang_baru` (`id_spk_cabang_baru`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
