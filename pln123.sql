-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2021 pada 17.16
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auto_numbers`
--

INSERT INTO `auto_numbers` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, '7fd9da895e681235e5f52f30c02f6295', 12, '2021-02-03 02:24:11', '2021-04-03 20:54:48'),
(2, 'b52b51d9ef33caf747e8aab3adda58ca', 6, '2021-02-03 03:18:21', '2021-02-03 08:28:43'),
(3, '5a7b1515eb214c0281d09065b957e4ba', 43, '2021-02-03 08:38:02', '2021-03-31 02:27:09'),
(4, 'b61bd3657cb9f80c7b64d7bd09d87d3a', 3, '2021-02-03 23:01:30', '2021-03-06 03:28:39'),
(5, '27cddc0c12a747ab0bbfbec8c21b1e04', 53, '2021-02-16 03:46:36', '2021-04-06 01:12:57'),
(6, '2c66de9b0fc40a43ef0694e18221d3ee', 55, '2021-02-16 03:50:36', '2021-04-06 01:13:28'),
(7, '9d22c89bcd050a0f311b4740dd1865bc', 110, '2021-03-29 23:35:39', '2021-04-09 09:22:34'),
(8, '0875c5d9829d7dd957c069e241126132', 67, '2021-03-29 23:53:55', '2021-04-05 23:00:41'),
(9, '001093b908c40ca9b57563afe68d92b3', 1, '2021-04-11 02:52:44', '2021-04-11 02:52:44'),
(10, '17d8db127230116a440fb6010dad9872', 8, '2021-04-11 02:53:30', '2021-04-11 23:38:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_aset_lains`
--

CREATE TABLE `detail_aset_lains` (
  `no_seri` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_master_ti` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baik','Buruk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_aset_lains`
--

INSERT INTO `detail_aset_lains` (`no_seri`, `tgl_pengecekan`, `nip_pegawai`, `id_master_ti`, `tipe`, `kondisi`, `failed_at`) VALUES
('PR-001', '2021-03-03', '10101001', 'M-040', 'Printer HP 1060 Deskjet', 'Buruk', '2021-03-03 09:56:47'),
('PR-002', '2021-03-31', '6793156R', 'M-042', '11111111111', 'Baik', '2021-03-31 09:30:47'),
('SC-001', '2021-02-15', '10101001', 'M-039', 'CANON 300080', 'Baik', '2021-02-15 10:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengaduan_jaringans`
--

CREATE TABLE `detail_pengaduan_jaringans` (
  `id_pengaduan_jaringan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_master_jaringan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengaduan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pengaduan_jaringans`
--

INSERT INTO `detail_pengaduan_jaringans` (`id_pengaduan_jaringan`, `id_master_jaringan`, `status_pengaduan`, `keterangan`, `failed_at`, `foto`, `tanggapan`) VALUES
('PJ-07', 'MJ-45', 'Ditanggapi', 'aaaaaaaaaa', '2021-04-11 10:01:56', '1.jpg', 'aaaaaaaaaaaaa'),
('PJ-08', 'MJ-46', 'Ditanggapi', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2021-04-12 06:38:36', '1.png', 'sudah mendapatkan notifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengaduan_tis`
--

CREATE TABLE `detail_pengaduan_tis` (
  `id_pengaduan_ti` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_master_ti` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengaduan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pengaduan_tis`
--

INSERT INTO `detail_pengaduan_tis` (`id_pengaduan_ti`, `id_master_ti`, `status_pengaduan`, `keterangan`, `failed_at`, `foto`, `tanggapan`) VALUES
('P-093', 'M-037', 'Ditanggapi', '1', '2021-04-06 06:34:56', 'Screenshot_1.jpg', 'yeeaahhhhhhhhhhh'),
('P-094', 'M-038', 'Selesai', 'e', '2021-04-06 06:38:57', 'Screenshot_30.jpg', 'done'),
('P-095', 'M-039', 'Diajukan', 'aaaaaaaaaaaaaaaaaaaaa', '2021-04-06 06:42:28', 'ye.png', ''),
('P-096', 'M-040', 'Diajukan', 'laptop perlu diinstall ulang karena laptop tidak berjalan sebagaimana mestinya', '2021-04-06 07:14:07', '20210406_135920.jpg', ''),
('P-097', 'M-038', 'Diajukan', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-04-06 07:15:43', '1.jpg', ''),
('P-109', 'M-039', 'Diajukan', 'aaaaaaaaaa', '2021-04-09 16:22:02', '2.jpg', NULL),
('P-110', 'M-039', 'Diajukan', 'aaaaaaaaaa', '2021-04-09 16:22:34', '2.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengecekan_jaringans`
--

CREATE TABLE `detail_pengecekan_jaringans` (
  `no_seri` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `id_master_jaringan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_petugas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baik','Buruk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pengecekan_jaringans`
--

INSERT INTO `detail_pengecekan_jaringans` (`no_seri`, `tgl_pengecekan`, `id_master_jaringan`, `nip_petugas`, `tipe`, `kondisi`, `failed_at`) VALUES
('AP-01', '2021-03-02', 'MJ-45', '1611521020', 'TP-LINK 1800', 'Baik', '2021-03-02 08:05:14'),
('RO-01', '2021-03-02', 'MJ-46', '1611521020', 'huawei 3000', 'Baik', '2021-03-02 08:06:25'),
('RO-02', '2021-04-05', 'MJ-54', '1611521020', '777999999', 'Baik', '2021-04-05 03:10:50'),
('SW-01', '2021-03-24', 'MJ-52', '1611521020', 'tree', 'Baik', '2021-03-24 06:32:14'),
('SW-02', '2021-04-05', 'MJ-50', '1611521020', 'switch 9891', 'Baik', '2021-04-05 03:09:48'),
('SW-03', '2021-04-05', 'MJ-53', '1611521020', 'yyyy', 'Baik', '2021-04-05 03:10:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengecekan_tis`
--

CREATE TABLE `detail_pengecekan_tis` (
  `no_seri` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_master_ti` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_aset` year(4) NOT NULL,
  `os_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lisensi` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu_merek` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monitor_merek` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baik','Buruk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Sewa','Milik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_memori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processor_merek` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_processor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vga_tipe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vga_kapasitas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hdd_kapasitas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pengecekan_tis`
--

INSERT INTO `detail_pengecekan_tis` (`no_seri`, `tgl_pengecekan`, `nip_pegawai`, `id_master_ti`, `tahun_aset`, `os_id`, `lisensi`, `cpu_merek`, `monitor_merek`, `kondisi`, `status`, `serial_number`, `ip_address`, `mac_address`, `kapasitas_memori`, `processor_merek`, `kapasitas_processor`, `vga_tipe`, `vga_kapasitas`, `hdd_kapasitas`, `failed_at`) VALUES
('KP-001', '2021-02-28', '10101001', 'M-038', 2019, '2', 'Tidak', 'ASUS', 'ASUS', 'Baik', 'Milik', '98216gfi', '190.00.199.000', 'ab:31:50:ab:00:10', '800 MB', 'intel hd 306', '2 GB', 'Intel HD Graphics', '986 MB', '500 MB', '2021-02-28 03:53:00'),
('LP-001', '2021-02-28', '10101001', 'M-037', 2020, '2', 'Tidak', 'ACER', 'ACER', 'Baik', 'Sewa', '98ze890', '190.00.199.000', 'ab:31:50:ab:00:10', '800 MB', 'intel hd 306', '2 GB', 'Intel HD Graphics 500', '986 MB', '600', '2021-02-28 03:51:50'),
('LP-002', '2021-03-31', '6793156R', 'M-041', 2005, '2', 'Tidak', '111', 'dd', 'Baik', 'Milik', 'fff', 'gggg', 'gggg', 'ggg', 'ggggg', 'gggg', 'ggggg', 'gggg', 'ggg', '2021-03-31 09:29:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `nama_jabatan`, `failed_at`) VALUES
('1', 'Supervisor', '2021-02-03 16:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_asets`
--

CREATE TABLE `jenis_asets` (
  `id_jenis_aset` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_aset` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_asets`
--

INSERT INTO `jenis_asets` (`id_jenis_aset`, `nama_jenis_aset`, `failed_at`) VALUES
('AS-01', 'Komputer', '2021-02-03 09:24:11'),
('AS-02', 'Laptop', '2021-02-03 09:24:19'),
('AS-03', 'Scanner', '2021-02-03 09:24:34'),
('AS-04', 'Printer', '2021-02-04 08:28:57'),
('AS-05', 'Access Point', '2021-02-09 07:46:35'),
('AS-06', 'Router', '2021-02-09 09:39:24'),
('AS-07', 'Switch/Hub', '2021-03-06 09:47:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_units`
--

CREATE TABLE `jenis_units` (
  `id_jenis_unit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_unit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_units`
--

INSERT INTO `jenis_units` (`id_jenis_unit`, `nama_jenis_unit`, `failed_at`) VALUES
('1', 'Unit Induk', '2021-02-03 08:02:10'),
('2', 'Unit Layanan Pelanggan', '2021-02-03 08:02:10'),
('3', 'Kantor Pelayanan', '2021-02-03 08:02:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_aset_jaringans`
--

CREATE TABLE `master_aset_jaringans` (
  `id_master_jaringan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_aset_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_master_jaringan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_aset_jaringans`
--

INSERT INTO `master_aset_jaringans` (`id_master_jaringan`, `ruangan_id`, `jenis_aset_id`, `nama_master_jaringan`, `failed_at`) VALUES
('MJ-45', 'R-048', 'AS-05', 'Access Point TP LINK', '2021-03-02 07:47:48'),
('MJ-46', 'R-049', 'AS-06', 'Router HUAWEI', '2021-03-02 07:48:01'),
('MJ-50', 'R-047', 'AS-07', 'ATM Switch', '2021-03-07 10:25:09'),
('MJ-52', 'R-048', 'AS-07', 'hub 123', '2021-03-24 06:31:53'),
('MJ-53', 'R-051', 'AS-07', 'HUB 8999772', '2021-04-03 16:28:11'),
('MJ-54', 'R-048', 'AS-06', 'ro 98877', '2021-04-05 03:10:35'),
('MJ-55', 'R-053', 'AS-05', 'ACCESS POINT 345', '2021-04-06 08:13:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_aset_tis`
--

CREATE TABLE `master_aset_tis` (
  `id_master_ti` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_aset_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_master_ti` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_aset_tis`
--

INSERT INTO `master_aset_tis` (`id_master_ti`, `jenis_aset_id`, `nip_pegawai`, `nama_master_ti`, `failed_at`) VALUES
('M-037', 'AS-02', '10101001', 'Laptop Asus 47520j', '2021-02-03 16:55:51'),
('M-038', 'AS-01', '10101001', 'Komputer Acer', '2021-02-03 17:07:39'),
('M-039', 'AS-03', '10101001', 'Scanner Canon 300', '2021-02-09 09:37:40'),
('M-040', 'AS-04', '10101001', 'Printer HP Deskjet', '2021-02-15 06:56:26'),
('M-041', 'AS-02', '6793156R', 'ew', '2021-03-31 09:26:44'),
('M-042', 'AS-04', '6793156R', 're', '2021-03-31 09:26:57'),
('M-043', 'AS-03', '6793156R', 'sc', '2021-03-31 09:27:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_03_055212_create_auto_numbers', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_01_12_061608_roles', 1),
(6, '2021_01_12_062055_oss', 1),
(7, '2021_01_12_062846_jabatans', 1),
(8, '2021_01_12_063229_jenis_units', 1),
(9, '2021_01_12_070554_add_relation_to_users_table', 1),
(10, '2021_01_12_083538_units', 1),
(11, '2021_01_12_084039_ruangans', 1),
(12, '2021_01_22_060301_petugass', 1),
(13, '2021_01_22_062745_pegawais', 1),
(14, '2021_01_22_065344_jenis_asets', 1),
(15, '2021_01_22_065912_master_aset_tis', 1),
(16, '2021_01_22_070641_detail_pengecekan_tis', 1),
(17, '2021_01_22_074712_pengecekan_aset_tis', 1),
(18, '2021_01_22_080904_detail_aset_lains', 1),
(19, '2021_01_22_084151_pengaduan_aset_tis', 1),
(20, '2021_01_22_084248_detail_pengaduan_tis', 1),
(21, '2021_01_22_090042_master_aset_jaringans', 1),
(22, '2021_01_22_091148_detail_pengecekan_jaringans', 1),
(23, '2021_01_22_094427_detail_pengaduan_jaringans', 1),
(24, '2021_01_22_095436_pengaduan_jaringans', 1),
(25, '2021_01_22_103459_add_relation_to_detail_pengecekan_ti', 1),
(26, '2021_01_25_082340_add_relation_to_detail_pengaduan_jaringan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oss`
--

CREATE TABLE `oss` (
  `id_os` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_os` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oss`
--

INSERT INTO `oss` (`id_os`, `nama_os`, `failed_at`) VALUES
('1', 'Windows 10 Pro 64 Bit', '2021-02-10 06:54:23'),
('2', 'Windows 10 Pro 32 Bit', '2021-02-10 06:54:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pegawai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`nip_pegawai`, `unit_id`, `jabatan_id`, `nama_pegawai`, `alamat_pegawai`, `no_hp`, `failed_at`) VALUES
('10101001', 'U-002', '1', 'Astri', 'Jl.Air camar', '085274312393', '2021-02-03 16:15:07'),
('10103045', 'U-001', '1', 'WENY SRI HARTATI', 'Jl. Alang Laweh', '085274312393', '2021-03-08 05:54:17'),
('123', 'U-001', '1', 'gege', 're', '325526', '2021-03-25 10:20:53'),
('1611521020yy', 'U-001', '1', 'Syahrul', 'yy', 'y', '2021-03-06 04:24:24'),
('6793156R', 'U-001', '1', 'DESMANIAR', 'JL.gurun laweh', '085274312398', '2021-03-25 10:40:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_aset_tis`
--

CREATE TABLE `pengaduan_aset_tis` (
  `id_pengaduan_ti` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan_aset_tis`
--

INSERT INTO `pengaduan_aset_tis` (`id_pengaduan_ti`, `nip_pegawai`, `tgl_pengaduan`, `failed_at`) VALUES
('P-086', '10101001', '2021-04-06', '2021-04-06 03:24:54'),
('P-087', '10101001', '2021-04-06', '2021-04-06 03:31:51'),
('P-088', '10101001', '2021-04-06', '2021-04-06 03:32:41'),
('P-089', '10101001', '2021-04-06', '2021-04-06 06:00:41'),
('P-090', '10101001', '2021-04-06', '2021-04-06 06:06:17'),
('P-091', '10101001', '2021-04-06', '2021-04-06 06:11:04'),
('P-092', '10101001', '2021-04-06', '2021-04-06 06:12:22'),
('P-093', '10101001', '2021-04-06', '2021-04-06 06:34:56'),
('P-094', '10101001', '2021-04-06', '2021-04-06 06:38:56'),
('P-095', '10101001', '2021-04-06', '2021-04-06 06:42:28'),
('P-096', '10101001', '2021-04-06', '2021-04-06 07:14:07'),
('P-097', '10101001', '2021-04-06', '2021-04-06 07:15:42'),
('P-098', '10101001', '2021-04-08', '2021-04-08 08:59:18'),
('P-099', '10101001', '2021-04-08', '2021-04-08 09:02:03'),
('P-100', '10101001', '2021-04-08', '2021-04-08 09:02:29'),
('P-101', '10101001', '2021-04-08', '2021-04-08 09:03:54'),
('P-102', '10101001', '2021-04-08', '2021-04-08 09:05:13'),
('P-103', '10101001', '2021-04-08', '2021-04-08 10:04:34'),
('P-104', '10101001', '2021-04-08', '2021-04-08 10:05:54'),
('P-105', '10101001', '2021-04-08', '2021-04-08 10:06:40'),
('P-106', '10101001', '2021-04-08', '2021-04-08 10:07:32'),
('P-107', '10101001', '2021-04-08', '2021-04-08 10:09:33'),
('P-108', '10101001', '2021-04-08', '2021-04-08 10:11:04'),
('P-109', '10101001', '2021-04-09', '2021-04-09 16:22:02'),
('P-110', '10101001', '2021-04-09', '2021-04-09 16:22:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_jaringans`
--

CREATE TABLE `pengaduan_jaringans` (
  `id_pengaduan_jaringan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan_jaringans`
--

INSERT INTO `pengaduan_jaringans` (`id_pengaduan_jaringan`, `unit_id`, `tgl_pengaduan`, `failed_at`) VALUES
('PJ-03', 'U-637', '2021-04-11', '2021-04-11 09:55:40'),
('PJ-04', 'U-637', '2021-04-11', '2021-04-11 09:56:05'),
('PJ-05', 'U-637', '2021-04-11', '2021-04-11 09:57:36'),
('PJ-06', 'U-637', '2021-04-11', '2021-04-11 09:59:51'),
('PJ-07', 'U-637', '2021-04-11', '2021-04-11 10:01:56'),
('PJ-08', 'U-002', '2021-04-12', '2021-04-12 06:38:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengecekan_aset_tis`
--

CREATE TABLE `pengecekan_aset_tis` (
  `no_seri` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `nip_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_petugas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengecekan_aset_tis`
--

INSERT INTO `pengecekan_aset_tis` (`no_seri`, `tgl_pengecekan`, `nip_pegawai`, `nip_petugas`, `failed_at`) VALUES
('KP-001', '2021-02-28', '10101001', '1611521020', '2021-02-28 03:53:00'),
('LP-001', '2021-02-28', '10101001', '1611521020', '2021-02-28 03:51:50'),
('LP-002', '2021-03-31', '6793156R', '1611521020', '2021-03-31 09:29:32'),
('PR-001', '2021-03-03', '10101001', '1611521020', '2021-03-03 09:56:47'),
('PR-002', '2021-03-31', '6793156R', '1611521020', '2021-03-31 09:30:47'),
('SC-001', '2021-02-15', '10101001', '1611521020', '2021-02-15 10:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugass`
--

CREATE TABLE `petugass` (
  `nip_petugas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_petugas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugass`
--

INSERT INTO `petugass` (`nip_petugas`, `unit_id`, `nama_petugas`, `alamat_petugas`, `failed_at`) VALUES
('1611521020', 'U-002', 'Astri', 'Unand', '2021-02-10 10:23:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `nama_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`, `failed_at`) VALUES
(1, 'Petugas', '2021-02-03 08:02:08'),
(2, 'Pegawai', '2021-02-03 08:02:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangans`
--

CREATE TABLE `ruangans` (
  `id_ruangan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangans`
--

INSERT INTO `ruangans` (`id_ruangan`, `unit_id`, `nama_ruangan`, `failed_at`) VALUES
('R-047', 'U-001', 'Ruang Server 1', '2021-03-01 16:20:24'),
('R-048', 'U-001', 'Ruang Divisi STI', '2021-03-01 16:20:40'),
('R-049', 'U-001', 'Ruang Server ADUM', '2021-03-01 16:22:03'),
('R-050', 'U-001', 'Ruang Manager', '2021-03-01 16:46:44'),
('R-051', 'U-637', 'Ruangan Kepala Divisi Jaringan', '2021-04-03 16:27:36'),
('R-052', 'U-637', 'Ruang Server', '2021-04-06 08:12:14'),
('R-053', 'U-637', 'Ruang Divisi STI', '2021-04-06 08:12:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id_unit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_unit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id_unit`, `jenis_id`, `nama_unit`, `alamat_unit`, `failed_at`) VALUES
('U-001', '1', 'Unit Induk Wilayah SUMBAR', 'Jl. Dr. Wahidin no.88', '2021-02-04 06:01:30'),
('U-002', '1', 'ULP Belanti', 'Jl.Sudirman', '2021-02-07 13:45:14'),
('U-003', '1', 'UP2D Sumbar', 'Jl. Kota padang', '2021-03-06 10:28:39'),
('U-637', '3', 'UP3 Padang', 'Jl. S.Parman No.221, Ulak Karang Utara', '2021-02-03 08:02:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `role_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('10101001', 2, 'Astri', 'astriastri@gmail.com', NULL, '$2y$10$cTPkOJQWE/soVXvIPdR7o.zfyiFfMuLY7/4mV8r3Uubg.Z.YcmjWC', 'gwFkHyBwzwawO0HZdS1HCobdGVsCBXX7x7QyChUdPZlydkDW7svEKQqimamR', NULL, NULL),
('10103045', 2, 'weny654', 'test@gmail.com', NULL, '$2y$10$WaMTYAn57nYQYsMbEqfqTuGPoZcMtqKUuvEGjUl8BudEj17OFWxgS', NULL, NULL, NULL),
('123', 2, 'gege', 'astriastri839@gmail.com', NULL, '$2y$10$/bKnttn3nkdxJg3DUDD5YukXD4cyQXjF/GqjVd.Ya.cFO2blTR.0O', NULL, NULL, NULL),
('1611521001', 2, 'petugas01', 'petugas123@gmail.com', NULL, '$2y$10$dWqVHYKdENdXPKPy1g7/WOzuWZTRV5PxnAP9kvnzTn10Tqu8N4yii', NULL, NULL, NULL),
('1611521020', 1, 'Pln', 'pln123@gmail.com', NULL, '$2y$10$E/z8yStiA4XoDxgRy020AuQ/pBPdXqCD.KYirKBDMoIBVq0bYY0nm', 'cjYxGPfMasht8cHXf7pwEJtfDHahhDiAQznT1yW9bdZmQ7Yb7mR1shSaSRz2', NULL, NULL),
('1611521020yy', 2, 'syahrul1234', 'syarul123@gmail.com', NULL, 'syahrul', NULL, NULL, NULL),
('6793156R', 2, 'desmaniar', 'desmaniar@gmail.com', NULL, '$2y$10$HsKmE7H1GnNCOhpHFmN39uGm5vkZjxH76I5QWDlLhe/l4VpRmEkD6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_aset_lains`
--
ALTER TABLE `detail_aset_lains`
  ADD PRIMARY KEY (`no_seri`,`tgl_pengecekan`,`nip_pegawai`),
  ADD KEY `detail_aset_lains_id_master_ti_foreign` (`id_master_ti`);

--
-- Indeks untuk tabel `detail_pengaduan_jaringans`
--
ALTER TABLE `detail_pengaduan_jaringans`
  ADD PRIMARY KEY (`id_pengaduan_jaringan`),
  ADD KEY `detail_pengaduan_jaringans_id_master_jaringan_foreign` (`id_master_jaringan`);

--
-- Indeks untuk tabel `detail_pengaduan_tis`
--
ALTER TABLE `detail_pengaduan_tis`
  ADD PRIMARY KEY (`id_pengaduan_ti`),
  ADD KEY `detail_pengaduan_tis_id_master_ti_foreign` (`id_master_ti`);

--
-- Indeks untuk tabel `detail_pengecekan_jaringans`
--
ALTER TABLE `detail_pengecekan_jaringans`
  ADD PRIMARY KEY (`no_seri`,`tgl_pengecekan`),
  ADD KEY `detail_pengecekan_jaringans_id_master_jaringan_foreign` (`id_master_jaringan`),
  ADD KEY `detail_pengecekan_jaringans_nip_petugas_foreign` (`nip_petugas`);

--
-- Indeks untuk tabel `detail_pengecekan_tis`
--
ALTER TABLE `detail_pengecekan_tis`
  ADD PRIMARY KEY (`no_seri`,`tgl_pengecekan`,`nip_pegawai`),
  ADD KEY `detail_pengecekan_tis_os_id_foreign` (`os_id`),
  ADD KEY `detail_pengecekan_tis_id_master_ti_foreign` (`id_master_ti`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_asets`
--
ALTER TABLE `jenis_asets`
  ADD PRIMARY KEY (`id_jenis_aset`);

--
-- Indeks untuk tabel `jenis_units`
--
ALTER TABLE `jenis_units`
  ADD PRIMARY KEY (`id_jenis_unit`);

--
-- Indeks untuk tabel `master_aset_jaringans`
--
ALTER TABLE `master_aset_jaringans`
  ADD PRIMARY KEY (`id_master_jaringan`),
  ADD KEY `master_aset_jaringans_ruangan_id_foreign` (`ruangan_id`),
  ADD KEY `master_aset_jaringans_jenis_id_foreign` (`jenis_aset_id`);

--
-- Indeks untuk tabel `master_aset_tis`
--
ALTER TABLE `master_aset_tis`
  ADD PRIMARY KEY (`id_master_ti`),
  ADD KEY `master_aset_tis_jenis_aset_id_foreign` (`jenis_aset_id`),
  ADD KEY `master_aset_tis_nip_pegawai_foreign` (`nip_pegawai`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oss`
--
ALTER TABLE `oss`
  ADD PRIMARY KEY (`id_os`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`nip_pegawai`),
  ADD KEY `pegawais_unit_id_foreign` (`unit_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `pengaduan_aset_tis`
--
ALTER TABLE `pengaduan_aset_tis`
  ADD PRIMARY KEY (`id_pengaduan_ti`),
  ADD KEY `pengaduan_aset_tis_nip_pegawai_foreign` (`nip_pegawai`);

--
-- Indeks untuk tabel `pengaduan_jaringans`
--
ALTER TABLE `pengaduan_jaringans`
  ADD PRIMARY KEY (`id_pengaduan_jaringan`),
  ADD KEY `pengaduan_jaringans_unit_id_foreign` (`unit_id`);

--
-- Indeks untuk tabel `pengecekan_aset_tis`
--
ALTER TABLE `pengecekan_aset_tis`
  ADD PRIMARY KEY (`no_seri`,`tgl_pengecekan`,`nip_pegawai`),
  ADD KEY `pengecekan_aset_tis_nip_pegawai_foreign` (`nip_pegawai`),
  ADD KEY `pengecekan_aset_tis_nip_petugas_foreign` (`nip_petugas`);

--
-- Indeks untuk tabel `petugass`
--
ALTER TABLE `petugass`
  ADD PRIMARY KEY (`nip_petugas`),
  ADD KEY `petugass_unit_id_foreign` (`unit_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `ruangans_unit_id_foreign` (`unit_id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `units_jenis_id_foreign` (`jenis_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_aset_lains`
--
ALTER TABLE `detail_aset_lains`
  ADD CONSTRAINT `detail_aset_lains_id_master_ti_foreign` FOREIGN KEY (`id_master_ti`) REFERENCES `master_aset_tis` (`id_master_ti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_aset_lains_no_seri_tgl_pengecekan_nip_pegawai_foreign` FOREIGN KEY (`no_seri`,`tgl_pengecekan`,`nip_pegawai`) REFERENCES `pengecekan_aset_tis` (`no_seri`, `tgl_pengecekan`, `nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengaduan_jaringans`
--
ALTER TABLE `detail_pengaduan_jaringans`
  ADD CONSTRAINT `detail_pengaduan_jaringans_id_master_jaringan_foreign` FOREIGN KEY (`id_master_jaringan`) REFERENCES `master_aset_jaringans` (`id_master_jaringan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengaduan_jaringans_id_pengaduan_jaringan_foreign` FOREIGN KEY (`id_pengaduan_jaringan`) REFERENCES `pengaduan_jaringans` (`id_pengaduan_jaringan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengaduan_tis`
--
ALTER TABLE `detail_pengaduan_tis`
  ADD CONSTRAINT `detail_pengaduan_tis_ibfk_1` FOREIGN KEY (`id_pengaduan_ti`) REFERENCES `pengaduan_aset_tis` (`id_pengaduan_ti`),
  ADD CONSTRAINT `detail_pengaduan_tis_id_master_ti_foreign` FOREIGN KEY (`id_master_ti`) REFERENCES `master_aset_tis` (`id_master_ti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengecekan_jaringans`
--
ALTER TABLE `detail_pengecekan_jaringans`
  ADD CONSTRAINT `detail_pengecekan_jaringans_id_master_jaringan_foreign` FOREIGN KEY (`id_master_jaringan`) REFERENCES `master_aset_jaringans` (`id_master_jaringan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengecekan_jaringans_nip_petugas_foreign` FOREIGN KEY (`nip_petugas`) REFERENCES `petugass` (`nip_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengecekan_tis`
--
ALTER TABLE `detail_pengecekan_tis`
  ADD CONSTRAINT `detail_pengecekan_tis_id_master_ti_foreign` FOREIGN KEY (`id_master_ti`) REFERENCES `master_aset_tis` (`id_master_ti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengecekan_tis_no_seri_foreign` FOREIGN KEY (`no_seri`) REFERENCES `pengecekan_aset_tis` (`no_seri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengecekan_tis_no_seri_tgl_pengecekan_nip_pegawai_foreign` FOREIGN KEY (`no_seri`,`tgl_pengecekan`,`nip_pegawai`) REFERENCES `pengecekan_aset_tis` (`no_seri`, `tgl_pengecekan`, `nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengecekan_tis_os_id_foreign` FOREIGN KEY (`os_id`) REFERENCES `oss` (`id_os`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_aset_jaringans`
--
ALTER TABLE `master_aset_jaringans`
  ADD CONSTRAINT `master_aset_jaringans_jenis_id_foreign` FOREIGN KEY (`jenis_aset_id`) REFERENCES `jenis_asets` (`id_jenis_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_aset_jaringans_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_aset_tis`
--
ALTER TABLE `master_aset_tis`
  ADD CONSTRAINT `master_aset_tis_jenis_aset_id_foreign` FOREIGN KEY (`jenis_aset_id`) REFERENCES `jenis_asets` (`id_jenis_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_aset_tis_nip_pegawai_foreign` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawais` (`nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawais_nip_pegawai_foreign` FOREIGN KEY (`nip_pegawai`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawais_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan_aset_tis`
--
ALTER TABLE `pengaduan_aset_tis`
  ADD CONSTRAINT `pengaduan_aset_tis_nip_pegawai_foreign` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawais` (`nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan_jaringans`
--
ALTER TABLE `pengaduan_jaringans`
  ADD CONSTRAINT `pengaduan_jaringans_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengecekan_aset_tis`
--
ALTER TABLE `pengecekan_aset_tis`
  ADD CONSTRAINT `pengecekan_aset_tis_nip_pegawai_foreign` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawais` (`nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengecekan_aset_tis_nip_petugas_foreign` FOREIGN KEY (`nip_petugas`) REFERENCES `petugass` (`nip_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petugass`
--
ALTER TABLE `petugass`
  ADD CONSTRAINT `petugass_nip_petugas_foreign` FOREIGN KEY (`nip_petugas`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `petugass_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  ADD CONSTRAINT `ruangans_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_units` (`id_jenis_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
