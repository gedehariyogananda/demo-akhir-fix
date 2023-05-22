-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2023 pada 11.54
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
-- Database: `namatemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `materi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_dosen`, `title`, `materi`) VALUES
(17, 29, 'materi database dasar sql', '2032277533_hjklmkkk.pdf'),
(18, 29, '', '673121698_1371321691_1616178623_Silabus_Junior Web Developer.pdf'),
(19, 29, 'ghgjhhkj', '1672404986_1021337617_11 Pengurutan Bubble dan Shell (1) (2).pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `judul` varchar(224) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `deadline` varchar(225) NOT NULL,
  `tugasfile` varchar(255) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_dosen`, `id_mahasiswa`, `judul`, `deskripsi`, `deadline`, `tugasfile`, `nilai`) VALUES
(18, 29, 18, 'ghjklkjbk', 'ghkkjjk,', '2023-06-09', '1735011618_1371321691_1616178623_Silabus_Junior Web Developer.pdf', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userdosen`
--

CREATE TABLE `userdosen` (
  `id_dosen` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `nip` int(100) NOT NULL,
  `namalengkap` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgllahir` varchar(225) NOT NULL,
  `notelp` int(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `matakuliahampu` varchar(225) NOT NULL,
  `kelasampu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userdosen`
--

INSERT INTO `userdosen` (`id_dosen`, `username`, `nip`, `namalengkap`, `alamat`, `tgllahir`, `notelp`, `password`, `gambar`, `matakuliahampu`, `kelasampu`) VALUES
(29, 'muarifin', 828294284, 'Muarifin', 'Surabaya, Jawa Timur', '16 Mei 2004', 832232323, '$2y$10$5caEji3rksnlxuXxXqCvPucECftznquouOrkGLns8Vdib4Od.iLzm', 'muarifin.jpg', 'WORKHSOP PEMROGRAMAN WEB', '1 D3 ITA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermahasiswa`
--

CREATE TABLE `usermahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `namapanjang` varchar(225) NOT NULL,
  `nrp` int(13) NOT NULL,
  `jkelamin` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `ttl` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usermahasiswa`
--

INSERT INTO `usermahasiswa` (`id_mahasiswa`, `foto`, `username`, `namapanjang`, `nrp`, `jkelamin`, `kelas`, `alamat`, `ttl`, `password`) VALUES
(18, 'ganteng.jpg', 'ari', 'Gede Hari Yoga Nanda', 3122505, 'Laki Laki', '1D3 IT A', 'Tulungagung, Jawa Timur', '04-05-06', '$2y$10$nLD7MeDnTCD1VY2sWXtCwOv.8rExfOivzDfqU1Rfj50RRoGO.cmhu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `userdosen`
--
ALTER TABLE `userdosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `usermahasiswa`
--
ALTER TABLE `usermahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `userdosen`
--
ALTER TABLE `userdosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `usermahasiswa`
--
ALTER TABLE `usermahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
