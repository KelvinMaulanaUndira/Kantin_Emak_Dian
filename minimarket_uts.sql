-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2026 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimarket_uts`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `laporan_penjualan` ()   BEGIN
    SELECT 
        t.id_transaksi,
        c.nama_customer,
        t.tanggal,
        t.total
    FROM transaksi t
    JOIN customer c ON t.id_customer = c.id_customer
    ORDER BY t.tanggal DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(1, 'Andi Saputra', 'L', 'Jakarta', '081234567890'),
(2, 'Siti Rahma', 'P', 'Bekasi', '081298765432'),
(3, 'Budi Santoso', 'L', 'Depok', '081377788899'),
(4, 'Dewi Lestari', 'P', 'Bogor', '081355566677'),
(5, 'Rina Marlina', 'P', 'Tangerang', '081344455566');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `qty`, `subtotal`) VALUES
(1, 1, 1, 2, 7000),
(2, 1, 2, 4, 16000),
(3, 2, 5, 1, 12000),
(4, 2, 6, 1, 5000),
(5, 3, 3, 1, 75000),
(6, 3, 8, 1, 18000),
(7, 4, 4, 2, 10000),
(8, 4, 10, 1, 10000),
(9, 5, 7, 1, 15000),
(10, 5, 5, 1, 12000),
(11, 5, 2, 1, 4000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `trg_update_stok` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
    UPDATE produk
    SET stok = stok - NEW.qty
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fakta_penjualan`
--

CREATE TABLE `fakta_penjualan` (
  `id_fakta` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `total_penjualan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakta_penjualan`
--

INSERT INTO `fakta_penjualan` (`id_fakta`, `tanggal`, `id_produk`, `jumlah_terjual`, `total_penjualan`) VALUES
(1, '2026-05-01', 1, 2, 7000),
(2, '2026-05-01', 2, 4, 16000),
(3, '2026-05-01', 5, 1, 12000),
(4, '2026-05-01', 6, 1, 5000),
(5, '2026-05-02', 3, 1, 75000),
(6, '2026-05-02', 4, 2, 10000),
(7, '2026-05-02', 8, 1, 18000),
(8, '2026-05-02', 10, 1, 10000),
(9, '2026-05-03', 2, 1, 4000),
(10, '2026-05-03', 5, 1, 12000),
(11, '2026-05-03', 7, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Kebutuhan Rumah'),
(4, 'Snack'),
(5, 'Perawatan Tubuh');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `stok`) VALUES
(1, 'Indomie Goreng', 1, 3500, 100),
(2, 'Aqua 600ml', 2, 4000, 120),
(3, 'Beras 5Kg', 1, 75000, 40),
(4, 'Sabun Lifebuoy', 5, 5000, 80),
(5, 'Chitato', 4, 12000, 60),
(6, 'Teh Botol', 2, 5000, 90),
(7, 'Pepsodent', 5, 15000, 50),
(8, 'Gula Pasir 1Kg', 1, 18000, 70),
(9, 'Sapu Lantai', 3, 25000, 20),
(10, 'Tissue Paseo', 3, 10000, 75);

-- --------------------------------------------------------

--
-- Stand-in structure for view `produk_terlaris`
-- (See below for the actual view)
--
CREATE TABLE `produk_terlaris` (
`nama_produk` varchar(100)
,`total_terjual` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_customer`, `total`) VALUES
(1, '2026-05-01 10:00:00', 1, 23000),
(2, '2026-05-01 11:30:00', 2, 17000),
(3, '2026-05-02 09:15:00', 3, 90000),
(4, '2026-05-02 14:20:00', 4, 20000),
(5, '2026-05-03 16:00:00', 5, 30000);

-- --------------------------------------------------------

--
-- Structure for view `produk_terlaris`
--
DROP TABLE IF EXISTS `produk_terlaris`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produk_terlaris`  AS SELECT `p`.`nama_produk` AS `nama_produk`, sum(`dt`.`qty`) AS `total_terjual` FROM (`detail_transaksi` `dt` join `produk` `p` on(`dt`.`id_produk` = `p`.`id_produk`)) GROUP BY `p`.`nama_produk` ORDER BY sum(`dt`.`qty`) DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `fakta_penjualan`
--
ALTER TABLE `fakta_penjualan`
  ADD PRIMARY KEY (`id_fakta`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `idx_nama_produk` (`nama_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `idx_tanggal_transaksi` (`tanggal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fakta_penjualan`
--
ALTER TABLE `fakta_penjualan`
  MODIFY `id_fakta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
