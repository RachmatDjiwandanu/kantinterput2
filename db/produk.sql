-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 05:32 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gambar` (`id_gambar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

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
