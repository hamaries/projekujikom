-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2025 pada 07.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aman`
--

CREATE TABLE `aman` (
  `no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aman`
--

INSERT INTO `aman` (`no`, `username`, `password`, `level`) VALUES
(6, 'user', 'user', 'admin'),
(7, 'ilham', 'ilham123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no` int(100) NOT NULL,
  `namapelanggan` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nomeja` varchar(10) NOT NULL,
  `pelayan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no`, `namapelanggan`, `tanggal`, `nomeja`, `pelayan`) VALUES
(35, 'ilham', '2025-04-19 05:09:45', 'meja 2', 'pelayan 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `no` int(5) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `namaproduk` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`no`, `idproduk`, `namaproduk`, `gambar`, `harga`, `stok`) VALUES
(39, '1', 'ayam goreng', 'ayam-goreng-lengkuas.jpg', 15000, 10),
(49, '2', 'nasi goreng', 'nasi goreng.jpg', 15000, 10),
(50, '3', 'ikan goreng', '2 heerlijke vis recepten; Bawal Goreng Kendari, Gule Ikan Bali.jpg', 25000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `no` int(50) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `no_meja` int(7) NOT NULL,
  `harga` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `kasir` varchar(15) NOT NULL,
  `namapelanggan` varchar(30) NOT NULL,
  `namaproduk` varchar(20) NOT NULL,
  `meja` int(6) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(15) NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `kasir`, `namapelanggan`, `namaproduk`, `meja`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
(23, 'Pelayan 1', 'ilham', 'nasi goreng', 0, 15000, 2, 30000, '2025-04-19'),
(28, 'pelayan 4', 'ilham', 'ayam goreng', 0, 15000, 2, 30000, '2025-04-19'),
(29, 'pelayan 4', 'ilham', 'ikan goreng', 0, 25000, 1, 25000, '2025-04-19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aman`
--
ALTER TABLE `aman`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aman`
--
ALTER TABLE `aman`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
