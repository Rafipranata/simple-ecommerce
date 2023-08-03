-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2023 pada 00.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoalbinda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Admin1', 'Admin1', 'Rafipranata'),
(2, 'Admin2', 'Admin2', 'Panca abdi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(20) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Pemalang', 20000),
(2, 'Pekalongan', 25000),
(3, 'Tegal', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'test@gmail.com', 'test', 'rafi pranata', '089501245712', 'Banjardawa, Taman, Pemalang'),
(2, 'test1@gmail.com', 'test1', 'Atta', '0835012346', 'desa pelutan , kecamatan pemalang, kabupaten Pemalang ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 8, 'rafipranata', 'BRI', 1775000, '2023-07-12', '20230712150049Screenshot (7).png'),
(4, 9, 'rafipranata', 'BRI', 3975000, '2023-07-12', '20230712150443Screenshot (6).png'),
(5, 10, 'rafipranata', 'BRI', 3970000, '2023-07-14', '20230714082502Screenshot (5).png'),
(6, 11, 'Rafi', 'Mandiri', 3975000, '2023-07-15', '20230715045538IMG_20230605_173537.jpg'),
(7, 19, 'Atta', 'BCA', 2225000, '2023-07-16', '20230716013851Screenshot (4).png'),
(8, 17, 'Atta', 'BRI', 3970000, '2023-07-16', '20230716014313Screenshot (1).png'),
(9, 12, 'rafi pranata', 'BSI', 1770000, '2023-07-16', '20230716020700Screenshot (6).png'),
(10, 13, 'rafi pranata', 'BSI', 2970000, '2023-07-18', '20230718004238myskill (1)_page-0001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(8, 1, 2, '2023-06-22', 1775000, 'diterima'),
(9, 1, 3, '2023-06-22', 3975000, 'diterima'),
(12, 1, 1, '2023-06-22', 1770000, 'dikirim'),
(13, 1, 1, '2023-06-22', 2970000, 'proses'),
(14, 1, 2, '2023-07-03', 1775000, 'pending'),
(15, 1, 3, '2023-07-05', 1775000, 'pending'),
(16, 2, 1, '2023-07-10', 3670000, 'pending'),
(18, 2, 1, '2023-07-13', 3420000, 'pending'),
(20, 2, 2, '2023-07-13', 2225000, 'pending'),
(21, 2, 1, '2023-07-13', 1920000, 'pending'),
(22, 2, 1, '2023-07-13', 1280000, 'pending'),
(23, 2, 1, '2023-07-13', 3030000, 'pending'),
(24, 2, 2, '2023-07-13', 1925000, 'pending'),
(25, 2, 1, '2023-07-13', 370000, 'pending'),
(26, 2, 1, '2023-07-13', 1920000, 'pending'),
(27, 2, 1, '2023-07-13', 1770000, 'pending'),
(28, 2, 1, '2023-07-14', 1220000, 'pending'),
(29, 2, 1, '2023-07-14', 4420000, 'pending'),
(30, 2, 1, '2023-07-14', 3520000, 'pending'),
(31, 1, 2, '2023-07-17', 1925000, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(6, 8, 8, 1),
(7, 8, 8, 1),
(8, 8, 8, 2),
(9, 9, 9, 1),
(10, 0, 8, 2),
(11, 0, 9, 1),
(12, 8, 8, 1),
(13, 9, 8, 1),
(14, 9, 10, 1),
(15, 10, 8, 1),
(16, 10, 10, 1),
(17, 11, 8, 1),
(18, 11, 10, 1),
(19, 12, 8, 1),
(20, 13, 8, 1),
(21, 13, 11, 1),
(22, 14, 8, 1),
(23, 15, 8, 1),
(24, 16, 8, 1),
(25, 16, 9, 1),
(26, 17, 8, 1),
(27, 17, 10, 1),
(28, 18, 11, 1),
(29, 18, 10, 1),
(30, 19, 10, 1),
(31, 20, 10, 1),
(32, 21, 9, 1),
(33, 22, 12, 2),
(34, 23, 8, 1),
(35, 23, 12, 2),
(36, 24, 9, 1),
(37, 25, 13, 1),
(38, 26, 9, 1),
(39, 27, 8, 1),
(40, 28, 11, 1),
(41, 29, 10, 2),
(42, 30, 8, 2),
(43, 31, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(8, 'Adidas Ultra Boost', 1750000, 5000, 'hq2200_2_footwear_photography_side_lateral_view_grey.webp', 'Dapatkan Harga sepatu adidas Murah & Terbaru. Beli sepatu adidas Aman & Bergaransi Shopee. Bisa COD silahkan pesan sekarang', 8),
(9, 'Adidas Yeezy Slide', 1900000, 5000, '15979eb5-3e72-439c-b7eb-5ebb4f93ac1a.jpg', 'Beli Sepatu ADIDAS Online original di Toko Albinda ', 4),
(10, 'Adidas Campus ', 2200000, 5000, 'IE2175_04_standard.avif', 'Beli sepatu Adidas Ori Hanya di Toko Albinda', 3),
(11, 'Adidas ZX 750', 1200000, 5000, '2347ae4a-7a2a-4ae5-a69a-7153f601baad.jpg', 'Sepatu adidas ZX 750 ini tetap setia pada detail style warisan ZX, memadukan warna modern dengan sentuhan futuristik, karena desainnya dibuat dengan teknologi AI', 5),
(12, 'Adidas Duramo 10', 630000, 5000, 'be08c6cf-e55e-43ad-bc87-45c1773e0c5d.jpg', ' pastikan kakimu nyaman dan style kamu tetap on point dengan sepatu adidas ini.', 1),
(13, 'Adidas Dragon Grey', 350000, 5000, '02a56ee7-adae-46d5-a77f-3009025cc2a1.jpg', 'Kualitas Barang Bukan abal - abal\r\nBarang yg anda dapat sesuai dengan gambar\r\nJika Tidak sesuai bisa retur/uang kembali 100%\r\nTermurah dan Terpecaya\r\n', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
