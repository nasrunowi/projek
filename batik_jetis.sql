-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 11:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik_jetis`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `sumber_artikel` text NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_admin`, `judul_artikel`, `isi_artikel`, `sumber_artikel`, `gambar_artikel`) VALUES
(14, 4, ' Motif ini terdiri dari pola diagonal yang terputus-putus. Parang Rusak melambangkan kerendahan hati dan kelemahan manusia.', 'Batik Indonesia adalah seni tekstil yang unik dan kaya akan nilai budaya. Keindahan batik terletak pada desain motif yang rumit, warna-warna yang mencolok, dan kerajinan tangan yang teliti. Setiap motif batik memiliki makna dan cerita yang terkait dengan budaya dan tradisi Indonesia.\r\n\r\nBatik Indonesia diakui sebagai Warisan Budaya Tak Benda oleh UNESCO sejak tahun 2009. Pengakuan ini menegaskan pentingnya batik sebagai simbol identitas dan kekayaan budaya Indonesia. Batik tidak hanya menjadi pakaian tradisional, tetapi juga digunakan dalam berbagai kesempatan formal maupun kasual.', 'https://youtu.be/1LWKIw7VZGY', '6480e84914299.jpg'),
(15, 3, 'Revitalisasi Batik sebagai Warisan Budaya: Upaya Pelestarian dan Pengembangan', 'Revitalisasi batik sebagai warisan budaya merupakan suatu upaya yang dilakukan untuk melestarikan dan mengembangkan seni batik Indonesia. Meskipun batik memiliki nilai budaya yang tinggi, namun pada beberapa periode tertentu, seni batik mengalami penurunan minat dan penurunan jumlah pengrajin batik yang terampil.\r\n\r\nUpaya pelestarian dan pengembangan batik dilakukan melalui beberapa langkah, antara lain:', 'https://youtu.be/j3C2r-mNj5g', '6480e8936f288.jpg'),
(16, 4, 'Inovasi dalam Desain Batik: Membawa Tradisi ke Era Modern', 'Inovasi dalam desain batik adalah upaya untuk memperbarui dan menghidupkan kembali tradisi batik dengan sentuhan kontemporer. Melalui kombinasi antara elemen tradisional batik dengan elemen desain modern, batik menjadi lebih relevan dan menarik bagi generasi muda serta pasar internasional yang lebih luas.', 'https://youtu.be/uUzBXKNp3sY', '6480e8e027066.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `batik`
--

CREATE TABLE `batik` (
  `id_batik` int(11) NOT NULL,
  `id_pengrajin` int(11) NOT NULL,
  `nama_batik` varchar(255) NOT NULL,
  `info_batik` text NOT NULL,
  `gambar_batik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batik`
--

INSERT INTO `batik` (`id_batik`, `id_pengrajin`, `nama_batik`, `info_batik`, `gambar_batik`) VALUES
(20, 50, 'Batik Parang', 'Motif ini terkenal karena pola diagonalnya yang berulang-ulang. Parang memiliki makna \"pedang\" dalam bahasa Jawa dan sering kali dikaitkan dengan keberanian dan kekuatan.', '6480e628b9513.jpeg'),
(21, 51, 'Batik Mega Mendung', 'Batik ini berasal dari daerah Cirebon, Jawa Barat. Motifnya menggambarkan awan yang saling berjajar, dan menggambarkan pesan tentang kebesaran dan kekuatan.', '6480e7387e9ab.jpeg'),
(22, 48, 'Batik Kawung', 'Motif ini memiliki bentuk lingkaran yang saling berdempetan. Kawung melambangkan kelengkapan dan kesempurnaan.', '6480e7612b25d.jpeg'),
(23, 49, 'Batik Parang Rusak', ' Motif ini terdiri dari pola diagonal yang terputus-putus. Parang Rusak melambangkan kerendahan hati dan kelemahan manusia.', '6480e78290bb0.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengrajin`
--

CREATE TABLE `pengrajin` (
  `id_pengrajin` int(11) NOT NULL,
  `nama_pengrajin` varchar(255) NOT NULL,
  `alamat_pengrajin` varchar(255) NOT NULL,
  `no_telp_pengrajin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengrajin`
--

INSERT INTO `pengrajin` (`id_pengrajin`, `nama_pengrajin`, `alamat_pengrajin`, `no_telp_pengrajin`) VALUES
(48, 'Ibu Anindiya', 'Sidoarjo', '085748938005'),
(49, 'Bapak Nashrun', 'Sidoarjo', '085607208885'),
(50, 'Ibu Nayok', 'Candi', '085807209898'),
(51, 'Bapak Taufiq', 'Surabaya', '0831051975680');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_pengunjung` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `waktu_kunjungan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_user`, `jumlah_pengunjung`, `tanggal_kunjungan`, `waktu_kunjungan`) VALUES
(18, 18, 2, '2023-06-15', '09:37:00'),
(19, 19, 2, '2023-06-27', '05:38:00'),
(20, 20, 9, '2023-06-16', '07:59:00'),
(21, 21, 6, '2023-06-30', '12:12:00'),
(22, 22, 6, '2023-06-19', '03:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `username`, `pw`) VALUES
(3, 'nashrunowi', 'owijelek\r\n'),
(4, 'anindiya', 'anindd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `no_telp`) VALUES
(18, 'Anindiya Syavira Utami', 'anind@gmail.com', '085607208885'),
(19, 'Muhammad Nashrun Qowiyyu Arsyad', 'nasrunowi@gmail.com', '085607208885'),
(20, 'Nabiel Asytar Awaludin', 'devan08@gmail.com', '087558589875'),
(21, 'Nerys Aurelia', 'nerys07@gmail.com', '085863361515'),
(22, 'Tiyo Kusuma Chandra', 'tiyo123@gmail.com', '098765432');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `fk_artikel` (`id_admin`);

--
-- Indexes for table `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`id_batik`),
  ADD KEY `fk_batik` (`id_pengrajin`);

--
-- Indexes for table `pengrajin`
--
ALTER TABLE `pengrajin`
  ADD PRIMARY KEY (`id_pengrajin`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `fk_reservasi` (`id_user`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `batik`
--
ALTER TABLE `batik`
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengrajin`
--
ALTER TABLE `pengrajin`
  MODIFY `id_pengrajin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel` FOREIGN KEY (`id_admin`) REFERENCES `tabel_admin` (`id_admin`);

--
-- Constraints for table `batik`
--
ALTER TABLE `batik`
  ADD CONSTRAINT `fk_batik` FOREIGN KEY (`id_pengrajin`) REFERENCES `pengrajin` (`id_pengrajin`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
