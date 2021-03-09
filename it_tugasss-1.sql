-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Nov 2018 pada 10.55
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_tugasss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `level`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'reihan', '88457229c83d320d280d79765d3c559c', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batas_bimbingan`
--

CREATE TABLE `batas_bimbingan` (
  `id` int(2) NOT NULL,
  `seminar` enum('sempro','semhas','sidang','uji_program') NOT NULL,
  `batas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `batas_bimbingan`
--

INSERT INTO `batas_bimbingan` (`id`, `seminar`, `batas`) VALUES
(1, 'sempro', 3),
(2, 'uji_program', 3),
(3, 'semhas', 5),
(4, 'sidang', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal_posting` date NOT NULL,
  `author` varchar(40) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(90) NOT NULL,
  `status` enum('display','hidden') DEFAULT NULL,
  `headline` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal_posting`, `author`, `konten`, `gambar`, `status`, `headline`) VALUES
(1, 'Mahasiswa 2014 diharapkan sudah mengambil TA', '2017-12-10', 'admin', '<p>Seiring dengan peningkatan jumlah kendaraan di Indonesia, kasus kemacetan dan pelanggaran lalu lintas pun semakin meningkat. Menurut Kepala Korps Polisi Lalu Lintas Polri Irjen Pol Agung Budi Maryoto, berdasarkan data pendaftaran registrasi kendaraan yang terhitung sampai Juli 2016, populasi kendaraan yang ada di seluruh Indonesia mencapai 124.348.224 unit. Diperkirakan pertumbuhan kendaraan mencapai enam juta unit per tahun. Dimana sekitar 10-15 persen kontribusinya berasal dari mobil.</p>\r\n\r\n<p>Peningkatan jumlah kendaraan tentu akan meningkatkan kepadatan di setiap ruas jalan yang mengakibatkan kemacetan. Selain itu, kurangnya kesadaran pengendara kendaraan akan peraturan dan keamanan lalu lintas, menyebabkan meningkatnya kasus pelanggaran lalu lintas yang tidak jarang mengakibatkan kecelakaan bahkan kematian. Lampu lalu lintas yang diharapkan mampu membantu kelancaran arus lalu lintas dan mengurangi tingkat kecelakaan malah tidak mampu bekerja secara optimal. Hal itu dikarenakan sistem pengaturan lampu lalu lintas yang umum digunakan adalah Fixed Time Traffic Light Controller dimana lampu lalu lintas bekerja dalam waktu yang telah ditetapkan sebelumnya sehingga menimbulkan penumpukan jumlah kendaraan pada salah satu ruas jalan. Selain itu, pada sistem lampu lalu lintas masih belum menerapkan pengaturan lalu lintas yang lebih efektif dan efisien dalam menangani kasus pelanggaran lalu lintas.</p>\r\n\r\n<p>Masalah kemacetan dan pelanggaran lalu lintas sudah berlangsung dalam waktu yang lama dan masih belum bisa diatasi dengan baik. Maka dari itu, masalah ini haruslah segera diatasi dan diberikan solusinya agar terciptanya kenyamanan berkendara di jalan raya serta ketertiban di lalu lintas. Guna menciptakan ketertiban di lalu lintas dan kenyamanan berkendara di jalan raya dibutuhkan sistem pengaturan lampu lalu lintas yang efisien dan efektif.</p>\r\n', 'Akreditasi-Jurusan-Universitas-Sumatera-Utara-USU-Medan.jpg', 'display', '0'),
(2, 'Coba ', '2017-12-11', 'admin', '<p>sandnksjnddi sah hdbuewfuewbfhjbdfwe ewfhewufhewfewf</p>\r\n', 'donut.jpg', 'display', '0'),
(3, 'IPAL RS USU Aman', '2017-12-14', 'admin', '<p>MEDAN : Instalasi Pengolahan Air Limbah ( IPAL ) Rumah Sakit Universitas Sumatera Utara secara umum dianggap masih dalam ambang batas aman atau tidak mencemari.&nbsp;Demikian antara lain hasil penilaian dari berita acara pengawasan/pembinaan/evaluasi pengelolaan lingkungan yang dilakukan UPT Pengelolaan Kualitas Air Sungai Belawan - Deli Dinas Lingkungan Hidup Pemerintah Provinsi Sumatera Utara.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tim dari UPT pengelolaan kualitas air Sungai Belawan Deli Dinas Lingkungan Hidup Provinsi Sumatera Utara dipimpin Ka UPT Ir H Taufik Batubara MSi, Selasa (12/12/2017) melakukan pemeriksaan IPAL RS USU.&nbsp;Pemeriksaan dilakukan untuk melihat kinerja dari IPAL RS USU yang merupakan tangkapan air area Sungai Deli. Nantinya akan diketahui pemeriksaan akan mengetahui apakah air limbah dibuang melalui outlet sudah di bawah baku mutu sehingga tidak mencemari perairan umum.</p>\r\n\r\n<p>Adapun yang dilihat melalui alat lapangan yakni PH, temperatur, TDS (total dissolved solid atau zat padat terlarut), Turbidity (kekeruhan) dan DO ( kandungan oksigen dalam air). Menurut Taufik Batubara, sepanjang UPT berdiri, baru tahun 2017 dilakukan pemeriksaan terhadap penghasil limbah yang dibuang ke perairan umum. Untuk RS USU PH 7,44, Temperatur 28,3, Conduktivity 1.439, TDS 680, Turbidity 1.48 dan DO 6,84 yang kesemuanya masih tahap normal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kemudian berdasarkan hasil uji mutu limbah bulan November 2017 yang bersumber dari sertifikat pengujian yang dikeluarkan oleh Laboratorium SUCOFINDO menunjukkan nilai di bawah baku mutu dan secara umum dianggap masih dalam ambang batas aman atau tidak mencemari.&nbsp;Berdasarkan saran dan tindaklanjut, pihak BLH Provsu adalah harus terus mengoptimalkan kinerja IPAL agar mampu secara maksimal mengolah air limbah yang dihasilkan.</p>\r\n\r\n<p>Direktur Sarana Prasarana dan Pelayanan Penunjang Dr Achmad Delianur Nasution, ST. MT didampingi Kepala Unit IPAL Eko Wibowo, AMKL saat dihubungi menyampaikan Rumah Sakit USU dibangun dengan dana IDB.&nbsp;Menurut Achmad Delianur Nasution yang juga arsitek RS USU, sejak proposal hingga pembangunan ikut diawasi langsung oleh pihak IDB yang termasuk sangat konsen terhadap standarisasi penanganan limbah RS. Sehingga dari awal desain IPAL RS USU sudah sesuai dengan standar-standar yang berlaku.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Saat ini RS USU memiliki 17 poliklinik yakni anak, bedah, kebidanan dan kandungan, penyakit dalam, THT, mata, syaraf, kulit kelamin, jantung, rehabilitasi medis, bedah syaraf , orthopaedi, bedah anak, tumbuh kembang,psikiatri kesehatan jiwa, paru, anasthesi . Sementara jumlah tempat tidur beroperasional sekarang adalah 109 tempat tidur sementara jumlah tempat tidur akan beroperasional sebanyak 56 tempat tidur. (Humas)</p>\r\n', 'ipal2.jpg', 'display', '0'),
(4, 'Dukung Penuh Penguatan Otonomi Daerah, Fisip USU Kembali Jalin Kerjasama dengan Pemko Medan', '2017-12-14', 'admin', '<p><strong>Pijar/USER, Medan.</strong>&nbsp;Memasuki tahun kedua penyelenggaraanya, Fakultas Ilmu Sosial dan Ilmu Politik (Fisip) Universitas Sumatera Utara (USU) kembali bekerja sama dengan Pemerintah kota Medan&nbsp; mengadakan &lsquo;The 2nd&nbsp;<em>International Conference On Social and Political Development&nbsp;</em>(ICOSOP)&rsquo;&nbsp;di Grand Aston City Hall, Selasa (5/12).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Program ini diikuti oleh 142 peserta berasal dari Program Magister Fisip di beberapa universitas di Indonesia dan&nbsp;berlangsung selama dua hari dari tanggal 4 sampai 5 Desember 2017. ICOSOP 2017 diisi dengan rangkaian presentase hasil penelitian seluruh peserta, serta menghadirkan&nbsp;<em>keynote speaker</em>&nbsp;yaitu staf ahli menteri pendayagunaan aparatur negara, Asman Abrur dan&nbsp;<em>invited speaker</em>&nbsp;antara lain Gindo Tampubolon (University of Manchester) Subilhan (USU), Liu Day Yang (National Taiwan University) dan Jun Borras (ISS The Hague Netherlands).</p>\r\n\r\n<p>Walikota Medan yang&nbsp; diwakili oleh Asisten Pemerintahan Kota Medan,&nbsp; Drs.&nbsp; Musadda, MSi dalam kata sambutannya menyampaikan apresiasi yang tinggi kepada Fisip USU. Menurutnya agenda ini mampu mendorong diri sendiri maupun pemerintah untuk lebih belajar dan belajar, mengingat tantangan ke depan yang semakin terbuka. &quot;Terima kasih atas pelaksanaan yang sangat kita apresiasi, semoga bermanfaat untuk diri pribadi dan masyarakat kota,&quot; ujar ...&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Menanggapi pelaksanaannya, Dekan Fisip USU, Mulyanto Amin merasa lebih maksimal jika dibandingkan tahun lalu. Menurutnya tahun ini ICOSOP menghadirkan pembicara yang relatif memenuhi standar konferensi internsional. Selanjutnya Mulianto Amin juga menjelaskan langkah selanjutnya untuk menghasilkan output setelah kegian ini, antara lain jurnal,&nbsp;<em>proceeding conference index</em>&nbsp;dan rekomendasi hasil penelitian yang akan diserahkan kepada Pemerintah Kota Medan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Melalui hasil rekomendasi tersebut, Dekan FISIP USU,&nbsp; Dr.&nbsp; Muryanto Amin,&nbsp; MSI berharap dapat terwujud dalam bentuk program untuk perbaikan layanan, sarana dan prasarana kota Medan. &ldquo;Dari 142 hasil akan dipilah-pilah untuk dijadikan rekomendasi kepada Pemerintah Kota Medan. Kami berharap hasil rekomendasi ini bisa dijadikan kebijakan program di Kota Medan,&rdquo; tuturnya</p>\r\n', 'Icosop_2.JPG', 'display', '0'),
(5, 'Dies ke- 61, Fakultas Pertanian USU Resmikan Empat Gedung Baru', '2017-12-14', 'admin', '<p><strong>MEDAN &ndash; HUMAS USU</strong>&nbsp;: Empat gedung baru di lingkungan Fakultas Pertanian USU diresmikan pemakaiannya oleh Rektor USU, Prof Dr Runtung, SH, MHum, dalam penandatanganan prasasti yang menjadi rangkaian kegiatan Dies Natalis ke-61 Fakultas Pertanian USU, Kamis (30/11).</p>\r\n\r\n<p>Ke empat gedung tersebut adalah Gedung Laboratorium Biologi, Gedung Agribisnis, Gedung Rumah Kassa yang direnovasi menjadi Gedung Inovasi Bakery serta Gedung Laboratorium Produksi Ternak dan Laboratorium Sosial Ekonomi Perternakan.&nbsp;&nbsp;</p>\r\n\r\n<p>Dies Natalis FP USU yang mengambil tema &ldquo;Peranan Fakultas Pertanian USU Membawa Kopi Sumatera ke Tingkat Dunia&rdquo; itu, menjadi acara puncak dari berbagai kegiatan yang telah digelar sebelumnya. &nbsp;Salah satunya adalah Grand Final Lomba Karya Tulis Ilmiah Mahasiswa Fakultas Pertanian USU yang mengambil tema &ldquo;Mewujudkan Peran Strategis Sumatera Utara Dalam Pembangunan Pertanian&rdquo;.</p>\r\n', 'Dies_FP_2.JPG', 'display', '0'),
(6, 'RS USU Dan Brimob Poldasu Gelar Baksos Operasi Katarak * 1,7 Persen Warga Sumut Menderita Katarak', '2017-12-14', 'admin', '<p>MEDAN : Rumah Sakit Universitas Sumatera Utara bekerjasama dengan Satuan Brigade Mobil Poldasu, Yayasan DR&#39;s Coffee Foundation Medan dan Persatuan Dokter Spesialis Mata Indonesia Sumut menggelar bakti sosial.&nbsp;Bakti sosial bersama itu berupa operasi katarak dan bibir sumbing gratis berlangsung Minggu (10/12/2017) di RS USU Jalan Dr T Mansyur Medan.</p>\r\n', 'Brimob_1.jpg', 'display', '0'),
(7, 'Fakultas Kedokteran USU Gelar International Stem Cell and Oncology Conference', '2017-12-14', 'admin', '<p>MEDAN &ndash; HUMAS USU : Fakultas Kedokteran USU menggelar International Stem Cell and Oncology Conference yang berlangsung dari tanggal 1-2 Desember 2017, bertempat di Aula lt 4 Fakultas Kedokteran USU. Konferensi dibuka oleh Dekan Fakultas Kedokteran USU, Dr dr Aldy Safruddin Rambe, Sp S (K), mewakili Rektor. Konferensi diikuti oleh perwakilan dari berbagai Fakultas Kedokteran dalam dan luar negeri, seperti Belanda, Cuba dan Singapura. Turut menghadiri Sekretaris USU, Dr dr Farhat, Mked (ORL-HNS), Sp THT-KL (K), Wakil Dekan I Fakultas Kedokteran Dr dr Imam Budi Putra, Sp KK dan jajaran pengajar lainnya.</p>\r\n', 'photo3.JPG', 'display', '1'),
(8, 'USU Tuan Rumah Konas II dan Temilnas II Konsorsium Ilmu Biomedik Indonesia', '2017-12-14', 'admin', '<p><strong>MEDAN &ndash; HUMAS USU</strong>&nbsp;: Konsorsium Ilmu Biomedik Indonesia (KIBI) selenggarakan Kongres Nasional (Konas) II dan Temu Ilmiah Nasional (Temilnas) II, bertempat di Aula Fakultas Kedokteran USU Jl Dr Mansyur Medan, 23-24 November 2017. Tema yang diusung adalah &ldquo;Biomedical Sciences on Environment and Human Disease&rdquo; dengan sub tema &ldquo;Aplikasi Iptek untuk Adaptasi Perubahan Iklim&rdquo;.</p>\r\n', 'Konas_2.jpg', 'display', '1'),
(9, 'Sikapi UU No 33/2014, USU Gelar Workshop Pembentukan LPH', '2017-12-14', 'admin', '<p><strong>MEDAN &ndash; HUMAS USU</strong>&nbsp;: Kebutuhan terhadap keberadaan Lembaga Pemeriksa Halal (LPH) dipandang penting dan disambut baik oleh Universitas Sumatera Utara, mengingat pada tahun 2018 mendatang USU akan mulai menggerakkan Badan Usaha Universitas. Maka persiapan untuk pembentukan&nbsp; LPH perlu dilakukan dengan baik dan terencana, termasuk belajar dari IPB dalam rangka melakukan join dengan badan usaha mal, swalayan dan lain sebagainya. Demikian disampaikan Rektor USU, Prof Dr Runtung, SH, MHum, dalam sambutannya pada Workshop Persiapan Pembentukan Lembaga Pemeriksa Halal (LPH) USU, di Ruang Senat Akademik Biro Pusat Administrasi (BPA), Selasa (5/12).</p>\r\n', 'LPH_1.jpg', 'display', '0'),
(10, 'Tes Berita', '2017-12-22', 'admin', '<p>Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.Test berita.</p>\r\n', 'photo3.JPG', 'display', '0'),
(11, 'Work Flow Skripsi Fasilkom-TI', '2018-07-27', 'admin', '<p>Berikut ini berkas yang perlu dipersiapkan sebelum Seminar Proposal :</p>\r\n\r\n<ul>\r\n	<li>1. Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</li>\r\n	<li>2. Fotokopi tanda lunas SPP awal - SPP akhir (semester berjalan)</li>\r\n	<li>3. Lembar Kendal Pra-Seminar Proposal (Form 1-A)</li>\r\n</ul>\r\n\r\n<p>Berkas di atas harus diupload dalam format&nbsp;zip&nbsp;atau&nbsp;rar.</p>\r\n\r\n<p>Format File : nim_NamaBerkas_sempro.rar / nim_NamaBerkas_sempro.zip</p>\r\n\r\n<p>Link Detail Work Flow Skripsi:</p>\r\n\r\n<p><a href=\"https://it.usu.ac.id/wp-content/uploads/2018/03/1521044244wpdm_workflow.pdf\">https://it.usu.ac.id/wp-content/uploads/2018/03/1521044244wpdm_workflow.pdf</a></p>\r\n\r\n<p>Berikut ini berkas yang perlu dipersiapkan sebelum Seminar Proposal :</p>\r\n\r\n<ul>\r\n	<li>1. Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</li>\r\n	<li>2. Fotokopi tanda lunas SPP awal - SPP akhir (semester berjalan)</li>\r\n	<li>3. Lembar Kendal Pra-Seminar Proposal (Form 1-A)</li>\r\n</ul>\r\n\r\n<p>Berkas di atas harus diupload dalam format&nbsp;zip&nbsp;atau&nbsp;rar.</p>\r\n\r\n<p>Format File : nim_NamaBerkas_sempro.rar / nim_NamaBerkas_sempro.zip</p>\r\n', 'WorkFlowSkripsi.jpg', 'display', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_validasi`
--

CREATE TABLE `berkas_validasi` (
  `id` int(255) NOT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `jenis_berkas` enum('sempro','semhas','sidang','validasi_aplikasi','uji_program') DEFAULT NULL,
  `nama_file` varchar(200) DEFAULT NULL,
  `orig_name` varchar(200) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `status_submit` enum('simpan_sementara','submit') DEFAULT NULL,
  `status_verifikasi` enum('belum dikonfirmasi','ditolak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas_validasi`
--

INSERT INTO `berkas_validasi` (`id`, `nim`, `jenis_berkas`, `nama_file`, `orig_name`, `tgl_upload`, `status`, `status_submit`, `status_verifikasi`) VALUES
(1, '141402153', 'sempro', 'form_pengajuan_judul.zip', 'form_pengajuan_judul.zip', '2018-07-19', NULL, 'submit', 'belum dikonfirmasi'),
(2, '141402153', 'uji_program', 'form_pengajuan_judul1.zip', 'form_pengajuan_judul.zip', '2018-07-19', NULL, 'submit', 'belum dikonfirmasi'),
(3, '141402153', 'semhas', 'form_pengajuan_judul2.zip', 'form_pengajuan_judul.zip', '2018-07-19', NULL, 'submit', 'belum dikonfirmasi'),
(4, '141402153', 'sidang', 'form_pengajuan_judul3.zip', 'form_pengajuan_judul.zip', '2018-07-19', NULL, 'submit', 'belum dikonfirmasi'),
(5, '141402153', 'validasi_aplikasi', 'form_pengajuan_judul4.zip', 'form_pengajuan_judul.zip', '2018-07-19', NULL, 'submit', 'belum dikonfirmasi'),
(6, '191402001', 'sempro', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(7, '191402001', 'uji_program', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI1.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(8, '191402001', 'semhas', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI2.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(9, '191402001', 'uji_program', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI3.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(10, '191402001', 'semhas', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI4.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(11, '191402001', 'sidang', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI5.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-24', NULL, 'submit', 'belum dikonfirmasi'),
(12, '201402001', 'sempro', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI6.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-25', NULL, 'submit', 'belum dikonfirmasi'),
(13, '201402001', 'uji_program', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI7.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-25', NULL, 'submit', 'belum dikonfirmasi'),
(14, '201402001', 'semhas', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI8.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-25', NULL, 'submit', 'belum dikonfirmasi'),
(15, '201402001', 'sidang', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI9.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-25', NULL, 'submit', 'belum dikonfirmasi'),
(16, '201402001', 'validasi_aplikasi', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI10.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-10-25', NULL, 'submit', 'belum dikonfirmasi'),
(17, '141402157', 'sempro', 'Tutorial_Setting_CI.zip', 'Tutorial_Setting_CI.zip', '2018-11-18', NULL, 'submit', 'belum dikonfirmasi'),
(18, '141402157', 'uji_program', 'Tutorial_Setting_CI1.zip', 'Tutorial_Setting_CI.zip', '2018-11-20', NULL, 'submit', 'belum dikonfirmasi'),
(24, '141402157', 'semhas', 'Tutorial_Setting_CI9.zip', 'Tutorial_Setting_CI.zip', '2018-11-20', NULL, 'submit', 'ditolak'),
(25, '141402157', 'sidang', 'Tutorial_Setting_CI10.zip', 'Tutorial_Setting_CI.zip', '2018-11-21', NULL, 'submit', 'belum dikonfirmasi'),
(26, '141402220', 'sempro', 'Tutorial_Setting_CI11.zip', 'Tutorial_Setting_CI.zip', '2018-11-22', NULL, 'submit', 'belum dikonfirmasi'),
(27, '141402220', 'uji_program', 'Tutorial_Setting_CI12.zip', 'Tutorial_Setting_CI.zip', '2018-11-22', NULL, 'submit', 'belum dikonfirmasi'),
(28, '141402220', 'semhas', 'Tutorial_Setting_CI13.zip', 'Tutorial_Setting_CI.zip', '2018-11-22', NULL, 'submit', 'belum dikonfirmasi'),
(29, '141402157', 'validasi_aplikasi', 'Tutorial_Setting_CI14.zip', 'Tutorial_Setting_CI.zip', '2018-11-23', NULL, 'submit', 'belum dikonfirmasi'),
(30, '141402200', 'sempro', '6508.rar', '6508.rar', '2018-11-24', NULL, 'submit', 'ditolak'),
(31, '141402200', 'sempro', '26697_fundraising_(3).rar', '26697_fundraising_(3).rar', '2018-11-24', NULL, 'submit', 'ditolak'),
(32, '141402200', 'sempro', '26697_fundraising_(4).rar', '26697_fundraising_(4).rar', '2018-11-24', NULL, 'submit', 'ditolak'),
(33, '141402200', 'sempro', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI11.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-11-24', NULL, 'submit', 'ditolak'),
(35, '141402157', 'semhas', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI13.rar', 'blog_microtrafh_comVerifikasi_Email_menggunakan_CI.rar', '2018-11-24', NULL, 'submit', 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_ilmu`
--

CREATE TABLE `bidang_ilmu` (
  `id` int(10) NOT NULL,
  `bidang_ilmu` varchar(90) DEFAULT NULL,
  `prodi` varchar(10) DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_ilmu`
--

INSERT INTO `bidang_ilmu` (`id`, `bidang_ilmu`, `prodi`, `status`) VALUES
(2, 'Multimedia', 'TIF', 'on'),
(3, 'Computer System', 'TIF', 'on'),
(4, 'Robotika', 'ILK', 'on'),
(6, 'Algoritma', 'ILK', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_perbaikan_sidang`
--

CREATE TABLE `catatan_perbaikan_sidang` (
  `id` int(225) NOT NULL,
  `dosen` char(5) NOT NULL,
  `status_dosen` enum('pembimbing1','pembimbing2','pembanding1','pembanding2') NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(200) NOT NULL,
  `id_jadwal_seminar` char(200) NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `status_perbaikan` enum('belum','sudah') NOT NULL,
  `keterangan_catatan` text NOT NULL,
  `kunci` enum('unlocked','locked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan_perbaikan_sidang`
--

INSERT INTO `catatan_perbaikan_sidang` (`id`, `dosen`, `status_dosen`, `nim`, `id_pengajuan`, `id_jadwal_seminar`, `catatan_perbaikan`, `status_perbaikan`, `keterangan_catatan`, `kunci`) VALUES
(4, 'AML', 'pembimbing1', '141402157', '15', '9', 'Pengambilan kesimpulannya cukup intrik. Perbaiki kesimpulannya.', 'sudah', '', 'locked'),
(5, 'AML', 'pembimbing1', '141402157', '15', '9', 'Perbaikan bab 2', 'sudah', '', 'locked'),
(6, 'MAB', 'pembanding1', '141402157', '15', '9', 'Perbaikan substansi', 'sudah', '', 'locked');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disertasi`
--

CREATE TABLE `disertasi` (
  `id_disertasi` char(20) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_PS` char(5) NOT NULL,
  `judul_skripsi` varchar(50) NOT NULL,
  `kode_pembimbing1` char(9) NOT NULL,
  `kode_pembimbing2` char(9) NOT NULL,
  `Tgl_lulus` date NOT NULL,
  `status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Kode_dosen` char(10) NOT NULL,
  `Nama_dosen` varchar(60) NOT NULL,
  `Pangkat` varchar(25) NOT NULL,
  `Golongan` varchar(25) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `NIDN` varchar(20) NOT NULL,
  `Kode_PS` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`Kode_dosen`, `Nama_dosen`, `Pangkat`, `Golongan`, `NIP`, `NIDN`, `Kode_PS`) VALUES
('ADC', 'Ade Candra, S.T., M.Kom', '', '', '', '', 'ILK'),
('AML', 'Amalia, ST, MT', '', '', '', '', 'TIF'),
('AMS', 'Amer sharif,S.Si.,M.Kom', '', '', '', '', 'ILK'),
('ANL', 'Ainul Hizriadi, S.Kom, M.Sc.', '', '', '', '', 'TIF'),
('ANS', 'Ayu Nuriani Sebayang, S.Kom, M.Kom', '', '', '', '', 'ILK'),
('ASH', 'Drs Agus Salim Harahap, M.Si', '', '', '', '', 'ILK'),
('BHQ', 'Baihaqi Siregar, S.Si,M.T', '', '', '', '', 'TIF'),
('BM', 'Drs.BM Sembiring', '', '', '', '', 'TIF'),
('DDA', 'Dedy Arisandi, ST, M.Kom', '', 'III/c', '12345678910', '', 'TIF'),
('DGW', 'Dani Gunawan, ST, MT', '', '', '', '', 'TIF'),
('DLS', 'Drs. Dahlan Sitompul,M.Eng', '', '', '', '', 'ILK'),
('DRW', 'Dian Rachmawati,S.Si.,M.Kom', '', '', '', '', 'ILK'),
('ELV', 'Dr. Elviawaty Muisa Zamzami, ST, MT, MM', '', '', '', '', 'TIF'),
('ERN', 'Dr. Erna Budhiarti Nababan, M.IT', '', '', '', '', 'TIF'),
('EVW', 'Elviwani, S.T.,S.Kom.,M.Kom', '', '', '', '', 'ILK'),
('FDL', 'Mohammad Fadly Syahputra, B.Sc., M.Sc.IT', '', '', '', '', 'TIF'),
('HDZ', 'Handrizal, S.Si, M.Comp.Sc', '', '', '', '', 'ILK'),
('HYC', 'Herriyance, S.T., M.Kom', '', '', '', '', 'ILK'),
('INA', 'Indra Aulia,S.TI.M.Kom', '', '', '', '', 'TIF'),
('IRT', 'Prof. Dr. Irianto, M.Si', '', '', '', '', 'ILK'),
('IVAN', 'Ivan Jaya, S.Kom, M.Kom.', '', '', '', '', 'TIF'),
('JTT', 'Jos Timanta Tarigan, S.Kom., M.Sc.', '', '', '', '', 'TIF'),
('MAB', 'M. Andri Budiman, ST, M.Comp.Sc., M.E.M', '', '', '', '', 'TIF'),
('MAM', 'Muhammad Anggia Muchtar,ST,MM.IT', '', '', '', '', 'TIF'),
('MHS', 'Drs. Marihat Situmorang, M.Kom', '', '', '', '', 'ILK'),
('MSL', 'Dr. Maya Silvi Lydia, B.Sc., M.Sc.', '', '', '', '', 'TIF'),
('MYD', 'Dr.Mahyudin Nst, M.IT', '', '', '', '', 'TIF'),
('NO', 'Belum Ditentukan (Default)', '', '', '', '', 'NOM'),
('OPM', 'Prof. Dr. Opim Salim Sitompul, M.Sc.', '', '', '', '', 'TIF'),
('PLS', 'Dr. Poltak sihombing, M.Kom', '', '', '', '', 'ILK'),
('RMA', 'Rachmat Aulia, S.Kom, MSc', '', '', '', '', 'ILK'),
('ROM', 'Romi Fadillah Rahmat, B.Comp.Sc., M.Sc.', '', '', '', '', 'TIF'),
('SAF', 'M. Safri Lubis,ST, M.Com', '', '', '', '', 'TIF'),
('SAR', 'Sarah Purnamawati, ST, M.Sc.', '', '', '', '', 'TIF'),
('SDF', 'Siti Dara Fadilah, S.Si, M.IT', '', '', '', '', 'ILK'),
('SJS', 'Sajadin Sembiring, S.Si., M.Comp. Sc', '', '', '', '', 'ILK'),
('SMH', 'Sri Melvani Hardi, S.Kom., M.Kom', '', '', '', '', 'ILK'),
('SNM', 'Seniman, S.Kom, M.Kom', '', '', '', '', 'TIF'),
('SRS', 'Dr. Syahriol Sitorus, S.Si, M.IT', '', '', '', '', 'ILK'),
('SWD', 'Dr. Syawaluddin M.IT', '', '', '', '', 'TIF'),
('SWL', 'Dr. Sawaluddin, M.IT', '', '', '', '', 'TIF'),
('SYE', 'Dr. Syahril Efendi.S.Si,M.IT', '', '', '', '', 'ILK'),
('ULFI', 'Ulfi Andayani, S.Kom, M.Kom', '', '', '', '', 'TIF'),
('VEN', 'Marischa Elveny,S.Ti, M.Kom', '', '', '', '', 'TIF'),
('ZAR', 'Prof.Dr.Muhammad Zarlis', '', '', '', '', 'TIF');

--
-- Trigger `dosen`
--
DELIMITER $$
CREATE TRIGGER `update_dosen` AFTER UPDATE ON `dosen` FOR EACH ROW BEGIN
UPDATE pembimbing SET pembimbing1 = NEW.Kode_dosen WHERE
pembimbing1 = OLD.Kode_dosen ;
UPDATE pembimbing SET pembimbing2 = NEW.Kode_dosen WHERE
pembimbing2 = OLD.Kode_dosen ;
UPDATE pembanding SET pembanding1 = NEW.Kode_dosen WHERE 
pembanding1 = OLD.Kode_dosen ;
UPDATE pembanding SET pembanding2 = NEW.Kode_dosen WHERE 
pembanding2 = OLD.Kode_dosen ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(200) NOT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `folder` int(100) DEFAULT NULL,
  `judul_file` varchar(100) DEFAULT NULL,
  `deskripsi_file` text,
  `akses` enum('public','private') DEFAULT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `jumlah_download` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id`, `nama_file`, `folder`, `judul_file`, `deskripsi_file`, `akses`, `tanggal_submit`, `jumlah_download`) VALUES
(2, 'Jurnal HPI Vol 23 No 1_April 2010.pdf', 1, 'Jurnal HPI Vol 23 No 1_April 2010.pdf', 'Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data Jurnal Dummy Data\r\n', 'public', '2018-02-13', 6),
(3, 'splash.png', 1, 'splash.png', ' Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data Splash Dummy Data', 'public', '2018-02-13', NULL),
(4, 'splash.png.zip', 1, 'splash.png.zip', '', 'public', '2018-02-13', 1),
(5, '26697_fundraising4.rar', 2, '26697_fundraising4.rar', 'Fundraising Dummy Data Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data  Fundraising Dummy Data ', 'public', '2018-02-13', NULL),
(6, '1513754801920.jpg', 2, '1513754801920.jpg', '', 'public', '2018-02-13', NULL),
(9, 'TEST.docx', 2, 'TEST.docx', '', 'public', '2018-02-13', NULL),
(10, 'TEST1.docx', 2, 'TEST1.docx', '', 'public', '2018-02-13', NULL),
(12, 'TEST.docx', 1, 'TEST.docx', '', 'public', '2018-02-17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE `folder` (
  `id` int(50) NOT NULL,
  `nama_folder` varchar(100) DEFAULT NULL,
  `parent_folder` int(100) DEFAULT NULL,
  `akses` enum('public','private') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `folder`
--

INSERT INTO `folder` (`id`, `nama_folder`, `parent_folder`, `akses`) VALUES
(1, 'Teknologi Informasi', 0, 'public'),
(2, 'Birokrasi', 0, 'private'),
(3, 'Dedy Arisandi', 0, 'public');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_dosen`
--

CREATE TABLE `gaji_dosen` (
  `pembimbing1` int(10) NOT NULL,
  `pembimbing2` int(10) NOT NULL,
  `pembanding1` int(10) NOT NULL,
  `pembanding2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_dosen`
--

INSERT INTO `gaji_dosen` (`pembimbing1`, `pembimbing2`, `pembanding1`, `pembanding2`) VALUES
(80000, 80000, 70000, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_seminar`
--

CREATE TABLE `izin_seminar` (
  `id` int(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` int(100) NOT NULL,
  `pembimbing1` date NOT NULL,
  `pembimbing2` date NOT NULL,
  `penguji1` date NOT NULL,
  `penguji2` date NOT NULL,
  `jenis_seminar` enum('sempro','semhas','sidang') NOT NULL,
  `rencana_tgl_seminar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin_seminar`
--

INSERT INTO `izin_seminar` (`id`, `nim`, `id_pengajuan`, `pembimbing1`, `pembimbing2`, `penguji1`, `penguji2`, `jenis_seminar`, `rencana_tgl_seminar`) VALUES
(1, '141402157', 15, '2018-11-18', '2018-11-19', '0000-00-00', '0000-00-00', 'sempro', '2018-11-22'),
(2, '141402157', 15, '2018-11-20', '0000-00-00', '0000-00-00', '0000-00-00', 'semhas', '2018-11-30'),
(3, '141402157', 15, '2018-11-21', '2018-11-21', '0000-00-00', '0000-00-00', 'sidang', '2018-11-22'),
(4, '141402220', 20, '2018-11-22', '2018-11-22', '0000-00-00', '0000-00-00', 'sempro', '2018-11-30'),
(5, '141402220', 20, '2018-11-22', '2018-11-22', '0000-00-00', '0000-00-00', 'semhas', '2018-11-24'),
(6, '141402200', 22, '2018-11-24', '2018-11-24', '0000-00-00', '0000-00-00', 'sempro', '2018-11-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_seminar`
--

CREATE TABLE `jadwal_seminar` (
  `id` int(9) NOT NULL,
  `seminar` enum('seminar proposal','seminar hasil','sidang','') NOT NULL,
  `jadwal` date NOT NULL,
  `batas_sidang` int(10) NOT NULL,
  `pembanding1` char(10) NOT NULL,
  `pembanding2` char(10) NOT NULL,
  `status` enum('selesai','akan datang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_seminar`
--

INSERT INTO `jadwal_seminar` (`id`, `seminar`, `jadwal`, `batas_sidang`, `pembanding1`, `pembanding2`, `status`) VALUES
(3, 'seminar proposal', '2018-07-21', 10, '', '', 'akan datang'),
(4, 'seminar hasil', '2018-07-25', 10, '', '', 'akan datang'),
(5, 'sidang', '2018-07-28', 8, '', '', 'akan datang'),
(6, 'seminar proposal', '2018-10-26', 9, '', '', 'akan datang'),
(7, 'seminar hasil', '2018-10-29', 10, '', '', 'akan datang'),
(8, 'seminar hasil', '2018-10-31', 10, '', '', 'akan datang'),
(9, 'sidang', '2018-10-31', 10, '', '', 'akan datang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kirim_aplikasi`
--

CREATE TABLE `kirim_aplikasi` (
  `id` int(255) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `orig_name` varchar(200) NOT NULL,
  `tgl_upload` date NOT NULL,
  `dosen` enum('pembimbing1','pembimbing2','pembanding1','pembanding2') NOT NULL,
  `status` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kirim_aplikasi`
--

INSERT INTO `kirim_aplikasi` (`id`, `nim`, `nama_file`, `orig_name`, `tgl_upload`, `dosen`, `status`) VALUES
(1, '141402157', 'Tutorial_Setting_CI3.zip', 'Tutorial_Setting_CI.zip', '2018-11-24', 'pembimbing1', 'belum'),
(2, '141402157', '26697_fundraising_(3).rar', '26697_fundraising_(3).rar', '2018-11-24', 'pembimbing1', 'belum'),
(3, '141402157', '26697_fundraising_(3).rar', '26697_fundraising_(3).rar', '2018-11-24', 'pembimbing2', 'belum'),
(4, '141402157', '26697_fundraising_(3).rar', '26697_fundraising_(3).rar', '2018-11-24', 'pembanding1', 'belum'),
(5, '141402157', '26697_fundraising_(3).rar', '26697_fundraising_(3).rar', '2018-11-24', 'pembanding2', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota_bimbingan`
--

CREATE TABLE `kuota_bimbingan` (
  `id` int(250) NOT NULL,
  `kd_dosen` char(10) NOT NULL,
  `stambuk` int(4) NOT NULL,
  `kuota` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuota_bimbingan`
--

INSERT INTO `kuota_bimbingan` (`id`, `kd_dosen`, `stambuk`, `kuota`) VALUES
(1, 'ADC', 2014, 10),
(2, 'AML', 2014, 5),
(3, 'AMS', 2014, 0),
(4, 'ANL', 2014, 10),
(5, 'ANS', 2014, 0),
(6, 'ASH', 2014, 0),
(7, 'BHQ', 2014, 10),
(8, 'BM', 2014, 0),
(9, 'DDA', 2014, 0),
(10, 'DGW', 2014, 0),
(11, 'DLS', 2014, 0),
(12, 'DRW', 2014, 0),
(13, 'ELV', 2014, 0),
(14, 'ERN', 2014, 0),
(15, 'EVW', 2014, 0),
(16, 'FDL', 2014, 0),
(17, 'HDZ', 2014, 0),
(18, 'HYC', 2014, 0),
(19, 'INA', 2014, 0),
(20, 'IRT', 2014, 0),
(21, 'IVAN', 2014, 0),
(22, 'JTT', 2014, 0),
(23, 'MAB', 2014, 0),
(24, 'MAM', 2014, 0),
(25, 'MHS', 2014, 0),
(26, 'MSL', 2014, 0),
(27, 'MYD', 2014, 0),
(28, 'NO', 2014, 0),
(29, 'OPM', 2014, 0),
(30, 'PLS', 2014, 0),
(31, 'RMA', 2014, 0),
(32, 'ROM', 2014, 0),
(33, 'SAF', 2014, 0),
(34, 'SAR', 2014, 0),
(35, 'SDF', 2014, 0),
(36, 'SJS', 2014, 0),
(37, 'SMH', 2014, 0),
(38, 'SNM', 2014, 0),
(39, 'SRS', 2014, 0),
(40, 'SWD', 2014, 0),
(41, 'SWL', 2014, 0),
(42, 'SYE', 2014, 0),
(43, 'ULFI', 2014, 0),
(44, 'VEN', 2014, 0),
(45, 'ZAR', 2014, 0),
(64, 'ADC', 2015, 0),
(65, 'AML', 2015, 8),
(66, 'AMS', 2015, 0),
(67, 'ANL', 2015, 0),
(68, 'ANS', 2015, 0),
(69, 'ASH', 2015, 0),
(70, 'BHQ', 2015, 0),
(71, 'BM', 2015, 0),
(72, 'DDA', 2015, 0),
(73, 'DGW', 2015, 0),
(74, 'DLS', 2015, 0),
(75, 'DRW', 2015, 0),
(76, 'ELV', 2015, 0),
(77, 'ERN', 2015, 0),
(78, 'EVW', 2015, 0),
(79, 'FDL', 2015, 0),
(80, 'HDZ', 2015, 0),
(81, 'HYC', 2015, 0),
(82, 'INA', 2015, 0),
(83, 'IRT', 2015, 0),
(84, 'IVAN', 2015, 0),
(85, 'JTT', 2015, 0),
(86, 'MAB', 2015, 0),
(87, 'MAM', 2015, 0),
(88, 'MHS', 2015, 0),
(89, 'MSL', 2015, 0),
(90, 'MYD', 2015, 0),
(91, 'NO', 2015, 0),
(92, 'OPM', 2015, 0),
(93, 'PLS', 2015, 0),
(94, 'RMA', 2015, 0),
(95, 'ROM', 2015, 0),
(96, 'SAF', 2015, 0),
(97, 'SAR', 2015, 0),
(98, 'SDF', 2015, 0),
(99, 'SJS', 2015, 0),
(100, 'SMH', 2015, 0),
(101, 'SNM', 2015, 0),
(102, 'SRS', 2015, 0),
(103, 'SWD', 2015, 0),
(104, 'SWL', 2015, 0),
(105, 'SYE', 2015, 0),
(106, 'ULFI', 2015, 0),
(107, 'VEN', 2015, 0),
(108, 'ZAR', 2015, 0),
(127, 'ADC', 2019, 0),
(128, 'AML', 2019, 0),
(129, 'AMS', 2019, 0),
(130, 'ANL', 2019, 0),
(131, 'ANS', 2019, 0),
(132, 'ASH', 2019, 0),
(133, 'BHQ', 2019, 10),
(134, 'BM', 2019, 0),
(135, 'DDA', 2019, 0),
(136, 'DGW', 2019, 0),
(137, 'DLS', 2019, 0),
(138, 'DRW', 2019, 0),
(139, 'ELV', 2019, 0),
(140, 'ERN', 2019, 0),
(141, 'EVW', 2019, 0),
(142, 'FDL', 2019, 0),
(143, 'HDZ', 2019, 0),
(144, 'HYC', 2019, 0),
(145, 'INA', 2019, 0),
(146, 'IRT', 2019, 0),
(147, 'IVAN', 2019, 0),
(148, 'JTT', 2019, 0),
(149, 'MAB', 2019, 0),
(150, 'MAM', 2019, 0),
(151, 'MHS', 2019, 0),
(152, 'MSL', 2019, 0),
(153, 'MYD', 2019, 0),
(154, 'NO', 2019, 0),
(155, 'OPM', 2019, 0),
(156, 'PLS', 2019, 0),
(157, 'RMA', 2019, 0),
(158, 'ROM', 2019, 0),
(159, 'SAF', 2019, 0),
(160, 'SAR', 2019, 0),
(161, 'SDF', 2019, 0),
(162, 'SJS', 2019, 0),
(163, 'SMH', 2019, 0),
(164, 'SNM', 2019, 0),
(165, 'SRS', 2019, 0),
(166, 'SWD', 2019, 0),
(167, 'SWL', 2019, 0),
(168, 'SYE', 2019, 0),
(169, 'ULFI', 2019, 0),
(170, 'VEN', 2019, 0),
(171, 'ZAR', 2019, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembar_kendali_bimbingan`
--

CREATE TABLE `lembar_kendali_bimbingan` (
  `id` int(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(100) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `tgl_selesai_diperiksa` date NOT NULL,
  `tgl_terima_kembali` date NOT NULL,
  `catatan` text NOT NULL,
  `pembimbing` enum('pembimbing1','pembimbing2','penguji1','penguji2') NOT NULL,
  `jenis_seminar` enum('sempro','semhas','sidang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembar_kendali_bimbingan`
--

INSERT INTO `lembar_kendali_bimbingan` (`id`, `nim`, `id_pengajuan`, `tgl_penyerahan`, `tgl_selesai_diperiksa`, `tgl_terima_kembali`, `catatan`, `pembimbing`, `jenis_seminar`) VALUES
(3, '141402157', '15', '2018-11-14', '2018-11-16', '2018-11-21', 'Arsitektur Umum', 'pembimbing1', 'sempro'),
(4, '141402157', '15', '2018-11-15', '2018-11-16', '2018-11-20', 'Latar Belakang', 'pembimbing2', 'sempro'),
(5, '141402157', '15', '2018-11-06', '2018-11-14', '2018-11-16', 'Referensi ', 'pembimbing1', 'sempro'),
(7, '141402157', '15', '2018-11-21', '2018-11-23', '2018-11-26', 'Arsitektur Umum Arsitektur Umum ', 'pembimbing1', 'semhas'),
(8, '141402157', '15', '2018-11-21', '2018-11-22', '2018-11-23', 'Code Code Code Code', 'pembimbing1', 'semhas'),
(9, '141402157', '15', '2018-11-21', '2018-11-22', '2018-11-23', 'Code Code 2 2 2 2 2', 'pembimbing2', 'semhas'),
(10, '141402157', '15', '2018-11-21', '2018-11-22', '2018-11-29', 'sahdjasd asjkhdjasd asjhdjas djasd', 'pembimbing2', 'semhas'),
(11, '141402157', '15', '2018-11-22', '2018-11-23', '2018-11-30', 'sdfsdf sdf dsf sd f sdfsd', 'pembimbing1', 'semhas'),
(12, '141402157', '15', '2018-11-22', '2018-11-22', '2018-11-22', 'Perbaikan Seminar Hasil', 'pembimbing1', 'sidang'),
(14, '141402157', '15', '2018-11-22', '2018-11-22', '2018-11-23', 'Perbaikan Algoritma', 'penguji1', 'sidang'),
(15, '141402157', '15', '2018-11-23', '2018-11-23', '2018-11-23', 'asdhjaskd sasajhdas sajhdkajsd', 'pembimbing2', 'sidang'),
(16, '141402157', '15', '2018-11-27', '2018-11-29', '2018-11-30', 'uhsakdhask sahdkjas asdhias', 'penguji1', 'sidang'),
(17, '141402157', '15', '2018-11-23', '2018-11-23', '2018-11-22', 'sdfsadf ewfewas esafsadf', 'penguji2', 'sidang'),
(18, '141402220', '20', '2018-11-23', '2018-11-23', '2018-11-23', 'dskanjksa dwijsdwqs d', 'pembimbing1', 'sempro'),
(19, '141402220', '20', '2018-11-23', '2018-11-24', '2018-11-24', 'adssad sad asdasd', 'pembimbing1', 'sempro'),
(20, '141402220', '20', '2018-11-23', '2018-11-24', '2018-11-26', 'sandjsa dJSA DASIDAS', 'pembimbing2', 'sempro'),
(21, '141402220', '20', '2018-11-24', '2018-11-24', '2018-11-24', 'dbsahd ashdas diasd', 'pembimbing1', 'semhas'),
(22, '141402220', '20', '0000-00-00', '0000-00-00', '0000-00-00', 'jasdj asjdnas dasjdasd', 'pembimbing1', 'semhas'),
(23, '141402220', '20', '2018-11-24', '2018-11-24', '2018-11-24', 'sajdn asJDBAjs dashDSA', 'pembimbing2', 'semhas'),
(24, '141402220', '20', '2018-11-29', '2018-11-30', '2018-11-30', 'jsda asdjas DAIJSdas', 'pembimbing1', 'semhas'),
(25, '141402220', '20', '2018-11-30', '2018-11-30', '2018-11-30', 'kjabSDNA SDHBASdhas', 'pembimbing2', 'semhas'),
(26, '141402200', '22', '2018-11-26', '2018-11-26', '2018-11-26', 'Latar Belakang dan Referensi', 'pembimbing1', 'sempro'),
(27, '141402200', '22', '2018-11-26', '2018-11-26', '2018-11-26', 'Arsitektur Umum', 'pembimbing1', 'sempro'),
(28, '141402200', '22', '2018-11-26', '2018-11-26', '2018-11-26', 'Perbaikan', 'pembimbing2', 'sempro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pencatatan`
--

CREATE TABLE `log_pencatatan` (
  `id` int(255) NOT NULL,
  `user` varchar(30) NOT NULL,
  `nim` char(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_pencatatan`
--

INSERT INTO `log_pencatatan` (`id`, `user`, `nim`, `judul`, `waktu`) VALUES
(5, 'root@localhost', '121402022', 'Identifikasi Penyakit Hypertensive Retinopathy Melalui Citra Fundus Retina Menggunakan Probabilistic', '2017-06-15 04:26:56'),
(6, 'root@localhost', '121402057', 'Pengenalan Gerakan Tangan Manusia Menggunakan Deep Neural Network', '2017-06-15 04:29:07'),
(7, 'root@localhost', '121402060', 'Focused Web Crawler dengan Sistem Terdistribusi', '2017-06-15 04:31:21'),
(8, 'root@localhost', '121402088', 'Clustering Artikel Web Kesehatan dengan Algoritma Self Organizing Maps', '2017-06-15 04:34:25'),
(9, 'root@localhost', '121402008', 'Klasifikasi Jenis Pengaduan Konsumen dari Layanan Media Sosial dengan Menggunakan Text Mining', '2017-06-15 04:37:07'),
(10, 'root@localhost', '121402042', 'Implementasi Pendeteksian Kode Marshaling dengan Algoritma Multi-BLOB Tracking dan Posisi Koordinat ', '2017-06-15 04:40:42'),
(11, 'root@localhost', '121402067', 'Sistem Pendeteksian dan Geotagging Citra Papan Iklan secara Real-Time', '2017-06-15 04:43:35'),
(12, 'root@localhost', '121402078', 'Identifikasi Tanaman Jamur Beracun Menggunakan Pendekatan K-Nearest Neighbor', '2017-06-15 04:45:41'),
(13, 'root@localhost', '121402097', 'Real-Time Monitoring untuk Polusi Air Menggunakan Wireless Sensor Network di Danau Toba', '2017-06-15 04:47:23'),
(14, 'root@localhost', '121402116', 'Peramalan Tingkat Swasembada Beras dengan Metode Radial Basis Function (RBF)', '2017-06-15 04:51:01'),
(15, 'root@localhost', '111402003', 'Desain Routing Information Protocol pada Jaringan Komputer dengan Pengalokasian Jumlah Host Per Netw', '2017-06-15 04:57:25'),
(16, 'root@localhost', '111402005', 'Cashless Payment System untuk Pemesanan Makanan via Ojek sebagai Kurir dengan Pengamanan RSA', '2017-06-15 05:04:19'),
(26, 'root@localhost', '141402156', 'Applikasi Sensor Dalam Kehidupan Sehari-hari', '2017-12-08 21:55:44'),
(27, 'root@localhost', '141402158', 'Algoritma xskcsdkasd', '2017-12-10 11:50:12'),
(28, 'root@localhost', '141402151', 'Sistem Pengintaian dan Kontrol Lalu Lintas Menggunakan RFID dan Citra', '2017-12-12 14:33:40'),
(29, 'root@localhost', '141402003', 'Pemantaun sjkdfnkjsdf wijdfnds', '2017-12-12 15:13:32'),
(32, 'root@localhost', '141402153', 'Open CV dan Pengenalan Warna', '2017-12-14 09:41:05'),
(33, 'root@localhost', '141402155', 'Coba tes', '2017-12-14 09:54:28'),
(34, 'root@localhost', '141402002', 'Test', '2017-12-14 11:18:30'),
(35, 'root@localhost', '141402001', 'Coba', '2017-12-14 11:18:30'),
(36, 'simta@localhost', '141402090', 'Judul judul judul', '2017-12-22 18:28:42'),
(37, 'simta@localhost', '123456789', 'Sistem Cerdas Sekali', '2018-01-18 12:09:32'),
(38, 'simta@localhost', '141401001', 'Judul ', '2018-01-19 15:29:32'),
(39, 'simta@localhost', '141401002', 'Judul', '2018-01-19 16:18:56'),
(40, 'simta@localhost', '777777777', 'Tes', '2018-01-26 19:32:06'),
(41, 'simta@localhost', '141407007', 'test', '2018-01-27 06:34:34'),
(42, 'simta@localhost', '141404004', 'Virtual Reality', '2018-01-27 07:29:09'),
(43, 'simta@localhost', '123412341', 'Trace Reverse', '2018-02-15 07:58:58'),
(44, 'simta@localhost', '121402070', 'Gamifikasi Cerita Rakyat Si Dayang Bandir Menggunakan Unity3D dan Algoritma Fuzzy Logic', '2018-03-22 12:17:30'),
(45, 'simta@localhost', '131402054', 'Implementasi Algoritma Smith pada Aplikasi Pencarian Lagu Dengan Fitur Speech Recognition Berbasis A', '2018-03-22 12:56:47'),
(46, 'simta@localhost', '131402002', 'Perbandingan Metode Wavelet dan K-Means Clustering pada Segmentasi Citra Ulos Batak', '2018-03-22 12:58:33'),
(47, 'simta@localhost', '121402096', 'Klasifikasi Kualitas Biji Kakao Menggunakan Deef Neural Network (DNN)', '2018-03-22 13:00:21'),
(48, 'simta@localhost', '121402032', 'Optimalisasi Pendeteksian Hasil Image Optical Character Recognition (OCR) pada Karakter Arab Menggun', '2018-03-22 13:02:03'),
(49, 'simta@localhost', '121402086', 'Identifikasi Lokasi Fraktur Tulang Tibia dan Fibula Menggunakan Algoritma Ray Tracing', '2018-03-22 13:03:16'),
(50, 'simta@localhost', '131402048', 'Visualisasi Suhu pada Perangkat Server Komputer Menggunakan Metode Spider Web', '2018-03-22 13:04:28'),
(51, 'simta@localhost', '141402014', 'Klasifikasi Kualitas air Minum dalam Kemasan  (AMDK) menggunakan Logika Fuzzy Clustering pada Data h', '2018-03-22 13:08:50'),
(52, 'simta@localhost', '141402093', 'Peramalan Suhu Udara Rata-rata beberapa Kota Besar Dunia Menggunakan Metode Long Short Term Memory', '2018-03-22 13:12:34'),
(53, 'simta@localhost', '141402085', 'Layanan Pemesanan Makanan dengan Speech Recognition menggunakan Recurrent Neural Network Connectioni', '2018-03-22 13:13:45'),
(54, 'simta@localhost', '141402144', 'Simulasi Penentuan Jalur terbaik paket data dengan Protokol Open Flow menggunakan Algoritma Dijkstra', '2018-03-22 13:15:00'),
(55, 'simta@localhost', '141402089', 'Sistem Pendeteksian Radiasi Elektromagnetik menggunakan teknologi Wireless Sensor Network dan metode', '2018-03-22 13:16:29'),
(56, 'simta@localhost', '141402090', 'Aplikasi Chatbot pemesanan Mkaanan menggunakan Metode Text Mining', '2018-03-22 13:19:58'),
(57, 'simta@localhost', '140402092', 'Informasi Bangunan bersejarah Kota Matsum Berbasis Mixed Reality', '2018-03-22 13:21:16'),
(58, 'simta@localhost', '141402065', 'Informasi Bangunan  Universitas  Sumatera Utara Berbasis Augmented Reality', '2018-03-22 13:22:31'),
(59, 'simta@localhost', '141402015', 'Simulasi Protokol OpenFlow pada Software-Defined Networking menggunakan Pica8', '2018-03-22 13:23:35'),
(60, 'simta@localhost', '141402143', 'Simulasi Protokol OpenFlow pada Software-Defined Networking menggunakan Mininet', '2018-03-22 13:26:06'),
(61, 'simta@localhost', '111402097', 'Kombinasi metode rabin-karp dan levenshtein dalam menguji kemiripan dokumen', '2018-03-22 14:01:05'),
(62, 'simta@localhost', '131402006', 'Deep neural network untuk mengidentifikasi penyakit jantung koroner, gagal jantung,dan serangan mend', '2018-03-22 14:02:05'),
(63, 'simta@localhost', '141402096', 'Implementasi manajemen terpusat sumber daya jaringan pada Campus Area Network menggunakan protocol o', '2018-03-22 14:15:32'),
(64, 'simta@localhost', '141402052', 'Identifikasi isyarat tangan (hand gesture)dengan pola alphabet menggunakan arduino dan sensor 3D air', '2018-03-22 14:16:55'),
(65, 'simta@localhost', '131402076', 'Virtual scene pada istana maimun menggunakan hololens berbasis mixed reality', '2018-03-22 14:28:10'),
(66, 'simta@localhost', '131402125', 'Implementasi augmented reality pengenalan benda bersejarah pada museum aceh menggunakan user-defined', '2018-03-22 14:29:33'),
(67, 'simta@localhost', '131402090', 'Identifikasi pneumonia menggunakan convolutional neural network', '2018-03-22 14:30:32'),
(68, 'simta@localhost', '131402078', 'Identifikasi kanker otak menggunakam algoritma learning vector quantization', '2018-03-22 14:31:23'),
(69, 'simta@localhost', '141402002', 'Penentuan popularitas aktor berdasarkan genre film menggunakan fp-growth', '2018-03-22 14:32:20'),
(70, 'simta@localhost', '131402117', 'Klasifikasi Penyakit Stroke menggunakan Backpropagation Neural Network', '2018-03-22 14:34:09'),
(71, 'simta@localhost', '131402009', 'Rancang bangun Sistem deteksi dan Pemetaan lokasi banjir dengan Menggunakan Mikrokontroller dan QGIS', '2018-03-22 14:39:17'),
(72, 'simta@localhost', '141421061', 'Penentuan Jalur terpendek tower base transifer station (BTS) dengan algoritma dijsktra dan formula h', '2018-03-23 07:21:37'),
(73, 'simta@localhost', '141421044', 'Implementasi Algoritma Kriptografi RSA dan Rabin pada tree pass protocol untuk pengamanan data pada ', '2018-03-23 07:23:35'),
(74, 'simta@localhost', '121401103', 'Perbandingan Algoritma Brute Force dan Algoritma A untuk mencari terpendek\r\n', '2018-03-23 07:25:30'),
(75, 'simta@localhost', '121401107', 'Perbandingan Algoritma Simple Hill Climbing dan Algoritma Dijkstra untuk mencari jarak terpendek\r\n', '2018-03-23 07:26:56'),
(76, 'simta@localhost', '131401066', 'Implementasi dan Perbandingan Algoritma Smith dan Algoritma Raita pada pencarian judul skripsi mahas', '2018-03-23 07:28:48'),
(77, 'simta@localhost', '121401001', 'Perbandingan Algoritma Quit Search dan Algoritma Optimal mismatch pada aplikasi kamus istilah potogr', '2018-03-23 07:30:27'),
(78, 'simta@localhost', '131401084', 'Implementasi dan perbandingan algoritma berry-ravindran dan algoritma zhu takaoka pada aplikasi kamu', '2018-03-23 07:31:47'),
(79, 'simta@localhost', '141421004', 'Analisis perbandingan algoritma floyed dan dijsktra dalam pencarian halte lintasan terpendek menuju ', '2018-03-23 07:37:02'),
(80, 'simta@localhost', '121401134', 'Pengamanan pesan dengan kombinasi algoritma kriptografi rives samir adleman (RSA) dan metode stegano', '2018-03-23 07:38:08'),
(81, 'simta@localhost', '111401032', 'Implementasi Algoritma vigenere Chiper dan metode Blowfish untuk keamanan file database berbasis web', '2018-03-23 07:39:24'),
(82, 'simta@localhost', '121401078', 'Implementasi dan analisis algoritma messey-Omura dan algoritma evenrodeh dalam pengamanan dan kompre', '2018-03-23 07:46:36'),
(83, 'simta@localhost', '121401142', 'Perancangan controlel game mobile menggunakan gyroscope dengan algoritma PID dan kalmen-filtering be', '2018-03-23 07:47:57'),
(84, 'simta@localhost', '141421031', 'pengenalan transportasi umum berbasis android dalam bahasa mandarin menggunakan augmented reality \r\n', '2018-03-23 07:51:07'),
(85, 'simta@localhost', '141421090', 'Perancangan aplikasi kriptografi hibrida naccache-stem dan affine chiper dalam pengamanan konten fil', '2018-03-23 07:52:05'),
(86, 'simta@localhost', '121421035', 'Implementasi Algoritma Rabin Karp pada Pendeteksian Kat Keraj dalam Penulisan Bahasa Inggris\r\n', '2018-03-23 07:55:26'),
(87, 'simta@localhost', '121421014', 'Sistem Pakar mendeteksi alergi menggunakan metode bayes dan centairty factor berbasis java pada ruma', '2018-03-23 07:57:36'),
(88, 'simta@localhost', '121401072', 'Implementasi Algoritma thresholding Adaptif dan Tesseract OCR untuk mendeteksi Citra Teks Kemasan ma', '2018-03-23 07:58:51'),
(89, 'simta@localhost', '111401023', 'Implementasi pada hasil citra digital dengan menggunakan perbandingan metode laplacian, laplacian of', '2018-03-23 08:00:14'),
(90, 'simta@localhost', '141421032', 'Implementasi Augmented Reality pada pengenalan alat musik tradisional Aceh berbasis Android\r\n', '2018-03-23 08:01:35'),
(91, 'simta@localhost', '131401048', 'Pengamanan file teks dengan skema hybrid menggunakan algoritma enigma dan algoritma rabin-willams\r\n', '2018-03-23 08:02:39'),
(92, 'simta@localhost', '141421010', 'Implementasi Algoritma S-Djikstra untuk menyelesaikan masalah shortest path dalam kasus pengangkutan', '2018-03-23 08:03:34'),
(93, 'simta@localhost', '141421009', 'pengamanan data teks dengan kombinasi hibrida algoritma naccache-stern dan vernam cipher\r\n', '2018-03-23 08:04:26'),
(94, 'simta@localhost', '131401063', 'Implementasi dan Perbandingan algoritma brute force dengan algoritma simon dalam pembuatan kamus ist', '2018-03-23 08:05:27'),
(95, 'simta@localhost', '121401008', 'Perbandingan Algoritma Floyd-Warshall dan Algoritma Steepest Ascent Hill Climbing dalam pencarian ru', '2018-03-23 08:07:22'),
(96, 'simta@localhost', '131401076', 'Implementasi Hybrid Cryptosystem Algoritma RSA-CRT dan Algoritma RC4+ dalam pengamanan file teks\r\n', '2018-03-23 08:10:32'),
(97, 'simta@localhost', '131401059', 'Perbandingan Algoritma Brute Force dan Algoritma Quick Search pada aplikasi kamus bahasa indonesia-t', '2018-03-23 08:11:31'),
(98, 'simta@localhost', '131401029', 'Implementasi Hybrid cryptosystem algoritma Rprime RSA dan Algoritma RC4A dalam Pengamanan file teks\r', '2018-03-23 08:12:24'),
(99, 'simta@localhost', '121401025', 'Implementasi algoritma RC4 dan Affine Chiper apda aplikasi short message service (SMS) berbasis andr', '2018-03-23 08:13:31'),
(100, 'simta@localhost', '141421008', 'Analisis dan perbandingan Algoritma Brutforce dan Algoritma Horspool pada aplikasi kamus bahasa indo', '2018-03-23 08:14:43'),
(101, 'simta@localhost', '141421120', 'Simulasi Sistem parkir berbasis mikrokontrolel AVR AT Mega pada platform android\r\n', '2018-03-25 14:03:18'),
(102, 'simta@localhost', '141421059', 'Implementasi Algoritma Solin dalam menentukan minimum spanning tree pada jalur pipi air di Universit', '2018-03-25 14:04:16'),
(103, 'simta@localhost', '111421012', 'Perbadingan Algoritma Greedy dan Hill Climbing untuk menentukan fasilitas kesehatan tingkat 1 (FKTP)', '2018-03-25 14:05:39'),
(104, 'simta@localhost', '141421074', 'Perancangan Mobil Robot Pemberi Pakan Unggas Ayam berbasis Arduino Uno AT Mega 328 P dengan sistem k', '2018-03-25 14:08:19'),
(105, 'simta@localhost', '141421118', 'Analisis Asimptotik dan Real Time mengguanakn Algoritma S-Dial untuk menentukan jarak terpendek anta', '2018-03-25 14:10:00'),
(106, 'simta@localhost', '131401126', 'Perbandingan Algoritma Bitap dan Not So Naive pada aplikasi kamus istilah agama islam\r\n', '2018-03-25 14:10:55'),
(107, 'simta@localhost', '131421015', 'Analisis Perbandingan Algoritma Elias Delta Code dan Algoritma Unary Coding dalam mengkompresi file ', '2018-03-25 14:11:45'),
(108, 'simta@localhost', '141421048', 'Implementasi Algoritma Manber Pada persamaan makna bahasa indonesia dan melayu berbasis android\r\n', '2018-03-25 14:12:49'),
(109, 'simta@localhost', '141421060', 'Implementasi perbedaan Algoritma Blum Shub dengan algoritma Quadrate linear congruential generator p', '2018-03-25 14:13:34'),
(110, 'simta@localhost', '141421119', 'Mendeteksi tingkat kekeruahan Air Menggunakan Mikrokontrolel Ardunio Netto dengan sensor Light Depen', '2018-03-25 14:14:27'),
(111, 'simta@localhost', '141421117', 'Analisis Asimptotik dan Real Time menggunakan algoritma L-Deque dalam menentukan jarak terpendek ant', '2018-03-25 14:15:30'),
(112, 'simta@localhost', '141421043', 'Implementasi Algoritma Affine Chiper, RSA CRT dan Alternate unary code dalam pengamanan dan kompresi', '2018-03-25 14:18:10'),
(113, 'simta@localhost', '141421027', 'Analisis perbandingan Algoritma Generate dan Test dengan hill climbing pada penyelesaian travelling ', '2018-03-25 14:19:05'),
(114, 'simta@localhost', '141421094', 'Sistem pendeteksi suhu menggunakan sensor suhu LM35 pada mikrokontroler arduino uno berbasis jaringa', '2018-03-25 14:20:07'),
(115, 'simta@localhost', '131401052', 'Implementasi Kriptografi Hybrid Cryptosystem Menggunakan Algoritma Vigenere Cipher dan Algoritma RSA', '2018-03-25 14:21:11'),
(116, 'simta@localhost', '121401111', 'Implementasi Algoritma S-Ord Untuk Pencarian Rute Terpendek Antar Toko Buku Di Kota Medan\r\n', '2018-03-25 14:21:57'),
(117, 'simta@localhost', '111401067', 'Teknik Pemecahan Kunci Algoritma ElGamal Dengan Metode Index Calculus\r\n', '2018-03-25 14:22:57'),
(118, 'simta@localhost', '111401131', 'Perbandingan Metode Naïve Bayes dan Profile Matching dalam Sistem Pendukung Keputusan Untuk Menentuk', '2018-03-25 14:25:26'),
(119, 'simta@localhost', '111401111', 'Implementasi Kombinasi Algoritma Columnar Transposition Cipher dan Data Encryption Standard pada Apl', '2018-03-25 14:26:29'),
(120, 'simta@localhost', '131401051', 'Mendeteksi Denyut Jantung Dengan Menggunakan Pulse Sensor Pada Arduino Uno Berbasis android\r\n', '2018-03-25 14:27:28'),
(121, 'simta@localhost', '131401049', 'Implementasi Super Enkripsi dengan Algoritma RC4A dan MDTM Cipher pada Pengamanan File PDF Berbasis ', '2018-03-25 14:28:31'),
(122, 'simta@localhost', '131401074', 'Perbandingan Algoritma Morris-Pratt dan Algoritma Horspoll pada Aplikasi Kamus Istilah Telekomunikas', '2018-03-25 14:29:22'),
(123, 'simta@localhost', '131401136', 'Perbandingan Algoritma Steganografi Echo Data Hiding dan Low Bit Encoding dalam Pengamanan File\r\n', '2018-03-25 14:30:18'),
(124, 'simta@localhost', '131401143', 'Implementasi Super Enkripsi dengan Algoritma Variably Modified Permutation Composition (VMPC) dan Tw', '2018-03-25 14:31:01'),
(125, 'simta@localhost', '131401134', 'Implementasi Super Enkripsi dengan Algoritma Trithemius dan Double Transposition Cipher Pada Pengama', '2018-03-25 14:31:51'),
(126, 'simta@localhost', '131401032', 'Perancangan Sistem Pengatur Suhu Air Bathup Berbasis Mikrokontroller Arduino\r\n', '2018-03-25 14:32:39'),
(127, 'simta@localhost', '131401062', 'Implementasi Deteksi Tepi Canny dan Isotropik dengan Transformasi Power Law Studi Kasus Kanker Mulut', '2018-03-25 14:33:39'),
(128, 'simta@localhost', '131401060', 'Perbandingan Algoritma L-Deque dan Algoritma Greedy dalam Menentukan Rute Terpendek Antar Tempat Wis', '2018-03-25 14:34:28'),
(129, 'simta@localhost', '131401078', 'Pengamanan File Teks dengan Hybrid Cryptosystem Algoritma Knapsack Noccache-Stern dan Algoritma Play', '2018-03-25 14:35:21'),
(130, 'simta@localhost', '131401026', 'Implementasi Kombinasi Algoritma Beaufort Dan Algoritma Spritz Dalam Skema Super Enkripsi Untuk Peng', '2018-03-25 14:36:22'),
(131, 'simta@localhost', '131401122', 'Implementasi Algoritma Zig-Zag Cipher dan Algoritma RC4+ Cipher Dalam Skema Super Enkripsi Untuk Pen', '2018-03-25 14:37:11'),
(132, 'simta@localhost', '131401041', 'Sistem absensi Menggunakan Wajah Pada Jaringan Syaraf Tiruan Dengan Algoritma Learning Vector Quanti', '2018-03-25 14:37:53'),
(133, 'simta@localhost', '131401105', 'Implementasi Algoritma Dijkstra dalam Pencarian Restoran Fastfood Terdekat di Kota Medan Berbasis Si', '2018-03-25 14:38:58'),
(134, 'simta@localhost', '131401117', 'Implementasi dan Perbandingan Algoritma Optimal Mismatch dan Algoritma Rabin-Karp Pada Kamus Istilah', '2018-03-25 14:39:25'),
(135, 'simta@localhost', '131401073', 'Implementasi Algoritma Elias Delta dan Algoritma ElGamal Dalam Kompresi dan Pengamanan Citra\r\n', '2018-03-25 14:40:36'),
(136, 'simta@localhost', '131401129', 'Implementasi Algoritma Bellman-Ford dalam Pencarian Sekolah Taman Kanak-kanak (TK) Terdekat di Kota ', '2018-03-25 14:41:43'),
(137, 'simta@localhost', '131401085', 'Implementasi Algoritma Kriptografi Hill Cipher dan Kompresi Data Menggunakan Algoritma Levenstein da', '2018-03-25 14:42:29'),
(138, 'simta@localhost', '131401114', 'Implementasi Hybrid Cryptosystem Algoritma TEA (Tiny Encryption Algorithm) dan Algoritma LUC dalam P', '2018-03-25 14:43:06'),
(139, 'simta@localhost', '131401107', 'Implementasi Content Based Video Retrieval Menggunakan Speeded-up Robust Features (SURF)\r\n', '2018-03-25 14:43:55'),
(140, 'simta@localhost', '111401068', 'Analisis Perbandingan Metode Bandpass Filter dan Metode Bandreject Filter Pada Domain Frekuensi Untu', '2018-03-25 14:46:13'),
(141, 'simta@localhost', '101421024', 'Sistem Pakar Untuk Mendeteksi Masalah Kewanitaan Menggunakan Metode Certainty Factor Dengan Teknik A', '2018-03-25 14:47:16'),
(142, 'simta@localhost', '141421088', 'Implementasi Algoritma Greedy Dengan Algoritma Floyd-Warshall Untuk Menentukan Jarak Terpendek (Stud', '2018-03-25 14:48:16'),
(143, 'simta@localhost', '121401016', 'Implementasi algoritma Knuth Morris Pratt Pada Aplikasi Penerjemah Teks Bahasa Indonesia - Mandailin', '2018-03-25 14:49:02'),
(144, 'simta@localhost', '141421054', 'Implementasi Algoritma Genetika Dalam Penjadwalan Shift Kerja di Call Center Telkomsel Medan\r\n', '2018-03-25 14:49:58'),
(145, 'simta@localhost', '131421029', 'Analisis Perbandingan Algoritma Huffman dan Algoritma Sequitur Dalam Kompresi Data Text\r\n', '2018-03-25 14:50:49'),
(146, 'simta@localhost', '131401028', 'Implementasi Thresholding Metode Otsu Dan Tesseract OCR Engine Untuk Menerjemahkan Teks Berbahasa Je', '2018-03-25 14:51:42'),
(147, 'simta@localhost', '131401013', 'Implementasi Operasi XOR dan Teknik Transposisi Segitiga untuk Pengamanan Citra JPEG Berbasis Androi', '2018-03-25 14:52:30'),
(148, 'simta@localhost', '131401070', 'Implementasi Algoritma Vernam Cipher dalam Skema Three-Pass Protocol untuk Pengamanan Citra Bitmap B', '2018-03-25 14:53:11'),
(149, 'simta@localhost', '131401043', 'Implementasi Kriptografi Hybrid Algoritma ElGamal Dan Double Playfair Cipher dalam Pengamanan File J', '2018-03-25 14:53:49'),
(150, 'simta@localhost', '131401012', 'Implementasi Algoritma Floyd-Warshall dalam Pencarian Pasar Tradisional Terdekat di Kota Medan Berba', '2018-03-25 14:54:39'),
(151, 'simta@localhost', '111401100', 'Implementasi Algoritma Hill Cipher pada Aplikasi  Enkripsi dan Diskripsi Citra Berbasis Android\r\n', '2018-03-25 14:55:31'),
(152, 'simta@localhost', '131401015', 'Perancangan dan Pembuatan Kontrol Monitoring Suhu Secara Otomatis dalam Budidaya Jamur Tiram Berbasi', '2018-03-25 14:56:22'),
(153, 'simta@localhost', '131401004', 'Perancangan Sistem Alir Larutan Nutrisi Otomatis pada Tanaman Hidroponik dengan Mikrokontroler Aduin', '2018-03-25 14:57:12'),
(154, 'simta@localhost', '131401004', 'Perancangan Sistem Alir Larutan Nutrisi Otomatis pada Tanaman Hidroponik dengan Mikrokontroler Aduin', '2018-03-25 14:57:13'),
(155, 'simta@localhost', '131401056', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Antara algoritma One Time Pad dan RSA CRT\r\n', '2018-03-25 14:58:03'),
(156, 'simta@localhost', '131401007', 'Pengamanan File Menggunakan Algoritma Tranposisi Segitiga dan Algoritma RSA-CRT dalam Skema Hybrid C', '2018-03-25 14:59:02'),
(157, 'simta@localhost', '131401008', 'Perbandingan Algoritma Knuth-Morris-Pratt dan Algoritma Apostolic-Crochmore pada Aplikasi Kamus Baha', '2018-03-25 14:59:46'),
(158, 'simta@localhost', '131401197', 'Implementasi Hybrid Cryptosystem Algoritma EL Gamal dan Algoritma Camellia dalam Aplikasi E-mail Ber', '2018-03-25 15:00:21'),
(159, 'simta@localhost', '131401082', 'Pengamanan tile Teks Menggunakan Algoritma Kriptografi RC4 dan Algoritma Kompresi Even Rodeh Code\r\n', '2018-03-25 15:17:27'),
(160, 'simta@localhost', '131401022', 'Pengamanan file citra dengan skema hybrid cryptosystem menggunakan algoritma RSA-CRT dan Affine Ciph', '2018-03-25 15:18:08'),
(161, 'simta@localhost', '131401010', 'Implementasi kriptografi hybrid crypto system algoritma RSA-Naïve dan Algoritma Zig-zag dalam pengam', '2018-03-25 15:19:00'),
(162, 'simta@localhost', '131401018', 'Perbandingan Algoritma Not So Naïve dan Two Way pada aplikasi kamus bahasa indonesia-Arab berbasis A', '2018-03-25 15:22:40'),
(163, 'simta@localhost', '131401057', 'Pengamanan teks dengan Hybrid Cryptosystem Algoritma Multi-Power RSA dan Algoritma Blowfish\r\n', '2018-03-25 15:23:16'),
(164, 'simta@localhost', '111401078', 'Implementasi kriptografi Hybrid algoritma Fast Data Encipherment algorithm (FEAL) dan Goldwasser-Mic', '2018-03-25 15:23:57'),
(165, 'simta@localhost', '121401100', 'Penentuan Lokasi Doorsmeer Terdekat di kota medan dengan algoritma S-Ord\r\n', '2018-03-25 15:24:41'),
(166, 'simta@localhost', '141421005', 'Perbandingan Algoritma Bitonic, Sort, Odd-Even Sort dan Comb sort \r\n', '2018-03-25 15:25:39'),
(167, 'simta@localhost', '141421122', 'Implementasi Augmented Reality Pembelajaran bahasa jepang pada pengenalan perabotan kamar tidur meng', '2018-03-25 15:26:19'),
(168, 'simta@localhost', '141421024', 'Menentukan Minimum Spanning Tree pada pemasangan kabel Fiber Optik jaringan 4G di Universitas Sumate', '2018-03-25 15:27:05'),
(169, 'simta@localhost', '141421034', 'Implementasi Augmented Reality (AR) pengenalan Alat Musik Terompt Reog Jawa Timur Berbasis Android\r\n', '2018-03-25 15:27:50'),
(170, 'simta@localhost', '121401119', 'Pengamanan File Teks Menggunakan Algoritma Kriptografi RC4-Spritz dan Algoritma Kompresi Bolding-Vig', '2018-03-25 15:28:39'),
(171, 'simta@localhost', '131401035', 'Studi Perbandingan kinerja Teoretis dan rill algoritma exact string matching shift-and dan morris-pr', '2018-03-25 15:29:15'),
(172, 'simta@localhost', '101401050', 'Implementasi algoritma C4.5 untuk perekrutan karyawan berbasis android (studi kasus : blackberry ser', '2018-03-25 15:29:46'),
(173, 'simta@localhost', '121401026', 'Penggunaan Mikrokontroler Ardunio Due Berbasis android dengan algoritma IDEA untuk istem keamanan se', '2018-03-25 15:30:20'),
(174, 'simta@localhost', '121401120', 'Implementasi Algoritma S-Dial Dalam pencarian Rute terpendek pada bengkel mobil di kota medan', '2018-03-25 15:30:55'),
(175, 'simta@localhost', '121401141', 'Perbandingan Algortma A* dengan Algoritma Bellman-Ford dalam mencari jalur terpendek (Toko Buku diko', '2018-03-25 15:31:37'),
(176, 'simta@localhost', '121401116', 'Implementasi Hybrid Cryptosystem algoritma IDEA dan Knapsack dalam pengamanan file Docx\r\n', '2018-03-25 15:32:10'),
(177, 'simta@localhost', '141421044', 'Implementasi Algoritma Kriptografi RSA dan Rabin pada Three-Pass Protocol untuk pengamanan data pada', '2018-03-25 15:32:44'),
(178, 'simta@localhost', '141421091', 'Implementasi Augmented Reality (AR) pada aplikasi kosa kata peralatan rumah tangga dalam bahasa ingg', '2018-03-25 15:33:19'),
(179, 'simta@localhost', '141421037', 'pengamanan dan Kompresi citra dengan algoritma rebalanced RSA dan Punctured Elias Code', '2018-03-25 17:46:01'),
(180, 'simta@localhost', '141421092', 'perbandingan kompleksitas waktu teoretis dan real time algoritma strand soft, sieve sort, gnome sort', '2018-03-25 17:46:41'),
(181, 'simta@localhost', '141421014', 'perancangan robot pembuat biopori berbasis arduino uno atmega328P dengan sistem kendali smartphone a', '2018-03-25 17:47:25'),
(182, 'simta@localhost', '121421065', 'Sistem Pendukung keputusan pemilihan mobil pada segmen MPV (Multipurpose vehicle) menggunakan metode', '2018-03-25 17:48:30'),
(183, 'simta@localhost', '121421017', 'Analisis Kinerja Algoritma Elia Omega dan Elgoritma Fixed Length Binary Encoding pada Kompresi File ', '2018-03-25 17:49:22'),
(184, 'simta@localhost', '121401075', 'Implementasi Jaringan Saraf Tiruan Self Organizing Map Kohonen dengan Menggunakan metode Linear Disc', '2018-03-25 17:51:30'),
(185, 'simta@localhost', '121421091', 'Implementasi metode AHP dan PROMETHEE untuk merangking mobil jenis SUV\r\n', '2018-03-25 17:52:25'),
(186, 'simta@localhost', '121421024', 'Perancangan Aplikasi kamus kanji bahasa jepang dengan menggunakan metode string matching knuth-morri', '2018-03-25 17:53:06'),
(187, 'simta@localhost', '141421023', 'perbandingan algoritma alternate reverse unary codes dan algoritma run length encoding (RLE) pada ko', '2018-03-25 17:54:12'),
(188, 'simta@localhost', '131421028', 'Implementasi Augmented Reality (AR) dalam pengenalan jamur yang berkhasiat bagi kesehatan.\r\n', '2018-03-25 17:54:53'),
(189, 'simta@localhost', '131401063', 'Implementasi dan Perbandingan algoritma brute force dengan algoritma simon dalam pembuatan kamus ist', '2018-03-25 17:55:30'),
(190, 'simta@localhost', '121401045', 'perbandingan algoritma pencocokan kata menggunakan algoritma Knuth-Morris-Pratt dan algoritma rabin-', '2018-03-25 17:56:14'),
(191, 'simta@localhost', '141421126', 'Implemantasi algoritma runut balik (backtracking) dalam penyelesain permainan Puzzle sudoku berbais ', '2018-03-25 17:56:54'),
(192, 'simta@localhost', '141421006', 'Sistem keamanan rumah berbasis minikomputer raspberry Pi Via SMS Menggunakan Kamera Sensor, PIR dan ', '2018-03-25 17:57:28'),
(193, 'simta@localhost', '131421026', 'Implementasi augmented reality (AR) sebagai media pengenalan flora dan fauna bawah laut berbasis and', '2018-03-25 17:58:05'),
(194, 'simta@localhost', '121421002', 'Analisis kinerja algoritma golbach codes dengan algoritma variabel length binary encoding (VLBE) dal', '2018-03-25 17:58:41'),
(195, 'simta@localhost', '141421073', 'Analisis algoritma lempel-Ziv Welch (LZW), arithmatic Coding (AC) dan kombinasi algoritma LZW-AC pad', '2018-03-25 17:59:26'),
(196, 'simta@localhost', '141421056', 'Implementasi kriptografi Hybrid pada algoritma One Time Pad (OTP) dan Algoritma Micali Goldwasser\r\n', '2018-03-25 17:59:59'),
(197, 'simta@localhost', '101421040', 'Sistem pendukung keputusan untuk mencari restauran terbik dikota medan berbasis sistem informasi geo', '2018-03-25 18:01:31'),
(198, 'simta@localhost', '091401029', 'Pengenalan Pola Karakter dan Penerjemah Aksara Katakana Menggunakan Implementasi Algoritma Associati', '2018-03-25 18:02:16'),
(199, 'simta@localhost', '121421088', 'Implementasi Ruby Game Scripting system pada game ludo \r\n', '2018-03-25 18:03:00'),
(200, 'simta@localhost', '121421096', 'Implementasi Algoritma Interative Dichotomizer Three (ID3) untuk pemilihan sepeda motor\r\n', '2018-03-25 18:03:42'),
(201, 'simta@localhost', '111401052', 'implementasi steganografi hopping spread spectrum ke dalam file video\r\n', '2018-03-25 18:04:17'),
(202, 'simta@localhost', '121401013', 'Pencarian Shortesst-Path antar puskesmas kota medan menggunakan algoritma floyd-warshall dan L-Deque', '2018-03-25 18:05:02'),
(203, 'simta@localhost', '111401125', 'Implementasi algoritma djikstra pada game pak raden dan pak ogah\r\n', '2018-03-25 18:05:37'),
(204, 'simta@localhost', '111421012', 'Perbandingan Greedy dan Hill Climbing untuk menentukan fasilitas kesehatan tingkat pertama (FKTP) te', '2018-03-25 18:06:16'),
(205, 'simta@localhost', '141421043', 'Implementasi Algoritma Affine Chiper, RSA CRT dan Alternate unary code dalam pengamanan dan kompresi', '2018-03-25 18:06:46'),
(206, 'simta@localhost', '141421027', 'Analisis perbandingan Algoritma Generate dan Test dengan hill climbing pada penyelesaian travelling ', '2018-03-25 18:07:27'),
(207, 'simta@localhost', '141421117', 'Analisis Asimptotik dan Real Time menggunakan algoritma L-Deque dalam menentukan jarak terpendek ant', '2018-03-25 18:09:01'),
(208, 'simta@localhost', '141421059', 'Implementasi Algoritma Solin dalam menentukan minimum spanning tree pada jalur pipi air di Universit', '2018-03-25 18:09:40'),
(209, 'simta@localhost', '141421114', 'Simulasi Algoritma Stable Marriage Kiraly Dalam menentukan Calon Pasangan Hidup\r\n', '2018-03-25 18:13:18'),
(210, 'simta@localhost', '131401137', 'Implemntasi Algoritma Beaufort Cipher dan pada Aplikasi Short Message Service (SMS) Berbasis Android', '2018-03-29 08:31:29'),
(211, 'simta@localhost', '131401036', 'Perbandingan Galil-Seiferas danReverse Colussi pada Kamus Istilah Antropologi Berbasis Android', '2018-03-29 08:33:51'),
(212, 'simta@localhost', '131401001', 'Pengamanan File Teks Dengan Algoritma Rabin dan Algoritma Steganografi First Of File dan End Of File', '2018-03-29 08:34:39'),
(213, 'simta@localhost', '131401064', 'Pengamanan File Teks dengan Algoritma Kunci Publik RSA dan Algoritma Steganografi Select Least Signi', '2018-03-29 08:35:38'),
(214, 'simta@localhost', '131401065', 'Perbandingan Algoritma dan Algoritma Quick Search pada Aplikasi kamus Bahasa Indonesia - Bahasa Pera', '2018-03-29 08:36:33'),
(215, 'simta@localhost', '131401021', 'Perbandingan Algoritma Heuristik Random Walk dan Algoritma Deterministik L- Deque untuk Pencarian ja', '2018-03-29 08:38:02'),
(216, 'simta@localhost', '111401075', 'Perbandingan Algoritma Bitap dan Algoritma Horspool pada Aplikasi  kamus Ekabahasa Indonesia pada Pl', '2018-03-29 08:39:07'),
(217, 'simta@localhost', '111401092', 'Implementasi Digital Signatura pada File Text dengan Menggunakan Algoritma Schnorr Berbasis android', '2018-03-29 08:40:14'),
(218, 'simta@localhost', '111401084', 'Analisis Perbandingan Kombinasi Metode Alpha-Trimmed Mean Filter, Geometric Mean Filter, dan Kombina', '2018-03-29 08:41:15'),
(219, 'simta@localhost', '101401084', 'Kombinasi Kriptografi RSA dengan Algoritma Kriptografi NOEKEON untuk Pengamanan Teks', '2018-03-29 08:42:19'),
(220, 'simta@localhost', '111401112', 'Implementasi Augmented Reality (AR) dalam Menampilkan jadwal IKLC', '2018-03-29 08:43:36'),
(221, 'simta@localhost', '111401066', 'Implementasi Algoritma Golomb-Rice Coding Untuk Kompresif File Citra Berbasis android', '2018-03-29 08:44:43'),
(222, 'simta@localhost', '111401130', 'Implementasi dan Perbandingan Algoritma Apostolica-Goancarlo dan Horspool pada kamus Efek Visual', '2018-03-29 08:45:39'),
(223, 'simta@localhost', '121401102', 'Perbandingan Algoritma Messege Diggest 5 (MD5) dan Sha 256 pada Hashing File Dokumen', '2018-03-29 08:46:38'),
(224, 'simta@localhost', '121401046', 'Analisis Optimisasi Klasterisasi Dokumen Berbahasa Indonesia Dengan Metode Pembobotan Term Frequency', '2018-03-29 08:48:02'),
(225, 'simta@localhost', '121401039', 'Perbandingan Algoritma Raita dan Horspool pada Aplikasi Kamus Bahasa Jerman- Bahasa Indonesia Berbas', '2018-03-29 08:49:21'),
(226, 'simta@localhost', '131401033', 'Implementasi dan Perbandingan Algoritma  Berry-Raviindran dan Algoritma Rabin-Karp pada Kamus Istila', '2018-03-29 08:50:18'),
(227, 'simta@localhost', '131401027', 'Studi Kompresi kinerja Algoritma Goldbact G1 Code dan Algoritma Unary Codes dalam Kompresi text', '2018-03-29 08:51:30'),
(228, 'simta@localhost', '131401023', 'Perbandingan Kinerja Algoritma Fobonacci Codes dan Algoritma Reverse Unary Codes dalam Kompresi Citr', '2018-03-29 08:52:27'),
(229, 'simta@localhost', '131401046', 'Pengamanan File PDF Dengan Sistem Kriptografi Hibrida Algoritma RSA With Chinese Remaindev Thearem (', '2018-03-29 08:53:26'),
(230, 'simta@localhost', '131401053', 'Perbandingan Algoritma Boyer- Moore dan Horspool pada Aplikasi Kamus Bahasa Indonesia- Minang Berbas', '2018-03-29 08:54:29'),
(231, 'simta@localhost', '131401089', 'Perbandingan Algoritma Not So Na?ve dan Algoritma Shift dalam Aplikasi kamus bahasa Indonesia - Baha', '2018-03-29 08:56:04'),
(232, 'simta@localhost', '131401091', 'Implementasi Algiritma Affine dan Metode Spread Spectrum untuk Pengamanan File Teks', '2018-03-29 08:57:08'),
(233, 'simta@localhost', '121401135', 'Analisis dan Implementasi Kombinasi Algoritma Skipjack dan Algoritma Mcaliece pada Pengamanan File t', '2018-03-29 08:58:06'),
(234, 'simta@localhost', '131401014', 'Perbandingan Algoritma Rabin karp dan Algoritma Knuth Morris Pratt pada Aplikasi kamus bahasa indone', '2018-03-29 08:59:06'),
(235, 'simta@localhost', '121401136', 'Perbandingan AlgoritmaPerbandingan Algoritma Gale-Shapley dan Irving dalam Stable Matching Problem P', '2018-03-29 09:00:20'),
(236, 'simta@localhost', '121401136', 'Perbandingan AlgoritmaPerbandingan Algoritma Gale-Shapley dan Irving dalam Stable Matching Problem P', '2018-03-29 09:00:20'),
(237, 'simta@localhost', '121401136', 'Perbandingan AlgoritmaPerbandingan Algoritma Gale-Shapley dan Irving dalam Stable Matching Problem P', '2018-03-29 09:04:47'),
(238, 'simta@localhost', '131401058', 'Implementasi Hybrid Cryptosystem Algoritma  RSA-CRT dan Algoritma MDMT (Monograph Digrap Transpositi', '2018-03-29 09:05:50'),
(239, 'simta@localhost', '121401032', 'Perbandingan Algoritma Bellman-Ford dan Algoritma Floyd-Marshal dalam Pencarian Rute Terpendek Studi', '2018-03-29 09:07:04'),
(240, 'simta@localhost', '131401069', 'Perbandingan Algoritma String Matching On Orderan Alphabets dan Algoritma Simon dalam Kamus Istilah ', '2018-03-29 09:07:55'),
(241, 'simta@localhost', '121401004', 'Implementasi Pengamanan Data Teks dengan Metode Internasional Data Encryption Algoritma (IDEA) Berba', '2018-03-29 09:08:54'),
(242, 'simta@localhost', '121401049', 'Perancangan Kamus Jerman Indonesia dengan Membandingkan Algoritma Sting Mathcing Turbo Boyer-Moore d', '2018-03-29 09:09:53'),
(243, 'simta@localhost', '131401031', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Algoritma Multi-Factor RSA dan Algoritma Play', '2018-03-29 09:11:01'),
(244, 'simta@localhost', '121401068', 'Perbandingan Algoritma Horspol dab Not So Na?ve dalam Pembuatan Kamus Bahasa Indonesia-Bahasa Aceh B', '2018-03-29 09:11:52'),
(245, 'simta@localhost', '121401021', 'Perbandingan Teoretis dan Riil Algoritma Multiprime RSA dan Prime RSA pada Pengamanan File Dokumen', '2018-03-29 09:12:53'),
(246, 'simta@localhost', '131401044', 'Perbandingan Algoritma Floyd-Marshall dan Bellman-Ford dalam Pencarian Jarak Terpendek Antar ATM di ', '2018-03-29 09:14:22'),
(247, 'simta@localhost', '131401102', 'Implementasi Three-Pass Protocal dengan Kombinasi Algoritma Vigenere Cipher dan Algoritma One Time P', '2018-03-29 09:15:54'),
(248, 'simta@localhost', '131401094', 'Pembangunan Aplikasi Volunteer Computing Berbasis Dekstop untuk Melakukan Proses Ray Tracing', '2018-03-29 09:16:54'),
(249, 'simta@localhost', '121401069', 'Implementasi Algotima Binary Search dan Metode Approximate Sting Matching pada Voice to Voice Transl', '2018-03-29 09:17:49'),
(250, 'simta@localhost', '121401005', 'Analisis Algoritma Rabin dan Algoritma Elias Omega Code dalam Pengamanan dan Kompresi File Teks', '2018-03-29 09:18:55'),
(251, 'simta@localhost', '131401079', 'Pengamanan Citra dengan Algoritma Kriptografi VMPC dan Algoritma Steganografi LSB dengan Penyisipan ', '2018-03-29 09:19:42'),
(252, 'simta@localhost', '121401037', 'Pengamanan File Teks dengan Menggunakan Algoritma Skipjack dan Kompresi Algortima Taboo', '2018-03-29 09:20:47'),
(253, 'simta@localhost', '131401087', 'Membangun Rancangan Aplikasi Sistem Server Terbuka(Open Lobby) untuk Mendukung Fitur Multiplayer pad', '2018-03-29 09:21:57'),
(254, 'simta@localhost', '131401006', 'Pengembangan Protokol Fitur Multiplayer pada Permainan Satu Lawan Satu Dengan Menggunakan', '2018-03-29 09:23:06'),
(255, 'simta@localhost', '131401110', 'Kombinasi Algoritma RC5 Block Cipher dan Algoritma Rebalances RSA dalam Pengamanan Pesan Instan', '2018-03-29 09:23:53'),
(256, 'simta@localhost', '131401016', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Menggunakan Algoritma LUC dan Algoritma MDTM ', '2018-03-29 09:25:29'),
(257, 'simta@localhost', '131401011', 'Implementasi Konsep Hybrid Algoritma RSA-Na?ve dan Algoritma RC4+ dalam Pengamanan File JPG pada Apl', '2018-03-29 09:27:06'),
(258, 'simta@localhost', '131401019', 'Pengenalan Plat Kendaraan Bermotor Menggunakan Algoritma Local Threshold, Normalisasi, Segmentasi, L', '2018-03-29 09:28:09'),
(259, 'simta@localhost', '131401116', 'Implementasi Algoritma Elgamal dan Algoritma One-Time Pad (OTP) dalam Pengaman File Audio Berbasis D', '2018-03-29 09:28:55'),
(260, 'simta@localhost', '131401039', 'Penerapan Hybrid Cryptosystem Algoritma Variably Modified Permutation Composition (VMPC) dan Algorit', '2018-03-29 09:29:43'),
(261, 'simta@localhost', '131401025', 'Klasifikasi Analisi Sentimen Optical Character Recognition (OCR) dan Algoritma Naive Bayes', '2018-03-29 09:30:39'),
(262, 'simta@localhost', '131401061', 'Implementasi Kriptografi Hybrid Algoritma One Time Pad (OTP) dan RSA Rprime dalam Pengamanan File Te', '2018-03-29 10:02:46'),
(263, 'simta@localhost', '131401132', 'Implementasi Algoritma RC4+ dan Rabin-Williams dalam Skema Hybrid Cryptosystem dalam Pengamanan File', '2018-03-29 10:03:33'),
(264, 'simta@localhost', '121401028', 'Implementasi Kriptografi Algoritma Skipjack & Steganografi LSB pada Citra Digital', '2018-03-29 10:04:16'),
(265, 'simta@localhost', '131401074', 'Implementasi Kombinasi Algoritma Multi-Factor RSA dan Hill Cipher 4x4 dalam Skema Kriptografi Hibrid', '2018-03-29 10:05:03'),
(266, 'simta@localhost', '131401096', 'Implementasi dan Perbandingan Algoritma Reverse Collusi dan Algoritma Raita pada Aplikasi Pencarian ', '2018-03-29 10:06:05'),
(267, 'simta@localhost', '131401030', 'Implementasi Algoritma Greedy dalam Pencarian Car Wash Terdekat di Kota Medan Berbasis Sistem Inform', '2018-03-29 10:06:56'),
(268, 'simta@localhost', '131401038', 'Pengembangan Robot pada Mikrokontroler Arduino Uno Berbasis Android Untuk Mendeteksi Kelayakan Air M', '2018-03-29 10:07:51'),
(269, 'simta@localhost', '131401020', 'Analisi Perbandingan Algoritma Evan-Rodh Code dan Algoritma Fibonaci Code untuk Kompresi File Teks', '2018-03-29 10:08:54'),
(270, 'simta@localhost', '131401125', 'Implementasi Kriptografi dengan Algoritma Rivest Shamir Adleman (RSA) dan Algoritma Kompresi Huffman', '2018-03-29 10:09:41'),
(271, 'simta@localhost', '111401033', 'Implemntasi Augmented Reality untuk Menampilkan Animasi Hewan pada Kebun Binatang Pematang Siantar', '2018-03-29 10:10:55'),
(272, 'simta@localhost', '111401014', 'Analisis Perbandingan Kompresi Citra Menggunakan Metode Lempel Ziv Welch (LZW) dan Fraktal', '2018-03-29 10:11:37'),
(273, 'simta@localhost', '131401068', 'Implementasi Algoritma Variably Modified Permutation and Composition', '2018-03-29 10:18:57'),
(274, 'simta@localhost', '131401111', 'Implementasi Jaringan Syaraf Tiruan untuk Pengenalan Pola dan Penerjemah Aksara Batak Toba dengan Me', '2018-03-29 10:21:49'),
(275, 'simta@localhost', '121401038', 'Perbandingan Algoritma Berry Ravindran dan Algoritma Knuth Morris Pratt pada Aplikasi Kamus Gizi Ber', '2018-03-29 10:22:43'),
(276, 'simta@localhost', '131401067', 'Implementasi Kriptografi Hybrid Algoritma Playfair Cipher dan Luc dalam Pengaman File JPEG Berbasis ', '2018-03-29 10:23:27'),
(277, 'simta@localhost', '131401005', 'Pemanfaatan Algoritma Hill Cipher dan Algoritma Multi Prime RSA dalam Skema Hybrid pada Aplikasi Sho', '2018-03-29 10:24:18'),
(278, 'simta@localhost', '131401108', 'Implementasi Pengamanan File Teks Menggunakan Algoritma Kriptografi Spritz dan Teknik Steganografi B', '2018-03-29 10:36:36'),
(279, 'simta@localhost', '131401054', 'Implementasi Algoritma Vigenere Cipher dan RSA Rebalanced pada Pengamanan Citra dalam Skema Kriptogr', '2018-03-29 10:37:33'),
(280, 'simta@localhost', '131401127', 'Algoritma Affine Cipher dan Algoritma Multi-Factor RSA pada Pengamanan Citra Digital dalam Skema Kri', '2018-03-29 10:38:22'),
(281, 'simta@localhost', '131401120', 'Implementasi Kriptografi Hybrid Algoritma RSA-CRT dan Playfair Cipher dalam Pengaman File Citra', '2018-03-29 10:39:33'),
(282, 'simta@localhost', '141421021', 'Perancangan Perangkat Sistem Laporan Sikat Gigi pada Anak Berbasis Short Message Service (SMS) Mengg', '2018-03-29 10:40:23'),
(283, 'simta@localhost', '141421012', 'Implementasi dan Analisis Algoritma Zhu-Takaoka dam Algoritma Knuth-Morris-Pratt pada Aplikasi Kamus', '2018-03-29 10:41:04'),
(284, 'simta@localhost', '141421063', 'Analisis dan Perbandingan Algoritma Turbo Booyer-Moore dan Algoritma Not so Naive pada Aplikasi Kamu', '2018-03-29 10:41:44'),
(285, 'simta@localhost', '141421070', 'Implementasi Augmented Reality Pengenalan alat-alat Hiking Berbasis Android', '2018-03-29 10:42:33'),
(286, 'simta@localhost', '131421070', 'Implementasi pemanfaatan Augmented Reality sebagai Media Pembelajaran untuk memperkenalkan pakaian A', '2018-03-29 10:43:34'),
(287, 'simta@localhost', '131421101', 'Perancangan dan pembuatan Sistem Keamanan Rumah menggunakan Gatway berbasis Mikrokotroler Arduino At', '2018-03-29 10:44:48'),
(288, 'simta@localhost', '141421080', 'Implementasi Augmented Reality(AR) sebagai media pengenal alat musik khas Sumatera Barat berbasis An', '2018-03-29 10:47:32'),
(289, 'simta@localhost', '141421058', 'Implementasi Algoritma Genetika untuk Penyelesaian Travelling Salesman Problem(TSP) berbasis Android', '2018-03-29 10:48:16'),
(290, 'simta@localhost', '141421007', 'Implementasi Pengamanan File Text dengan Algoritma Kriptografi Stream Cipher dan Kombinasi Steganogr', '2018-03-29 10:48:59'),
(291, 'simta@localhost', '131401097', 'Implementasi Hybrid Cryptosystem Algoritma EL Gamal dan Algoritma Camellia dalam Aplikasi E-mail Ber', '2018-03-29 10:55:29'),
(292, 'simta@localhost', '121401113', 'Implementasi Kombinasi Affine Cipher Dengan Matriks Untuk Pengamanan File', '2018-03-29 14:39:49'),
(293, 'simta@localhost', '141402153', 'judul ta', '2018-07-19 15:27:31'),
(294, 'root@localhost', '141402220', 'test', '2018-11-22 18:35:07'),
(295, 'root@localhost', '141402200', 'Modelling 3D Bangunan Berbasis Augmented Reality', '2018-11-24 12:05:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_PS` char(9) NOT NULL,
  `status` enum('pengajuan judul','belum sempro','belum semhas','belum sidang','sudah sidang','lulus') NOT NULL,
  `sks` varchar(4) NOT NULL,
  `upload_sempro` enum('1','0') NOT NULL,
  `upload_semhas` enum('1','0') NOT NULL,
  `upload_sidang` enum('1','0') NOT NULL,
  `upload_validasi` enum('1','0') NOT NULL,
  `uji_program` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `id_PS`, `status`, `sks`, `upload_sempro`, `upload_semhas`, `upload_sidang`, `upload_validasi`, `uji_program`) VALUES
('091401029', 'Septian Dwi Cahya Panjaitan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('101401050', 'Kurniawan Wardani AP. Hutagoal', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('101401084', 'Bernard Darius Tarigan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('101421024', 'Madaniyah Fitrhayari', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('101421040', 'Andreas Herber H. Simorangkir', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401014', 'Ferdiansyah', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401023', 'Muhammad Irfan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401032', 'Dody Hermawan Purba', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401033', 'Azwar Anas', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401052', 'Ricky Steven', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401066', 'Ihksan Koto Kurnia Lidar Ginti', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401067', 'Erwin M. H Sinaga', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401068', 'Annisa Olivia', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401075', 'Rony Febrian', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401078', 'Winda Sari E Siburian', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401084', 'Anhar Ismail', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401092', 'Prastia Nugraha', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401100', 'Edwin Richardo Manik', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401111', 'Samuel Panjaitan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111401112', 'Madian Hidayatul', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401125', 'Nurkholija Harahap', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401130', 'Dian Ruth Apriline', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('111401131', 'Simon Maruli Sinaga', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111402003', 'Mhd Abdi Wahyuda Lubis', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('111402005', 'Alvi Sri Andini', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('111402097', 'Mufriandary Naufal', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('111402102', 'Hanafiah Ismed', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('111421012', 'Dhea Fithaloka', 'ILK', 'belum sempro', '', '1', '1', '1', '1', '1'),
('121401001', 'Rizky Adawiyah Dalimunteh', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401004', 'Parlin Saputra H Tanjung', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401005', 'Muzdalifa', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401008', 'Desi Purnama Sari Br Sebayang', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401013', 'Paet Rahmadani', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401016', 'Ahmad Hasan Pohan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401021', 'Furqan Alatas', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401025', 'Nurun Hawa Pasaribu', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401026', 'Rio Dat Permana Sinulingga', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401028', 'Ibnu Sandyansyah Hutabarat', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401032', 'Indah Widya Sari', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401037', 'Rizky Suanda', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401038', 'Usnul Fadillah', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401039', 'Ryan Ridho Valba S', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401045', 'Rina Iswara', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401046', 'Muhammad Miftahul Huda', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401049', 'Chandra Hakiki', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401068', 'Muhammad Wahyu Fathir', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401069', 'Jabbar Ali Panggabean', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401072', 'Rizky Rivanni', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401075', 'Evelin Silvana Carolina Sinaga', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401078', 'Novi Nurianti Azharia', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401100', 'Rizka Febrisha Siagian', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401102', 'Ardi Batesda Clintia Ginting', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401103', 'Syindi Wulandari', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401107', 'Septy Putri Utami', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401111', 'Sandy Satria Manggala', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401113', 'Zulfikri', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401116', 'Wynda Arianni Siregar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401119', 'Atikah Rahmah Zulni', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401120', 'Taufik Hidayat', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401134', 'Yenni Rosalin munthe', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121401135', 'Jabar Muhammad Lubis', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401136', 'Aulia Rahman Saragih', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401141', 'Samuel Martogi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121401142', 'Bobby Putra Johan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121402008', 'Ramadan Putra Siregar', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402022', 'Nurrahmadayeni', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402032', 'Mhd Fahri Sujarwadi', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121402041', 'Elita Sari Lubis', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402042', 'Irester Irmarettha', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402057', 'Eka Pratiwi Goenfi', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402060', 'Atras Najwan', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402067', 'Dennis', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402070', 'El Roy Miracle Sumbayak', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121402078', 'Theresia Aruan', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402086', 'Reza Ramadiansyah', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121402088', 'Indra Charisma', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402096', 'Gudsu Kristian', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121402097', 'Athmanathan', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121402116', 'Yossi Naomi', 'TIF', 'lulus', '', '1', '1', '1', '1', '1'),
('121421002', 'Mhd. Citra Ali Pasaribu', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421014', 'Sandi Gunanda', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121421017', 'Dina Amriyani Hasibuan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421024', 'Arief Rijal', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421035', 'HP Fauzan Akbar Sinaga', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('121421065', 'Muhammad Harimanka Samsul Hara', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421088', 'Dicko Ifenta', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421091', 'Tengku Zikri Rachman', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('121421096', 'M. Syah Putra B', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401001', 'Morigia Simanjuntak', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401004', 'Nadia Al Karina', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401005', 'Achmad Fahry Mayprana', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401006', 'Riki Hendrawan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401007', 'Yoga Aditya', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401008', ' Husnil Khotimah Siregar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401010', 'Rahmi Suliani Lubis', 'ILK', 'belum sempro', '', '1', '1', '1', '1', '1'),
('131401011', 'Ronaldi Tumanggor', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401012', 'Alwi Ahdi Fahrozi', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401013', 'Nurhasanah', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401014', 'Heri Firmansyah', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401015', 'Tri Puji Astuti', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401016', 'Diah Mustika Sari', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401018', 'Nurul Hasanah Harahap', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401019', 'Ahmad Pratama Ramadhan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401020', 'Muhammad Ali Subada', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401021', 'Ramadhani', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401022', 'Agum Gumelar', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401023', 'Kiki Farida Simbolon', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401025', 'Fikri Haisar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401026', 'Tia Rahmadianti', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401027', 'Winda Aprianti Harahap', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401028', 'Dhiwa Arie Pratama', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401029', 'Nikmah Hanum', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401030', 'Samsudin', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401031', 'Shintya Dirda', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401032', 'Muhammad Irfan Sampino', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401033', 'Khairunisa Nasution', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401035', 'Agustin Sri Intan Sinaga', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401036', 'Yuni Ashuira', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401038', 'Zulkarnain Shiddiq', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401039', 'Ramadhan Syahputra', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401041', 'Rudy Chandra', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401043', 'Nanda Safrina', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401044', 'Sasti Lestari', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401046', 'Irma Simbolon', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401048', 'Raja Hafizh Al Ihsan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401049', 'Mutiara Rizky Parlindungan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401051', 'Mangasa A. S Manulang', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401052', 'Exaudi Naipospos Sibagariang', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401053', 'Faradilah Ulfa', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401054', 'Atika Yasinta Lubis', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401056', 'Siti Hasanah Hasibuan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401057', 'Mahadi Putra', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401058', 'Chyntia Aulia Nuraini', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401059', 'Yuni Marlina Kristiani Nainggo', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401060', 'Nurul Fitriyani Harahap', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401061', 'Siti Harianti', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401062', 'Ika Ayu Lestari', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401063', 'Megawaty', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401064', 'Suci Budiani Hasibuan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401065', 'Suwitri', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401066', 'Zariani Mutia Syara', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401067', 'Adiba Nazila Parinduri', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401068', 'Fauza Badratul Chairiah', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401069', 'Putri Chaliska', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401070', 'Lily Aulya', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401073', 'Cut Amalia Saffiera', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401074', 'Laura Angelina Hasibuan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401076', 'Alyiza Dwi Ningtyas', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401078', 'Raviza Sitepu', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401079', 'Atika Syaifahputri Parindo', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401082', 'Brando H Tampubolon', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401084', 'Efelin O Siburian', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401085', 'Windi Saputri Simamora', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401087', 'M. Abdurrahman Fira', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401089', 'Hanna Saraswaty Manullang', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401091', 'Endang Pranata Tambunan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401094', 'M. Ari Syahputra S.', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401096', 'Rahmat Fajar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401097', 'Hafiz Irwandi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401102', 'Rosalia Sianipar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401105', 'Paulus Arapenta', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401107', 'Evi P. Marpaung', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401108', 'Dessy Yusvika', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401110', 'Ilham RIfky', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401111', 'Toni Aprizal Sianturi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401114', 'Jaysilen', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401116', 'Daniel Hamonangan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401117', 'Putri Aulia Noer', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401120', 'Fredryk Panjaitan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401122', 'Noer Inda Chayanie', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401125', 'Aditia Anisah Putra Kaban', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401126', 'M. Ilyas Dalimar', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401127', 'Muhammad Ripqi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401129', 'Sandra Putri Junika', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401132', 'Muhammad Reza Vahlevi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401134', 'Jessica', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401136', 'Melly', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401137', 'Miftahul Fajri			 			 			 			', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131401143', 'Fadhilah Atika', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131401197', 'Hafiz Irwandi ', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402002', 'Yayang Novitasari', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402006', 'Ignatius M.P.Banjarnahor', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402009', 'Hafni Silfizah Hasibuan', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402048', 'Zaenab Zsevril Medri', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402054', 'Rahmi Fajrea Aini', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402076', 'Said Zuzawarsyah', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402078', 'Alex W A Simanjuntak', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402090', 'Wiliam Christanto S', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402117', 'Ummi Kalsum Harahap', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131402125', 'Fadhil Rahmadhan', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131421015', 'Julita Sinaga', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131421026', 'Rieza Pahlawan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131421028', 'Muhammad Arizal Lubis', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('131421029', 'Elsya Sabrina Asmita Simorangk', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('131421070', 'Safwan Arif Harahap', 'ILK', 'belum sidang', '', '1', '1', '1', '1', '1'),
('131421101', 'Yudi Muchtar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('140402092', 'Victoria Tambunan', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402002', 'Ibnu Habibie', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402014', 'Santa C Hutabarat', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402015', 'Hetly Saint Kartika Br Butar-b', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402050', '141402050', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402051', '141402051', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402052', 'Yulia Shafira Butar-Butar', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402065', 'Dian Pratiwi', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402085', 'Ruswan Efendi', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402089', 'Varuna Dewi', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402090', 'Alex Wijaya', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402093', 'Wendy Winata', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402096', 'Rani Masyithah Pelle', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402143', 'Riverta Fierre Dwiputra Purba', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402144', 'Esya Mahabbah Ningtias', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141402153', 'Aulia Amirullah', 'TIF', 'lulus', '', '1', '0', '0', '0', '0'),
('141402154', 'Bayu Muhammad', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402155', 'Handrian', 'TIF', 'pengajuan judul', '', '1', '1', '1', '1', '1'),
('141402156', 'Adrian', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402157', 'Charissa ', 'TIF', 'lulus', '', '0', '0', '0', '0', '0'),
('141402158', 'Raisya', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1'),
('141402200', '141402200', 'TIF', 'pengajuan judul', '', '1', '0', '1', '1', '1'),
('141402220', '141402220', 'TIF', 'belum semhas', '', '0', '0', '1', '1', '0'),
('141421004', 'Angga Prasatria', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421005', 'Mariaty H', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421006', 'Benyamin Ginting', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421007', 'Afrizal Setiono Tumanggor', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421008', 'Dear Arini Purba', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421009', 'Priska Tarigan', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421010', 'Sar Barita Lumban Gaol', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421012', 'Desy Rahayu Ardani', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421014', 'Muammar Nota Reza Ramadhan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421021', 'Yuthi Alfina', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421023', 'Junita Sari situmorang', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421024', 'Nathania Elizabeth Purba', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421027', 'Rismon Alexandro', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421031', 'Azhari Hidayat', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421032', 'Ichwan', 'TIF', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421034', 'Fajri Jauhari', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421037', 'Josua Pribadi Sianipar', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421043', 'Bayati', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421044', 'Januar Andi H. Sirait', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421048', 'Agus Manur', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421054', 'Wita Clarisa Ginting', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421056', 'Siti Kholilah Pulungan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421058', 'Chairinnisa Napitupulu', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421059', 'Ahmad Syuhada Lubis', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421060', 'Denny Dwi Daviki Lubis', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421061', 'Mailinda Wati', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421063', 'Annisa Silvy Lies Pradipta', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421070', 'Chairina Ahdini hasibuan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421073', 'Syafira Novia', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421074', 'Ahmad Fauzi Nst', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421080', 'Khalisandy Khallis', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421088', 'Khairina Ulfa Nst', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421090', 'Haru Rosyadi', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421091', 'Imam Fakhri Jundi', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421092', 'Ruth Stephani Siahaan', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421094', 'Hepy Didik Prasetyo', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421114', 'Ali Syariati', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421117', 'Fachrozi Fahmi', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421118', 'Riki Hariandi', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421119', 'Pratama Agung Harahap', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421120', 'Jazmi Hadi Matondang', 'ILK', 'belum semhas', '', '1', '1', '1', '1', '1'),
('141421122', 'Afrizal', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('141421126', 'Herimanto', 'ILK', 'lulus', '', '1', '1', '1', '1', '1'),
('161402009', 'Dwi Arief Adityah', 'TIF', 'pengajuan judul', '', '1', '1', '1', '1', '1'),
('191402001', 'Muhammad Raka', 'TIF', 'sudah sidang', '', '0', '0', '0', '1', '0'),
('191402002', 'Muhammad Ridwan', 'TIF', 'pengajuan judul', '', '1', '1', '1', '1', '1'),
('191402003', 'Reihan', 'TIF', 'pengajuan judul', '', '1', '1', '1', '1', '1'),
('201402001', 'Muhammad Ridwan', 'TIF', 'lulus', '', '0', '0', '0', '0', '0'),
('201402009', 'Hagel', 'TIF', 'belum sempro', '', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_sidang`
--

CREATE TABLE `mahasiswa_sidang` (
  `id` int(9) NOT NULL,
  `id_jadwal_seminar` int(9) NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(200) NOT NULL,
  `status_kelayakan` enum('belum dikonfirmasi','layak','tidak layak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa_sidang`
--

INSERT INTO `mahasiswa_sidang` (`id`, `id_jadwal_seminar`, `nim`, `id_pengajuan`, `status_kelayakan`) VALUES
(1, 2, '141402153', '1', 'belum dikonfirmasi'),
(2, 3, '141402153', '2', 'belum dikonfirmasi'),
(3, 4, '141402153', '2', 'belum dikonfirmasi'),
(4, 5, '141402153', '2', 'belum dikonfirmasi'),
(5, 6, '191402001', '4', 'belum dikonfirmasi'),
(6, 7, '191402001', '4', 'belum dikonfirmasi'),
(7, 8, '191402001', '4', 'belum dikonfirmasi'),
(8, 9, '191402001', '4', 'belum dikonfirmasi'),
(9, 6, '201402001', '5', 'belum dikonfirmasi'),
(10, 7, '201402001', '5', 'belum dikonfirmasi'),
(11, 9, '201402001', '5', 'belum dikonfirmasi'),
(12, 6, '141402157', '15', 'layak'),
(13, 7, '141402157', '15', 'layak'),
(14, 9, '141402157', '15', 'layak'),
(15, 6, '141402220', '20', 'layak'),
(16, 7, '141402220', '20', 'belum dikonfirmasi'),
(17, 6, '141402200', '22', 'tidak layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_skripsi` int(20) NOT NULL,
  `nim` char(9) NOT NULL,
  `nilai_uji_program` float(5,3) DEFAULT NULL,
  `nilai_semhas` float(5,3) DEFAULT NULL,
  `nilai_sidang` float(5,3) DEFAULT NULL,
  `total` float(7,3) NOT NULL,
  `grade` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_skripsi`, `nim`, `nilai_uji_program`, `nilai_semhas`, `nilai_sidang`, `total`, `grade`) VALUES
(1, '121402041', 0.000, 84.500, 82.500, 83.300, 'A'),
(2, '111402102', 0.000, 0.000, 0.000, 0.000, 'E'),
(4, '121402022', 0.000, 87.300, 84.300, 85.500, 'A'),
(5, '121402057', 0.000, 84.250, 86.250, 85.450, 'A'),
(6, '121402060', 0.000, 81.300, 81.300, 81.300, 'A'),
(7, '121402088', 0.000, 83.000, 80.670, 81.602, 'A'),
(8, '121402008', 0.000, 0.000, 0.000, 0.000, 'E'),
(9, '121402042', 0.000, 0.000, 0.000, 0.000, 'E'),
(10, '121402067', 0.000, 92.000, 90.000, 90.800, 'A'),
(11, '121402078', 0.000, 83.500, 83.250, 83.350, 'A'),
(12, '121402097', 0.000, 0.000, 0.000, 0.000, 'E'),
(13, '121402116', 0.000, 81.250, 79.600, 80.260, 'B+'),
(14, '111402003', 0.000, 64.875, 78.000, 72.750, 'B'),
(15, '111402005', 0.000, 67.667, 72.750, 70.717, 'B'),
(70, '121402070', 0.000, 0.000, 0.000, 0.000, ''),
(71, '131402054', 0.000, 0.000, 0.000, 0.000, ''),
(72, '131402002', 0.000, 0.000, 0.000, 0.000, ''),
(73, '121402096', 0.000, 0.000, 0.000, 0.000, ''),
(74, '121402032', 0.000, 0.000, 0.000, 0.000, ''),
(75, '121402086', 0.000, 0.000, 0.000, 0.000, ''),
(76, '131402048', 0.000, 0.000, 0.000, 0.000, ''),
(77, '141402014', 0.000, 0.000, 0.000, 0.000, ''),
(78, '141402093', 0.000, 0.000, 0.000, 0.000, ''),
(79, '141402085', 0.000, 0.000, 0.000, 0.000, ''),
(80, '141402144', 0.000, 0.000, 0.000, 0.000, ''),
(81, '141402089', 0.000, 0.000, 0.000, 0.000, ''),
(82, '141402090', 0.000, 0.000, 0.000, 0.000, ''),
(83, '140402092', 0.000, 0.000, 0.000, 0.000, ''),
(84, '141402065', 0.000, 0.000, 0.000, 0.000, ''),
(85, '141402015', 0.000, 0.000, 0.000, 0.000, ''),
(86, '141402143', 0.000, 0.000, 0.000, 0.000, ''),
(87, '111402097', 0.000, 0.000, 0.000, 0.000, ''),
(88, '131402006', 0.000, 0.000, 0.000, 0.000, ''),
(89, '141402096', 0.000, 0.000, 0.000, 0.000, ''),
(90, '141402052', 0.000, 0.000, 0.000, 0.000, ''),
(91, '131402076', 0.000, 0.000, 0.000, 0.000, ''),
(92, '131402125', 0.000, 0.000, 0.000, 0.000, ''),
(93, '131402090', 0.000, 0.000, 0.000, 0.000, ''),
(94, '131402078', 0.000, 0.000, 0.000, 0.000, ''),
(95, '141402002', 0.000, 0.000, 0.000, 0.000, ''),
(96, '131402117', 0.000, 0.000, 0.000, 0.000, ''),
(97, '131402009', 0.000, 0.000, 0.000, 0.000, ''),
(98, '141421061', 0.000, 0.000, 0.000, 0.000, ''),
(99, '141421044', 0.000, 0.000, 0.000, 0.000, ''),
(100, '121401103', 0.000, 0.000, 0.000, 0.000, ''),
(101, '121401107', 0.000, 0.000, 0.000, 0.000, ''),
(102, '131401066', 0.000, 0.000, 0.000, 0.000, ''),
(103, '121401001', 0.000, 0.000, 0.000, 0.000, ''),
(104, '131401084', 0.000, 0.000, 0.000, 0.000, ''),
(105, '141421004', 0.000, 0.000, 0.000, 0.000, ''),
(106, '121401134', 0.000, 0.000, 0.000, 0.000, ''),
(107, '111401032', 0.000, 0.000, 0.000, 0.000, ''),
(108, '121401078', 0.000, 0.000, 0.000, 0.000, ''),
(109, '121401142', 0.000, 0.000, 0.000, 0.000, ''),
(110, '141421031', 0.000, 0.000, 0.000, 0.000, ''),
(111, '141421090', 0.000, 0.000, 0.000, 0.000, ''),
(112, '121421035', 0.000, 0.000, 0.000, 0.000, ''),
(113, '121421014', 0.000, 0.000, 0.000, 0.000, ''),
(114, '121401072', 0.000, 0.000, 0.000, 0.000, ''),
(115, '111401023', 0.000, 0.000, 0.000, 0.000, ''),
(116, '141421032', 0.000, 0.000, 0.000, 0.000, ''),
(117, '131401048', 0.000, 0.000, 0.000, 0.000, ''),
(118, '141421010', 0.000, 0.000, 0.000, 0.000, ''),
(119, '141421009', 0.000, 0.000, 0.000, 0.000, ''),
(120, '131401063', 0.000, 0.000, 0.000, 0.000, ''),
(121, '121401008', 0.000, 0.000, 0.000, 0.000, ''),
(122, '131401076', 0.000, 0.000, 0.000, 0.000, ''),
(123, '131401059', 0.000, 0.000, 0.000, 0.000, ''),
(124, '131401029', 0.000, 0.000, 0.000, 0.000, ''),
(125, '121401025', 0.000, 0.000, 0.000, 0.000, ''),
(126, '141421008', 0.000, 0.000, 0.000, 0.000, ''),
(127, '141421120', 0.000, 0.000, 0.000, 0.000, ''),
(128, '141421059', 0.000, 0.000, 0.000, 0.000, ''),
(129, '111421012', 0.000, 0.000, 0.000, 0.000, ''),
(130, '141421074', 0.000, 0.000, 0.000, 0.000, ''),
(131, '141421118', 0.000, 0.000, 0.000, 0.000, ''),
(132, '131401126', 0.000, 0.000, 0.000, 0.000, ''),
(133, '131421015', 0.000, 0.000, 0.000, 0.000, ''),
(134, '141421048', 0.000, 0.000, 0.000, 0.000, ''),
(135, '141421060', 0.000, 0.000, 0.000, 0.000, ''),
(136, '141421119', 0.000, 0.000, 0.000, 0.000, ''),
(137, '141421117', 0.000, 0.000, 0.000, 0.000, ''),
(138, '141421043', 0.000, 0.000, 0.000, 0.000, ''),
(139, '141421027', 0.000, 0.000, 0.000, 0.000, ''),
(140, '141421094', 0.000, 0.000, 0.000, 0.000, ''),
(141, '131401052', 0.000, 0.000, 0.000, 0.000, ''),
(142, '121401111', 0.000, 0.000, 0.000, 0.000, ''),
(143, '111401067', 0.000, 0.000, 0.000, 0.000, ''),
(144, '111401131', 0.000, 0.000, 0.000, 0.000, ''),
(145, '111401111', 0.000, 0.000, 0.000, 0.000, ''),
(146, '131401051', 0.000, 0.000, 0.000, 0.000, ''),
(147, '131401049', 0.000, 0.000, 0.000, 0.000, ''),
(148, '131401074', 0.000, 0.000, 0.000, 0.000, ''),
(149, '131401136', 0.000, 0.000, 0.000, 0.000, ''),
(150, '131401143', 0.000, 0.000, 0.000, 0.000, ''),
(151, '131401134', 0.000, 0.000, 0.000, 0.000, ''),
(152, '131401032', 0.000, 0.000, 0.000, 0.000, ''),
(153, '131401062', 0.000, 0.000, 0.000, 0.000, ''),
(154, '131401060', 0.000, 0.000, 0.000, 0.000, ''),
(155, '131401078', 0.000, 0.000, 0.000, 0.000, ''),
(156, '131401026', 0.000, 0.000, 0.000, 0.000, ''),
(157, '131401122', 0.000, 0.000, 0.000, 0.000, ''),
(158, '131401041', 0.000, 0.000, 0.000, 0.000, ''),
(159, '131401105', 0.000, 0.000, 0.000, 0.000, ''),
(160, '131401117', 0.000, 0.000, 0.000, 0.000, ''),
(161, '131401073', 0.000, 0.000, 0.000, 0.000, ''),
(162, '131401129', 0.000, 0.000, 0.000, 0.000, ''),
(163, '131401085', 0.000, 0.000, 0.000, 0.000, ''),
(164, '131401114', 0.000, 0.000, 0.000, 0.000, ''),
(165, '131401107', 0.000, 0.000, 0.000, 0.000, ''),
(166, '111401068', 0.000, 0.000, 0.000, 0.000, ''),
(167, '101421024', 0.000, 0.000, 0.000, 0.000, ''),
(168, '141421088', 0.000, 0.000, 0.000, 0.000, ''),
(169, '121401016', 0.000, 0.000, 0.000, 0.000, ''),
(170, '141421054', 0.000, 0.000, 0.000, 0.000, ''),
(171, '131421029', 0.000, 0.000, 0.000, 0.000, ''),
(172, '131401028', 0.000, 0.000, 0.000, 0.000, ''),
(173, '131401013', 0.000, 0.000, 0.000, 0.000, ''),
(174, '131401070', 0.000, 0.000, 0.000, 0.000, ''),
(175, '131401043', 0.000, 0.000, 0.000, 0.000, ''),
(176, '131401012', 0.000, 0.000, 0.000, 0.000, ''),
(177, '111401100', 0.000, 0.000, 0.000, 0.000, ''),
(178, '131401015', 0.000, 0.000, 0.000, 0.000, ''),
(179, '131401004', 0.000, 0.000, 0.000, 0.000, ''),
(180, '131401004', 0.000, 0.000, 0.000, 0.000, ''),
(181, '131401056', 0.000, 0.000, 0.000, 0.000, ''),
(182, '131401007', 0.000, 0.000, 0.000, 0.000, ''),
(183, '131401008', 0.000, 0.000, 0.000, 0.000, ''),
(184, '131401197', 0.000, 0.000, 0.000, 0.000, ''),
(185, '131401082', 0.000, 0.000, 0.000, 0.000, ''),
(186, '131401022', 0.000, 0.000, 0.000, 0.000, ''),
(187, '131401010', 0.000, 0.000, 0.000, 0.000, ''),
(188, '131401018', 0.000, 0.000, 0.000, 0.000, ''),
(189, '131401057', 0.000, 0.000, 0.000, 0.000, ''),
(190, '111401078', 0.000, 0.000, 0.000, 0.000, ''),
(191, '121401100', 0.000, 0.000, 0.000, 0.000, ''),
(192, '141421005', 0.000, 0.000, 0.000, 0.000, ''),
(193, '141421122', 0.000, 0.000, 0.000, 0.000, ''),
(194, '141421024', 0.000, 0.000, 0.000, 0.000, ''),
(195, '141421034', 0.000, 0.000, 0.000, 0.000, ''),
(196, '121401119', 0.000, 0.000, 0.000, 0.000, ''),
(197, '131401035', 0.000, 0.000, 0.000, 0.000, ''),
(198, '101401050', 0.000, 0.000, 0.000, 0.000, ''),
(199, '121401026', 0.000, 0.000, 0.000, 0.000, ''),
(200, '121401120', 0.000, 0.000, 0.000, 0.000, ''),
(201, '121401141', 0.000, 0.000, 0.000, 0.000, ''),
(202, '121401116', 0.000, 0.000, 0.000, 0.000, ''),
(203, '141421044', 0.000, 0.000, 0.000, 0.000, ''),
(204, '141421091', 0.000, 0.000, 0.000, 0.000, ''),
(205, '141421037', 0.000, 0.000, 0.000, 0.000, ''),
(206, '141421092', 0.000, 0.000, 0.000, 0.000, ''),
(207, '141421014', 0.000, 0.000, 0.000, 0.000, ''),
(208, '121421065', 0.000, 0.000, 0.000, 0.000, ''),
(209, '121421017', 0.000, 0.000, 0.000, 0.000, ''),
(210, '121401075', 0.000, 0.000, 0.000, 0.000, ''),
(211, '121421091', 0.000, 0.000, 0.000, 0.000, ''),
(212, '121421024', 0.000, 0.000, 0.000, 0.000, ''),
(213, '141421023', 0.000, 0.000, 0.000, 0.000, ''),
(214, '131421028', 0.000, 0.000, 0.000, 0.000, ''),
(215, '131401063', 0.000, 0.000, 0.000, 0.000, ''),
(216, '121401045', 0.000, 0.000, 0.000, 0.000, ''),
(217, '141421126', 0.000, 0.000, 0.000, 0.000, ''),
(218, '141421006', 0.000, 0.000, 0.000, 0.000, ''),
(219, '131421026', 0.000, 0.000, 0.000, 0.000, ''),
(220, '121421002', 0.000, 0.000, 0.000, 0.000, ''),
(221, '141421073', 0.000, 0.000, 0.000, 0.000, ''),
(222, '141421056', 0.000, 0.000, 0.000, 0.000, ''),
(223, '101421040', 0.000, 0.000, 0.000, 0.000, ''),
(224, '091401029', 0.000, 0.000, 0.000, 0.000, ''),
(225, '121421088', 0.000, 0.000, 0.000, 0.000, ''),
(226, '121421096', 0.000, 0.000, 0.000, 0.000, ''),
(227, '111401052', 0.000, 0.000, 0.000, 0.000, ''),
(228, '121401013', 0.000, 0.000, 0.000, 0.000, ''),
(229, '111401125', 0.000, 0.000, 0.000, 0.000, ''),
(230, '111421012', 0.000, 0.000, 0.000, 0.000, ''),
(231, '141421043', 0.000, 0.000, 0.000, 0.000, ''),
(232, '141421027', 0.000, 0.000, 0.000, 0.000, ''),
(233, '141421117', 0.000, 0.000, 0.000, 0.000, ''),
(234, '141421059', 0.000, 0.000, 0.000, 0.000, ''),
(235, '141421114', 0.000, 0.000, 0.000, 0.000, ''),
(236, '131401137', 0.000, 0.000, 0.000, 0.000, ''),
(237, '131401036', 0.000, 0.000, 0.000, 0.000, ''),
(238, '131401001', 0.000, 0.000, 0.000, 0.000, ''),
(239, '131401064', 0.000, 0.000, 0.000, 0.000, ''),
(240, '131401065', 0.000, 0.000, 0.000, 0.000, ''),
(241, '131401021', 0.000, 0.000, 0.000, 0.000, ''),
(242, '111401075', 0.000, 0.000, 0.000, 0.000, ''),
(243, '111401092', 0.000, 0.000, 0.000, 0.000, ''),
(244, '111401084', 0.000, 0.000, 0.000, 0.000, ''),
(245, '101401084', 0.000, 0.000, 0.000, 0.000, ''),
(246, '111401112', 0.000, 0.000, 0.000, 0.000, ''),
(247, '111401066', 0.000, 0.000, 0.000, 0.000, ''),
(248, '111401130', 0.000, 0.000, 0.000, 0.000, ''),
(249, '121401102', 0.000, 0.000, 0.000, 0.000, ''),
(250, '121401046', 0.000, 0.000, 0.000, 0.000, ''),
(251, '121401039', 0.000, 0.000, 0.000, 0.000, ''),
(252, '131401033', 0.000, 0.000, 0.000, 0.000, ''),
(253, '131401027', 0.000, 0.000, 0.000, 0.000, ''),
(254, '131401023', 0.000, 0.000, 0.000, 0.000, ''),
(255, '131401046', 0.000, 0.000, 0.000, 0.000, ''),
(256, '131401053', 0.000, 0.000, 0.000, 0.000, ''),
(257, '131401089', 0.000, 0.000, 0.000, 0.000, ''),
(258, '131401091', 0.000, 0.000, 0.000, 0.000, ''),
(259, '121401135', 0.000, 0.000, 0.000, 0.000, ''),
(260, '131401014', 0.000, 0.000, 0.000, 0.000, ''),
(263, '121401136', 0.000, 0.000, 0.000, 0.000, ''),
(264, '131401058', 0.000, 0.000, 0.000, 0.000, ''),
(265, '121401032', 0.000, 0.000, 0.000, 0.000, ''),
(266, '131401069', 0.000, 0.000, 0.000, 0.000, ''),
(267, '121401004', 0.000, 0.000, 0.000, 0.000, ''),
(268, '121401049', 0.000, 0.000, 0.000, 0.000, ''),
(269, '131401031', 0.000, 0.000, 0.000, 0.000, ''),
(270, '121401068', 0.000, 0.000, 0.000, 0.000, ''),
(271, '121401021', 0.000, 0.000, 0.000, 0.000, ''),
(272, '131401044', 0.000, 0.000, 0.000, 0.000, ''),
(273, '131401102', 0.000, 0.000, 0.000, 0.000, ''),
(274, '131401094', 0.000, 0.000, 0.000, 0.000, ''),
(275, '121401069', 0.000, 0.000, 0.000, 0.000, ''),
(276, '121401005', 0.000, 0.000, 0.000, 0.000, ''),
(277, '131401079', 0.000, 0.000, 0.000, 0.000, ''),
(278, '121401037', 0.000, 0.000, 0.000, 0.000, ''),
(279, '131401087', 0.000, 0.000, 0.000, 0.000, ''),
(280, '131401006', 0.000, 0.000, 0.000, 0.000, ''),
(281, '131401110', 0.000, 0.000, 0.000, 0.000, ''),
(282, '131401016', 0.000, 0.000, 0.000, 0.000, ''),
(283, '131401011', 0.000, 0.000, 0.000, 0.000, ''),
(284, '131401019', 0.000, 0.000, 0.000, 0.000, ''),
(285, '131401116', 0.000, 0.000, 0.000, 0.000, ''),
(286, '131401039', 0.000, 0.000, 0.000, 0.000, ''),
(287, '131401025', 0.000, 0.000, 0.000, 0.000, ''),
(288, '131401061', 0.000, 0.000, 0.000, 0.000, ''),
(289, '131401132', 0.000, 0.000, 0.000, 0.000, ''),
(290, '121401028', 0.000, 0.000, 0.000, 0.000, ''),
(291, '131401074', 0.000, 0.000, 0.000, 0.000, ''),
(292, '131401096', 0.000, 0.000, 0.000, 0.000, ''),
(293, '131401030', 0.000, 0.000, 0.000, 0.000, ''),
(294, '131401038', 0.000, 0.000, 0.000, 0.000, ''),
(295, '131401020', 0.000, 0.000, 0.000, 0.000, ''),
(296, '131401125', 0.000, 0.000, 0.000, 0.000, ''),
(297, '111401033', 0.000, 0.000, 0.000, 0.000, ''),
(298, '111401014', 0.000, 0.000, 0.000, 0.000, ''),
(299, '131401068', 0.000, 0.000, 0.000, 0.000, ''),
(300, '131401111', 0.000, 0.000, 0.000, 0.000, ''),
(301, '121401038', 0.000, 0.000, 0.000, 0.000, ''),
(302, '131401067', 0.000, 0.000, 0.000, 0.000, ''),
(303, '131401005', 0.000, 0.000, 0.000, 0.000, ''),
(304, '131401108', 0.000, 0.000, 0.000, 0.000, ''),
(305, '131401054', 0.000, 0.000, 0.000, 0.000, ''),
(306, '131401127', 0.000, 0.000, 0.000, 0.000, ''),
(307, '131401120', 0.000, 0.000, 0.000, 0.000, ''),
(308, '141421021', 0.000, 0.000, 0.000, 0.000, ''),
(309, '141421012', 0.000, 0.000, 0.000, 0.000, ''),
(310, '141421063', 0.000, 0.000, 0.000, 0.000, ''),
(311, '141421070', 0.000, 0.000, 0.000, 0.000, ''),
(312, '131421070', 0.000, 0.000, 0.000, 0.000, ''),
(313, '131421101', 0.000, 0.000, 0.000, 0.000, ''),
(314, '141421080', 0.000, 0.000, 0.000, 0.000, ''),
(315, '141421058', 0.000, 0.000, 0.000, 0.000, ''),
(316, '141421007', 0.000, 0.000, 0.000, 0.000, ''),
(317, '131401097', 0.000, 0.000, 0.000, 0.000, ''),
(318, '121401113', 0.000, 0.000, 0.000, 0.000, ''),
(319, '141402153', NULL, 80.000, 80.000, 80.000, 'B'),
(320, '191402001', NULL, 85.000, 90.000, 90.000, 'A'),
(321, '201402001', NULL, 90.000, 90.000, 90.000, 'A'),
(322, '201402009', NULL, NULL, NULL, 0.000, NULL),
(323, '191402002', NULL, NULL, NULL, 0.000, NULL),
(324, '191402003', NULL, NULL, NULL, 0.000, NULL),
(325, '141402154', NULL, NULL, NULL, 0.000, NULL),
(326, '141402155', NULL, NULL, NULL, 0.000, NULL),
(327, '141402156', NULL, NULL, NULL, 0.000, NULL),
(328, '141402157', 80.000, 83.500, 92.000, 156.400, 'A'),
(329, '141402157', 80.000, 83.500, 92.000, 156.400, 'A'),
(330, '141402158', NULL, NULL, NULL, 0.000, NULL),
(331, '141402050', NULL, NULL, NULL, 0.000, NULL),
(332, '141402051', NULL, NULL, NULL, 0.000, NULL),
(333, '141402220', 70.000, NULL, NULL, 0.000, NULL),
(334, '141402200', NULL, NULL, NULL, 0.000, NULL),
(335, '141402200', NULL, NULL, NULL, 0.000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_detail`
--

CREATE TABLE `nilai_detail` (
  `id` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `pembimbing1` float(5,3) NOT NULL,
  `pembimbing2` float(5,3) NOT NULL,
  `pembanding1` float(5,3) NOT NULL,
  `pembanding2` float(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_detail`
--

INSERT INTO `nilai_detail` (`id`, `nim`, `kategori`, `pembimbing1`, `pembimbing2`, `pembanding1`, `pembanding2`) VALUES
(1, '141402153', 'seminar hasil', 90.000, 80.000, 70.000, 80.000),
(2, '141402153', 'sidang', 90.000, 90.000, 70.000, 80.000),
(3, '191402001', 'seminar hasil', 90.000, 80.000, 90.000, 80.000),
(4, '191402001', 'sidang', 90.000, 90.000, 90.000, 90.000),
(5, '201402001', 'seminar hasil', 90.000, 90.000, 90.000, 90.000),
(6, '201402001', 'sidang', 90.000, 90.000, 90.000, 90.000),
(7, '141402157', 'seminar hasil', 80.000, 87.000, 0.000, 0.000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembanding`
--

CREATE TABLE `pembanding` (
  `id` int(15) NOT NULL,
  `nomor_sk` varchar(20) DEFAULT NULL,
  `nim` char(9) NOT NULL,
  `pembanding1` char(6) DEFAULT NULL,
  `pembanding2` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembanding`
--

INSERT INTO `pembanding` (`id`, `nomor_sk`, `nim`, `pembanding1`, `pembanding2`) VALUES
(1, '', '121402041', 'SWL', 'MAM'),
(2, '', '111402102', 'DGW', 'SAR'),
(4, '', '121402022', 'SAR', 'IVAN'),
(5, '', '121402057', 'AML', 'ULFI'),
(6, '', '121402060', 'OPM', 'ULFI'),
(7, '', '121402088', 'OPM', 'ELV'),
(8, '', '121402008', 'DDA', 'SWL'),
(9, '', '121402042', 'SWL', 'DGW'),
(10, '', '121402067', 'SAR', 'MSL'),
(11, '', '121402078', 'SWL', 'ANL'),
(12, '', '121402097', 'SNM', 'ANL'),
(13, '', '121402116', 'ROM', 'ULFI'),
(14, '', '111402003', 'DGW', 'ROM'),
(15, '', '111402005', 'ULFI', 'JTT'),
(71, '', '121402070', 'NO', 'NO'),
(72, '', '131402054', 'NO', 'NO'),
(73, '', '131402002', 'NO', 'NO'),
(74, '', '121402096', 'NO', 'NO'),
(75, '', '121402032', 'NO', 'NO'),
(76, '', '121402086', 'NO', 'NO'),
(77, '', '131402048', 'NO', 'NO'),
(78, '', '141402014', 'NO', 'NO'),
(79, '', '141402093', 'NO', 'NO'),
(80, '', '141402085', 'NO', 'NO'),
(81, '', '141402144', 'NO', 'NO'),
(82, '', '141402089', 'NO', 'NO'),
(83, '', '141402090', 'NO', 'NO'),
(84, '', '140402092', 'NO', 'NO'),
(85, '', '141402065', 'NO', 'NO'),
(86, '', '141402015', 'NO', 'NO'),
(87, '', '141402143', 'NO', 'NO'),
(88, '', '111402097', 'NO', 'NO'),
(89, '', '131402006', 'NO', 'NO'),
(90, '', '141402096', 'NO', 'NO'),
(91, '', '141402052', 'NO', 'NO'),
(92, '', '131402076', 'NO', 'NO'),
(93, '', '131402125', 'NO', 'NO'),
(94, '', '131402090', 'NO', 'NO'),
(95, '', '131402078', 'NO', 'NO'),
(96, '', '141402002', 'NO', 'NO'),
(97, '', '131402117', 'NO', 'NO'),
(98, '', '131402009', 'NO', 'NO'),
(99, '', '141421061', 'AML', 'HDZ'),
(100, '', '141421044', 'MAB', 'HDZ'),
(101, '', '121401103', 'PLS', 'SMH'),
(102, '', '121401107', 'IRT', 'SYE'),
(103, '', '131401066', 'MSL', 'MAB'),
(104, '', '121401001', 'SYE', 'HYC'),
(105, '', '131401084', 'MHS', 'DLS'),
(106, '', '141421004', 'AML', 'AMS'),
(107, '', '121401134', 'MSL', 'AMS'),
(108, '', '111401032', 'SYE', 'MHS'),
(109, '', '121401078', 'PLS', 'MAB'),
(110, '', '121401142', 'SYE', 'AML'),
(111, '', '141421031', 'JTT', 'SMH'),
(112, '', '141421090', 'SYE', 'AMS'),
(113, '', '121421035', 'ASH', 'JTT'),
(114, '', '121421014', 'ASH', 'SDF'),
(115, '', '121401072', 'SYE', 'HDZ'),
(116, '', '111401023', 'SYE', 'EVW'),
(117, '', '141421032', 'ZAR', 'SJS'),
(118, '', '131401048', 'SYE', 'AMS'),
(119, '', '141421010', 'DRW', 'SMH'),
(120, '', '141421009', 'DRW', 'AMS'),
(121, '', '131401063', 'SMH', 'JTT'),
(122, '', '121401008', 'MHS', 'HDZ'),
(123, '', '131401076', 'DRW', 'AML'),
(124, '', '131401059', 'DRW', 'DLS'),
(125, '', '131401029', 'MSL', 'DRW'),
(126, '', '121401025', 'IRT', 'MAB'),
(127, '', '141421008', 'MSL', 'MAB'),
(128, '', '141421120', 'HYC', 'DLS'),
(129, '', '141421059', 'SDF', 'HDZ'),
(130, '', '111421012', 'HYC', 'SDF'),
(131, '', '141421074', 'SWD', 'HDZ'),
(132, '', '141421118', 'ZAR', 'SMH'),
(133, '', '131401126', 'PLS', 'ELV'),
(134, '', '131421015', 'PLS', 'AML'),
(135, '', '141421048', 'SYE', 'MAB'),
(136, '', '141421060', 'HYC', 'SMH'),
(137, '', '141421119', 'JTT', 'AMS'),
(138, '', '141421117', 'ZAR', 'HDZ'),
(139, '', '141421043', 'DRW', 'SDF'),
(140, '', '141421027', 'IRT', 'HYC'),
(141, '', '141421094', 'ASH', 'SMH'),
(142, '', '131401052', 'PLS', 'DRW'),
(143, '', '121401111', 'HYC', 'AMS'),
(144, '', '111401067', 'DRW', 'AML'),
(145, '', '111401131', 'SYE', 'HDZ'),
(146, '', '111401111', 'HYC', 'DLS'),
(147, '', '131401051', 'MAB', 'HDZ'),
(148, '', '131401049', 'PLS', 'JTT'),
(149, '', '131401074', 'HYC', 'HDZ'),
(150, '', '131401136', 'PLS', 'MAB'),
(151, '', '131401143', 'PLS', 'SMH'),
(152, '', '131401134', 'HYC', 'AMS'),
(153, '', '131401032', 'HYC', 'AML'),
(154, '', '131401062', 'PLS', 'HYC'),
(155, '', '131401060', 'HYC', 'AMS'),
(156, '', '131401078', 'HYC', 'HDZ'),
(157, '', '131401026', 'DRW', 'HYC'),
(158, '', '131401122', 'HYC', 'DRW'),
(159, '', '131401041', 'AML', 'JTT'),
(160, '', '131401105', 'PLS', 'MHS'),
(161, '', '131401117', 'SYE', 'HDZ'),
(162, '', '131401073', 'AML', 'JTT'),
(163, '', '131401129', 'DRW', 'AMS'),
(164, '', '131401085', 'HYC', 'HDZ'),
(165, '', '131401114', 'PLS', 'DLS'),
(166, '', '131401107', 'MAB', 'AML'),
(167, '', '111401068', 'PLS', 'DRW'),
(168, '', '101421024', 'DRW', 'SDF'),
(169, '', '141421088', 'ZAR', 'SYE'),
(170, '', '121401016', 'SYE', 'SMH'),
(171, '', '141421054', 'SYE', 'AML'),
(172, '', '131421029', 'MAB', 'DLS'),
(173, '', '131401028', 'PLS', 'JTT'),
(174, '', '131401013', 'HYC', 'HDZ'),
(175, '', '131401070', 'ELV', 'EVW'),
(176, '', '131401043', 'PLS', 'HYC'),
(177, '', '131401012', 'PLS', 'SYE'),
(178, '', '111401100', 'PLS', 'MHS'),
(179, '', '131401015', 'AML', 'HYC'),
(180, '', '131401004', 'HYC', 'DRW'),
(181, '', '131401004', 'HYC', 'DRW'),
(182, '', '131401056', 'MAB', 'AML'),
(183, '', '131401007', 'PLS', 'DRW'),
(184, '', '131401008', 'DRW', 'HDZ'),
(185, '', '131401197', 'PLS', 'MAB'),
(186, '', '131401082', 'MAB', 'HYC'),
(187, '', '131401022', 'ELV', 'MAB'),
(188, '', '131401010', 'AML', 'HYC'),
(189, '', '131401018', 'DRW', 'HYC'),
(190, '', '131401057', 'HYC', 'AML'),
(191, '', '111401078', 'PLS', 'AMS'),
(192, '', '121401100', 'SYE', 'HDZ'),
(193, '', '141421005', 'DRW', 'MAB'),
(194, '', '141421122', 'DLS', 'MAB'),
(195, '', '141421024', 'SYE', 'JTT'),
(196, '', '141421034', 'DRW', 'JTT'),
(197, '', '121401119', 'SYE', 'HDZ'),
(198, '', '131401035', 'PLS', 'AML'),
(199, '', '101401050', 'ASH', 'HDZ'),
(200, '', '121401026', 'AML', 'SNM'),
(201, '', '121401120', 'PLS', 'DLS'),
(202, '', '121401141', 'PLS', 'ASH'),
(203, '', '121401116', 'MAB', 'AMS'),
(204, '', '141421044', 'MAB', 'HDZ'),
(205, '', '141421091', 'SYE', 'SNM'),
(206, '', '141421037', 'ASH', 'ANS'),
(207, '', '141421092', 'MHS', 'DLS'),
(208, '', '141421014', 'SNM', 'SJS'),
(209, '', '121421065', 'IRT', 'HDZ'),
(210, '', '121421017', 'PLS', 'DRW'),
(211, '', '121401075', 'PLS', 'SMH'),
(212, '', '121421091', 'IRT', 'HYC'),
(213, '', '121421024', 'ELV', 'SYE'),
(214, '', '141421023', 'PLS', 'MSL'),
(215, '', '131421028', 'PLS', 'ASH'),
(216, '', '131401063', 'SMH', 'JTT'),
(217, '', '121401045', 'ASH', 'SDF'),
(218, '', '141421126', 'SYE', 'EVW'),
(219, '', '141421006', 'AML', 'SNM'),
(220, '', '131421026', 'SYE', 'HDZ'),
(221, '', '121421002', 'ZAR', 'HYC'),
(222, '', '141421073', 'MAB', 'DRW'),
(223, '', '141421056', 'DRW', 'JTT'),
(224, '', '101421040', 'ASH', 'AMS'),
(225, '', '091401029', 'IRT', 'MSL'),
(226, '', '121421088', 'IRT', 'MHS'),
(227, '', '121421096', 'MHS', 'HDZ'),
(228, '', '111401052', 'DRW', 'JTT'),
(229, '', '121401013', 'PLS', 'HDZ'),
(230, '', '111401125', 'IRT', 'AML'),
(231, '', '111421012', 'MAB', 'DRW'),
(232, '', '141421043', 'DRW', 'SDF'),
(233, '', '141421027', 'IRT', 'HYC'),
(234, '', '141421117', 'ZAR', 'HDZ'),
(235, '', '141421059', 'SDF', 'HDZ'),
(236, '', '141421114', 'MAB', 'JTT'),
(237, '', '131401137', 'PLS', 'DRW'),
(238, '', '131401036', 'HYC', 'HDZ'),
(239, '', '131401001', 'MSL', 'SMH'),
(240, '', '131401064', 'HYC', 'SMH'),
(241, '', '131401065', 'MSL', 'JTT'),
(242, '', '131401021', 'ELV', 'HYC'),
(243, '', '111401075', 'PLS', 'HYC'),
(244, '', '111401092', 'HYC', 'HDZ'),
(245, '', '111401084', 'MAB', 'DRW'),
(246, '', '101401084', 'HYC', 'SMH'),
(247, '', '111401112', 'ASH', 'SMH'),
(248, '', '111401066', 'MHS', 'HDZ'),
(249, '', '111401130', 'SMH', 'EVW'),
(250, '', '121401102', 'PLS', 'DLS'),
(251, '', '121401046', 'PLS', 'MAB'),
(252, '', '121401039', 'ELV', 'MSL'),
(253, '', '131401033', 'ELV', 'HYC'),
(254, '', '131401027', 'ELV', 'HYC'),
(255, '', '131401023', 'DRW', 'HDZ'),
(256, '', '131401046', 'MSL', 'AML'),
(257, '', '131401053', 'PLS', 'DLS'),
(258, '', '131401089', 'HYC', 'EVW'),
(259, '', '131401091', 'HYC', 'MHS'),
(260, '', '121401135', 'HYC', 'SMH'),
(261, '', '131401014', 'PLS', 'HYC'),
(264, '', '121401136', 'SYE', 'MAB'),
(265, '', '131401058', 'MSL', 'SMH'),
(266, '', '121401032', 'MSL', 'DRW'),
(267, '', '131401069', 'PLS', 'SMH'),
(268, '', '121401004', 'PLS', 'HYC'),
(269, '', '121401049', 'HYC', 'AML'),
(270, '', '131401031', 'MSL', 'HYC'),
(271, '', '121401068', 'MSL', 'AMS'),
(272, '', '121401021', 'MHS', 'JTT'),
(273, '', '131401044', 'PLS', 'HYC'),
(274, '', '131401102', 'PLS', 'HYC'),
(275, '', '131401094', 'HYC', 'SMH'),
(276, '', '121401069', 'PLS', 'DLS'),
(277, '', '121401005', 'PLS', 'HDZ'),
(278, '', '131401079', 'ELV', 'HYC'),
(279, '', '121401037', 'SYE', 'HDZ'),
(280, '', '131401087', 'HYC', 'HDZ'),
(281, '', '131401006', 'SMH', 'JTT'),
(282, '', '131401110', 'HYC', 'HDZ'),
(283, '', '131401016', 'HYC', 'SJS'),
(284, '', '131401011', 'PLS', 'EVW'),
(285, '', '131401019', 'SJS', 'EVW'),
(286, '', '131401116', 'PLS', 'EVW'),
(287, '', '131401039', 'HYC', 'HDZ'),
(288, '', '131401025', 'HYC', 'SJS'),
(289, '', '131401061', 'MAB', 'SJS'),
(290, '', '131401132', 'MAB', 'AMS'),
(291, '', '121401028', 'DRW', 'DLS'),
(292, '', '131401074', 'HYC', 'HDZ'),
(293, '', '131401096', 'MSL', 'HYC'),
(294, '', '131401030', 'PLS', 'HDZ'),
(295, '', '131401038', 'HYC', 'JTT'),
(296, '', '131401020', 'PLS', 'HYC'),
(297, '', '131401125', 'PLS', 'ELV'),
(298, '', '111401033', 'PLS', 'HYC'),
(299, '', '111401014', 'SYE', 'HYC'),
(300, '', '131401068', 'PLS', 'JTT'),
(301, '', '131401111', 'HYC', 'AML'),
(302, '', '121401038', 'SYE', 'HYC'),
(303, '', '131401067', 'HYC', 'HDZ'),
(304, '', '131401005', 'MSL', 'SMH'),
(305, '', '131401108', 'PLS', 'HDZ'),
(306, '', '131401054', 'HYC', 'EVW'),
(307, '', '131401127', 'PLS', 'EVW'),
(308, '', '131401120', 'PLS', 'HYC'),
(309, '', '141421021', 'AML', 'DLS'),
(310, '', '141421012', 'MAB', 'HDZ'),
(311, '', '141421063', 'MAB', 'JTT'),
(312, '', '141421070', 'HYC', 'HDZ'),
(313, '', '131421070', 'ASH', 'MHS'),
(314, '', '131421101', 'PLS', 'DLS'),
(315, '', '141421080', 'PLS', 'HDZ'),
(316, '', '141421058', 'AML', 'HYC'),
(317, '', '141421007', 'MAB', 'HYC'),
(318, '', '131401097', 'MAB', 'PLS'),
(319, '', '121401113', 'ELV', 'AMS'),
(320, NULL, '141402153', 'ERN', 'BHQ'),
(321, NULL, '191402001', 'JTT', 'ROM'),
(322, NULL, '201402001', NULL, NULL),
(323, NULL, '201402009', NULL, NULL),
(324, NULL, '191402002', NULL, NULL),
(325, NULL, '191402003', NULL, NULL),
(326, NULL, '141402154', NULL, NULL),
(327, NULL, '141402155', NULL, NULL),
(328, NULL, '141402156', NULL, NULL),
(330, NULL, '141402157', 'MAB', 'BHQ'),
(331, NULL, '141402158', NULL, NULL),
(332, NULL, '141402050', NULL, NULL),
(333, NULL, '141402050', 'ADC', 'AML'),
(334, NULL, '141402051', NULL, NULL),
(335, NULL, '141402220', 'FDL', 'MAM'),
(336, NULL, '141402200', NULL, NULL),
(337, NULL, '141402200', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int(15) NOT NULL,
  `nomor_sk` varchar(20) DEFAULT NULL,
  `nim` varchar(9) NOT NULL,
  `pembimbing1` varchar(10) DEFAULT NULL,
  `pembimbing2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `nomor_sk`, `nim`, `pembimbing1`, `pembimbing2`) VALUES
(1, '', '121402041', 'BHQ', 'DGW'),
(2, '', '111402102', 'BHQ', 'ROM'),
(4, '', '121402022', 'FDL', 'ROM'),
(5, '', '121402057', 'ROM', 'OPM'),
(6, '', '121402060', 'AML', 'DGW'),
(7, '', '121402088', 'DGW', 'AML'),
(8, '', '121402008', 'DGW', 'ROM'),
(9, '', '121402042', 'DDA', 'SNM'),
(10, '', '121402067', 'ROM', 'OPM'),
(11, '', '121402078', 'ROM', 'SAR'),
(12, '', '121402097', 'ROM', 'FDL'),
(13, '', '121402116', 'ERN', 'DGW'),
(14, '', '111402003', 'DDA', 'BHQ'),
(15, '', '111402005', 'BHQ', 'MAB'),
(73, '', '121402070', 'MAM', 'DDA'),
(74, '', '131402054', 'IVAN', 'SAR'),
(75, '', '131402002', 'ROM', 'MAM'),
(76, '', '121402096', 'IVAN', 'VEN'),
(77, '', '121402032', 'IVAN', 'VEN'),
(78, '', '121402086', 'ROM', 'MAM'),
(79, '', '131402048', 'ANL', 'SNM'),
(80, '', '141402014', 'BHQ', 'SNM'),
(81, '', '141402093', 'BHQ', 'ULFI'),
(82, '', '141402085', 'ULFI', 'BHQ'),
(83, '', '141402144', 'BHQ', 'ANL'),
(84, '', '141402089', 'BHQ', 'SNM'),
(85, '', '141402090', 'ULFI', 'BHQ'),
(86, '', '140402092', 'FDL', 'SAR'),
(87, '', '141402065', 'SAR', 'FDL'),
(88, '', '141402015', 'BHQ', 'SNM'),
(89, '', '141402143', 'BHQ', 'SNM'),
(90, '', '111402097', 'MAB', 'FDL'),
(91, '', '131402006', 'ROM', 'OPM'),
(92, '', '141402096', 'SNM', 'BHQ'),
(93, '', '141402052', 'SNM', 'OPM'),
(94, '', '131402076', 'ULFI', 'SWL'),
(95, '', '131402125', 'SAR', 'DDA'),
(96, '', '131402090', 'SAR', 'IVAN'),
(97, '', '131402078', 'SAR', 'INA'),
(98, '', '141402002', 'BHQ', 'ERN'),
(99, '', '131402117', 'FDL', 'ERN'),
(100, '', '131402009', 'BHQ', 'SWL'),
(101, '', '141421061', 'IRT', 'MSL'),
(102, '', '141421044', 'DRW', 'JTT'),
(103, '', '121401103', 'ZAR', 'MAB'),
(104, '', '121401107', 'ASH', 'HDZ'),
(105, '', '131401066', 'DRW', 'SDF'),
(106, '', '121401001', 'PLS', 'AMS'),
(107, '', '131401084', 'MAB', 'JTT'),
(108, '', '141421004', 'MSL', 'HDZ'),
(109, '', '121401134', 'DRW', 'EVW'),
(110, '', '111401032', 'PLS', 'HDZ'),
(111, '', '121401078', 'OPM', 'AML'),
(112, '', '121401142', 'PLS', 'DLS'),
(113, '', '141421031', 'IRT', 'MSL'),
(114, '', '141421090', 'OPM', 'MAB'),
(115, '', '121421035', 'SYE', 'MAB'),
(116, '', '121421014', 'PLS', 'MHS'),
(117, '', '121401072', 'ASH', 'SMH'),
(118, '', '111401023', 'MHS', 'HYC'),
(119, '', '141421032', 'OPM', 'AML'),
(120, '', '131401048', 'MAB', 'AML'),
(121, '', '141421010', 'PLS', 'AML'),
(122, '', '141421009', 'MAB', 'JTT'),
(123, '', '131401063', 'DRW', 'SDF'),
(124, '', '121401008', 'PLS', 'JTT'),
(125, '', '131401076', 'MSL', 'MAB'),
(126, '', '131401059', 'PLS', 'AML'),
(127, '', '131401029', 'PLS', 'JTT'),
(128, '', '121401025', 'OPM', 'HDZ'),
(129, '', '141421008', 'IRT', 'JTT'),
(130, '', '141421120', 'PLS', 'SNM'),
(131, '', '141421059', 'HYC', 'DRW'),
(132, '', '111421012', 'MAB', 'DRW'),
(133, '', '141421074', 'PLS', 'AML'),
(134, '', '141421118', 'PLS', 'EVW'),
(135, '', '131401126', 'SYE', 'SMH'),
(136, '', '131421015', 'MAB', 'JTT'),
(137, '', '141421048', 'ASH', 'SMH'),
(138, '', '141421060', 'MAB', 'HDZ'),
(139, '', '141421119', 'PLS', 'DLS'),
(140, '', '141421117', 'PLS', 'SDF'),
(141, '', '141421043', 'PLS', 'MAB'),
(142, '', '141421027', 'PLS', 'DRW'),
(143, '', '141421094', 'PLS', 'DLS'),
(144, '', '131401052', 'AML', 'AMS'),
(145, '', '121401111', 'MAB', 'HDZ'),
(146, '', '111401067', 'IRT', 'MAB'),
(147, '', '111401131', 'ZAR', 'RMA'),
(148, '', '111401111', 'PLS', 'MAB'),
(149, '', '131401051', 'PLS', 'DLS'),
(150, '', '131401049', 'MAB', 'DRW'),
(151, '', '131401074', 'MAB', 'NO'),
(152, '', '131401136', 'HYC', 'AML'),
(153, '', '131401143', 'MAB', 'DRW'),
(154, '', '131401134', 'MAB', 'DRW'),
(155, '', '131401032', 'PLS', 'DLS'),
(156, '', '131401062', 'DRW', 'AML'),
(157, '', '131401060', 'IRT', 'MAB'),
(158, '', '131401078', 'MAB', 'AML'),
(159, '', '131401026', 'MAB', 'SMH'),
(160, '', '131401122', 'MAB', 'AML'),
(161, '', '131401041', 'PLS', 'AMS'),
(162, '', '131401105', 'MAB', 'SMH'),
(163, '', '131401117', 'MAB', 'DRW'),
(164, '', '131401073', 'MAB', 'DRW'),
(165, '', '131401129', 'MAB', 'SMH'),
(166, '', '131401085', 'MAB', 'AMS'),
(167, '', '131401114', 'DRW', 'AMS'),
(168, '', '131401107', 'PLS', 'JTT'),
(169, '', '111401068', 'SRS', 'HYC'),
(170, '', '101421024', 'ASH', 'MAB'),
(171, '', '141421088', 'MAB', 'HYC'),
(172, '', '121401016', 'PLS', 'AML'),
(173, '', '141421054', 'PLS', 'EVW'),
(174, '', '131421029', 'PLS', 'MHS'),
(175, '', '131401028', 'DRW', 'AML'),
(176, '', '131401013', 'MAB', 'AMS'),
(177, '', '131401070', 'MAB', 'DRW'),
(178, '', '131401043', 'JTT', 'SMH'),
(179, '', '131401012', 'MAB', 'SMH'),
(180, '', '111401100', 'MAB', 'JTT'),
(181, '', '131401015', 'PLS', 'DLS'),
(182, '', '131401004', 'PLS', 'JTT'),
(183, '', '131401004', 'PLS', 'JTT'),
(184, '', '131401056', 'SYE', 'DRW'),
(185, '', '131401007', 'MAB', 'JTT'),
(186, '', '131401008', 'SYE', 'MAB'),
(187, '', '131401197', 'DRW', 'HYC'),
(188, '', '131401082', 'ELV', 'AMS'),
(189, '', '131401022', 'AML', 'AMS'),
(190, '', '131401010', 'MAB', 'DRW'),
(191, '', '131401018', 'PLS', 'JTT'),
(192, '', '131401057', 'PLS', 'DRW'),
(193, '', '111401078', 'MAB', 'DRW'),
(194, '', '121401100', 'ZAR', 'SDF'),
(195, '', '141421005', 'MSL', 'HDZ'),
(196, '', '141421122', 'SYE', 'SMH'),
(197, '', '141421024', 'PLS', 'DRW'),
(198, '', '141421034', 'SWL', 'HDZ'),
(199, '', '121401119', 'PLS', 'AMS'),
(200, '', '131401035', 'MAB', 'DRW'),
(201, '', '101401050', 'PLS', 'JTT'),
(202, '', '121401026', 'PLS', 'DGW'),
(203, '', '121401120', 'SYE', 'HDZ'),
(204, '', '121401141', 'IRT', 'MAB'),
(205, '', '121401116', 'MSL', 'DRW'),
(206, '', '141421044', 'DRW', 'JTT'),
(207, '', '141421091', 'MSL', 'DRW'),
(208, '', '141421037', 'MHS', 'JTT'),
(209, '', '141421092', 'DRW', 'JTT'),
(210, '', '141421014', 'PLS', 'DLS'),
(211, '', '121421065', 'SYE', 'ANS'),
(212, '', '121421017', 'ZAR', 'AMS'),
(213, '', '121401075', 'ZAR', 'MSL'),
(214, '', '121421091', 'SYE', 'SMH'),
(215, '', '121421024', 'PLS', 'ASH'),
(216, '', '141421023', 'SRS', 'HDZ'),
(217, '', '131421028', 'ZAR', 'HDZ'),
(218, '', '131401063', 'DRW', 'SDF'),
(219, '', '121401045', 'MSL', 'SJS'),
(220, '', '141421126', 'MAB', 'HDZ'),
(221, '', '141421006', 'PLS', 'DLS'),
(222, '', '131421026', 'MHS', 'EVW'),
(223, '', '121421002', 'SYE', 'DRW'),
(224, '', '141421073', 'SRS', 'AML'),
(225, '', '141421056', 'MAB', 'AMS'),
(226, '', '101421040', 'ADC', 'MSL'),
(227, '', '091401029', 'PLS', 'AMS'),
(228, '', '121421088', 'OPM', 'DRW'),
(229, '', '121421096', 'ASH', 'SMH'),
(230, '', '111401052', 'MAB', 'AMS'),
(231, '', '121401013', 'SYE', 'MAB'),
(232, '', '111401125', 'OPM', 'DRW'),
(233, '', '111421012', 'HYC', 'SDF'),
(234, '', '141421043', 'PLS', 'MAB'),
(235, '', '141421027', 'PLS', 'DRW'),
(236, '', '141421117', 'PLS', 'SDF'),
(237, '', '141421059', 'HYC', 'DRW'),
(238, '', '141421114', 'MHS', 'SMH'),
(239, '', '131401137', 'HYC', 'NO'),
(240, '', '131401036', 'MAB', 'NO'),
(241, '', '131401001', 'AMS', 'NO'),
(242, '', '131401064', 'MAB', 'NO'),
(243, '', '131401065', 'SMH', 'NO'),
(244, '', '131401021', 'MAB', 'NO'),
(245, '', '111401075', 'MSL', 'NO'),
(246, '', '111401092', 'DRW', 'NO'),
(247, '', '111401084', 'AML', 'NO'),
(248, '', '101401084', 'MAB', 'NO'),
(249, '', '111401112', 'MHS', 'NO'),
(250, '', '111401066', 'MAB', 'NO'),
(251, '', '111401130', 'MAB', 'NO'),
(252, '', '121401102', 'DRW', 'NO'),
(253, '', '121401046', 'MSL', 'NO'),
(254, '', '121401039', 'AML', 'NO'),
(255, '', '131401033', 'DRW', 'NO'),
(256, '', '131401027', 'MAB', 'NO'),
(257, '', '131401023', 'JTT', 'NO'),
(258, '', '131401046', 'JTT', 'NO'),
(259, '', '131401053', 'HYC', 'NO'),
(260, '', '131401089', 'AML', 'NO'),
(261, '', '131401091', 'ELV', 'NO'),
(262, '', '121401135', 'AML', 'NO'),
(263, '', '131401014', 'MAB', 'NO'),
(266, '', '121401136', 'MSL', 'NO'),
(267, '', '131401058', 'AML', 'NO'),
(268, '', '121401032', 'MAB', 'NO'),
(269, '', '131401069', 'DRW', 'NO'),
(270, '', '121401004', 'MAB', 'NO'),
(271, '', '121401049', 'DRW', 'NO'),
(272, '', '131401031', 'JTT', 'NO'),
(273, '', '121401068', 'HYC', 'NO'),
(274, '', '121401021', 'MAB', 'NO'),
(275, '', '131401044', 'MSL', 'NO'),
(276, '', '131401102', 'DRW', 'NO'),
(277, '', '131401094', 'JTT', 'NO'),
(278, '', '121401069', 'MAB', 'NO'),
(279, '', '121401005', 'MAB', 'NO'),
(280, '', '131401079', 'MAB', 'NO'),
(281, '', '121401037', 'AML', 'NO'),
(282, '', '131401087', 'ELV', 'NO'),
(283, '', '131401006', 'HYC', 'NO'),
(284, '', '131401110', 'MAB', 'NO'),
(285, '', '131401016', 'AML', 'NO'),
(286, '', '131401011', 'MAB', 'NO'),
(287, '', '131401019', 'MSL', 'NO'),
(288, '', '131401116', 'SMH', 'NO'),
(289, '', '131401039', 'MAB', 'NO'),
(290, '', '131401025', 'AML', 'NO'),
(291, '', '131401061', 'HYC', 'NO'),
(292, '', '131401132', 'ELV', 'NO'),
(293, '', '121401028', 'MSL', 'NO'),
(294, '', '131401074', 'MAB', 'NO'),
(295, '', '131401096', 'JTT', 'NO'),
(296, '', '131401030', 'MSL', 'NO'),
(297, '', '131401038', 'DLS', 'NO'),
(298, '', '131401020', 'MAB', 'NO'),
(299, '', '131401125', 'JTT', 'NO'),
(300, '', '111401033', 'DLS', 'NO'),
(301, '', '111401014', 'AMS', 'NO'),
(302, '', '131401068', 'MAB', 'NO'),
(303, '', '131401111', 'AMS', 'NO'),
(304, '', '121401038', 'JTT', 'NO'),
(305, '', '131401067', 'MAB', 'NO'),
(306, '', '131401005', 'MAB', 'NO'),
(307, '', '131401108', 'MSL', 'NO'),
(308, '', '131401054', 'MAB', 'NO'),
(309, '', '131401127', 'MAB', 'NO'),
(310, '', '131401120', 'MAB', 'NO'),
(311, '', '141421021', 'HYC', 'NO'),
(312, '', '141421012', 'SMH', 'NO'),
(313, '', '141421063', 'HYC', 'NO'),
(314, '', '141421070', 'DRW', 'NO'),
(315, '', '131421070', 'DLS', 'NO'),
(316, '', '131421101', 'MHS', 'NO'),
(317, '', '141421080', 'JTT', 'NO'),
(318, '', '141421058', 'DRW', 'NO'),
(319, '', '141421007', 'JTT', 'NO'),
(320, '', '131401097', 'DRW', 'NO'),
(321, '', '121401113', 'MAB', 'NO'),
(322, NULL, '141402153', 'AML', 'IVAN'),
(323, NULL, '191402001', 'BHQ', 'DGW'),
(324, NULL, '201402001', 'ANL', 'ELV'),
(325, NULL, '201402009', 'BM', 'FDL'),
(327, NULL, '191402002', 'BHQ', 'DDA'),
(328, NULL, '191402003', 'BHQ', 'DDA'),
(329, NULL, '141402154', 'AML', 'NO'),
(330, NULL, '141402155', 'ANL', 'BHQ'),
(331, NULL, '141402156', 'AML', 'ASH'),
(333, NULL, '141402157', 'AML', 'ADC'),
(334, NULL, '141402158', 'AML', 'ASH'),
(335, NULL, '141402050', 'ANL', 'BHQ'),
(336, NULL, '141402051', 'NO', 'NO'),
(337, NULL, '141402220', 'ANL', 'BHQ'),
(339, NULL, '141402200', 'ANL', 'RMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_judul`
--

CREATE TABLE `pengajuan_judul` (
  `id_pengajuan` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul_diajukan` varchar(30) NOT NULL,
  `judul_diajukan_mahasiswa` varchar(20) NOT NULL,
  `ilmu1` enum('Knowledge Management and Data Science','Multimedia','Computer System','') NOT NULL,
  `ilmu2` enum('Knowledge Management and Data Science','Multimedia','Computer System','') NOT NULL,
  `calon_dopim1` char(5) NOT NULL,
  `calon_dopim2` char(5) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `judul` text NOT NULL,
  `latar_belakang` text NOT NULL,
  `rumusan_masalah` text NOT NULL,
  `metodologi` text NOT NULL,
  `referensi` text NOT NULL,
  `status_kelayakan` enum('belum dikonfirmasi','diterima','ditolak','simpan sementara') NOT NULL,
  `hasil_uji_kelayakan` text NOT NULL,
  `upload` varchar(100) NOT NULL,
  `status` enum('simpan sementara','applied') NOT NULL,
  `jenis_TA` enum('skripsi','tesis','disertasi') NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `status_validasi` enum('belum','sudah','ditolak') NOT NULL,
  `catatan_validasi` text NOT NULL,
  `status_kelayakan_sempro` enum('belum dikonfirmasi','layak','tidak layak') NOT NULL,
  `status_kelayakan_semhas` enum('belum dikonfirmasi','layak','tidak layak') NOT NULL,
  `status_kelayakan_sidang` enum('belum dikonfirmasi','layak','tidak layak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id_pengajuan`, `nim`, `judul_diajukan`, `judul_diajukan_mahasiswa`, `ilmu1`, `ilmu2`, `calon_dopim1`, `calon_dopim2`, `tgl_pengajuan`, `judul`, `latar_belakang`, `rumusan_masalah`, `metodologi`, `referensi`, `status_kelayakan`, `hasil_uji_kelayakan`, `upload`, `status`, `jenis_TA`, `file`, `status_validasi`, `catatan_validasi`, `status_kelayakan_sempro`, `status_kelayakan_semhas`, `status_kelayakan_sidang`) VALUES
(1, '141402153', 'dosen', 'mahasiswa', 'Multimedia', 'Knowledge Management and Data Science', 'DDA', 'MAM', '2018-07-19', 'judul ta', '', '', '', '', 'ditolak', 'catatan perbaikan', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_2.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(2, '141402153', 'dosen', '', 'Multimedia', 'Knowledge Management and Data Science', 'AML', 'IVAN', '2018-07-19', 'judul ta', '', '', '', '', 'diterima', 'tes', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_21.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(3, '191402001', 'dosen', 'mahasiswa', 'Knowledge Management and Data Science', 'Multimedia', 'BHQ', 'DGW', '2018-10-24', 'Kegiatan 1', '', '', '', '', 'ditolak', 'ada perbaikan', '', 'applied', 'skripsi', '1-s2_0-S0264127517311620-main.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(4, '191402001', 'dosen', '', 'Knowledge Management and Data Science', 'Knowledge Management and Data Science', 'BHQ', 'DGW', '2018-10-24', 'test', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', '1-s2_0-S1877050917320501-main.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(5, '201402001', 'dosen', 'mahasiswa', 'Multimedia', 'Computer System', 'ANL', 'ELV', '2018-10-25', 'Judul berita', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', '1-s2_0-S1877050917319130-main.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(6, '201402009', 'dosen', '', 'Multimedia', 'Computer System', 'BM', 'FDL', '2018-10-25', 'judul', '', '', '', '', 'ditolak', 'hguyg', '', 'applied', 'skripsi', '1-s2_0-S0264127517311620-main1.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(7, '201402009', 'dosen', '', 'Multimedia', 'Computer System', 'BM', 'FDL', '2018-10-25', 'judul2', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', '1-s2_0-S0264127517311620-main2.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(8, '191402002', 'dosen', '', 'Multimedia', 'Computer System', 'BHQ', 'DDA', '2018-10-25', 'Judul berita', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', '1-s2_0-S0264127517311620-main3.pdf', 'belum', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(9, '191402003', 'dosen', 'mahasiswa', 'Multimedia', 'Computer System', 'BHQ', 'DDA', '2018-10-30', 'Test', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', '1-s2_0-S0264127517311620-main4.pdf', 'ditolak', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(11, '141402154', 'dosen', '', 'Multimedia', 'Computer System', 'AML', 'NO', '2018-11-16', 'Judul 1', '', '', '', '', 'diterima', 'Perhatikan Latar Belakangnya', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_1.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(12, '141402155', 'dosen', '', 'Multimedia', 'Computer System', 'ANL', 'BHQ', '2018-11-16', 'Test', '', '', '', '', 'diterima', 'Lanjutkan', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_11.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(13, '141402156', 'dosen', '', 'Multimedia', 'Computer System', 'AML', 'ASH', '2018-11-16', 'test', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_12.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(14, '141402157', 'dosen', '', 'Multimedia', 'Computer System', 'DGW', 'NO', '2018-11-16', 'Judul Terkini', '', '', '', '', 'ditolak', 'Judul dan Latar Belakang Tidak Sinkron', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_13.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(15, '141402157', 'dosen', '', 'Multimedia', 'Multimedia', 'AML', 'ADC', '2018-11-16', 'Judul Terkini 2', '', '', '', '', 'diterima', 'Lanjutkan Penelitiannya', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_14.pdf', 'sudah', '', 'layak', 'layak', 'layak'),
(16, '141402158', 'dosen', '', 'Multimedia', 'Computer System', 'AML', 'ASH', '2018-11-19', 'Test', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_15.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(17, '141402050', 'dosen', '', 'Multimedia', 'Computer System', 'ANL', 'BHQ', '2018-11-22', 'Judul Pertama', '', '', '', '', 'diterima', 'lanjutkan', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_16.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(18, '141402051', 'dosen', '', 'Multimedia', 'Computer System', 'NO', 'NO', '2018-11-22', 'Test 1', '', '', '', '', 'diterima', 'oke', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_17.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(19, '141402052', 'dosen', '', 'Computer System', 'Multimedia', 'NO', 'NO', '2018-11-22', 'test', '', '', '', '', 'belum dikonfirmasi', '', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_18.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(20, '141402220', 'dosen', '', 'Computer System', 'Multimedia', 'ANL', 'BHQ', '2018-11-22', 'test', '', '', '', '', 'diterima', '', '', 'applied', 'skripsi', 'Form_Pengajuan_Judul_-_Revisi_19.pdf', 'sudah', '', 'layak', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(21, '141402200', 'dosen', '', 'Multimedia', 'Computer System', 'NO', 'NO', '2018-11-24', 'Sistem Modelling 3D Bangunan Berbasis Augmented Reality', '', '', '', '', 'ditolak', 'Algoritma dan Penelitian kurang sesuai', '', 'applied', 'skripsi', '6_Vector_Surveillance__Control.pdf', 'sudah', '', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(22, '141402200', 'dosen', '', 'Multimedia', 'Computer System', 'ANL', 'RMA', '2018-11-24', 'Modelling 3D Bangunan Berbasis Augmented Reality', '', '', '', '', 'ditolak', '', '', 'applied', 'skripsi', '1-s2_0-S1877050917319130-main1.pdf', 'sudah', '', 'tidak layak', 'belum dikonfirmasi', 'belum dikonfirmasi');

--
-- Trigger `pengajuan_judul`
--
DELIMITER $$
CREATE TRIGGER `riwayat_penolakan_pengajuan` AFTER UPDATE ON `pengajuan_judul` FOR EACH ROW BEGIN
	IF NEW.status_validasi = 'ditolak' THEN
    	INSERT INTO riwayat_penolakan_pengajuan(id_pengajuan, file, waktu_penolakan, status_validasi, catatan_validasi) VALUES (NEW.id_pengajuan,NEW.file,CURRENT_TIMESTAMP(),NEW.status_validasi, NEW.catatan_validasi);
       
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_semhas`
--

CREATE TABLE `penilaian_semhas` (
  `id` int(225) NOT NULL,
  `dosen` char(5) NOT NULL,
  `status_dosen` enum('pembimbing1','pembimbing2','pembanding1','pembanding2') NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(200) NOT NULL,
  `id_jadwal_seminar` char(200) NOT NULL,
  `abstrak` int(1) NOT NULL,
  `bab1` int(2) NOT NULL,
  `bab2` int(2) NOT NULL,
  `bab3` int(2) NOT NULL,
  `bab4` int(2) NOT NULL,
  `bab5` int(1) NOT NULL,
  `pendapat` int(2) NOT NULL,
  `total` int(3) NOT NULL,
  `grade` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_semhas`
--

INSERT INTO `penilaian_semhas` (`id`, `dosen`, `status_dosen`, `nim`, `id_pengajuan`, `id_jadwal_seminar`, `abstrak`, `bab1`, `bab2`, `bab3`, `bab4`, `bab5`, `pendapat`, `total`, `grade`) VALUES
(1, 'AML', 'pembimbing1', '141402157', '15', '7', 2, 9, 10, 20, 30, 2, 7, 80, 'B+'),
(2, 'ADC', 'pembimbing2', '141402157', '15', '7', 1, 5, 10, 25, 35, 1, 10, 87, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_sempro`
--

CREATE TABLE `penilaian_sempro` (
  `id` int(225) NOT NULL,
  `dosen` char(10) NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(225) NOT NULL,
  `id_jadwal_seminar` int(225) NOT NULL,
  `judul_skripsi` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_judul_skripsi` text NOT NULL,
  `latar_belakang` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_latar_belakang` text NOT NULL,
  `rumusan_masalah` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_rumusan_masalah` text NOT NULL,
  `landasan_teori` enum('terima','ganti','perbaiki') NOT NULL,
  `catatan_landasan_teori` text NOT NULL,
  `penelitian_terdahulu` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_penelitian_terdahulu` text NOT NULL,
  `data_digunakan` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_data_digunakan` text NOT NULL,
  `metodologi` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_metodologi` text NOT NULL,
  `arsitektur_umum` enum('terima','perbaiki','ganti') NOT NULL,
  `catatan_arsitektur_umum` text NOT NULL,
  `kelayakan_sempro` enum('layak','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_sempro`
--

INSERT INTO `penilaian_sempro` (`id`, `dosen`, `nim`, `id_pengajuan`, `id_jadwal_seminar`, `judul_skripsi`, `catatan_judul_skripsi`, `latar_belakang`, `catatan_latar_belakang`, `rumusan_masalah`, `catatan_rumusan_masalah`, `landasan_teori`, `catatan_landasan_teori`, `penelitian_terdahulu`, `catatan_penelitian_terdahulu`, `data_digunakan`, `catatan_data_digunakan`, `metodologi`, `catatan_metodologi`, `arsitektur_umum`, `catatan_arsitektur_umum`, `kelayakan_sempro`) VALUES
(2, 'AML', '141402157', '15', 6, 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', 'fuzzy logic                                                                                                                                                                                                                                                                                                                                                                             ', 'terima', '', 'layak'),
(3, 'ADC', '141402157', '15', 6, 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'layak'),
(4, 'BHQ', '141402220', '20', 6, 'terima', 'Kurang penempatan kata', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'layak'),
(5, 'ANL', '141402220', '20', 6, 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'layak'),
(6, 'ANL', '141402200', '22', 6, 'ganti', '', 'ganti', 'lanjut                                                                                                                                                                                                                         ', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'perbaiki', '', 'tidak'),
(7, 'RMA', '141402200', '22', 6, 'terima', '', 'ganti', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'tidak'),
(8, 'AML', '141402200', '22', 6, 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'terima', '', 'layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_sidang`
--

CREATE TABLE `penilaian_sidang` (
  `id` int(225) NOT NULL,
  `dosen` char(5) NOT NULL,
  `status_dosen` enum('pembimbing1','pembimbing2','pembanding1','pembanding2') NOT NULL,
  `nim` char(9) NOT NULL,
  `id_pengajuan` char(200) NOT NULL,
  `id_jadwal_seminar` char(200) NOT NULL,
  `sistematika` int(3) NOT NULL,
  `substansi` int(3) NOT NULL,
  `kemampuan_substansi` int(3) NOT NULL,
  `pendapat` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `grade` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_sidang`
--

INSERT INTO `penilaian_sidang` (`id`, `dosen`, `status_dosen`, `nim`, `id_pengajuan`, `id_jadwal_seminar`, `sistematika`, `substansi`, `kemampuan_substansi`, `pendapat`, `total`, `grade`) VALUES
(1, 'AML', 'pembimbing1', '141402157', '15', '9', 22, 22, 22, 24, 90, 'A'),
(2, 'MAB', 'pembanding1', '141402157', '15', '9', 24, 23, 22, 25, 94, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_uji_program`
--

CREATE TABLE `penilaian_uji_program` (
  `id` int(200) NOT NULL,
  `nim` char(9) NOT NULL,
  `penilai` enum('pembimbing1','pembimbing2') NOT NULL,
  `kemampuan_dasar` float NOT NULL,
  `kecocokan` float NOT NULL,
  `kasus` float NOT NULL,
  `ui` float NOT NULL,
  `validasi` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_uji_program`
--

INSERT INTO `penilaian_uji_program` (`id`, `nim`, `penilai`, `kemampuan_dasar`, `kecocokan`, `kasus`, `ui`, `validasi`, `total`) VALUES
(1, '141402157', 'pembimbing1', 30, 10, 20, 10, 10, 80),
(2, '141402220', 'pembimbing2', 20, 10, 20, 10, 10, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id_PS` char(9) NOT NULL,
  `nama_PS` varchar(30) NOT NULL,
  `syarat_sks` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id_PS`, `nama_PS`, `syarat_sks`) VALUES
('TIF', 'S1-Teknologi Informasi', 115),
('ILK', 'S1-Ilmu Komputer', 115),
('STI', 'S2-Teknik Informatika', 80),
('SIL', 'S3-Ilmu Komputer', 60);

--
-- Trigger `program_studi`
--
DELIMITER $$
CREATE TRIGGER `updprodi` AFTER UPDATE ON `program_studi` FOR EACH ROW BEGIN 
UPDATE bidang_ilmu SET prodi = NEW.id_PS WHERE prodi= OLD.id_PS;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penolakan_pengajuan`
--

CREATE TABLE `riwayat_penolakan_pengajuan` (
  `id_penolakan` int(100) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `waktu_penolakan` datetime NOT NULL,
  `status_validasi` varchar(30) NOT NULL,
  `catatan_validasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_penolakan_pengajuan`
--

INSERT INTO `riwayat_penolakan_pengajuan` (`id_penolakan`, `id_pengajuan`, `file`, `waktu_penolakan`, `status_validasi`, `catatan_validasi`) VALUES
(1, 11, 'Form_Pengajuan_Judul_-_Revisi_1.pdf', '2018-11-16 06:41:59', 'ditolak', 'Foto ukurannya salah, harap diperbaiki'),
(2, 11, 'Form_Pengajuan_Judul_-_Revisi_1.pdf', '2018-11-16 07:47:29', 'ditolak', 'Foto ukurannya salah, harap diperbaiki'),
(3, 11, 'Form_Pengajuan_Judul_-_Revisi_1.pdf', '2018-11-16 08:40:32', 'ditolak', 'Foto ukurannya salah, harap diperbaiki'),
(4, 11, 'Form_Pengajuan_Judul_-_Revisi_1.pdf', '2018-11-16 08:40:47', 'ditolak', 'Foto ukurannya salah, harap diperbaiki'),
(5, 14, 'Form_Pengajuan_Judul_-_Revisi_13.pdf', '2018-11-16 17:55:02', 'ditolak', 'Ukuran foto diperbaiki'),
(6, 14, 'Form_Pengajuan_Judul_-_Revisi_13.pdf', '2018-11-16 18:06:03', 'ditolak', 'Ukuran foto diperbaiki'),
(7, 16, 'Form_Pengajuan_Judul_-_Revisi_15.pdf', '2018-11-19 13:43:08', 'ditolak', 'Foto Diperbaiki, itu salah'),
(8, 21, '4_Treatment.pdf', '2018-11-24 11:55:37', 'ditolak', 'Ukuran foto tidak benar'),
(9, 21, '6_Vector_Surveillance__Control.pdf', '2018-11-24 11:56:29', 'ditolak', 'Ukuran foto tidak benar'),
(10, 21, '6_Vector_Surveillance__Control.pdf', '2018-11-24 11:57:25', 'ditolak', 'Ukuran foto kurang tepat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semhas`
--

CREATE TABLE `semhas` (
  `id` int(100) NOT NULL,
  `nim` char(9) NOT NULL,
  `persetujuan_semhas` varchar(100) NOT NULL,
  `status` enum('belum dikonfirmasi','diterima','ditolak') NOT NULL,
  `ulang` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` int(20) NOT NULL,
  `judul_skripsi` varchar(50) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_PS` char(5) NOT NULL,
  `kode_Pembimbing1` char(9) NOT NULL,
  `kode_Pembimbing2` char(9) NOT NULL,
  `Bulan_lulus` int(2) NOT NULL,
  `Tgl_lulus` year(4) NOT NULL,
  `status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus') NOT NULL,
  `ilmu1` varchar(100) DEFAULT NULL,
  `ilmu2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `judul_skripsi`, `nim`, `nama`, `kode_PS`, `kode_Pembimbing1`, `kode_Pembimbing2`, `Bulan_lulus`, `Tgl_lulus`, `status`, `ilmu1`, `ilmu2`) VALUES
(1, 'judul ta', '141402153', 'Aulia Amirullah', 'TIF', 'DDA', 'MAM', 7, 2018, 'lulus', 'Multimedia', 'Knowledge Management and Data Science'),
(2, 'test', '191402001', 'Muhammad Raka', 'TIF', 'BHQ', 'DGW', 10, 2018, 'sudah sidang', 'Knowledge Management and Data Science', 'Knowledge Management and Data Science'),
(3, 'Judul berita', '201402001', 'Muhammad Ridwan', 'TIF', 'ANL', 'ELV', 10, 2018, 'lulus', 'Multimedia', 'Computer System'),
(4, 'judul2', '201402009', 'Hagel', 'TIF', 'BM', 'FDL', 0, 0000, 'seminar proposal', 'Multimedia', 'Computer System'),
(5, 'test', '141402156', 'Adrian', 'TIF', 'NO', 'NO', 0, 0000, 'seminar proposal', 'Multimedia', 'Computer System'),
(6, 'Judul Terkini 2', '141402157', 'Charissa ', 'TIF', 'AML', 'ADC', 10, 2018, 'lulus', 'Multimedia', 'Multimedia'),
(7, 'Test', '141402158', 'Raisya', 'TIF', 'AML', 'ASH', 0, 0000, 'seminar proposal', 'Multimedia', 'Computer System'),
(8, 'Judul Pertama', '141402050', '141402050', 'TIF', 'ANL', 'BHQ', 0, 0000, 'seminar proposal', 'Multimedia', 'Computer System'),
(9, 'Test 1', '141402051', '141402051', 'TIF', 'NO', 'NO', 0, 0000, 'seminar proposal', 'Multimedia', 'Computer System'),
(10, 'test', '141402220', '141402220', 'TIF', 'ANL', 'BHQ', 0, 0000, 'seminar hasil', 'Computer System', 'Multimedia'),
(11, 'Modelling 3D Bangunan Berbasis Augmented Reality', '141402200', '141402200', 'TIF', 'ANL', 'RMA', 0, 0000, 'pengajuan judul', 'Multimedia', 'Computer System');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi_nim`
--

CREATE TABLE `skripsi_nim` (
  `id_skripsi` int(20) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `bulan_lulus` int(2) NOT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `tanggal_sempro` date DEFAULT NULL,
  `tanggal_semhas` date DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `jenis_TA` enum('skripsi','tesis','disertasi') DEFAULT NULL,
  `ilmu1` varchar(100) DEFAULT NULL,
  `ilmu2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skripsi_nim`
--

INSERT INTO `skripsi_nim` (`id_skripsi`, `nim`, `judul`, `bulan_lulus`, `tahun_lulus`, `tanggal_sempro`, `tanggal_semhas`, `tanggal_sidang`, `jenis_TA`, `ilmu1`, `ilmu2`) VALUES
(1, '121402041', 'Sistem Pengantaran Makanan dengan Pendayagunaan Vehicle Menggunakan Geographical Information System (GPS) dan Algoritma A Star (A*)', 0, 2014, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(2, '111402102', 'Enkripsi Selektif Citra Digital Menggunakan Metode Chaotic Logistic Maps pada Perangkat Android secara Real-Time', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(4, '121402022', 'Identifikasi Penyakit Hypertensive Retinopathy Melalui Citra Fundus Retina Menggunakan Probabilistic Neural Network', 0, 2016, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(5, '121402057', 'Pengenalan Gerakan Tangan Manusia Menggunakan Deep Neural Network', 0, 2016, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(6, '121402060', 'Focused Web Crawler dengan Sistem Terdistribusi', 0, 2016, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(7, '121402088', 'Clustering Artikel Web Kesehatan dengan Algoritma Self Organizing Maps', 0, 2016, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(8, '121402008', 'Klasifikasi Jenis Pengaduan Konsumen dari Layanan Media Sosial dengan Menggunakan Text Mining', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(9, '121402042', 'Implementasi Pendeteksian Kode Marshaling dengan Algoritma Multi-BLOB Tracking dan Posisi Koordinat Gerak', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(10, '121402067', 'Sistem Pendeteksian dan Geotagging Citra Papan Iklan secara Real-Time', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(11, '121402078', 'Identifikasi Tanaman Jamur Beracun Menggunakan Pendekatan K-Nearest Neighbor', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(12, '121402097', 'Real-Time Monitoring untuk Polusi Air Menggunakan Wireless Sensor Network di Danau Toba', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(13, '121402116', 'Peramalan Tingkat Swasembada Beras dengan Metode Radial Basis Function (RBF)', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(14, '111402003', 'Desain Routing Information Protocol pada Jaringan Komputer dengan Pengalokasian Jumlah Host Per Network Berdasarkan VLSM', 0, 2015, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(15, '111402005', 'Cashless Payment System untuk Pemesanan Makanan via Ojek sebagai Kurir dengan Pengamanan RSA', 0, 2017, '2000-02-01', '2000-02-01', '2000-02-01', 'skripsi', NULL, NULL),
(42, '121402070', 'Gamifikasi Cerita Rakyat Si Dayang Bandir Menggunakan Unity3D dan Algoritma Fuzzy Logic', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(43, '131402054', 'Implementasi Algoritma Smith pada Aplikasi Pencarian Lagu Dengan Fitur Speech Recognition Berbasis Android', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(44, '131402002', 'Perbandingan Metode Wavelet dan K-Means Clustering pada Segmentasi Citra Ulos Batak', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(45, '121402096', 'Klasifikasi Kualitas Biji Kakao Menggunakan Deef Neural Network (DNN)', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(46, '121402032', 'Optimalisasi Pendeteksian Hasil Image Optical Character Recognition (OCR) pada Karakter Arab Menggunakan Algoritma Bilinear', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(47, '121402086', 'Identifikasi Lokasi Fraktur Tulang Tibia dan Fibula Menggunakan Algoritma Ray Tracing', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(48, '131402048', 'Visualisasi Suhu pada Perangkat Server Komputer Menggunakan Metode Spider Web', 1, 0000, '2018-01-24', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(49, '141402014', 'Klasifikasi Kualitas air Minum dalam Kemasan  (AMDK) menggunakan Logika Fuzzy Clustering pada Data hasil Sensor Konduktivitas', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(50, '141402093', 'Peramalan Suhu Udara Rata-rata beberapa Kota Besar Dunia Menggunakan Metode Long Short Term Memory', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(51, '141402085', 'Layanan Pemesanan Makanan dengan Speech Recognition menggunakan Recurrent Neural Network Connectionist Temporal Classification', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(52, '141402144', 'Simulasi Penentuan Jalur terbaik paket data dengan Protokol Open Flow menggunakan Algoritma Dijkstra pada Software- Defined Networking', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(53, '141402089', 'Sistem Pendeteksian Radiasi Elektromagnetik menggunakan teknologi Wireless Sensor Network dan metode Linear Regression', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(54, '141402090', 'Aplikasi Chatbot pemesanan Mkaanan menggunakan Metode Text Mining', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(55, '140402092', 'Informasi Bangunan bersejarah Kota Matsum Berbasis Mixed Reality', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(56, '141402065', 'Informasi Bangunan  Universitas  Sumatera Utara Berbasis Augmented Reality', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(57, '141402015', 'Simulasi Protokol OpenFlow pada Software-Defined Networking menggunakan Pica8', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(58, '141402143', 'Simulasi Protokol OpenFlow pada Software-Defined Networking menggunakan Mininet', 1, 0000, '2018-02-06', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(59, '111402097', 'Kombinasi metode rabin-karp dan levenshtein dalam menguji kemiripan dokumen', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(60, '131402006', 'Deep neural network untuk mengidentifikasi penyakit jantung koroner, gagal jantung,dan serangan mendadak jantung dari citra EKG', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(61, '141402096', 'Implementasi manajemen terpusat sumber daya jaringan pada Campus Area Network menggunakan protocol open flow', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(62, '141402052', 'Identifikasi isyarat tangan (hand gesture)dengan pola alphabet menggunakan arduino dan sensor 3D air gesture', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(63, '131402076', 'Virtual scene pada istana maimun menggunakan hololens berbasis mixed reality', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(64, '131402125', 'Implementasi augmented reality pengenalan benda bersejarah pada museum aceh menggunakan user-defined target', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(65, '131402090', 'Identifikasi pneumonia menggunakan convolutional neural network', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(66, '131402078', 'Identifikasi kanker otak menggunakam algoritma learning vector quantization', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(67, '141402002', 'Penentuan popularitas aktor berdasarkan genre film menggunakan fp-growth', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(68, '131402117', 'Klasifikasi Penyakit Stroke menggunakan Backpropagation Neural Network', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(69, '131402009', 'Rancang bangun Sistem deteksi dan Pemetaan lokasi banjir dengan Menggunakan Mikrokontroller dan QGIS', 1, 0000, '2018-02-07', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(70, '141421061', 'Penentuan Jalur terpendek tower base transifer station (BTS) dengan algoritma dijsktra dan formula harvesine\r\n', 1, 0000, '2017-04-13', '0000-00-00', '2017-04-28', 'skripsi', NULL, NULL),
(71, '141421044', 'Implementasi Algoritma Kriptografi RSA dan Rabin pada tree pass protocol untuk pengamanan data pada aplikasi Chat berbasis Android\r\n', 1, 0000, '2017-04-10', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(72, '121401103', 'Perbandingan Algoritma Brute Force dan Algoritma A untuk mencari terpendek\r\n', 1, 0000, '2017-04-10', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(73, '121401107', 'Perbandingan Algoritma Simple Hill Climbing dan Algoritma Dijkstra untuk mencari jarak terpendek\r\n', 1, 0000, '2017-04-10', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(74, '131401066', 'Implementasi dan Perbandingan Algoritma Smith dan Algoritma Raita pada pencarian judul skripsi mahasiswa ilmu komputer USU\r\n', 1, 0000, '2017-04-20', '0000-00-00', '2017-05-02', 'skripsi', NULL, NULL),
(75, '121401001', 'Perbandingan Algoritma Quit Search dan Algoritma Optimal mismatch pada aplikasi kamus istilah potografi berbasis android\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(76, '131401084', 'Implementasi dan perbandingan algoritma berry-ravindran dan algoritma zhu takaoka pada aplikasi kamus bahasa batak toba\r\n', 1, 0000, '2017-04-20', '0000-00-00', '2017-05-02', 'skripsi', NULL, NULL),
(77, '141421004', 'Analisis perbandingan algoritma floyed dan dijsktra dalam pencarian halte lintasan terpendek menuju halte mebidang\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(78, '121401134', 'Pengamanan pesan dengan kombinasi algoritma kriptografi rives samir adleman (RSA) dan metode steganografi first of file  (FOF) dan End of File (Eof) \r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(79, '111401032', 'Implementasi Algoritma vigenere Chiper dan metode Blowfish untuk keamanan file database berbasis web\r\n', 1, 0000, '2017-04-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(80, '121401078', 'Implementasi dan analisis algoritma messey-Omura dan algoritma evenrodeh dalam pengamanan dan kompresi file dokumen\r\n', 1, 0000, '2017-04-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(81, '121401142', 'Perancangan controlel game mobile menggunakan gyroscope dengan algoritma PID dan kalmen-filtering berbasis ardruino nano dan unity\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(82, '141421031', 'pengenalan transportasi umum berbasis android dalam bahasa mandarin menggunakan augmented reality \r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(83, '141421090', 'Perancangan aplikasi kriptografi hibrida naccache-stem dan affine chiper dalam pengamanan konten file teks\r\n', 1, 0000, '2017-04-10', '0000-00-00', '2017-05-02', 'skripsi', NULL, NULL),
(84, '121421035', 'Implementasi Algoritma Rabin Karp pada Pendeteksian Kat Keraj dalam Penulisan Bahasa Inggris\r\n', 1, 0000, '2017-04-13', '0000-00-00', '2017-05-02', 'skripsi', NULL, NULL),
(85, '121421014', 'Sistem Pakar mendeteksi alergi menggunakan metode bayes dan centairty factor berbasis java pada rumah sakit haji medan\r\n', 1, 0000, '2017-04-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(86, '121401072', 'Implementasi Algoritma thresholding Adaptif dan Tesseract OCR untuk mendeteksi Citra Teks Kemasan makanan berbasis Android\r\n', 1, 0000, '2017-04-28', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(87, '111401023', 'Implementasi pada hasil citra digital dengan menggunakan perbandingan metode laplacian, laplacian of gaussian, dan difference of gaussian\r\n', 1, 0000, '2017-04-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(88, '141421032', 'Implementasi Augmented Reality pada pengenalan alat musik tradisional Aceh berbasis Android\r\n', 1, 0000, '2017-04-10', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(89, '131401048', 'Pengamanan file teks dengan skema hybrid menggunakan algoritma enigma dan algoritma rabin-willams\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(90, '141421010', 'Implementasi Algoritma S-Djikstra untuk menyelesaikan masalah shortest path dalam kasus pengangkutan kontainer sampah\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(91, '141421009', 'pengamanan data teks dengan kombinasi hibrida algoritma naccache-stern dan vernam cipher\r\n', 1, 0000, '2017-04-10', '0000-00-00', '2017-04-28', 'skripsi', NULL, NULL),
(92, '131401063', 'Implementasi dan Perbandingan algoritma brute force dengan algoritma simon dalam pembuatan kamus istilah kebidanan\r\n', 1, 0000, '2017-04-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(93, '121401008', 'Perbandingan Algoritma Floyd-Warshall dan Algoritma Steepest Ascent Hill Climbing dalam pencarian rute terpendek\r\n', 1, 0000, '2017-04-10', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(94, '131401076', 'Implementasi Hybrid Cryptosystem Algoritma RSA-CRT dan Algoritma RC4+ dalam pengamanan file teks\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(95, '131401059', 'Perbandingan Algoritma Brute Force dan Algoritma Quick Search pada aplikasi kamus bahasa indonesia-tetun berbasis android\r\n', 1, 0000, '2017-04-20', '0000-00-00', '2017-05-02', 'skripsi', NULL, NULL),
(96, '131401029', 'Implementasi Hybrid cryptosystem algoritma Rprime RSA dan Algoritma RC4A dalam Pengamanan file teks\r\n', 1, 0000, '2017-04-10', '0000-00-00', '2017-04-27', 'skripsi', NULL, NULL),
(97, '121401025', 'Implementasi algoritma RC4 dan Affine Chiper apda aplikasi short message service (SMS) berbasis android\r\n', 1, 0000, '2017-04-13', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(98, '141421008', 'Analisis dan perbandingan Algoritma Brutforce dan Algoritma Horspool pada aplikasi kamus bahasa indonesia-Mandarin\r\n', 1, 0000, '2017-04-10', '0000-00-00', '2017-04-28', 'skripsi', NULL, NULL),
(99, '141421120', 'Simulasi Sistem parkir berbasis mikrokontrolel AVR AT Mega pada platform android\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(100, '141421059', 'Implementasi Algoritma Solin dalam menentukan minimum spanning tree pada jalur pipi air di Universitas Sumatera utara\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(101, '111421012', 'Perbadingan Algoritma Greedy dan Hill Climbing untuk menentukan fasilitas kesehatan tingkat 1 (FKTP) terdekat bagi peserta BPJS Kesehatan\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(102, '141421074', 'Perancangan Mobil Robot Pemberi Pakan Unggas Ayam berbasis Arduino Uno AT Mega 328 P dengan sistem kendali Smart Android\r\n', 1, 0000, '2017-07-28', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(103, '141421118', 'Analisis Asimptotik dan Real Time mengguanakn Algoritma S-Dial untuk menentukan jarak terpendek antar kantor kepolisian di Medan\r\n', 1, 0000, '2017-07-28', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(104, '131401126', 'Perbandingan Algoritma Bitap dan Not So Naive pada aplikasi kamus istilah agama islam\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(105, '131421015', 'Analisis Perbandingan Algoritma Elias Delta Code dan Algoritma Unary Coding dalam mengkompresi file text\r\n', 1, 0000, '2017-07-27', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(106, '141421048', 'Implementasi Algoritma Manber Pada persamaan makna bahasa indonesia dan melayu berbasis android\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(107, '141421060', 'Implementasi perbedaan Algoritma Blum Shub dengan algoritma Quadrate linear congruential generator pada aplikasi password generator\r\n', 1, 0000, '2017-07-27', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(108, '141421119', 'Mendeteksi tingkat kekeruahan Air Menggunakan Mikrokontrolel Ardunio Netto dengan sensor Light Dependent Resister (LDR) dan Light emitting Dioda (LED) super bright berbasis komunikasi data online\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(109, '141421117', 'Analisis Asimptotik dan Real Time menggunakan algoritma L-Deque dalam menentukan jarak terpendek antar kantor cabang bank mandiri di kota medan\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(110, '141421043', 'Implementasi Algoritma Affine Chiper, RSA CRT dan Alternate unary code dalam pengamanan dan kompresi file teks\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(111, '141421027', 'Analisis perbandingan Algoritma Generate dan Test dengan hill climbing pada penyelesaian travelling salesman problem untuk kunjungan wisata di kab. Tapteng\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(112, '141421094', 'Sistem pendeteksi suhu menggunakan sensor suhu LM35 pada mikrokontroler arduino uno berbasis jaringan Ethernet \r\n', 1, 0000, '2017-07-21', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(113, '131401052', 'Implementasi Kriptografi Hybrid Cryptosystem Menggunakan Algoritma Vigenere Cipher dan Algoritma RSA-CRT dalam Pengamanan File Citra\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(114, '121401111', 'Implementasi Algoritma S-Ord Untuk Pencarian Rute Terpendek Antar Toko Buku Di Kota Medan\r\n', 1, 0000, '2017-07-21', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(115, '111401067', 'Teknik Pemecahan Kunci Algoritma ElGamal Dengan Metode Index Calculus\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(116, '111401131', 'Perbandingan Metode Naïve Bayes dan Profile Matching dalam Sistem Pendukung Keputusan Untuk Menentukan Pemain Inti Tim Basket SMK Telkom Sandhy Putra Medan\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(117, '111401111', 'Implementasi Kombinasi Algoritma Columnar Transposition Cipher dan Data Encryption Standard pada Aplikasi Enkripsi dan Dekripsi Teks Berbasis Android\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(118, '131401051', 'Mendeteksi Denyut Jantung Dengan Menggunakan Pulse Sensor Pada Arduino Uno Berbasis android\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(119, '131401049', 'Implementasi Super Enkripsi dengan Algoritma RC4A dan MDTM Cipher pada Pengamanan File PDF Berbasis Android\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(120, '131401074', 'Implementasi Kombinasi Algoritma Multi-Factor RSA dan Hill Cipher 4x4 dalam Skema Kriptografi Hibrida untuk Pengamanan Pesan Teks pada Aplikasi Instan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(121, '131401136', 'Perbandingan Algoritma Steganografi Echo Data Hiding dan Low Bit Encoding dalam Pengamanan File\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(122, '131401143', 'Implementasi Super Enkripsi dengan Algoritma Variably Modified Permutation Composition (VMPC) dan Two Square Cipher dalam Pengamanan File PDF Berbasis Android\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(123, '131401134', 'Implementasi Super Enkripsi dengan Algoritma Trithemius dan Double Transposition Cipher Pada Pengamanan File PDF Berbasis Android\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(124, '131401032', 'Perancangan Sistem Pengatur Suhu Air Bathup Berbasis Mikrokontroller Arduino\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(125, '131401062', 'Implementasi Deteksi Tepi Canny dan Isotropik dengan Transformasi Power Law Studi Kasus Kanker Mulut Rahim (Serviks)\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(126, '131401060', 'Perbandingan Algoritma L-Deque dan Algoritma Greedy dalam Menentukan Rute Terpendek Antar Tempat Wisata di Kabupaten Tapanuli Tengah\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(127, '131401078', 'Pengamanan File Teks dengan Hybrid Cryptosystem Algoritma Knapsack Noccache-Stern dan Algoritma Playfair Cipher\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(128, '131401026', 'Implementasi Kombinasi Algoritma Beaufort Dan Algoritma Spritz Dalam Skema Super Enkripsi Untuk Pengamanan File\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(129, '131401122', 'Implementasi Algoritma Zig-Zag Cipher dan Algoritma RC4+ Cipher Dalam Skema Super Enkripsi Untuk Pengamanan File\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(130, '131401041', 'Sistem absensi Menggunakan Wajah Pada Jaringan Syaraf Tiruan Dengan Algoritma Learning Vector Quantization (LVQ)\r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(131, '131401105', 'Implementasi Algoritma Dijkstra dalam Pencarian Restoran Fastfood Terdekat di Kota Medan Berbasis Sistem Informasi Geografis\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(132, '131401117', 'Implementasi dan Perbandingan Algoritma Optimal Mismatch dan Algoritma Rabin-Karp Pada Kamus Istilah Perbankan\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(133, '131401073', 'Implementasi Algoritma Elias Delta dan Algoritma ElGamal Dalam Kompresi dan Pengamanan Citra\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(134, '131401129', 'Implementasi Algoritma Bellman-Ford dalam Pencarian Sekolah Taman Kanak-kanak (TK) Terdekat di Kota Medan Berbasis Sistem Informasi Geografis\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(135, '131401085', 'Implementasi Algoritma Kriptografi Hill Cipher dan Kompresi Data Menggunakan Algoritma Levenstein dalam Pengamanan File Teks\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(136, '131401114', 'Implementasi Hybrid Cryptosystem Algoritma TEA (Tiny Encryption Algorithm) dan Algoritma LUC dalam Pengamanan File\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(137, '131401107', 'Implementasi Content Based Video Retrieval Menggunakan Speeded-up Robust Features (SURF)\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(138, '111401068', 'Analisis Perbandingan Metode Bandpass Filter dan Metode Bandreject Filter Pada Domain Frekuensi Untuk Mereduksi Noise Pada Citra Digital\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(139, '101421024', 'Sistem Pakar Untuk Mendeteksi Masalah Kewanitaan Menggunakan Metode Certainty Factor Dengan Teknik Ajax\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(140, '141421088', 'Implementasi Algoritma Greedy Dengan Algoritma Floyd-Warshall Untuk Menentukan Jarak Terpendek (Studi Kasus : Beberapa Apotek Terkenal di Kota Medan)\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(141, '121401016', 'Implementasi algoritma Knuth Morris Pratt Pada Aplikasi Penerjemah Teks Bahasa Indonesia - Mandailing Berbasis Android \r\n', 1, 0000, '2017-07-18', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(142, '141421054', 'Implementasi Algoritma Genetika Dalam Penjadwalan Shift Kerja di Call Center Telkomsel Medan\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(143, '131421029', 'Analisis Perbandingan Algoritma Huffman dan Algoritma Sequitur Dalam Kompresi Data Text\r\n', 1, 0000, '2017-07-25', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(144, '131401028', 'Implementasi Thresholding Metode Otsu Dan Tesseract OCR Engine Untuk Menerjemahkan Teks Berbahasa Jepang Jenis Katakana\r\n', 1, 0000, '2017-07-19', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(145, '131401013', 'Implementasi Operasi XOR dan Teknik Transposisi Segitiga untuk Pengamanan Citra JPEG Berbasis Android\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(146, '131401070', 'Implementasi Algoritma Vernam Cipher dalam Skema Three-Pass Protocol untuk Pengamanan Citra Bitmap Berbasis Android\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(147, '131401043', 'Implementasi Kriptografi Hybrid Algoritma ElGamal Dan Double Playfair Cipher dalam Pengamanan File Jpeg Berbasis Desktop\r\n', 1, 0000, '2017-07-17', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(148, '131401012', 'Implementasi Algoritma Floyd-Warshall dalam Pencarian Pasar Tradisional Terdekat di Kota Medan Berbasis Sistem Informasi Geografis\r\n', 1, 0000, '2017-07-20', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(149, '111401100', 'Implementasi Algoritma Hill Cipher pada Aplikasi  Enkripsi dan Diskripsi Citra Berbasis Android\r\n', 1, 0000, '2017-08-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(150, '131401015', 'Perancangan dan Pembuatan Kontrol Monitoring Suhu Secara Otomatis dalam Budidaya Jamur Tiram Berbasis Android \r\n', 1, 0000, '2017-07-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(151, '131401004', 'Perancangan Sistem Alir Larutan Nutrisi Otomatis pada Tanaman Hidroponik dengan Mikrokontroler Aduino Uno Bebasis Android\r\n\r\n', 1, 0000, '2017-08-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(152, '131401004', 'Perancangan Sistem Alir Larutan Nutrisi Otomatis pada Tanaman Hidroponik dengan Mikrokontroler Aduino Uno Bebasis Android\r\n\r\n', 1, 0000, '2017-08-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(153, '131401056', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Antara algoritma One Time Pad dan RSA CRT\r\n', 1, 0000, '2017-08-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(154, '131401007', 'Pengamanan File Menggunakan Algoritma Tranposisi Segitiga dan Algoritma RSA-CRT dalam Skema Hybrid Cryptosystem\r\n', 1, 0000, '2017-08-09', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(155, '131401008', 'Determinan Kinerja Petugas Kesehatan Ibu dan Anak (KIA) di Puskesmas Kota Medan Tahun 2014 Perbandingan Algoritma Knuth-Morris-Pratt dan Algoritma Apo\r\n', 1, 0000, '2017-08-22', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(156, '131401197', 'Implementasi Hybrid Cryptosystem Algoritma EL Gamal dan Algoritma Camellia dalam Aplikasi E-mail Berbasis Website\r\n', 1, 0000, '2017-08-22', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(157, '131401082', 'Pengamanan tile Teks Menggunakan Algoritma Kriptografi RC4 dan Algoritma Kompresi Even Rodeh Code\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(158, '131401022', 'Pengamanan file citra dengan skema hybrid cryptosystem menggunakan algoritma RSA-CRT dan Affine Cipher\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(159, '131401010', 'Implementasi kriptografi hybrid crypto system algoritma RSA-Naïve dan Algoritma Zig-zag dalam pengamanan file\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(160, '131401018', 'Perbandingan Algoritma Not So Naïve dan Two Way pada aplikasi kamus bahasa indonesia-Arab berbasis Android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(161, '131401057', 'Pengamanan teks dengan Hybrid Cryptosystem Algoritma Multi-Power RSA dan Algoritma Blowfish\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(162, '111401078', 'Implementasi kriptografi Hybrid algoritma Fast Data Encipherment algorithm (FEAL) dan Goldwasser-Micalli dalam pengaman file text\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(163, '121401100', 'Penentuan Lokasi Doorsmeer Terdekat di kota medan dengan algoritma S-Ord\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(164, '141421005', 'Perbandingan Algoritma Bitonic, Sort, Odd-Even Sort dan Comb sort \r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(165, '141421122', 'Implementasi Augmented Reality Pembelajaran bahasa jepang pada pengenalan perabotan kamar tidur menggunakan Hiragana\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(166, '141421024', 'Menentukan Minimum Spanning Tree pada pemasangan kabel Fiber Optik jaringan 4G di Universitas Sumatera Utara Menggunakan Algoritma Sollin dan Algorimta Prims\'s\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(167, '141421034', 'Implementasi Augmented Reality (AR) pengenalan Alat Musik Terompt Reog Jawa Timur Berbasis Android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(168, '121401119', 'Pengamanan File Teks Menggunakan Algoritma Kriptografi RC4-Spritz dan Algoritma Kompresi Bolding-Vigna 4\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(169, '131401035', 'Studi Perbandingan kinerja Teoretis dan rill algoritma exact string matching shift-and dan morris-pratt\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(170, '101401050', 'Implementasi algoritma C4.5 untuk perekrutan karyawan berbasis android (studi kasus : blackberry service center medan)\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(171, '121401026', 'Penggunaan Mikrokontroler Ardunio Due Berbasis android dengan algoritma IDEA untuk istem keamanan sepeda motor\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(172, '121401120', 'Implementasi Algoritma S-Dial Dalam pencarian Rute terpendek pada bengkel mobil di kota medan', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(173, '121401141', 'Perbandingan Algortma A* dengan Algoritma Bellman-Ford dalam mencari jalur terpendek (Toko Buku dikota medan)\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(174, '121401116', 'Implementasi Hybrid Cryptosystem algoritma IDEA dan Knapsack dalam pengamanan file Docx\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(175, '141421044', 'Implementasi Algoritma Kriptografi RSA dan Rabin pada Three-Pass Protocol untuk pengamanan data pada aplikasi chat berbasis android ', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(176, '141421091', 'Implementasi Augmented Reality (AR) pada aplikasi kosa kata peralatan rumah tangga dalam bahasa inggris untuk anak usia dini berbasis android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(177, '141421037', 'pengamanan dan Kompresi citra dengan algoritma rebalanced RSA dan Punctured Elias Code', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(178, '141421092', 'perbandingan kompleksitas waktu teoretis dan real time algoritma strand soft, sieve sort, gnome sort\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(179, '141421014', 'perancangan robot pembuat biopori berbasis arduino uno atmega328P dengan sistem kendali smartphone android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(180, '121421065', 'Sistem Pendukung keputusan pemilihan mobil pada segmen MPV (Multipurpose vehicle) menggunakan metode analytic hierarchy process (AHP) dan weighted product (WP)\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(181, '121421017', 'Analisis Kinerja Algoritma Elia Omega dan Elgoritma Fixed Length Binary Encoding pada Kompresi File Teks\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(182, '121401075', 'Implementasi Jaringan Saraf Tiruan Self Organizing Map Kohonen dengan Menggunakan metode Linear Discriminant analysis dalam indetifikasi iris mata\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(183, '121421091', 'Implementasi metode AHP dan PROMETHEE untuk merangking mobil jenis SUV\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(184, '121421024', 'Perancangan Aplikasi kamus kanji bahasa jepang dengan menggunakan metode string matching knuth-morris-pratt\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(185, '141421023', 'perbandingan algoritma alternate reverse unary codes dan algoritma run length encoding (RLE) pada kompresi citra.jpg\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(186, '131421028', 'Implementasi Augmented Reality (AR) dalam pengenalan jamur yang berkhasiat bagi kesehatan.\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(187, '131401063', 'Implementasi dan Perbandingan algoritma brute force dengan algoritma simon dalam pembuatan kamus istilah kebidanan\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(188, '121401045', 'perbandingan algoritma pencocokan kata menggunakan algoritma Knuth-Morris-Pratt dan algoritma rabin-Karp pada kumpulan terjemahan hadis sahih bukhari muslim\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(189, '141421126', 'Implemantasi algoritma runut balik (backtracking) dalam penyelesain permainan Puzzle sudoku berbais android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(190, '141421006', 'Sistem keamanan rumah berbasis minikomputer raspberry Pi Via SMS Menggunakan Kamera Sensor, PIR dan Sensor Getar\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(191, '131421026', 'Implementasi augmented reality (AR) sebagai media pengenalan flora dan fauna bawah laut berbasis android\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(192, '121421002', 'Analisis kinerja algoritma golbach codes dengan algoritma variabel length binary encoding (VLBE) dalam kompresi file teks\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(193, '141421073', 'Analisis algoritma lempel-Ziv Welch (LZW), arithmatic Coding (AC) dan kombinasi algoritma LZW-AC pada kompresi citra BMP\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(194, '141421056', 'Implementasi kriptografi Hybrid pada algoritma One Time Pad (OTP) dan Algoritma Micali Goldwasser\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(195, '101421040', 'Sistem pendukung keputusan untuk mencari restauran terbik dikota medan berbasis sistem informasi geografis dengan AHP dan Djikstra\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(196, '091401029', 'Pengenalan Pola Karakter dan Penerjemah Aksara Katakana Menggunakan Implementasi Algoritma Associative Memory Tipe Hetero-Associative\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(197, '121421088', 'Implementasi Ruby Game Scripting system pada game ludo \r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(198, '121421096', 'Implementasi Algoritma Interative Dichotomizer Three (ID3) untuk pemilihan sepeda motor\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(199, '111401052', 'implementasi steganografi hopping spread spectrum ke dalam file video\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(200, '121401013', 'Pencarian Shortesst-Path antar puskesmas kota medan menggunakan algoritma floyd-warshall dan L-Deque\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(201, '111401125', 'Implementasi algoritma djikstra pada game pak raden dan pak ogah\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(202, '111421012', 'Perbandingan Greedy dan Hill Climbing untuk menentukan fasilitas kesehatan tingkat pertama (FKTP) terdekat bagi peserta BPJS Kesehatan\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(203, '141421043', 'Implementasi Algoritma Affine Chiper, RSA CRT dan Alternate unary code dalam pengamanan dan kompresi file teks\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(204, '141421027', 'Analisis perbandingan Algoritma Generate dan Test dengan hill climbing pada penyelesaian travelling salesman problem untuk kunjungan wisata di kab. Tapteng\r\n', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(205, '141421117', 'Analisis Asimptotik dan Real Time menggunakan algoritma L-Deque dalam menentukan jarak terpendek antar kantor cabang bank mandiri di kota medan\r\n', 1, 0000, '0000-00-00', '0000-00-00', '2017-07-28', 'skripsi', NULL, NULL),
(206, '141421059', 'Implementasi Algoritma Solin dalam menentukan minimum spanning tree pada jalur pipi air di Universitas Sumatera utara\r\n', 1, 0000, '0000-00-00', '0000-00-00', '2017-07-27', 'skripsi', NULL, NULL),
(207, '141421114', 'Simulasi Algoritma Stable Marriage Kiraly Dalam menentukan Calon Pasangan Hidup\r\n', 1, 0000, '2017-07-21', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(208, '131401137', 'Implementasi Algoritma Beaufort Cipher dan pada Aplikasi Short Message Service (SMS) Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(209, '131401036', 'Perbandingan Galil-Seiferas danReverse Colussi pada Kamus Istilah Antropologi Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(210, '131401001', 'Pengamanan File Teks Dengan Algoritma Rabin dan Algoritma Steganografi First Of File dan End Of File', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(211, '131401064', 'Pengamanan File Teks dengan Algoritma Kunci Publik RSA dan Algoritma Steganografi Select Least Signifikant Bit', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(212, '131401065', 'Perbandingan Algoritma dan Algoritma Quick Search pada Aplikasi kamus Bahasa Indonesia - Bahasa Perancis Berbasis Dekstop', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(213, '131401021', 'Perbandingan Algoritma Heuristik Random Walk dan Algoritma Deterministik L- Deque untuk Pencarian jarak Terpendek ( Shortetspath) (Studi kasus : pariwisata)', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(214, '111401075', 'Perbandingan Algoritma Bitap dan Algoritma Horspool pada Aplikasi  kamus Ekabahasa Indonesia pada Platform IOS', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(215, '111401092', 'Implementasi Digital Signatura pada File Text dengan Menggunakan Algoritma Schnorr Berbasis android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(216, '111401084', 'Analisis Perbandingan Kombinasi Metode Alpha-Trimmed Mean Filter, Geometric Mean Filter, dan Kombinasi Alpha-Trimmed Mean Filter dengan Geometric Mean', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(217, '101401084', 'Kombinasi Kriptografi RSA dengan Algoritma Kriptografi NOEKEON untuk Pengamanan Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(218, '111401112', 'Implementasi Augmented Reality (AR) dalam Menampilkan jadwal IKLC', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(219, '111401066', 'Implementasi Algoritma Golomb-Rice Coding Untuk Kompresif File Citra Berbasis android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(220, '111401130', 'Implementasi dan Perbandingan Algoritma Apostolica-Goancarlo dan Horspool pada kamus Efek Visual', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(221, '121401102', 'Perbandingan Algoritma Messege Diggest 5 (MD5) dan Sha 256 pada Hashing File Dokumen', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(222, '121401046', 'Analisis Optimisasi Klasterisasi Dokumen Berbahasa Indonesia Dengan Metode Pembobotan Term Frequency-Inverse Document Frequency dan latent Semantic An', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(223, '121401039', 'Perbandingan Algoritma Raita dan Horspool pada Aplikasi Kamus Bahasa Jerman- Bahasa Indonesia Berbasis Web', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(224, '131401033', 'Implementasi dan Perbandingan Algoritma  Berry-Raviindran dan Algoritma Rabin-Karp pada Kamus Istilah Mananjemen keuangan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(225, '131401027', 'Studi Kompresi kinerja Algoritma Goldbact G1 Code dan Algoritma Unary Codes dalam Kompresi text', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(226, '131401023', 'Perbandingan Kinerja Algoritma Fobonacci Codes dan Algoritma Reverse Unary Codes dalam Kompresi Citra', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(227, '131401046', 'Pengamanan File PDF Dengan Sistem Kriptografi Hibrida Algoritma RSA With Chinese Remaindev Thearem (RSA-CRT) dan Algoritma XOR', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(228, '131401053', 'Perbandingan Algoritma Boyer- Moore dan Horspool pada Aplikasi Kamus Bahasa Indonesia- Minang Berbasis Web', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(229, '131401089', 'Perbandingan Algoritma Not So Na?ve dan Algoritma Shift dalam Aplikasi kamus bahasa Indonesia - Bahasa turki berbasis Web', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(230, '131401091', 'Implementasi Algiritma Affine dan Metode Spread Spectrum untuk Pengamanan File Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(231, '121401135', 'Analisis dan Implementasi Kombinasi Algoritma Skipjack dan Algoritma Mcaliece pada Pengamanan File teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(232, '131401014', 'Perbandingan Algoritma Rabin karp dan Algoritma Knuth Morris Pratt pada Aplikasi kamus bahasa indonesia-Gayo Berbasis Web', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(235, '121401136', 'Perbandingan AlgoritmaPerbandingan Algoritma Gale-Shapley dan Irving dalam Stable Matching Problem Penentuan Calon Ketua Bidang IMILKOM', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(236, '131401058', 'Implementasi Hybrid Cryptosystem Algoritma  RSA-CRT dan Algoritma MDMT (Monograph Digrap Transposition Monograph ) Cipher dalam Pengamana Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(237, '121401032', 'Perbandingan Algoritma Bellman-Ford dan Algoritma Floyd-Marshal dalam Pencarian Rute Terpendek Studi Kasus ATM Bank BNI Kota Medan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(238, '131401069', 'Perbandingan Algoritma String Matching On Orderan Alphabets dan Algoritma Simon dalam Kamus Istilah Arsitektur', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(239, '121401004', 'Implementasi Pengamanan Data Teks dengan Metode Internasional Data Encryption Algoritma (IDEA) Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(240, '121401049', 'Perancangan Kamus Jerman Indonesia dengan Membandingkan Algoritma Sting Mathcing Turbo Boyer-Moore dan Bruto Force Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(241, '131401031', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Algoritma Multi-Factor RSA dan Algoritma Play Fair Cipher', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(242, '121401068', 'Perbandingan Algoritma Horspol dab Not So Na?ve dalam Pembuatan Kamus Bahasa Indonesia-Bahasa Aceh Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(243, '121401021', 'Perbandingan Teoretis dan Riil Algoritma Multiprime RSA dan Prime RSA pada Pengamanan File Dokumen', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(244, '131401044', 'Perbandingan Algoritma Floyd-Marshall dan Bellman-Ford dalam Pencarian Jarak Terpendek Antar ATM di Kota Tebing Tinggi', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(245, '131401102', 'Implementasi Three-Pass Protocal dengan Kombinasi Algoritma Vigenere Cipher dan Algoritma One Time Pad dalam Pengamanan File Gambar', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(246, '131401094', 'Pembangunan Aplikasi Volunteer Computing Berbasis Dekstop untuk Melakukan Proses Ray Tracing', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(247, '121401069', 'Implementasi Algotima Binary Search dan Metode Approximate Sting Matching pada Voice to Voice Translator : Indonesia-Jepang', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(248, '121401005', 'Analisis Algoritma Rabin dan Algoritma Elias Omega Code dalam Pengamanan dan Kompresi File Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(249, '131401079', 'Pengamanan Citra dengan Algoritma Kriptografi VMPC dan Algoritma Steganografi LSB dengan Penyisipan pada Titik Hijau', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(250, '121401037', 'Pengamanan File Teks dengan Menggunakan Algoritma Skipjack dan Kompresi Algortima Taboo', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(251, '131401087', 'Membangun Rancangan Aplikasi Sistem Server Terbuka(Open Lobby) untuk Mendukung Fitur Multiplayer pada Game', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(252, '131401006', 'Pengembangan Protokol Fitur Multiplayer pada Permainan Satu Lawan Satu Dengan Menggunakan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(253, '131401110', 'Kombinasi Algoritma RC5 Block Cipher dan Algoritma Rebalances RSA dalam Pengamanan Pesan Instan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(254, '131401016', 'Pengamanan File Citra dengan Skema Hybrid Cryptosystem Menggunakan Algoritma LUC dan Algoritma MDTM Cipher', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(255, '131401011', 'Implementasi Konsep Hybrid Algoritma RSA-Na?ve dan Algoritma RC4+ dalam Pengamanan File JPG pada Aplikasi Instant Messaging', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(256, '131401019', 'Pengenalan Plat Kendaraan Bermotor Menggunakan Algoritma Local Threshold, Normalisasi, Segmentasi, LVQ', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(257, '131401116', 'Implementasi Algoritma Elgamal dan Algoritma One-Time Pad (OTP) dalam Pengaman File Audio Berbasis Dekstop', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(258, '131401039', 'Penerapan Hybrid Cryptosystem Algoritma Variably Modified Permutation Composition (VMPC) dan Algoritma Elgamal dalam Pengamanan File', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(259, '131401025', 'Klasifikasi Analisi Sentimen Optical Character Recognition (OCR) dan Algoritma Naive Bayes', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(260, '131401061', 'Implementasi Kriptografi Hybrid Algoritma One Time Pad (OTP) dan RSA Rprime dalam Pengamanan File Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(261, '131401132', 'Implementasi Algoritma RC4+ dan Rabin-Williams dalam Skema Hybrid Cryptosystem dalam Pengamanan File Gambar pada Aplikasi Instant Messaging', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(262, '121401028', 'Implementasi Kriptografi Algoritma Skipjack & Steganografi LSB pada Citra Digital', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(263, '131401074', 'Implementasi Kombinasi Algoritma Multi-Factor RSA dan Hill Cipher 4x4 dalam Skema Kriptografi Hibrida untuk Pengamanan Pesan Teks pada Aplikasi Instan', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(264, '131401096', 'Implementasi dan Perbandingan Algoritma Reverse Collusi dan Algoritma Raita pada Aplikasi Pencarian Link Lagu Bahasa Indonesia dengan Speech Recognition', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(265, '131401030', 'Implementasi Algoritma Greedy dalam Pencarian Car Wash Terdekat di Kota Medan Berbasis Sistem Informasi Geografis', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(266, '131401038', 'Pengembangan Robot pada Mikrokontroler Arduino Uno Berbasis Android Untuk Mendeteksi Kelayakan Air Minum Isi Ulang', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(267, '131401020', 'Analisi Perbandingan Algoritma Evan-Rodh Code dan Algoritma Fibonaci Code untuk Kompresi File Teks', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(268, '131401125', 'Implementasi Kriptografi dengan Algoritma Rivest Shamir Adleman (RSA) dan Algoritma Kompresi Huffman pada File Wav', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(269, '111401033', 'Implemntasi Augmented Reality untuk Menampilkan Animasi Hewan pada Kebun Binatang Pematang Siantar', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(270, '111401014', 'Analisis Perbandingan Kompresi Citra Menggunakan Metode Lempel Ziv Welch (LZW) dan Fraktal', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL);
INSERT INTO `skripsi_nim` (`id_skripsi`, `nim`, `judul`, `bulan_lulus`, `tahun_lulus`, `tanggal_sempro`, `tanggal_semhas`, `tanggal_sidang`, `jenis_TA`, `ilmu1`, `ilmu2`) VALUES
(271, '131401068', 'Implementasi Algoritma Variably Modified Permutation and Composition', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(272, '131401111', 'Implementasi Jaringan Syaraf Tiruan untuk Pengenalan Pola dan Penerjemah Aksara Batak Toba dengan Metode Hetero-Associative Memory Berbasis ', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(273, '121401038', 'Perbandingan Algoritma Berry Ravindran dan Algoritma Knuth Morris Pratt pada Aplikasi Kamus Gizi Berbasis Web', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(274, '131401067', 'Implementasi Kriptografi Hybrid Algoritma Playfair Cipher dan Luc dalam Pengaman File JPEG Berbasis Dekstop', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(275, '131401005', 'Pemanfaatan Algoritma Hill Cipher dan Algoritma Multi Prime RSA dalam Skema Hybrid pada Aplikasi Short Message Service (SMS) Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(276, '131401108', 'Implementasi Pengamanan File Teks Menggunakan Algoritma Kriptografi Spritz dan Teknik Steganografi Bip Plane Complexity Segmentation atau (BPCS)', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(277, '131401054', 'Implementasi Algoritma Vigenere Cipher dan RSA Rebalanced pada Pengamanan Citra dalam Skema Kriptografi Hybrid', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(278, '131401127', 'Algoritma Affine Cipher dan Algoritma Multi-Factor RSA pada Pengamanan Citra Digital dalam Skema Kriptografi Hybrid', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(279, '131401120', 'Implementasi Kriptografi Hybrid Algoritma RSA-CRT dan Playfair Cipher dalam Pengaman File Citra', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(280, '141421021', 'Perancangan Perangkat Sistem Laporan Sikat Gigi pada Anak Berbasis Short Message Service (SMS) Menggunakan Mikrokontroler ATMega8', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(281, '141421012', 'Implementasi dan Analisis Algoritma Zhu-Takaoka dam Algoritma Knuth-Morris-Pratt pada Aplikasi Kamus Istilah Kesehatan Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(282, '141421063', 'Analisis dan Perbandingan Algoritma Turbo Booyer-Moore dan Algoritma Not so Naive pada Aplikasi Kamus bahasa Belanda-Indonesia Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(283, '141421070', 'Implementasi Augmented Reality Pengenalan alat-alat Hiking Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(284, '131421070', 'Implementasi pemanfaatan Augmented Reality sebagai Media Pembelajaran untuk memperkenalkan pakaian Adat Batak Berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(285, '131421101', 'Perancangan dan pembuatan Sistem Keamanan Rumah menggunakan Gatway berbasis Mikrokotroler Arduino AtMega 2560', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(286, '141421080', 'Implementasi Augmented Reality(AR) sebagai media pengenal alat musik khas Sumatera Barat berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(287, '141421058', 'Implementasi Algoritma Genetika untuk Penyelesaian Travelling Salesman Problem(TSP) berbasis Android', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(288, '141421007', 'Implementasi Pengamanan File Text dengan Algoritma Kriptografi Stream Cipher dan Kombinasi Steganografi First of File dan End of File', 1, 0000, '0000-00-00', '2018-03-20', '0000-00-00', 'skripsi', NULL, NULL),
(289, '131401097', 'Implementasi Hybrid Cryptosystem Algoritma EL Gamal dan Algoritma Camellia dalam Aplikasi E-mail Berbasis Website', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(290, '121401113', 'Implementasi Kombinasi Affine Cipher Dengan Matriks Untuk Pengamanan File', 1, 0000, '0000-00-00', '0000-00-00', '0000-00-00', 'skripsi', NULL, NULL),
(291, '141402153', 'judul ta', 7, 2018, NULL, '2018-07-25', '2018-07-28', 'skripsi', NULL, NULL),
(311, '141402220', 'test', 0, NULL, NULL, '2018-10-29', NULL, 'skripsi', NULL, NULL),
(312, '141402200', 'Modelling 3D Bangunan Berbasis Augmented Reality', 0, NULL, NULL, NULL, NULL, 'skripsi', NULL, NULL);

--
-- Trigger `skripsi_nim`
--
DELIMITER $$
CREATE TRIGGER `log_pencatatan` AFTER INSERT ON `skripsi_nim` FOR EACH ROW BEGIN
INSERT INTO log_pencatatan
(user,nim,judul,waktu)
VALUES(USER(),NEW.nim,NEW.judul,NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tesis`
--

CREATE TABLE `tesis` (
  `id_tesis` char(9) NOT NULL,
  `judul_skripsi` varchar(50) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `kode_PS` char(5) NOT NULL,
  `kode_pembimbing1` char(9) NOT NULL,
  `kode_pembimbing2` char(9) NOT NULL,
  `Tgl_lulus` date NOT NULL,
  `status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tesis`
--

INSERT INTO `tesis` (`id_tesis`, `judul_skripsi`, `nim`, `nama_mhs`, `kode_PS`, `kode_pembimbing1`, `kode_pembimbing2`, `Tgl_lulus`, `status`) VALUES
('2327183', 'Citra ', '141402152', 'Rahmad Eko', 'TIF', 'TYR', 'YTR', '2016-11-30', 'pengajuan judul'),
('58777698', 'Abstrak Modul', '141402156', 'Bintang Kevin', 'TIF', 'GYT', 'FTR', '2016-11-30', 'pengajuan judul'),
('323242332', 'Alterasi', '121202113', 'Davido Nguyen', 'ILK', 'FTR', 'GYT', '2017-12-14', 'pengajuan judul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` char(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `kd_dsn` char(12) NOT NULL,
  `prodi` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `kd_dsn`, `prodi`, `nama`) VALUES
('admin', '614913bc360cdfd1c56758cb87eb9e8f', 1, '', '', ''),
('maya', 'b2693d9c2124f3ca9547b897794ac6a1', 2, 'MSL', '', ''),
('141402153', '368c31a3dcc694c0ee7b5ec518fc5c7a', 3, '', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('191402001', '1f4369c7afe713764919cbde8708077d', 3, '', '', ''),
('191402002', '4c85565a499476183452845f26e4c6b0', 3, '', '', ''),
('161402009', 'ff9d12789eb959b3fc7fc22590ccfe89', 3, '', '', ''),
('201402001', 'ab6546c873ebab01b60f208da84098b5', 3, '', '', ''),
('201402009', 'f2ade46f6bd435c87bd6ed277f360658', 3, '', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('Amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 2, 'AML', '', ''),
('191402003', 'd6159f80335a355af347e8355ff1499a', 3, '', '', ''),
('ketua_prodi_ilk', 'd91087d0fd8ac24e4bedd5c4c517f07e', 4, '', 'ILK', ''),
('admin_ti', '0ba8aaeb08659d9132e11d2bbead62a2', 1, '', 'TIF', 'Admin TI'),
('admin_ti', '0c43a1d7fd906993c1910017e7a603ad', 1, '', 'ILK', 'Admin TI'),
('ketua_prodi_ti', '24de376c862cbc53d2e5b110f0883498', 4, '', 'TIF', 'Ketua Program Studi S1-Teknologi Informasi'),
('141402154', '9a57ebc79c773550b06008047cdc2607', 3, '', '', ''),
('kepala_lab_ta', 'e43612420b30ec6b7e0c58bea2c74f21', 6, '', '', 'Kepala Lab Tugas Akhir'),
('141402155', '8f4f639fedf25fa35cb48d20a65b7e26', 3, '', '', ''),
('141402156', '189d01370f704e41f2596e5aca81e493', 3, '', '', ''),
('141402157', '64b715ea88e4d2c523173cbe03a9f770', 3, '', '', ''),
('ade', 'a562cfa07c2b1213b3a5c99b756fc206', 2, 'ADC', '', ''),
('141402158', '4852f3741d777cd589a2a8688e4d691f', 3, '', '', ''),
('andri', '6bd3108684ccc9dfd40b126877f850b0', 2, 'MAB', '', ''),
('baihaqi', 'd1652902023eb117cd6ddf04eddf11e0', 2, 'BHQ', '', ''),
('141402050', '5f0046276e5ae3c255772ac9881bb699', 3, '', '', ''),
('ainul', '110a4fa5d91e3af9ec1c099f934e6d7d', 2, 'ANL', '', ''),
('141402051', '294cb03c4368b6239df3a285d925f17e', 3, '', '', ''),
('141402052', 'bbf9fbdf6d5173dfb63c031a772424cf', 3, '', '', ''),
('141402220', '7684c1f923a2982c87d70d3aa333dcab', 3, '', '', ''),
('141402200', 'e083d816564bca36ef9cf1411f4fbb44', 3, '', '', ''),
('rachmat', '2dbc7dd7e9524ddff1157d2e3df10aeb', 2, 'RMA', '', ''),
('sekprodi_ti', '42278c9513bfe97fd9f4c3f73e845522', 5, '', 'TIF', 'Sekretaris Program Studi S1-Teknologi Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_penggandaan`
--

CREATE TABLE `validasi_penggandaan` (
  `id` int(255) NOT NULL,
  `id_pengajuan_judul` int(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `cd_kode_jurnal` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `form_persetujuan` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_bebas` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi_penggandaan`
--

INSERT INTO `validasi_penggandaan` (`id`, `id_pengajuan_judul`, `nim`, `cd_kode_jurnal`, `form_persetujuan`, `fotokopi_bebas`) VALUES
(1, 2, '141402153', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(2, 4, '191402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(3, 5, '201402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(4, 15, '141402157', 'checked', 'checked', 'checked');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_semhas`
--

CREATE TABLE `validasi_semhas` (
  `id` int(255) NOT NULL,
  `id_pengajuan_judul` char(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `fotokopi_krs` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_sk_dopim` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_kelunasan_spp` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `lembar_kendali_prasemhas` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi_semhas`
--

INSERT INTO `validasi_semhas` (`id`, `id_pengajuan_judul`, `nim`, `fotokopi_krs`, `fotokopi_sk_dopim`, `fotokopi_kelunasan_spp`, `lembar_kendali_prasemhas`) VALUES
(1, '15', '141402157', 'checked', 'checked', 'checked', 'checked'),
(2, '20', '141402220', 'checked', 'checked', 'unchecked', 'checked');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_sempro`
--

CREATE TABLE `validasi_sempro` (
  `id` int(255) NOT NULL,
  `id_pengajuan_judul` int(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `fotokopi_krs` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_kelunasan_spp` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `lembar_kendali_prasempro` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi_sempro`
--

INSERT INTO `validasi_sempro` (`id`, `id_pengajuan_judul`, `nim`, `fotokopi_krs`, `fotokopi_kelunasan_spp`, `lembar_kendali_prasempro`) VALUES
(1, 1, '141402153', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(2, 2, '141402153', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(3, 4, '191402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(4, 5, '201402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(5, 7, '201402009', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(6, 11, '141402154', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(7, 13, '141402156', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(8, 15, '141402157', 'checked', 'checked', 'checked'),
(9, 16, '141402158', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(10, 12, '141402155', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(11, 17, '141402050', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(12, 17, '141402050', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(13, 17, '141402050', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(14, 18, '141402051', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(15, 20, '141402220', 'checked', 'checked', 'checked'),
(16, 22, '141402200', 'checked', 'checked', 'checked');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_sidang`
--

CREATE TABLE `validasi_sidang` (
  `id` int(255) NOT NULL,
  `id_pengajuan_judul` int(255) NOT NULL,
  `nim` char(9) NOT NULL,
  `buku_bimbingan` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `kartu_kemajuan_mahasiswa` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `lembar_kendali_prasidang` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `draf_jurnal` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_krs` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `fotokopi_slip_spp` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL,
  `sk_dopim` enum('checked','belum dikonfirmasi','unchecked','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi_sidang`
--

INSERT INTO `validasi_sidang` (`id`, `id_pengajuan_judul`, `nim`, `buku_bimbingan`, `kartu_kemajuan_mahasiswa`, `lembar_kendali_prasidang`, `draf_jurnal`, `fotokopi_krs`, `fotokopi_slip_spp`, `sk_dopim`) VALUES
(1, 2, '141402153', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(2, 2, '141402153', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(3, 4, '191402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(4, 4, '191402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(5, 4, '191402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(6, 5, '201402001', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(7, 15, '141402157', 'checked', 'checked', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(8, 15, '141402157', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked'),
(9, 15, '141402157', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(10, 15, '141402157', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi'),
(11, 15, '141402157', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi', 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_cari_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_cari_mahasiswa` (
`nim` char(9)
,`nama` varchar(30)
,`id_PS` char(9)
,`status` enum('pengajuan judul','belum sempro','belum semhas','belum sidang','sudah sidang','lulus')
,`kd_pemb1` varchar(10)
,`pembimbing1` varchar(60)
,`kd_pemb2` varchar(10)
,`pembimbing2` varchar(60)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `v_disertasi`
--

CREATE TABLE `v_disertasi` (
  `id_disertasi` char(20) DEFAULT NULL,
  `nim` char(9) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kode_PS` char(5) DEFAULT NULL,
  `nama_PS` varchar(30) DEFAULT NULL,
  `judul_skripsi` varchar(50) DEFAULT NULL,
  `kode_pembimbing1` char(9) DEFAULT NULL,
  `Dosen_Pembimbing1` varchar(60) DEFAULT NULL,
  `kode_pembimbing2` char(9) DEFAULT NULL,
  `Dosen_Pembimbing2` varchar(60) DEFAULT NULL,
  `Tgl_lulus` date DEFAULT NULL,
  `status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_dosen`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_dosen` (
`Kode_dosen` char(10)
,`Nama_dosen` varchar(60)
,`Pangkat` varchar(25)
,`Golongan` varchar(25)
,`NIP` varchar(18)
,`NIDN` varchar(20)
,`Kode_PS` char(5)
,`nama_PS` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_mahasiswa_diuji`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_mahasiswa_diuji` (
`nim` char(9)
,`nama` varchar(30)
,`id_PS` char(9)
,`status` enum('pengajuan judul','belum sempro','belum semhas','belum sidang','sudah sidang','lulus')
,`kd_pemb1` char(6)
,`pembanding1` varchar(60)
,`kd_pemb2` char(6)
,`pembanding2` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_mahasiswa_seminar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_mahasiswa_seminar` (
`id_jadwal_seminar` int(9)
,`nim` char(9)
,`nama` varchar(30)
,`nama_PS` varchar(30)
,`Dosen_Pembimbing1` varchar(60)
,`Dosen_Pembimbing2` varchar(60)
,`id_pengajuan` char(200)
,`status_kelayakan_sempro` enum('belum dikonfirmasi','layak','tidak layak')
,`status_kelayakan` enum('belum dikonfirmasi','layak','tidak layak')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_pencarian_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_pencarian_mahasiswa` (
`nim` char(9)
,`tahun_lulus` year(4)
,`nomor_sk_pembimbing` varchar(20)
,`nomor_sk_pembanding` varchar(20)
,`nama` varchar(30)
,`nama_PS` varchar(30)
,`judul` varchar(300)
,`kode_pembimbing1` varchar(10)
,`Dosen_Pembimbing1` varchar(60)
,`kode_pembimbing2` varchar(10)
,`Dosen_Pembimbing2` varchar(60)
,`Kode_Pembanding1` char(6)
,`Dosen_Pembanding1` varchar(60)
,`Kode_pembanding2` char(6)
,`Dosen_Pembanding2` varchar(60)
,`nilai_uji_program` float(5,3)
,`nilai_semhas` float(5,3)
,`nilai_sidang` float(5,3)
,`total` float(7,3)
,`grade` char(3)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_pencatatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_pencatatan` (
`nim` char(9)
,`tahun_lulus` year(4)
,`bulan_lulus` int(2)
,`nomor_sk_pembimbing` varchar(20)
,`nomor_sk_pembanding` varchar(20)
,`nama` varchar(30)
,`nama_PS` varchar(30)
,`judul` varchar(300)
,`kode_pembimbing1` varchar(10)
,`Dosen_Pembimbing1` varchar(60)
,`kode_pembimbing2` varchar(10)
,`Dosen_Pembimbing2` varchar(60)
,`Kode_pembanding1` char(6)
,`Dosen_Pembanding1` varchar(60)
,`Kode_pembanding2` char(6)
,`Dosen_Pembanding2` varchar(60)
,`nilai_uji_program` float(5,3)
,`nilai_semhas` float(5,3)
,`nilai_sidang` float(5,3)
,`total` float(7,3)
,`grade` char(3)
,`jenis_TA` enum('skripsi','tesis','disertasi')
,`ilmu1` varchar(100)
,`ilmu2` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_script`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_script` (
`id_skripsi` int(20)
,`nim` char(9)
,`nama` varchar(30)
,`kode_PS` char(5)
,`nama_PS` varchar(30)
,`judul_skripsi` varchar(50)
,`kode_pembimbing1` char(9)
,`Dosen_Pembimbing1` varchar(60)
,`kode_pembimbing2` char(9)
,`Dosen_Pembimbing2` varchar(60)
,`Tgl_lulus` year(4)
,`status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `v_tesis`
--

CREATE TABLE `v_tesis` (
  `id_tesis` char(9) DEFAULT NULL,
  `nim` char(9) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kode_PS` char(5) DEFAULT NULL,
  `nama_PS` varchar(30) DEFAULT NULL,
  `judul_skripsi` varchar(50) DEFAULT NULL,
  `kode_pembimbing1` char(9) DEFAULT NULL,
  `Dosen_Pembimbing1` varchar(60) DEFAULT NULL,
  `kode_pembimbing2` char(9) DEFAULT NULL,
  `Dosen_Pembimbing2` varchar(60) DEFAULT NULL,
  `Tgl_lulus` date DEFAULT NULL,
  `status` enum('pengajuan judul','seminar proposal','seminar hasil','sidang','sudah sidang','lulus') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_test`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_test` (
`Nama_dosen` varchar(60)
,`Kode_dosen` char(10)
,`kuota` int(3)
,`stambuk` int(4)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_cari_mahasiswa`
--
DROP TABLE IF EXISTS `v_cari_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cari_mahasiswa`  AS  select `a`.`nim` AS `nim`,`a`.`nama` AS `nama`,`a`.`id_PS` AS `id_PS`,`a`.`status` AS `status`,`b`.`pembimbing1` AS `kd_pemb1`,`c`.`Nama_dosen` AS `pembimbing1`,`b`.`pembimbing2` AS `kd_pemb2`,`d`.`Nama_dosen` AS `pembimbing2` from (((`mahasiswa` `a` join `pembimbing` `b`) join `dosen` `c`) join `dosen` `d`) where ((`a`.`nim` = `b`.`nim`) and (`c`.`Kode_dosen` = `b`.`pembimbing1`) and (`d`.`Kode_dosen` = `b`.`pembimbing2`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_dosen`
--
DROP TABLE IF EXISTS `v_dosen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dosen`  AS  select `a`.`Kode_dosen` AS `Kode_dosen`,`a`.`Nama_dosen` AS `Nama_dosen`,`a`.`Pangkat` AS `Pangkat`,`a`.`Golongan` AS `Golongan`,`a`.`NIP` AS `NIP`,`a`.`NIDN` AS `NIDN`,`a`.`Kode_PS` AS `Kode_PS`,`b`.`nama_PS` AS `nama_PS` from (`dosen` `a` join `program_studi` `b`) where (`a`.`Kode_PS` = `b`.`id_PS`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_mahasiswa_diuji`
--
DROP TABLE IF EXISTS `v_mahasiswa_diuji`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mahasiswa_diuji`  AS  select `a`.`nim` AS `nim`,`a`.`nama` AS `nama`,`a`.`id_PS` AS `id_PS`,`a`.`status` AS `status`,`b`.`pembanding1` AS `kd_pemb1`,`c`.`Nama_dosen` AS `pembanding1`,`b`.`pembanding2` AS `kd_pemb2`,`d`.`Nama_dosen` AS `pembanding2` from (((`mahasiswa` `a` join `pembanding` `b`) join `dosen` `c`) join `dosen` `d`) where ((`a`.`nim` = `b`.`nim`) and (`c`.`Kode_dosen` = `b`.`pembanding1`) and (`d`.`Kode_dosen` = `b`.`pembanding2`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_mahasiswa_seminar`
--
DROP TABLE IF EXISTS `v_mahasiswa_seminar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mahasiswa_seminar`  AS  select `mahasiswa_sidang`.`id_jadwal_seminar` AS `id_jadwal_seminar`,`v_script`.`nim` AS `nim`,`v_script`.`nama` AS `nama`,`v_script`.`nama_PS` AS `nama_PS`,`v_script`.`Dosen_Pembimbing1` AS `Dosen_Pembimbing1`,`v_script`.`Dosen_Pembimbing2` AS `Dosen_Pembimbing2`,`mahasiswa_sidang`.`id_pengajuan` AS `id_pengajuan`,`pengajuan_judul`.`status_kelayakan_sempro` AS `status_kelayakan_sempro`,`mahasiswa_sidang`.`status_kelayakan` AS `status_kelayakan` from ((`v_script` join `mahasiswa_sidang`) join `pengajuan_judul`) where ((`mahasiswa_sidang`.`nim` = `v_script`.`nim`) and (`mahasiswa_sidang`.`id_pengajuan` = `pengajuan_judul`.`id_pengajuan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pencarian_mahasiswa`
--
DROP TABLE IF EXISTS `v_pencarian_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pencarian_mahasiswa`  AS  select `a`.`nim` AS `nim`,`f`.`tahun_lulus` AS `tahun_lulus`,`b`.`nomor_sk` AS `nomor_sk_pembimbing`,`c`.`nomor_sk` AS `nomor_sk_pembanding`,`a`.`nama` AS `nama`,`j`.`nama_PS` AS `nama_PS`,`f`.`judul` AS `judul`,`b`.`pembimbing1` AS `kode_pembimbing1`,`d`.`Nama_dosen` AS `Dosen_Pembimbing1`,`b`.`pembimbing2` AS `kode_pembimbing2`,`e`.`Nama_dosen` AS `Dosen_Pembimbing2`,`c`.`pembanding1` AS `Kode_Pembanding1`,`g`.`Nama_dosen` AS `Dosen_Pembanding1`,`c`.`pembanding2` AS `Kode_pembanding2`,`h`.`Nama_dosen` AS `Dosen_Pembanding2`,`i`.`nilai_uji_program` AS `nilai_uji_program`,`i`.`nilai_semhas` AS `nilai_semhas`,`i`.`nilai_sidang` AS `nilai_sidang`,`i`.`total` AS `total`,`i`.`grade` AS `grade` from (((((((((`mahasiswa` `a` join `pembimbing` `b`) join `pembanding` `c`) join `dosen` `d`) join `dosen` `e`) join `skripsi_nim` `f`) join `dosen` `g`) join `dosen` `h`) join `nilai` `i`) join `program_studi` `j`) where ((`b`.`nim` = `a`.`nim`) and (`c`.`nim` = `a`.`nim`) and (`f`.`nim` = `a`.`nim`) and (`i`.`nim` = `a`.`nim`) and (`b`.`pembimbing1` = `d`.`Kode_dosen`) and (`b`.`pembimbing2` = `e`.`Kode_dosen`) and (`c`.`pembanding1` = `g`.`Kode_dosen`) and (`c`.`pembanding2` = `h`.`Kode_dosen`) and (`a`.`id_PS` = `j`.`id_PS`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pencatatan`
--
DROP TABLE IF EXISTS `v_pencatatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pencatatan`  AS  select `a`.`nim` AS `nim`,`f`.`tahun_lulus` AS `tahun_lulus`,`f`.`bulan_lulus` AS `bulan_lulus`,`b`.`nomor_sk` AS `nomor_sk_pembimbing`,`c`.`nomor_sk` AS `nomor_sk_pembanding`,`a`.`nama` AS `nama`,`j`.`nama_PS` AS `nama_PS`,`f`.`judul` AS `judul`,`b`.`pembimbing1` AS `kode_pembimbing1`,`d`.`Nama_dosen` AS `Dosen_Pembimbing1`,`b`.`pembimbing2` AS `kode_pembimbing2`,`e`.`Nama_dosen` AS `Dosen_Pembimbing2`,`c`.`pembanding1` AS `Kode_pembanding1`,`g`.`Nama_dosen` AS `Dosen_Pembanding1`,`c`.`pembanding2` AS `Kode_pembanding2`,`h`.`Nama_dosen` AS `Dosen_Pembanding2`,`i`.`nilai_uji_program` AS `nilai_uji_program`,`i`.`nilai_semhas` AS `nilai_semhas`,`i`.`nilai_sidang` AS `nilai_sidang`,`i`.`total` AS `total`,`i`.`grade` AS `grade`,`f`.`jenis_TA` AS `jenis_TA`,`f`.`ilmu1` AS `ilmu1`,`f`.`ilmu2` AS `ilmu2` from (((((((((`mahasiswa` `a` join `pembimbing` `b`) join `pembanding` `c`) join `dosen` `d`) join `dosen` `e`) join `skripsi_nim` `f`) join `dosen` `g`) join `dosen` `h`) join `nilai` `i`) join `program_studi` `j`) where ((`b`.`nim` = `a`.`nim`) and (`c`.`nim` = `a`.`nim`) and (`f`.`nim` = `a`.`nim`) and (`i`.`nim` = `a`.`nim`) and (`b`.`pembimbing1` = `d`.`Kode_dosen`) and (`b`.`pembimbing2` = `e`.`Kode_dosen`) and (`c`.`pembanding1` = `g`.`Kode_dosen`) and (`c`.`pembanding2` = `h`.`Kode_dosen`) and (`a`.`id_PS` = `j`.`id_PS`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_script`
--
DROP TABLE IF EXISTS `v_script`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_script`  AS  select `a`.`id_skripsi` AS `id_skripsi`,`a`.`nim` AS `nim`,`a`.`nama` AS `nama`,`a`.`kode_PS` AS `kode_PS`,`d`.`nama_PS` AS `nama_PS`,`a`.`judul_skripsi` AS `judul_skripsi`,`a`.`kode_Pembimbing1` AS `kode_pembimbing1`,`b`.`Nama_dosen` AS `Dosen_Pembimbing1`,`a`.`kode_Pembimbing2` AS `kode_pembimbing2`,`c`.`Nama_dosen` AS `Dosen_Pembimbing2`,`a`.`Tgl_lulus` AS `Tgl_lulus`,`a`.`status` AS `status` from (((`skripsi` `a` join `dosen` `b`) join `dosen` `c`) join `program_studi` `d`) where ((`a`.`kode_Pembimbing1` = `b`.`Kode_dosen`) and (`a`.`kode_Pembimbing2` = `c`.`Kode_dosen`) and (`a`.`kode_PS` = `d`.`id_PS`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_test`
--
DROP TABLE IF EXISTS `v_test`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_test`  AS  select `a`.`Nama_dosen` AS `Nama_dosen`,`a`.`Kode_dosen` AS `Kode_dosen`,`b`.`kuota` AS `kuota`,`b`.`stambuk` AS `stambuk` from (`kuota_bimbingan` `b` join `dosen` `a`) where (`b`.`kd_dosen` = `a`.`Kode_dosen`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `batas_bimbingan`
--
ALTER TABLE `batas_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_validasi`
--
ALTER TABLE `berkas_validasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang_ilmu`
--
ALTER TABLE `bidang_ilmu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `catatan_perbaikan_sidang`
--
ALTER TABLE `catatan_perbaikan_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Kode_dosen`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `izin_seminar`
--
ALTER TABLE `izin_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_seminar`
--
ALTER TABLE `jadwal_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kirim_aplikasi`
--
ALTER TABLE `kirim_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuota_bimbingan`
--
ALTER TABLE `kuota_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembar_kendali_bimbingan`
--
ALTER TABLE `lembar_kendali_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_pencatatan`
--
ALTER TABLE `log_pencatatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `mahasiswa_sidang`
--
ALTER TABLE `mahasiswa_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indeks untuk tabel `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembanding`
--
ALTER TABLE `pembanding`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `penilaian_semhas`
--
ALTER TABLE `penilaian_semhas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_sempro`
--
ALTER TABLE `penilaian_sempro`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_sidang`
--
ALTER TABLE `penilaian_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_uji_program`
--
ALTER TABLE `penilaian_uji_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_penolakan_pengajuan`
--
ALTER TABLE `riwayat_penolakan_pengajuan`
  ADD PRIMARY KEY (`id_penolakan`);

--
-- Indeks untuk tabel `semhas`
--
ALTER TABLE `semhas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indeks untuk tabel `skripsi_nim`
--
ALTER TABLE `skripsi_nim`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indeks untuk tabel `validasi_penggandaan`
--
ALTER TABLE `validasi_penggandaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `validasi_semhas`
--
ALTER TABLE `validasi_semhas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `validasi_sempro`
--
ALTER TABLE `validasi_sempro`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `validasi_sidang`
--
ALTER TABLE `validasi_sidang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `batas_bimbingan`
--
ALTER TABLE `batas_bimbingan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `berkas_validasi`
--
ALTER TABLE `berkas_validasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `bidang_ilmu`
--
ALTER TABLE `bidang_ilmu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `catatan_perbaikan_sidang`
--
ALTER TABLE `catatan_perbaikan_sidang`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `izin_seminar`
--
ALTER TABLE `izin_seminar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal_seminar`
--
ALTER TABLE `jadwal_seminar`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kirim_aplikasi`
--
ALTER TABLE `kirim_aplikasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kuota_bimbingan`
--
ALTER TABLE `kuota_bimbingan`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT untuk tabel `lembar_kendali_bimbingan`
--
ALTER TABLE `lembar_kendali_bimbingan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `log_pencatatan`
--
ALTER TABLE `log_pencatatan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_sidang`
--
ALTER TABLE `mahasiswa_sidang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_skripsi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT untuk tabel `nilai_detail`
--
ALTER TABLE `nilai_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembanding`
--
ALTER TABLE `pembanding`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penilaian_semhas`
--
ALTER TABLE `penilaian_semhas`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian_sempro`
--
ALTER TABLE `penilaian_sempro`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penilaian_sidang`
--
ALTER TABLE `penilaian_sidang`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian_uji_program`
--
ALTER TABLE `penilaian_uji_program`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penolakan_pengajuan`
--
ALTER TABLE `riwayat_penolakan_pengajuan`
  MODIFY `id_penolakan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `semhas`
--
ALTER TABLE `semhas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `skripsi_nim`
--
ALTER TABLE `skripsi_nim`
  MODIFY `id_skripsi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT untuk tabel `validasi_penggandaan`
--
ALTER TABLE `validasi_penggandaan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `validasi_semhas`
--
ALTER TABLE `validasi_semhas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `validasi_sempro`
--
ALTER TABLE `validasi_sempro`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `validasi_sidang`
--
ALTER TABLE `validasi_sidang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
