-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 06.12
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earchive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `rec_id` int(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `tempat_lahir_admin` varchar(25) NOT NULL,
  `tanggal_lahir_admin` date NOT NULL,
  `jenis_kelamin_admin` varchar(10) NOT NULL,
  `no_telp_admin` varchar(15) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `status_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`rec_id`, `id_admin`, `nama_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `jenis_kelamin_admin`, `no_telp_admin`, `email_admin`, `status_admin`) VALUES
(1, 'A-22040001', 'Admin 1', 'Jakarta', '1997-04-22', 'Laki-Laki', '088267737465', 'admin1@gmail.com', 'Aktif'),
(2, 'A-22040002', 'Admin 2 ccc', 'Tangerang', '1995-03-22', 'Perempuan', '081378893674', 'admin2@gmail.com', 'Aktif'),
(3, 'A-22040003', 'Admin 3', 'Bandung', '1998-01-18', 'Laki-Laki', '088267111488', 'admin3@gmail.com', 'Aktif'),
(4, 'A-22060004', 'Alin', 'Tangerang', '1997-07-16', 'Laki-Laki', '08137787645', 'alin@gmail.com', 'Aktif'),
(5, 'A-22060005', 'Nida', 'Cirebon', '1998-09-20', 'Perempuan', '09877654454', 'nida@gmail.com', 'Aktif'),
(6, 'A-22060006', 'Nida Fitrillah', 'Cirebon', '1998-08-31', 'Perempuan', '081299786654', 'nida@gmail.com', 'Aktif'),
(7, 'A-22070007', 'AA', 'kasur', '2022-07-17', 'Laki-Laki', '9797987987', 'freees', 'Aktif'),
(8, 'A-22070008', 'Indah', 'Ciputat', '2022-07-18', 'Perempuan', '08123456789', 'indah@gmail.com', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
