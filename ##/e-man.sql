-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 05:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-man`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `kode_sumberdana` varchar(15) NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_lokasi`
--

CREATE TABLE `tb_detail_lokasi` (
  `kode_lokasi` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_peminjaman`
--

CREATE TABLE `tb_detail_peminjaman` (
  `kode_pinjam` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_perawatan`
--

CREATE TABLE `tb_detail_perawatan` (
  `kode_perawatan` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `biaya_perawatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `kode_lokasi` varchar(15) NOT NULL,
  `kode_pegawai` varchar(15) NOT NULL,
  `nama_lokasi` varchar(25) NOT NULL,
  `titik_koordinat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `kode_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `kode_pinjam` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_jatuh_tempo` datetime NOT NULL,
  `kode_pegawai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghapusan`
--

CREATE TABLE `tb_penghapusan` (
  `kode_penghapusan` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perawatan`
--

CREATE TABLE `tb_perawatan` (
  `kode_perawatan` varchar(15) NOT NULL,
  `tgl_perawatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sumberdana`
--

CREATE TABLE `tb_sumberdana` (
  `kode_sumberdana` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_sumberdana` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(15) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
