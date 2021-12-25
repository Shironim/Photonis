-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2017 pada 10.47
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(8) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('A','B') NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `email`, `status`, `akses`) VALUES
(1, 'admin', 'admin', 'robbybirhamn@gmail.com', 'A', 'admin'),
(2, 'dimas', 'dimas', 'dimas@gmail', 'A', 'kasir'),
(4, 'Dimas Seto', 'dimas', 'dimas2112seto@gmail.com', 'A', 'kasir'),
(5, 'seto', '123', 'seto@gmail.com', 'A', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` int(8) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `gambar`, `caption`, `nama`, `tgl`) VALUES
(1, 'artikel3.jpg', 'yey Kawin', 'Pernikahan', '2017-10-08 16:48:56'),
(2, 'fisheye2.jpg', 'Mata Ikan', 'Fish Eye', '2017-10-08 19:23:47'),
(3, 'beautiful-photography-random-tumblr-Favim.com-624689.jpg', 'Like!', 'Penyebrangan', '2017-10-08 19:24:31'),
(4, '82b9403fafc04da48c06f5bc39d9fd19.jpg', 'Love me', 'Love me', '2017-10-08 19:24:50'),
(5, 'tumblr_le35vy2dmi1qe7gvjo1_500_large.jpg', 'shot!', 'Photography', '2017-10-08 19:25:25'),
(6, '9f9eb83ad76e82f9588de5c32cc41256--picture-ideas-photo-ideas.jpg', 'hehe..', 'Tangkap Bulan', '2017-10-08 19:25:45'),
(7, '12-tumblr-blogs-for-photographers.jpg', 'Enjoy', 'Thumblr', '2017-10-08 19:26:12'),
(8, 'tumblr_nxx9ngKDNk1tfbw48o1_500.jpg', 'As|ce', 'Fire', '2017-10-08 19:26:47'),
(9, 'images.jpg', 'IMG', 'Images', '2017-10-08 19:27:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(8) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `tgl` date NOT NULL,
  `penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `create_at`, `update_at`, `tgl`, `penulis`) VALUES
(1, 'Wedding photography  ', 'For the photographer it is important to catch the eye, hand movement, and even a breath of wind, so that the picture will not be just a companion portrait, but the real Love story.  ', 'artikel3.jpg', '2017-10-08 16:18:32', '2017-10-09 14:22:38', '2017-10-08', 'Anonym'),
(2, 'Photoproject Summer delight  ', 'Feel the warmth of summer in full measure thanks to the summer photoproject. Choose any location that you like and feel the freedom and the rush of inspiration.  ', 'summer.jpg', '2017-10-08 16:19:55', '2017-10-09 14:22:32', '2017-10-08', 'Anonym'),
(3, 'Photoproject Spring angel  ', 'I will try my best to uncover and show your natural beauty and lightness. Professional  open air photoshoot is guaranteed to give youpleasure. Feel harmony with nature.  ', 'spring.jpg', '2017-10-08 16:20:41', '2017-10-09 14:22:25', '2017-10-08', 'Anonym');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(8) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `alamat`, `email`, `no_telp`) VALUES
(1, '8A St. Taman Kendalisodo        ', 'dimas2112seto@gmail.com        ', '+62 896 2107 4572  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(8) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_menu` int(8) NOT NULL,
  `link` varchar(255) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `judul`, `id_menu`, `link`, `gambar`, `isi`, `create_at`, `update_at`) VALUES
(1, 'hhjk ', 0, 'service', 'tanda tangan.jpg', '<section id=\"history\">\r\n<div class=\"relative media\"><img class=\"relative\" src=\"http:/localhost/project-dua/admin/image/Land.jpg\" /></div>\r\n<div class=\"absolute media\">\r\n<h3 class=\"pl100 po\">Are you planning a special event? We will make it a part of the history.</h3>\r\n</div>\r\n</section>\r\n<section id=\"moment\"><!--?php include \"modul/gallery.php\";?--></section>\r\n<section id=\"questv2\"><!--?php include \"modul/questionv2.php\";?--></section>', '2017-09-12 13:19:25', '2017-10-11 15:40:55'),
(2, 'dfsfd', 12, 'gallery', 'tanda tangan.jpg', 'gfhgfhf', '2017-09-12 13:20:27', '2017-09-12 13:20:32'),
(3, 'wqweqw', 13, '', 'logo.jpg', 'asdas', '2017-09-12 13:23:27', '0000-00-00 00:00:00'),
(4, 'dfsfd', 14, '', 'Tulips.jpg', 'rwer', '2017-09-29 14:27:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_gambar` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `total_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_gambar`, `jumlah`, `harga`, `total_harga`) VALUES
(1, 9, 18, 40000, 648000),
(2, 13, 10, 70000, 630000),
(3, 8, 5, 50000, 225000),
(4, 11, 9, 40000, 324000),
(5, 8, 19, 50000, 855000),
(6, 12, 4, 90000, 324000),
(7, 11, 1, 40000, 36000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_fotographer` int(10) NOT NULL,
  `nama_fotographer` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_fotographer`, `nama_fotographer`, `alamat`, `telepon`) VALUES
(1, 'Dimas', 'Jalan Taman Kendalisodo', '089621074572'),
(2, 'Arap', 'Jalan Menoreh Utara no 5', '08927386167'),
(3, 'Nanda', 'Jalan Tambakmas no 4', '087556622771'),
(4, 'Robby', 'jalan serang selatan', '08978932');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gambar` int(8) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_fotographer` varchar(255) NOT NULL,
  `no_gambar` varchar(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `tag` varchar(255) NOT NULL,
  `stok` int(5) NOT NULL,
  `ppn` int(3) NOT NULL,
  `harga_pokok` int(12) NOT NULL,
  `diskon` int(12) NOT NULL,
  `dijual` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gambar`, `id_kategori`, `gambar`, `nama`, `nama_fotographer`, `no_gambar`, `create_at`, `update_at`, `tag`, `stok`, `ppn`, `harga_pokok`, `diskon`, `dijual`) VALUES
(8, 0, 'Portrait6-1.jpg', 'Studio Shooting', 'Dimas Seto', '0', '2017-10-08 16:21:46', '2017-10-08 16:27:12', '', 1, 10, 50000, 10, 39),
(9, 0, 'artikel2.jpg', 'Travel photography', 'Dimas Seto', '0', '2017-10-08 16:27:29', '0000-00-00 00:00:00', '', 0, 10, 40000, 10, 30),
(10, 0, '10-indian-wedding.jpg', 'Wedding photography', 'Dimas Seto', '0', '2017-10-08 16:27:45', '0000-00-00 00:00:00', '', 32, 10, 70000, 10, 8),
(11, 0, 'portrait.jpg', 'Portrait photoshoot', 'Dimas Seto', '0', '2017-10-08 16:28:07', '0000-00-00 00:00:00', '', 0, 10, 40000, 10, 10),
(12, 0, 'images.jpg', 'Advertising Photo', 'Dimas Seto', '0', '2017-10-08 16:28:58', '2017-10-17 11:28:00', '', 49, 10, 90000, 10, 16),
(13, 0, 'portofolio.jpg', 'Portfolio', 'Dimas Seto', '0', '2017-10-08 16:29:56', '0000-00-00 00:00:00', '', 0, 10, 70000, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(10) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `id_kota`, `id_provinsi`, `nama`, `password`, `email`, `telepon`, `alamat`, `tgl`, `blokir`) VALUES
(1, 5307, 64, 'Dimas', '21232f297a57a5a743894a0e4a801fc3', 'robbybirhamn@gmail.com', '0896754382', 'jl tanah lot', '2017-10-10 15:09:48', 'N'),
(2, 1307, 62, 'Dimas Seto', '7d49e40f4b3d8f68c19406a58303f826', 'dimas2112seto@gmail.com', '098996678', 'jalan imam bonjol', '2017-10-10 19:18:41', 'N'),
(3, 1112, 36, 'Dimas Seto', '7d49e40f4b3d8f68c19406a58303f826', 'email@email', '6546546546', 'jalan palangkaraya', '2017-10-10 20:19:19', 'N'),
(4, 3374, 33, 'Dimas Seto', '7d49e40f4b3d8f68c19406a58303f826', 'dimas45@yahoo.com', '089621074572', 'jalan taman kendalisodo', '2017-10-23 15:34:03', 'N'),
(5, 1104, 33, 'sasa', '7d49e40f4b3d8f68c19406a58303f826', 'sosp@email', '087556622771', 'Jalan tampo mas barat', '2017-10-23 15:41:20', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata`
--

CREATE TABLE `metadata` (
  `id` int(8) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `deskribsi` text NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metadata`
--

INSERT INTO `metadata` (`id`, `judul`, `slogan`, `deskribsi`, `keyword`, `footer`) VALUES
(2, 'Photonis', 'Photograph', 'Web tentang fotographi', 'photo', 'Photonis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigasi`
--

CREATE TABLE `navigasi` (
  `id` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `up_menu` int(12) NOT NULL,
  `type` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigasi`
--

INSERT INTO `navigasi` (`id`, `nama`, `link`, `up_menu`, `type`, `create_at`, `update_at`) VALUES
(8, 'Home', 'home', 0, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'About Us', 'about-us', 0, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Service', 'service', 9, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Gallery', 'gallery', 9, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Blog', 'blog', 0, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Contact Us', 'contact-us', 0, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Keranjang', 'keranjang', 0, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Profil', 'profil', 17, 'halaman', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(10) NOT NULL,
  `id_fotographer` int(10) NOT NULL,
  `id_gambar` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_fotographer`, `id_gambar`, `jumlah`, `tanggal`) VALUES
(1, 3, 9, 19, '2017-10-18'),
(2, 1, 9, 10, '2017-10-18'),
(3, 2, 9, 10, '2017-10-18'),
(4, 2, 9, 11, '2017-10-18'),
(5, 3, 12, 45, '2017-10-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(10) NOT NULL,
  `id_gambar` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_gambar`, `jumlah`) VALUES
(1, 12, 38),
(2, 9, 191),
(3, 13, 55),
(4, 10, 31),
(5, 11, 9),
(6, 8, 34),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(20) NOT NULL,
  `id_member` int(20) NOT NULL,
  `id_kasir` int(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('MP','B','PR','TD','TY','S') NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(20) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_member`, `id_kasir`, `alamat`, `status`, `tanggal`, `total`, `jam`) VALUES
(1, 2, 2, 'admin', 'TY', '2017-10-23', 738000, '15:25:02'),
(2, 2, 2, 'admin', 'TY', '2017-10-23', 680000, '15:25:30'),
(3, 4, 2, 'jalan taman kendalisodo', 'TY', '2017-10-23', 250000, '15:36:09'),
(4, 5, 2, 'Jalan tampo mas barat', 'TY', '2017-10-23', 369000, '15:41:59'),
(5, 5, 2, 'Jalan tampo mas barat', 'TY', '2017-10-23', 950000, '15:42:23'),
(6, 2, 5, 'jalan imam bonjol', 'TY', '2017-10-23', 344000, '15:44:49'),
(7, 2, 5, 'jalan imam bonjol', 'TY', '2017-10-23', 41000, '15:45:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `isi`, `tgl`) VALUES
(1, 'Event', 'dimas2112seto@gmail.com ', 'sdsadsa ', '2017-10-08 20:15:28'),
(2, 'Studio Shooting', 'robbybirhamn@gmail.com', 'For the photographer it is important to catch the eye, hand movement, and even a breath of wind, so that the picture will not be just a companion portrait, but the real Love story.', '2017-10-08 20:30:25'),
(3, 'Wedding photography', 'dimas2112seto@gmail.com', 'For the photographer it is important to catch the eye, hand movement, and even a breath of wind, so that the picture will not be just a companion portrait, but the real Love story.', '2017-10-08 20:37:37'),
(4, 'Event Baru', 'robbybirhamn@gmail.com', 'fsdfsdsfds', '2017-10-08 20:41:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `tgl`) VALUES
(4, 'robbybirhamn@gmail.com', '2017-10-08 20:10:11'),
(5, 'dimas2112seto@gmail.com', '2017-10-08 20:17:36'),
(6, 'email@email', '2017-10-08 20:33:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `isi`, `gambar`, `tgl`) VALUES
(1, ' Tom Jameson  ', ' You are an excellent photographer with an artistic eye. Your warm personality made the whole photo shoot experience relaxed and fun. ', 'testimony-1.jpg', '2017-10-08 16:13:57'),
(2, ' Diana McKinsey ', ' I was thoroughly impressed with the way you was able to work with our squirmy cat and get great results. Thank you very much! ', 'testimony-2.jpg', '2017-10-08 16:15:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_fotographer`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigasi`
--
ALTER TABLE `navigasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_fotographer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gambar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `navigasi`
--
ALTER TABLE `navigasi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
