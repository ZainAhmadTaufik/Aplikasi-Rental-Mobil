-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2020 pada 08.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobill`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'user', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `owner_bank` varchar(50) NOT NULL,
  `akun_bank` varchar(20) NOT NULL,
  `logo_bank` varchar(50) NOT NULL,
  `date_bank` date NOT NULL,
  `time_bank` time NOT NULL,
  `date_time_bank` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `owner_bank`, `akun_bank`, `logo_bank`, `date_bank`, `time_bank`, `date_time_bank`) VALUES
(1, 'BRI', 'Boyz', '7658001', '', '2020-04-30', '01:00:00', '2020-04-30 01:00:00'),
(2, 'BNI', 'Boyz', '665002', '', '2020-04-30', '01:00:00', '2020-04-30 01:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(10) NOT NULL,
  `id_mobil` int(10) NOT NULL,
  `status_invoice` int(10) NOT NULL,
  `kode_invoice` varchar(10) NOT NULL,
  `nama_invoice` varchar(50) NOT NULL,
  `hp_invoice` varchar(20) NOT NULL,
  `email_invoice` varchar(50) NOT NULL,
  `tujuan_invoice` text NOT NULL,
  `mulai_date` date NOT NULL,
  `mulai_time` time NOT NULL,
  `selesai_date` date NOT NULL,
  `panjang_invoice` int(10) NOT NULL,
  `total_invoice` varchar(50) NOT NULL,
  `denda_invoice` varchar(50) NOT NULL,
  `gambar_invoice` varchar(50) NOT NULL,
  `id_bank` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_ktg` int(10) NOT NULL,
  `nama_ktg` varchar(50) NOT NULL,
  `desc_ktg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_ktg`, `nama_ktg`, `desc_ktg`) VALUES
(1, 'MPV', 'Kendaraan Multi Guna, disingkat M.P.V. adalah klasifikasi mobil \"multi-fungsi\" yang dapat digunakan sebagai pengangkut penumpang sekaligus kendaraan pembawa barang. Kendaraan bertipe ini cenderung memiliki klasifikasi \"mini-bus\" dilihat dari bentuknya'),
(2, 'SUV', 'adalah klasifikasi mobil penumpang namun dibangun di atas kerangka truk ringan. Di Indonesia, mobil yang berjenis ini sering disebut \"Jip\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_page` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_page`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menukategori`
--

CREATE TABLE `menukategori` (
  `id_mktg` int(10) NOT NULL,
  `id_ktg` int(10) NOT NULL,
  `id_mobil` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(10) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `desc_mobil` text NOT NULL,
  `harga_mobil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `desc_mobil`, `harga_mobil`) VALUES
(1, 'Honda Jazz', 'Honda Jazz adalah mobil hatchback 5 pintu produksi pabrikan otomotif Jepang Honda Motor Company. Honda Jazz pertama kali diperkenalkan pada 2001', 120000),
(2, 'Kijang Innova', 'Dibekali dengan mesin 2.0 liter (136 hp) 1TR-FE VVT-i dan 2.7 liter 2TR-FE VVT-i untuk mesin bensin, serta 2.5 liter (102 hp) 2KD-FTV D-4D common rail direct 4-stroke diesel injection turbocharger tanpa intercooler untuk mesin dieselnya', 120000),
(3, 'Suzuki Apv', 'Suzuki APV adalah mobil berjenis Van yang diproduksi oleh Suzuki di Indonesia oleh PT. Indomobil Suzuki International. Menggunakan mesin 1.5L atau 1.6L bertenaga 92 hp', 115000),
(4, 'Toyota Veloz', 'Ditenagai dua pilihan mesin Bensin berkapasitas 1496 cc. Avanza Veloz tersedia dengan transmisi Manual and Otomatis tergantung variannya. Avanza Veloz adalah MPV 7 seater dengan panjang 4200 mm, lebar 1660 mm, wheelbase 2655 mm. serta ground clearance 200 mm', 125000),
(5, 'Toyota Calya ', 'Disediakan ruang kabin luas yang sanggup menampung penumpang hingga 7 orang sekaligus sehingga membuat ruang gerak penumpang anda menjadi lebih leluasa dan bebas. Selain itu, kelebihan Toyota Calya yang utama yakni pada keiritan dan efisiensi konsumsi bahan bakarnya', 130000),
(6, 'Toyota Sienta', 'Toyota Sienta adalah minivan kecil 5 pintu yang diproduksi oleh Toyota untuk pasar Jepang dan Indonesia. Diperkenalkan pertama kali pada bulan September 2003, mobil ini mempunyai 7 tempat duduk meskipun ukuran bodinya sangat kecil.', 110000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id_page` int(10) NOT NULL,
  `nama_page` varchar(50) NOT NULL,
  `desc_page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id_page`, `nama_page`, `desc_page`) VALUES
(1, 'Kontak Kami', 'kontak kami di kjashdkjashdjksabd'),
(2, 'Tentang Kami', 'tugas dari matakuliah prpl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(10) NOT NULL,
  `total_seat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seat`
--

INSERT INTO `seat` (`id_seat`, `total_seat`) VALUES
(1, '4'),
(2, '5'),
(3, '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(10) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `slogan` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_setting`, `slogan`, `telp`, `email`, `alamat`) VALUES
(1, 'Boyz', 'Tugas Matakuliah PRPL', '081275951165', 'boyz001@gmail.com', 'jl. imogiri barat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_ktg`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menukategori`
--
ALTER TABLE `menukategori`
  ADD PRIMARY KEY (`id_mktg`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indeks untuk tabel `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
