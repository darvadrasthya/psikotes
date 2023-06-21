-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 12.27
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(50) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_masakan` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `status_detail_order` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `harga`, `qty`, `status_detail_order`) VALUES
(13, '', 'MSK0001', '20000', '2', '0'),
(16, '', 'MSK0003', '10000', '2', '0'),
(17, '', 'MSK0010', '7000', '1', '0'),
(18, '', 'MSK0008', '9000', '2', '0'),
(20, '', 'MSK0009', '1000', '1', '0'),
(21, '', 'MSK0001', '20000', '4', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` varchar(50) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('LVL0001', 'admin'),
('LVL0002', 'user'),
('LVL0003', 'waiter'),
('LVL0004', 'owner'),
('LVL0005', 'kasir'),
('LVL0006', 'op warnet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` varchar(50) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `status_masakan` enum('ready','sold') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`) VALUES
('MSK0001', 'spageti', '20000', 'ready'),
('MSK0002', 'burger', '20000', 'ready'),
('MSK0003', 'ayam', '10000', 'ready'),
('MSK0004', 'roti buaya', '100000', 'sold'),
('MSK0005', 'aseton', '80000', 'ready'),
('MSK0006', 'gulai', '25000', 'ready'),
('MSK0007', 'rendang', '7000', 'ready'),
('MSK0008', 'pakcoy', '9000', 'ready'),
('MSK0009', 'opor', '1000', 'ready'),
('MSK0010', 'sop kambing', '7000', 'ready'),
('MSK0011', 'sop iga', '1000', 'ready'),
('MSK0012', 'bakwan', '8000', 'ready'),
('MSK0013', 'apawe', '90000', 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(50) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`) VALUES
('ORD0001', 'M03', '2020-12-31', 'USR0001'),
('ORD0002', 'M02', '2020-12-31', 'USR0002'),
('ORD0003', 'M01', '2020-03-19', 'USR0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`, `nama_user`, `create_date`, `update_date`) VALUES
('USR0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'LVL0001', 'admin', '2020-02-19 04:28:43', '2020-02-19 04:28:43'),
('USR0002', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'LVL0002', 'user', '2020-02-07 04:47:44', '2020-02-07 04:47:44'),
('USR0003', 'waiter', 'f64cff138020a2060a9817272f563b3c', 'LVL0003', 'waiter', '2020-02-07 04:48:14', '2020-02-07 04:48:14'),
('USR0004', 'owner', '72122ce96bfec66e2396d2e25225d70a', 'LVL0004', 'owner', '2020-02-07 04:48:29', '2020-02-07 04:48:29'),
('USR0005', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'LVL0005', 'kasir', '2020-02-19 07:56:06', '2020-02-19 07:56:06'),
('USR0006', 'darpe', 'd4288ada42cacbf06a7ba80364ae8138', 'LVL0003', 'dede', '2020-02-22 09:28:56', '2020-02-22 09:28:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
