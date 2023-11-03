-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 02:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produk`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` varchar(255) NOT NULL,
  `gambarNama` varchar(255) NOT NULL,
  `gambarPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `gambarNama`, `gambarPath`) VALUES
('650d1b1f2e13f687245730', 'Screenshot 2023-08-06 133527.png', 'C:/xampp/htdocs/image/Screenshot 2023-08-06 133527.png'),
('650d48be074e5864183032', '66d6ba51a0d95fd32a291b65723fc326.png', 'C:/xampp/htdocs/image/66d6ba51a0d95fd32a291b65723fc326.png'),
('650d56d147be71674769022', 'skeakweka.png', 'C:/xampp/htdocs/image/skeakweka.png'),
('650d570cf22c9752598322', 'ITZY-Lia-for-ELLE-Korea-April-2023-Issue-documents-8.jpeg', 'C:/xampp/htdocs/image/ITZY-Lia-for-ELLE-Korea-April-2023-Issue-documents-8.jpeg'),
('650d575760a27392598968', 'Flag_of_the_Netherlands.png', 'C:/xampp/htdocs/image/Flag_of_the_Netherlands.png'),
('650d578bbee57377878052', 'Bybit-logo23.png', 'C:/xampp/htdocs/image/Bybit-logo23.png'),
('650d584f8db291811867620', 'redbull-logo-png-transparent.png', 'C:/xampp/htdocs/image/redbull-logo-png-transparent.png'),
('6538fb3849b40843677711', 'indomie-instant-fried-80g-270x270.jpg', 'C:/xampp/htdocs/image/indomie-instant-fried-80g-270x270.jpg'),
('653fb2db7b21a1176868609', 'rendang.jpg', 'C:/xampp/htdocs/image/rendang.jpg'),
('653fcadc7dd8b925132216', 'rendang.jpg', 'C:/xampp/htdocs/image/rendang.jpg'),
('653fcda983c17333770377', 'b96c999bbe999e62aed82e98ea4592dd.jpg', 'C:/xampp/htdocs/image/b96c999bbe999e62aed82e98ea4592dd.jpg'),
('653fce19f1ded1994220112', 'bc4dfa2b-5426-46f1-9eb8-533d84ee3110.jpg', 'C:/xampp/htdocs/image/bc4dfa2b-5426-46f1-9eb8-533d84ee3110.jpg'),
('653fd3d6f0d6f157105660', 'Products_471003_image_B420_41124143.jpg', 'C:/xampp/htdocs/image/Products_471003_image_B420_41124143.jpg'),
('653fd41ccefa41583404130', '3646db58cd8539c25b6110bbab95198f.jpg', 'C:/xampp/htdocs/image/3646db58cd8539c25b6110bbab95198f.jpg'),
('653fd490d95a61884396959', '71160237_7c015adf-acf6-4705-a5de-2a78598b94db_500_500.jpg', 'C:/xampp/htdocs/image/71160237_7c015adf-acf6-4705-a5de-2a78598b94db_500_500.jpg'),
('653fd4cf55ed964869045', 'apotek_online_k24klik_20200810091603359225_ULTRA-MILK-COKELAT.jpg', 'C:/xampp/htdocs/image/apotek_online_k24klik_20200810091603359225_ULTRA-MILK-COKELAT.jpg'),
('653fd51c46bfb82624845', 'id-11134201-7qul0-lfkib0r5p0jl68.jpg', 'C:/xampp/htdocs/image/id-11134201-7qul0-lfkib0r5p0jl68.jpg'),
('653fd59e641a718342991', 'ULTRA-MILK-FULL-CREAM-250-ML-1.jpg', 'C:/xampp/htdocs/image/ULTRA-MILK-FULL-CREAM-250-ML-1.jpg'),
('653fd63f1ffc41986950730', 'fad361dc2906186607b014f6e5772882.jpg', 'C:/xampp/htdocs/image/fad361dc2906186607b014f6e5772882.jpg'),
('653fd72353e80933695179', 'ed56371bb6d9be01e911d8b1fdab85e0.jpg', 'C:/xampp/htdocs/image/ed56371bb6d9be01e911d8b1fdab85e0.jpg'),
('653fd76d4acc6772543452', 'Mie-Indomie-Soto-Mie.jpg', 'C:/xampp/htdocs/image/Mie-Indomie-Soto-Mie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(10) NOT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  `id_produk` int(10) NOT NULL,
  `id_gambar` varchar(255) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(20) DEFAULT NULL,
  `aktifasi` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_jual`, `harga`, `id_produk`, `id_gambar`, `tgl_update`, `user_update`, `aktifasi`) VALUES
(4, 6000.00, 23, '6538fb3849b40843677711', '2023-10-30', '123', 1),
(6, 6000.00, 25, '653fcadc7dd8b925132216', '2023-10-30', '123', 1),
(7, 6000.00, 26, '653fcda983c17333770377', '2023-10-30', '123', 1),
(8, 6000.00, 27, '653fce19f1ded1994220112', '2023-10-30', '123', 1),
(9, 3000.00, 28, '653fd3d6f0d6f157105660', '2023-10-30', '123', 1),
(10, 4000.00, 29, '653fd41ccefa41583404130', '2023-10-30', '123', 1),
(11, 6000.00, 30, '653fd490d95a61884396959', '2023-10-30', '123', 1),
(12, 7000.00, 31, '653fd4cf55ed964869045', '2023-10-30', '123', 1),
(13, 7000.00, 32, '653fd51c46bfb82624845', '2023-10-30', '123', 1),
(14, 7000.00, 33, '653fd59e641a718342991', '2023-10-30', '123', 1),
(15, 3000.00, 34, '653fd63f1ffc41986950730', '2023-10-30', '123', 1),
(16, 4000.00, 35, '653fd72353e80933695179', '2023-10-30', '123', 1),
(17, 6000.00, 36, '653fd76d4acc6772543452', '2023-10-30', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `id_gambar` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_input` int(20) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` int(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `id_gambar`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
(23, 'Indomie Goreng', 'Mie', '6538fb3849b40843677711', '2023-10-25', 123, NULL, NULL, 2),
(25, 'Indomie Rendang', 'Mie', '653fcadc7dd8b925132216', '2023-10-30', 123, NULL, NULL, 2),
(26, 'Indomie Kari Ayam', 'Mie', '653fcda983c17333770377', '2023-10-30', 123, NULL, NULL, 2),
(27, 'Indomie Goreng Aceh', 'Mie', '653fce19f1ded1994220112', '2023-10-30', 123, NULL, NULL, 2),
(28, 'Air Botol Vit (Sedang)', 'Minuman', '653fd3d6f0d6f157105660', '2023-10-30', 123, NULL, NULL, 2),
(29, 'Floradina Jeruk', 'Minuman', '653fd41ccefa41583404130', '2023-10-30', 123, NULL, NULL, 2),
(30, 'Fruit Tea Blackcurrant', 'Minuman', '653fd490d95a61884396959', '2023-10-30', 123, NULL, NULL, 2),
(31, 'Ultra Milk Coklat (250ml)', 'Minuman', '653fd4cf55ed964869045', '2023-10-30', 123, NULL, NULL, 2),
(32, 'Ultra Milk Caramel (250ml)', 'Minuman', '653fd51c46bfb82624845', '2023-10-30', 123, NULL, NULL, 2),
(33, 'Ultra Milk Full Cream (250ml)', 'Minuman', '653fd59e641a718342991', '2023-10-30', 123, NULL, NULL, 2),
(34, 'Yakult', 'Minuman', '653fd63f1ffc41986950730', '2023-10-30', 123, NULL, NULL, 2),
(35, 'Teh Pucuk', 'Minuman', '653fd72353e80933695179', '2023-10-30', 123, NULL, NULL, 2),
(36, 'Indomie Soto', 'Mie', '653fd76d4acc6772543452', '2023-10-30', 123, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `hak_akses`) VALUES
(2, 'test', '$2y$10$wruF0uRKt6QfT1pbvBBEruIEeScIWqtECSfc5ysWPttJ4E710RWWy', '123', '123123@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_gambar` (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `gambar` (`id_gambar`),
  ADD CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`id_gambar`) REFERENCES `gambar` (`id_gambar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
