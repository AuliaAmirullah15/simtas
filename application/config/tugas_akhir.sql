-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jun 2016 pada 14.47
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `nip` char(7) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `password`, `nama`, `status`) VALUES
('1111111', 'e10adc3949ba59abbe56e057f20f883e', 'Bambang', 'koor_ta'),
('2222222', 'e10adc3949ba59abbe56e057f20f883e', 'Udin', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assesment`
--

CREATE TABLE IF NOT EXISTS `assesment` (
  `id_assesment` char(7) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul` text NOT NULL,
  `rekomendasi_judul` enum('Mahasiswa','Dosen','','') NOT NULL,
  `area_tugas_akhir` enum('Multimedia','Knowledge Management and Data Science','Komputer Sistem','') NOT NULL,
  `status_judul` enum('Diterima','Perbaikan Kecil','Ganti Judul (Ditolak)','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` char(7) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `password`, `jabatan`) VALUES
('1234567', 'opim salim', 'e10adc3949ba59abbe56e057f20f883e', 'dekan'),
('7654321', 'Dani Gunawan', 'e10adc3949ba59abbe56e057f20f883e', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_pembimbing`
--

CREATE TABLE IF NOT EXISTS `dosen_pembimbing` (
  `id_dosen_pembimbing` char(5) NOT NULL,
  `nip` char(7) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_assesment` char(7) NOT NULL,
  `status` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `editor_jurnal`
--

CREATE TABLE IF NOT EXISTS `editor_jurnal` (
  `id_jurnal` char(5) NOT NULL,
  `nip_editor1` char(7) NOT NULL,
  `nip_editor2` char(7) NOT NULL,
  `status_jurnal` enum('Diterima','Belum Diverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_seminar_proposal`
--

CREATE TABLE IF NOT EXISTS `hasil_seminar_proposal` (
  `id_seminar_proposal` char(5) NOT NULL,
  `judul_tugas_akhir` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `latar_belakang` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `rumusan_masalah` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `tujuan_penelitian` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `landasan_teori` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `metodologi` enum('Terima','Perbaiki','Ganti','') NOT NULL,
  `daftar_pustaka` enum('Terima','Perbaikan','Ganti','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_online`
--

CREATE TABLE IF NOT EXISTS `jurnal_online` (
  `id_jurnal` char(5) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul_jurnal` text NOT NULL,
  `status_jurnal` enum('Diterima','Belum Diverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `id_krs` char(7) NOT NULL,
  `id_matkul` varchar(9) NOT NULL,
  `nim` char(9) NOT NULL,
  `sks` int(2) NOT NULL,
  `nilai` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_matkul`, `nim`, `sks`, `nilai`) VALUES
('krs0073', 'TIF2306', '141402037', 3, ''),
('krs0074', 'TIF2306P', '141402037', 1, ''),
('krs0075', 'MAT2301', '141402037', 3, ''),
('krs0076', 'TIS2302', '141402037', 2, ''),
('krs0077', 'TIF2307', '141402037', 3, ''),
('krs0078', 'TIF2307P', '141402037', 1, ''),
('krs0079', 'TIF2308', '141402037', 3, ''),
('krs0080', 'TIF2308P', '141402037', 1, ''),
('krs0081', 'TIF2309', '141402037', 3, ''),
('krs0082', 'UNI1210', '141402037', 2, ''),
('krs0083', 'TIF2301', '141402037', 3, 'B'),
('krs0084', 'TIF2301P', '141402037', 1, 'B+'),
('krs0085', 'TIS2301', '141402037', 2, 'B'),
('krs0086', 'TIF2305P', '141402037', 1, 'A'),
('krs0087', 'TIF2305', '141402037', 3, 'B+'),
('krs0088', 'TIF2302', '141402037', 2, 'B+'),
('krs0089', 'TIF2303', '141402037', 3, 'B'),
('krs0090', 'TIF2304', '141402037', 3, 'D'),
('krs0091', 'TIF2304P', '141402037', 1, 'B+'),
('krs0092', 'UNI1208', '141402037', 2, 'A'),
('krs0093', 'UNI1201', '141402037', 2, 'A'),
('krs0094', 'UNI1206', '141402037', 3, 'B+'),
('krs0095', 'MAT1202', '141402037', 2, 'C'),
('krs0096', 'MAT1203', '141402037', 2, 'B+'),
('krs0097', 'TIF1204', '141402037', 3, 'C+'),
('krs0098', 'TIF1205', '141402037', 3, 'B'),
('krs0099', 'TIF1204P', '141402037', 1, 'B'),
('krs0100', 'TIF1205P', '141402037', 1, 'B'),
('krs0101', 'TIF1202P', '141402037', 1, 'B'),
('krs0102', 'TIF1203P', '141402037', 1, 'B+'),
('krs0103', 'UNI1207', '141402037', 2, 'A'),
('krs0104', 'UNI1209', '141402037', 2, 'C+'),
('krs0105', 'TIF1201', '141402037', 3, 'B'),
('krs0106', 'TIF1202', '141402037', 3, 'C+'),
('krs0107', 'TIF1203', '141402037', 3, 'A'),
('krs0108', 'MAT1201', '141402037', 2, 'B+'),
('krs0109', 'TIF2306', '141402055', 3, ''),
('krs0110', 'TIF2306P', '141402055', 1, ''),
('krs0111', 'MAT2301', '141402055', 3, ''),
('krs0112', 'TIS2302', '141402055', 2, ''),
('krs0113', 'TIF2307', '141402055', 3, ''),
('krs0114', 'TIF2307P', '141402055', 1, ''),
('krs0115', 'TIF2308', '141402055', 3, ''),
('krs0116', 'TIF2308P', '141402055', 1, ''),
('krs0117', 'TIF2309', '141402055', 3, ''),
('krs0118', 'TIS3403', '141402055', 2, ''),
('krs0119', 'UNI1210', '141402055', 2, ''),
('krs0120', 'TIF2301', '141402055', 3, 'B+'),
('krs0121', 'TIF2301P', '141402055', 1, 'A'),
('krs0122', 'TIS2301', '141402055', 2, 'B+'),
('krs0123', 'TIF2305P', '141402055', 1, 'A'),
('krs0124', 'TIF2305', '141402055', 3, 'B+'),
('krs0125', 'TIF2302', '141402055', 2, 'A'),
('krs0126', 'TIF2303', '141402055', 3, 'B'),
('krs0127', 'TIF2304', '141402055', 3, 'D'),
('krs0128', 'TIF2304P', '141402055', 1, 'B'),
('krs0129', 'UNI1208', '141402055', 2, 'A'),
('krs0130', 'UNI1201', '141402055', 2, 'A'),
('krs0131', 'UNI1206', '141402055', 3, 'B+'),
('krs0132', 'MAT1202', '141402055', 2, 'C+'),
('krs0133', 'MAT1203', '141402055', 2, 'C+'),
('krs0134', 'TIF1204', '141402055', 3, 'B'),
('krs0135', 'TIF1205', '141402055', 3, 'B'),
('krs0136', 'TIF1204P', '141402055', 1, 'A'),
('krs0137', 'TIF1205P', '141402055', 1, 'B'),
('krs0138', 'TIF1202P', '141402055', 1, 'B'),
('krs0139', 'TIF1203P', '141402055', 1, 'B+'),
('krs0140', 'UNI1207', '141402055', 2, 'B'),
('krs0141', 'UNI1209', '141402055', 2, 'C'),
('krs0142', 'TIF1201', '141402055', 3, 'B+'),
('krs0143', 'TIF1202', '141402055', 3, 'C+'),
('krs0144', 'TIF1203', '141402055', 3, 'B+'),
('krs0145', 'MAT1201', '141402055', 2, 'B'),
('krs0146', 'TIF2306', '141402039', 3, ''),
('krs0147', 'TIF2306P', '141402039', 1, ''),
('krs0148', 'MAT2301', '141402039', 3, ''),
('krs0149', 'TIS2302', '141402039', 2, ''),
('krs0150', 'TIF2307', '141402039', 3, ''),
('krs0151', 'TIF2307P', '141402039', 1, ''),
('krs0152', 'TIF2308', '141402039', 3, ''),
('krs0153', 'TIF2308P', '141402039', 1, ''),
('krs0154', 'TIF2309', '141402039', 3, ''),
('krs0155', 'UNI1210', '141402039', 2, ''),
('krs0156', 'TIF2301', '141402039', 3, 'B+'),
('krs0157', 'TIF2301P', '141402039', 1, 'A'),
('krs0158', 'TIS2301', '141402039', 2, 'B'),
('krs0159', 'TIF2305P', '141402039', 1, 'A'),
('krs0160', 'TIF2305', '141402039', 3, 'B+'),
('krs0161', 'TIF2302', '141402039', 2, 'A'),
('krs0162', 'TIF2303', '141402039', 3, 'B'),
('krs0163', 'TIF2304', '141402039', 3, 'C+'),
('krs0164', 'TIF2304P', '141402039', 1, 'A'),
('krs0165', 'UNI1208', '141402039', 2, 'A'),
('krs0166', 'UNI1201', '141402039', 2, 'A'),
('krs0167', 'UNI1206', '141402039', 3, 'B+'),
('krs0168', 'MAT1202', '141402039', 2, 'B+'),
('krs0169', 'MAT1203', '141402039', 2, 'C+'),
('krs0170', 'TIF1204', '141402039', 3, 'B+'),
('krs0171', 'TIF1205', '141402039', 3, 'B'),
('krs0172', 'TIF1204P', '141402039', 1, 'A'),
('krs0173', 'TIF1205P', '141402039', 1, 'A'),
('krs0174', 'TIF1202P', '141402039', 1, 'B+'),
('krs0175', 'TIF1203P', '141402039', 1, 'B+'),
('krs0176', 'UNI1207', '141402039', 2, 'B+'),
('krs0177', 'UNI1209', '141402039', 2, 'B'),
('krs0178', 'TIF1201', '141402039', 3, 'A'),
('krs0179', 'TIF1202', '141402039', 3, 'B'),
('krs0180', 'TIF1203', '141402039', 3, 'A'),
('krs0181', 'MAT1201', '141402039', 2, 'B'),
('krs0182', 'TIF2306', '141402044', 3, ''),
('krs0183', 'TIF2306P', '141402044', 1, ''),
('krs0184', 'MAT2301', '141402044', 3, ''),
('krs0185', 'TIS2302', '141402044', 2, ''),
('krs0186', 'TIF2307', '141402044', 3, ''),
('krs0187', 'TIF2307P', '141402044', 1, ''),
('krs0188', 'TIF2308', '141402044', 3, ''),
('krs0189', 'TIF2308P', '141402044', 1, ''),
('krs0190', 'TIF2309', '141402044', 3, ''),
('krs0191', 'UNI1210', '141402044', 2, ''),
('krs0192', 'TIF2301', '141402044', 3, 'A'),
('krs0193', 'TIF2301P', '141402044', 1, 'B+'),
('krs0194', 'TIS2301', '141402044', 2, 'B'),
('krs0195', 'TIF2305P', '141402044', 1, 'A'),
('krs0196', 'TIF2305', '141402044', 3, 'B'),
('krs0197', 'TIF2302', '141402044', 2, 'A'),
('krs0198', 'TIF2303', '141402044', 3, 'B'),
('krs0199', 'TIF2304', '141402044', 3, 'C'),
('krs0200', 'TIF2304P', '141402044', 1, 'B+'),
('krs0201', 'UNI1208', '141402044', 2, 'A'),
('krs0202', 'UNI1201', '141402044', 2, 'A'),
('krs0203', 'UNI1206', '141402044', 3, 'B+'),
('krs0204', 'MAT1202', '141402044', 2, 'A'),
('krs0205', 'MAT1203', '141402044', 2, 'B+'),
('krs0206', 'TIF1204', '141402044', 3, 'B'),
('krs0207', 'TIF1205', '141402044', 3, 'B'),
('krs0208', 'TIF1204P', '141402044', 1, 'B+'),
('krs0209', 'TIF1205P', '141402044', 1, 'B+'),
('krs0210', 'TIF1202P', '141402044', 1, 'B'),
('krs0211', 'TIF1203P', '141402044', 1, 'B+'),
('krs0212', 'UNI1207', '141402044', 2, 'B'),
('krs0213', 'UNI1209', '141402044', 2, 'C+'),
('krs0214', 'TIF1201', '141402044', 3, 'B'),
('krs0215', 'TIF1202', '141402044', 3, 'C+'),
('krs0216', 'TIF1203', '141402044', 3, 'B+'),
('krs0217', 'MAT1201', '141402044', 2, 'B+'),
('krs0218', 'TIF2306', '141402118', 3, ''),
('krs0219', 'TIF2306P', '141402118', 1, ''),
('krs0220', 'MAT2301', '141402118', 3, ''),
('krs0221', 'TIS2302', '141402118', 2, ''),
('krs0222', 'TIF2307', '141402118', 3, ''),
('krs0223', 'TIF2307P', '141402118', 1, ''),
('krs0224', 'TIF2308', '141402118', 3, ''),
('krs0225', 'TIF2308P', '141402118', 1, ''),
('krs0226', 'TIF2309', '141402118', 3, ''),
('krs0227', 'TIS3403', '141402118', 2, ''),
('krs0228', 'UNI1210', '141402118', 2, ''),
('krs0229', 'TIF2301', '141402118', 3, 'A'),
('krs0230', 'TIF2301P', '141402118', 1, 'A'),
('krs0231', 'TIS2301', '141402118', 2, 'B'),
('krs0232', 'TIF2305P', '141402118', 1, 'A'),
('krs0233', 'TIF2305', '141402118', 3, 'B'),
('krs0234', 'TIF2302', '141402118', 2, 'A'),
('krs0235', 'TIF2303', '141402118', 3, 'B'),
('krs0236', 'TIF2304', '141402118', 3, 'C'),
('krs0237', 'TIF2304P', '141402118', 1, 'A'),
('krs0238', 'UNI1208', '141402118', 2, 'A'),
('krs0239', 'UNI1201', '141402118', 2, 'A'),
('krs0240', 'UNI1206', '141402118', 3, 'B+'),
('krs0241', 'MAT1202', '141402118', 2, 'B'),
('krs0242', 'MAT1203', '141402118', 2, 'C+'),
('krs0243', 'TIF1204', '141402118', 3, 'B+'),
('krs0244', 'TIF1205', '141402118', 3, 'B+'),
('krs0245', 'TIF1204P', '141402118', 1, 'B+'),
('krs0246', 'TIF1205P', '141402118', 1, 'B+'),
('krs0247', 'TIF1202P', '141402118', 1, 'A'),
('krs0248', 'TIF1203P', '141402118', 1, 'A'),
('krs0249', 'UNI1207', '141402118', 2, 'A'),
('krs0250', 'UNI1209', '141402118', 2, 'B+'),
('krs0251', 'TIF1201', '141402118', 3, 'B+'),
('krs0252', 'TIF1202', '141402118', 3, 'C+'),
('krs0253', 'TIF1203', '141402118', 3, 'A'),
('krs0254', 'MAT1201', '141402118', 2, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `asal_SMA` varchar(50) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `asal_SMA`, `tanggal_terdaftar`, `status`, `password`, `foto`) VALUES
('141402039', 'Muhammad Isa Dadi Hasibuan', 'Jalan Benih No. 29 Kel. Cengkeh Turi Kec. Binjai Utara. Binjai', 'KOTA BINJAI', '1996-12-06', 'ISLAM', 'Laki-laki', 'SMU Negeri  5, Binjai', '2014-07-03', 'Aktif', '0be7029a62878ab389edd9d80664e511', 'https://portal.usu.ac.id/photos/141402039.jpg'),
('141402044', 'Irwansyah', 'Jl. Kejora 3 No. 93 B Berastagi', 'KAB. KARO', '1996-06-16', 'ISLAM', 'Laki-laki', 'SMU Negeri 1, Berastagi', '2014-07-03', 'Aktif', '92136869c78908c441a402ead5a5f597', 'https://portal.usu.ac.id/photos/141402044.jpg'),
('141402118', 'FIQIH FATWA', 'Jalan T. Cik Ditiro No. 6 Lubuk Pakam', 'KAB. DELI SERDANG', '1996-04-08', 'ISLAM', 'Laki-laki', 'SMU Negeri 1, Lubuk Pakam', '2014-08-15', 'Aktif', 'f59577fb771f393c07f96fe1d3ed2b6b', 'https://portal.usu.ac.id/photos/141402118.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id_matkul` char(7) NOT NULL,
  `mata_kuliah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pra_seminar_hasil`
--

CREATE TABLE IF NOT EXISTS `pra_seminar_hasil` (
  `id_skripsi` char(5) NOT NULL,
  `nip_dosen_pembanding1` char(7) NOT NULL,
  `nip_dosen_pembanding2` char(7) NOT NULL,
  `status_skripsi` enum('Diterima','Belum Terverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pra_sidang`
--

CREATE TABLE IF NOT EXISTS `pra_sidang` (
  `id_skripsi` char(5) NOT NULL,
  `status_skripsi` enum('Diterima','Belum Diverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `id_proposal` char(5) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul` text NOT NULL,
  `nip_dosen_pembimbing1` char(7) NOT NULL,
  `nip_dosen_pembimbing2` char(7) NOT NULL,
  `status_proposal` enum('Diterima','Ditolak','','') NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_hasil`
--

CREATE TABLE IF NOT EXISTS `seminar_hasil` (
  `id_seminar_hasil` char(5) NOT NULL,
  `id_skripsi` char(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `nilai_dosen_pembimbing1` int(4) NOT NULL,
  `nilai_dosen_pembimbing2` int(4) NOT NULL,
  `nilai_dosen_pembanding1` int(4) NOT NULL,
  `nilai_dosen_pembanding2` int(4) NOT NULL,
  `total_nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_proposal`
--

CREATE TABLE IF NOT EXISTS `seminar_proposal` (
  `id_seminar_proposal` char(5) NOT NULL,
  `id_proposal` char(5) NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang`
--

CREATE TABLE IF NOT EXISTS `sidang` (
  `id_sidang` char(5) NOT NULL,
  `id_skripsi` char(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `nilai_dosen_pembimbing1` int(4) NOT NULL,
  `nilai_dosen_pembimbing2` int(4) NOT NULL,
  `upload_berkas_sidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE IF NOT EXISTS `skripsi` (
  `id_skripsi` char(5) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul_skripsi` text NOT NULL,
  `status_skripsi` enum('Terima','Belum Diverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_sidang`
--

CREATE TABLE IF NOT EXISTS `validasi_sidang` (
  `id_skripsi` char(5) NOT NULL,
  `berkas_skripsi` text NOT NULL,
  `status_skripsi` enum('Diterima','Belum Diverifikasi','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE IF NOT EXISTS `verifikasi` (
  `id_verifikasi` char(5) NOT NULL,
  `id_assesment` char(5) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assesment`
--
ALTER TABLE `assesment`
 ADD PRIMARY KEY (`id_assesment`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
 ADD PRIMARY KEY (`id_dosen_pembimbing`);

--
-- Indexes for table `editor_jurnal`
--
ALTER TABLE `editor_jurnal`
 ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `hasil_seminar_proposal`
--
ALTER TABLE `hasil_seminar_proposal`
 ADD PRIMARY KEY (`id_seminar_proposal`);

--
-- Indexes for table `jurnal_online`
--
ALTER TABLE `jurnal_online`
 ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
 ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pra_seminar_hasil`
--
ALTER TABLE `pra_seminar_hasil`
 ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `pra_sidang`
--
ALTER TABLE `pra_sidang`
 ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
 ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `seminar_hasil`
--
ALTER TABLE `seminar_hasil`
 ADD PRIMARY KEY (`id_seminar_hasil`);

--
-- Indexes for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
 ADD PRIMARY KEY (`id_seminar_proposal`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
 ADD PRIMARY KEY (`id_sidang`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
 ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `validasi_sidang`
--
ALTER TABLE `validasi_sidang`
 ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
 ADD PRIMARY KEY (`id_verifikasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
