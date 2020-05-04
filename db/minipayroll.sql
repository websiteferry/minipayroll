-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Apr 2020 pada 08.09
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_absensi`
--

CREATE TABLE IF NOT EXISTS `detail_absensi` (
`Id` int(11) NOT NULL,
  `KdKaryawan` varchar(12) DEFAULT NULL,
  `Hadir` varchar(10) DEFAULT NULL,
  `Sakit` varchar(10) DEFAULT NULL,
  `Alpa` varchar(10) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `TglAbsen` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_absensi`
--

INSERT INTO `detail_absensi` (`Id`, `KdKaryawan`, `Hadir`, `Sakit`, `Alpa`, `Keterangan`, `TglAbsen`) VALUES
(33, 'K0002', NULL, NULL, '1', NULL, '2020-04-01'),
(32, 'K0001', '1', NULL, NULL, NULL, '2020-04-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `KdGolongan` varchar(12) NOT NULL DEFAULT '',
  `NmGolongan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`KdGolongan`, `NmGolongan`) VALUES
('P0001', 'SENIOR'),
('P0002', 'JUNIOR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `KdJabatan` varchar(12) NOT NULL DEFAULT '',
  `NmJabatan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`KdJabatan`, `NmJabatan`) VALUES
('J0002', 'ASISTEN TUKANG'),
('J0001', 'KEPALA TUKANG'),
('J0003', 'FINISHING 1'),
('J0004', 'FINISHING 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `KdKaryawan` varchar(12) NOT NULL DEFAULT '',
  `KdGolongan` varchar(12) DEFAULT NULL,
  `KdJabatan` varchar(12) DEFAULT NULL,
  `KdPendidikan` varchar(12) DEFAULT NULL,
  `KdTunjangan` varchar(12) DEFAULT NULL,
  `NmKaryawan` varchar(255) DEFAULT NULL,
  `NoHp` varchar(255) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `JenisKelamin` varchar(15) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `GajiPokok` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`KdKaryawan`, `KdGolongan`, `KdJabatan`, `KdPendidikan`, `KdTunjangan`, `NmKaryawan`, `NoHp`, `TglLahir`, `Alamat`, `JenisKelamin`, `Status`, `Agama`, `GajiPokok`) VALUES
('K0002', 'P0001', 'J0001', 'P0001', 'T0002', 'KAMO', '085817579282', '1987-01-02', 'JL. CIKUNIR RAYA BEKASI SELATAN', 'L', 'MENIKAH', 'ISLAM', '4650000.00'),
('K0001', 'P0001', 'J0002', 'P0001', 'T0001', 'KUSMIANTO', '08567449461', '1987-03-14', 'JL. SIMPANG SUMUR NILA BEKASI SELATAN', 'L', 'MENIKAH', 'ISLAM', '4500000.00'),
('K0003', 'P0001', 'J0003', 'P0002', 'T0003', 'HADI', '085236058387', '1985-06-04', 'JL. SIMPANG SUMUR NILA BEKASI SELATAN', 'L', 'MENIKAH', 'ISLAM', '4050000.00'),
('K0004', 'P0002', 'J0004', 'P0002', 'T0004', 'FERRY', '085236058899', '1998-07-05', 'JL. SIMPANG SUMUR NILA BEKASI SELATAN', 'L', 'SINGLE', 'ISLAM', '3000000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `KdPendidikan` varchar(12) NOT NULL DEFAULT '',
  `NmPendidikan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`KdPendidikan`, `NmPendidikan`) VALUES
('P0001', 'SMA'),
('P0002', 'SMK'),
('P0003', 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE IF NOT EXISTS `potongan` (
  `KdPotongan` varchar(12) NOT NULL DEFAULT '',
  `JenisPotongan` varchar(255) NOT NULL,
  `TotalPotongan` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`KdPotongan`, `JenisPotongan`, `TotalPotongan`) VALUES
('T0002', 'SAKIT', '100000.00'),
('T0003', 'LIBUR', '100000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan`
--

CREATE TABLE IF NOT EXISTS `tunjangan` (
  `KdTunjangan` varchar(12) NOT NULL DEFAULT '',
  `KdJabatan` varchar(12) DEFAULT NULL,
  `KdPendidikan` varchar(12) DEFAULT NULL,
  `KdGolongan` varchar(12) DEFAULT NULL,
  `TotalTunjangan` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunjangan`
--

INSERT INTO `tunjangan` (`KdTunjangan`, `KdJabatan`, `KdPendidikan`, `KdGolongan`, `TotalTunjangan`) VALUES
('T0001', 'J0002', 'P0001', 'P0001', '1000000.00'),
('T0002', 'J0001', 'P0001', 'P0001', '1500000.00'),
('T0003', 'J0003', 'P0002', 'P0001', '500000.00'),
('T0004', 'J0004', 'P0002', 'P0002', '500000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Cipta Karya Mandiri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
 ADD PRIMARY KEY (`KdGolongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`KdJabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`KdKaryawan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
 ADD PRIMARY KEY (`KdPendidikan`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
 ADD PRIMARY KEY (`KdPotongan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
