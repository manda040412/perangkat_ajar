-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Bulan Mei 2023 pada 11.09
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perangkat_ajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_kajian`
--

CREATE TABLE `bidang_kajian` (
  `kd_bk` varchar(10) NOT NULL,
  `bidang_kajian` varchar(50) NOT NULL,
  `kd_matkul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidang_kajian`
--

INSERT INTO `bidang_kajian` (`kd_bk`, `bidang_kajian`, `kd_matkul`) VALUES
('BKSBD001', 'Konsep Dasar Data dan Sistem Basis Data', 'MKSI001'),
('BKSBD002', 'Pemodelan Data', 'MKSI001'),
('BKSBD003', 'Relational Model', 'MKSI001'),
('BKSBD004', 'Entitiy Relationship Diagram', 'MKSI001'),
('BKSBD005', 'Normalisasi', 'MKSI001'),
('BKSBD006', 'Database Design', 'MKSI001'),
('BKSBD007', 'Query Language', 'MKSI001'),
('BKSBD008', 'Arsitektur Database', 'MKSI001'),
('BKSBD009', 'Transaction Management', 'MKSI001'),
('BKSBD010', 'Implementasi Database', 'MKSI001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capdi`
--

CREATE TABLE `capdi` (
  `kd_capdi` varchar(8) NOT NULL,
  `capaian_pembelajaran` varchar(250) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `capdi`
--

INSERT INTO `capdi` (`kd_capdi`, `capaian_pembelajaran`, `kd_prodi`) VALUES
('CPD001', 'Menunjukkan sikap bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri', 'SI'),
('CPD002', 'Menunjukkan sikap sebagai pembelajar seumur hidup dan selalu melakukan perbaikan dengan penuh semangat dan terus menerus', 'SI'),
('CPD003', 'mampu mengintegrasikan berbagai komponen yang ada dalam perusahaan untuk merancang sebuah sistem yang dapat memberikan kemajuan bagi perusahaan', 'SI'),
('CPD004', 'Mampu mengaplikasikan alternatif pemecahan masalah yang ada dan mampu menuangkannya dalam merancang sistem informasi bagi perusahaan', 'SI'),
('CPD005', 'mampu menunjukkan kinerja mandiri, bermutu, dan terukur', 'SI'),
('CPD006', 'mampu beradaptasi dengan perkembangan teknologi yang dinamis yang mendukung pekerjaan/tugas yang diberikan', 'TI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capmatkul`
--

CREATE TABLE `capmatkul` (
  `kd_capmatkul` varchar(12) NOT NULL,
  `deskripsi_capmatkul` varchar(200) NOT NULL,
  `kd_matkul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `capmatkul`
--

INSERT INTO `capmatkul` (`kd_capmatkul`, `deskripsi_capmatkul`, `kd_matkul`) VALUES
('CPSBD001', 'Mahasiswa mengetahui dan memahami konsep dasar basis data', 'MKSI001'),
('CPSBD002', 'Mahasiswa memahami data model', 'MKSI001'),
('CPSBD003', 'Mahasiswa mampu menganalisa kebutuhan basis data dalam suatu organisasi/perusahaan', 'MKSI001'),
('CPSBD004', 'Mahasiswa mengetahui dan memahami model-model data, dan mampu merancang basis data menggunakan model Entity Relational Diagram', 'MKSI001'),
('CPSBD005', 'Mahasiswa mengetahui dan memahami konsep Normalisasi serta mampu membuat normalisasi sebuah tabel', 'MKSI001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `kd_dosen` varchar(8) NOT NULL,
  `nm_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`kd_dosen`, `nm_dosen`) VALUES
('DOS001', 'Afifah Trista Ayunda, S.Kom., M.Kom.'),
('DOS002', 'Muhammad Fauzi, S.Pd, M.Pd'),
('DOS003', 'Erick Dazki, S.Kom., M.Kom'),
('DOS004', 'Wahyu Tisno Atmojo,. S.Kom., M.Kom'),
('DOS005', 'Syamsu Alang, S.Sos, M.Si'),
('DOS006', 'Rintho Ranto Rerung., S.Kom., M.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kd_matkul` varchar(9) NOT NULL,
  `nm_matkul` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `kd_dosen` varchar(8) NOT NULL,
  `kd_prodi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kd_matkul`, `nm_matkul`, `sks`, `kd_dosen`, `kd_prodi`) VALUES
('MKSI001', 'Sistem Basis Data', 3, 'DOS001', 'SI'),
('MKSI002', 'Riset Operasi', 3, 'DOS002', 'SI'),
('MKSI003', 'Kota Cerdas', 3, 'DOS003', 'SI'),
('MKSI004', 'Pemrograman Dasar', 3, 'DOS004', 'SI'),
('MKSI005', 'Analisa Proses Bisnis', 3, 'DOS005', 'SI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaporan`
--

CREATE TABLE `pelaporan` (
  `kd_pelaporan` varchar(12) NOT NULL,
  `isi_pelaporan` varchar(250) NOT NULL,
  `kd_dosen` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelaporan`
--

INSERT INTO `pelaporan` (`kd_pelaporan`, `isi_pelaporan`, `kd_dosen`) VALUES
('PEL001', 'pelaporan dosen mengenai fasilitas parkir yang disediakan kampus', 'DOS001'),
('PEL002', 'pelaporan dosen mengenai fasilitas kelas yang disediakan kampus', 'DOS001'),
('PEL003', 'pelaporan dosen mengenai fasilitas jaringan internet yang disediakan kampus', 'DOS001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` varchar(12) NOT NULL,
  `minggu` int(6) NOT NULL,
  `sub_cpmk` varchar(100) NOT NULL,
  `bidang_kajian` varchar(50) NOT NULL,
  `metode_pembelajaran` varchar(100) NOT NULL,
  `estimasi_waktu` varchar(50) NOT NULL,
  `pengalaman_belajar` varchar(100) NOT NULL,
  `kriteria` varchar(200) NOT NULL,
  `bentuk` varchar(200) NOT NULL,
  `kd_dosen` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `minggu`, `sub_cpmk`, `bidang_kajian`, `metode_pembelajaran`, `estimasi_waktu`, `pengalaman_belajar`, `kriteria`, `bentuk`, `kd_dosen`) VALUES
('PN001', 1, 'Mahasiswa mampu menjelaskan Konsep dasar Database', 'Konsep database, data', 'Diskusi kelompok', 'Kuliah & Diskusi [TM: 3x (3x50?)]', 'Mahasiswa mampu berdiskusi melalui latihan soal', 'Ketepatan dan penguasaan materi berupa tanya jawab (60%), Mampu menyelesaikan latihan soal (40%)', 'Ketepatan menjelaskan tentang konsep database dan penilaian latihan soal', 'DOS001'),
('PN002', 2, 'Mahasiswa mampu memahami tentang Model data', 'Model Data', 'Diskusi kelompok, studi kasus', 'Kuliah & Diskusi [TM: 3x (3x50?)]', 'Mengenal dan memahami model data', 'Kriteria: Ketepatan Dalam menjawab, penguasaan materi dan analisis masalah (60%) dan analisis (40%)', 'Ketepatan waktu pengumpulan tugas analisis studi kasus', 'DOS001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(8) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nama_prodi`) VALUES
('AK', 'Akuntansi'),
('AR', 'Arsitektur'),
('DI', 'Desain Interior'),
('DKV', 'Desain Komunikasi Visual'),
('IN', 'Informatika'),
('MA', 'Manajemen'),
('MR', 'Manajemen Retail'),
('PA', 'Pariwisata'),
('PW', 'Perencanaan Wilayah'),
('SI', 'Sistem Informasi'),
('SK', 'Seni kuliner'),
('TI', 'Teknik Informatika'),
('TS', 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prolus`
--

CREATE TABLE `prolus` (
  `kd_prolus` varchar(9) NOT NULL,
  `profil_lulusan` varchar(50) NOT NULL,
  `deskripsi_prolus` varchar(250) NOT NULL,
  `kd_prodi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `prolus`
--

INSERT INTO `prolus` (`kd_prolus`, `profil_lulusan`, `deskripsi_prolus`, `kd_prodi`) VALUES
('PRSI001', 'Project Manager TIK', 'Lulusan yang mampu merencanakan, mengatur dan mengarahkan proyek, memanajemen waktu dan biaya, serta mengolah sumber daya yang ada untuk mencapai hasil yang diharapkan menggunakan teknologi informasi dan komunikasi', 'SI'),
('PRSI002', 'System Analyst', 'Lulusan yang memahami penggunaan perangkat lunak untuk kepentingan bisnis, berinteraksi langsung dengan stakeholder untuk menganalisa dan mengumpulkan kebutuhan proses bisnis', 'SI'),
('PRSI003', 'System Database Administrator', 'Lulusan yang mampu membuat disain database sistem informasi dan dapat mengimplementasikannya serta mampu melakukan instalasi konfigurasi, upgrade, adaptasi, monitoring dan maintenance database dalam suatu organisasi', 'SI'),
('PRSI004', 'System Multimedia Develpoer', 'Lulusan yang ahli dalam merancang sistem informasi bisnis menggunakan teknologi Multimedia.', 'SI'),
('PRSI005', 'Web Developer', 'Lulusan yang membangun serta mengelola aplikasi web baik dari sisi konten, programming dan databasenya untuk kepentingan pengembangan sistem informasi bisnis.', 'SI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rubrik_penilaian`
--

CREATE TABLE `rubrik_penilaian` (
  `kd_rubrik` varchar(9) NOT NULL,
  `grade` varchar(13) NOT NULL,
  `skor` varchar(10) NOT NULL,
  `kriteria_penilaian` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rubrik_penilaian`
--

INSERT INTO `rubrik_penilaian` (`kd_rubrik`, `grade`, `skor`, `kriteria_penilaian`) VALUES
('RPSI001', 'sangat kurang', '<20', 'Rancangan yang disajikan tidak teratur dan tidak menyelesaikan permasalahan'),
('RPSI002', 'kurang', '21-40', 'Rancangan yang disajikan teratur namun kurang menyelesaikan permasalahan'),
('RPSI003', 'cukup', '41-60', 'Rancangan yang disajikan tersistematis, menyelesaikan masalah, namun kurang dapat diimplementasikan'),
('RPSI004', 'baik', '61-80', 'Rancangan yang disajikan tersistematis, menyelesaikan masalah, dapat diimplementasikan, kurang inovatif'),
('RPSI005', 'sangat baik', '>81', 'Rancangan yang disajikan tersistematis, menyelesaikan masalah, dapat diimplementasikan dan inovatif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang_kajian`
--
ALTER TABLE `bidang_kajian`
  ADD PRIMARY KEY (`kd_bk`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indeks untuk tabel `capdi`
--
ALTER TABLE `capdi`
  ADD PRIMARY KEY (`kd_capdi`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `capmatkul`
--
ALTER TABLE `capmatkul`
  ADD PRIMARY KEY (`kd_capmatkul`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_matkul`),
  ADD KEY `kd_dosen` (`kd_dosen`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`kd_pelaporan`),
  ADD KEY `kd_dosen` (`kd_dosen`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `kd_dosen` (`kd_dosen`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indeks untuk tabel `prolus`
--
ALTER TABLE `prolus`
  ADD PRIMARY KEY (`kd_prolus`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `rubrik_penilaian`
--
ALTER TABLE `rubrik_penilaian`
  ADD PRIMARY KEY (`kd_rubrik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bidang_kajian`
--
ALTER TABLE `bidang_kajian`
  ADD CONSTRAINT `bidang_kajian_ibfk_1` FOREIGN KEY (`kd_matkul`) REFERENCES `matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `capdi`
--
ALTER TABLE `capdi`
  ADD CONSTRAINT `capdi_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `capmatkul`
--
ALTER TABLE `capmatkul`
  ADD CONSTRAINT `capmatkul_ibfk_1` FOREIGN KEY (`kd_matkul`) REFERENCES `matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`kd_dosen`) REFERENCES `dosen` (`kd_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Ketidakleluasaan untuk tabel `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD CONSTRAINT `pelaporan_ibfk_1` FOREIGN KEY (`kd_dosen`) REFERENCES `dosen` (`kd_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kd_dosen`) REFERENCES `dosen` (`kd_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prolus`
--
ALTER TABLE `prolus`
  ADD CONSTRAINT `prolus_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
