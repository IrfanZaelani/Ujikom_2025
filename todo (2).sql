-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2025 pada 11.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('selesai','belum selesai') NOT NULL,
  `prioritas` enum('penting','tidak penting') NOT NULL,
  `deadline` date NOT NULL,
  `dibuat_tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `judul`, `deskripsi`, `status`, `prioritas`, `deadline`, `dibuat_tgl`) VALUES
(25, 'ujikom', 'ngoding sampe meninggal', 'selesai', 'penting', '2025-02-24', '2025-02-20 07:09:07'),
(26, 'adD', 'DDDDD', 'selesai', 'penting', '2025-02-22', '2025-02-20 07:09:16'),
(28, 'C', 'C', 'selesai', 'penting', '2025-02-14', '2025-02-20 13:20:41'),
(29, '33adaw', 'qweqwe', 'selesai', 'tidak penting', '2025-02-28', '2025-02-20 13:35:37'),
(30, 'asd', 'asd', 'selesai', 'penting', '2025-02-18', '2025-02-20 13:35:26'),
(31, 'asds', 'ada', 'selesai', 'penting', '2025-02-28', '2025-04-13 09:32:55'),
(32, 'sahur', 'sahur', 'belum selesai', 'penting', '2025-05-01', '2025-04-12 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no.hp` int(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `no.hp`, `alamat`, `role`) VALUES
(6, 'admin', '$2y$10$WdqhHExzEFY.X7qZcB5mZuRlborWp37iZmZ1/Bojfe8ls4I.1rSc6', 'admin@gmail.com', 104000, 'rancabali', 'admin'),
(7, 'user', '$2y$10$VtQ5bCPbICVbUddRA8cvguAByn5WBJhcpUgDzFWQivVOTVWtPGdmO', 'user@gmail.com', 89545, '12323', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
