-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 14.16
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
-- Database: `inova`
--

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `dosis` int(25) NOT NULL,
  `qty` int(50) NOT NULL,
  `indikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `dosis`, `qty`, `indikasi`) VALUES
('OBT0001', 'Panadol', 50, 5, 'UNTUK HAREENG'),
('OBT0002', 'Paramex', 10, 7, 'untuk panas tiriz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `keluhan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `keluhan`) VALUES
('PSN0001', 'Darva', 'Sakit kepala'),
('PSN0002', 'didin', 'janghed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` varchar(50) NOT NULL,
  `bentuk_tindakan` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `bentuk_tindakan`, `id_pasien`, `id_obat`) VALUES
('TND0001', 'pasien gejala hareeng', 'PSN0001', 'OBT0001'),
('TND0002', 'ada aja', 'PSN0002', 'OBT0002'),
('TND0003', 'dilarikan ke ugd', 'PSN0001', 'OBT0001');

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
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
