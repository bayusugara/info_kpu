-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 07.23
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_kpu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `jenis_berita` enum('PILEG','PILPRES','PILKADA') NOT NULL,
  `judul_berita` varchar(75) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `username`, `jenis_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `waktu`) VALUES
(8, 'admin', 'PILPRES', 'tes bos', 'Revert artinya mengembalikan. Perintah ini lebih aman daripada git reset, karena tidak akan menghapus catatan sejarah revisi.\r\nRevert akan akan mengambil kondisi file yang ada di masa lalu, kemudian menggabungkannya dengan commit terakhir.', '1.PNG', '2020-03-26 23:57:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pileg`
--

CREATE TABLE `calon_pileg` (
  `id_calon_pileg` int(11) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `calon_pileg`
--

INSERT INTO `calon_pileg` (`id_calon_pileg`, `id_dapil`, `id_parpol`, `no_urut`, `nama_calon`, `gender`) VALUES
(1, 11, 2, 1, 'PARWOTO DARICH', 'Laki-laki'),
(2, 3, 2, 2, 'INDRA', 'Laki-laki'),
(3, 11, 4, 1, 'ezi', 'Perempuan'),
(4, 11, 3, 2, 'ezu', 'Laki-laki'),
(6, 10, 2, 3, 'CARLA APRILIA, S.E', 'Perempuan'),
(7, 10, 2, 7, 'H. FATHULLAH', 'Laki-laki'),
(8, 10, 4, 7, 'farr', 'Laki-laki'),
(9, 9, 4, 2, 'bayu nugrahi', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pilkada`
--

CREATE TABLE `calon_pilkada` (
  `id_calon_pilkada` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `calon_pilkada`
--

INSERT INTO `calon_pilkada` (`id_calon_pilkada`, `nama_calon`, `gender`, `tgl_lahir`, `alamat`) VALUES
(7, 'ezu nugrahi', 'Laki-laki', '1998-11-17', 'rokan hulu'),
(8, 'dedek gemes', 'Perempuan', '1998-11-17', 'pekanbaru'),
(9, 'juju', 'Laki-laki', '1998-11-20', 'karya anak sholeh'),
(10, 'ezi', 'Perempuan', '1999-11-11', 'karya anak sholeha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pilpres`
--

CREATE TABLE `calon_pilpres` (
  `id_calon_pilpres` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `calon_pilpres`
--

INSERT INTO `calon_pilpres` (`id_calon_pilpres`, `nama_calon`, `gender`) VALUES
(9, 'H. PRABOWO SUBIANTO', 'Laki-laki'),
(11, 'Ir. H. JOKO WIDODO', 'Laki-laki'),
(17, 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', 'Laki-laki'),
(18, 'H. SANDIAGA SALAHUDIN UNO', 'Laki-laki'),
(19, 'SBY', 'Laki-laki'),
(20, 'Jusuf Kalla', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dapil`
--

CREATE TABLE `dapil` (
  `id_dapil` int(11) NOT NULL,
  `nama_dapil` varchar(25) NOT NULL,
  `alokasi_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dapil`
--

INSERT INTO `dapil` (`id_dapil`, `nama_dapil`, `alokasi_kursi`) VALUES
(3, 'Dapil 2', 10),
(7, 'Dapil 3', 7),
(8, 'Dapil 4', 12),
(9, 'Dapil 5', 8),
(10, 'Dapil 6', 9),
(11, 'Dapil 1', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kampanye`
--

CREATE TABLE `jadwal_kampanye` (
  `id_jadwal_kampanye` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `jumlah_dpt_lk` int(11) NOT NULL,
  `jumlah_dpt_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_dapil`, `jumlah_penduduk`, `jumlah_dpt_lk`, `jumlah_dpt_pr`) VALUES
(1, 'Rumbai', 3, 62448, 20000, 20000),
(2, 'Rumbai Pesisir', 3, 66404, 22750, 22895),
(6, 'Sail', 7, 1234567, 5940, 6540),
(7, 'Tenayan Raya', 7, 1000000, 39042, 39406),
(8, 'Bukit Raya', 8, 12345999, 24500, 25000),
(9, 'Marpoyan Damai', 8, 435545465, 31410, 32602),
(10, 'Tampan', 9, 100000, 50000, 6000),
(11, 'Senapelan', 10, 171198, 9067, 10062),
(12, 'Payung Sekaki', 10, 100000, 23123, 23321),
(13, 'Sukajadi', 11, 20, 1, 2),
(14, 'Pekanbaru Kota', 11, 60002, 10000, 10000),
(17, 'Lima Puluh', 11, 10000, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `username`, `isi_komentar`, `waktu`) VALUES
(6, 8, 'farhan', 'wew', '2020-06-14 08:38:41'),
(7, 8, 'roni', 'oyi', '2020-06-14 15:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_kampanye`
--

CREATE TABLE `lokasi_kampanye` (
  `id_lokasi_kampanye` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol`
--

CREATE TABLE `parpol` (
  `id_parpol` int(11) NOT NULL,
  `no_urut_parpol` int(11) NOT NULL,
  `nama_parpol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `parpol`
--

INSERT INTO `parpol` (`id_parpol`, `no_urut_parpol`, `nama_parpol`) VALUES
(2, 1, 'Gerindra'),
(3, 2, 'PSI'),
(4, 3, 'PKS'),
(6, 4, 'PKB'),
(7, 6, 'demokrat'),
(8, 7, 'pskb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol_paslon_pilkada`
--

CREATE TABLE `parpol_paslon_pilkada` (
  `id_parpol_paslon_pilkada` int(11) NOT NULL,
  `id_paslon` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol_paslon_pilpres`
--

CREATE TABLE `parpol_paslon_pilpres` (
  `id_parpol_paslon_pilpres` int(11) NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `parpol_paslon_pilpres`
--

INSERT INTO `parpol_paslon_pilpres` (`id_parpol_paslon_pilpres`, `id_paslon_pilpres`, `id_parpol`) VALUES
(26, 7, 3),
(27, 8, 6),
(28, 9, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslon_pilkada`
--

CREATE TABLE `paslon_pilkada` (
  `id_paslon` int(11) NOT NULL,
  `jenis_pemilihan` enum('Pemilihan Walikota','Pemilihan Gubernur','Pemilihan Bupati') NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `id_kepala_daerah` int(11) NOT NULL,
  `id_wakil_kepala_daerah` int(11) NOT NULL,
  `jenis_calon` enum('Perseorangan','Parpol') NOT NULL,
  `status_penetapan` enum('MS','TMS') NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `paslon_pilkada`
--

INSERT INTO `paslon_pilkada` (`id_paslon`, `jenis_pemilihan`, `nomor_urut`, `id_kepala_daerah`, `id_wakil_kepala_daerah`, `jenis_calon`, `status_penetapan`, `keterangan`, `tahun`) VALUES
(1, 'Pemilihan Walikota', 1, 10, 8, 'Perseorangan', 'MS', 'sah', '2018'),
(2, 'Pemilihan Walikota', 2, 7, 9, 'Perseorangan', 'MS', 'sah', '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslon_pilpres`
--

CREATE TABLE `paslon_pilpres` (
  `id_paslon_pilpres` int(11) NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `id_capres` int(11) NOT NULL,
  `id_cawapres` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `paslon_pilpres`
--

INSERT INTO `paslon_pilpres` (`id_paslon_pilpres`, `nomor_urut`, `id_capres`, `id_cawapres`, `tahun`) VALUES
(7, 1, 11, 17, '2019'),
(8, 2, 9, 18, '2019'),
(9, 3, 19, 20, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `hak_akses` enum('admin','public') NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama_pengguna`, `hak_akses`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'Administrator@yahoo.co.id'),
('farhan', '0fa68ee5f86c0c345aa1b4aec7a26f39', 'Farhan Ganteng', 'public', 'farhan@gmail.com'),
('rifal', '0fa68ee5f86c0c345aa1b4aec7a26f39', 'Rifal Ganteng', 'public', 'rifalganteng@gmail.com'),
('roni', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'roni', 'public', 'roni@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reply`
--

CREATE TABLE `reply` (
  `id_reply` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `isi_reply` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reply`
--

INSERT INTO `reply` (`id_reply`, `id_komentar`, `username`, `isi_reply`, `waktu`) VALUES
(16, 6, 'farhan', 'pak jasril ganteng', '2020-06-14 08:52:50'),
(18, 6, 'rifal', 'hehehehhehe', '2020-06-14 08:53:59'),
(20, 7, 'roni', '', '2020-06-14 15:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara_calon_pileg`
--

CREATE TABLE `suara_calon_pileg` (
  `id_suara_calon_pileg` int(11) NOT NULL,
  `id_calon_pileg` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suara_calon_pileg`
--

INSERT INTO `suara_calon_pileg` (`id_suara_calon_pileg`, `id_calon_pileg`, `id_kecamatan`, `jumlah_suara`, `tahun`) VALUES
(2, 1, 10, 100, '2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara_calon_pilpres`
--

CREATE TABLE `suara_calon_pilpres` (
  `id_suara_calon_pilpres` int(11) NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suara_calon_pilpres`
--

INSERT INTO `suara_calon_pilpres` (`id_suara_calon_pilpres`, `id_paslon_pilpres`, `id_kecamatan`, `jumlah_suara`, `tahun`) VALUES
(26, 7, 8, 8919, '2019'),
(27, 8, 8, 39158, '2019'),
(28, 7, 17, 9554, '2019'),
(29, 8, 17, 11686, '2019'),
(30, 7, 14, 2150, '2019'),
(31, 8, 14, 10351, '2019'),
(32, 7, 13, 5823, '2019'),
(33, 8, 13, 17435, '2019'),
(34, 7, 12, 19607, '2019'),
(35, 8, 12, 26297, '2019'),
(36, 7, 11, 6597, '2019'),
(37, 8, 11, 12642, '2019'),
(38, 7, 10, 15214, '2019'),
(39, 8, 10, 70709, '2019'),
(40, 7, 9, 13122, '2019'),
(41, 8, 9, 49259, '2019'),
(42, 9, 7, 2000, '2019');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD PRIMARY KEY (`id_calon_pileg`),
  ADD KEY `id_dapil` (`id_dapil`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  ADD PRIMARY KEY (`id_calon_pilkada`);

--
-- Indeks untuk tabel `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  ADD PRIMARY KEY (`id_calon_pilpres`);

--
-- Indeks untuk tabel `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indeks untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  ADD PRIMARY KEY (`id_jadwal_kampanye`),
  ADD KEY `jadwal_kampanye_pemilu_ibfk_2` (`id_paslon_pilpres`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_dapil` (`id_dapil`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  ADD PRIMARY KEY (`id_lokasi_kampanye`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `parpol`
--
ALTER TABLE `parpol`
  ADD PRIMARY KEY (`id_parpol`),
  ADD UNIQUE KEY `no_urut_parpol` (`no_urut_parpol`);

--
-- Indeks untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD PRIMARY KEY (`id_parpol_paslon_pilkada`),
  ADD KEY `id_paslon` (`id_paslon`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD PRIMARY KEY (`id_parpol_paslon_pilpres`),
  ADD KEY `id_paslon_pilpres` (`id_paslon_pilpres`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD PRIMARY KEY (`id_paslon`),
  ADD KEY `id_kepala_daerah` (`id_kepala_daerah`),
  ADD KEY `id_wakil_kepala_daerah` (`id_wakil_kepala_daerah`);

--
-- Indeks untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD PRIMARY KEY (`id_paslon_pilpres`),
  ADD UNIQUE KEY `nomor_urut` (`nomor_urut`),
  ADD KEY `id_capres` (`id_capres`),
  ADD KEY `id_cawapres` (`id_cawapres`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD PRIMARY KEY (`id_suara_calon_pileg`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_data_calon_dprd` (`id_calon_pileg`);

--
-- Indeks untuk tabel `suara_calon_pilpres`
--
ALTER TABLE `suara_calon_pilpres`
  ADD PRIMARY KEY (`id_suara_calon_pilpres`),
  ADD KEY `id_paslon_pilpres` (`id_paslon_pilpres`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  MODIFY `id_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  MODIFY `id_calon_pilkada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  MODIFY `id_calon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  MODIFY `id_jadwal_kampanye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  MODIFY `id_lokasi_kampanye` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `parpol`
--
ALTER TABLE `parpol`
  MODIFY `id_parpol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  MODIFY `id_parpol_paslon_pilkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  MODIFY `id_parpol_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  MODIFY `id_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reply`
--
ALTER TABLE `reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  MODIFY `id_suara_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `suara_calon_pilpres`
--
ALTER TABLE `suara_calon_pilpres`
  MODIFY `id_suara_calon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD CONSTRAINT `calon_pileg_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calon_pileg_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  ADD CONSTRAINT `jadwal_kampanye_ibfk_2` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  ADD CONSTRAINT `lokasi_kampanye_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon_pilkada` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_1` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD CONSTRAINT `paslon_pilkada_ibfk_1` FOREIGN KEY (`id_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilkada_ibfk_2` FOREIGN KEY (`id_wakil_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD CONSTRAINT `paslon_pilpres_ibfk_1` FOREIGN KEY (`id_capres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilpres_ibfk_2` FOREIGN KEY (`id_cawapres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD CONSTRAINT `suara_calon_pileg_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_calon_pileg_ibfk_2` FOREIGN KEY (`id_calon_pileg`) REFERENCES `calon_pileg` (`id_calon_pileg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suara_calon_pilpres`
--
ALTER TABLE `suara_calon_pilpres`
  ADD CONSTRAINT `suara_calon_pilpres_ibfk_1` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_calon_pilpres_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
