-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 03:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kursus`
--

CREATE TABLE `detail_kursus` (
  `id` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `nama_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kursus`
--

INSERT INTO `detail_kursus` (`id`, `id_kursus`, `nama_video`) VALUES
(1, 1, 'video_web_dev_1'),
(2, 1, 'video_web_dev_2'),
(3, 1, 'video_web_dev_3'),
(4, 5, 'python_django_1'),
(5, 5, 'python_django_2');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Web Programming'),
(2, 'IT & Perangkat Lunak'),
(3, 'Finansial & Akuntansi'),
(4, 'Game Development'),
(5, 'Mobile Development');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total_jam_belajar` decimal(10,0) DEFAULT NULL,
  `harga` decimal(10,0) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `id_kategori`, `id_pengguna`, `nama`, `total_jam_belajar`, `harga`, `rating`, `deskripsi`) VALUES
(1, 1, 1, 'The Web Developer Bootcamp 2023', '1000', '125000', '5.0', '10 Hours of React just added. Become a Developer With ONE course - HTML, CSS, JavaScript, React, Node, MongoDB and More!'),
(2, 1, 1, 'The Complete 2023 Web Development Bootcamp', '2500', '250000', '5.0', 'Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, MongoDB, Web3 and DApps'),
(3, 1, 3, 'The Complete Web Developer Course 3.0', '50', '100000', '5.0', 'Learn Web Development in 2023'),
(4, 2, 2, 'Vue - The Complete Guide (incl. Router & Composition API)', '20', '250000', '4.0', 'Vue.js is an awesome JavaScript Framework for building Frontend Applications! VueJS mixes the Best of Angular + React!'),
(5, 1, 9, 'Python and Django Full Stack Web Developer Bootcamp', '30', '549000', '4.0', 'Learn to build web with HTML, CSS, Bootstrap, JS, JQuery, Python 3, and Django.');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal_bayar` decimal(10,0) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pengguna`, `id_pemesanan`, `nominal_bayar`, `tanggal_bayar`) VALUES
(1, 2, 1, '200000', '2023-06-05'),
(2, 1, 1, '250000', '2023-06-05'),
(3, 2, 4, '100000', '2023-06-05'),
(4, 10, 4, '250000', '2023-06-05'),
(5, 1, 2, '250000', '2023-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_pengguna`, `id_kursus`, `total_harga`, `tanggal_pesan`) VALUES
(1, 1, 2, '250000', '2023-06-05'),
(2, 1, 2, '250000', '2023-06-05'),
(3, 1, 2, '250000', '2023-06-05'),
(4, 2, 3, '100000', '2023-06-05'),
(5, 10, 4, '250000', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `id_peran` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_login` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_peran`, `nama`, `email`, `password`, `is_login`) VALUES
(1, 1, 'Aulia El Ihza Fariz Rafiqi', 'auliaelihza@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(2, 2, 'Bobby Rafael Sembiring', 'bobby@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(3, 2, 'Affandra Fahrezi', 'affandra@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(4, 3, 'Bayu', 'bayu@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(5, 3, 'Danu Julnizar', 'danujulnizar@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(6, 3, 'Mario Teguh', 'marioteguh@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(7, 3, 'Amicia', 'amicia@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(8, 3, 'Hugo', 'hugo@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(9, 3, 'Ruslan Jamin', 'ruslanjamin@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0),
(10, 3, 'Yusuf Muffarij', 'yusufmuffarij@gmail.com', '$2y$10$uo/RKYDRAe5BmpmykvL2Sun7MQ3uRQ2dPZxi/4ST8hLjgRmgGwb2.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peran`
--

CREATE TABLE `peran` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peran`
--

INSERT INTO `peran` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kursus`
--
ALTER TABLE `detail_kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kursus` (`id_kursus`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_ibfk_1` (`id_peran`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kursus`
--
ALTER TABLE `detail_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `peran`
--
ALTER TABLE `peran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kursus`
--
ALTER TABLE `detail_kursus`
  ADD CONSTRAINT `detail_kursus_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kursus_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_peran`) REFERENCES `peran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
