-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jan 2023 pada 20.18
-- Versi server: 8.0.30
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(6) NOT NULL,
  `kode_login` int NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kode_mp` varchar(6) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kode_guru`, `kode_login`, `nama_guru`, `kode_mp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_guru`) VALUES
('GU-1', 4, 'Sutarsih, S.Pd', 'MP-1', 'Malang', '1970-01-01', 'P', 'Islam', 'Banten'),
('GU-2', 6, 'Salma', 'MP-3', 'SMD', '2023-01-17', 'P', 'Islam', 'Jl. Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(6) NOT NULL,
  `nama_jurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('JU-1', '7-A'),
('JU-2', '7-B'),
('JU-3', '7-C'),
('JU-4', '8-A'),
('JU-5', '8-B'),
('JU-6', '8-C'),
('JU-7', '9-A'),
('JU-8', '9-B'),
('JU-9', '9-C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(10) NOT NULL,
  `type_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type_user`) VALUES
(1, 'admin', 'admin', 'Admin'),
(3, 'Shyfa', '1234', 'Siswa'),
(4, 'Sutarsih', '1234', 'Guru'),
(6, 'salma410', '86456', 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mp` varchar(6) NOT NULL,
  `nama_mp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mp`, `nama_mp`) VALUES
('MP-1', 'Pendidikan Kewarganegaraan'),
('MP-2', 'Matematika'),
('MP-3', 'Bahasa Arab'),
('MP-4', 'Bahasa Inggris'),
('MP-5', 'Bahasa Indonesia'),
('MP-6', 'Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(6) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `kode_guru` varchar(6) NOT NULL,
  `kode_mp` varchar(6) NOT NULL,
  `nilai_harian` varchar(10) NOT NULL,
  `nilai_uts` varchar(10) NOT NULL,
  `nilai_uas` varchar(10) NOT NULL,
  `average` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nis`, `kode_guru`, `kode_mp`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `average`) VALUES
('NI-1', 'SS-2', 'GU-1', 'MP-2', '80', '75', '76', '77.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(6) NOT NULL,
  `kode_login` int NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` int NOT NULL,
  `kode_jurusan` varchar(6) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `kode_login`, `nama_siswa`, `kelas`, `kode_jurusan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_siswa`) VALUES
('SS-2', 3, 'Maulida Shyfa Mahadewi', 7, 'JU-3', 'Jakarta', '2001-06-04', 'P', 'Islam', 'Depok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar_kompetensi`
--

CREATE TABLE `standar_kompetensi` (
  `kode_sk` varchar(6) NOT NULL,
  `kode_mp` varchar(6) NOT NULL,
  `nama_sk` varchar(50) NOT NULL,
  `kelas_sk` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `standar_kompetensi`
--

INSERT INTO `standar_kompetensi` (`kode_sk`, `kode_mp`, `nama_sk`, `kelas_sk`) VALUES
('SK-1', 'MP-6', 'Keadaan Indonesia Setelah Merdeka', '7'),
('SK-2', 'MP-1', 'Pentingnya HAM di Indonesia', '7'),
('SK-4', 'MP-1', 'Mengetahui Bangun Ruang dan Datar', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_murid`
--

CREATE TABLE `wali_murid` (
  `kode_wali` varchar(6) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(15) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD KEY `kode_mp` (`kode_mp`),
  ADD KEY `kode_login` (`kode_login`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mp`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_jurusan` (`kode_jurusan`),
  ADD KEY `kode_login` (`kode_login`);

--
-- Indeks untuk tabel `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
  ADD PRIMARY KEY (`kode_sk`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indeks untuk tabel `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD PRIMARY KEY (`kode_wali`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `mata_pelajaran` (`kode_mp`),
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`kode_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_mp`) REFERENCES `mata_pelajaran` (`kode_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kode_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
  ADD CONSTRAINT `standar_kompetensi_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `mata_pelajaran` (`kode_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `wali_murid_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
