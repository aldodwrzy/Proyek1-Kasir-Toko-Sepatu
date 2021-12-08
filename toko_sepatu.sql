-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2021 pada 23.00
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL,
  `ukuran` varchar(10) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `ket` text DEFAULT NULL,
  `stok_kel` text DEFAULT NULL,
  `untung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`, `ukuran`, `id_supplier`, `ket`, `stok_kel`, `untung`) VALUES
(4, 'SPT001', 2, 'Futsal', 'Adidas', '150000', '157500', 'Pasang', '12', '9 January 2021, 11:29', NULL, '38', 1, NULL, NULL, '5'),
(5, 'SPT002', 2, 'Boots', 'AP Boots', '100000', '115000', 'Pasang', '17', '11 January 2021, 12:50', '22 January 2021, 14:07', '40', 2, NULL, NULL, '15'),
(9, 'SPT003', 1, 'Flat Shoes', 'Bata', '100000', '110000', 'Pasang', '6', '25 January 2021, 3:39', '15 February 2021, 6:42', '35', 2, 'Rusak', '10', '10'),
(15, 'SPT004', 2, 'Karakon', 'Eiger', '200000', '220000', 'Pasang', '', '27 February 2021, 4:44', NULL, '', 2, NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'Perempuan', '1 Januari 2021, 10:23'),
(2, 'Laki laki', '1 Januari 2021, 10:28'),
(3, 'Anak Anak', '1 Januari 2021, 0:19'),
(4, 'Casual', '1 Januari 2021, 0:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`, `level`) VALUES
(1, 'mraihanna18', '202cb962ac59075b964b07152d234b70', 1, 'admin sistem'),
(2, 'aldodwrz', '202cb962ac59075b964b07152d234b70', 2, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Muhammad Raihan Nur Azmii', 'Jl. Antah Barantah', '0891221332', 'mraihanna.18@gmail.com', 'Photo_Muhammad Raihan Nur Azmii.jpg', '3205052708010004'),
(2, 'Aldo Dwie Rizky', 'Kp. Inggris', '085128312', 'aldodwrz@gmail.com', 'aldo.jpg', '3206060303010003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `id_ukuran`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(134, 'SPT001', 1, 100, '1', '157500', '27 February 2021, 2:46', '02-2021'),
(135, 'SPT001', 1, 101, '1', '157500', '27 February 2021, 2:47', '02-2021'),
(138, 'SPT001', 1, 100, '1', '157500', '27 February 2021, 2:55', '02-2021'),
(139, 'SPT001', 1, 100, '1', '157500', '27 February 2021, 2:58', '02-2021'),
(140, 'SPT001', 1, 100, '1', '157500', '27 February 2021, 2:58', '02-2021'),
(141, 'SPT001', 1, 101, '1', '157500', '27 February 2021, 2:58', '02-2021'),
(142, 'SPT001', 1, 100, '1', '157500', '27 February 2021, 3:02', '02-2021'),
(143, 'SPT001', 1, 101, '2', '315000', '27 February 2021, 3:02', '02-2021'),
(144, 'SPT002', 1, 104, '1', '115000', '27 February 2021, 3:09', '02-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_pembelian`
--

CREATE TABLE `nota_pembelian` (
  `id_nota_pembelian` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nota_pembelian`
--

INSERT INTO `nota_pembelian` (`id_nota_pembelian`, `id_barang`, `id_member`, `id_ukuran`, `id_supplier`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(130, 'SPT001', 1, 100, 1, '1', '150000', '27 February 2021, 4:38', '02-2021'),
(131, 'SPT001', 1, 100, 1, '2', '300000', '27 February 2021, 4:38', '02-2021'),
(132, 'SPT002', 1, 103, 2, '1', '100000', '27 February 2021, 4:41', '02-2021'),
(133, 'SPT001', 1, 100, 1, '1', '150000', '27 February 2021, 4:41', '02-2021'),
(134, 'SPT002', 1, 103, 2, '1', '100000', '27 February 2021, 4:43', '02-2021'),
(135, 'SPT002', 1, 104, 2, '1', '100000', '27 February 2021, 4:48', '02-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `Kode_Sepatu` int(11) NOT NULL,
  `Merk_Sepatu` varchar(30) NOT NULL,
  `Jenis_Sepatu` varchar(50) NOT NULL,
  `Ukuran_Sepatu` varchar(30) NOT NULL,
  `Harga_Sepatu` varchar(30) NOT NULL,
  `Stok_Sepatu` varchar(30) NOT NULL,
  `Kode_Supplier` int(11) NOT NULL,
  `Jumlah_Pesanan` varchar(30) NOT NULL,
  `Tanggal_Pesanan` date NOT NULL,
  `Opsi_Pengiriman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`Kode_Sepatu`, `Merk_Sepatu`, `Jenis_Sepatu`, `Ukuran_Sepatu`, `Harga_Sepatu`, `Stok_Sepatu`, `Kode_Supplier`, `Jumlah_Pesanan`, `Tanggal_Pesanan`, `Opsi_Pengiriman`) VALUES
(111, 'Nike', 'Sports', '44', '500000', '10', 211, '20', '2020-08-23', 'Pos Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `nama_pemilik` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nama_pemilik`, `alamat`, `no_hp`, `tgl_input`, `tgl_update`, `email`) VALUES
(1, 'PT Neki', 'Abraham', 'Jalan Angin Ribut No 101', '08912342512', '20 January 2021, 11:23', '23 January 2021, 7:27', 'abraham@neki.com'),
(2, 'PT Adidaya', 'Lincoln', 'Perum Angin Ribut Blok A-1', '0851256234', '23 January 2021, 7:03', NULL, 'lincoln@adidaya.com'),
(17, 'PT Selalu Ada', 'Aldo Dwie Santoso', 'Kampung Jerman', '082134253212', '26 February 2021, 0:28', '26 February 2021, 0:32', 'aldo123@selaluada.com'),
(18, 'PT Pamit', 'Tulus', 'Jalan Angin Ribut No 102', '0891222584868', '26 February 2021, 1:27', NULL, 'tulus12@pamit.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Toko Aang Jaya', 'Jl. Siamang Tunggal, rt/rw 02/09, Kecamatan Antah Berantah, Kabupaten Tersesat', '0892314212', 'Muhammad Raihan Nur Azmii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `stok2` text NOT NULL,
  `ukuran2` varchar(10) NOT NULL,
  `stok_kel2` text DEFAULT NULL,
  `ket2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_barang`, `stok2`, `ukuran2`, `stok_kel2`, `ket2`) VALUES
(100, 'SPT001', '16', '35', NULL, NULL),
(101, 'SPT001', '12', '36', NULL, NULL),
(102, 'SPT001', '23', '37', NULL, NULL),
(103, 'SPT002', '22', '40', NULL, NULL),
(104, 'SPT002', '20', '39', '1', 'Hilang'),
(105, 'SPT001', '15', '41', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  ADD PRIMARY KEY (`id_nota_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  MODIFY `id_nota_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
