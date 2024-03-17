-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 09.28
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
-- Database: `db_pemberkasan`
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
  `email_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`rec_id`, `id_admin`, `nama_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `jenis_kelamin_admin`, `no_telp_admin`, `email_admin`) VALUES
(1, 'A-22040001', 'Admin 1', 'Jakarta', '1997-04-22', 'Laki-Laki', '088267737465', 'admin1@gmail.com'),
(2, 'A-22040002', 'Admin 2', 'Tangerang', '1995-03-22', 'Perempuan', '081378893674', 'admin2@gmail.com'),
(3, 'A-22040003', 'Admin 3', 'Bandung', '1998-01-18', 'Laki-Laki', '088267111488', 'admin3@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_dokumen`
--

CREATE TABLE `berkas_dokumen` (
  `rec_id` int(10) NOT NULL,
  `kode_berkas_dokumen` varchar(10) NOT NULL,
  `nomor_berkas_dokumen` varchar(10) NOT NULL,
  `nama_berkas_dokumen` varchar(25) NOT NULL,
  `tanggal_berkas_dokumen` date NOT NULL,
  `kode_proyek` varchar(10) NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `kode_map` varchar(10) NOT NULL,
  `status_berkas_dokumen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_berkas`
--

CREATE TABLE `catatan_berkas` (
  `rec_id` int(10) NOT NULL,
  `kode_catatan_berkas` varchar(10) NOT NULL,
  `jenis_aksi` varchar(15) NOT NULL,
  `id_pengirim` varchar(10) NOT NULL,
  `id_penerima` varchar(10) NOT NULL,
  `tanggal_catatan_berkas` date NOT NULL,
  `nomor_catatan_berkas` varchar(10) NOT NULL,
  `nama_catatan_berkas` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `rec_id` int(10) NOT NULL,
  `kode_dokumen` varchar(10) NOT NULL,
  `jenis_dokumen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`rec_id`, `kode_dokumen`, `jenis_dokumen`) VALUES
(2, 'D001', 'Publik'),
(4, 'D002', 'Private');

-- --------------------------------------------------------

--
-- Struktur dari tabel `map`
--

CREATE TABLE `map` (
  `rec_id` int(10) NOT NULL,
  `kode_map` varchar(10) NOT NULL,
  `nama_map` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `map`
--

INSERT INTO `map` (`rec_id`, `kode_map`, `nama_map`) VALUES
(1, 'M001', 'Map Buku'),
(2, 'M002', 'Map SK0090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `rec_id` int(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `tempat_lahir_pegawai` varchar(25) NOT NULL,
  `tanggal_lahir_pegawai` date NOT NULL,
  `jenis_kelamin_pegawai` varchar(10) NOT NULL,
  `no_telp_pegawai` varchar(15) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`rec_id`, `id_pegawai`, `nama_pegawai`, `tempat_lahir_pegawai`, `tanggal_lahir_pegawai`, `jenis_kelamin_pegawai`, `no_telp_pegawai`, `email_pegawai`) VALUES
(1, 'P-22040001', 'Hamzah Aji Pratama', 'Jakarta', '1999-08-20', 'Laki-Laki', '088278837483', 'hamzah@gmail.com'),
(2, 'P-22040002', 'Andi Wardana Febrianto', 'Ngawi', '1999-02-05', 'Laki-Laki', '08137884767', 'andi@gmail.com'),
(3, 'P-22040003', 'Nida Khaerunisa', 'Sleman', '1999-04-20', 'Perempuan', '08829273839', 'nida@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(10) NOT NULL,
  `kode_proyek` varchar(10) NOT NULL,
  `nama_proyek` varchar(25) NOT NULL,
  `tanggal_proyek` date NOT NULL,
  `lokasi_proyek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `kode_proyek`, `nama_proyek`, `tanggal_proyek`, `lokasi_proyek`) VALUES
(1, 'P001', 'Perumahan Sarua Indah', '2018-09-20', 'Sarua Indah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `rec_id` int(10) NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `nama_rak` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`rec_id`, `kode_rak`, `nama_rak`) VALUES
(3, 'R002', 'Data Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `rec_id` int(10) NOT NULL,
  `id_superadmin` varchar(10) NOT NULL,
  `nama_superadmin` varchar(25) NOT NULL,
  `tempat_lahir_superadmin` varchar(25) NOT NULL,
  `tanggal_lahir_superadmin` date NOT NULL,
  `jenis_kelamin_superadmin` varchar(10) NOT NULL,
  `no_telp_superadmin` varchar(15) NOT NULL,
  `email_superadmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`rec_id`, `id_superadmin`, `nama_superadmin`, `tempat_lahir_superadmin`, `tanggal_lahir_superadmin`, `jenis_kelamin_superadmin`, `no_telp_superadmin`, `email_superadmin`) VALUES
(1, 'S-22040001', 'Super Admin 1', 'Yogyakarta', '1987-04-12', 'Laki-Laki', '081378847374', 'superadmin1@gmail.com'),
(2, 'S-22040002', 'Super Admin 2', 'Jakarta', '1985-04-13', 'Laki-Laki', '088283748372', 'superadmin2@gmail.com'),
(3, 'S-22040003', 'Super Admin 3', 'Semarang', '1990-04-12', 'Perempuan', '08876678347', 'superadmin3@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_tanda_terima`
--

CREATE TABLE `surat_tanda_terima` (
  `rec_id` int(10) NOT NULL,
  `kode_surat_tanda_terima` varchar(10) NOT NULL,
  `id_pengirim` varchar(10) NOT NULL,
  `id_penerima` varchar(10) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `rec_id` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_group` varchar(12) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`rec_id`, `id_user`, `username`, `password`, `user_group`, `active`) VALUES
(1, 'A-22040001', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin', 0),
(2, 'A-22040002', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Admin', 0),
(3, 'A-22040003', 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'Admin', 0),
(4, 'S-22040001', 'super1', '727dfbdc1a4ee249f3f08c247a5669d5', 'Super Admin', 0),
(5, 'S-22040002', 'super2', '94efeff594eba1241014e55bd8c5c283', 'Super Admin', 0),
(6, 'S-22040003', 'super3', '85511dc944c3765338deb0b3ad38e907', 'Super Admin', 0),
(7, 'P-22040001', 'hamzah', 'd7fa34a9a47ee0f5fd620de7a326ef4a', 'Pegawai', 0),
(8, 'P-22040002', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'Pegawai', 0),
(9, 'P-22040003', 'nida', 'adabc01da00037ad00b5158521a75d5f', 'Pegawai', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_s_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_s_user` (
`rec_id` int(11)
,`id_user` varchar(10)
,`username` varchar(15)
,`password` varchar(100)
,`nama_superadmin` varchar(25)
,`no_telp_superadmin` varchar(15)
,`user_group` varchar(12)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_s_user`
--
DROP TABLE IF EXISTS `v_s_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_s_user`  AS SELECT `user`.`rec_id` AS `rec_id`, `user`.`id_user` AS `id_user`, `user`.`username` AS `username`, `user`.`password` AS `password`, `super_admin`.`nama_superadmin` AS `nama_superadmin`, `super_admin`.`no_telp_superadmin` AS `no_telp_superadmin`, `user`.`user_group` AS `user_group` FROM (`user` left join `super_admin` on(`user`.`id_user` = `super_admin`.`id_superadmin`)) WHERE `user`.`user_group` = 'Super Admin' ;

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
-- Indeks untuk tabel `berkas_dokumen`
--
ALTER TABLE `berkas_dokumen`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_berkas_dokumen` (`kode_berkas_dokumen`);

--
-- Indeks untuk tabel `catatan_berkas`
--
ALTER TABLE `catatan_berkas`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_catatan_berkas` (`kode_catatan_berkas`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_dokumen` (`kode_dokumen`);

--
-- Indeks untuk tabel `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_map` (`kode_map`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD UNIQUE KEY `kode_proyek` (`kode_proyek`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_rak` (`kode_rak`);

--
-- Indeks untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `id_superadmin` (`id_superadmin`);

--
-- Indeks untuk tabel `surat_tanda_terima`
--
ALTER TABLE `surat_tanda_terima`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `kode_surat_tanda_terima` (`kode_surat_tanda_terima`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berkas_dokumen`
--
ALTER TABLE `berkas_dokumen`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `catatan_berkas`
--
ALTER TABLE `catatan_berkas`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `map`
--
ALTER TABLE `map`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_tanda_terima`
--
ALTER TABLE `surat_tanda_terima`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
